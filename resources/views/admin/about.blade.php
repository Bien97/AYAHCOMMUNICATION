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
        <h2>A Propos</h2>
        <button class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#addAboutModal">
            + Ajouter une section
        </button>
    </div>

    {{-- Liste des sections --}}
    <div class="row g-4">
        @forelse($aboutSections as $section)
            <div class="col-md-6">
                <div class="border rounded p-3 bg-light h-100 shadow-sm">

                    <h5 class="fw-bold">#{{ $section->id }} - {{ $section->title }}</h5>

                    <p style="white-space: pre-wrap;">{{ $section->paragraph }}</p>

                    <div class="d-flex gap-2 mt-3">
                        {{-- Bouton Modifier --}}
                        <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAboutModal{{ $section->id }}">
                            Modifier
                        </button>

                        {{-- Bouton Supprimer --}}
                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAboutModal{{ $section->id }}">
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>

            {{-- Modal Modification --}}
            <div class="modal fade" id="editAboutModal{{ $section->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('admin.about.update', $section->id) }}" class="modal-content" id="editForm{{ $section->id }}">
                        @csrf
                        @method('PUT')

                        <div class="modal-header">
                            <h5 class="modal-title">Modifier la section #{{ $section->id }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title_{{ $section->id }}" class="form-label">Titre</label>
                                <input type="text" name="title" id="title_{{ $section->id }}" class="form-control" value="{{ old('title', $section->title) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="paragraph_{{ $section->id }}" class="form-label">Paragraphe</label>
                                <textarea name="paragraph" id="paragraph_{{ $section->id }}" rows="5" class="form-control" required>{{ old('paragraph', $section->paragraph) }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            {{-- Bouton pour ouvrir modal confirmation --}}
                            <button type="button" class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#confirmEditModal{{ $section->id }}">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Modal Confirmation modification --}}
            <div class="modal fade" id="confirmEditModal{{ $section->id }}" tabindex="-1">
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
                            <button type="button" class="btn btn-warning" id="confirmEditBtn{{ $section->id }}">
                                Oui, enregistrer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Suppression --}}
            <div class="modal fade" id="deleteAboutModal{{ $section->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('admin.about.destroy', $section->id) }}" class="modal-content">
                        @csrf
                        @method('DELETE')

                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Confirmer la suppression</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            ⚠️ Cette action supprimera définitivement la section « {{ $section->title }} ». Voulez-vous continuer ?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-outline-danger">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <p>Aucune section pour l’instant.</p>
        @endforelse
    </div>
</div>

{{-- Modal Ajout --}}
<div class="modal fade" id="addAboutModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.about.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="title_add" class="form-label">Titre</label>
                    <input type="text" name="title" id="title_add" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="paragraph_add" class="form-label">Paragraphe</label>
                    <textarea name="paragraph" id="paragraph_add" rows="5" class="form-control" required>{{ old('paragraph') }}</textarea>
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
    @foreach($aboutSections as $section)
    document.getElementById('confirmEditBtn{{ $section->id }}').addEventListener('click', function() {
        const form = document.getElementById('editForm{{ $section->id }}');

        // Fermer les modals avant submit
        const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmEditModal{{ $section->id }}'));
        confirmModal.hide();

        const editModal = bootstrap.Modal.getInstance(document.getElementById('editAboutModal{{ $section->id }}'));
        editModal.hide();

        form.submit();
    });
    @endforeach
</script>
@endpush
