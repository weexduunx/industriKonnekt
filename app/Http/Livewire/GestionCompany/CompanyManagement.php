<?php

namespace App\Http\Livewire\GestionCompany;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CompanyManagement extends Component
{
    use WithFileUploads;

    // protected $rules = [
    //     'company.name' => 'max:40|min:3',
    //     'company.industry_sector' => 'max:40|min:3',
    //     'company.contact_email' => 'email:rfc,dns',
    //     'company.location' => 'max:40',
    //     'company.address' => 'max:20',
    //     'company.website' => 'min:3',
    //     'company.contact_name' => 'min:3',
    //     'company.contact_phone' => 'max:14|min:9',
    //     'company.user_id ' => 'min:1',
    // ];
    public $company;
    public $isOpen = 0;
    public $logo ;

    public function render()
    {
        $companies = Company::all();

        return view('livewire.gestion-company.company-management', [
            'companies' => $companies
        ]);
    }

    public function create()
    {
        $this->reset();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate([
            'company.name' => 'required',
            'company.industry_sector' => 'required',
            'company.location' => 'required',
            'company.address' => 'required',
            'company.website' => 'nullable|url',
            'company.contact_name' => 'required',
            'company.contact_email' => 'required|email',
            'company.contact_phone' => 'required',
            'company.logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Exemple : image jusqu'à 1 Mo
        ]);


        // Vérifiez si un logo a été téléchargé
        if ($this->company['logo']) {
            // Générez un nom de fichier unique
            $fileName = uniqid() . '.' . $this->company['logo']->getClientOriginalExtension();
            // Déplacez le fichier téléchargé vers le dossier "storage/app/public/uploads/logos"
            $this->company['logo']->storeAs('public/uploads/logos', $fileName);
            // Mettez à jour le chemin du logo dans les données de l'entreprise
            $this->company['logo'] = 'uploads/logos/' . $fileName;
        } else {
            // Si aucun logo n'a été téléchargé, définissez la valeur sur null ou la valeur par défaut
            $this->company['logo'] = null; // ou le chemin de votre logo par défaut
        }

               
        Company::create($this->company);

        // Afficher une alerte avec Toastr JS
        $this->emit('showSuccessAlert', ['message' => 'Entreprise ajoutée avec succés']);

        // Fermer le modal
        $this->closeModal();
    }


    public function edit($id)
    {
        $company = Company::find($id);
        $this->company = $company;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'company.name' => 'required',
            'company.industry_sector' => 'required',
            'company.location' => 'required',
            'company.address' => 'required',
            'company.website' => 'nullable|url',
            'company.contact_name' => 'required',
            'company.contact_email' => 'required|email',
            'company.contact_phone' => 'required',
        ]);

        $this->company->save();

        session()->flash('message', 'Entreprise mise à jour avec succès.');
        $this->closeModal();
    }

    public function delete($id)
    {
        Company::find($id)->delete();
        session()->flash('message', 'Entreprise supprimée avec succès.');
    }
}
