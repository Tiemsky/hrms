<?php

namespace App\Http\Livewire\User;

use App\Models\Department;
use App\Models\User as UserModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Users extends Component
{

    
    public $userID;

    public $first_name, $last_name, $email, $phone, $joindate, $gender, $department_id;
    public function registerUser(){

        //dd($date = date('dmyHis'));
        $data = $this->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|unique:users,email',
            'phone'      => 'required',
            'department_id' => 'required',
            'joindate'    =>'required',
            'gender'    => 'required|string'
        ]);
        $slug = str()->slug($data['last_name']);
        $data = array_merge($data,[
            'employee_id'   => $date = date('dmyHis'),
            'isAdmin'       => 0,
            'slug'          => $slug,
            'password'      => 'abbm@user'
        ]);
        UserModels::create($data);
        $this->reset();
        $this->dispatchBrowserEvent('user-created');
    }


    public function getUserId($id)
    {
        $this->userID = $id;
    }
    public function delete()
    {
       
        if(!Auth::user()->isAdmin == 2)
        {
             abort(404);
             dd('ee');

        }
        UserModels::where('id', $this->userID)->update(['status' => 'deleted']);
        $this->dispatchBrowserEvent('deletedSucessfully');

    }
    public function render()
    {
       
        $users = UserModels::latest()->where('isAdmin',0)->get();
        $departments = Department::all();
        return view('livewire.user.users', compact('users','departments'));
    }
}
