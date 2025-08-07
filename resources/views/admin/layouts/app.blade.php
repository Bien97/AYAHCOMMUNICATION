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
            background-color: #f8f9fa;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 50px;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            transition: all 0.3s ease;
            z-index: 1020;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            transition: background-color 0.2s ease;
        }

        .sidebar a:hover,
        .sidebar a.active-link {
            background-color: #495057;
            color: #fff;
        }

        .sidebar.collapsed {
            margin-left: -250px;
        }

        .content {
            margin-left: 250px;
            margin-top: 56px;
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        .content.expanded {
            margin-left: 0;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.25rem;
        }

        /* Responsive behavior */
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

            .content.expanded {
                margin-left: 0;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 56px;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1040;
            }

            .overlay.active {
                display: block;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="toggle-btn me-3" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <span class="navbar-brand mb-0 h1">Admin Panel</span>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <a href="{{ url('/admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active-link' : '' }}">
        <i class="fas fa-chart-line me-2"></i> Dashboard
    </a>
    <a href="{{ url('/admin/blog') }}" class="{{ request()->is('admin/blog') ? 'active-link' : '' }}">
        <i class="fas fa-blog me-2"></i> Blog
    </a>
    <a href="{{ url('/admin/testimonials') }}" class="{{ request()->is('admin/testimonials') ? 'active-link' : '' }}">
        <i class="fas fa-comment-dots me-2"></i> Testimonials
    </a>
    <a href="{{ url('/admin/services') }}" class="{{ request()->is('admin/services') ? 'active-link' : '' }}">
        <i class="fas fa-concierge-bell me-2"></i> Services
    </a>
    <a href="{{ url('/admin/team') }}" class="{{ request()->is('admin/team') ? 'active-link' : '' }}">
        <i class="fas fa-users me-2"></i> Team
    </a>
    <a href="{{ url('/admin/portfolio') }}" class="{{ request()->is('admin/portfolio') ? 'active-link' : '' }}">
        <i class="fas fa-briefcase me-2"></i> Portfolio
    </a>
    <a href="{{ url('/admin/contact') }}" class="{{ request()->is('admin/contact') ? 'active-link' : '' }}">
        <i class="fas fa-envelope me-2"></i> Contact
    </a>
    <a href="{{ url('/admin/settings') }}" class="{{ request()->is('admin/settings') ? 'active-link' : '' }}">
        <i class="fas fa-cog me-2"></i> Paramètres
    </a>
</div>

<!-- Overlay for small screens -->
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
