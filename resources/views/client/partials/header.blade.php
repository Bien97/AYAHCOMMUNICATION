<header id="header" class="header d-flex align-items-center fixed-top transparent-header">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo HeroBiz" class="logo" />
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home.index') }}#hero" class="active">Accueil</a></li>
                <li><a href="{{ route('home.index') }}#about">À propos</a></li>
                <li><a href="{{ route('home.index') }}#services">Services</a></li>
                <!-- <li><a href="#team">Team</a></li> -->
                {{-- <li><a href="{{ route('blog.index') }}">Blog</a></li> --}}
                <li><a href="{{ route('home.index') }}#contact">Contact</a></li>
                <li class="nav-lang dropdown">
                    <a href="#" class="lang-toggle">🌐 FR <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="?lang=fr">🇫🇷 Français</a></li>
                        <li><a href="?lang=en">🇬🇧 English</a></li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('home.index') }}#about"><strong>Commencer</strong></a>
    </div>
</header>
