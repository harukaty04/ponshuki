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
            
            $current_user = Auth::user();
            $user = User::where('id', $current_user->id)->first();

            
        return view('user.profile', [
            'current_user_name' => $current_user_name,
            'reviews' => $reviews,
            'user' => $user,
            
        ]);
    }

        public function edit(Request $request)
    {
        $current_user_id = Auth::id();

        $user = User::find($request->id);
        
        // dd($user);
        return view('user.edit_profile', [
            'user' => $user, 
            'current_user_id' => $current_user_id,
        ]); 
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

    public function editProfile(Request $request)
    {
        $inputs = $request->all();
        // ログイン中のユーザーを取得
        $current_user = Auth::user();
        $current_user_id = Auth::id();


        // $inputsが空でなければ実行
        if ( !empty($inputs) ) {
            $file = $request->image;
            //アップロードされたファイル名を取得
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('/uploads-profile');
            $file->move($target_path, $fileName);

            // dd($current_user);
            // $user = new User();
            // $user = User::where('id', $current_user->id)->first();
            // dd($user->toArray());
            $user = User::where('id', $current_user->id)->first();
            $user->update([
                'name'  => $inputs['name'],
                'image' => $fileName
            ]);
            // $user->id = $current_user->id;
            // $user->name = $current_user->name;
            // $user->email = $current_user->email;
            // $user->password = $current_user->password;
            // $user->image = (string) $fileName;
            // dd($user->toArray());
            // $user->save();
        }
        
        
        return redirect()->route('user.profile', [
            'id' => $current_user->id,
            'current_user_id' => $current_user_id
            ]);
    }
    
}

