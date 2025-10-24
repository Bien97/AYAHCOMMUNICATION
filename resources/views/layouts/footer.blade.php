<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="{{ route('site.index') }}#hero">
                    <h1 class="sitename">
                        <img src="assets/img/LOGO_KORITEK-04.png" alt="Append"
                            style="height: 40px; vertical-align: middle;">
                    </h1>
                </a>

                <p>Chez Koritek, nous fournissons des solutions technologiques fiables et innovantes pour accompagner
                    vos projets et stimuler votre croissance.</p>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Liens Utiles</h4>
                <ul>
                    <li><a href="{{ route('site.index') }}#hero">Accueil</a></li>
                    <li><a href="{{ route('site.index') }}#about">À propos</a></li>
                    <li><a href="{{ route('site.index') }}#services">Services</a></li>
                    <li><a href="{{ route('site.index') }}#contact">Contact</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Nos Services</h4>
                <ul>
                    <li><a href="{{ route('site.index') }}#services">Consulting & Audit</a></li>
                    <li><a href="{{ route('site.index') }}#services">Diagnostic & Sécurité</a></li>
                    <li><a href="{{ route('site.index') }}#services">Intégration Technologique</a></li>
                    <li><a href="{{ route('site.index') }}#services">Conseil Stratégique</a></li>
                    <li><a href="{{ route('site.index') }}#services">Innovation & Développement</a></li>
                    <li><a href="{{ route('site.index') }}#services">Support & Maintenance</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contactez-Nous</h4>
                <p>Boulevard du HAHO</p>
                <p>Hedzranawoe, Sagboville</p>
                <p>TOGO</p>
                <p class="mt-4"><strong>Téléphone:</strong> <span>+228 9146 2020</span></p>
                <p><strong>Email:</strong> <span>parlez@kori-tek.com</span></p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>Copyright © <span id="year"></span> <strong>KORITEK TOGO</strong> All Rights Reserved.</p>

        <script>
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>

        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://a-yah.com/">AYAH COMMUNICATION</a>
        </div>
    </div>

</footer>
