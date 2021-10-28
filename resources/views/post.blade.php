@extends('layouts.main')

@section('title', 'Post')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		@foreach($posts as $post)
		<div class="col-sm-6 col-lg-4">
			<div class="card">
				<img src="{{asset($post->thumbnail)}}" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title">{{$post->judul}}</h5>
					<a href="/post/{{$post->slug}}" class="btn btn-primary">Read More</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<!-- Begin AlertBar
================================================== -->
<div class="alertbar">
	<div class="container text-center">
		<img src="/assets/img/logo.png" alt=""> &nbsp; Never miss a <b>story</b> from us, get weekly updates in your inbox. <a href="#" class="btn subscribe">Get Updates</a>
	</div>
</div>
<!-- End AlertBar
================================================== -->

@endsection