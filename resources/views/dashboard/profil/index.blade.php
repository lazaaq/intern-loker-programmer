@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('css')
<style>
    .content .box {
        background-color: #fff;
        padding: 1rem;
        border-radius: 6px;
        margin: 50px 0;  
        color: black;
    }
</style>
@endsection

@section('heading')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ $user->name }}'s Profile
</h2>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <div class="box">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row w-100">
                <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                    Nama Lengkap
                </div>
                <div class="col-12 col-sm-7 col-xl-8 mt-1">
                    <input class="form-control" type="text" value="{{ $user->name }}" disabled readonly>
                </div>
            </div>
            <div class="row w-100 mt-3">
                <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                    Email
                </div>
                <div class="col-12 col-sm-7 col-xl-8 mt-1">
                    <input class="form-control" type="text" value="{{ $user->email }}" disabled readonly>
                </div>
            </div>
            <div class="row w-100 mt-3">
                <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                    Alamat
                </div>
                <div class="col-12 col-sm-7 col-xl-8 mt-1">
                    <input class="form-control" type="text" value="{{ $user->alamat }}" disabled readonly>
                </div>
            </div>
            <div class="row w-100 mt-3">
                <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                    Institusi
                </div>
                <div class="col-12 col-sm-7 col-xl-8 mt-1">
                    <input class="form-control" type="text" value="{{ $user->institusi }}" disabled readonly>
                </div>
            </div>
            <div class="row w-100 mt-3">
                <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                    Nomor Handphone
                </div>
                <div class="col-12 col-sm-7 col-xl-8 mt-1">
                    <input class="form-control" type="text" value="{{ $user->no_hp }}" disabled readonly>
                </div>
            </div>
            <div class="row w-100 mt-3">
                <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                    Deskripsi
                </div>
                <div class="col-12 col-sm-7 col-xl-8 mt-1">
                    <textarea class="form-control" type="text" disabled readonly>{{ $user->description }}</textarea>
                </div>
            </div>
            <div class="row w-100 mt-3">
                <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start   ">
                    Foto
                </div>
                <div class="col-12 col-sm-7 col-xl-8 mt-1 d-flex">
                    <img src="{{ asset($user->photo) }}" alt="Profil Photo" width="200px" class="rounded">
                    <form action="{{ route('profil.remove_photo') }}" method="post" class="d-inline-block ms-auto" style="width: fit-content">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-danger" style="font-size: 0.8rem">Gunakan Foto Default</button>
                    </form>
                </div>
            </div>
            <div class="row mt-3 tombol">
                <a href="{{ route('profil.edit', $user->id) }}" class="btn btn-primary d-block ms-3" style="width: fit-content">Edit Profil</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection