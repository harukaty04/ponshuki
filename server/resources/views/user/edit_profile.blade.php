@extends('layouts.layout')


@section('content')

<div class="row p-side-origin">
    <div class="col-sm-3 ml-auto mr-auto">
        @include('shared.side-bar')
    </div>

    <div class="profile-card card col-sm-9 mt-4">
    {{-- フォームの作成 --}}
    <form action="{{ route( 'user.profile',['id' => Auth::user()->id] ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type='submit' class="btn btn-primary">submit</button>
    </form> 
    
    {{-- @foreach ($reviews as $review)
    
    <img src="../../images/{{ $review->ponshu_img }}" width="200px" height="200px">
    
    @endforeach --}}
    </div>

    
</div>

@endsection