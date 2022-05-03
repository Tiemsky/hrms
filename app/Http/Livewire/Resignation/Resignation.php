<?php

namespace App\Http\Livewire\Resignation;

use Livewire\Component;
use App\Models\Resignation as ResignationModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Resignation extends Component
{

    public $user_id, $department_id, $reason, $notice_date, $resignation_date;

    public function createResignation()
    {
        $data = $this->validate([
            'user_id'             => 'required',
            'reason'              => 'required',
            'notice_date'         => 'required',
            'resignation_date'    => 'required'
        ]);
        ResignationModel::create($data);
        User::findOrFail($data['user_id'])->update(['status'=>'deleted']);
        $this->reset();
        $this->dispatchBrowserEvent('resignation');

    }

    public function render()
    {
        $users = User::where('id','!=', Auth::user()->id)
                        ->where('status','!=', 'deleted')
                        ->get();
        $resignations = ResignationModel::with(['user:id,first_name,last_name,gender,avatar,department_id,slug', 'user.department'])->get();
        return view('livewire.resignation.resignation', compact('users','resignations'));
    }
}
