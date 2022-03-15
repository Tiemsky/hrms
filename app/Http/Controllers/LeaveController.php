<?php

namespace App\Http\Controllers;


use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
{
    return view('leaves.leave');
}

public function create()
{
    return view('leaves.create');
}

public function show($user_slug, $leave_slug){
    $user = User::with(['requestLeaves','department','country'])->where('slug', $user_slug)->first();
    $leave = Leave::with(['setting'])->where('slug', $leave_slug)->first();
    return view('leaves.show-request', compact('user','leave'));
}

public function Sendrequest()
{
    return view('leaves.send-request');
}

public function settings()
{
    return view('leaves.settings');
}
}
