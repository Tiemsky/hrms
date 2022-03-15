<?php

namespace App\Http\Livewire\Leave;

use App\Models\RequestedLeave;
use Livewire\Component;

class Leave extends Component
{
    public function render()
    {
        $requestedLeaves = RequestedLeave::all();
        return view('livewire.leave.leave', compact('requestedLeaves'));
    }
}
