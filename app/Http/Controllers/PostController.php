<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(User $user)
    {
        //dd($user->username);
        //$user = User::where('username', $user)->first();
        //$posts = Post::where('user_id', $user->id)->get();
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(15);
      
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {        
        $request->validate([
            'title' => 'max:255',
            'description' => 'max:255',
            'image' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);

        $tagsNames = ['tag1', 'tag2', 'tag3', 'tag4', 'tag5', 'tag6', 'tag7', 'tag8', 'tag9' ];

        foreach($tagsNames as $tagName){
            if($request->has($tagName)){
                // Buscar la etiqueta por nombre, o crear una nueva si no existe
               $tag = Tag::firstOrCreate(['name' => $request->input($tagName)]);
               //asociar la etiqueta al post
                $post->tags()->attach($tag);
            }
        }

        $this->checkUnusedImages();

        return redirect()->route('post.index', auth()->user());
    }

    public function show(User $user, Post $post)
    {
        $tags = $post->tags;
        //dd($tags); // Volcado y muerte de $tags
        return view('post.show', [
            'post' => $post,
            'user' => $user,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        $image_path = public_path('uploads/' . $post->image);
        if(File::exists($image_path)){
            unlink($image_path);
        }

        return redirect()->route('post.index', auth()->user()->username);
    }

    public function checkUnusedImages()
    {
        // Obtén todos los nombres de archivo en la carpeta 'uploads'
        $filesInFolder = File::files(public_path('uploads'));

        foreach($filesInFolder as $path)
        {

            $file = pathinfo($path);
    
            // Verifica si la imagen está asociada con un post
            $post = Post::where('image', $file['basename'])->first();
    
            // Si la imagen no está asociada con un post, eliminando
            if(!$post) {
                $image_path = public_path('uploads/' . $file['basename']);
                unlink($image_path);
            }
        }

    }

}

