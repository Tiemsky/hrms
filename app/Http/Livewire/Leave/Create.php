<?php

namespace App\Http\Livewire\Leave;

use App\Models\Leave;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\LeaveSettings;

class Create extends Component
{
    public $status, $name, $selectedID;
    public $days, $carry_forward, $earned_leave;



    public function changeStatus($id)
    {
        $leave = $this->getInfo($id);
      if($leave->status == 1)
      {
        return Leave::where('id', $id)->update(['status' => 0]);

      }
          if($leave->status  == 0)
          {
          return Leave::where('id', $id)->update(['status' => 1]);


          }

    }

    public function create()
    {
        $this->validate(['name'=>'required|string']);
        Leave::create([
            'name'  => $this->name,
            'slug'  => Str::slug($this->name)
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('leave');
    }



    public function getInfo($id){
        $leave =Leave::with(['setting'])->where('id',$id)->first();
        $this->name         = $leave->name;
        $this->selectedID   = $id;
        if(isset($leave->setting)){
            $this->days         = $leave->setting->days;
            $this->earned_leave = $leave->setting->earned_leave;
            $this->carry_forward= $leave->setting->carry_forward;
        }else{
            $this->days         = '';
            $this->earned_leave = '';
            $this->carry_forward= '';
        }

        return $leave;
    }


    public function update(){
        Leave::where('id', $this->selectedID)->update(['name' => $this->name]);
        $this->reset();
        $this->dispatchBrowserEvent('leave');
    }

    public function createOrUpdateLeaveSettings(){

        $data = $this->validate([
             'days'  => 'required|integer',
             'carry_forward' => 'required',
             'earned_leave'  => 'required'
         ]);

         LeaveSettings::updateOrCreate(
             ['leave_id' =>  $this->selectedID],
             $data
         );
         $this->dispatchBrowserEvent('leave');
    }

    public function delete()
{
    Leave::where('id', $this->selectedID)->delete();
    $this->dispatchBrowserEvent('leave');
}


    public function render()
    {
        $leaves = Leave::all();
        return view('livewire.leave.create',compact('leaves'));
    }
}







// public function  showLeaveSetting($leave_id){
//     $this->showSettings= !$this->showSettings;
//     $this->leave_id = $leave_id;
//     $settings =Leave::findOrFail($leave_id)->setting;
//     // $settings =leaveSettings::where('leave_id',$leave_id)->first();
//     if (isset($settings->days)){
//         $this->days = $settings->days;
//         $this->carry_forward = $settings->carry_forward;
//         $this->earned_leave = $settings->earned_leave;
//         $this->custom_policy = $settings->custom_policy;
//     }else{
//         $this->days = '';
//         $this->carry_forward = '';
//         $this->earned_leave = '';
//         $this->custom_policy = '';
//     }

// }
//     public function save($leave_id){

//         $this->leave_id = $leave_id;
//       $data = $this->validate([
//            'days'  => 'required|integer',
//            'carry_forward' => 'required',
//            'earned_leave'  => 'required'
//        ]);

//        LeaveSettings::updateOrCreate(
//            ['leave_id' =>  $leave_id],
//            $data
//        );

//     }










