@extends('layouts.dashboard')

@section('title'. 'Dashboard')

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
    {{ Auth::user()->name }}'s Dashboard
</h2>
@endsection

@section('content')
<div class="py-12 content">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{route('post.create')}}" class="btn btn-primary mb-4">Buat Artikel Baru</a>
                @foreach($posts as $post)
                <div class="box">
                    <div class="kiri pe-3">
                        <div class="judul">
                            <a href="/post/{{ $post->slug }}" class="post-judul">{{$post->judul}}</a>
                        </div>
                    </div>
                    <div class="kanan ms-auto mb-auto">
                        <div class="wrap-kanan d-flex">
                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-success me-2">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{route('post.destroy', $post->id)}}" method="post" class="mb-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
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