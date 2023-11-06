<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
       $post->likes()->create([
            'user_id' => $request->user()->id
       ]);

       return back();
    }

    public function destroy(Request $request, Post $post)
    {
       //eliminanos el like del pots que esta registrado en la tabla likes columna post_id
       $request->user()->likes()->where('post_id', $post->id)->delete();
       
       return back();
    }
}
