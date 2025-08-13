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
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
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
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
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
            box-shadow: 0px 0px 10px rgba(0,0,0,0.05);
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
    </style>

    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark fixed-top">
    <div class="container-fluid">
        <button class="toggle-btn me-3" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <a
            href="{{ url('/') }}"
            class="btn btn-outline-light btn-sm ms-auto d-flex align-items-center"
            style="white-space: nowrap;"
        >
            <i class="fas fa-exchange-alt me-2"></i> Interface Client
        </a>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="text-center mb-4">
        <a href="{{ url('/admin/dashboard') }}">
        @if($settings && $settings->logo_header)
            <img src="{{ asset('storage/' . $settings->logo_header) }}" alt="Logo" />
        @endif
        </a>
    </div>

    <a href="{{ url('/admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active-link' : '' }}">
    <i class="fas fa-chart-line me-2"></i><span>Tableau de bord</span>
</a>

    <a href="{{ url('/admin/about') }}" class="{{ request()->is('admin/about') ? 'active-link' : '' }}">
        <i class="fas fa-blog me-2"></i><span>A Propos</span>
    </a>
    <a href="{{ url('/admin/testimonials') }}" class="{{ request()->is('admin/testimonials') ? 'active-link' : '' }}">
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

    toggleButton.addEventListener('click', function () {
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('active');
        } else {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        }
    });

    overlay.addEventListener('click', function () {
        sidebar.classList.remove('show');
        overlay.classList.remove('active');
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('show');
            overlay.classList.remove('active');
        }
    });
</script>

@stack('scripts')
</body>
</html>
