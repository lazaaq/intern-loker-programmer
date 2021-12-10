@extends('layouts.main')

@section('title', 'Post')

@section('css')
<style>
	.container.content {
		min-height: 70vh;
	}

	.content .card .card-title a {
		color: black;
		text-decoration: none;
	}

	.content .card .card-title a:hover {
		color: grey;
		transition: 0.2s;
	}

	.content .card form button {
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
		<div class="col-md-4">
			<div class="card">
				<a href="/post/{{$post->slug}}">
					<img class="img-fluid img-thumb" src="{{asset($post->thumbnail)}}">
				</a>
				<div class="card-block">
					<h2 class="card-title"><a href="/post/{{ $post->slug }}">{{ $post->judul  }}</a></h2>
					<div class="metafooter">
						<div class="wrapfooter">
							<span class="meta-footer-thumb">
								<a href="/author/{{ $post->user->id }}"><img class="author-thumb" src="{{ $post->user->photo  }}"></a>
							</span>
							<span class="author-meta">
								<span class="post-name"><a href="/author/{{ $post->user->id }}">{{ $post->user->name }}</a></span><br />
								<span class="post-date">{{$post->updated_at}}</span><span class="dot"></span>
							</span>
							<span class="post-read-more">
								@if($post->liked_by_user)
								<form action="/dashboard/liked/1" method="post">
									@csrf
									@method('DELETE')
									<input type="hidden" name="post_id" value="{{$post->id}}">
									<button type="submit">
										<i class="bi bi-heart-fill"></i>
										{{ $post->like }}
									</button>
								</form>
								@else
								<form action="/dashboard/liked" method="post">
									@csrf
									<input type="hidden" name="post_id" value="{{$post->id}}">
									<button type="submit">
										<i class="bi bi-heart"></i>
										{{ $post->like }}
									</button>
								</form>
								@endif
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection