<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
       $image = $request->file('file');

       //nombre unicos
        $imageName = Str::uuid() . "." . $image->extension();

        //imagne que se guarda en el servidor
        $serverImage = Image::make($image);
        //$serverImage->fit(1000,1000);
        
        $pathImage = storage_path('app/public/uploads') . '/' . $imageName;
        //guarda la imagen una vez procesada
        $serverImage->save($pathImage);

        //retornamos el nombre de la imagen que tinene el id unico par la db
       return response()->json([
            'image' => $imageName
       ]);
    }
}
