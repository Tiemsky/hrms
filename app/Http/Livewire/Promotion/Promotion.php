<?php

namespace App\Http\Livewire\Promotion;

use App\Models\Departement;
use App\Models\User;
use Livewire\Component;

class Promotion extends Component
{
    public $userID, $currentPromotion;
    public function getUserDepartement(){
        $this->currentPromotion = User::with(['departement'])->where('id', $this->userID)->first();
    }
 
    public function render()
    {
        $users = User::with(['departement'])->get();
        $departements = Departement::all();
        return view('livewire.promotion.promotion', compact('users','departements'));
    }
}
