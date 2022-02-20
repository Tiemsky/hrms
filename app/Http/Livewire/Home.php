<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $this->dispatchBrowserEvent('notification', [
            'message'   => 'testing'
        ]);
        return view('livewire.home');
    }
}
