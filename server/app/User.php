<?php

namespace App;


use App\Mail\BareMail;
use App\Notifications\PasswordResetNotification;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public static $rules = [
    //     'id'          => 'required',
    //     'name'            => 'required|max: 30',
    //     'email'         => 'required|max: 30',
    //     'password'  => 'required',
    //     'image'      => 'image|file',
    // ];

    public function reviews()
    {
        return $this->hasMany('App\Reviews');
        return $this->hasMany(Review::class);
    }

    public function likes(): BelongsToMany
    {
        // return $this->hasMany('App\Like');
        return $this->belongsToMany('App\Like', 'likes')->withTimestamps();
    }


}

