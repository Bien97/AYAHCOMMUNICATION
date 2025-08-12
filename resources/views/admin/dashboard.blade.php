@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-5 px-2 px-md-4" style="max-width: 1140px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4 text-primary">Tableau de Bord</h2>

            {{-- Onglets de navigation --}}
            <ul class="nav nav-tabs flex-column flex-md-row" id="dashboardTabs" role="tablist" style="border-bottom: none;">
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
                    <div class="p-3 content-panel">
                        <h5>Statistiques</h5>
                        <p>Statistiques de performance, graphiques et KPI ici.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-tab">
                    <div class="p-3 content-panel">
                        <h5>Activités Récentes</h5>
                        <p>Dernières activités du système affichées ici.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
                    <div class="p-3 content-panel">
                        <h5>Rapports</h5>
                        <p>Rapports générés automatiquement.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Onglets - texte gris + animations "éblouissantes" */
    .nav-tabs .nav-link {
        color: #5B5B5B;
        font-weight: 600;
        border: none;
        border-bottom: 3px solid transparent;
        transition: 
            color 0.3s ease,
            border-color 0.3s ease,
            box-shadow 0.4s ease;
        position: relative;
        white-space: nowrap;
        padding: 0.5rem 1rem;
    }

    .nav-tabs .nav-link:hover,
    .nav-tabs .nav-link:focus {
        color: #6A4A8F;
        border-bottom: 3px solid #6A4A8F;
        box-shadow: 0 0 15px 3px rgba(106, 74, 143, 0.6);
        z-index: 1;
    }

    .nav-tabs .nav-link.active {
        color: #6A4A8F;
        border-bottom: 3px solid #6A4A8F;
        box-shadow: 0 0 25px 5px rgba(106, 74, 143, 0.8);
        font-weight: 700;
    }

    /* Contenu des onglets avec animation d'apparition en fondu */
    .tab-pane {
        opacity: 0;
        transform: translateY(15px);
        transition: opacity 0.5s ease, transform 0.5s ease;
        border-radius: 0.25rem;
        padding: 1rem 2rem;
    }

    .tab-pane.show.active {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsive adjustments */
    @media (max-width: 575.98px) {
        .container-fluid {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .nav-tabs {
            flex-direction: column !important;
            gap: 1rem;
            border-bottom: none !important;
        }
        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-radius: 0.375rem;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            text-align: center;
        }
        .nav-tabs .nav-link.active {
            border-color: #6A4A8F;
            box-shadow: 0 0 15px 3px rgba(106, 74, 143, 0.7);
            font-weight: 700;
        }

        .tab-pane {
            padding: 1rem 1rem;
            font-size: 0.95rem;
        }
    }
</style>
@endsection
