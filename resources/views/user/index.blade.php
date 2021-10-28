@extends('layouts.main')

@section('title', 'Post')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		@foreach($authors as $author)
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="image d-flex align-items-center justify-content-center pt-4">
					<img src="{{$author->photo}}" class=" rounded-circle" width="100px">
				</div>
				<div class="card-body text-center">
					<h5 class="card-title">{{$author->name}}</h5>
					<a href="/author/{{$author->id}}" class="btn btn-primary">Read More</a>
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