<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AYAH COMMUNICATION</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/fav2.png') }}">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}" />


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/client/core.css', 'resources/css/client/app.css'])

</head>

<body class="index-page">
    <!-- HEADER -->
    @include('client.partials.header')

    <!-- HERO SECTION -->
    <main class="main">
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('client.partials.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <script src="{{ asset('assets/core.js') }}"></script>

    @vite(['resources/js/client/app.js'])


    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        });
    </script>

    <!-- Scroll Script -->
    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.remove('transparent-header');
                header.classList.add('header-scrolled');
            } else {
                header.classList.add('transparent-header');
                header.classList.remove('header-scrolled');
            }
        });
    </script>

    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

    <script>
        // Script pour gérer la langue - utilise la locale Laravel au lieu du paramètre URL
        const langToggle = document.querySelector('.lang-toggle');
        const currentLocale = '{{ app()->getLocale() }}';

        if (currentLocale === 'en') {
            langToggle.innerHTML = '🌐 EN <i class="bi bi-chevron-down"></i>';
        } else {
            langToggle.innerHTML = '🌐 FR <i class="bi bi-chevron-down"></i>';
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentCaptcha = '';
            let attemptsLeft = 3;
            let formData = {};

            // Générer un CAPTCHA aléatoire
            function generateCaptcha() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let captcha = '';
                for (let i = 0; i < 5; i++) captcha += chars.charAt(Math.floor(Math.random() * chars.length));
                currentCaptcha = captcha;
                const captchaCodeEl = document.getElementById('captchaCode');
                const captchaInputEl = document.getElementById('captchaInput');
                if (captchaCodeEl) captchaCodeEl.textContent = captcha;
                if (captchaInputEl) captchaInputEl.value = '';
                hideMessages();
            }

            // Masquer messages CAPTCHA
            function hideMessages() {
                const errorEl = document.getElementById('captchaError');
                const successEl = document.getElementById('captchaSuccess');
                if (errorEl) errorEl.style.display = 'none';
                if (successEl) successEl.style.display = 'none';
            }

            // Afficher CAPTCHA avec validation préalable
            function showCaptcha() {
                const loadingEl = document.querySelector('.loading');
                const errorEl = document.querySelector('.error-message');

                if (loadingEl) loadingEl.style.display = 'block';
                if (errorEl) errorEl.style.display = 'none';

                // Préparer les données pour la validation
                const formData = new FormData();
                formData.append('name', document.getElementById('name')?.value || '');
                formData.append('email', document.getElementById('email')?.value || '');
                formData.append('subject', document.getElementById('subject')?.value || '');
                formData.append('messageContent', document.getElementById('messageContent')?.value || '');
                formData.append('_token', document.querySelector('input[name="_token"]')?.value || '');

                // Premier appel : validation des données
                fetch('{{ route('contact.send') }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => {
                        if (!res.ok) {
                            return res.json().then(errorData => {
                                throw new Error(`Erreur de validation`);
                            });
                        }
                        return res.json();
                    })
                    .then(data => {
                        if (loadingEl) loadingEl.style.display = 'none';

                        if (data.success && data.show_captcha) {
                            // Données validées, afficher le CAPTCHA
                            const overlayEl = document.getElementById('captchaOverlay');
                            if (overlayEl) {
                                overlayEl.style.display = 'flex';
                                resetCaptcha();
                                setTimeout(() => {
                                    const inputEl = document.getElementById('captchaInput');
                                    if (inputEl) inputEl.focus();
                                }, 300);
                            }
                        } else if (data.success) {
                            // Email envoyé directement (ne devrait pas arriver)
                            const sentEl = document.querySelector('.sent-message');
                            if (sentEl) sentEl.style.display = 'block';
                            const formEl = document.getElementById('contactForm');
                            if (formEl) formEl.reset();
                        } else {
                            // Erreur de validation - cacher le loading et ne rien afficher
                            // (les erreurs ne sont plus affichées à l'utilisateur)
                        }
                    })
                    .catch(error => {
                        if (loadingEl) loadingEl.style.display = 'none';
                        // Ne pas afficher les erreurs - juste cacher le loading
                    });
            }

            // Fermer CAPTCHA
            function closeCaptcha() {
                const overlayEl = document.getElementById('captchaOverlay');
                if (overlayEl) {
                    overlayEl.style.display = 'none';
                    resetCaptcha();
                }
            }

            // Réinitialiser CAPTCHA
            function resetCaptcha() {
                attemptsLeft = 3;
                const attemptsEl = document.getElementById('attemptsCount');
                const inputEl = document.getElementById('captchaInput');
                if (attemptsEl) attemptsEl.textContent = attemptsLeft;
                if (inputEl) inputEl.value = '';
                hideMessages();
                generateCaptcha();
            }

            // Vérifier CAPTCHA
            function verifyCaptcha() {
                const inputEl = document.getElementById('captchaInput');
                if (!inputEl) return;

                const userInput = inputEl.value.toUpperCase();
                if (userInput === currentCaptcha) {
                    const successEl = document.getElementById('captchaSuccess');
                    const errorEl = document.getElementById('captchaError');
                    if (successEl) successEl.style.display = 'block';
                    if (errorEl) errorEl.style.display = 'none';
                    setTimeout(() => {
                        closeCaptcha();
                        submitForm();
                    }, 1000);
                } else {
                    attemptsLeft--;
                    const attemptsEl = document.getElementById('attemptsCount');
                    const errorEl = document.getElementById('captchaError');
                    const successEl = document.getElementById('captchaSuccess');

                    if (attemptsEl) attemptsEl.textContent = attemptsLeft;
                    if (errorEl) errorEl.style.display = 'block';
                    if (successEl) successEl.style.display = 'none';
                    if (inputEl) inputEl.value = '';

                    if (attemptsLeft <= 0) {
                        setTimeout(() => {
                            closeCaptcha();
                            // Trop de tentatives - juste fermer le CAPTCHA sans message d'erreur
                        }, 1000);
                    } else {
                        setTimeout(generateCaptcha, 500);
                    }
                }
            }

            // Soumission du formulaire (après CAPTCHA)
            function submitForm() {
                const loadingEl = document.querySelector('.loading');
                const errorEl = document.querySelector('.error-message');
                const sentEl = document.querySelector('.sent-message');

                if (loadingEl) loadingEl.style.display = 'block';
                if (errorEl) errorEl.style.display = 'none';
                if (sentEl) sentEl.style.display = 'none';

                // Utiliser FormData au lieu de JSON pour une meilleure compatibilité avec Laravel
                const formData = new FormData();
                formData.append('name', document.getElementById('name')?.value || '');
                formData.append('email', document.getElementById('email')?.value || '');
                formData.append('subject', document.getElementById('subject')?.value || '');
                formData.append('messageContent', document.getElementById('messageContent')?.value || '');
                formData.append('captcha_verified', 'true'); // Indiquer que le CAPTCHA est validé
                formData.append('_token', document.querySelector('input[name="_token"]')?.value || '');

                fetch('{{ route('contact.send') }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => {
                        if (!res.ok) {
                            return res.json().then(errorData => {
                                throw new Error(`Erreur d'envoi`);
                            });
                        }
                        return res.json();
                    })
                    .then(data => {
                        if (loadingEl) loadingEl.style.display = 'none';
                        if (data.success) {
                            if (sentEl) sentEl.style.display = 'block';
                            // Disparition automatique après 3 secondes
                            setTimeout(() => {
                                sentEl.style.display = 'none';
                            }, 3000);
                            const formEl = document.getElementById('contactForm');
                            if (formEl) formEl.reset();
                        } else {
                            // Erreur lors de l'envoi - ne pas afficher d'erreur
                        }
                    })
                    .catch(error => {
                        if (loadingEl) loadingEl.style.display = 'none';
                        // Ne pas afficher les erreurs - juste cacher le loading
                    });
            }

            // Soumission du formulaire avec JavaScript
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (!this.checkValidity()) {
                        // Formulaire invalide - ne pas continuer
                        return;
                    }
                    showCaptcha();
                });
            }

            // Ajouter support touche Entrée pour le CAPTCHA
            document.addEventListener('keypress', function(e) {
                const captchaInput = document.getElementById('captchaInput');
                const overlayVisible = document.getElementById('captchaOverlay')?.style.display === 'flex';

                if (e.key === 'Enter' && overlayVisible && captchaInput && document.activeElement ===
                    captchaInput) {
                    verifyCaptcha();
                }
            });

            // Exposer les fonctions globalement pour les boutons onclick
            window.generateCaptcha = generateCaptcha;
            window.verifyCaptcha = verifyCaptcha;
            window.closeCaptcha = closeCaptcha;
        });
    </script>



    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.querySelector('.mobile-nav-toggle');
            const navmenu = document.querySelector('.navmenu');

            toggle.addEventListener('click', function() {
                document.body.classList.toggle('mobile-nav-active');
            });
        });
    </script> -->
</body>

</html>
