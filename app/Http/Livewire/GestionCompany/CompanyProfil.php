<?php

namespace App\Http\Livewire\GestionCompany;

use App\Models\Company;
use App\Models\User;
use Livewire\Component;

class CompanyProfil extends Component
{
    public Company $company;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    protected $rules = [
        'company.name' => 'max:40|min:3',
        'company.industry_sector' => 'max:40|min:3',
        'company.contact_email' => 'email:rfc,dns',
        'company.location' => 'max:40',
        'company.address' => 'max:20',
        'company.website' => 'min:3',
        'company.contact_name' => 'min:3',
        'company.contact_phone' => 'max:14|min:9',
        'company.user_id ' => 'min:1',
    ];

    public function mount() { 

        $user = auth()->user();
        $this->company = $user->company->first();
    }

    public function save() {
    
        $this->validate();
        $this->company->save();
        $this->showSuccesNotification = true;
        
    }

    public function render()
    {
        return view('livewire.gestion-company.company-profil');
    }
}
