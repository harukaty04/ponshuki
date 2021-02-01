<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * TODO: プロフィール表示はこっちのメソッドを使うこと
     * 
     */
    public function show(int $id)
    {
        $current_user_id = Auth::id();

        if ( $id == $current_user_id) $current_user_name = Auth::user()->name;
        else $current_user_name = User::find($id)->name;
        
         //idが、リクエストされた$userのidと一致するuserを取得
        $reviews = Review::where('user_id', $current_user_id) //$userによる投稿を取得
            ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->get();

        return view('user.profile', [
            'current_user_name' => $current_user_name,
            'reviews' => $reviews,
        ]);
    }

        public function edit(Request $request)
    {
        $users = User::find($request->id);
        return view('user.edit_profile', ['reviews' => $users]); 
    }


    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();
        $reviews = $user->likes->sortByDesc('created_at');
        
        return view('user.likes', [
            'user' => $user,
            'reviews' => $reviews,
        ]);
    }
}