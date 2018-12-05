@extends('layouts/app')

@section('content')

	@foreach($blogs as $blog)

		<div class="card mx-auto" style="width: 34rem; margin-top: 40px;">
		  <img class="card-img-top" src="{{ asset('storage/' . $blog->image_path) }}" alt="Card image cap">
		  <div class="card-body">
		    <h1><a class="card-title" href="{{ $blog->path() }}">{{ $blog->title }}</a></h1>
		    <h6><a class="card-subtitle mb-2 text-muted" href="/blogs/user/{{ $blog->user->id }}">{{ $blog->user->name }} </a></h6>
		    <p class="card-text">{{ $blog->body }}</p>
		    @if(auth()->id() == $blog->user_id)

				<div class="btn-group" role="group" aria-label="Basic example">
					<a href="/blogs/{{ $blog->id }}/edit" class="btn btn-secondary">Edit</a>
					<form method="POST" action="{{ $blog->path() }}">
						@csrf
						@method('DELETE')
						<button class="btn btn-secondary">Delete</button>
					</form>
				</div>
			@endif
		  </div>
		</div>
	@endforeach
@endsection