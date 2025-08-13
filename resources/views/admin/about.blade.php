@extends('admin.layouts.app')

@section('content')
<div class="container mt-4 px-2 px-md-4">

    {{-- Messages Flash --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <h6 class="alert-heading mb-2">Erreurs de validation :</h6>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- En-tête --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>A Propos</h2>
        @if($aboutSection->getFilledSectionsCount() < 3)
            <button class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#addAboutModal">
                + Ajouter une section ({{ 3 - $aboutSection->getFilledSectionsCount() }} restante(s))
            </button>
        @else
            <span class="badge bg-warning text-dark fs-6">Maximum de 3 sections atteint</span>
        @endif
    </div>

    {{-- Image commune --}}
    @if($aboutSection->image_about)
        <div class="text-center mb-4">
            <div class="border rounded p-3 bg-light shadow-sm d-inline-block">
                <h5 class="mb-3">Image commune aux sections</h5>
                <button class="btn btn-custom-purple-outline btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal">
                    <i class="fas fa-image me-1"></i> Voir l'image
                </button>
            </div>
        </div>

        {{-- Modal Image --}}
        <div class="modal fade" id="imageModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Image About</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('storage/' . $aboutSection->image_about) }}" class="img-fluid" alt="About Image">
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Liste des sections --}}
    <div class="row g-4">
        @php
            $sectionsData = [];
            for($i = 1; $i <= 3; $i++) {
                $titleField = $i == 1 ? 'title' : "title_{$i}";
                $paragraphField = $i == 1 ? 'paragraph' : "paragraph_{$i}";
                $title = $aboutSection->getAttribute($titleField);
                $paragraph = $aboutSection->getAttribute($paragraphField);
                
                if($title && $paragraph) {
                    $sectionsData[] = [
                        'number' => $i,
                        'title' => $title,
                        'paragraph' => $paragraph,
                        'titleField' => $titleField,
                        'paragraphField' => $paragraphField
                    ];
                }
            }
        @endphp

        @forelse($sectionsData as $section)
            <div class="col-md-6">
                <div class="border rounded p-3 bg-light h-100 shadow-sm">
                    <h5 class="fw-bold">Section {{ $section['number'] }} - {{ $section['title'] }}</h5>
                    <p style="white-space: pre-wrap;">{{ $section['paragraph'] }}</p>

                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $section['number'] }}">
                            Modifier
                        </button>
                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $section['number'] }}">
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>

            {{-- Modal Modification --}}
            <div class="modal fade" id="editModal{{ $section['number'] }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action="{{ route('admin.about.update', $section['number']) }}" class="modal-content" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier la section {{ $section['number'] }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ $section['title'] }}" required maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Paragraphe <span class="text-danger">*</span></label>
                                <textarea name="paragraph" class="form-control" rows="5" required>{{ $section['paragraph'] }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image About (commune à toutes les sections)</label>
                                <input type="file" name="image_about" class="form-control" accept="image/*">
                                @if($aboutSection->image_about)
                                    <small class="text-muted d-block mt-1">
                                        <i class="fas fa-file-image me-1"></i>
                                        Actuel: {{ basename($aboutSection->image_about) }}
                                    </small>
                                @endif
                                <small class="form-text text-muted">Formats acceptés: JPG, JPEG, PNG, SVG - Max: 5MB</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-custom-purple">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Modal Suppression --}}
            <div class="modal fade" id="deleteModal{{ $section['number'] }}" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('admin.about.destroy', $section['number']) }}" class="modal-content">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Confirmer la suppression</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            ⚠️ Supprimer définitivement la section {{ $section['number'] }} « {{ $section['title'] }} » ?
                            @if($section['number'] == 1 && count($sectionsData) == 1)
                                <br><strong>L'image commune sera également supprimée.</strong>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">Aucune section pour l'instant.</p>
            </div>
        @endforelse
    </div>
</div>

{{-- Modal Ajout --}}
@if($aboutSection->getFilledSectionsCount() < 3)
<div class="modal fade" id="addAboutModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('admin.about.store') }}" class="modal-content" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Cette section sera la <strong>section {{ $aboutSection->getNextAvailableSection() ?? 'suivante' }}</strong>
                </div>

                <div class="mb-3">
                    <label class="form-label">Titre <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required maxlength="255">
                </div>

                <div class="mb-3">
                    <label class="form-label">Paragraphe <span class="text-danger">*</span></label>
                    <textarea name="paragraph" class="form-control" rows="5" required>{{ old('paragraph') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image About (commune à toutes les sections)</label>
                    <input type="file" name="image_about" class="form-control" accept="image/*">
                    @if($aboutSection->image_about)
                        <small class="text-info d-block mt-1">
                            <i class="fas fa-file-image me-1"></i>
                            Une image existe déjà. Laissez vide pour la conserver.
                        </small>
                    @endif
                    <small class="form-text text-muted">Formats acceptés: JPG, JPEG, PNG, SVG - Max: 5MB</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-custom-purple">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endif

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

    // Si des erreurs sont présentes au chargement, ouvrir le modal d'ajout
    @if($errors->any() && (old('title') || old('paragraph')))
        document.addEventListener('DOMContentLoaded', function() {
            const addModal = document.getElementById('addAboutModal');
            if (addModal) {
                const modal = new bootstrap.Modal(addModal);
                modal.show();
            }
        });
    @endif
</script>
@endpush