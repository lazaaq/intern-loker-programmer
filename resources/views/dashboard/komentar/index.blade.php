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
</style>
@endsection

@section('heading')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ $user->name }}'s Komentar Posts
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
                <div class="d-flex w-100 mb-3">
                    <form action="" method="post" class="ms-auto" style="width: fit-content">
                        @csrf
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Postingan">
                    </form>
                </div>
                @foreach($komentars as $komentar)
                <div class="box">
                    <div class="d-flex align-items-center w-100">
                        <div class="gambar">
                            <img src="{{ asset($komentar->user->photo) }}" alt="" width="50px" class="rounded-circle">
                        </div>
                        <div class="ms-3 d-block">
                            <p class="mb-0 text-primary">
                                {{ $komentar->user->name }}
                            </p>
                            <p class="mb-0 text-dark">
                                {{ $komentar->body }}
                            </p>
                        </div>
                        <div class="ms-auto">
                            <a href="/post/{{ $komentar->post->slug }}" class="btn btn-info text-light">
                                <i class="bi bi-eye"></i>
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger d-inline-block" data-bs-toggle="modal" data-bs-target="#hapus_{{ $komentar->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="hapus_{{ $komentar->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">Hapus Komentar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            Apakah Anda yakin ingin menghapusnya?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('komentar.destroy', $komentar->id) }}" method="post" class="d-inline-block">
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