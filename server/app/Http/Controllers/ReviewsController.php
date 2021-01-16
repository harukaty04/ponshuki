<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;

class ReviewsController extends Controller
{
    /**
     * Review一括取得する処理を実装する
     * 
     */
    public function index()
    {
        $reviews = Review::all();

        return view('top.index', compact('reviews'));
    }

    /**
     * MEMO:データベースにレビュー内容が保存されるようなメソッドを実装する,
     * 画像もpublicに保存できるようにする
    */
    
    public function create(Request $request)
    {
        $inputs = $request->all();

        // $inputsが空じゃなかったら実行
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
        return view('top.index');
    }
}

