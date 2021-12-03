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
        <form action="{{ route('profil.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box">
                <div class="row w-100">
                    <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                        Nama Lengkap
                    </div>
                    <div class="col-12 col-sm-7 col-xl-8 mt-1">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $user->name }}" name="name" id="name">
                        @error('name')
                        <div class="text-danger" style="font-size: 0.8rem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row w-100 mt-3">
                    <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                        Email
                    </div>
                    <div class="col-12 col-sm-7 col-xl-8 mt-1">
                        <input class="form-control @error('email') is-invalid @enderror" type="text" value="{{ $user->email }}" name="email" id="email">
                        @error('email')
                        <div class="text-danger" style="font-size: 0.8rem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row w-100 mt-3">
                    <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                        Alamat
                    </div>
                    <div class="col-12 col-sm-7 col-xl-8 mt-1">
                        <input class="form-control @error('alamat') is-invalid @enderror" type="text" value="{{ $user->alamat }}" name="alamat" id="alamat">
                        @error('alamat')
                        <div class="text-danger" style="font-size: 0.8rem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row w-100 mt-3">
                    <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                        Institusi
                    </div>
                    <div class="col-12 col-sm-7 col-xl-8 mt-1">
                        <input class="form-control @error('institusi') is-invalid @enderror" type="text" value="{{ $user->institusi }}" name="institusi" id="institusi">
                        @error('institusi')
                        <div class="text-danger" style="font-size: 0.8rem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row w-100 mt-3">
                    <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                        Nomor Handphone
                    </div>
                    <div class="col-12 col-sm-7 col-xl-8 mt-1">
                        <input class="form-control @error('no_hp') is-invalid @enderror" type="text" value="{{ $user->no_hp }}" name="no_hp" id="no_hp">
                        @error('no_hp')
                        <div class="text-danger" style="font-size: 0.8rem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row w-100 mt-3">
                    <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                        Deskripsi
                    </div>
                    <div class="col-12 col-sm-7 col-xl-8 mt-1">
                        <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description">{{ $user->description }}</textarea>
                        @error('description')
                        <div class="text-danger" style="font-size: 0.8rem">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row w-100 mt-3">
                    <div class="col-12 col-sm-5 col-xl-4 d-flex align-items-start">
                        Foto
                    </div>
                    <div class="col-12 col-sm-7 col-xl-8 mt-1">
                        <img src="{{ asset($user->photo) }}" alt="Profil Photo" width="200px" class="rounded">
                        <div class="image-form">
                            <input type="file" name="photo" id="photo" class="form-control mt-2 @error('photo') is-invalid @enderror">
                            @error('photo')
                            <div class="text-danger" style="font-size: 0.8rem">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-3 tombol">
                    <a href="{{ route('profil.index') }}" class="btn btn-danger d-block ms-3 me-2" style="width: fit-content">Batal</a>
                    <button type="submit" class="btn btn-success" style="width: fit-content">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('#imgPreview');

        imgPreview.style.display = 'block';
        $('.image-form').css('margin-left', 'auto');

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection