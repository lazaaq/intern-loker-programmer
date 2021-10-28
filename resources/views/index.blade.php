@extends('layouts.main')

@section('title', 'Home')

@section('css')
<style>
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
</style>
@endsection

@section('content')
<!-- Begin Site Title
================================================== -->
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">Postify</h1>
		<p class="lead">
			Collection of posts from authors around the world
		</p>
	</div>
	<!-- End Site Title
================================================== -->
</div>

<section class="my">
	<div class="container">
		<div class="judul">LANA SAIFUL AQIL</div>
		<div class="subjudul">Inter Loker Programmer</div>
	</div>
</section>
@endsection