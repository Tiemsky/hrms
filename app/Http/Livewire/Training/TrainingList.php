<?php

namespace App\Http\Livewire\Training;

use App\Models\User;
use Livewire\Component;

class TrainingList extends Component
{
    public function render()
    {
        $trainers ='';
        $users = User::all();
        return view('livewire.training.training-list', compact('users'));
    }
}
