<?php

namespace App\Http\Livewire\Leave;

use App\Models\Leave;
use App\Models\LeaveSettings;
use Livewire\Component;

class Settings extends Component
{

  public $days, $carry_forward, $earned_leave, $custom_policy;

  public function mount(){

  }

    public function save($leave_id){
       $data = $this->validate([
            'days'  => 'required|integer',
            'carry_forward' => 'required',
            'earned_leave'  => 'required'
        ]);

        LeaveSettings::updateOrCreate(
            ['leave_id' =>  $leave_id],
            $data
        );
        
    }

    public function render()
    {
        $leaves = Leave::latest()->with(['setting'])->get();
        return view('livewire.leave.settings', compact('leaves'));
    }
}
