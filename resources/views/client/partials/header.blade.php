<header id="header" class="header d-flex align-items-center fixed-top transparent-header">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center me-auto me-xl-0">
            @if ($settings && $settings->logo_header)
                <img src="{{ asset('storage/' . $settings->logo_header) }}" alt="Logo HeroBiz" class="logo" />
            @else
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo par défaut" class="logo" />
            @endif
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home.index') }}#hero" class="active">@lang('messages.accueil')</a></li>
                <li><a href="{{ route('home.index') }}#about">@lang('messages.apropos')</a></li>
                <li><a href="{{ route('home.index') }}#services">@lang('messages.services')</a></li>
                <li><a href="{{ route('home.index') }}#contact">@lang('messages.contact')</a></li>
                <li class="nav-lang dropdown">
                    <a href="#" class="lang-toggle">🌐 FR <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="locale/fr">🇫🇷 Français</a></li>
                        <li><a href="locale/en">🇬🇧 English</a></li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('home.index') }}#contact"><strong>@lang('messages.commencer')</strong></a>
    </div>
</header>
