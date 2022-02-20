<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResignationController extends Controller
{
    public function index()
    {
        return view('resignation.resignation');
    }
}
