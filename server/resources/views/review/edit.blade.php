@extends('layouts.layout')



@section('content')
<div class="p-side-origin row">
    <div class="col-sm-3">
        @include('shared.side-bar')
    </div>
    <div class="col-sm-9">
        <div class="pr-3">

            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-text">
                        <form action="{{ route('review.update') }}" method="post">
                            @include('review.form')
                            <button type="submit" class="btn blue-gradient float-right wf-mplus1p" >更新</button>
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection