<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use GuzzleHttp\Client;

class ReviewsController extends Controller
{
    
    
    /**
     * Review一括取得する処理を実装する
     * 
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->get();

        $current_user_id = Auth::id();

        // foreach ($reviews as $review) {
        //     // 取得したReviewsのうち、1件に対して->userとすることで
        //     // belong_toでつながっているuserモデルにアクセスすることができる
        //     dd($review->user->name);
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
    */
    
    public function create(Request $request)
    {
        $inputs = $request->all();

        // $inputsが空でなければ実行
        if ( !empty($inputs) ) {
            // ログイン中のユーザーIDを取得
            $current_user_id = Auth::user()->id;

            
            $file = $request->image;
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('/uploads/image/');
            $file->move($target_path, $fileName);
        }

        $value = [
            'user_id'         => $current_user_id,
            'title'           => (string) $inputs['title'] ?? '',
            'content'         => (string) $inputs['content'] ?? '',
            'taste_intensity' => (int) $inputs['taste_intensity'],
            'scent_strength'  => (int) $inputs['scent_strength'],
            'evaluation'      => (int) $inputs['evaluation'],
            'image'           => (string) $fileName,
        ];

        Review::create($value);

        //return viewだと引数が渡っていないためredirect処理を追記
        
        return redirect()->route('top.index');
    }

    //編集機能の追加
    public function edit(int $review_id)
    {
        //'reviews'をキーとして使えるように設定
        $review = Review::find($review_id);

        return view('review.edit', ['review' => $review]); 
    }


    public function update(Request $request)
    {
        $reviews = Review::find($request->id);
        $reviews->title = $request->title;
        $reviews->image = $request->image;
        $reviews->taste_intensity = $request->taste_intensity;
        $reviews->scent_strength = $request->scent_strength;
        $reviews->evaluation = $request->evaluation;
        $reviews->content = $request->content;
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
            $brands = $sake_response['brands'];
            //ひとつずつ配列を処理する
            //nameだけを取り出す
            //配列にいれる
    
            foreach ($brands as $brand)
            {
                $brand_names[] = $brand['name'];
            }
    
            return response()->json($brand_names);
        }
}

