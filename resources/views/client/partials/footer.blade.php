<footer id="footer" class="footer dark-background">
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4 justify-content-between">

                <!-- Bloc Logo + Réseaux + Contact Info -->
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="footer-about-wrapper d-flex flex-column">
                        <a href="{{ url('/') }}">
                            @if($settings && $settings->logo_footer)
                                <img src="{{ asset('storage/' . $settings->logo_footer) }}" class="img-fluid footer-logo mb-3" alt="Logo">
                            @else
                                <img src="{{ asset('assets/images/logo2.png') }}" class="img-fluid footer-logo mb-3" alt="Logo par défaut">
                            @endif
                        </a>

                        <ul class="footer-contact list-unstyled">
                            <li><i class="bi bi-geo-alt"></i> Boulevard du HAHO</li>
                            <li>Hedzranawoe, Sagboville</li>
                            <li><i class="bi bi-telephone"></i> 
                                <strong>Téléphone:</strong> {{ $settings->phone ?? '+228 00000000' }}
                            </li>
                            <li><i class="bi bi-envelope"></i> 
                                <strong>Email:</strong> {{ $settings->email ?? 'contact@example.com' }}
                            </li>
                        </ul>
                        <div class="social-links mt-3">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Bloc Explore -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Liens Utiles</h4>
                    <ul>
                        <li><a href="#hero">Accueil</a></li>
                        <li><a href="#about">À propos</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#">Conditions d'utilisation</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                    </ul>
                </div>

                <!-- Bloc Services -->
                <div class="col-lg-2 col-md-3 footer-links">
    <h4>Nos Services</h4>
    <ul>
        @foreach ($services as $service)
            <li><a href="#services">{{ $service->title }}</a></li>
        @endforeach
    </ul>
</div>


            </div>
        </div>
    </div>

    <div class="copyright text-center mt-4">
        <div class="container">
            © <span id="year"></span> <strong><span>AYAH COMMUNICATION</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>
