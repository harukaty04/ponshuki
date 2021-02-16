<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Like;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    const SAKE_API_URL = 'https://muro.sakenowa.com/sakenowa-data/api/brands';
    private $current_user;

    /**
     * Constructor
     */
    public function __construct()
    {
        // ログイン中のユーザー情報を取得する
        $this->middleware(function ($request, $next) {
            $this->current_user = Auth::user();
            return $next($request);
        });
        
    }
    /**
     * Review一括取得する処理を実装する
     * 
     */
    public function index()
    {
        
        $reviews = Review::withCount('likes')->orderBy('created_at', 'desc') 
            ->get();

        $current_user_id = Auth::id();

        if ( Auth::check() ) {
            $current_user_name = Auth::user()->name;
        } else {
            $current_user_name = '';  
        }
        return view('review.index', compact(
            'reviews', 'current_user_name', 'current_user_id'
        ));
        
    }

    /**
     * レビュー作成機能
     * MEMO:データベースにレビュー内容が保存されるようなメソッドを実装する,
     * 画像保存拡張子はコントローラーで指定
    */
    
    public function create(ReviewRequest $request)
    {
        $inputs = $request->all();
        
        // ログイン中のユーザーを取得
        $current_user = Auth::user();
        
        if ($request->has('image')) {
            $file_name = $this->uploadImageToPublic($request);
        } else {
            $file_name = "";
        }

        $value = $this->makeReturnValue($current_user->id, $inputs, $file_name);

        Review::create($value);
        return redirect()->route('review.index');
    }

    /**
     * レビュー編集表示機能
     *
     * @param integer $review_id
     * @return void
     */
    public function edit(int $review_id)
    {
        $review = Review::find($review_id);

        return view('review.edit', ['review' => $review]); 
        
    }

    /**
     * レビュー編集機能
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $reviews                  = Review::find($request->id);
        $reviews->fill($request->all())->save();
        
        return redirect()->route('review.index');
    }

    /**
     * レビュー削除機能
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $review = Review::find($request->review_id);
        $review->delete();
        
        return redirect()->route('review.index');
    }

    /**
     * さけのまAPIを使用
     *
     * @return JsonResponse
     */
    public function getSake(): JsonResponse
    {
        $client = new Client();
        $sake_response = $client->request($method="GET", self::SAKE_API_URL);
        $sake_response = $sake_response->getBody();
        $sake_response = json_decode($sake_response, true);
        $brands        = $sake_response['brands'];

        foreach ($brands as $brand)
        {
            $brand_names[] = $brand['name'];
        }
        return response()->json($brand_names);
    }

    /**
     * 画像をuploadディレクトリに保存する
     *
     * @param array $inputs
     * @return string
     */
    private function uploadImageToPublic(ReviewRequest $request): string
    {
        if (!$request->has('image')) return '';

        $file = $request->image;

        // アップロードされたファイル名を取得
        $file_name = time() . $file->getClientOriginalName();

        $target_path = public_path('/uploads');

        $file->move($target_path, $file_name);

        return $file_name;
    }

    /**
     * リターン用の配列を作成する
     *
     * @param integer $user_id
     * @param array $inputs
     * @param string $file_name
     * @return array
     */
    private function makeReturnValue(int $user_id, array $inputs, string $file_name): array
    {
        return [
            'user_id'         => $user_id,
            'title'           => (string) $inputs['title'] ?? '',
            'content'         => (string) $inputs['content'] ?? '',
            'taste_intensity' => (int) $inputs['taste_intensity'],
            'scent_strength'  => (int) $inputs['scent_strength'],
            'evaluation'      => (int) $inputs['evaluation'],
            'image'           => (string) $file_name,
        ];
    }

}

