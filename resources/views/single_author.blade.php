@extends('layouts.main')

@section('title', 'Author')

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
                        <img class="rounded-circle" src="{{$author->photo}}" alt="Photo Author" width="100px">
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
                    <a href="/author/{{$author->id}}">
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
                                    <a href="/author/{{$author->id}}"><img class="author-thumb" src="{{$author->photo}}" alt="Sal"></a>
                                </span>
                                <span class="author-meta">
                                    <span class="post-name"><a href="/author/{{$author->id}}">{{ $author->name }}</a></span><br />
                                    <span class="post-date">{{$post->updated_at}}</span><span class="dot"></span>
                                </span>
                                <span class="post-read-more"><a href="/post/{{$post->slug}}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
                                            <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
                                        </svg></a></span>
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