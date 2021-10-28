@extends('layouts.main')

@section('title', 'Post')

@section('content')
<div class="container">
	<div class="row justify-content-center mt-3 mb-5">
		<h3 class="text-center">SEARCH AUTHOR</h3>
		<div class="col-sm-6">
			<form class="d-flex" action="">
				<input class="form-control me-2" placeholder="Search" name="name" value="{{$s}}">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</div>
	<div class="row justify-content-center">
		@foreach($authors as $author)
		<div class="col-sm-6 col-lg-3"> 
			<div class="card">
				<div class="image d-flex align-items-center justify-content-center pt-4">
					@if($author->photo != null)
					<img src="{{$author->photo}}" class=" rounded-circle" width="100px">
					@else
					<img src="/img/people/default.jpg" class="rounded-circle" width="100px">
					@endif
				</div>
				<div class="card-body text-center">
					<h5 class="card-title">{{$author->name}}</h5>
					<a href="/author/{{$author->id}}" class="btn btn-primary">Profil</a>
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