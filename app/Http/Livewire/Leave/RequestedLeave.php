<?php

namespace App\Http\Livewire\Leave;

use App\Models\RequestedLeave as ModelsRequestedLeave;
use Livewire\Component;

class RequestedLeave extends Component
{
    public function render()
    {
        $requestedLeaves = ModelsRequestedLeave::all();
        return view('livewire.leave.requested-leave', compact('requestedLeaves'));
    }
}
