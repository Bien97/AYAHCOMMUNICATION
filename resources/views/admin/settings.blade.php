@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Paramètres</h2>

            <ul class="nav nav-tabs flex-column flex-md-row" id="settingsTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab0" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">
                        Général
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab1" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
                        Sécurité
                    </button>
                </li>
            </ul>

            <div class="tab-content mt-4" id="settingsTabContent">
                <!-- Panel : Général -->
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="tab0">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nom de l'entreprise</label>
                                <input type="text" class="form-control" value="CommAgency">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email admin</label>
                                <input type="email" class="form-control" value="admin@commagency.com">
                            </div>
                        </div>
                        <button class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>

                <!-- Panel : Sécurité -->
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="tab1">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mot de passe actuel</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-danger">Changer le mot de passe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-tabs .nav-link {
        white-space: nowrap;
    }
</style>
@endsection
