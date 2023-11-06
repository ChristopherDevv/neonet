<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;
    public $totalLikes;
    public $showLikers = 1;

    public function mount($post)
    {
        if(auth()->check()) {
            $this->isLiked = $post->checkLike(auth()->user());
        }
        $this->likes = $post->likes->count();
        $this->showLikers = 'like-user-' . $this->post->id;
    }

    public function like()
    {
        
        if($this->post->checkLike(auth()->user())){
            //eliminanos el like del pots que esta registrado en la tabla likes columna post_id
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            if($this->likes > 0){
                $this->likes--;
            }
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
           ]);
           $this->isLiked = true;
           $this->likes++;
        }
        // Emite un evento cuando un usuario da "like" a un post
    $this->dispatch('postLiked', $this->post->id);
}

// En cualquier otro componente LikePost
protected $listeners = ['postLiked' => 'updateLike'];

public function updateLike($postId)
{
    // Si este componente está mostrando el post que recibió un "like", actualiza el estado
    if ($this->post->id === $postId) {
        $this->likes = $this->post->likes->count();
        $this->isLiked = $this->post->checkLike(auth()->user());
    }
}
    public function render()
    {
        return view('livewire.like-post');
    }
}
