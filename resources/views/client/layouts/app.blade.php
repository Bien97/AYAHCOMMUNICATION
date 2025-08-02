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
    window.addEventListener('scroll', function () {
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
    window.addEventListener('scroll', function () {
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

<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.querySelector('.mobile-nav-toggle');
  const navmenu = document.querySelector('.navmenu');

  toggle.addEventListener('click', function () {
    document.body.classList.toggle('mobile-nav-active');
  });
});
</script> -->
</body>
</html>
