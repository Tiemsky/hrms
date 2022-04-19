<?php

namespace App\Http\Livewire\Leave;

use App\Models\Leave;
use App\Models\LeaveSettings;
use Livewire\Component;

class Settings extends Component
{

  public $days, $carry_forward, $earned_leave, $custom_policy, $showSettings=false, $leave_id=0;

//
//  public function getLeaveInfo($leave_id){
//      return leaveSettings::where('leave_id',$leave_id)->first();
//  }



public function  showLeaveSetting($leave_id){
    $this->showSettings= !$this->showSettings;
    $this->leave_id = $leave_id;
    $settings =leaveSettings::where('leave_id',$leave_id)->first();
    if ($settings){

        $this->days = $settings->days;
        $this->carry_forward = $settings->carry_forward;
        $this->earned_leave = $settings->earned_leave;
        $this->custom_policy = $settings->custom_policy;
    }
    
}
    public function save($leave_id){

      dd($leave_id);
//       $data = $this->validate([
//            'days'  => 'required|integer',
//            'carry_forward' => 'required',
//            'earned_leave'  => 'required'
//        ]);
//
//        LeaveSettings::updateOrCreate(
//            ['leave_id' =>  $leave_id],
//            $data
//        );

    }

    public function render()
    {
        $leaves = Leave::latest()->with(['setting'])->get();
        return view('livewire.leave.settings',compact('leaves'));
    }
}
