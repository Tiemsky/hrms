<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User as UserModels;

class UsersList extends Component
{
    public function render()
    {
        $users = UserModels::where('isAdmin',0)->get();
        return view('livewire.user.users-list', compact('users'));

    }
}
