@extends('layouts.main')

@section('title', 'Author')

@section('css')
<style>
    .like_button {
        background-color: transparent;
        border: 0;
    }
</style>
@endsection

@section('content')
<!-- Begin Top Author Page
================================================== -->
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="mainheading">
                <div class="row post-top-meta authorpage">
                    <div class="col-md-10 col-xs-12">
                        <h1>{{$author->name}}</h1>
                        <span class="author-description">{{$author->description}}</span>
                        <div class="sociallinks"><a target="_blank" href="https://www.facebook.com/wowthemesnet/"><i class="fa fa-facebook"></i></a> <span class="dot"></span> <a target="_blank" href="https://plus.google.com/s/wowthemesnet/top"><i class="fa fa-google-plus"></i></a></div>
                    </div>
                    <div class="col-md-2 col-xs-12 d-flex align-items-start">
                        @if($author->photo != null)
                        <img class="rounded-circle" src="{{$author->photo}}" width="100px">
                        @else
                        <img class="rounded-circle" src="/img/people/default.jpg" width="100px">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Top Author Meta
================================================== -->

<!-- Begin Author Posts
================================================== -->
<div class="graybg authorpage">
    <div class="container">
        <div class="listrecent listrelated">
            @foreach($posts as $post)
            <!-- begin post -->
            <div class="authorpostbox">
                <div class="card">
                    <a href="/post/{{$post->slug}}">
                        <img class="img-fluid img-thumb" src="{{asset($post->thumbnail)}}">
                    </a>
                    <div class="card-block">
                        <h2 class="card-title">
                            <a href="/post/{{$post->slug}}">{{$post->judul}}</a>
                        </h2>
                        <h4 class="card-text">
                            {!! $post->body !!}
                        </h4>
                        <div class="metafooter">
                            <div class="wrapfooter">
                                <span class="meta-footer-thumb">
                                    <a href="/author/{{$author->id}}">
                                        @if($author->photo != null)
                                        <img class="author-thumb" src="{{$author->photo}}" width="50px">
                                        @else
                                        <img class="author-thumb" src="/img/people/default.jpg" width="50px">
                                        @endif
                                    </a>
                                </span>
                                <span class="author-meta">
                                    <span class="post-name"><a href="/author/{{$author->id}}">{{ $author->name }}</a></span><br />
                                    <span class="post-date">{{$post->updated_at}}</span><span class="dot"></span>
                                </span>
                                <span class="post-read-more">
                                    <form action="{{route('liked.store')}}" method="post">
                                        @csrf
                                        <button type="submit" class="like_button">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->
            @endforeach
        </div>
    </div>
</div>
<!-- End Author Posts
================================================== -->

<!-- Begin Twitter Timeline
================================================== -->
<div class="container margtop3rem">
    <a class="twitter-grid" href="https://twitter.com/TwitterDev/timelines/539487832448843776">WowThemesNet Tweets</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>
<!-- End Twitter Timeline
================================================== -->

@endsection