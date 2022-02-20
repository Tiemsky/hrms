<?php

namespace App\Http\Livewire\Settings;
use App\Models\CompanySettings as CompanySettingsModel;
use Brian2694\Toastr\Facades\Toastr;
use Livewire\Component;

class CompanySettings extends Component
{
    public $company_name, $hr_name, $address, $company_email, $phone_number, $mobile_number, $fax, $web_site;

    public function mount()
    {
    
        $settings = CompanySettingsModel::where('id', 1)->first();
       if($settings)
        {
            $this->company_name = $settings->company_name;
            $this->hr_name = $settings->hr_name;
            $this->address = $settings->address;
            $this->company_email = $settings->email;
            $this->phone_number = $settings->phone_number;
            $this->mobile_number = $settings->mobile_number;
            $this->fax = $settings->fax_number;
            $this->web_site = $settings->web_site;
    

        }
       

    
        
        //$this->company_name = $settings->company_name;
        
    }
    public function formValidation()
    {
    
        return $this->validate([
            'company_name'  => 'required',
            'hr_name'  => 'required',
            'address'  => 'required',
            'company_email'  => 'required',
        ]);
    }

    public function createCompanyInfo()
    {
        $this->formValidation();
        CompanySettingsModel::updateorCreate(
            [
                'id'    => 1
            ],
            [
                'hr_name'   => $this->hr_name,
                'company_name'  => $this->company_name,
                'email' => $this->company_email,
                'address' => $this->address,
                'mobile_number' => $this->mobile_number,
                'phone_number' => $this->phone_number,
                'fax_number' => $this->fax,
                'web_site' => $this->web_site,
            ]
        );
        Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-right"]);
        $this->emit('settingsUpdated');
        
        

    }

    public function getCompanyInfo()
    {
        return CompanySettingsModel::all();
    }
    public function render()
    {
        return view('livewire.settings.company-settings');
    }
}
