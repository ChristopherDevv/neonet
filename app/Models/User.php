<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /* Cuando defines una relación belongsToMany, los tercer y cuarto argumentos representan las claves foráneas de 
    la tabla intermedia (en este caso, la tabla followers). El tercer argumento es la clave foránea que se 
    relaciona con el modelo en el que estás definiendo la relación (el modelo User), y el cuarto argumento es 
    la clave foránea que se relaciona con el modelo que estás asociando (también el modelo User, ya que estás 
    definiendo una relación de muchos a muchos entre usuarios). */
    //ALMACENA LOS SEGUIDORES DE UN USUARIO (el usuario actaul pertene a los sugidos de otros usuarios)
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    //ALAMCENASMOS LOS QUE SEGUIMOS (el usuario es el segudio de los demas)
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }


    public function virifyFollower()
    {
        //Laravel buscará un modelo User con el mismo ID en la colección de seguidores. Es decir, está buscando un 
        //seguidor cuyo ID sea igual al ID del usuario autenticado.
        //verifica en su colleccion de seguidores
        return $this->followers->contains(auth()->user()->id);
    }

    public function likedPosts()
{
    return $this->belongsToMany(Post::class, 'likes');
}

}
