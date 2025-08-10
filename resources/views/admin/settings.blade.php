@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">

    {{-- ✅ Toast de succès --}}
    @if(session('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div class="toast align-items-center text-bg-success" role="alert" id="successToast" data-bs-delay="4000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    {{-- ❌ Toast d'erreur --}}
    @if(session('error'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div class="toast align-items-center text-bg-danger" role="alert" id="errorToast" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    {{-- ⚠️ Affichage des erreurs de validation --}}
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h6 class="alert-heading mb-2">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Erreurs de validation détectées :
        </h6>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
                            <button class="btn btn-custom-purple-outline btn-sm" data-bs-toggle="modal" data-bs-target="#logoHeaderModal">Voir l'image</button>
                        @else
                            <p class="text-muted">Non défini</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Logo Footer</h5>
                        @if ($settings->logo_footer)
                            <button class="btn btn-custom-purple-outline btn-sm" data-bs-toggle="modal" data-bs-target="#logoFooterModal">Voir l'image</button>
                        @else
                            <p class="text-muted">Non défini</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Image Background</h5>
                        @if ($settings->image_background)
                            <button class="btn btn-custom-purple-outline btn-sm" data-bs-toggle="modal" data-bs-target="#imageBackgroundModal">Voir l'image</button>
                        @else
                            <p class="text-muted">Non défini</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border rounded p-3 bg-light h-100">
                        <h5 class="fw-bold">Carte Google Maps</h5>
                        <button class="btn btn-custom-purple-outline btn-sm" data-bs-toggle="modal" data-bs-target="#mapModal">Voir la carte</button>
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
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

<div class="modal fade" id="imageBackgroundModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image Background</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('storage/' . $settings->image_background) }}" class="img-fluid" alt="Image Background">
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

{{-- MODAL MODIFICATION --}}
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
                    <label class="form-label">Nom du site <span class="text-danger">*</span></label>
                    <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror" 
                           value="{{ old('site_name', $settings->site_name) }}" required>
                    @error('site_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $settings->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Téléphone <span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                           value="{{ old('phone', $settings->phone) }}" required maxlength="20">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Maximum 20 caractères</small>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Lien Google Maps</label>
                    <input type="url" name="map_location" class="form-control @error('map_location') is-invalid @enderror" 
                           value="{{ old('map_location', $settings->map_location) }}" 
                           placeholder="https://maps.google.com/...">
                    @error('map_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">URL complète vers Google Maps</small>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nouveau Logo Header</label>
                    <input type="file" name="logo_header" class="form-control @error('logo_header') is-invalid @enderror" accept="image/*">
                    @error('logo_header')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($settings->logo_header)
                        <small class="text-muted d-block mt-1">
                            <i class="fas fa-file-image me-1"></i>
                            Actuel: {{ basename($settings->logo_header) }}
                        </small>
                    @endif
                    <small class="form-text text-muted">Formats acceptés: JPG, JPEG, PNG, SVG - Max: 5MB</small>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nouveau Logo Footer</label>
                    <input type="file" name="logo_footer" class="form-control @error('logo_footer') is-invalid @enderror" accept="image/*">
                    @error('logo_footer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($settings->logo_footer)
                        <small class="text-muted d-block mt-1">
                            <i class="fas fa-file-image me-1"></i>
                            Actuel: {{ basename($settings->logo_footer) }}
                        </small>
                    @endif
                    <small class="form-text text-muted">Formats acceptés: JPG, JPEG, PNG, SVG - Max: 5MB</small>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nouvelle Image Background</label>
                    <input type="file" name="image_background" class="form-control @error('image_background') is-invalid @enderror" accept="image/*">
                    @error('image_background')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($settings->image_background)
                        <small class="text-muted d-block mt-1">
                            <i class="fas fa-file-image me-1"></i>
                            Actuel: {{ basename($settings->image_background) }}
                        </small>
                    @endif
                    <small class="form-text text-muted">Formats acceptés: JPG, JPEG, PNG, SVG - Max: 5MB</small>
                </div>
            </div>

            <div class="modal-footer">
                <!-- Bouton déclenche le modal de confirmation -->
                <button type="button" class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#confirmEditModal">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL CONFIRMATION DE MODIFICATION --}}
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

{{-- MODAL SUPPRESSION --}}
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

@push('styles')
<style>
.btn-custom-purple-outline {
    background-color: transparent;
    border: 2px solid #6A4A8F;
    color: #6A4A8F;
    font-weight: 600;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-custom-purple-outline:hover,
.btn-custom-purple-outline:focus {
    background-color: #6A4A8F;
    color: white;
    box-shadow: 0 6px 12px rgba(106, 74, 143, 0.6);
}

.btn-custom-purple {
    background-color: #6A4A8F;
    border: 2px solid #6A4A8F;
    color: white;
    font-weight: 600;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-custom-purple:hover,
.btn-custom-purple:focus {
    background-color: #563d7c;
    border-color: #563d7c;
    box-shadow: 0 6px 12px rgba(86, 61, 124, 0.6);
    color: white;
}
</style>
@endpush

@push('scripts')
<script>
    // Toast auto disparition pour succès et erreurs
    const successToastEl = document.getElementById('successToast');
    if (successToastEl) {
        const toast = new bootstrap.Toast(successToastEl);
        toast.show();
    }
    
    const errorToastEl = document.getElementById('errorToast');
    if (errorToastEl) {
        const toast = new bootstrap.Toast(errorToastEl);
        toast.show();
    }

    // Validation côté client pour améliorer l'expérience utilisateur
    const settingsForm = document.getElementById('settingsForm');
    const confirmEditBtn = document.getElementById('confirmEditBtn');
    const spinnerEdit = document.getElementById('spinnerEdit');

    if (settingsForm) {
        // Validation en temps réel des champs
        const siteNameInput = settingsForm.querySelector('input[name="site_name"]');
        const emailInput = settingsForm.querySelector('input[name="email"]');
        const phoneInput = settingsForm.querySelector('input[name="phone"]');
        const mapLocationInput = settingsForm.querySelector('input[name="map_location"]');

        // Validation du nom du site
        siteNameInput?.addEventListener('input', function() {
            if (this.value.length > 255) {
                this.classList.add('is-invalid');
                showFieldError(this, 'Le nom ne peut pas dépasser 255 caractères');
            } else if (this.value.trim() === '') {
                this.classList.add('is-invalid');
                showFieldError(this, 'Le nom du site est obligatoire');
            } else {
                this.classList.remove('is-invalid');
                hideFieldError(this);
            }
        });

        // Validation de l'email
        emailInput?.addEventListener('input', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.value)) {
                this.classList.add('is-invalid');
                showFieldError(this, 'Veuillez saisir une adresse email valide');
            } else {
                this.classList.remove('is-invalid');
                hideFieldError(this);
            }
        });

        // Validation du téléphone
        phoneInput?.addEventListener('input', function() {
            if (this.value.length > 20) {
                this.classList.add('is-invalid');
                showFieldError(this, 'Le numéro ne peut pas dépasser 20 caractères');
            } else if (this.value.trim() === '') {
                this.classList.add('is-invalid');
                showFieldError(this, 'Le numéro de téléphone est obligatoire');
            } else {
                this.classList.remove('is-invalid');
                hideFieldError(this);
            }
        });

        // Validation de l'URL Google Maps
        mapLocationInput?.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                try {
                    new URL(this.value);
                    this.classList.remove('is-invalid');
                    hideFieldError(this);
                } catch {
                    this.classList.add('is-invalid');
                    showFieldError(this, 'Veuillez saisir une URL valide');
                }
            } else {
                this.classList.remove('is-invalid');
                hideFieldError(this);
            }
        });

        // Validation des fichiers images
        const imageInputs = settingsForm.querySelectorAll('input[type="file"]');
        imageInputs.forEach(input => {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg+xml'];
                    const maxSize = 5120 * 1024; // 5MB en bytes pour tous les fichiers
                    
                    if (!allowedTypes.includes(file.type)) {
                        this.classList.add('is-invalid');
                        showFieldError(this, 'Format non accepté. Utilisez JPG, JPEG, PNG ou SVG');
                        this.value = '';
                    } else if (file.size > maxSize) {
                        this.classList.add('is-invalid');
                        showFieldError(this, 'Le fichier dépasse la taille maximale de 5MB');
                        this.value = '';
                    } else {
                        this.classList.remove('is-invalid');
                        hideFieldError(this);
                    }
                }
            });
        });
    }

    // Confirmation avant envoi avec validation finale
    if (confirmEditBtn && settingsForm) {
        confirmEditBtn.addEventListener('click', () => {
            // Vérification finale avant soumission
            const invalidFields = settingsForm.querySelectorAll('.is-invalid');
            const requiredFields = settingsForm.querySelectorAll('input[required]');
            
            let hasErrors = false;
            
            // Vérifier les champs requis
            requiredFields.forEach(field => {
                if (field.value.trim() === '') {
                    field.classList.add('is-invalid');
                    showFieldError(field, 'Ce champ est obligatoire');
                    hasErrors = true;
                }
            });

            if (invalidFields.length > 0 || hasErrors) {
                alert('Veuillez corriger les erreurs avant de continuer.');
                return;
            }

            spinnerEdit.classList.remove('d-none');
            confirmEditBtn.disabled = true;
            settingsForm.submit();
        });
    }

    // Fonctions utilitaires pour affichage des erreurs
    function showFieldError(field, message) {
        let errorDiv = field.parentNode.querySelector('.invalid-feedback');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            field.parentNode.appendChild(errorDiv);
        }
        errorDiv.textContent = message;
    }

    function hideFieldError(field) {
        const errorDiv = field.parentNode.querySelector('.invalid-feedback');
        if (errorDiv) {
            errorDiv.remove();
        }
    }

    // Si des erreurs sont présentes au chargement, ouvrir automatiquement le modal de modification
    @if($errors->any())
        const editModal = new bootstrap.Modal(document.getElementById('editSettingsModal'));
        editModal.show();
    @endif
</script>
@endpush