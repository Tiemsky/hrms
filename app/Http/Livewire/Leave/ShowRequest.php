<?php

namespace App\Http\Livewire\Leave;

use Livewire\Component;

class ShowRequest extends Component
{
    public $user, $leave;
    public function render()
    {
        $user= $this->user;
        $leave = $this->leave;
        return view('livewire.leave.show-request', compact('user','leave'));
    }
}
