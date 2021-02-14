<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        #キーワード受け取り
        $keyword = $request->input('keyword');

        if(!empty($keyword)) {
            $reviews = Review::where('title', 'like', '%' . $keyword . '%')
                ->withCount('likes')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $reviews = Review::withCount('likes')
                ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
                ->get();
        }

        $current_user_id = Auth::id();

        if ( Auth::check() ) {
            $current_user_name = Auth::user()->name;
        } else {
            $current_user_name = '';  
        }
        
        //おすすめ順（総合評価順）に並ぶようにする
        return view('user.searchpage', compact('reviews', 'keyword','current_user_name', 'current_user_id','message'));
    
    }


    public function getSake()
    {
        $url = "https://muro.sakenowa.com/sakenowa-data/api/brands";
        $method = "GET";
        //接続
        $client = new Client();

        $sake_response = $client->request($method, $url);

        $sake_response = $sake_response->getBody();
        $sake_response = json_decode($sake_response, true);
        $brands = $sake_response['brands'];
        //ひとつずつ配列を処理する
        //nameだけを取り出す
        //配列にいれる

        foreach ($brands as $brand)
        {
            $brand_names[] = $brand['name'];
        }

        return response()->json($brand_names);
    }
}






