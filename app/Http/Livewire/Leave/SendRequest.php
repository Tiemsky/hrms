<?php

namespace App\Http\Livewire\Leave;

use App\Models\Leave;
use App\Models\RequestedLeave;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendRequest extends Component
{
    public $leave_id, $leave_from, $leave_to, $number_of_day, $remaining_day, $leave_reason;
    public $startDay, $endDay, $leave_max_day;
    public $error_msg = '';


    public function updatedLeaveId(){
        if(!$this->leave_id == null){
           $leave_day =  Leave::with('setting')->where('id', $this->leave_id)->first();
            $this->leave_max_day = $leave_day->setting->days;
        }
    }

    public function updatedLeaveFrom(){
         $this->startDay = strtotime($this->leave_from) ;

    }

    public function updatedLeaveTo(){
        $this->endDay        = strtotime($this->leave_to) ;
        if($this->endDay - $this->startDay < 0){
            return $this->error_msg='Damn...! Make sure dates are correct';
        }
        $this->error_msg = '';
        $this->number_of_day = abs(round($this->endDay  - $this->startDay) / 86400);
        if($this->number_of_day > $this->leave_max_day){
            $this->error_msg = 'Cannot exceed to the max day set by the admin';
            return $this->number_of_day = '';
        }

    }



    public function submitLeave(){
        $data = $this->validate([
            'leave_id' => 'required',
            'leave_from'    => 'required',
            'leave_to'      => 'required',
            'number_of_day'      => 'required',
            'leave_reason'   => 'required'
        ]);
        if($this->endDay - $this->startDay < 0){
            return $this->error_msg='Damn...! Make sure dates are correct';
        }
        $data = array_merge($data, [
            'user_id' => Auth::user()->id,
            'number_of_day' => $this->number_of_day
        ]);

        RequestedLeave::create($data);
        $this->reset();
        $this->dispatchBrowserEvent('leave_requested');
    }



    public function render()
    {
        $leaves = Leave::with(['setting'])->get();
        $myLeaves = RequestedLeave::with('leave')->where('user_id', Auth::user()->id)->get();
        return view('livewire.leave.send-request', compact('leaves','myLeaves'));
    }
}
