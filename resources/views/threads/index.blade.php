@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Threads</div>
                @foreach ($threads as $thread)
                    <div class="card-body">
                        <h2><a href="{{$thread->path()}}">{{ $thread->title }}</a></h2>
                        <p>{{ $thread->body }}</p>
                    </div>
               @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
