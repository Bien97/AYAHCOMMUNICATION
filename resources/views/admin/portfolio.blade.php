@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="mb-4">Portfolio</h2>

            <ul class="nav nav-tabs flex-column flex-md-row" id="portfolioTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects" type="button" role="tab" aria-controls="projects" aria-selected="true">
                        Projets
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false">
                        Galerie
                    </button>
                </li>
            </ul>

            <div class="tab-content mt-4" id="portfolioTabContent">
                <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                    <p>Liste des projets récents ou réalisés.</p>
                    {{-- Tu peux intégrer ici une liste dynamique ou une grille responsive --}}
                </div>
                <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    <p>Galerie des images associées aux projets.</p>
                    {{-- Tu peux ajouter une galerie responsive ici (ex: grid Bootstrap ou lightbox) --}}
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
