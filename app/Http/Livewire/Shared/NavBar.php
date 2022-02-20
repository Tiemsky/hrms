<?php

namespace App\Http\Livewire\Shared;

use App\Models\CompanySettings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavBar extends Component
{
    protected $listeners = 
        [
            'settingsUpdated'   => 'render',
            'AvatarUpdated'     => 'render'
        ];

    public function render()
    {
        $setting = CompanySettings::where('id', 1)->first();
        $user = User::where('id', Auth::user()->id)->first();
        return view('livewire.shared.nav-bar', compact('setting', 'user'));
    }
}
