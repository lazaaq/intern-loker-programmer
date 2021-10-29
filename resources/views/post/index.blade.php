@extends('layouts.main')

@section('title', 'Post')

@section('css')
<style>
	.container.content {
		min-height: 70vh;
	}
	.content .card .title form button {
		background-color: transparent;
		border: 0;
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
		<div class="col-md-6 col-lg-4 mb-3">
			<div class="card">
				<img src="{{asset($post->thumbnail)}}" class="card-img-top">
				<div class="card-body">
					<div class="title d-flex">
						<h5 class="card-title">{{$post->judul}}</h5>
						<div class="icon ms-auto">
							<form action="/dashboard/liked" method="post">
								@csrf
								<input type="hidden" name="post_id" value="{{$post->id}}">
								<button type="submit">
									<i class="bi bi-heart"></i>
								</button>
							</form>
						</div>
					</div>
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