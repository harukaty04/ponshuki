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
        // dd($sake_lists);
        return view('user.searchpage', ['sake_lists' => $sake_lists]);
    }
}

