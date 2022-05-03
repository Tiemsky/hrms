<?php

namespace App\Http\Livewire\Leave;

use App\Models\RequestedLeave as ModelsRequestedLeave;
use Livewire\Component;

class RequestedLeave extends Component
{
    public function render()
    {
        $requestedLeaves = ModelsRequestedLeave::with(['user.department','leave'])->get();
        return view('livewire.leave.requested-leave', compact('requestedLeaves'));
    }
}
