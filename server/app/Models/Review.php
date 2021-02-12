<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use App\Models\Like;


class Review extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */

    protected $table = "reviews";
    // idカラムの更新・挿入はさせない
    protected $guarded = ['id'];
    
    // 自動でupdated_atとcreated_atをレコード挿入時に入れてくれる
    public $timestamps = true;

    public static $rules = [
        'user_id'         => 'required',
        'title'           => 'required|max: 30',
        'content'         => 'required|max: 1000',
        'taste_intensity' => 'required',
        'scent_strength'  => 'required',
        'evaluation'      => 'required',
        'image'           => 'image|file',
    ];

    /* ----- リレーション ----- */
    public function user(): BelongsTo
    {     
        return $this->belongsTo('App\Models\User');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool 
    {
        return Like::where('user_id', $user->id)->where('review_id', $this->id)->first() !==null;
    }
    
}
