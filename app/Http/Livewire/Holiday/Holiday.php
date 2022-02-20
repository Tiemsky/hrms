<?php

namespace App\Http\Livewire\Holiday;
use App\Models\Holiday as HolidayModel;

use Livewire\Component;

class Holiday extends Component
{
    public $name, $date;

    public function create()
    {
        $holidays = $this->validate([
            'name'  => 'required',
            'date'  =>  'required'
        ]);
        
        HolidayModel::create($holidays);
        $this->reset();
        $this->dispatchBrowserEvent('holidays');
        return redirect()->to('/holidays');
    }
    public function render()
    {
        $holidays = HolidayModel::all();
        return view('livewire.holiday.holiday', compact('holidays'));
    }
}
