
@extends('layouts.layout')

@section('title', 'ponshuki')

@section('content')

    @if (Auth::check())
    <div class="p-side-origin">
        <div class="col-sm-4">
            @include('shared.side-bar')
        </div>
        <div class="col-sm-8">
        @include('reviews.create')
        </div>
    </div>

    @else
    @include('shared.welcome')
    @endif

@endsection


