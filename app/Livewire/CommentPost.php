<?php

namespace App\Livewire;

use Livewire\Component;

class CommentPost extends Component
{
    public $post;
    public $comment;

    public function mount($post)
    {
        $this->post = $post;   
    }

    public function postComment()
    {
        $this->validate([
            'comment' => 'required|max:255'
        ]);

        $this->post->comments()->create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comment' => $this->comment
        ]);

        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.comment-post');
    }
}
