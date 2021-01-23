@extends('layouts.layout')

    @section('content')
    <div class="container mt-5 ">
        <div class="w-50 card m-auto">
            <nav class="panel panel-default ml-3 mr-3 ">
                    <div class="panel-heading mt-3 mb-3 h3 border-bottom font-weight-bold">ログイン</div>
                        <div class="panel-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                                @endforeach
                            </div>
                            @endif
                            <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                            </form>
                        </div>
            </nav>
            <div class="text-center">
            <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
            </div>
        </div>
    </div>
    @endsection
