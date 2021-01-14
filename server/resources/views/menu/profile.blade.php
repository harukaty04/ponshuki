

@extends('layouts.layout')


@section('content')

<div class="p-side-origin">
    <div class="col-sm-4">
        @include('shared.side-bar')
    </div>
    <div class="profile-card card col-sm-8 mt-4">

        {{-- <div class="box-window window"> --}}
            {{-- <div class="overlay"></div> --}}
        
            <div class="box header">
                <h2>haruka kimura</h2>
                <p class="float-right "><a href="" class="btn btn-outline-primary">プロフィールを編集</a></p>
                
                <p><img class="box-imag" src="https://makeshop-multi-images.akamaized.net/joylab/shopimages/19/01/1_000000000119.jpg?1600083302" 
                width="100px" height="100px" alt="" /></p>
                <h4>sub</h4>
            </div>
            <div class="box-footer mb-5">
                {{-- <ul> --}}
            <span class="profile-detail ">
                <a class="instagram" href="#"><i class="fas fa-camera-retro"></i> 401 |</a>
                <a class="likes" href="#"><i class="fas fa-heart"></i></span> 333K |</a>
                <a class="follower" href="#"><i class="fas fa-user-alt"></i> 225M |</a>
                {{-- </ul> --}}
            </span>

            <span class="badge badge-pill badge-light">醇酒</span>
        
            {{-- </div>
        </div> --}}

    </div>
</div>

@endsection