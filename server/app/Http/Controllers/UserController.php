<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private $current_user;

    /**
     * Constructor
     */
    public function __construct()
    {
        // ログイン中のユーザー情報を取得する
        $this->middleware(function ($request, $next) {
            $this->current_user = Auth::user();
            return $next($request);
        });

        $this->middleware('auth');
    }


    /**
     * TODO: プロフィール表示はこっちのメソッドを使うこと
     * 
     */
    public function show()
    {
        $id = Auth::id();
        if ($id !== $this->current_user->id) $this->current_user = User::find($id)->get();

         //idが、リクエストされた$userのidと一致するuserを取得
        $reviews = Review::where('user_id', $this->current_user->id) //$userによる投稿を取得
            ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->get();

        return view('user.profile', [
            'current_user_name' => $this->current_user->name,
            'reviews'           => $reviews,
            'user'              => $this->current_user,
            'id'                => $this->current_user->id,
        ]);
    }


    /**
     * ユーザーのプロフィール編集ページを表示
     * 
     * @param Request $request
     */
    public function edit(Request $request)
    {
        $current_user_id = Auth::id();
        $user = $this->current_user->name;
        // $user = User::find($request->id);
        
        return view('user.edit_profile', [
            'user' => $user, 
            'current_user_id' => $current_user_id,
        ]); 
    }

    /**
     * プロフィール編集
     * NOTE: プロフィール画像・nameを編集する
     *
     * @param Request $request
     */
    public function updateProfile(Request $request)
    {
        $inputs = $request->all();

        // ログイン中のユーザーを取得
        $current_user = Auth::user();

        $user = User::where('id', $current_user->id)->first();

        if ( $request->has('name') && $request->has('image') ) {
            $file_name = $this->uploadImageToPublic($request);

            $user->update([
                'name'  => $inputs['name'],
                'image' => $file_name
            ]);
        } elseif ( $request->has('name') && !$request->has('image')) {
            $user->update([
                'name'  => $inputs['name'],
            ]);
        }

        return redirect()->route('user.profile', [
            'id'              => $current_user->id,
            'user'            => $user
        ]);
    }


    /**
     * 画像をuploadディレクトリに保存する
     *
     * @param array $inputs
     * @return string
     */
    private function uploadImageToPublic(Request $request): string
    {
        if (!$request->has('image')) return '';

        $file = $request->image;

        // アップロードされたファイル名を取得
        $file_name = time() . $file->getClientOriginalName();

        $target_path = public_path('/uploads-profile');

        $file->move($target_path, $file_name);

        return $file_name;
    }
}

