<?php

namespace App;

use App\Http\Controllers\LikesController;
use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Review::class);
    }
    
    //  //いいねしている投稿
    // public function post()
    // {
    //     return $this->belongsTo(Review::class);
    // }

    // //いいねが既にされているかを確認
    // public function like_exist($id, $review_id)
    // {
    //     //  Likesテーブルのレコードにユーザーidと投稿idが一致するものを取得
    //     $exist = Review::where('user_id', '=', $id)->where('review_id', '=', $review_id)->get();

    //     // レコード（$exist）が存在するなら
    //     if (!$exist->isEmpty()) {
    //         return true;
    //     } else {
    //     // レコード（$exist）が存在しないなら
    //         return false;
    //     }
    // }
}
