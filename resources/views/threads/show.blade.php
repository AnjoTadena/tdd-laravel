@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$thread->title}}</div>
                <div class="card-body">
                    {{$thread->body}}
                </div>
                <div class="card-footer">By: <a href="#">{{$thread->creatorName()}}</a></div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center" style="margin-top: 25px;">
        <div class="col-md-8">
            <hr>

            <h3>{{$thread->replies->count()}} replies...</h3>
        </div>
    </div>

    @foreach ($thread->replies as $reply)
        @include('threads.reply')
    @endforeach
</div>
@endsection
