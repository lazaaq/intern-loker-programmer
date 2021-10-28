@extends('layouts.main')

@section('title', 'Post')

@section('css')
<style>
	.container.content {
		min-height: 70vh;
	}
</style>
@endsection

@section('content')
<div class="container content">
	<div class="row justify-content-center mt-3 mb-5">
		<h3 class="text-center">SEARCH POST</h3>
		<div class="col-sm-6">
			<form class="d-flex" action="">
				<input class="form-control me-2" placeholder="Search" name="judul" value="{{$s}}">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</div>
	<div class="row justify-content-center">
		@foreach($posts as $post)
		<div class="col-md-6 col-lg-4">
			<div class="card">
				<img src="{{asset($post->thumbnail)}}" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title">{{$post->judul}}</h5>
					<div class="author">
						<i class="bi bi-person-fill"></i>
						<a href="#" class="text-dark">
							{{ $post->user->name }}
						</a>
					</div>
					<a href="/post/{{$post->slug}}" class="btn btn-primary mt-2">Read More</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection