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
    <link href="{{ asset('assets/images/fav2.png') }}" rel="icon">
    <link href="{{ asset('assets/images/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.7.0/css/flag-icons.min.css">


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
        const urlParams = new URLSearchParams(window.location.search);
        const lang = urlParams.get('lang');
        const langToggle = document.querySelector('.lang-toggle');

        if (lang === 'en') {
            langToggle.innerHTML = '🌐 EN <i class="bi bi-chevron-down"></i>';
        } else {
            langToggle.innerHTML = '🌐 FR <i class="bi bi-chevron-down"></i>';
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentCaptcha = '';
        let attemptsLeft = 3;
        let formData = {};

        // Générer un CAPTCHA aléatoire
        function generateCaptcha() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let captcha = '';
            for (let i = 0; i < 5; i++) captcha += chars.charAt(Math.floor(Math.random() * chars.length));
            currentCaptcha = captcha;
            document.getElementById('captchaCode').textContent = captcha;
            document.getElementById('captchaInput').value = '';
            hideMessages();
        }

        // Masquer messages CAPTCHA
        function hideMessages() {
            document.getElementById('captchaError').style.display = 'none';
            document.getElementById('captchaSuccess').style.display = 'none';
        }

        // Afficher CAPTCHA
        function showCaptcha() {
            document.getElementById('captchaOverlay').style.display = 'block';
            resetCaptcha();
            setTimeout(() => document.getElementById('captchaInput').focus(), 300);
        }

        // Fermer CAPTCHA
        function closeCaptcha() {
            document.getElementById('captchaOverlay').style.display = 'none';
            resetCaptcha();
        }

        // Réinitialiser CAPTCHA
        function resetCaptcha() {
            attemptsLeft = 3;
            document.getElementById('attemptsCount').textContent = attemptsLeft;
            document.getElementById('captchaInput').value = '';
            hideMessages();
            generateCaptcha();
        }

        // Vérifier CAPTCHA
        function verifyCaptcha() {
            const userInput = document.getElementById('captchaInput').value.toUpperCase();
            if (userInput === currentCaptcha) {
                document.getElementById('captchaSuccess').style.display = 'block';
                document.getElementById('captchaError').style.display = 'none';
                setTimeout(() => {
                    closeCaptcha();
                    submitForm();
                }, 1000);
            } else {
                attemptsLeft--;
                document.getElementById('attemptsCount').textContent = attemptsLeft;
                document.getElementById('captchaError').style.display = 'block';
                document.getElementById('captchaSuccess').style.display = 'none';
                document.getElementById('captchaInput').value = '';
                if (attemptsLeft <= 0) {
                    setTimeout(() => {
                        closeCaptcha();
                        showError('Trop de tentatives ! Réessayez plus tard.');
                    }, 1000);
                } else {
                    setTimeout(generateCaptcha, 500);
                }
            }
        }

        // Afficher message d'erreur
        function showError(message) {
            const errorDiv = document.querySelector('.error-message');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
            setTimeout(() => {
                errorDiv.style.display = 'none';
            }, 5000);
        }

        // Soumission du formulaire (après CAPTCHA)
        function submitForm() {
            document.querySelector('.loading').style.display = 'block';
            document.querySelector('.error-message').style.display = 'none';
            document.querySelector('.sent-message').style.display = 'none';

            formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value,
                _token: document.querySelector('input[name="_token"]').value
            };

            fetch('{{ route('contact.send') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                .then(res => res.json())
                .then(data => {
                    document.querySelector('.loading').style.display = 'none';
                    if (data.success) {
                        document.querySelector('.sent-message').style.display = 'block';
                        document.getElementById('contactForm').reset();
                    } else {
                        showError(data.message || "Erreur lors de l'envoi du message.");
                    }
                })
                .catch(() => {
                    document.querySelector('.loading').style.display = 'none';
                    showError("Erreur de connexion. Veuillez réessayer.");
                });
        }

        // Soumission du formulaire (initial)
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            if (!this.checkValidity()) {
                showError('Veuillez remplir tous les champs obligatoires.');
                return;
            }
            showCaptcha();
        });

        // Valider CAPTCHA avec Entrée
        document.getElementById('captchaInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') verifyCaptcha();
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
