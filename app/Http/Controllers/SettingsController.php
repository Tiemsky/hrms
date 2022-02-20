<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function companySettings()
    {
        return view('settings');
    }

 
}
