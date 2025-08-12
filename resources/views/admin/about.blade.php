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

                    {{-- Affichage de l'image si elle existe --}}
                    @if($section->image_about)
                        <div class="mb-3">
                            <button class="btn btn-custom-purple-outline btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal{{ $section->id }}">
                                <i class="fas fa-image me-1"></i>
                                Voir l'image
                            </button>
                        </div>
                    @endif

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

            {{-- Modal Image Preview --}}
            @if($section->image_about)
            <div class="modal fade" id="imageModal{{ $section->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Image - {{ $section->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('storage/' . $section->image_about) }}" class="img-fluid" alt="{{ $section->title }}">
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Modal Modification --}}
            <div class="modal fade" id="editAboutModal{{ $section->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action="{{ route('admin.about.update', $section->id) }}" class="modal-content" enctype="multipart/form-data" id="editForm{{ $section->id }}">
                        @csrf
                        @method('PUT')

                        <div class="modal-header">
                            <h5 class="modal-title">Modifier la section #{{ $section->id }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title_{{ $section->id }}" class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title_{{ $section->id }}" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       value="{{ old('title', $section->title) }}" required maxlength="255">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="paragraph_{{ $section->id }}" class="form-label">Paragraphe <span class="text-danger">*</span></label>
                                <textarea name="paragraph" id="paragraph_{{ $section->id }}" rows="5" 
                                          class="form-control @error('paragraph') is-invalid @enderror" required>{{ old('paragraph', $section->paragraph) }}</textarea>
                                @error('paragraph')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image_about_{{ $section->id }}" class="form-label">Image About</label>
                                <input type="file" name="image_about" id="image_about_{{ $section->id }}" 
                                       class="form-control @error('image_about') is-invalid @enderror" accept="image/*">
                                @error('image_about')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if ($section->image_about)
                                    <small class="text-muted d-block mt-1">
                                        <i class="fas fa-file-image me-1"></i>
                                        Actuel: {{ basename($section->image_about) }}
                                    </small>
                                @endif
                                <small class="form-text text-muted">Formats acceptés: JPG, JPEG, PNG, SVG - Max: 5MB</small>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
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
                            Voulez-vous vraiment enregistrer ces modifications pour la section "{{ $section->title }}" ?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-warning" id="confirmEditBtn{{ $section->id }}">
                                <span class="spinner-border spinner-border-sm me-2 d-none" id="spinnerEdit{{ $section->id }}"></span>
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
                            ⚠️ Cette action supprimera définitivement la section « {{ $section->title }} » 
                            @if($section->image_about)
                                <strong>et son image associée</strong>
                            @endif. 
                            Voulez-vous continuer ?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Aucune section pour l'instant.</p>
        @endforelse
    </div>
</div>

{{-- Modal Ajout --}}
<div class="modal fade" id="addAboutModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('admin.about.store') }}" class="modal-content" enctype="multipart/form-data" id="addForm">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="title_add" class="form-label">Titre <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title_add" 
                           class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" required maxlength="255">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="paragraph_add" class="form-label">Paragraphe <span class="text-danger">*</span></label>
                    <textarea name="paragraph" id="paragraph_add" rows="5" 
                              class="form-control @error('paragraph') is-invalid @enderror" required>{{ old('paragraph') }}</textarea>
                    @error('paragraph')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_about_add" class="form-label">Image About</label>
                    <input type="file" name="image_about" id="image_about_add" 
                           class="form-control @error('image_about') is-invalid @enderror" accept="image/*">
                    @error('image_about')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Formats acceptés: JPG, JPEG, PNG, SVG - Max: 5MB</small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-custom-purple">
                    <span class="spinner-border spinner-border-sm me-2 d-none" id="spinnerAdd"></span>
                    Ajouter
                </button>
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
    
    const errorToastEl = document.getElementById('errorToast');
    if (errorToastEl) {
        const toast = new bootstrap.Toast(errorToastEl);
        toast.show();
    }

    // Validation des fichiers images côté client
    function validateImageFile(input) {
        const file = input.files[0];
        if (file) {
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg+xml'];
            const maxSize = 5120 * 1024; // 5MB en bytes
            
            if (!allowedTypes.includes(file.type)) {
                input.classList.add('is-invalid');
                showFieldError(input, 'Format non accepté. Utilisez JPG, JPEG, PNG ou SVG');
                input.value = '';
            } else if (file.size > maxSize) {
                input.classList.add('is-invalid');
                showFieldError(input, 'Le fichier dépasse la taille maximale de 5MB');
                input.value = '';
            } else {
                input.classList.remove('is-invalid');
                hideFieldError(input);
            }
        }
    }

    // Appliquer la validation à tous les inputs file
    document.querySelectorAll('input[type="file"][name="image_about"]').forEach(input => {
        input.addEventListener('change', function() {
            validateImageFile(this);
        });
    });

    // Fonctions utilitaires pour les erreurs
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

    // Confirmation modification dynamique
    @foreach($aboutSections as $section)
    document.getElementById('confirmEditBtn{{ $section->id }}').addEventListener('click', function() {
        const form = document.getElementById('editForm{{ $section->id }}');
        const spinner = document.getElementById('spinnerEdit{{ $section->id }}');
        
        // Vérification finale
        const requiredFields = form.querySelectorAll('input[required], textarea[required]');
        let hasErrors = false;
        
        requiredFields.forEach(field => {
            if (field.value.trim() === '') {
                field.classList.add('is-invalid');
                hasErrors = true;
            }
        });

        if (hasErrors) {
            alert('Veuillez remplir tous les champs obligatoires.');
            return;
        }

        // Afficher spinner et soumettre
        spinner.classList.remove('d-none');
        this.disabled = true;

        // Fermer les modals avant submit
        const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmEditModal{{ $section->id }}'));
        confirmModal.hide();

        const editModal = bootstrap.Modal.getInstance(document.getElementById('editAboutModal{{ $section->id }}'));
        editModal.hide();

        form.submit();
    });
    @endforeach

    // Gestion du formulaire d'ajout
    const addForm = document.getElementById('addForm');
    const addSpinner = document.getElementById('spinnerAdd');
    
    addForm.addEventListener('submit', function() {
        addSpinner.classList.remove('d-none');
    });

    // Si des erreurs sont présentes au chargement, ouvrir automatiquement le modal approprié
    @if($errors->any())
        @if(old('title') || old('paragraph'))
            const addModal = new bootstrap.Modal(document.getElementById('addAboutModal'));
            addModal.show();
        @endif
    @endif
</script>
@endpush