@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('css')
<style>
    .content .box {
        background-color: #e4e4e4;
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
        color: black;
    }

    .content .wrap-kanan button {
        color: black;
        text-decoration: underline;
    }

    .content .post-judul {
        color: black;
    }

    .content .post-judul:hover {
        color: #545F66;
        transition: 0.3s;
    }

    .content .author_link:hover {
        background-color: #c4c4c4!important;
        padding: 5px 5px;
        transition: 0.3s;
        border-radius: 0.5rem;
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
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @foreach($likeds as $liked)
                <div class="box">
                    <div class="d-flex align-items-center w-100">
                        <div class="gambar">
                            <a href="/author/{{ $liked->user->id }}">
                                <img src="{{ asset($liked->user->photo) }}" alt="" width="50px" class="rounded-circle">
                            </a>
                        </div>
                        <div class="ms-3 d-block">
                            <a class="mb-0 text-dark d-block text-decoration-none" href="/post/{{ $liked->post->slug }}">
                                {{ $liked->post->judul }}
                            </a>
                            <a class="mb-0 text-primary d-block text-decoration-none" style="font-size: 0.8rem" href="/author/{{ $liked->user->id }}">
                                {{ $liked->user->name }}
                            </a>
                        </div>
                        <div class="ms-auto">
                            <a href="/post/{{ $liked->post->slug }}" class="btn btn-info text-light">
                                <i class="bi bi-eye"></i>
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger d-inline-block" data-bs-toggle="modal" data-bs-target="#hapus_{{ $liked->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="hapus_{{ $liked->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">Hapus Like</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            Apakah Anda yakin ingin menghapusnya?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('liked.destroy', $liked->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection