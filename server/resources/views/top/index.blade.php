{{-- <!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>
        @yield('title')
        </title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/styles.css">
    </head>

    <body>
        @include('shared.header')

        <div class="introduction row col-sm-4">
        ponshuki
        </div>

        <div class="rightside row col-sm-8 test">
            <!-- <img src="https://t.pimg.jp/032/505/064/1/32505064.jpg" alt="トップ画像" width="100%" height="100%"> -->

            <!-- <div class="loginbtn">ログイン</div> -->
        </div>

    </body>

</html> --}}

@extends('layouts.layout')

@section('content')

    @if (false)
    <div class="row">
        <div class="col-sm-4">
            @include('shared.side-bar')
        </div>
        <div class="col-sm-8">
            <div class="test"></div>
        </div>
    </div>

    @else
    @include('shared.welcome')
    @endif

@endsection


