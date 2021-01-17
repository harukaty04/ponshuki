<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Review extends Model
{
    protected $table = "reviews";

    // idカラムの更新・挿入はさせない
    protected $guarded = ['id'];

    // 自動でupdated_atとcreated_atをレコード挿入時に入れてくれる
    public $timestamps = true;


    /* ----- リレーション ----- */
    public function user(): BelongsTo
    {     
        return $this->belongsTo('App\User');
    }
}
