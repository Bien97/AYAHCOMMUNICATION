@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Témoignages</h2>

            <ul class="nav nav-tabs flex-column flex-md-row" id="testimonialTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab">Liste</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab">Ajouter</button>
                </li>
            </ul>

            <div class="tab-content mt-4" id="testimonialTabsContent">
                <!-- Liste des témoignages -->
                <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jean Dupont</td>
                                    <td>Service exceptionnel !</td>
                                    <td>2025-08-01</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-outline-warning me-1">Modifier</a>
                                        <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </td>
                                </tr>
                                <!-- Autres témoignages -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ajouter un témoignage -->
                <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nom du client</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success mt-2">Enregistrer</button>
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
