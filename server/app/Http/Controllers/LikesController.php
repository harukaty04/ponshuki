<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Like;
use App\Review;

class LikesController extends Controller
{
    
    public function index()
    {
        
        // $reviews = Review::withCount('likes')->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
        //     ->get();
        $current_user_id = Auth::id();
        $user_likes_review_ids = Like::where('user_id', Auth::id())->get()->pluck('review_id');
        $user_likes_reviews = Review::whereIn('id', $user_likes_review_ids)->get();
        // dd(count($user_likes_reviews));
        return view('user.likes',[
            'reviews' => $user_likes_reviews,
            'current_user_id' => $current_user_id
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
