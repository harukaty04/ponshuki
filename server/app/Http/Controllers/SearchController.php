<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('menu.searchpage');
        // return view('reviews.index', ['reviews' => $reviews]);
    }
    public function create(Request $request)
{
    // フォルダモデルのインスタンスを作成する
    // $review = new Reviews();
    // タイトルに入力値を代入する
    // $review->title = $request->title;
    // インスタンスの状態をデータベースに書き込む
    // $review->save();

    // return redirect()->route('tasks.index', [
    //     'id' => $review->id,
//     ]);
// }

}