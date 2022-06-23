<?php

namespace App\Http\Livewire\Accounting;

use CustomCurrency;
use Livewire\Component;
use App\Models\Expense as ExpenseModel;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Illuminate\Support\Facades\Auth;

class Expense extends Component
{
    public $amount, $currency, $article, $note, $date;
    public $convertTo, $toBeConverted, $currentItemID;
    public $expenseID;
    public function addExpense(){
        $data = $this->validate([
            'amount'    => 'required|integer',
            'article'   => 'required',
            'date'      => 'required',
            'currency'  => 'required'
        ]);
        $data = $data + ['user_id' => Auth::user()->id,'note' => $this->note];

        ExpenseModel::create($data);
        $this->reset();
        $this->dispatchBrowserEvent('expense');
    }



    //Converting the currency into new currency
    public function updatedToBeConverted(){
        $newCurrency = (explode(" ",$this->toBeConverted));
        $convertedAmount = Currency::convert()
        ->from($newCurrency[1])
        ->to($newCurrency[2])
        ->amount($newCurrency[0])
        ->get();
        $this->currentItemID = $newCurrency[3];
        $this->convertTo = $convertedAmount;

    }

    public function editExpense($id){
        $expense = ExpenseModel::where('id', $id)->first();
        $this->amount   = $expense->amount;
        $this->currency =$expense->currency;
        $this->article  =$expense->article;
        $this->note     = $expense->note;
        $this->date     = $expense->date;

        $this->expenseID = $id;
    }


    //get all info regarding the selecting expense by ID
    public function getExpenseInfo($id){
        $this->expenseID = $id;
        return ExpenseModel::findOrFail($id)->first();
    }


    public function updateExpense(){
        $data = $this->validate([
            'amount'    => 'required|integer',
            'article'   => 'required',
            'date'      => 'required',
            'currency'  => 'required'
        ]);
        ExpenseModel::where('id',$this->expenseID)->update($data);
        $this->reset();
        $this->dispatchBrowserEvent('expense');
    }

    public function deleteExpense()
    {
        ExpenseModel::where('id', $this->expenseID)->delete();
        $this->dispatchBrowserEvent('expense');
    }


    public function render()
    {   $currencies = CustomCurrency::Latest();
        $expenses = ExpenseModel::with(['user'])->get();
        return view('livewire.accounting.expense', compact('currencies','expenses'));
    }
}
