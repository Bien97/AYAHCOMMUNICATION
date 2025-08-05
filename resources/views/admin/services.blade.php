@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Services</h2>

            <ul class="nav nav-tabs flex-column flex-md-row" id="servicesTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                        Tous les Services
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab" aria-controls="add" aria-selected="false">
                        Ajouter un service
                    </button>
                </li>
            </ul>

            <div class="tab-content mt-4" id="servicesTabContent">
                <!-- Panel : Liste des services -->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Création de site</td>
                                    <td>Développement web complet</td>
                                    <td>500€</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a href="#" class="btn btn-outline-warning btn-sm">Modifier</a>
                                            <button class="btn btn-outline-danger btn-sm">Supprimer</button>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Autres services ici --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Panel : Ajout de service -->
                <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Nom du service</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Prix</label>
                                <input class="form-control" type="number" min="0">
                            </div>
                        </div>
                        <button class="btn btn-primary">Ajouter</button>
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
