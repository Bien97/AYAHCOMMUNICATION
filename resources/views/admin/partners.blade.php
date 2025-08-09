@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">

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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Partenaires</h2>
        <button class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
            + Ajouter un partenaire
        </button>
    </div>

    <div class="row g-4">
        @forelse($partners as $partner)
        <div class="col-md-6 col-lg-4">
            <div class="border rounded p-3 bg-light h-100 shadow-sm text-center">

                @if($partner->image)
                <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">
                @endif

                <h5 class="fw-bold">{{ $partner->name }}</h5>
                <p><a href="{{ $partner->link }}" target="_blank" rel="noopener noreferrer">{{ $partner->link }}</a></p>

                <div class="d-flex justify-content-center gap-2 mt-3">
                    <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPartnerModal{{ $partner->id }}">
                        Modifier
                    </button>

                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePartnerModal{{ $partner->id }}">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Modification -->
        <div class="modal fade" id="editPartnerModal{{ $partner->id }}" tabindex="-1" aria-labelledby="editPartnerLabel{{ $partner->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.partners.update', $partner->id) }}" class="modal-content" enctype="multipart/form-data" id="editForm{{ $partner->id }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="editPartnerLabel{{ $partner->id }}">Modifier le partenaire</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name_{{ $partner->id }}" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name_{{ $partner->id }}" name="name" value="{{ old('name', $partner->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="link_{{ $partner->id }}" class="form-label">Lien</label>
                            <input type="url" class="form-control" id="link_{{ $partner->id }}" name="link" value="{{ old('link', $partner->link) }}">
                        </div>

                        <div class="mb-3">
                            <label for="image_{{ $partner->id }}" class="form-label">Image (optionnelle)</label>
                            <input type="file" class="form-control" id="image_{{ $partner->id }}" name="image" accept="image/*">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#confirmEditModal{{ $partner->id }}">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Confirmation modification -->
        <div class="modal fade" id="confirmEditModal{{ $partner->id }}" tabindex="-1" aria-hidden="true">
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
                        <button type="button" class="btn btn-warning" id="confirmEditBtn{{ $partner->id }}">
                            Oui, enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Suppression -->
        <div class="modal fade" id="deletePartnerModal{{ $partner->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.partners.destroy', $partner->id) }}" class="modal-content">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmer la suppression</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        ⚠️ Cette action supprimera définitivement le partenaire « {{ $partner->name }} ». Voulez-vous continuer ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-outline-danger">Oui, supprimer</button>
                    </div>
                </form>
            </div>
        </div>

        @empty
        <p>Aucun partenaire pour l’instant.</p>
        @endforelse
    </div>
</div>

<!-- Modal Ajout -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.partners.store') }}" class="modal-content" enctype="multipart/form-data">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title" id="addPartnerLabel">Ajouter un nouveau partenaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="name_add" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name_add" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="link_add" class="form-label">Lien</label>
                    <input type="url" class="form-control" id="link_add" name="link" value="{{ old('link') }}">
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
    @foreach($partners as $partner)
    document.getElementById('confirmEditBtn{{ $partner->id }}').addEventListener('click', function() {
        const form = document.getElementById('editForm{{ $partner->id }}');

        // Fermer les modals avant submit
        const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmEditModal{{ $partner->id }}'));
        confirmModal.hide();

        const editModal = bootstrap.Modal.getInstance(document.getElementById('editPartnerModal{{ $partner->id }}'));
        editModal.hide();

        form.submit();
    });
    @endforeach
</script>
@endpush
