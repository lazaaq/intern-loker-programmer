<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $komentar = Komentar::with('post', 'user')->where('user_id', $user->id)->get();
        return view('dashboard/komentar/index',[
            'active' => 'komentar',
            'user' => $user,
            'komentars' => $komentar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'post_id' => 'required',
            'body' => 'required'
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        Komentar::create($validatedData);
        $post = Post::find($request->post_id);
        $komentar_post = $post->komentar;
        $post->update([
            'komentar' => $komentar_post + 1
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komentar = Komentar::find($id);
        $post = Post::find($komentar->post_id);
        $komentar->delete();
        $komentar_post = $post->komentar;
        $post->update([
            'komentar' => $komentar_post - 1
        ]);
        return redirect('/dashboard/komentar')->with('success', 'Berhasil menghapus komentar');
    }
}
