<?php

namespace App\Models;

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
    
    public static $rules = [
        'name'            => 'required|max: 30',
        'ponshu_image'      => 'image|file',

    ];
}
