<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;

class LikesController extends Controller
{
    
    public function index()
    {
        return view('user.likes');
    }

    public function like_review(Request $request)
    {
            if ( $request->input('like_review') == 0) {
             //ステータスが0のときはデータベースに情報を保存
                Like::create([
                    'review_id' => $request->input('review_id'),
                    'user_id' => auth()->user()->id,
                ]);
            //ステータスが1のときはデータベースに情報を削除
            } elseif ( $request->input('like_review')  == 1 ) {
                Like::where('review_id', "=", $request->input('review_id'))
                ->where('user_id', "=", auth()->user()->id)
                ->delete();
            }
            return  $request->input('like_review');
    } 

    
}
