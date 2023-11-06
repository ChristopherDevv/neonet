<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ExploreController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(50);
        $usersMd = User::take(11)->get();
        $usersMobile = User::take(8)->get();

        return view('welcome', [
            "posts" => $posts,
            "usersMd" => $usersMd,
            "usersMobile" => $usersMobile
        ]);
    }
}
