<?php

namespace App\Livewire;

use Livewire\Component;

class PostModal extends Component
{
    public $post;
    public $saludo = 1;
    protected $listeners = ['showPostModal' => 'showPostModal'];

    public function showPostModal($post)
    {
        $this->post = $post;
        // Lógica para mostrar el modal
    }
    public  function mount()
    {
        $this->saludo = 'popup-modal-' . $this->post->id;
       
    }
 
    public function render()
    {
        return view('livewire.post-modal');
    }
}
