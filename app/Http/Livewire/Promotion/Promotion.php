<?php

namespace App\Http\Livewire\Promotion;

use App\Models\Department;
use App\Models\Promotion as ModelsPromotion;
use App\Models\User;
use Livewire\Component;

class Promotion extends Component
{
    public $userID, $currentPosition ,$userDepartment, $newPosition;
    public $date_of_promotion, $promotion_to;
    public function getUserInfo(){
        $user = User::with(['department:id,name'])
                                    ->where('id', $this->userID)
                                    ->first();
        $this->userDepartment = $user->department->name;
        $this->currentPosition = $user->position;
    }

    public function savePromotion(){
        $this->validate([
            'promotion_to'      => 'required',
            'date_of_promotion' => 'required',
        ]);


        ModelsPromotion::updateOrCreate([
            'user_id'             => $this->userID],
            [
            'promotion_from'      => $this->currentPosition,
            'promotion_to'        => $this->promotion_to,
            'date_of_promotion'   => $this->date_of_promotion,
        ]);


        User::findOrFail($this->userID)
        ->update(['position' =>$this->promotion_to]);

        $this->reset();
        $this->dispatchBrowserEvent('promotion');
    }

    public function render()
    {
        $users = User::with(['department'])->get();
        $promotions = ModelsPromotion::with(['user:id,first_name,last_name,avatar,department_id,slug','user.department:id,name'])->get();
        $departments = Department::get(['id','name']);
        return view('livewire.promotion.promotion', compact('users','departments','promotions'));
    }
}
