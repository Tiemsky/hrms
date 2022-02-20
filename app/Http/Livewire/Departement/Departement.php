<?php

namespace App\Http\Livewire\Departement;

use Livewire\Component;
use App\Models\Departement as DepartementModel;

class Departement extends Component
{
    public $name, $itemToBeDeleted;

    public function create(){
        $departement = $this->validate(['name'=>'required']);
        DepartementModel :: create($departement);
        $this->reset();
        $this->dispatchBrowserEvent('departement');
        return redirect()->to('/departement');
    }
    public function getInfo($id){
        $departement =DepartementModel::where('id',$id)->first();
        $this->name = $departement->name;
        $this->itemToBeDeleted = $id;
    }

    public function update(){
        DepartementModel::where('id', $this->itemToBeDeleted)->update(['name' => $this->name]);
        return redirect()->to('/departement');
    }

   

    public function delete()
    {
        DepartementModel::where('id', $this->itemToBeDeleted)->delete();
        return redirect()->to('/departement');
    }
    public function render()
    {
        $departements = DepartementModel::latest()->get();
        return view('livewire.departement.departement', compact('departements'));
    }
}
