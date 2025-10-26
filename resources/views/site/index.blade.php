@extends('layouts.app')
@section('title', 'Index')
@section('content')
    <div>
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('assets/img/le-support-technique-supervise-le-reseau-neuronal-d-ia.jpg') }}" alt=""
                data-aos="fade-in">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h2 data-aos="fade-up" data-aos-delay="100">Protéger, Optimiser, Avancer</h2>
                        <p data-aos="fade-up" data-aos-delay="200">KORITEK, votre allié technologique pour un avenir sûr et
                            performant</p>
                    </div>
                    {{-- <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
                        <form action="forms/newsletter.php" method="post" class="php-email-form">
                            <div class="sign-up-form">
                                <input type="email" name="email" placeholder="Entrez votre email">
                                <input type="submit" value="S'abonner">
                            </div>
                            <div class="loading">Chargement...</div>
                            <div class="error-message">Une erreur est survenue. Veuillez réessayer.</div>
                            <div class="sent-message">Votre demande d'abonnement a été envoyée. Merci !</div>
                        </form>
                    </div> --}}

                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section">

            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="https://a-yah.com/" target="_blank">
                            <img src="{{ asset('assets/img/clients/logo.png') }}" class="img-fluid" alt="">
                        </a>
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="#" target="_blank">
                            <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
                        </a>
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="#" target="_blank">
                            <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
                        </a>
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="#" target="_blank">
                            <img src="{{ asset('assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
                        </a>
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="#" target="_blank">
                            <img src="{{ asset('assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
                        </a>
                    </div><!-- End Client Item -->

                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="#" target="_blank">
                            <img src="{{ asset('assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
                        </a>
                    </div><!-- End Client Item -->

                </div>


            </div>

        </section><!-- /Clients Section -->

        <!-- About Section -->
        <section id="about" class="about section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">

                    <div class="col-xl-5 content">
                        <h3>À propos</h3>
                        <h2>Des solutions concrètes pour vos projets</h2>
                        <p>KORITEK TOGO est spécialisé dans le consulting, le diagnostic et l’intégration de solutions
                            technologiques. Notre mission : transformer vos besoins en résultats fiables et mesurables,
                            grâce à une expertise reconnue et un accompagnement sur mesure.</p>
                        <a href="{{ route('site.index') }}#services" class="read-more"><span>En savoir plus</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="col-xl-7">
                        <div class="row gy-4 icon-boxes">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <i class="bi bi-buildings"></i>
                                    <h3>Conseil & Expertise</h3>
                                    <p>Nous examinons vos besoins et proposons des solutions personnalisées, fiables et
                                        pérennes.</p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-clipboard-pulse"></i>
                                    <h3>Évaluation & Protection</h3>
                                    <p>Un accompagnement complet pour détecter les risques et sécuriser vos infrastructures
                                        informatiques.</p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-command"></i>
                                    <h3>Mise en œuvre & Déploiement</h3>
                                    <p>Des solutions technologiques installées efficacement pour améliorer vos performances.
                                    </p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-graph-up-arrow"></i>
                                    <h3>Créativité & Expansion</h3>
                                    <p>Nous exploitons la technologie pour soutenir votre croissance et vos ambitions.</p>
                                </div>
                            </div> <!-- End Icon Box -->

                        </div>
                    </div>



                </div>
            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section dark-background">

            <img src="{{ asset('assets/img/stats-bg.jpg') }}" alt="" data-aos="fade-in">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projets</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Heures d’assistance</p>
                        </div>
                    </div><!-- End Stats Item -->

                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Collaborateurs</p>
                        </div>
                    </div> --}}

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="230" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Tasses de café</p>
                        </div>
                    </div><!-- End Stats Item -->
                    <!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nos Services</h2>
                <p>Nous vous accompagnons avec des solutions technologiques adaptées, fiables et innovantes.</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                            <div>
                                <h4 class="title"><span class="stretched-link">Consulting & Audit</span></h4>
                                <p class="description">Analyse approfondie de vos besoins pour vous proposer des solutions
                                    concrètes et efficaces.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                            <div>
                                <h4 class="title"><span class="stretched-link">Diagnostic & Sécurité</span></h4>
                                <p class="description">Identification des risques, protection de vos systèmes et
                                    amélioration de la fiabilité de vos infrastructures.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                            <div>
                                <h4 class="title"><span class="stretched-link">Intégration Technologique</span></h4>
                                <p class="description">Mise en place et déploiement de solutions innovantes pour booster
                                    vos performances.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-binoculars"></i></div>
                            <div>
                                <h4 class="title"><span class="stretched-link">Conseil Stratégique</span></h4>
                                <p class="description">Un accompagnement personnalisé pour aligner vos choix technologiques
                                    avec vos objectifs d'affaires.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-brightness-high"></i></div>
                            <div>
                                <h4 class="title"><span class="stretched-link">Innovation & Développement</span></h4>
                                <p class="description">Des solutions créatives et modernes qui s'adaptent à vos ambitions
                                    et à l'évolution du marché.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week"></i></div>
                            <div>
                                <h4 class="title"><span class="stretched-link">Support & Maintenance</span></h4>
                                <p class="description">Une assistance continue et réactive pour garantir la performance et
                                    la pérennité de vos projets.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>
            </div>
        </section>
        <!-- /Services Section -->

        <!-- Features Section -->
        {{-- <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Features</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 align-items-center features-item">
          <div class="col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h3>Corporis temporibus maiores provident</h3>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
            </p>
            <a href="#" class="btn btn-get-started">Get Started</a>
          </div>
          <div class="col-lg-7 order-1 order-lg-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <div class="image-stack">
              <img src="{{asset('assets/img/features-light-1.jpg')}}" alt="" class="stack-front">
              <img src="{{asset('assets/img/features-light-2.jpg')}}" alt="" class="stack-back">
            </div>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-stretch justify-content-between features-item ">
          <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
            <img src="{{asset('assets/img/features-light-3.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
            <h3>Sunt consequatur ad ut est nulla</h3>
            <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
            <ul>
              <li><i class="bi bi-check"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
              <li><i class="bi bi-check"></i><span> Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
              <li><i class="bi bi-check"></i> <span>Facilis ut et voluptatem aperiam. Autem soluta ad fugiat</span>.</li>
            </ul>
            <a href="#" class="btn btn-get-started align-self-start">Get Started</a>
          </div>
        </div><!-- Features Item -->

      </div>

    </section><!-- /Features Section --> --}}

        <!-- Portfolio Section -->
        {{-- <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Card</li>
            <li data-filter=".filter-branding">Web</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{asset('assets/img/masonry-portfolio/masonry-portfolio-1.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{asset('assets/img/masonry-portfolio/masonry-portfolio-1.jpg')}}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{asset('assets/img/masonry-portfolio/masonry-portfolio-2.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{asset('assets/img/masonry-portfolio/masonry-portfolio-2.jpg')}}" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{asset('assets/img/masonry-portfolio/masonry-portfolio-3.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{asset('assets/img/masonry-portfolio/masonry-portfolio-3.jpg')}}" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="{{asset('assets/img/masonry-portfolio/masonry-portfolio-4.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{asset('assets/img/masonry-portfolio/masonry-portfolio-4.jpg')}}" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="{{asset('assets/img/masonry-portfolio/masonry-portfolio-5.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="{{asset('assets/img/masonry-portfolio/masonry-portfolio-5.jpg')}}" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="{{asset('assets/img/masonry-portfolio/masonry-portfolio-6.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 2</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-6.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-7.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 3</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section --> --}}

        <!-- Pricing Section -->
        {{-- <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="zoom-in" data-aos-delay="100">

        <div class="row g-4">

          <div class="col-lg-4">
            <div class="pricing-item">
              <h3>Free Plan</h3>
              <div class="icon">
                <i class="bi bi-box"></i>
              </div>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4">
            <div class="pricing-item featured">
              <h3>Business Plan</h3>
              <div class="icon">
                <i class="bi bi-rocket"></i>
              </div>

              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4">
            <div class="pricing-item">
              <h3>Developer Plan</h3>
              <div class="icon">
                <i class="bi bi-send"></i>
              </div>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section><!-- /Pricing Section --> --}}

        <!-- Faq Section -->
        {{-- <section id="faq" class="faq section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="content px-xl-5">
              <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3><span class="num">1.</span> <span>Non consectetur a erat nam at lectus urna duis?</span></h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">2.</span> <span>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</span></h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">3.</span> <span>Dolor sit amet consectetur adipiscing elit pellentesque?</span></h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">4.</span> <span>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</span></h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">5.</span> <span>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</span></h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>
        </div>

      </div>

    </section><!-- /Faq Section --> --}}

        <!-- Team Section -->
        {{-- <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum distinctio dire flow</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
            <div class="member-img">
              <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Sarah Jhonson</h4>
              <span>Product Manager</span>
              <p>Labore ipsam sit consequatur exercitationem rerum laboriosam laudantium aut quod dolores exercitationem ut</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
            <div class="member-img">
              <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>William Anderson</h4>
              <span>CTO</span>
              <p>Illum minima ea autem doloremque ipsum quidem quas aspernatur modi ut praesentium vel tque sed facilis at qui</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
            <div class="member-img">
              <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <p>Magni voluptatem accusamus assumenda cum nisi aut qui dolorem voluptate sed et veniam quasi quam consectetur</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
            <div class="member-img">
              <img src="assets/img/team/team-5.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Brian Doe</h4>
              <span>Marketing</span>
              <p>Qui consequuntur quos accusamus magnam quo est molestiae eius laboriosam sunt doloribus quia impedit laborum velit</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="600">
            <div class="member-img">
              <img src="assets/img/team/team-6.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Josepha Palas</h4>
              <span>Operation</span>
              <p>Sint sint eveniet explicabo amet consequatur nesciunt error enim rerum earum et omnis fugit eligendi cupiditate vel</p>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section --> --}}

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background">

            <img src="assets/img/cta-bg.jpg" alt="">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Agissez Maintenant</h3>
                            <p>Ne laissez pas passer l'opportunité de transformer vos idées en résultats concrets. Profitez
                                de notre expertise pour atteindre vos objectifs rapidement et efficacement.</p>
                            <a class="cta-btn" href="{{ route('site.index') }}#contact">Découvrez Nos Solutions</a>
                        </div>
                    </div>
                </div>
            </div>


        </section><!-- /Call To Action Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                        <h3>Avis Clients</h3>
                        <p>
                            Nos clients partagent leur expérience : un service fiable, efficace et à l’écoute de leurs
                            besoins.
                            Chaque projet est traité avec soin pour garantir satisfaction et résultats concrets.
                        </p>
                    </div>


                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

                        <div class="swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="assets/img/testimonials/11434199.png"
                                                class="testimonial-img flex-shrink-0" alt="">
                                            <div>
                                                <h3>Arnaud K</h3>
                                                <h4>Ceo &amp; Founder</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span> L’installation a été réalisée avec un grand professionnalisme. Je peux
                                                désormais
                                                suivre mes locaux en temps réel, même à distance. La tranquillité d’esprit
                                                n’a pas de
                                                prix.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="assets/img/testimonials/portrait-de-jeune-femme-musulman.jpg"
                                                class="testimonial-img flex-shrink-0" alt="">
                                            <div>
                                                <h3>Aïcha L</h3>
                                                <h4>Designer</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Le système est moderne et très facile à prendre en main. Nos
                                                collaborateurs
                                                l’utilisent au quotidien sans difficulté. C’est un vrai plus pour notre
                                                organisation. </span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="assets/img/testimonials/portrait-de-jeune-femme-d-affair.jpg"
                                                class="testimonial-img flex-shrink-0" alt="">
                                            <div>
                                                <h3>Estelle N</h3>
                                                <h4>Store Owner</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span> L’équipe KORITEK a livré une installation soignée et performante. La
                                                clarté et la
                                                puissance sonore apportent une véritable valeur ajoutée. Nos clients sont
                                                conquis.
                                            </span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="assets/img/testimonials/comments-6.jpg"
                                                class="testimonial-img flex-shrink-0" alt="">
                                            <div>
                                                <h3>Patrice Z</h3>
                                                <h4>Freelancer</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Les jeux de lumière créent une atmosphère unique dans notre établissement.
                                                Les
                                                clients en parlent souvent et reviennent pour cette expérience. C’est un
                                                atout
                                                indéniable pour notre image.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->

                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="d-flex">
                                            <img src="assets/img/testimonials/blog-author-3.jpg"
                                                class="testimonial-img flex-shrink-0" alt="">
                                            <div>
                                                <h3>Julien M</h3>
                                                <h4>Entrepreneur</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Nos ventes et stocks sont désormais suivis en temps réel. La prise de
                                                décision est
                                                plus rapide et plus fiable. KORITEK nous a offert une solution taillée sur
                                                mesure.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Recent Posts Section -->
        {{-- <section id="recent-posts" class="recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Recent Posts</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Politics</p>

              <h2 class="title">
                <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Maria Doe</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Sports</p>

              <h2 class="title">
                <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Allisa Mayer</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 5, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Entertainment</p>

              <h2 class="title">
                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Mark Dower</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 22, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

        </div><!-- End recent posts list -->

      </div>

    </section><!-- /Recent Posts Section --> --}}

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contactez-Nous</h2>
                <p>Nous sommes à votre écoute pour répondre à vos questions, vos besoins et vous accompagner dans vos
                    projets.</p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">

                            <!-- Téléphone -->
                            <div class="col-md-6">
                                <a href="https://wa.me/22891462020" target="_blank"
                                    class="text-decoration-none text-reset">
                                    <div class="info-item" data-aos="fade" data-aos-delay="300">
                                        <i class="bi bi-telephone"></i>
                                        <h3>Téléphone</h3>
                                        <p>+228 9146 2020</p>
                                    </div>
                                </a>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <a href="mailto:parlez@kori-tek.com" class="text-decoration-none text-reset">
                                    <div class="info-item" data-aos="fade" data-aos-delay="400">
                                        <i class="bi bi-envelope"></i>
                                        <h3>Email</h3>
                                        <p>parlez@kori-tek.com</p>
                                    </div>
                                </a>
                            </div>

                            <!-- Adresse (ouvre la carte dans un modal) -->
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="200" role="button"
                                    data-bs-toggle="modal" data-bs-target="#mapModal">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Adresse</h3>
                                    <p>Boulevard du HAHO, Hedzranawoe, Sagboville</p>
                                </div>
                            </div>

                            <!-- Horaires -->
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="500">
                                    <i class="bi bi-clock"></i>
                                    <h3>Horaires</h3>
                                    <p>Lundi - Vendredi</p>
                                    <p>9:00AM - 17:00PM</p>
                                </div>
                            </div>

                        </div>

                        <!-- ===== MODAL GOOGLE MAP AGRANDI ===== -->
                        <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered"> <!-- 🔥 modal-xl = extra large -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mapModalLabel">Localisation - KORITEK TOGO</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Fermer"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3966.486115795513!2d1.2488055999999998!3d6.1994167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMTEnNTcuOSJOIDHCsDE0JzU1LjciRQ!5e0!3m2!1sfr!2snl!4v1754085141381!5m2!1sfr!2snl"
                                            width="100%" height="600" style="border:0;" allowfullscreen=""
                                            loading="lazy">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Messages de feedback -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif


                    <div class="col-lg-6">
                        <form id="contactForm" method="POST" action="{{ route('contact.send') }}" role="form"
                            class="php-email-form">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input id="name" type="text" name="name" class="form-control"
                                        placeholder="Votre Nom" required>
                                </div>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                        placeholder="Votre Email" required>
                                </div>

                                <div class="col-12">
                                    <input id="subject" type="text" class="form-control" name="subject"
                                        placeholder="Sujet" required>
                                </div>

                                <div class="col-12">
                                    <textarea id="messageContent" class="form-control" name="messageContent" rows="6" placeholder="Message"
                                        required></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    {{-- <div class="loading">Chargement...</div> --}}
                                    {{-- <div class="error-message">Une erreur est survenue. Veuillez réessayer.</div> --}}
                                    <div class="sent-message">Votre message a été envoyé avec succès. Merci !</div>

                                    <button type="submit">Envoyer le message</button>
                                </div>
                            </div>
                        </form>

                        <!-- CAPTCHA Overlay -->
                        <div class="captcha-overlay" id="captchaOverlay" style="display:none;">
                            <div class="captcha-modal">
                                <h3><i class="bi bi-shield-check"></i> Vérification de sécurité</h3>
                                <p class="captcha-subtitle">
                                    Pour confirmer que vous n'êtes pas un robot, veuillez saisir le code ci-dessous
                                </p>

                                <div class="captcha-visual-container">
                                    <div class="noise-lines">
                                        <div class="noise-line"></div>
                                        <div class="noise-line"></div>
                                        <div class="noise-line"></div>
                                    </div>
                                    <div class="captcha-code" id="captchaCode">XK9P2</div>
                                </div>

                                <div class="captcha-input-section">
                                    <div class="captcha-input-group">
                                        <input type="text" id="captchaInput" class="captcha-input"
                                            placeholder="Saisir le code" maxlength="5" autocomplete="off">
                                        <button type="button" class="captcha-refresh-btn" onclick="generateCaptcha()">
                                            <i class="bi bi-arrow-clockwise"></i> Nouveau
                                        </button>
                                    </div>

                                    <div class="captcha-attempts">
                                        Tentatives restantes: <strong id="attemptsCount">3</strong>
                                    </div>
                                </div>

                                <div class="captcha-error" id="captchaError">Code incorrect. Veuillez réessayer.</div>
                                <div class="captcha-success" id="captchaSuccess">✓ Vérification réussie ! Envoi en
                                    cours...</div>

                                <div class="captcha-buttons">
                                    <button type="button" class="captcha-btn captcha-btn-verify"
                                        onclick="verifyCaptcha()">
                                        <i class="bi bi-check-lg"></i> Vérifier
                                    </button>
                                    <button type="button" class="captcha-btn captcha-btn-cancel"
                                        onclick="closeCaptcha()">
                                        <i class="bi bi-x-lg"></i> Annuler
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->
    </div>
@endsection

<style>
    .service-item {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .service-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .service-item:hover .title {
        color: #FF7F00;
    }

    /* Styles uniquement pour la modal CAPTCHA - n'affecte pas le formulaire existant */

    /* Modal CAPTCHA Styles */
    .captcha-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 10000;
        animation: fadeIn 0.3s ease;
        backdrop-filter: blur(5px);
    }

    .captcha-overlay.show {
        display: flex !important;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .captcha-modal {
        background: white;
        border-radius: 20px;
        padding: 30px;
        max-width: 450px;
        width: 90%;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        animation: slideIn 0.3s ease;
        position: relative;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .captcha-modal h3 {
        text-align: center;
        color: #333;
        margin-bottom: 10px;
        font-size: 1.5rem;
    }

    .captcha-modal h3 i {
        color: #667eea;
        margin-right: 10px;
    }

    .captcha-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 25px;
        font-size: 0.95rem;
    }

    .captcha-visual-container {
        position: relative;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 2px solid #dee2e6;
        border-radius: 10px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .noise-lines {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .noise-line {
        position: absolute;
        width: 2px;
        height: 100%;
        background: rgba(102, 126, 234, 0.3);
        animation: moveLine 3s infinite linear;
    }

    .noise-line:nth-child(1) {
        left: 20%;
        animation-delay: 0s;
    }

    .noise-line:nth-child(2) {
        left: 50%;
        animation-delay: 1s;
    }

    .noise-line:nth-child(3) {
        left: 80%;
        animation-delay: 2s;
    }

    @keyframes moveLine {
        0% {
            transform: translateX(-10px) skewX(0deg);
        }

        50% {
            transform: translateX(10px) skewX(5deg);
        }

        100% {
            transform: translateX(-10px) skewX(0deg);
        }
    }

    .captcha-code {
        font-family: 'Courier New', monospace;
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        letter-spacing: 5px;
        z-index: 2;
        position: relative;
    }

    .captcha-input-section {
        margin-bottom: 20px;
    }

    .captcha-input-group {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
    }

    .captcha-input {
        flex: 1;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        font-size: 1.1rem;
        text-align: center;
        letter-spacing: 3px;
        font-family: 'Courier New', monospace;
    }

    .captcha-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .captcha-refresh-btn {
        padding: 12px 15px;
        background: #6c757d;
        border: none;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .captcha-refresh-btn:hover {
        background: #5a6268;
        transform: translateY(-1px);
    }

    .captcha-attempts {
        text-align: center;
        font-size: 0.9rem;
        color: #666;
    }

    .captcha-attempts strong {
        color: #dc3545;
    }

    .captcha-error,
    .captcha-success {
        display: none;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .captcha-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .captcha-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .captcha-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .captcha-btn {
        padding: 12px 25px;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .captcha-btn-verify {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }

    .captcha-btn-verify:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
    }

    .captcha-btn-cancel {
        background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
        color: white;
    }

    .captcha-btn-cancel:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentCaptcha = '';
        let attemptsLeft = 3;

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

        // Masquer tous les messages
        function hideAllMessages() {
            const loadingEl = document.querySelector('.loading');
            const errorEl = document.querySelector('.error-message');
            const sentEl = document.querySelector('.sent-message');

            if (loadingEl) loadingEl.style.display = 'none';
            if (errorEl) errorEl.style.display = 'none';
            if (sentEl) sentEl.style.display = 'none';
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
            // Cacher TOUS les messages avant de commencer
            hideAllMessages();

            const loadingEl = document.querySelector('.loading');
            if (loadingEl) loadingEl.style.display = 'block';

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
                .then(res => res.json())
                .then(data => {
                    // Cacher le loading
                    if (loadingEl) loadingEl.style.display = 'none';

                    if (data.success && data.show_captcha) {
                        // Données validées, afficher le CAPTCHA directement
                        const overlayEl = document.getElementById('captchaOverlay');
                        if (overlayEl) {
                            overlayEl.style.display = 'flex';
                            resetCaptcha();
                            setTimeout(() => {
                                const inputEl = document.getElementById('captchaInput');
                                if (inputEl) inputEl.focus();
                            }, 300);
                        }
                    } else if (!data.success && data.errors) {
                        // Erreurs de validation - ne rien afficher à l'utilisateur
                        console.log('Validation errors:', data.errors);
                    }
                })
                .catch(error => {
                    hideAllMessages();
                    console.error('Error:', error);
                });
        }

        // Fermer CAPTCHA
        function closeCaptcha() {
            const overlayEl = document.getElementById('captchaOverlay');
            if (overlayEl) {
                overlayEl.style.display = 'none';
                resetCaptcha();
            }
            hideAllMessages();
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
                    }, 1000);
                } else {
                    setTimeout(generateCaptcha, 500);
                }
            }
        }

        // Soumission du formulaire (après CAPTCHA)
        function submitForm() {
            hideAllMessages();

            const loadingEl = document.querySelector('.loading');
            if (loadingEl) loadingEl.style.display = 'block';

            const formData = new FormData();
            formData.append('name', document.getElementById('name')?.value || '');
            formData.append('email', document.getElementById('email')?.value || '');
            formData.append('subject', document.getElementById('subject')?.value || '');
            formData.append('messageContent', document.getElementById('messageContent')?.value || '');
            formData.append('captcha_verified', 'true');
            formData.append('_token', document.querySelector('input[name="_token"]')?.value || '');

            fetch('{{ route('contact.send') }}', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (loadingEl) loadingEl.style.display = 'none';

                    if (data.success) {
                        const sentEl = document.querySelector('.sent-message');
                        if (sentEl) {
                            sentEl.style.display = 'block';
                            // Disparition automatique après 3 secondes
                            setTimeout(() => {
                                sentEl.style.display = 'none';
                            }, 3000);
                        }
                        const formEl = document.getElementById('contactForm');
                        if (formEl) formEl.reset();
                    }
                })
                .catch(error => {
                    hideAllMessages();
                    console.error('Error:', error);
                });
        }

        // Soumission du formulaire avec JavaScript
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (!this.checkValidity()) {
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
