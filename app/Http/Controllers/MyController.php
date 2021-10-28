<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        return view('index', [
            'active' => 'home'
        ]);
    }
    public function post(Request $request)
    {
        $posts = Post::where('judul', 'like', '%' . $request->judul . '%')->get();
        return view('post/index', [
            'active' => 'post',
            'posts' => $posts,
            's' => $request->judul
        ]);
    }
    public function single_post(Post $post)
    {
        return view('post/single_post',[
            'post' => $post,
            'author' => User::find($post->user_id),
            'active' => 'post'
        ]);
    }
    public function author(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->name . '%')->get();
        return view('user/index', [
            'active' => 'author',
            'authors' => $users,
            's' => $request->name
        ]);
    }
    public function single_author(User $user)
    {
        return view('user/single_user', [
            'author' => $user,
            'posts' => Post::where('user_id', $user->id)->get(),
            'active' => 'author'
        ]);
    }
}
