<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard/index', [
            'posts' => Post::where('user_id', $user->id)->get(),
            'user' => $user
        ]);
    }
}
