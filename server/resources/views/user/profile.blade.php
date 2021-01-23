

@extends('layouts.layout')



@section('content')

<div class="row p-side-origin">
    <div class="col-sm-3">
        @include('shared.side-bar')
    </div>
    <div class="col-sm-9">
        <div class="profile-card card mt-4">
            <div class="card-body  flex-row ml-3 mr-3">
                <p class="float-right "><a href="{{ route('user.edit_profile') }}" class="btn btn-outline-primary wf-mplus1p">プロフィールを編集</a></p>
                <i class="fas fa-user-circle fa-6x mr-1 "></i>
                <a href="{{ route('user.edit_profile') }}" class="text-dark wf-mplus1p d-flex align-items-end">
                    <h3 class="pl-3 pt-6 ">{{ $current_user_name }}</h3>
                </a>
                <div class="font-weight-bold">
                    <a href="" class="text-muted">
                        10 フォロー
                    </a>
                    <a href="" class="text-muted">
                        10 フォロワー
                    </a>
                </div>
                <div class="font-weight-lighter">
                好きなお酒
                タグ
                </div>
            </div> 
        </div>
            
            <!-- 自分の投稿一覧 !-->
            @foreach ($reviews as $review)
            <div class="profile-card card  mt-4">
            
                <div class="mt-1 mb-1">
                    
                    <div class="card-body">
                            
                        <a class="h2 mb-3" href=# ><i class="fas fa-user-circle pr-2"></i>{{ $current_user_name }} さん</a>
                    <h5 class="card-title border-bottom mt-4">   {{ $review->title }} : {{ $review->evaluation}}  </h5>
                        
                    <img src="https://makeshop-multi-images.akamaized.net/joylab/shopimages/19/01/1_000000000119.jpg?1600083302" alt="" width="50px" height="50px" 

                    />
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
        @foreach($reviews as $review)
        <div class="card mt-5 mb-3">
        
                <div class="card-body">
                    
                    <a class="h4 " href=# ><i class="fas fa-user-circle pr-2"></i>{{ Auth::user()->name }} さん</a>
                <h5 class="card-title border-bottom "> {{ $review->title }}   :   {{ $review->evaluation}}</h5>
                    
                <img src="https://makeshop-multi-images.akamaized.net/joylab/shopimages/19/01/1_000000000119.jpg?1600083302" alt="" width="50px" height="50px" 

                />
                <span class="all-rating">
                味の濃さ  {{ $review->taste_intensity}} /香りの強さ  {{ $review->scent_strength}}
                </span>
                <p class="mt-3 ml-5 pl-5">{{ $review->content }}</p>
                    <span class="badge badge-pill badge-light ">#爽酒</span>
                </div>
            </div>
            @endforeach


@endsection
