<?php

namespace App\Http\Livewire\Leave;

use App\Models\Leave;
use App\Models\RequestedLeave;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Request extends Component
{
    public $leave_id, $leave_from, $leave_to, $number_of_day, $remaining_day, $leave_reason;
    public $startDay, $endDay, $leave_max_day;


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
        $this->endDay = strtotime($this->leave_to) ;
        $this->number_of_day =   abs(round($this->endDay  - $this->startDay) / 86400);  

    }


    
    public function submitLeave(){
        $data = $this->validate([
            'leave_id' => 'required',
            'leave_from'    => 'required',
            'leave_to'      => 'required',
            'leave_reason'   => 'required'
        ]);

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
        return view('livewire.leave.request', compact('leaves','myLeaves'));
    }
}
