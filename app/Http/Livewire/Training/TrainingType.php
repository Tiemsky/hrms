<?php

namespace App\Http\Livewire\Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class TrainingType extends Component
{
    public $type, $description, $itemToBeDeleted;

    public function validateType()
    {
        return $this->validate([
            'type' => 'required',
            'description'   => 'required'
        ]);
    }



    public function addType()
    {
        $this->validateType();
        DB::table('training_type')->insert(
            [
                'type'  => $this->type,
                'description'   => $this->description
            ]
        );

        $this->reset();
       
        $this->dispatchBrowserEvent('trainingTypeCreated');
        return redirect('training-type');
    }



    public function changeStatus($id, $currentStatus)
    {
        if($currentStatus == 1){
            DB::table('training_type')
                ->where('id', $id)
                ->update([
                    'status'=>0
                ]);
        }else{
            DB::table('training_type')
            ->where('id', $id)
            ->update([
                'status'=>1
            ]);
        }
        return redirect('training-type');
    }

    public function getInfo($id)
    {
       
        $this->itemToBeDeleted= $id;
        $training_type = $this->edit();
        $this->type = $training_type->type;
        $this->description = $training_type->description;

    }

    public function edit()
    {
        return DB::table('training_type')
        ->where('id', $this->itemToBeDeleted)
        ->first();
        
    }
public function update()
{
    $this->validateType();
    DB::table('training_type')
        ->where('id', $this->itemToBeDeleted)
        ->update(
        [
            'type'  => $this->type,
            'description'   => $this->description
        ]
    );

    $this->reset();
   
    $this->dispatchBrowserEvent('trainingTypeCreated');
    return redirect('training-type');
}
    public function delete()
    {
        
        DB::table('training_type')
        ->where('id', $this->itemToBeDeleted)
        ->delete();
        return redirect('training-type');
    }
    public function render()
    {
        $training_types = DB::table('training_type')
                                ->orderBy('id', 'DESC')->get();
        return view('livewire.training.training-type',compact('training_types'));
    }
}


