<?php

namespace App\Http\Livewire\Leave;

use App\Models\RequestedLeave;
use Livewire\Component;

class Leave extends Component
{
    public function updateRequestStatus($requestedLeavesID, $status){
        return RequestedLeave::findOrFail($requestedLeavesID)->update(['status'=>$status]);
    }
    public function render()
    {
        $requestedLeaves = RequestedLeave::with(['user:id,avatar,first_name,last_name,employee_id,slug,department_id','user.department','leave'])->get();

        $requestStatus = collect([
            [
                'status' => 'Declined',
                'number' => '0',

            ],
            [
                'status' => 'Pending',
                'number' => '1',

            ],
            [
                'status' => 'Approved',
                'number' => '2',

            ],
        ]);

        return view('livewire.leave.leave', compact('requestedLeaves','requestStatus'));
    }
}
