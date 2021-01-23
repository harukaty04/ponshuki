
@extends('layouts.layout')

@section('title', 'ponshuki')

@section('content')

    @if (Auth::check())
    <div class="p-side-origin">
        <div class="col-sm-3 ml-auto mr-auto">
            @include('shared.side-bar')
        </div>
        <div class="col-sm-9">
        @include('reviews.create')
        </div>
    </div>

    @else
    @include('shared.welcome')
    @endif

@endsection


