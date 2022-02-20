<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Training extends Controller
{
    public function index()
    {
        return view('training.index');
    }

    public function trainers()
    {
        return view('training.trainers');
    }

    public function trainingType()
    {
        return view('training.training-type');
    }
}

