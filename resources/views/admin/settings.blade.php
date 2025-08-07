@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">

    {{-- ✅ Toast de succès --}}
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

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Paramètres du site</h2>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Nom du site</h5>
                        <p>{{ $settings->site_name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Email</h5>
                        <p>{{ $settings->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Téléphone</h5>
                        <p>{{ $settings->phone }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Logo Header</h5>
                        @if ($settings->logo_header)
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#logoHeaderModal">Voir l'image</button>
                        @else
                            <p class="text-muted">Non défini</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Logo Footer</h5>
                        @if ($settings->logo_footer)
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#logoFooterModal">Voir l'image</button>
                        @else
                            <p class="text-muted">Non défini</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Carte Google Maps</h5>
                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#mapModal">Voir la carte</button>
                    </div>
                </div>
            </div>

            <!-- Boutons d’action -->
            <div class="d-flex gap-2 mt-4">
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSettingsModal">Modifier</button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Supprimer</button>
            </div>
        </div>
    </div>
</div>

{{-- ✅ MODALS PREVIEW --}}
<div class="modal fade" id="logoHeaderModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('storage/' . $settings->logo_header) }}" class="img-fluid" alt="Logo Header">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logoFooterModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('storage/' . $settings->logo_footer) }}" class="img-fluid" alt="Logo Footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mapModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <iframe style="width: 100%; height: 400px; border:0;" src="{{ $settings->map_location }}"
                    allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

{{-- ✅ MODAL MODIFICATION --}}
<div class="modal fade" id="editSettingsModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('update.settings', $settings->id) }}" class="modal-content" enctype="multipart/form-data" id="settingsForm">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Modifier les paramètres</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label>Nom du site</label>
                    <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $settings->email }}">
                </div>
                <div class="mb-3">
                    <label>Téléphone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $settings->phone }}">
                </div>
                <div class="mb-3">
                    <label>Lien Google Maps</label>
                    <input type="text" name="map_location" class="form-control" value="{{ $settings->map_location }}">
                </div>
                <div class="mb-3">
                    <label>Nouveau Logo Header</label>
                    <input type="file" name="logo_header" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Nouveau Logo Footer</label>
                    <input type="file" name="logo_footer" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <!-- Bouton déclenche le modal de confirmation -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmEditModal">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ✅ MODAL CONFIRMATION DE MODIFICATION --}}
<div class="modal fade" id="confirmEditModal" tabindex="-1">
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
                <button type="button" id="confirmEditBtn" class="btn btn-warning">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="spinnerEdit"></span>
                    Oui, enregistrer
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ✅ MODAL SUPPRESSION --}}
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('delete.settings', $settings->id) }}" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmer la suppression</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                ⚠️ Cette action supprimera définitivement les paramètres du site. Voulez-vous continuer ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Oui, supprimer</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // ✅ Toast auto disparition
    const successToastEl = document.getElementById('successToast');
    if (successToastEl) {
        const toast = new bootstrap.Toast(successToastEl);
        toast.show();
    }

    // ✅ Confirmation avant envoi
    const confirmEditBtn = document.getElementById('confirmEditBtn');
    const spinnerEdit = document.getElementById('spinnerEdit');
    const settingsForm = document.getElementById('settingsForm');

    if (confirmEditBtn && settingsForm) {
        confirmEditBtn.addEventListener('click', () => {
            spinnerEdit.classList.remove('d-none');
            confirmEditBtn.disabled = true;
            settingsForm.submit();
        });
    }
</script>
@endpush
