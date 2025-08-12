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
                        Bienvenue Chez <span class="brand-name animation-fall">AYAH COMMUNICATION</span>
                    </h1>

                    <p style="color: white;">
                        Donnez vie à vos idées, captez l’attention, et transformez votre communication en succès
                        durable.
                    </p>


                    <div class="d-flex mt-3">
                        <a href="#about" class="btn-get-started scrollto me-3">Commencer</a>
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
                        <h4><a href="" class="stretched-link">Définition de votre identité</a></h4>
                        <p>La première étape essentielle de toute stratégie de communication efficace est la définition
                            claire de l’identité de votre entreprise. Cela inclut la compréhension de vos valeurs, de
                            votre mission et de votre promesse client. À travers des ateliers collaboratifs, nous vous
                            aidons à construire une identité forte, cohérente et authentique. C’est cette base qui
                            orientera l’ensemble de vos prises de parole et de vos choix marketing.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                        <h4><a href="" class="stretched-link">Positionnement sur les réseaux sociaux</a></h4>
                        <p>Les réseaux sociaux sont des leviers puissants pour gagner en visibilité et engager votre
                            audience. Nous définissons pour vous une stratégie éditoriale adaptée à votre cible et à vos
                            objectifs. Cela inclut le choix des plateformes, la création de contenus engageants, et la
                            planification des publications. Grâce à une veille et une analyse continue, nous ajustons
                            constamment votre positionnement pour optimiser l’impact.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                        <h4><a href="" class="stretched-link">Le référencement de votre site</a></h4>
                        <p>Avoir un site web ne suffit pas : il faut qu’il soit visible. Nous optimisons votre site pour
                            les moteurs de recherche (SEO), afin qu’il remonte naturellement dans les résultats. Cela
                            passe par l’optimisation des balises, des contenus, de la structure du site et de sa
                            vitesse. Un bon référencement augmente votre trafic organique et attire des visiteurs
                            qualifiés.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                        <h4><a href="" class="stretched-link">Un taux de conversion élevé</a></h4>
                        <p>Notre objectif ne se limite pas à attirer du trafic : nous voulons que vos visiteurs
                            deviennent vos clients. Pour cela, nous mettons en place des tunnels de conversion
                            performants, basés sur l’analyse du comportement utilisateur. Design, messages, appels à
                            l’action : tout est pensé pour convertir. Nous suivons vos indicateurs de performance pour
                            améliorer continuellement vos résultats.</p>
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
                    <span>À PROPOS</span>
                </div>
            </div>
            <p>
                AYAH Communication est née de la synergie d’un réseau international de designers passionnés, unis par
                leur amour du métier et de la créativité. Forts de plus de 3 ans d’expérience, nous vous invitons à
                plonger dans un univers où la communication s’exprime sous toutes ses formes, avec
                <strong style="font-size: 1.2rem; font-weight: 900; color: #000000;">innovation</strong>,
                <strong style="font-size: 1.2rem; font-weight: 900; color: #000000;">inspiration</strong> et
                <strong style="font-size: 1.2rem; font-weight: 900; color: #000000;">efficacité</strong>.
            </p>




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
                    <h3 class="pt-0 pt-lg-5 fw-bold">AYAH COMMUNICATION : Excellence et Innovation au Service de Votre
                        Image</h3>


                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li><a class="nav-link active" data-bs-toggle="pill" href="#about-tab1">{{ $aboutSection->title }}</a>
                        </li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab2">{{ $aboutSection->title }} </a></li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab3">{{ $aboutSection->title }}</a></li>
                    </ul><!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="about-tab1">

                            <p class="fst-italic">Chez AYAH COMMUNICATION, nous concevons des solutions innovantes
                                adaptées à vos besoins. Notre équipe passionnée garantit un suivi rapide et rigoureux,
                                offrant des prestations uniques qui renforcent votre visibilité et impact. Chaque projet
                                allie créativité et efficacité pour votre réussite.</p>

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

                            <p class="fst-italic">AYAH COMMUNICATION ne se limite pas à la stratégie : nous offrons un
                                accompagnement global et personnalisé qui couvre tous les aspects essentiels à la
                                réussite de votre communication. De la définition précise de vos besoins à la création
                                de contenus percutants, en passant par l’intégration des dernières innovations
                                digitales, notre équipe vous guide à chaque étape pour assurer un impact durable et
                                mesurable.</p>

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

                            <p class="fst-italic">Chez AYAH COMMUNICATION, nous savons que l’image de marque est le
                                reflet essentiel de votre entreprise. C’est pourquoi nous accompagnons nos clients dans
                                la création et le développement d’une identité visuelle cohérente, distinctive et
                                authentique. De la conception du logo à la définition de la charte graphique, nous
                                mettons tout en œuvre pour que votre marque parle à votre audience et s’impose
                                durablement sur le marché.</p>

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
                        <img src="{{ asset('storage/' . $partner->image) }}" class="img-fluid"
                            alt="{{ $partner->name }}">
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
                    <h3>Donnez vie à une <em>Identité</em> visuelle mémorable</h3>
                    <p>Votre image de marque mérite plus qu’un simple logo. Nous concevons une identité visuelle
                        complète et cohérente, pensée pour refléter vos valeurs, captiver votre public et renforcer
                        votre présence sur tous les supports.</p>
                    <a class="cta-btn align-self-start" href="#"
                        style="color: white !important; font-weight: bold !important; text-transform: uppercase !important;">Osez
                        la différence</a>

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
                <div class="col-lg-6 video-play position-relative">
                    <span class="glightbox pulsating-play-btn" style="pointer-events: none;"></span>
                </div>

                <div class="col-lg-6">
                    <div class="content d-flex flex-column justify-content-center h-100">
                        <h3>Créateurs d’expériences visuelles uniques</h3>
                        <p class="fst-italic">
                            Nous combinons créativité et expertise pour concevoir des identités visuelles qui racontent
                            votre histoire et captivent votre audience. Chaque projet est pensé pour allier esthétisme
                            et efficacité, afin d’optimiser votre impact sur tous les supports.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Allier créativité et expertise pour une identité
                                visuelle impactante.
                            </li>
                            <li><i class="bi bi-check-circle"></i> Proposer un accompagnement personnalisé et des
                                solutions innovantes.
                            </li>
                            <li><i class="bi bi-check-circle"></i> Assurer une cohérence parfaite sur tous vos supports
                                de communication.
                            </li>
                        </ul>
                        <span class="read-more align-self-start" style="cursor: default;">
                            <span>En savoir plus</span>
                            <i class="bi bi-arrow-right"></i>
                        </span>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Onfocus Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row gy-4 d-flex">

                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                        <i class="bi bi-graph-up" style="color: #0dcaf0;"></i>
                        <h4>Impact</h4>
                    </a>
                </li><!-- End Tab 1 Nav -->

                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                        <i class="bi bi-headphones" style="color: #6610f2;"></i>
                        <h4>Écoute</h4>
                    </a>
                </li><!-- End Tab 2 Nav -->

                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                        <i class="bi bi-people" style="color: #20c997;"></i>
                        <h4>Partage</h4>
                    </a>
                </li><!-- End Tab 3 Nav -->

                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                        <i class="bi bi-brush" style="color: #df1529;"></i>
                        <h4>Création</h4>
                    </a>
                </li><!-- End Tab 4 Nav -->

                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-5">
                        <i class="bi bi-lightning-charge" style="color: #0d6efd;"></i>
                        <h4>Innovation</h4>
                    </a>
                </li><!-- End Tab 5 Nav -->

                <li class="nav-item col-6 col-md-4 col-lg-2">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-6">
                        <i class="bi bi-check2-circle" style="color: #fd7e14;"></i>
                        <h4>Résultat</h4>
                    </a>
                </li><!-- End Tab 6 Nav -->

            </ul>

            <div class="tab-content">

                <div class="tab-pane fade active show" id="features-tab-1">
                    <div class="row gy-4">
                        <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                            <h3>Impact</h3>
                            <p class="fst-italic">
                                Notre objectif est de créer un impact fort et durable pour votre marque.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> Des visuels puissants qui captivent
                                    l’attention.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Des messages clairs qui marquent les
                                    esprits.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Une présence renforcée sur tous les canaux.
                                    Chaque action est pensée pour laisser une empreinte durable dans l’esprit de votre
                                    audience
                                </li>
                            </ul>
                            <p>
                                Nous mettons tout en œuvre pour que votre image devienne un véritable levier de
                                croissance et de reconnaissance. L’impact que nous créons se mesure à la fois en émotion
                                et en résultats concrets.
                            </p>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ asset('assets/images/features-1.svg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content 1 -->

                <div class="tab-pane fade" id="features-tab-2">
                    <div class="row gy-4">
                        <div class="col-lg-8 order-2 order-lg-1">
                            <h3>Écoute</h3>
                            <p>
                                L’écoute attentive est la base de toute collaboration réussie.
                            </p>
                            <p class="fst-italic">Une écoute attentive pour mieux comprendre vos enjeux et construire
                                des solutions sur mesure.</p>

                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> Comprendre vos besoins spécifiques et vos
                                    ambitions.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Analyser votre marché et votre audience
                                    cible.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Adapter nos solutions pour un résultat
                                    personnalisé..
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Assurer un suivi régulier pour ajuster la
                                    stratégie selon vos retours.
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/images/features-2.svg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content 2 -->

                <div class="tab-pane fade" id="features-tab-3">
                    <div class="row gy-4">
                        <div class="col-lg-8 order-2 order-lg-1">
                            <h3>Partage</h3>
                            <p>
                                Le partage d’idées et d’expertises est la source essentielle qui enrichit chaque projet,
                                favorisant l’innovation, la créativité, et la réussite commune.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> Échanger régulièrement pour ajuster les
                                    actions.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Co-créer des contenus et campagnes
                                    innovants.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Favoriser une relation de confiance et de
                                    transparence.
                                </li>
                            </ul>
                            <p class="fst-italic">
                                La collaboration et le partage favorisent un climat de confiance indispensable à la
                                réussite des projets. En impliquant toutes les parties prenantes, nous créons des
                                campagnes plus riches, plus créatives et mieux adaptées. Le succès se construit toujours
                                ensemble, dans une dynamique d’échange et de respect mutuel.
                            </p>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/images/features-3.svg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content 3 -->

                <div class="tab-pane fade" id="features-tab-4">
                    <div class="row gy-4">
                        <div class="col-lg-8 order-2 order-lg-1">
                            <h3>Création</h3>
                            <p>
                                La créativité est au cœur de notre démarche, guidant chaque étape pour transformer vos
                                idées en réalisations concrètes. Nous mettons tout en œuvre pour innover sans cesse, en
                                mariant esthétique et stratégie afin de captiver votre audience. Notre approche allie
                                originalité et pertinence, garantissant des projets qui marquent durablement les
                                esprits.
                            </p>
                            <p class="fst-italic">
                                Grâce à cette créativité permanente, nous vous aidons à vous démarquer, en proposant des
                                solutions audacieuses et adaptées qui suscitent l’engagement et renforcent votre image
                                de marque.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> Concevoir des identités visuelles uniques et
                                    cohérentes.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Innover dans la forme et le fond de vos
                                    supports.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Transformer vos idées en projets concrets et
                                    impactants.
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/images/features-4.svg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content 4 -->

                <div class="tab-pane fade" id="features-tab-5">
                    <div class="row gy-4">
                        <div class="col-lg-8 order-2 order-lg-1">
                            <h3>Innovation</h3>
                            <p>
                                Nous intégrons les dernières tendances pour vous démarquer, en combinant technologies
                                innovantes et stratégies avant-gardistes. Notre équipe explore constamment de nouveaux
                                formats et outils digitaux afin de créer des expériences uniques qui captivent votre
                                audience. Cette quête d’excellence garantit que votre communication reste toujours
                                moderne, pertinente et différenciante.
                            </p>
                            <p class="fst-italic">
                                Nous suivons les dernières tendances pour rendre votre communication unique et
                                percutante.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> Utiliser des outils digitaux performants et
                                    modernes.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Mettre en place des stratégies
                                    avant-gardistes.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Expérimenter de nouveaux formats et
                                    concepts.
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/images/features-5.svg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content 5 -->

                <div class="tab-pane fade" id="features-tab-6">
                    <div class="row gy-4">
                        <div class="col-lg-8 order-2 order-lg-1">
                            <h3>Résultat</h3>
                            <p>
                                Notre priorité est d’obtenir des résultats tangibles et mesurables, en suivant chaque
                                étape avec rigueur. Nous analysons les performances pour ajuster les stratégies et
                                maximiser l’impact. Cette démarche assure un retour sur investissement optimal et une
                                croissance durable pour votre entreprise.
                            </p>
                            <p class="fst-italic">
                                Au-delà des chiffres, nous visons à créer une valeur réelle et durable pour votre
                                business, en adaptant constamment nos actions pour répondre aux évolutions de votre
                                marché et besoins.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> Suivre les performances de chaque campagne.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Ajuster les actions pour maximiser l’impact.
                                </li>
                                <li><i class="bi bi-check-circle-fill"></i> Garantir un retour sur investissement
                                    optimal.
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/images/features-6.svg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div><!-- End Tab Content 6 -->

            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-header">
                <div class="decorated-title">
                    <span>NOS SERVICES</span>
                </div>
            </div>

            <p>
                Offrir la solution ultime face à chaque défi.
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
            <h2>Témoignages</h2>
            <p>Les retours de nos clients sont la meilleure preuve de notre engagement et de la qualité de nos services.
                Nous valorisons chaque témoignage, car ils reflètent la confiance et la satisfaction qui nous motivent à
                toujours exceller.
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
                    <span>CONTACT</span>
                </div>
            </div>
            <p>Nous sommes à votre écoute pour concrétiser vos projets.</p>
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
                        <h3>Contactez-nous</h3>
                        <p>Notre équipe est prête à vous accompagner et à répondre à toutes vos questions.</p>

                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Localisation:</h4>
                                <p>{{ $settings->localisation }}</p> {{-- Fixe comme demandé --}}
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>{{ $settings->email }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Téléphone:</h4>
                                <p>{{ $settings->phone }}</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>


                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Votre nom" required="">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Votre Email" required="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Sujet" required="">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" placeholder="Message" required=""></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">En cours...</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Votre message a été envoyé. Merci !</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Envoyer le message</button>
                        </div>
                    </form>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section><!-- /Contact Section -->
@endsection
