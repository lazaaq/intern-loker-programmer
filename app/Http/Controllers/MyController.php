<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Liked;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        if (Auth::check()) {
            $user = Auth::user();
            $likeds = Liked::where('user_id', $user->id)->get();
            foreach ($posts as $post) {
                $post['liked_by_user'] = 0;
                foreach ($likeds as $liked) {
                    if ($liked->post_id == $post->id) {
                        $post['liked_by_user'] = 1;
                        break;
                    }
                }
            }
        }
        return view('index', [
            'active' => 'home',
            'posts' => $posts
        ]);
    }
    public function post(Request $request)
    {
        $posts = Post::where('judul', 'like', '%' . $request->judul . '%')->get();
        if (Auth::check()) {
            $user = Auth::user();
            $likeds = Liked::where('user_id', $user->id)->get();
            foreach ($posts as $post) {
                $post['liked_by_user'] = 0;
                foreach ($likeds as $liked) {
                    if ($liked->post_id == $post->id) {
                        $post['liked_by_user'] = 1;
                        break;
                    }
                }
            }
        }
        return view('post/index', [
            'active' => 'post',
            'posts' => $posts,
            's' => $request->judul
        ]);
    }
    public function single_post(Post $post)
    {
        $post['liked_by_user'] = 0;
        if (Auth::check()) {
            $user = Auth::user();
            $likeds = Liked::where('user_id', $user->id)->get();
            foreach ($likeds as $liked) {
                if ($liked->post_id == $post->id) {
                    $post['liked_by_user'] = 1;
                    break;
                }
            }
        }
        return view('post/single_post', [
            'post' => $post,
            'author' => User::find($post->user_id),
            'active' => 'post',
            'komentars' => Komentar::where('post_id', $post->id)->latest()->get()
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
        $posts = Post::where('user_id', $user->id)->get();
        if (Auth::check()) {
            $user_now = Auth::user();
            $likeds = Liked::where('user_id', $user_now->id)->get();
            foreach ($posts as $post) {
                $post['liked_by_user'] = 0;
                foreach ($likeds as $liked) {
                    if ($liked->post_id == $post->id) {
                        $post['liked_by_user'] = 1;
                        break;
                    }
                }
            }
        }
        return view('user/single_user', [
            'author' => $user,
            'posts' => $posts,
            'active' => 'author'
        ]);
    }
}
