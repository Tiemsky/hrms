<?php

namespace App\Http\Livewire\Training;

use Livewire\Component;
use App\Models\User;
use App\Models\Trainer;

class Trainers extends Component
{
    public $trainer, $role;

    public function addTrainer(){
        $this->validate([
            'trainer'   => 'required',
            'role'      => 'required'
        ]);

        Trainer::create([
            'user_id'   => $this->trainer,
            'role'      => $this->role,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('trainer');

    }
    public function render()
    {
        $users = User::get(['id','first_name','last_name','phone','email']);
        $trainers = Trainer::with(['user'])->paginate(10);
        return view('livewire.training.trainers', compact('users','trainers'));
    }
}
