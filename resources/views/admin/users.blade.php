@extends('admin.layouts.app')

@section('content')
<div class="container mt-5 px-3 px-md-5">

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
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast align-items-center text-bg-success shadow-lg" role="alert" id="successToast" data-bs-delay="3000" style="animation: slideInToast 0.5s forwards;">
            <div class="d-flex">
                <div class="toast-body">{{ session('success') }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast align-items-center text-bg-danger shadow-lg" role="alert" id="errorToast" data-bs-delay="4000" style="animation: slideInToast 0.5s forwards;">
            <div class="d-flex">
                <div class="toast-body">{{ session('error') }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4 flex-column flex-md-row gap-3">
        <h2 class="mb-0">Utilisateurs</h2>
        <button class="btn btn-custom-purple shadow-sm" data-bs-toggle="modal" data-bs-target="#addUserModal" style="min-width: 200px;">
            + Ajouter un utilisateur
        </button>
    </div>

    <div class="row g-4">
        @forelse($users as $user)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="user-card border rounded p-4 bg-light h-100 shadow-sm d-flex flex-column justify-content-between">
                <div class="user-avatar mx-auto mb-3 d-flex align-items-center justify-content-center bg-primary rounded-circle text-white fw-bold" style="width: 80px; height: 80px; font-size: 1.5rem;">
                    {{ strtoupper(substr($user->firstname, 0, 1) . substr($user->lastname, 0, 1)) }}
                </div>

                <div class="text-center">
                    <h5 class="fw-bold mb-2">{{ $user->firstname }} {{ $user->lastname }}</h5>
                    <p class="text-muted mb-2">
                        <strong>Pseudo:</strong> {{ $user->pseudo }}
                    </p>
                    <p class="text-muted mb-3 text-truncate" title="{{ $user->email }}">
                        <strong>Email:</strong> {{ $user->email }}
                    </p>
                    <p class="text-muted small">
                        <strong>Créé le:</strong> {{ $user->created_at->format('d/m/Y à H:i') }}
                    </p>
                </div>

                <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
                    <button class="btn btn-outline-warning btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">
                        Modifier
                    </button>

                    <button class="btn btn-outline-danger btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Modification -->
        <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="modal-content" id="editForm{{ $user->id }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserLabel{{ $user->id }}">Modifier l'utilisateur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname_{{ $user->id }}" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="firstname_{{ $user->id }}" name="firstname" value="{{ old('firstname', $user->firstname) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lastname_{{ $user->id }}" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="lastname_{{ $user->id }}" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email_{{ $user->id }}" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_{{ $user->id }}" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password_{{ $user->id }}" class="form-label">Nouveau mot de passe (optionnel)</label>
                                <input type="password" class="form-control" id="password_{{ $user->id }}" name="password" minlength="6">
                                <small class="text-muted">Laisser vide pour conserver le mot de passe actuel</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation_{{ $user->id }}" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation_{{ $user->id }}" name="password_confirmation">
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <small><strong>Note:</strong> Le pseudo sera automatiquement mis à jour : {{ $user->firstname }}{{ $user->id < 10 ? '0' . $user->id : $user->id }}</small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-custom-purple" data-bs-toggle="modal" data-bs-target="#confirmEditModal{{ $user->id }}">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Confirmation modification -->
        <div class="modal fade" id="confirmEditModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-warning shadow">
                    <div class="modal-header bg-warning text-dark">
                        <h5 class="modal-title">Confirmer la modification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>

                    <div class="modal-body">
                        Voulez-vous vraiment enregistrer ces modifications pour l'utilisateur <strong>{{ $user->firstname }} {{ $user->lastname }}</strong> ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-warning" id="confirmEditBtn{{ $user->id }}">
                            Oui, enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Suppression -->
        <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="modal-content">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmer la suppression</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>

                    <div class="modal-body">
                        ⚠️ Cette action supprimera définitivement l'utilisateur « <strong>{{ $user->firstname }} {{ $user->lastname }}</strong> » et toutes ses données associées. Voulez-vous continuer ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-outline-danger">Oui, supprimer</button>
                    </div>
                </form>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5">
            <p>Aucun utilisateur pour l'instant.</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Modal Ajout -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form method="POST" action="{{ route('admin.users.store') }}" class="modal-content" id="addUserForm">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title" id="addUserLabel">Ajouter un nouvel utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstname_add" class="form-label">Prénom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstname_add" name="firstname" value="{{ old('firstname') }}" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ \'-]+">
                        <div class="invalid-feedback">Le prénom ne doit contenir que des lettres, espaces, apostrophes et tirets.</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="lastname_add" class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastname_add" name="lastname" value="{{ old('lastname') }}" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ \'-]+">
                        <div class="invalid-feedback">Le nom ne doit contenir que des lettres, espaces, apostrophes et tirets.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email_add" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email_add" name="email" value="{{ old('email') }}" required>
                    <div class="invalid-feedback">Veuillez saisir une adresse email valide.</div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password_add" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_add" name="password" minlength="6" required>
                        <div class="invalid-feedback">Le mot de passe doit contenir au moins 6 caractères.</div>
                        <small class="text-muted">Minimum 6 caractères</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation_add" class="form-label">Confirmer le mot de passe <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_confirmation_add" name="password_confirmation" required>
                        <div class="invalid-feedback">Les mots de passe ne correspondent pas.</div>
                    </div>
                </div>

                <div class="alert alert-info">
                    <small><strong>Note:</strong> Le pseudo sera généré automatiquement à partir du prénom et de l'ID utilisateur.</small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-custom-purple" id="addUserBtn">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Bouton violet custom avec transitions */
.btn-custom-purple {
    background-color: #6A4A8F;
    color: white;
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(106, 74, 143, 0.4);
    transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
    min-width: 120px;
}
.btn-custom-purple:hover,
.btn-custom-purple:focus {
    background-color: #553a72;
    box-shadow: 0 6px 16px rgba(85, 58, 114, 0.6);
    color: white;
    transform: translateY(-3px);
}

/* Cartes utilisateurs */
.user-card {
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
}
.user-card:hover {
    box-shadow: 0 12px 28px rgba(106, 74, 143, 0.3);
    transform: translateY(-8px);
}

/* Avatar utilisateur */
.user-avatar {
    background: linear-gradient(135deg, #6A4A8F 0%, #8B5A96 100%);
    box-shadow: 0 4px 15px rgba(106, 74, 143, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.user-card:hover .user-avatar {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(106, 74, 143, 0.5);
}

/* Animation fadeInUp */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Toast animation */
@keyframes slideInToast {
    from {
        opacity: 0;
        transform: translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Modal animations (Bootstrap 5 custom override) */
.modal.fade .modal-dialog {
    transition: transform 0.4s ease, opacity 0.4s ease;
    transform: translateY(-30px);
    opacity: 0;
}
.modal.fade.show .modal-dialog {
    transform: translateY(0);
    opacity: 1;
}

/* Responsive text overflow */
.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Form styling */
.form-control:focus {
    border-color: #6A4A8F;
    box-shadow: 0 0 0 0.2rem rgba(106, 74, 143, 0.25);
}

/* Alert info custom */
.alert-info {
    background-color: rgba(106, 74, 143, 0.1);
    border-color: rgba(106, 74, 143, 0.3);
    color: #6A4A8F;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .user-card {
        padding: 2rem 1.5rem;
    }
    
    .user-avatar {
        width: 60px;
        height: 60px;
        font-size: 1.2rem;
    }
}

/* Delay animation for cards */
.user-card:nth-child(1) { animation-delay: 0.1s; }
.user-card:nth-child(2) { animation-delay: 0.2s; }
.user-card:nth-child(3) { animation-delay: 0.3s; }
.user-card:nth-child(4) { animation-delay: 0.4s; }
.user-card:nth-child(5) { animation-delay: 0.5s; }
.user-card:nth-child(6) { animation-delay: 0.6s; }
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

    // Confirmation modification dynamique
    @foreach($users as $user)
    document.getElementById('confirmEditBtn{{ $user->id }}').addEventListener('click', function() {
        const form = document.getElementById('editForm{{ $user->id }}');

        // Fermer les modals avant submit
        const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmEditModal{{ $user->id }}'));
        confirmModal.hide();

        const editModal = bootstrap.Modal.getInstance(document.getElementById('editUserModal{{ $user->id }}'));
        editModal.hide();

        form.submit();
    });
    @endforeach

    // Validation des mots de passe et formulaire
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction de validation des mots de passe
        function validatePasswordMatch(password, confirm) {
            if (password.value !== confirm.value && confirm.value !== '') {
                confirm.setCustomValidity('Les mots de passe ne correspondent pas');
                confirm.classList.add('is-invalid');
                return false;
            } else {
                confirm.setCustomValidity('');
                confirm.classList.remove('is-invalid');
                return true;
            }
        }

        // Validation pour le modal d'ajout
        const addForm = document.getElementById('addUserForm');
        const passwordAdd = document.getElementById('password_add');
        const passwordConfirmAdd = document.getElementById('password_confirmation_add');
        const firstnameAdd = document.getElementById('firstname_add');
        const lastnameAdd = document.getElementById('lastname_add');
        const emailAdd = document.getElementById('email_add');

        if (passwordAdd && passwordConfirmAdd) {
            passwordAdd.addEventListener('input', () => validatePasswordMatch(passwordAdd, passwordConfirmAdd));
            passwordConfirmAdd.addEventListener('input', () => validatePasswordMatch(passwordAdd, passwordConfirmAdd));
        }

        // Validation regex pour prénom et nom
        function validateNameField(field) {
            const regex = /^[A-Za-zÀ-ÖØ-öø-ÿ \'-]+$/;
            if (!regex.test(field.value) && field.value !== '') {
                field.classList.add('is-invalid');
                return false;
            } else {
                field.classList.remove('is-invalid');
                return true;
            }
        }

        if (firstnameAdd) {
            firstnameAdd.addEventListener('input', () => validateNameField(firstnameAdd));
        }

        if (lastnameAdd) {
            lastnameAdd.addEventListener('input', () => validateNameField(lastnameAdd));
        }

        // Validation du formulaire avant soumission
        if (addForm) {
            addForm.addEventListener('submit', function(e) {
                let isValid = true;

                // Vérifier tous les champs requis
                const requiredFields = [firstnameAdd, lastnameAdd, emailAdd, passwordAdd, passwordConfirmAdd];
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    }
                });

                // Vérifier la correspondance des mots de passe
                if (!validatePasswordMatch(passwordAdd, passwordConfirmAdd)) {
                    isValid = false;
                }

                // Vérifier les noms
                if (!validateNameField(firstnameAdd) || !validateNameField(lastnameAdd)) {
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                addForm.classList.add('was-validated');
            });
        }

        // Validation pour les modals d'édition
        @foreach($users as $user)
        const password{{ $user->id }} = document.getElementById('password_{{ $user->id }}');
        const passwordConfirm{{ $user->id }} = document.getElementById('password_confirmation_{{ $user->id }}');
        const editForm{{ $user->id }} = document.getElementById('editForm{{ $user->id }}');
        
        if (password{{ $user->id }} && passwordConfirm{{ $user->id }}) {
            password{{ $user->id }}.addEventListener('input', () => validatePasswordMatch(password{{ $user->id }}, passwordConfirm{{ $user->id }}));
            passwordConfirm{{ $user->id }}.addEventListener('input', () => validatePasswordMatch(password{{ $user->id }}, passwordConfirm{{ $user->id }}));
        }
        @endforeach

        // Debug: Log pour vérifier que le script fonctionne
        console.log('Script de validation des utilisateurs chargé');
    });
</script>
@endpush