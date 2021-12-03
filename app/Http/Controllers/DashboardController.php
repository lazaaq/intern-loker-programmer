<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');
        return view('dashboard/index', [
            'posts' => Post::where('user_id', $user->id)->where('judul', 'like', '%' . $search . '%')->get(),
            'user' => $user,
            'search' => $search
        ]);
    }
}
