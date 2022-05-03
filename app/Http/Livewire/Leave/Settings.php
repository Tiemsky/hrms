<?php

namespace App\Http\Livewire\Leave;

use App\Models\Leave;
use App\Models\LeaveSettings;
use Livewire\Component;

class Settings extends Component
{

  public $days, $carry_forward, $earned_leave;


    public function render()
    {
        $leaves = Leave::latest()->with(['setting'])->get();
        return view('livewire.leave.settings',compact('leaves'));
    }
}
