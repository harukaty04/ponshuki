@extends('layouts.layout')

@section('content')

<div class="row p-side-origin">
    <div class="col-sm-3 ml-auto mr-auto">
        @include('shared.side-bar')
    </div>

    <div class="profile-card col-sm-9 ">
        <div class ="card mt-4">
            <div class="card-body">
    {{-- フォームの作成 --}}
            @if (Auth::id() == $current_user_id)
            <p class="text-danger">
            <b>※ゲストユーザーは、以下を編集できません。</b><br>
            ・アイコン画像<br>
            ・ユーザー名<br>
            ・メールアドレス<br>
            </p>
            @endif
            <form action="{{ route('edit.profile') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="pb-2 h5 d-inline-block">名前 : </div>
                
                
                @if (Auth::id() == $current_user_id)
                <div class="pb-2 h5 d-inline-block">ゲストさん </div>
                @else
                <input type="text" name="name" class="form-control w-25 d-inline-block"  value="{{ $user->name ?? old('name') }}" >
                @endif

                @if (Auth::id() == $current_user_id)
                <div class="profile-image pt-4 h4">プロフィール画像の変更</div>
                @else
                <div class="profile-image pt-4 h4">プロフィール画像の変更</div>
                <div>
                <input type="file" id="image" name="image" accept="image/jpeg, image/png"  class="pt-3 ">
                <iframe name="form_response" style="display:none;" ></iframe>   
                </div>
                @endif


                {{-- 説明
                <textarea name="content" required class="form-control wf-mplus1p" rows="4" placeholder="詳細"></textarea> --}}
                <button type="submit" class="update btn blue-gradient float-right wf-mplus1p">編集する</button>
            
            </form>
        </div>
    </div>    
</div>

@endsection