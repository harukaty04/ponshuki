<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Like;
use GuzzleHttp\Client;


class ReviewController extends Controller
{
    
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

        $this->middleware('auth');
    }
    /**
     * Review一括取得する処理を実装する
     * 
     */
    public function index()
    {
        //withCountのメモ
        //withCountの中にモデルで定義したリレーション名（'likes')をいれることで、
        //$review->likes_countが使用できるようになる
        //likes_countはreview_idに紐づくlikesテーブルのレコードがいくつあるのかを返す
        $reviews = Review::withCount('likes')->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->get();

        $current_user_id = Auth::id();

        // foreach ($reviews as $review) {
        //     // 取得したReviewsのうち、1件に対して->userとすることで
        //     // belong_toでつながっているuserモデルにアクセスすることができる
        // }
        if ( Auth::check() ) {
            $current_user_name = Auth::user()->name;
        } else {
            $current_user_name = '';  
        }
        return view('top.index', compact('reviews', 'current_user_name', 'current_user_id'));
        
    }

    /**
     * MEMO:データベースにレビュー内容が保存されるようなメソッドを実装する,
     * 画像もpublicに保存できるようにする
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

        $value = [
            'user_id'         => $current_user->id,
            'title'           => (string) $inputs['title'] ?? '',
            'content'         => (string) $inputs['content'] ?? '',
            'taste_intensity' => (int) $inputs['taste_intensity'],
            'scent_strength'  => (int) $inputs['scent_strength'],
            'evaluation'      => (int) $inputs['evaluation'],
            'image'           => (string) $file_name,
        ];

        Review::create($value);

        return redirect()->route('top.index');
    }

    //編集機能の追加
    public function edit(int $review_id)
    {
        $review = Review::find($review_id);

        return view('review.edit', ['review' => $review]); 
        
    }


    public function update(Request $request)
    {
        $reviews                  = Review::find($request->id);
        $reviews->title           = $request->title;
        $reviews->image           = $request->image;
        $reviews->taste_intensity = $request->taste_intensity;
        $reviews->scent_strength  = $request->scent_strength;
        $reviews->evaluation      = $request->evaluation;
        $reviews->content         = $request->content;
        $reviews->update();
        
        return redirect()->route('top.index');
    }

    public function destroy(Request $request)
    {
        $review = Review::find($request->review_id);
        $review->delete();
        
        return redirect()->route('top.index');
    }

    public function store(Request $request)
    {
        $request->file('file')->store('');
    }

    public function getSake()
    {
        $url = "https://muro.sakenowa.com/sakenowa-data/api/brands";
        $method = "GET";

        //接続
        $client = new Client();

        $sake_response = $client->request($method, $url);
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
}

