<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        //sakeAPI練習
        $url = "https://muro.sakenowa.com/sakenowa-data/api/brands";
        $method = "GET";

        //接続
        $client = new Client();

        $sake_response = $client->request($method, $url);

        $sake_response = $sake_response->getBody();
        $sake_response = json_decode($sake_response, true);
        $sake_lists = $sake_response['brands'];

        return view('user.searchpage');
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


//     public function autocomplete(Request $request)
// {
//     $input = $request->all();
//     $term = $input['sake-data'];
//     $result = array();
//     $sake_lists = 
//                 ->take(10)->get();
//     foreach( $sake_lists as $sake )
//     {
//         $result[] = ['id'=> $sake->id,'value'=>$sake->firstname.' '.$sake->lastname];
//     }

//     return response()->json($result);

// }
// }




