@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Équipe</h2>

            <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#members" type="button" role="tab">Membres</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab">Ajouter</button>
                </li>
            </ul>

            <div class="tab-content mt-4">
                <!-- Membres -->
                <div class="tab-pane fade show active" id="members" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th>Poste</th>
                                    <th>Email</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alice Martin</td>
                                    <td>Designer</td>
                                    <td>alice@entreprise.com</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-outline-warning me-1">Modifier</a>
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </td>
                                </tr>
                                <!-- D'autres membres ici -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ajouter un membre -->
                <div class="tab-pane fade" id="add" role="tabpanel">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Poste</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary mt-2">Ajouter</button>
                        </div>
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
