<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Toute les entreprises</h5>
                        </div>
                        {{-- <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" wire:click="create">+&nbsp; Nouvelle Entreprise</a> --}}
                        <button  class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#createCompanyModal"
                         >+&nbsp; Nouvelle Entreprise</button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nom
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Secteur Industriel
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Adresse
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        N° Telephone
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Site web
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Personne à contacter
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $company->id }}</p>
                                    </td>
                                    <td>
                                        <div>
                                            {{-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"> --}}
                                            <img src="{{ asset('storage/' . $company->logo) }}" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $company->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $company->industry_sector }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $company->contact_email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $company->address }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $company->contact_phone }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $company->website }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $company->contact_name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $company->created_at }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                            data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de création d'entreprise -->
    {{-- <div wire:ignore.self class="modal fade" id="createCompanyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouvelle Entreprise</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Votre formulaire de création ici -->
                    <form wire:submit.prevent="store" action="#" method="POST" role="form text-left">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company-name" class="form-control-label">{{ __('Nom Complet') }}</label>
                                        <div class="@error('company.name')border border-danger rounded-3 @enderror">
                                            <input wire:model="company.name" class="form-control" type="text" placeholder="Nom"
                                                id="company-name">
                                        </div>
                                        @error('company.name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company-industry_sector" class="form-control-label">{{ __('Secteur Industriel') }}</label>
                                        <div class="@error('company.industry_secto')border border-danger rounded-3 @enderror">
                                            <input wire:model="company.industry_sector" class="form-control" type="text" placeholder="Secteur Industriel"
                                                id="company-industry_sector">
                                        </div>
                                        @error('company.industry_sector') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company-contact_email" class="form-control-label">{{ __('Email') }}</label>
                                        <div class="@error('company.contact_email')border border-danger rounded-3 @enderror">
                                            <input wire:model="company.contact_email" class="form-control" type="email"
                                                placeholder="@example.com" id="company-contact_email">
                                        </div>
                                        @error('company.contact_email') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company.contact_phone" class="form-control-label">{{ __('Phone') }}</label>
                                        <div class="@error('company.contact_phone')border border-danger rounded-3 @enderror">
                                            <input wire:model="company.contact_phone" class="form-control" type="tel"
                                                placeholder="40770888444" id="phone">
                                        </div>
                                        @error('company.contact_phone') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company.location" class="form-control-label">{{ __('Position') }}</label>
                                        <div class="@error('company.location') border border-danger rounded-3 @enderror">
                                            <input wire:model="company.location" class="form-control" type="text"
                                                placeholder="Position" id="company-location">
                                        </div>
                                        @error('company.location') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company.address" class="form-control-label">{{ __('Adresse') }}</label>
                                        <div class="@error('company.address') border border-danger rounded-3 @enderror">
                                            <input wire:model="company.address" class="form-control" type="text"
                                                placeholder="Adresse" id="company-address">
                                        </div>
                                        @error('company.address') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company.website">{{ 'Site web' }}</label>
                                        <div class="@error('company.website')border border-danger rounded-3 @enderror">
                                            <input wire:model="company.website" class="form-control" type="text"
                                                placeholder="Site Web" id="company-website">
                                        </div>
                                        @error('company.website') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company.contact_name">{{ 'Personne à contacter' }}</label>
                                        <div class="@error('company.contact_name')border border-danger rounded-3 @enderror">
                                            <input wire:model="company.contact_name" class="form-control" type="text"
                                                placeholder="Site Web" id="company-contact_name">
                                        </div>
                                        @error('company.contact_name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                           
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal -->
    <div wire:ignore.self  class="modal fade" id="createCompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Créer une entreprise</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store" action="#" method="POST" role="form text-left" enctype="multipart/form-data">
                    {{-- <div class="form-group">
                        <label for="company-logo">Logo de l'entreprise :</label>
                        <input type="file" name="company.logo" wire:model="company.logo">
                    </div> --}}
                    <div class=" input-group mb-3">
                        <input type="file" class="form-control" name="company.logo" wire:model="company.logo" id="inputGroupFile02">
                        <label class="input-group-text" for="company-logo">Logo de l'entreprise</label>
                      </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company.contact_name">{{ 'Personne à contacter' }}</label>
                                <div class="@error('company.contact_name')border border-danger rounded-3 @enderror">
                                    <input wire:model="company.contact_name" class="form-control" type="text"
                                        placeholder="Site Web" id="company-contact_name">
                                </div>
                                @error('company.contact_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company-name" class="form-control-label">{{ __('Nom Complet') }}</label>
                                <div class="@error('company.name')border border-danger rounded-3 @enderror">
                                    <input wire:model="company.name" class="form-control" type="text" placeholder="Nom"
                                        id="company-name">
                                </div>
                                @error('company.name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company-industry_sector" class="form-control-label">{{ __('Secteur Industriel') }}</label>
                                    <div class="@error('company.industry_secto')border border-danger rounded-3 @enderror">
                                        <input wire:model="company.industry_sector" class="form-control" type="text" placeholder="Secteur Industriel"
                                            id="company-industry_sector">
                                    </div>
                                    @error('company.industry_sector') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company-contact_email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('company.contact_email')border border-danger rounded-3 @enderror">
                                        <input wire:model="company.contact_email" class="form-control" type="email"
                                            placeholder="@example.com" id="company-contact_email">
                                    </div>
                                    @error('company.contact_email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company.contact_phone" class="form-control-label">{{ __('Phone') }}</label>
                                <div class="@error('company.contact_phone')border border-danger rounded-3 @enderror">
                                    <input wire:model="company.contact_phone" class="form-control" type="tel"
                                        placeholder="40770888444" id="phone">
                                </div>
                                @error('company.contact_phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company.location" class="form-control-label">{{ __('Position') }}</label>
                                <div class="@error('company.location') border border-danger rounded-3 @enderror">
                                    <input wire:model="company.location" class="form-control" type="text"
                                        placeholder="Position" id="company-location">
                                </div>
                                @error('company.location') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company.address" class="form-control-label">{{ __('Adresse') }}</label>
                                <div class="@error('company.address') border border-danger rounded-3 @enderror">
                                    <input wire:model="company.address" class="form-control" type="text"
                                        placeholder="Adresse" id="company-address">
                                </div>
                                @error('company.address') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company.website">{{ 'Site web' }}</label>
                                <div class="@error('company.website')border border-danger rounded-3 @enderror">
                                    <input wire:model="company.website" class="form-control" type="text"
                                        placeholder="Site Web" id="company-website">
                                </div>
                                @error('company.website') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                   

                    <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-light btn-md mt-4 mb-4" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
            </form>
            </div>

        </div>
        </div>
    </div>
</div>
