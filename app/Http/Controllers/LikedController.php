<?php

namespace App\Http\Controllers;

use App\Models\Liked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $liked = Liked::with('post')->where('user_id', $user->id)->get();
        return view('dashboard/liked/index',[
            'active' => 'liked',
            'user' => $user,
            'likeds' => $liked
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
        $user = Auth::user();
        Liked::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id
        ]);
        $post = Post::find($request->post_id);
        $like_post = $post->like;
        $post->update([
            'like' => $like_post + 1
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Liked  $liked
     * @return \Illuminate\Http\Response
     */
    public function show(Liked $liked)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Liked  $liked
     * @return \Illuminate\Http\Response
     */
    public function edit(Liked $liked)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Liked  $liked
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liked $liked)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Liked  $liked
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $liked = Liked::where('user_id', $user->id)->where('post_id', $request->post_id);
        $liked->delete();
        $post = Post::find($request->post_id);
        $like_post = $post->like;
        $post->update([
            'like' => $like_post - 1
        ]);
        return back();
    }
}
