@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('css')
<style>
    .content .box {
        background-color: #242424;
        padding: 1rem;
        border-radius: 6px;
        margin: 5px 0;
        color: white;
        display: flex;
        align-items: center;
    }

    .content .box .judul {
        font-weight: 700;
        font-size: 1.5rem;
        text-decoration: underline;
    }

    .content .box .kanan {
        display: flex;
        align-items: flex-start;
    }

    .content .wrap-kanan a {
        color: white;
    }

    .content .wrap-kanan button {
        color: white;
        text-decoration: underline;
    }

    .content .post-judul {
        color: white;
    }

    .content .post-judul:hover {
        color: lightblue;
        transition: 0.3s;
    }
</style>
@endsection

@section('heading')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ $user->name }}'s Liked Posts
</h2>
@endsection

@section('content')
<div class="py-12 content">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @foreach($likeds as $liked)
                <div class="box">
                    <div class="kiri pe-3 d-flex">
                        <div class="judul">
                            <a href="/post/{{ $liked->post->slug }}" class="post-judul">{{$liked->post->judul}}</a>
                        </div>
                        <div class="like d-flex align-items-center ms-3">
                            <form action="/dashboard/liked/1" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="post_id" value="{{$liked->post->id}}">
                                <button type="submit">
                                    <i class="bi bi-heart-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="kanan ms-auto">
                        <div class="user">
                            <a href="/author/{{$liked->post->user->id}}" class="text-light text-decoration-none">
                                <div class="d-flex" style="width: fit-content;">
                                    <img src="{{$liked->post->user->photo}}" width="50px" class="rounded-circle">
                                    <span class="d-flex align-items-center ms-2">
                                        {{$liked->post->user->name}} <br>
                                        {{ $liked->post->updated_at }}
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection