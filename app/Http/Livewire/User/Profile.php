<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $slug;
    public function render()
    {   $user = User::with(['educations','experiences'])
                        ->where('slug', $this->slug)
                        ->first();

        $countries = DB::table('countries')->get();
        return view('livewire.user.profile', compact('user','countries'));
    }
}
