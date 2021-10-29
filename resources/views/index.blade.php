@extends('layouts.main')

@section('title', 'Home')

@section('css')
<style>
	.content {
		background-color: #FF865E;
		padding: 2rem 0 4rem 0;
		color: white;
	}

	.my {
		height: 60vh;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.my .judul {
		font-size: 4rem;
		font-weight: 700;
		text-align: center;
	}

	.my .subjudul {
		font-size: 2rem;
		font-weight: 400;
		text-align: center;
	}

	.content .tombol a {
		background-color: #FEF9EF;
		color: black;
		text-decoration: none;
		padding: 0.5rem 1rem;
		border-radius: 1.2rem;
		font-size: 1.2rem;
		font-weight: 400;
	}

	.content .tombol a:hover {
		background-color: #242424;
		color: white;
	}

	.my form button {
		border: 0;
		background-color: transparent;
	}

	.my .card-title a {
		color: black;
		text-decoration: none;
	}

	.my .card-title a:hover {
		color: grey;
	}
</style>
@endsection

@section('content')
<!-- Begin Site Title
================================================== -->
<div class="content">
	<div class="container">
		<div class="mainheading">
			<h1 class="sitetitle">Postify</h1>
			<p class="lead" style="font-weight:600">
				Postify is a place to write, read, and connect
			</p>
			<p class="lead" style="font-weight: 300;">It's easy and free to post your thinking on any topic and connect with millions of readers.</p>
		</div>
		<div class="tombol">
			<a href="/register" class="mybutton">Start Writing</a>
		</div>
		<!-- End Site Title
		================================================== -->
	</div>
</div>

<section class="my">
	<div class="container">
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
										</button>
									</form>
									@else
									<form action="/dashboard/liked" method="post">
										@csrf
										<input type="hidden" name="post_id" value="{{$post->id}}">
										<button type="submit">
											<i class="bi bi-heart"></i>
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
</section>
@endsection