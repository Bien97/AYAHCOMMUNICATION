@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">

    {{-- Affichage des erreurs de validation --}}
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div class="toast align-items-center text-bg-success" role="alert" id="successToast" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body">{{ session('success') }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3 section-card">
        <h2 class="section-title">Services</h2>
        <button class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#addServiceModal">
            + Ajouter un service
        </button>
    </div>

    <div class="row g-4">
        @forelse($services as $service)
        <div class="col-12 col-md-6 col-lg-4 section-card">
            <div class="border rounded p-3 bg-light h-100 shadow-sm text-center">

                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid mb-3 service-image" loading="lazy" style="max-height:150px; object-fit:contain;">
                @endif

                <h5 class="fw-bold service-title">{{ $service->title }}</h5>

                {{-- Prévisualisation de l’icône --}}
                <div class="mb-2 mx-auto icon-preview" style="font-size: 40px; color: #6A4A8F;">
                    <i class="{{ $service->icon }}"></i>
                </div>

                <p class="service-description">{{ $service->description }}</p>

                <div class="d-flex justify-content-center gap-2 mt-3 service-actions">
                    <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}">
                        Modifier
                    </button>

                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteServiceModal{{ $service->id }}">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Modification -->
        <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="editServiceLabel{{ $service->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form method="POST" action="{{ route('admin.services.update', $service->id) }}" class="modal-content" enctype="multipart/form-data" id="editForm{{ $service->id }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="editServiceLabel{{ $service->id }}">Modifier le service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title_{{ $service->id }}" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title_{{ $service->id }}" name="title" value="{{ old('title', $service->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="icon_{{ $service->id }}" class="form-label">Icône</label>
                            <select class="form-select icon-selector" id="icon_{{ $service->id }}" name="icon" required placeholder="-- Tape pour chercher une icône --">
                                <option value="">-- Choisis une icône --</option>
                                @foreach($icons as $icon)
                                    <option value="bi bi-{{ $icon }}" @selected(old('icon', $service->icon) === "bi bi-{$icon}")>{{ $icon }}</option>
                                @endforeach
                            </select>
                            <div class="icon-preview mt-2" style="font-size: 40px; color: #6A4A8F;">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description_{{ $service->id }}" class="form-label">Description</label>
                            <textarea class="form-control" id="description_{{ $service->id }}" name="description" rows="4" required>{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image_{{ $service->id }}" class="form-label">Image (optionnelle)</label>
                            <input type="file" class="form-control" id="image_{{ $service->id }}" name="image" accept="image/*">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#confirmEditModal{{ $service->id }}">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Confirmation modification -->
        <div class="modal fade" id="confirmEditModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-dark">
                        <h5 class="modal-title">Confirmer la modification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        Voulez-vous vraiment enregistrer ces modifications ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-warning" id="confirmEditBtn{{ $service->id }}">
                            Oui, enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Suppression -->
        <div class="modal fade" id="deleteServiceModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" class="modal-content">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmer la suppression</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        ⚠️ Cette action supprimera définitivement le service « {{ $service->title }} ». Voulez-vous continuer ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-outline-danger">Oui, supprimer</button>
                    </div>
                </form>
            </div>
        </div>

        @empty
        <p class="text-center text-muted mt-4 section-card">Aucun service pour l’instant.</p>
        @endforelse
    </div>
</div>

<!-- Modal Ajout -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form method="POST" action="{{ route('admin.services.store') }}" class="modal-content" enctype="multipart/form-data">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title" id="addServiceLabel">Ajouter un nouveau service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="title_add" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="title_add" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="icon_add" class="form-label">Icône</label>
                    <select class="form-select icon-selector" id="icon_add" name="icon" required placeholder="-- Tape pour chercher une icône --">
                        <option value="">-- Choisis une icône --</option>
                        @foreach($icons as $icon)
                            <option value="bi bi-{{ $icon }}" @selected(old('icon') === "bi bi-{$icon}")>{{ $icon }}</option>
                        @endforeach
                    </select>
                    <div class="icon-preview mt-2" style="font-size: 40px; color: #6A4A8F;">
                        <i class="bi bi-{{ $icons[0] ?? '' }}"></i>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description_add" class="form-label">Description</label>
                    <textarea class="form-control" id="description_add" name="description" rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image_add" class="form-label">Image (optionnelle)</label>
                    <input type="file" class="form-control" id="image_add" name="image" accept="image/*">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-custom-purple">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
.btn-custom-purple {
    background-color: #6A4A8F;
    color: white;
    font-weight: 600;
    box-shadow: 0 4px 8px rgba(106, 74, 143, 0.4);
    transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    user-select: none;
    cursor: pointer;
}
.btn-custom-purple:hover,
.btn-custom-purple:focus {
    background-color: #553a72;
    box-shadow: 0 6px 12px rgba(85, 58, 114, 0.6);
    color: white;
    transform: translateY(-3px);
    outline: none;
}

.icon-preview i {
    display: block;
    transition: color 0.3s ease, transform 0.3s ease;
}
.icon-preview i:hover {
    color: #553a72;
    transform: scale(1.1);
}

/* Section cards animation */
.section-card {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.7s ease forwards;
    animation-delay: 0.2s;
}

.section-card:nth-child(1) { animation-delay: 0.15s; }
.section-card:nth-child(2) { animation-delay: 0.3s; }
.section-card:nth-child(3) { animation-delay: 0.45s; }
.section-card:nth-child(4) { animation-delay: 0.6s; }
.section-card:nth-child(5) { animation-delay: 0.75s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 575.98px) {
    .service-actions {
        flex-direction: column;
        gap: 0.5rem;
    }
    .service-actions button {
        width: 100%;
    }
}

.service-image {
    max-width: 100%;
    height: auto;
    transition: transform 0.3s ease;
    cursor: pointer;
}
.service-image:hover {
    transform: scale(1.05);
}

.service-title {
    transition: color 0.3s ease;
}
.service-title:hover {
    color: #6A4A8F;
}

.service-description {
    color: #444;
    font-size: 0.95rem;
    line-height: 1.4;
    transition: color 0.3s ease;
}
.service-description:hover {
    color: #6A4A8F;
}
</style>
@endpush

@push('scripts')
<!-- Inclure Tom Select via CDN (place dans le layout ou ici) -->
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
    // Toast auto disparition
    const successToastEl = document.getElementById('successToast');
    if (successToastEl) {
        const toast = new bootstrap.Toast(successToastEl);
        toast.show();
    }

    // Confirmation modification dynamique
    @foreach($services as $service)
    document.getElementById('confirmEditBtn{{ $service->id }}').addEventListener('click', function() {
        const form = document.getElementById('editForm{{ $service->id }}');

        // Fermer les modals avant submit
        const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmEditModal{{ $service->id }}'));
        confirmModal.hide();

        const editModal = bootstrap.Modal.getInstance(document.getElementById('editServiceModal{{ $service->id }}'));
        editModal.hide();

        form.submit();
    });
    @endforeach

    // Initialiser Tom Select avec recherche, placeholder, clear button, et preview icône
    document.querySelectorAll('.icon-selector').forEach(select => {
        const ts = new TomSelect(select, {
            plugins: ['clear_button'],
            maxOptions: 20,
            create: false,
            placeholder: select.getAttribute('placeholder') || '',
            onChange: (value) => {
                const preview = select.parentElement.querySelector('.icon-preview i');
                if (preview && value) {
                    preview.className = value;
                } else if (preview) {
                    preview.className = '';
                }
            }
        });

        // Déclencher le onChange initial pour le preview
        ts.setValue(select.value);
    });
</script>
@endpush
