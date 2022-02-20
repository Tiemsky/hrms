<?php

namespace App\Http\Livewire\User;
use App\Models\User as UserModels;

use Livewire\Component;

class Users extends Component
{
    public $userID;

    public function getUserId($id)
    {
        $this->userID = $id;
    }
    public function delete()
    {
        UserModels::where('id')->update([]);
        $this->dispatchBrowserEvent('deletedSucessfully');

    }
    public function render()
    {
        $users = UserModels::where('isAdmin',0)->get();
        return view('livewire.user.users', compact('users'));
    }
}
