<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        //añade al usuario autenticado a la lista de seguidores del usuario objetivo
        //el metodo followers lee el usuario que visitamos y tambien le pasamos nuesntro id en auth
        /* Cuando haces $user->followers()->attach(auth()->user()->id), estás utilizando el constructor de consultas 
        para añadir un nuevo seguidor a la relación. Esto no sería posible con $user->followers, ya que esto sólo 
        te daría los seguidores que ya han sido cargados */
        $user->followers()->attach(auth()->user()->id );
        return back();
    }

    public function destroy(User $user)
    {
        $user->followers()->detach(auth()->user()->id);
        return back();
    }
}
