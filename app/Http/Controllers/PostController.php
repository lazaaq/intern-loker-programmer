<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Liked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|image'
        ]);

        $validatedData['slug'] = Str::of($validatedData['judul'])->slug('-');

        $file = $request->file('thumbnail');
        $folder_tujuan = 'img/thumbnail';
        $filename = time() . "_" . $file->getClientOriginalName();
        $validatedData['thumbnail'] = $file->move($folder_tujuan, $filename);

        $validatedData['user_id'] = Auth::user()->id;

        Post::create([
            'user_id' => $validatedData['user_id'],
            'judul' => $validatedData['judul'],
            'slug' => $validatedData['slug'],
            'body' => $validatedData['body'],
            'thumbnail' => $validatedData['thumbnail'],
        ]);
        return redirect('/dashboard')->with('success_added', 'Post baru berhasil dipublish!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard/post/edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'body' => 'required',
            'thumbnail' => 'image'
        ]);

        $validatedData['slug'] = Str::of($validatedData['judul'])->slug('-');

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $folder_tujuan = 'img/thumbnail';
            $filename = time() . "_" . $file->getClientOriginalName();
            $validatedData['thumbnail'] = $file->move($folder_tujuan, $filename);
            $post->update([
                'thumbnail' => $validatedData['thumbnail']
            ]);
            Storage::delete($post->thumbnail);
        }

        $post->update([
            'judul' => $validatedData['judul'],
            'slug' => $validatedData['slug'],
            'body' => $validatedData['body'],
        ]);
        return redirect('/dashboard')->with('success_updated', 'Post berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        File::delete($post->thumbnail);
        $liked = Liked::where('post_id', $post->id)->delete();
        $komentar = Komentar::where('post_id', $post->id)->delete();
        $post->delete();
        return redirect('/dashboard')->with('success_deleted', 'Post berhasil dihapus!');
    }
}
