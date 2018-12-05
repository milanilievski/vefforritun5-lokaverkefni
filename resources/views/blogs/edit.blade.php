@extends('layouts/app')

@section('title', 'Edit')

@section('content')
	<h1>Edit this blog</h1>
	<form method="POST" action="{{ $blog->path() }}">
		@csrf
		@method('patch')
		<div class="form-group">
			<input placeholder="Title" type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
		</div>
		<div class="form-group">
			<textarea placeholder="Body" name="body" class="form-control" required>{{ $blog->body }}</textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Update</button>
		</div>
	</form>
@endsection