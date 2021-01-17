<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;

class ReviewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Review一括取得する処理を実装する
     * 
     */
    public function index()
    {
        $reviews = Review::all();

        // foreach ($reviews as $review) {
        //     // 取得したReviewsのうち、1件に対して->userとすることで
        //     // belong_toでつながっているuserモデルにアクセスすることができる
        //     dd($review->user->name);
        // }

        $current_user_name = Auth::user()->name;

        return view('top.index', compact('reviews', 'current_user_name'));
        
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

            $value = [
                'user_id'         => $current_user_id,
                'title'           => (string) $inputs['title'] ?? '',
                'content'         => (string) $inputs['content'] ?? '',
                'taste_intensity' => (int) $inputs['taste_intensity'],
                'scent_strength'  => (int) $inputs['scent_strength'],
                'evaluation'      => (int) $inputs['evaluation'],
                'image'           => (string) $inputs['image'],
            ];
            Review::create($value);
            
        }
        //return viewだと引数が渡っていないためredirect処理を追記

        return redirect()->route('top.index');
        
    }
}

