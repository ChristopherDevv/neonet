<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfilePolicy
{
    public function editionShow(User $user, User $model)
    {
       //comprobamos el usuario autenticado con el usuario de la url u el que estamos pasando
       return $user->id === $model->id;
    }
   
}
