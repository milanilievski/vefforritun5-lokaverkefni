@extends('layouts/app')

@section('content')
	<div class="justify-content-center">
		<div class="jumbotron mx-auto" style="width: 34rem;">
			<img style="height: 100%; width: 100%; padding-bottom: 40px;" src="{{ asset('storage/' . $blog->image_path) }}" alt="Card image cap">
			<h1 class="display-4">{{ $blog->title }}</h1>
			<p class="lead">{{ $blog->body }}</p>
			<hr class="my-4">
			<p>{{ $blog->user->name }}</p>
		</div>
	</div>
@endsection