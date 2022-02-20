<?php

namespace App\Http\Livewire\Resignation;

use Livewire\Component;
use App\Models\Resignation as ResignationModel;
use App\Models\User;

class Resignation extends Component
{

    public $user_id, $departement, $reason, $notice_date, $resignation_date;

    public function createResignation()
    {
        $data = $this->validate([
            'user_id'          => 'required',
            'departement'       => 'required',
            'reason'            => 'required',
            'notice_date'       => 'required',
            'resignation_date'  => 'required'
        ]);

        ResignationModel::create($data);
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.resignation.resignation', compact('users'));
    }
}
