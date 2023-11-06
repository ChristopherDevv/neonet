<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class FollowingController extends Controller
{
    public function index(User $user)
    {
        $ids = $user->followings->pluck('id')->toArray();
        //verifica en toda la tabla post los ids buscados
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(30);
        
        return view('following', [
            'posts' => $posts
        ]);
    }
}
