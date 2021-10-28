@extends('layouts.dashboard')

@section('title'. 'Edit Post')

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
<!-- Bootstrap 5 Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<!-- Theme style -->
<link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
<link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
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

    .bold {
        font-weight: 700;
    }
</style>
@endsection

@section('heading')
<h4 class="bold">
    Edit Post
</h4>
@endsection

@section('content')
<div class="py-12 content">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Post</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Hello World" value="{{$post->judul}}">
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail Post</label>
                        <br>
                        <img class="img-fluid mb-3 col-sm-5" id="imgPreview" src="{{$post->thumbnail}}">
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail" onchange="previewImage()">
                        @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 ">
                        <label for="body" class="form-label">Body Post</label>
                        <textarea id="summernote" name="body" class="@error('body') is-invalid @enderror">{{$post->body}}</textarea>
                        @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="tombol">
                        <button type="submit" class="btn btn-info">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })

    function previewImage() {
        const image = document.querySelector('#thumbnail');
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