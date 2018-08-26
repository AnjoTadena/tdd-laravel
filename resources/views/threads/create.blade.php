@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<form method="POST" action="{{route('threads.store')}}">
				{{csrf_field()}}
			  <div class="form-group">
			    <label for="title">Title: </label>
			    <input type="text" name="title" class="form-control" id="title" placeholder="Thread title...">
			  </div>
			  <div class="form-group">
			    <label for="body">Body: </label>
			    <textarea rows="8" name="body" class="form-control" id="body" placeholder="Thread body..."></textarea>
			  </div>
			  <div class="form-group">
			  	<button class="btn btn-default">Publish</button>
			  </div>
			</form>
		</div>
    </div>
</div>
@endsection
