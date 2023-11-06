<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    public  $users = [];
    public $firstUsers;
    public $userNotFound = false;
    public $spinner = false;

    public function mount()
    {
        $this->firstUsers = User::latest()->take(9)->get();
    }

    public function searchUser()
    {
        $this->validate([
            'search' => 'required|max:255'
        ]);
        
        $this->firstUsers = [];
        $this->users = User::where('name', 'like', '%'.$this->search.'%')
                ->orWhere('username', 'like', '%'.$this->search.'%')
                ->get();

        if($this->users->isEmpty()){
            $this->userNotFound = true;
        }else{
            $this->userNotFound = false;
        }
        
        $this->search = '';
         // Emitir un evento de JavaScript personalizado para ocultar el spinner
         $this->dispatch('search-completed');
    }

    public function render()
    {
        return view('livewire.search-users', [
            'users' => $this->users,
        ]);
    }
}
