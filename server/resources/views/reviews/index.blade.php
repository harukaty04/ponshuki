<!-- 親ファイルapp.blade.phpを継承 -->
@extends('home')

@section('title', 'レビューページ')

@section('content')


  <div class="container">
  @foreach($reviews as $reviews)
    <div class="card mt-3">
      <div class="card-body d-flex flex-row">
        <i class="fas fa-wine-glass-alt fa-3x mr-1"></i>
        <div>
          <div class="font-weight-bold">
          {{ $reviews->user->name }}
            
          </div>
          <div class="font-weight-lighter">
          {{ $reviews->created_at->format('Y/m/d H:i') }}
            
          </div>
        </div>
      </div>
      <div class="card-body pt-0 pb-2">
        <h3 class="h4 card-title">
        {{ $reviews->title }} 
        </h3>
        <div class="card-text">
        {!! nl2br(e( $reviews->body )) !!} 
        </div>
      </div>
    </div>
    @endforeach 
  </div>
@endsection
