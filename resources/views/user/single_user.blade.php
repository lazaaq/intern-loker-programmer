@extends('layouts.main')

@section('title', 'Author')

@section('css')
<style>
    .like_button {
        background-color: transparent;
        border: 0;
    }

    @media only screen and (max-width:768px) {
        .container .mainheading .image {
            display: none !important;
        }
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
                        <span class="author-description">
                            Email : {{ $author->email }}
                        </span><br>
                        @if($author->alamat != NULL)
                        <span class="author-description">
                            Alamat : {{ $author->alamat }}
                        </span><br>
                        @endif
                        @if($author->no_hp != NULL)
                        <span class="author-description">
                            Nomor Handphone : {{ $author->no_hp }}
                        </span><br>
                        @endif
                        @if($author->institusi != NULL)
                        <span class="author-description">
                            Institusi : {{ $author->institusi }}
                        </span>
                        @endif
                        <div class="sociallinks"><a target="_blank" href="https://www.facebook.com/wowthemesnet/"><i class="fa fa-facebook"></i></a> <span class="dot"></span> <a target="_blank" href="https://plus.google.com/s/wowthemesnet/top"><i class="fa fa-google-plus"></i></a></div>
                    </div>
                    <div class="col-md-2 col-xs-12 d-flex align-items-start image">
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
            <div class="row">
                @foreach($posts as $post)
                <!-- begin post -->
                <div class="authorpostbox col-lg-6">
                    <div class="card">
                        <a href="/post/{{$post->slug}}">
                            <img class="img-fluid img-thumb" src="{{asset($post->thumbnail)}}">
                        </a>
                        <div class="card-block">
                            <h2 class="card-title">
                                <a href="/post/{{$post->slug}}">{{$post->judul}}</a>
                            </h2>
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
                                        @if($post->liked_by_user)
                                        <form action="/dashboard/liked/1" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="bi bi-heart-fill"></i>
                                                {{ $post->like }}
                                            </button>
                                        </form>
                                        @else
                                        <form action="/dashboard/liked" method="post">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <button type="submit" class="border-0 bg-transparent">
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
                <!-- end post -->
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Author Posts
================================================== -->

@endsection