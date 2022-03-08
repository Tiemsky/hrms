<?php

namespace App\Http\Livewire\Department;

use Livewire\Component;
use App\Models\Department as DepartmentModel;

class Department extends Component
{
    public $name, $itemToBeDeleted;

    public function create(){
        $departement = $this->validate(['name'=>'required']);
        DepartmentModel :: create($departement);
        $this->reset();
        $this->dispatchBrowserEvent('department');
        
    }
    public function getInfo($id){
        $departement =DepartmentModel::where('id',$id)->first();
        $this->name = $departement->name;
        $this->itemToBeDeleted = $id;
    }

    public function update(){
        DepartmentModel::where('id', $this->itemToBeDeleted)->update(['name' => $this->name]);
        $this->dispatchBrowserEvent('department');
    }

   

    public function delete()
    {
        DepartmentModel::where('id', $this->itemToBeDeleted)->delete();
        $this->dispatchBrowserEvent('department');
    }
    public function render()
    {
        $departments = DepartmentModel::latest()->paginate(10);
        return view('livewire.department.department', compact('departments'));
    }
}
