@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Gestion du Blog</h2>

            <ul class="nav nav-tabs flex-column flex-md-row" id="blogTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab0" data-bs-toggle="tab" data-bs-target="#content0" type="button" role="tab">Articles</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab1" data-bs-toggle="tab" data-bs-target="#content1" type="button" role="tab">Ajouter</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab2" data-bs-toggle="tab" data-bs-target="#content2" type="button" role="tab">Catégories</button>
                </li>
            </ul>

            <div class="tab-content mt-4" id="blogTabContent">
                <!-- Panel 1 : Table -->
                <div class="tab-pane fade show active" id="content0" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Article Exemple</td>
                                    <td>Admin</td>
                                    <td>2025-08-05</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a href="#" class="btn btn-sm btn-outline-warning">Modifier</a>
                                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- D'autres lignes d'articles ici -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Panel 2 : Form -->
                <div class="tab-pane fade" id="content1" role="tabpanel">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Titre</label>
                                <input type="text" class="form-control" placeholder="Titre de l'article">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label">Contenu</label>
                                <textarea class="form-control" rows="5" placeholder="Contenu de l'article"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-success">Publier</button>
                    </form>
                </div>

                <!-- Panel 3 : Catégories -->
                <div class="tab-pane fade" id="content2" role="tabpanel">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">Actualités</li>
                                <li class="list-group-item">Digital</li>
                                <li class="list-group-item">Technologie</li>
                                <!-- Ajouter d'autres catégories ici -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Empêche les textes des onglets de se couper */
    .nav-tabs .nav-link {
        white-space: nowrap;
    }
</style>
@endsection
