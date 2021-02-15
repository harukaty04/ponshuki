
@extends('layouts.layout')

@section('title', 'ponshuki')

@section('content')

    @if (Auth::check())
    <div class="row p-side-origin ">
        <div class="col-sm-3">
        @include('shared.side-bar')
        </div>
        <div class="col-sm-9">
        @include('review.create')
        </div>
    </div>

    @else
    @include('shared.welcome')
    @endif

@endsection


