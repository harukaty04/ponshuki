<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * MEMO: あとでReview一括取得する処理を実装する
     * 
     */
    public function index()
    {
        return view('top.index');
    }

    /**
     * MEMO:データベースにレビュー内容が保存されるようなメソッドを実装する
    */
    public function create(Request $request)
    {
        $current_user_id = Auth::user()->id;
        dd($request->all());
        // dd($current_user_id);
    }
}
