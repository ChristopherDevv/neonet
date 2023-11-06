<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
      if($this->authorize('editionShow', $user))
      {
        return view('profile.index');
      }
      
    }

    public function store(Request $request)
    {   
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:15'],
            'name' => ['required', 'min:3', 'max:15'],
            'email' => ['required', 'max:30', 'unique:users,email,'.auth()->user()->id, 'email' ],
            'url' => ['max:80'],
            'description' => ['max:40']
        ]);

        if($request->url && !filter_var($request->url, FILTER_VALIDATE_URL))
        {
            return back()->withErrors(['url' => 'URL typed is not valid']);
        }

        if($request->image){
            $image = $request->file('image');
            //nombre unicos
             $imageName = Str::uuid() . "." . $image->extension();
             //imagne que se guarda en el servidor
             $serverImage = Image::make($image);
             $pathImage = storage_path('app/public/profiles') . '/' . $imageName;
             //guarda la imagen una vez procesada
             $serverImage->save($pathImage);
        }

        if($request->coverimg){
          $coverImage = $request->file('coverimg');
          //nombres unicos
          $imageNameCover = Str::uuid() . "." . $coverImage->extension();
          //save at service
          $serverCoverImg = Image::make($coverImage);
          $pathCoverImg = storage_path('app/public/coversimg') . '/' . $imageNameCover;
          //save
          $serverCoverImg->save($pathCoverImg);
        }

        //save changes
        //Si $imageName existe (es decir, si se subió una imagen), usa eso. Si no, mantiene la imagen actual del usuario. Si el usuario tampoco tiene una imagen, asigna null.
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageName ?? auth()->user()->image ?? null;
        $user->coverimg = $imageNameCover ?? auth()->user()->coverimg ?? null;
        $user->url = $request->url;
        $user->description = $request->description;
        $user->save();

        $this->checkUnsedImage();
        $this->checkUnsedImageCover();

        return redirect()->route('post.index', $user);
    }

    public function checkUnsedImage()
    {
        // Obtén todos los nombres de archivo en la carpeta 'storage/app/public/profiles'
        $filesInFolder = File::files(storage_path('app/public/profiles'));
        foreach($filesInFolder as $path)
        {
            $file = pathinfo($path);
            // Verifica si la imagen está asociada con un usuario
            $imgUser = User::where('image', $file['basename'])->first();
            // Si la imagen no está asociada con un user, eliminando
            if(!$imgUser){
                $image_path = storage_path('app/public/profiles/' . $file['basename']);
                unlink($image_path);
            }
        }
    }
    public function checkUnsedImageCover()
{
    // Obtén todos los nombres de archivo en la carpeta 'storage/app/public/coversimg'
    $filesInFolder = File::files(storage_path('app/public/coversimg'));
    foreach($filesInFolder as $path)
    {
        $file = pathinfo($path);
        // Verifica si la imagen está asociada con un usuario
        $imgUser = User::where('coverimg', $file['basename'])->first();
        // Si la imagen no está asociada con un user, eliminando
        if(!$imgUser){
            $image_path = storage_path('app/public/coversimg/' . $file['basename']);
            unlink($image_path);
        }
    }
}
}
