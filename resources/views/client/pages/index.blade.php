@extends('client.layouts.app');

@section('content')
    <!-- HERO SECTION -->
    <main class="main">
        <section id="hero" class="hero section position-relative">
            <!-- Image de fond -->
            <div class="hero-background position-absolute top-0 start-0 w-100 h-100">
                <img src="{{ asset('storage/' . $settings->image_background) }}"
                    class="img-fluid w-100 h-100 object-fit-cover" alt="Image de fond">
                <!-- Overlay sombre -->
                <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
            </div>


            <!-- Contenu texte -->
            <div class="container h-100 d-flex align-items-center position-relative" style="z-index: 2;" data-aos="zoom-out">
                <div class="text-white text-start">
                    <h1 class="welcome-title">
                        @lang('messages.bienvenue_chez') <span class="brand-name animation-fall">AYAH COMMUNICATION</span>
                    </h1>

                    <p style="color: white;">
                        @lang('messages.description')
                    </p>


                    <div class="d-flex mt-3">
                        <a href="#contact" class="btn-get-started scrollto me-3">@lang('messages.commencer')</a>
                        {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                           class="glightbox btn-watch-video d-flex align-items-center text-white">
                            <i class="bi bi-play-circle me-2"></i><span>Watch Video</span>
                        </a> --}}
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

        <div class="container">
            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-activity icon"></i></div>
                        <h4><a href="" class="stretched-link">@lang('messages.avant_about.identite_titre')</a></h4>
                        <p>@lang('messages.avant_about.identite_texte')</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                        <h4><a href="" class="stretched-link">@lang('messages.avant_about.positionnement_titre')</a></h4>
                        <p>@lang('messages.avant_about.positionnement_texte')</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                        <h4><a href="" class="stretched-link">@lang('messages.avant_about.referencement_titre')</a></h4>
                        <p>@lang('messages.avant_about.referencement_texte')</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                        <h4><a href="" class="stretched-link">@lang('messages.avant_about.taux_titre')</a></h4>
                        <p>@lang('messages.avant_about.taux_texte')</p>
                    </div>
                </div><!-- End Service Item -->

            </div>
        </div>



    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-header">
                <div class="decorated-title">
                    <span>@lang('messages.bloc_about.titre')</span>
                </div>
            </div>

            <p>
                @lang('messages.bloc_about.intro')
                <strong style="font-size: 1.2rem; font-weight: 900; color: #000000;">@lang('messages.bloc_about.important1')</strong>,
                <strong style="font-size: 1.2rem; font-weight: 900; color: #000000;">@lang('messages.bloc_about.important2')</strong>
                @lang('messages.bloc_about.et')
                <strong style="font-size: 1.2rem; font-weight: 900; color: #000000;">@lang('messages.bloc_about.important3')</strong>.
            </p>

        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up">

            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-5">
                    <div class="about-img">
                        <img src="{{ asset('storage/' . $aboutSection->image_about) }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-7">
                    <h3 class="pt-0 pt-lg-5 fw-bold">@lang('messages.bloc_about.section_title')</h3>


                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li><a class="nav-link active" data-bs-toggle="pill"
                                href="#about-tab1">{{ $aboutSection->title }}</a>
                        </li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab2">{{ $aboutSection->title_2 }} </a>
                        </li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab3">{{ $aboutSection->title_3 }}</a>
                        </li>
                    </ul><!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="about-tab1">

                            <p class="fst-italic">{{ $aboutSection->paragraph }}</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Simplicité et Fiabilité pour un Service Accessible</h4>
                            </div>


                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Engagement et Professionnalisme dans Chaque Détail</h4>
                            </div>


                        </div><!-- End Tab 1 Content -->

                        <div class="tab-pane fade" id="about-tab2">

                            <p class="fst-italic">{{ $aboutSection->paragraph_2 }}</p>
                            </p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Conseil et Accompagnement Personnalisé</h4>
                            </div>


                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Innovation et Technologies Digitales</h4>
                            </div>


                        </div><!-- End Tab 2 Content -->

                        <div class="tab-pane fade" id="about-tab3">

                            <p class="fst-italic">{{ $aboutSection->paragraph_3 }}</p>
                            </p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Création de logos impactants</h4>
                            </div>


                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4>Élaboration de chartes graphiques cohérentes</h4>
                            </div>


                        </div><!-- End Tab 3 Content -->

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                @foreach ($partners as $partner)
                    <div class="col-xl-2 col-md-3 col-6 client-logo">
                        <a href="{{ $partner->link && !str_starts_with($partner->link, 'http') ? 'https://' . $partner->link : $partner->link ?? '#' }}"
                            target="_blank" rel="noopener noreferrer" title="Visiter le site de {{ $partner->name }}">
                            <img src="{{ asset('storage/' . $partner->image) }}" class="img-fluid"
                                alt="{{ $partner->name }}">
                        </a>
                    </div><!-- End Client Item -->
                @endforeach
            </div>


        </div>

    </section><!-- /Clients Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

        <div class="container" data-aos="zoom-out">

            <div class="row g-5">

                <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                    <h3>
                        @lang('messages.identite_visuelle.visuelle_titre1')
                        <em>@lang('messages.identite_visuelle.visuelle_titre2')</em>
                        @lang('messages.identite_visuelle.visuelle_titre3')
                    </h3>
                    <p>@lang('messages.identite_visuelle.visuelle_texte')</p>
                    <a class="cta-btn align-self-start" href="#contact"
                        style="color: white !important; font-weight: bold !important; text-transform: uppercase !important;">
                        @lang('messages.identite_visuelle.visuelle_bouton')
                    </a>
                </div>


                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                    <div class="img">
                        <img src="{{ asset('assets/images/blog2.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Call To Action Section -->

    <!-- Onfocus Section -->
    <section id="onfocus" class="onfocus section dark-background">

        <div class="container-fluid p-0" data-aos="fade-up">

            <div class="row g-0">
                <!-- Bloc image -->
                <div class="col-lg-6 video-play position-relative">
                    <!-- bouton play supprimé -->
                </div>

                <!-- Bloc contenu -->
                <div class="col-lg-6">
                    <div class="content d-flex flex-column justify-content-center h-100">
                        <h3>@lang('messages.video_bloc.titre')</h3>
                        <p class="fst-italic">
                            @lang('messages.video_bloc.texte')
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> @lang('messages.video_bloc.point1')</li>
                            <li><i class="bi bi-check-circle"></i> @lang('messages.video_bloc.point2')</li>
                            <li><i class="bi bi-check-circle"></i> @lang('messages.video_bloc.point3')</li>
                        </ul>
                        <a class="read-more align-self-start" href="{{ route('home.index') }}#about">
                            <span>@lang('messages.video_bloc.video_bouton')</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>

            </div>

        </div>


    </section><!-- /Onfocus Section -->

    <!-- Features Section -->
    <section id="features" class="features section">
        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row gy-4 d-flex">
                @foreach (range(1, 6) as $i)
                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link @if ($i == 1) active show @endif" data-bs-toggle="tab"
                            data-bs-target="#features-tab-{{ $i }}">
                            <i class="bi bi-graph-up"
                                style="color: {{ ['#0dcaf0', '#6610f2', '#20c997', '#df1529', '#0d6efd', '#fd7e14'][$i - 1] }};"></i>
                            <h4>@lang("messages.features.tab{$i}.titre")</h4>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach (range(1, 6) as $i)
                    <div class="tab-pane fade @if ($i == 1) active show @endif"
                        id="features-tab-{{ $i }}">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>@lang("messages.features.tab{$i}.titre")</h3>
                                @if (isset(__('messages.features')["tab{$i}"]['texte_italic']))
                                    <p class="fst-italic">@lang("messages.features.tab{$i}.texte_italic")</p>
                                @endif
                                @if (isset(__('messages.features')["tab{$i}"]['points']))
                                    <ul>
                                        @foreach (__('messages.features')["tab{$i}"]['points'] as $point)
                                            <li><i class="bi bi-check-circle-fill"></i> {{ $point }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if (isset(__('messages.features')["tab{$i}"]['texte']))
                                    <p>@lang("messages.features.tab{$i}.texte")</p>
                                @endif
                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ asset("assets/images/features-{$i}.svg") }}" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- /Features Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-header">
                <div class="decorated-title">
                    <span>@lang('messages.services_bloc.section_titre')</span>
                </div>
            </div>

            <p>
                @lang('messages.services_bloc.section_intro')
            </p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">
                @foreach ($services as $service)
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ 200 + $loop->index * 100 }}">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid"
                                    alt="{{ $service->title }}">

                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    <i class="bi {{ $service->icon }}"></i>
                                </div>
                                <h3>{{ $service->title }}</h3>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

    </section>
    <!-- /Services Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>@lang('messages.temoignages_section.titre')</h2>
            <p>@lang('messages.temoignages_section.texte')
            </p>
        </div><!-- End Section Title -->

        <img src="{{ asset('assets/images/testimonials-bg.jpg') }}" class="testimonials-bg" alt="">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

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

                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : asset('assets/images/testimonials/default.jpg') }}"
                                    class="testimonial-img" alt="{{ $testimonial->name }}">
                                <h3>{{ $testimonial->name }}</h3>
                                <h4>{{ $testimonial->position ?? '' }}</h4>
                                <div class="stars">
                                    @for ($i = 0; $i < $testimonial->stars; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                    @for ($i = $testimonial->stars; $i < 5; $i++)
                                        <i class="bi bi-star"></i>
                                    @endfor
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>{{ $testimonial->text }}</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section>
    <!-- /Testimonials Section -->

    <!-- Pricing Section -->
    <!-- <section id="pricing" class="pricing section"> -->

    <!-- Section Title -->
    <!-- <div class="container section-title" data-aos="fade-up">
                                                                          <h2>Our Pricing</h2>
                                                                          <p>Des offres claires et flexibles conçues pour s’adapter à vos besoins et à votre budget.
                                                                            Chaque formule est pensée pour maximiser votre retour sur investissement tout en vous offrant un accompagnement personnalisé.
                                                                          </p>
                                                                        </div>End Section Title -->

    <!-- <div class="container" data-aos="fade-up" data-aos-delay="100">

                                                                          <div class="row gy-4">

                                                                            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                                                                              <div class="pricing-item">

                                                                                <div class="pricing-header">
                                                                                  <h3>Free Plan</h3>
                                                                                  <h4><sup>$</sup>0<span> / month</span></h4>
                                                                                </div>

                                                                                <ul>
                                                                                  <li><i class="bi bi-dot"></i> <span>Quam adipiscing vitae proin</span></li>
                                                                                  <li><i class="bi bi-dot"></i> <span>Nec feugiat nisl pretium</span></li>
                                                                                  <li><i class="bi bi-dot"></i> <span>Nulla at volutpat diam uteera</span></li>
                                                                                  <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                                                                                  <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                                                                                </ul>

                                                                                <div class="text-center mt-auto">
                                                                                  <a href="#" class="buy-btn">Buy Now</a>
                                                                                </div>

                                                                              </div>
                                                                            </div>< End Pricing Item -->

    <!-- <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                                                                          <div class="pricing-item featured">

                                                                            <div class="pricing-header">
                                                                              <h3>Business Plan</h3>
                                                                              <h4><sup>$</sup>29<span> / month</span></h4>
                                                                            </div>

                                                                            <ul>
                                                                              <li><i class="bi bi-dot"></i> <span>Quam adipiscing vitae proin</span></li>
                                                                              <li><i class="bi bi-dot"></i> <span>Nec feugiat nisl pretium</span></li>
                                                                              <li><i class="bi bi-dot"></i> <span>Nulla at volutpat diam uteera</span></li>
                                                                              <li><i class="bi bi-dot"></i> <span>Pharetra massa massa ultricies</span></li>
                                                                              <li><i class="bi bi-dot"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                                                                            </ul>

                                                                            <div class="text-center mt-auto">
                                                                              <a href="#" class="buy-btn">Buy Now</a>
                                                                            </div>

                                                                          </div>
                                                                        </div><End Pricing Item -->

    <!-- <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="600">
                                                                          <div class="pricing-item">

                                                                            <div class="pricing-header">
                                                                              <h3>Developer Plan</h3>
                                                                              <h4><sup>$</sup>49<span> / month</span></h4>
                                                                            </div>

                                                                            <ul>
                                                                              <li><i class="bi bi-dot"></i> <span>Quam adipiscing vitae proin</span></li>
                                                                              <li><i class="bi bi-dot"></i> <span>Nec feugiat nisl pretium</span></li>
                                                                              <li><i class="bi bi-dot"></i> <span>Nulla at volutpat diam uteera</span></li>
                                                                              <li><i class="bi bi-dot"></i> <span>Pharetra massa massa ultricies</span></li>
                                                                              <li><i class="bi bi-dot"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                                                                            </ul>

                                                                            <div class="text-center mt-auto">
                                                                              <a href="#" class="buy-btn">Buy Now</a>
                                                                            </div>

                                                                          </div>
                                                                        </div>< End Pricing Item -->

    <!-- </div> -->

    <!-- </div> -->

    <!-- </section>/Pricing Section -->

    <!-- Faq Section -->
    {{-- <section id="faq" class="faq section">

        <div class="container-fluid">

            <div class="row gy-4">

                <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                    <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                        <h3><span>Foire Aux </span><strong>Questions</strong></h3>
                        <p>
                            Retrouvez ici les réponses aux questions les plus courantes sur nos services, notre
                            accompagnement et notre fonctionnement.
                        </p>
                    </div>

                    <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-item faq-active">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Proposez-vous des solutions personnalisées selon mon secteur d’activité ?</h3>
                            <div class="faq-content">
                                <p>Oui, chaque projet débute par une analyse précise de vos besoins et de votre marché.
                                    Nos offres sont pensées sur mesure pour s’adapter à votre domaine et vos objectifs
                                    spécifiques.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Combien de temps dure un projet de stratégie ou d’identité visuelle ?</h3>
                            <div class="faq-content">
                                <p>Tout dépend de l’ampleur du projet. En moyenne, une mission peut durer entre 2 à 6
                                    semaines, avec des étapes claires et validées ensemble à chaque phase.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Puis-je vous confier uniquement une partie de mon projet (ex. logo, site web) ?</h3>
                            <div class="faq-content">
                                <p>Absolument. Vous pouvez choisir une prestation précise ou opter pour un
                                    accompagnement global selon vos besoins.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div>

                <div class="col-lg-5 order-1 order-lg-2">
                    <img src="{{ asset('assets/images/faq.jpg') }}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
                </div>
            </div>

        </div>

    </section> --}}
    <!-- /Faq Section -->

    <!-- Portfolio Section -->
    <!-- <section id="portfolio" class="portfolio section"> -->

    <!-- Section Title -->
    <!-- <div class="container section-title" data-aos="fade-up">
                                                                          <h2>Portfolio</h2>
                                                                          <p>Découvrez nos réalisations qui témoignent de notre savoir-faire et de notre créativité.</p>
                                                                        </div> -->

    <!-- <div class="container-fluid"> -->

    <!-- <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                                                                          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                                                                            <li data-filter="*" class="filter-active">All</li>
                                                                            <li data-filter=".filter-app">App</li>
                                                                            <li data-filter=".filter-product">Product</li>
                                                                            <li data-filter=".filter-branding">Branding</li>
                                                                            <li data-filter=".filter-books">Books</li>
                                                                          </ul> End Portfolio Filters -->

    <!-- <div class="row g-0 isotope-container" data-aos="fade-up" data-aos-delay="200">

                                                                          <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                                                            <div class="portfolio-content h-100">
                                                                              <images src="assets/images/portfolio/app-1.jpg" class="images-fluid" alt="">
                                                                              <div class="portfolio-info">
                                                                                <a href="assets/images/portfolio/app-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                                <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                              </div>
                                                                            </div>
                                                                          </div>End Portfolio Item -->

    <!-- <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/product-1.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/product-1.jpg" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div>

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/branding-1.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/branding-1.jpg" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/books-1.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/books-1.jpg" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/app-2.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/app-2.jpg" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/product-2.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/product-2.jpg" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/branding-2.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/branding-2.jpg" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div>End Portfolio Item -->

    <!-- <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/books-2.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/books-2.jpg" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/app-3.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/app-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/product-3.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/product-3.jpg" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/branding-3.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/branding-3.jpg" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                                                                          <div class="portfolio-content h-100">
                                                                            <images src="assets/images/portfolio/books-3.jpg" class="images-fluid" alt="">
                                                                            <div class="portfolio-info">
                                                                              <a href="assets/images/portfolio/books-3.jpg" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                                                              <a href="portfolio-details.blade.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                                                            </div>
                                                                          </div>
                                                                        </div> End Portfolio Item

                                                                      </div> End Portfolio Container

                                                                    </div>

                                                                    </div>

                                                                    </section>/Portfolio Section -->

    <!-- Team Section -->
    <!-- <section id="team" class="team section"> -->

    <!-- Section Title -->
    <!-- <div class="container section-title" data-aos="fade-up">
                                                                          <div class="section-header">
                                                                            <div class="decorated-title">
                                                                              <span>NOTRE ÉQUIPE</span>
                                                                            </div>
                                                                          </div>
                                                                          <p>Une équipe passionnée et experte, dédiée à accompagner votre réussite.</p>
                                                                        </div> -->

    <!-- <div class="container" data-aos="fade-up" data-aos-delay="100">

                                                                          <div class="row gy-5"> -->

    <!-- <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                                                                          <div class="team-member">
                                                                            <div class="member-images">
                                                                              <images src="assets/images/team/team-1.jpg" class="images-fluid" alt="">
                                                                            </div>
                                                                            <div class="member-info">
                                                                              <div class="social">
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-twitter-x" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-facebook" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-instagram" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-linkedin" style="color: #fff !important;"></i>
                                                                                </a>
                                                                              </div>
                                                                              <h4>Walter White</h4>
                                                                              <span>Chief Executive Officer</span>
                                                                            </div>
                                                                          </div>
                                                                        </div> -->

    <!-- <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
                                                                          <div class="team-member">
                                                                            <div class="member-images">
                                                                              <images src="assets/images/team/team-2.jpg" class="images-fluid" alt="">
                                                                            </div>
                                                                            <div class="member-info">
                                                                              <div class="social">
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-twitter-x" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-facebook" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-instagram" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-linkedin" style="color: #fff !important;"></i>
                                                                                </a>
                                                                              </div>
                                                                              <h4>Sarah Jhonson</h4>
                                                                              <span>Product Manager</span>
                                                                            </div>
                                                                          </div>
                                                                        </div> -->

    <!-- <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="600">
                                                                          <div class="team-member">
                                                                            <div class="member-images">
                                                                              <images src="assets/images/team/team-3.jpg" class="images-fluid" alt="">
                                                                            </div>
                                                                            <div class="member-info">
                                                                              <div class="social">
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-twitter-x" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-facebook" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-instagram" style="color: #fff !important;"></i>
                                                                                </a>
                                                                                <a href="" style="color: #fff !important;">
                                                                                  <i class="bi bi-linkedin" style="color: #fff !important;"></i>
                                                                                </a>
                                                                              </div>
                                                                              <h4>William Anderson</h4>
                                                                              <span>CTO</span>
                                                                            </div>
                                                                          </div>
                                                                        </div> -->

    <!-- </div>


                                                                                </div>

                                                                              </div>

                                                                            </section> -->

    <!-- Recent Posts Section -->
    {{-- <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-header">
                <div class="decorated-title">
                    <span>DERNIERS ARTICLES</span>
                </div>
            </div>
            <p>Explorez nos dernières publications pour rester à la pointe des tendances en communication et marketing
                digital.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article>

                        <div class="post-img">
                            <img src="{{ asset('assets/images/Blog New/blog2.jpg') }}" alt="" class="img-fluid">
                        </div>

                        <p class="post-category">Politics</p>

                        <h2 class="title">
                            <a href="blog/blog-details.blade.php">Dolorum optio tempore voluptas dignissimos</a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/images/blog/blog-author.jpg') }}" alt=""
                                 class="img-fluid post-author-img flex-shrink-0">
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
                            <img src="{{ asset('assets/images/Blog New/blog12.jpg') }}" alt="" class="img-fluid">
                        </div>

                        <p class="post-category">Sports</p>

                        <h2 class="title">
                            <a href="blog/blog-details.blade.php">Nisi magni odit consequatur autem nulla dolorem</a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/images/blog/blog-author-2.jpg') }}" alt=""
                                 class="img-fluid post-author-img flex-shrink-0">
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
                            <img src="{{ asset('assets/images/Blog New/blog13.jpg') }}" alt="" class="img-fluid">
                        </div>

                        <p class="post-category">Entertainment</p>

                        <h2 class="title">
                            <a href="blog/blog-details.blade.php">Possimus soluta ut id suscipit ea ut in quo quia et
                                soluta</a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/images/blog/blog-author-3.jpg') }}" alt=""
                                 class="img-fluid post-author-img flex-shrink-0">
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

    </section> --}}
    <!-- /Recent Posts Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-header">
                <div class="decorated-title">
                    <span>@lang('messages.contact_section.titre')</span>
                </div>
            </div>
            <p>@lang('messages.contact_section.texte')</p>
        </div><!-- End Section Title -->

        <div class="mb-5">
            <iframe style="width: 100%; height: 400px; border:0;" src="{{ $settings->map_location }}" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <!-- End Google Maps -->

        <div class="container" data-aos="fade">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-4">

                    <div class="info">
                        <h3>@lang('messages.contact_section.info_titre')</h3>
                        <p>@lang('messages.contact_section.info_texte')</p>

                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>@lang('messages.footer.localisation')</h4>
                                <p>{{ $settings->localisation }}</p> {{-- Fixe comme demandé --}}
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>@lang('messages.footer.email')</h4>
                                <p>{{ $settings->email }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>@lang('messages.footer.téléphone')</h4>
                                <p>{{ $settings->phone }}</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>


                </div>

                <div class="col-lg-8">
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

                    <!-- Formulaire de contact -->
                    <form id="contactForm" method="post" action="{{ route('contact.send') }}" role="form"
                        class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ __('messages.formulaire.nom') }}" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="{{ __('messages.formulaire.email') }}"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                name="subject" id="subject" placeholder="{{ __('messages.formulaire.sujet') }}"
                                value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control @error('messageContent') is-invalid @enderror" name="messageContent"
                                id="messageContent" placeholder="{{ __('messages.formulaire.message') }}" required>{{ old('messageContent') }}</textarea>
                            @error('messageContent')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-3">
                            {{-- <div class="loading">{{ __('messages.formulaire.loading') }}</div> --}}
                            {{-- <div class="error-message"></div> --}}
                            <div class="sent-message">{{ __('messages.formulaire.success') }}</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">{{ __('messages.formulaire.envoyer') }}</button>
                        </div>
                    </form>

                </div>

            </div>

            <!-- CAPTCHA Overlay (s'affiche après clic sur Envoyer) -->
            <div class="captcha-overlay" id="captchaOverlay">
                <div class="captcha-modal">
                    <h3>
                        <i class="bi bi-shield-check"></i>
                        Vérification de sécurité
                    </h3>
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
                            <input type="text" id="captchaInput" class="captcha-input" placeholder="Saisir le code"
                                maxlength="5" autocomplete="off">
                            <button type="button" class="captcha-refresh-btn" onclick="generateCaptcha()">
                                <i class="bi bi-arrow-clockwise"></i>
                                Nouveau
                            </button>
                        </div>

                        <div class="captcha-attempts" id="captchaAttempts">
                            Tentatives restantes: <strong>3</strong>
                        </div>
                    </div>

                    <div class="captcha-error" id="captchaError">
                        Code incorrect. Veuillez réessayer.
                    </div>

                    <div class="captcha-success" id="captchaSuccess">
                        ✓ Vérification réussie ! Envoi en cours...
                    </div>

                    <div class="captcha-buttons">
                        <button type="button" class="captcha-btn captcha-btn-verify" onclick="verifyCaptcha()">
                            <i class="bi bi-check-lg"></i>
                            Vérifier
                        </button>
                        <button type="button" class="captcha-btn captcha-btn-cancel" onclick="closeCaptcha()">
                            <i class="bi bi-x-lg"></i>
                            Annuler
                        </button>
                    </div>
                </div>
            </div>


            <!-- End Contact Form -->
        </div>
        </div>
    </section><!-- /Contact Section -->
@endsection

<style>
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
