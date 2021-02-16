@extends('layouts.layout')

@section('content')

<div class="row p-side-origin">
    <div class="col-sm-3">
        @include('shared.side-bar')
    </div>
    
    <div class="col-sm-9">
        <div class="profile-card card mt-4">
            <div class="card-body  flex-row ml-3 mr-3 mb-3">
                <p class="float-right"><a href="{{ route('user.edit_profile') }}" class="btn btn-outline-primary wf-mplus1p">プロフィールを編集</a></p>
                
                {{-- プロフィールを設定してなければnoimageアイコン、していれば表示 --}}
                @if($user->image === null)
                    <i class="fas fa-user-circle fa-6x mr-1 "></i>
                @else
                    <img src="/public/uploads-profile/{{ $user->image }}" width="100px" height="100px">
                @endif     
                {{-- <div href="{{ route('user.edit_profile') }}" class="text-dark wf-mplus1p d-flex align-items-end"> --}}
                    <span class="user_name h2 ">{{ $current_user_name }}</span>
                {{-- </div> --}}
                
            </div> 
        </div>
            
            <!-- 自分の投稿一覧 !-->
            @foreach ($reviews as $review)
            <div class="profile-card card  mt-4">
                <div class="mt-1 mb-1">
                    <div class="card-body">
                        <a class="h2 mb-3" href=# ><i class="fas fa-user-circle pr-2"></i>{{ $current_user_name }} さん</a>
                        <h5 class="card-title border-bottom mt-4">   {{ $review->title }} : {{ $review->evaluation}} </h5>  
                        @if($review->image == null)
                        <img src="/uploads/noimage.jpg" width="100px" height="100px">
                        @else
                        <img src="/public/uploads-profile/{{ $review->image }}" width="100px" height="100px">
                        @endif  
                        
                        <span class="all-rating">
                        味の濃さ  {{ $review->taste_intensity }} /香りの強さ  {{ $review->scent_strength}}
                        </span>
                        <p class="mt-3 ml-5 pl-5"> {{ $review->content }} </p>
                        <span class="badge badge-pill badge-light ">#爽酒</span> 
                    </div>  
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection
