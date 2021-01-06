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
}