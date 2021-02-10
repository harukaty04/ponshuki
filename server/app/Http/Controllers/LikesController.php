<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Review;


class LikesController extends Controller
{
    
    public function index()
    { 
        
        $current_user_id = Auth::id();
        // whereInの第二引数は配列のため、pluckで特定のカラムのみの配列に変換する
        $user_likes = Like::where('user_id',$current_user_id)
            ->get()
            ->pluck('review_id');

        $reviews_user_likes = Review::whereIn('id', $user_likes)->get();

        return view('user.likes',[
            'reviews' => $reviews_user_likes,
            'current_user_id' => $current_user_id,

            ]);
        
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
