@extends('admin.layouts.app')

@section('content')
<div class="container mt-5 px-2 px-md-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4 text-primary">Tableau de Bord</h2>

            {{-- Onglets de navigation --}}
            <ul class="nav nav-tabs flex-column flex-md-row" id="dashboardTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="stats-tab" data-bs-toggle="tab" data-bs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true">
                        Statistiques
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="activities-tab" data-bs-toggle="tab" data-bs-target="#activities" type="button" role="tab" aria-controls="activities" aria-selected="false">
                        Activités récentes
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reports-tab" data-bs-toggle="tab" data-bs-target="#reports" type="button" role="tab" aria-controls="reports" aria-selected="false">
                        Rapports
                    </button>
                </li>
            </ul>

            {{-- Contenu des panels --}}
            <div class="tab-content mt-4" id="dashboardTabContent">
                <div class="tab-pane fade show active" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                    <div class="p-3">
                        <h5>Statistiques</h5>
                        <p class="text-muted">Statistiques de performance, graphiques et KPI ici.</p>
                        {{-- Tu peux insérer ici des composants de graphiques, cartes, etc. --}}
                    </div>
                </div>
                <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-tab">
                    <div class="p-3">
                        <h5>Activités Récentes</h5>
                        <p class="text-muted">Dernières activités du système affichées ici.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
                    <div class="p-3">
                        <h5>Rapports</h5>
                        <p class="text-muted">Rapports générés automatiquement.</p>
                    </div>
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
