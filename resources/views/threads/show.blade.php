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

    @if (auth()->check())
        <div class="row justify-content-center" style="margin-top: 25px;">
            <div class="col-md-8">
                <form method="POST" action="{{$thread->path() . '/replies'}}" class="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" class="form-control" placeholder="Something to say?" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="row justify-content-center" style="margin-top: 25px;">
            <div class="col-md-8">
                <p>Please <a href="{{route('login')}}">login</a> to participate.</p>
            </div>
        </div>
    @endif
</div>
@endsection
