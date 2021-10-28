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
    public function post()
    {
        return view('post', [
            'active' => 'post',
            'posts' => Post::all()
        ]);
    }
    public function single_post(Post $post)
    {
        return view('single_post',[
            'post' => $post,
            'author' => User::find($post->user_id),
            'active' => 'post'
        ]);
    }
    public function author()
    {
        return view('author', [
            'active' => 'author',
            'authors' => User::all()
        ]);
    }
    public function single_author(User $user)
    {
        return view('single_author', [
            'author' => $user,
            'posts' => Post::where('user_id', $user->id)->get(),
            'active' => 'author'
        ]);
    }
}
