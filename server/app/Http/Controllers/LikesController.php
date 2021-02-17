<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\User;
use App\Models\Review;


class LikesController extends Controller
{
    /**
     * いいねした投稿の一覧表示
     */
    public function index()
    { 
        $current_user_id = Auth::id();
        // whereInの第二引数は配列のため、pluckで特定のカラムのみの配列に変換する
        $user_likes = Like::where('user_id',$current_user_id)
            ->get()
            ->pluck('review_id');

        $user_likes_review = Review::whereIn('id', $user_likes)->get();
        
        return view('user.likes',[
            'reviews' => $user_likes_review,
            'current_user_id' => $current_user_id,
        ]);
        
    }
    
    /**
     * いいねのハートマークを表示
     */
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

    /**
     * ユーザーがお気に入り登録したReviewsを表示する
     *
     * @param string $name
     */
    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();
        $reviews = $user->likes->sortByDesc('created_at');

        return view('user.likes', [
            'user'    => $user,
            'reviews' => $reviews,
        ]);
    }
    /**
     * いいね判定機能
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $user_id = Auth::user()->id; 
        $review_id = $request->review_id; 
        $already_liked = Like::where('user_id', $user_id)
            ->where('review_id', $review_id)
            ->exists();
        
        //未いいねの場合インスタンスを生成、既いいねの場合テーブルから削除
        if (!$already_liked) { 
            //リファクタ
            $like = new Like; 
            $like->review_id = $review_id; 
            $like->user_id = $user_id;
            $like->save();
        } else {
            Like::where('review_id', $review_id)
                ->where('user_id', $user_id)
                ->delete();
        }
        
        //この投稿の最新の総いいね数を取得
        $review_likes_count = Like::where('review_id', $review_id)->count() ?? 0;
        $param = [
            'review_likes_count' => $review_likes_count,
        ];
        
        return response()->json($param); 
    }
}
