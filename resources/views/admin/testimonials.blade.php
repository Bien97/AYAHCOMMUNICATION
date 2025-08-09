@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">

    {{-- Toast succès --}}
    @if(session('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div class="toast align-items-center text-bg-success" role="alert" id="successToast" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Témoignages</h2>
        <button class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
            + Ajouter un témoignage
        </button>
    </div>

    {{-- Liste des témoignages --}}
    <div class="row g-4">
        @forelse($testimonials as $testimonial)
            <div class="col-md-6">
                <div class="border rounded p-3 bg-light h-100 shadow-sm d-flex flex-column gap-2">

                    <h5 class="fw-bold mb-1">{{ $testimonial->name }}</h5>
                    <small class="text-muted">{{ $testimonial->position }}</small>
                    <p class="mb-1" style="white-space: pre-wrap;">{{ $testimonial->text }}</p>
                    <div class="mb-3">
                        @for($i=0; $i < $testimonial->stars; $i++)
                            <i class="bi bi-star-fill text-warning"></i>
                        @endfor
                        @for($i = $testimonial->stars; $i < 5; $i++)
                            <i class="bi bi-star text-muted"></i>
                        @endfor
                    </div>

                    <div class="d-flex gap-2">
                        {{-- Modifier --}}
                        <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTestimonialModal{{ $testimonial->id }}">
                            Modifier
                        </button>

                        {{-- Supprimer --}}
                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteTestimonialModal{{ $testimonial->id }}">
                            Supprimer
                        </button>

                        {{-- Voir l'image (uniquement si image existe) --}}
                        @if($testimonial->image)
                        <button class="btn btn-outline-purple btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal{{ $testimonial->id }}">
                            Voir l'image
                        </button>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Modal affichage image --}}
            @if($testimonial->image)
            <div class="modal fade" id="imageModal{{ $testimonial->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Image de {{ $testimonial->name }}" class="img-fluid rounded">
                        </div>
                        <div class="modal-footer py-2">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Modal Modification --}}
            <div class="modal fade" id="editTestimonialModal{{ $testimonial->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}" class="modal-content" enctype="multipart/form-data" id="editForm{{ $testimonial->id }}">
                        @csrf
                        @method('PUT')

                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le témoignage #{{ $testimonial->id }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name_{{ $testimonial->id }}" class="form-label">Nom</label>
                                <input type="text" name="name" id="name_{{ $testimonial->id }}" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="position_{{ $testimonial->id }}" class="form-label">Poste</label>
                                <input type="text" name="position" id="position_{{ $testimonial->id }}" class="form-control" value="{{ old('position', $testimonial->position) }}">
                            </div>

                            <div class="mb-3">
                                <label for="text_{{ $testimonial->id }}" class="form-label">Texte</label>
                                <textarea name="text" id="text_{{ $testimonial->id }}" rows="5" class="form-control" required>{{ old('text', $testimonial->text) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="stars_{{ $testimonial->id }}" class="form-label">Étoiles</label>
                                <select name="stars" id="stars_{{ $testimonial->id }}" class="form-select" required>
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" @selected(old('stars', $testimonial->stars) == $i)>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="image_{{ $testimonial->id }}" class="form-label">Image (optionnelle)</label>
                                <input type="file" name="image" id="image_{{ $testimonial->id }}" class="form-control" accept="image/*">
                                @if($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Preview" class="mt-2" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                                @endif
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#confirmEditModal{{ $testimonial->id }}">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Modal Confirmation modification --}}
            <div class="modal fade" id="confirmEditModal{{ $testimonial->id }}" tabindex="-1">
                <div class="modal-dialog">
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
                            <button type="button" class="btn btn-warning" id="confirmEditBtn{{ $testimonial->id }}">
                                Oui, enregistrer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Suppression --}}
            <div class="modal fade" id="deleteTestimonialModal{{ $testimonial->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" class="modal-content">
                        @csrf
                        @method('DELETE')

                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Confirmer la suppression</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            ⚠️ Cette action supprimera définitivement le témoignage de « {{ $testimonial->name }} ». Voulez-vous continuer ?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-outline-danger">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>

        @empty
            <p>Aucun témoignage pour l’instant.</p>
        @endforelse
    </div>
</div>

{{-- Modal Ajout --}}
<div class="modal fade" id="addTestimonialModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.testimonials.store') }}" class="modal-content" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un nouveau témoignage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="name_add" class="form-label">Nom</label>
                    <input type="text" name="name" id="name_add" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="position_add" class="form-label">Poste</label>
                    <input type="text" name="position" id="position_add" class="form-control" value="{{ old('position') }}">
                </div>

                <div class="mb-3">
                    <label for="text_add" class="form-label">Texte</label>
                    <textarea name="text" id="text_add" rows="5" class="form-control" required>{{ old('text') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="stars_add" class="form-label">Étoiles</label>
                    <select name="stars" id="stars_add" class="form-select" required>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" @selected(old('stars') == $i)>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image_add" class="form-label">Image (optionnelle)</label>
                    <input type="file" name="image" id="image_add" class="form-control" accept="image/*">
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
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    .btn-custom-purple:hover,
    .btn-custom-purple:focus {
        background-color: #553a72;
        box-shadow: 0 6px 12px rgba(85, 58, 114, 0.6);
        color: white;
    }

    /* Nouveau style pour btn-outline-purple */
    .btn-outline-purple {
        color: #6A4A8F;
        border-color: #6A4A8F;
        background-color: transparent;
        font-weight: 600;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-outline-purple:hover,
    .btn-outline-purple:focus {
        color: white;
        background-color: #6A4A8F;
        border-color: #6A4A8F;
        box-shadow: 0 6px 12px rgba(106, 74, 143, 0.6);
    }
</style>
@endpush

@push('scripts')
<script>
    // Toast auto disparition
    const successToastEl = document.getElementById('successToast');
    if (successToastEl) {
        const toast = new bootstrap.Toast(successToastEl);
        toast.show();
    }

    // Confirmation modification dynamique
    @foreach($testimonials as $testimonial)
    document.getElementById('confirmEditBtn{{ $testimonial->id }}').addEventListener('click', function() {
        const form = document.getElementById('editForm{{ $testimonial->id }}');

        // Fermer les modals avant submit
        const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmEditModal{{ $testimonial->id }}'));
        confirmModal.hide();

        const editModal = bootstrap.Modal.getInstance(document.getElementById('editTestimonialModal{{ $testimonial->id }}'));
        editModal.hide();

        form.submit();
    });
    @endforeach
</script>
@endpush
