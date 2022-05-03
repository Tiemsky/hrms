<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.users');
    }
    public function userList()
    {
        return view('user.users-list');
    }

    public function home()
    {
        return view('home');
    }
    public function myProfile()
    {
        return view('user.my-profile');
    }
    public function profile($slug)
    {
        return view('user.profile',compact('slug'));
    }
}
