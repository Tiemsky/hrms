<?php

namespace App\Http\Livewire\Leave;

use App\Models\Leave;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $status, $name, $itemToBeDeleted;
   

    public function changeStatus($id)
    {
        $leave = $this->getInfo($id);
      if($leave->status == 1)
      {
        return Leave::where('id', $id)->update(['status' => 0]);

      }
          if($leave->status  == 0)
          {
          return Leave::where('id', $id)->update(['status' => 1]);
 

          }
        
    }

    public function create()
    {
        $this->validate(['name'=>'required|string']);
        Leave::create([
            'name'  => $this->name,
            'slug'  => Str::slug($this->name)
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('leave');
    }

   

    public function getInfo($id){
        $leave =Leave::where('id',$id)->first();
        $this->name = $leave->name;
        $this->itemToBeDeleted = $id;
        return $leave;
    }
    

    public function update(){
        Leave::where('id', $this->itemToBeDeleted)->update(['name' => $this->name]);
        $this->reset();
        $this->dispatchBrowserEvent('leave');
    }

    public function delete()
{
    Leave::where('id', $this->itemToBeDeleted)->delete();
    $this->dispatchBrowserEvent('leave');
}


    public function render()
    {
        $leaves = Leave::all();
        return view('livewire.leave.create',compact('leaves'));
    }
}













