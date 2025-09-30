<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('site.index') }}#hero" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">
                <img src="assets/img/LOGO_KORITEK-04.png" alt="Append" style="height: 40px; vertical-align: middle;">
            </h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('site.index') }}#hero" class="active">Acceuil</a></li>
                <li><a href="{{ route('site.index') }}#about">À propos</a></li>
                <li><a href="{{ route('site.index') }}#services">Services</a></li>
                <li><a href="{{ route('site.index') }}#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('site.index') }}#contact">Commencer</a>

    </div>
</header>
