<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #FFFFFF;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            color: #5B5B5B;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background-color: #6A4A8F;
            box-shadow: 0 2px 10px rgba(106, 74, 143, 0.3);
            height: 56px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        .navbar-brand {
            color: #FFFFFF;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: #FFFFFF;
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }

        .toggle-btn:hover {
            transform: scale(1.1);
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 56px;
            left: 0;
            width: 250px;
            background-color: #FFFFFF;
            color: #5B5B5B;
            margin-top: 0;
            transition: all 0.3s ease-in-out;
            z-index: 1020;
            overflow: auto;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            margin-left: -250px;
        }

        /* Liens */
        .sidebar a {
            color: #5B5B5B;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            font-size: 1.05rem;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
            border-radius: 4px;
            gap: 0.8rem;
        }

        .sidebar a span {
            display: inline-block;
            position: relative;
            top: -2px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #FFFFFF;
            color: #6A4A8F;
            border-left: 3px solid #6A4A8F;
            text-decoration: none;
        }

        .sidebar a:hover i,
        .sidebar a:hover span {
            transform: translateX(5px);
            color: #6A4A8F;
        }

        /* Lien actif */
        .sidebar a.active-link {
            background-color: #6A4A8F;
            color: #FFFFFF;
            border-left: 3px solid #6A4A8F;
        }

        /* Lien actif au hover : reste pareil */
        .sidebar a.active-link:hover {
            background-color: #6A4A8F;
            color: #FFFFFF;
            border-left: 3px solid #6A4A8F;
            transform: none;
        }

        .sidebar a.active-link:hover i,
        .sidebar a.active-link:hover span {
            transform: none;
            color: #FFFFFF;
        }

        /* Logo */
        .sidebar img {
            max-width: 150px;
            height: auto;
            margin-top: -15px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .sidebar img:hover {
            transform: scale(1.05);
        }

        .sidebar .text-center {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        /* Content */
        .content {
            margin-left: 250px;
            margin-top: 56px;
            padding: 30px;
            background-color: #FFFFFF;
            border-radius: 10px;
            transition: margin-left 0.3s ease;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
            color: #5B5B5B;
        }

        .content.expanded {
            margin-left: 0 !important;
        }

        /* Overlay mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 56px;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(91, 91, 91, 0.5);
            z-index: 1040;
        }

        .overlay.active {
            display: block;
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(91, 91, 91, 0.2);
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: rgba(91, 91, 91, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
                position: fixed;
                width: 250px;
                top: 56px;
                height: calc(100% - 56px);
                z-index: 1050;
            }

            .sidebar.show {
                margin-left: 0;
            }

            .content {
                margin-left: 0 !important;
            }
        }

        .sidebar a i {
            transition: transform 0.3s ease, color 0.3s ease;
            color: inherit;
        }

        /* Logout */
        .sidebar .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }
    </style>

    @stack('styles')
</head>

<body>

    @if (session('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
            <div class="toast align-items-center text-bg-success" role="alert" id="successToast" data-bs-delay="4000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
    @endif

    {{-- ❌ Toast d'erreur --}}
    @if (session('error'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
            <div class="toast align-items-center text-bg-danger" role="alert" id="errorToast" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
    @endif

    <!-- Navbar -->
    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
            <button class="toggle-btn me-3" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="ms-auto d-flex align-items-center" style="white-space: nowrap;">
                <!-- Icône profil -->
                <!-- Bouton Profil -->
                <!-- Bouton Profil -->
                <a href="#" class="btn btn-outline-light btn-sm me-2 d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#profileModal">
                    <i class="fas fa-user-circle me-2"></i> Profil
                </a>



                <!-- Interface client -->
                <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm d-flex align-items-center">
                    <i class="fas fa-exchange-alt me-2"></i> Interface Client
                </a>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="text-center mb-4">
            <a href="{{ url('/admin/dashboard') }}">
                @if ($settings && $settings->logo_header)
                    <img src="{{ asset('storage/' . $settings->logo_header) }}" alt="Logo" />
                @endif
            </a>
        </div>

        <!-- Tes liens existants ... -->
        <a href="{{ url('/admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active-link' : '' }}">
            <i class="fas fa-chart-line me-2"></i><span>Tableau de bord</span>
        </a>
        <a href="{{ url('/admin/about') }}" class="{{ request()->is('admin/about') ? 'active-link' : '' }}">
            <i class="fas fa-blog me-2"></i><span>A Propos</span>
        </a>
        <a href="{{ url('/admin/testimonials') }}"
            class="{{ request()->is('admin/testimonials') ? 'active-link' : '' }}">
            <i class="fas fa-comment-dots me-2"></i><span>Testimonials</span>
        </a>
        <a href="{{ url('/admin/services') }}" class="{{ request()->is('admin/services') ? 'active-link' : '' }}">
            <i class="fas fa-concierge-bell me-2"></i><span>Services</span>
        </a>
        <a href="{{ url('/admin/partners') }}" class="{{ request()->is('admin/partners') ? 'active-link' : '' }}">
            <i class="fas fa-users me-2"></i><span>Partners</span>
        </a>
        <a href="{{ url('/admin/settings') }}" class="{{ request()->is('admin/settings') ? 'active-link' : '' }}">
            <i class="fas fa-cog me-2"></i><span>Paramètres</span>
        </a>
        <a href="{{ url('/admin/users') }}" class="{{ request()->is('admin/users') ? 'active-link' : '' }}">
            <i class="fas fa-user me-2"></i> <!-- Icône profil -->
            <span>Users</span>
        </a>


        <!-- Lien de déconnexion -->
        <div style="position: absolute; bottom: 60px; width: 100%; text-align: center;">
            <a href="#" class="d-flex align-items-center justify-content-center w-75" data-bs-toggle="modal"
                data-bs-target="#logoutModal"
                style="color: red !important; padding: 10px 0; border-radius: 6px; text-decoration: none;">
                <i class="fas fa-sign-out-alt me-2" style="color: red !important;"></i> Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>



    </div>

    <!-- Modal Déconnexion -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirmation de déconnexion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body text-center">
                    Êtes-vous sûr de vouloir vous déconnecter ?
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger"
                        onclick="document.getElementById('logout-form').submit();">Déconnexion</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale Profil Editable -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form id="profileForm" action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Mon Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Nom" value="{{ old('lastname', Auth::user()->lastname) }}">
                            <label for="lastname">Nom</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Prénom" value="{{ old('firstname', Auth::user()->firstname) }}">
                            <label for="firstname">Prénom</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email" value="{{ old('email', Auth::user()->email) }}">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pseudo" name="pseudo"
                                placeholder="Pseudo" value="{{ old('pseudo', Auth::user()->pseudo) }}">
                            <label for="pseudo">Pseudo</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="openConfirmModal" class="btn"
                            style="background-color: #6A4A8F; color: #fff;">
                            Modifier
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
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

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Main Content -->
    <div class="content" id="mainContent">
        @yield('content')
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('mainContent');
        const overlay = document.getElementById('overlay');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('active');
            } else {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('expanded');
            }
        });

        overlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            overlay.classList.remove('active');
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
                overlay.classList.remove('active');
            }
        });
    </script>

    <!-- Script pour gérer le modal de confirmation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openConfirmBtn = document.getElementById('openConfirmModal');
            const confirmEditBtn = document.getElementById('confirmEditBtn');
            const profileForm = document.getElementById('profileForm');

            // Ouvre le modal de confirmation
            openConfirmBtn.addEventListener('click', function() {
                const confirmModal = new bootstrap.Modal(document.getElementById('confirmEditModal'));
                confirmModal.show();
            });

            // Soumet le formulaire si confirmé
            confirmEditBtn.addEventListener('click', function() {
                // Optionnel : afficher spinner
                document.getElementById('spinnerEdit').classList.remove('d-none');
                profileForm.submit();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successToastEl = document.getElementById('successToast');
            if (successToastEl) {
                const toast = new bootstrap.Toast(successToastEl);
                toast.show();
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openConfirmBtn = document.getElementById('openConfirmModal');
            const confirmEditBtn = document.getElementById('confirmEditBtn');
            const profileForm = document.getElementById('profileForm');
            const profileModalEl = document.getElementById('profileModal');

            // Initialise les modales Bootstrap
            const profileModal = new bootstrap.Modal(profileModalEl);
            const confirmModalEl = document.getElementById('confirmEditModal');
            const confirmModal = new bootstrap.Modal(confirmModalEl);

            // Ouvre le modal de confirmation après avoir fermé celui du profil
            openConfirmBtn.addEventListener('click', function() {
                profileModal.hide(); // Ferme le modal de profil
                setTimeout(() => {
                    confirmModal.show(); // Ouvre le modal de confirmation
                }, 300); // Petit délai pour l’animation
            });

            // Soumet le formulaire si confirmé
            confirmEditBtn.addEventListener('click', function() {
                document.getElementById('spinnerEdit').classList.remove('d-none');
                profileForm.submit();
            });
        });
    </script>


    @stack('scripts')


</body>

</html>
