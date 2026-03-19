<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- ============================================
     SECCIÓN 1: Hero Principal (Carrusel)
     ============================================ -->
<section class="hero-carousel" id="home">
    <div class="carousel-container">
        <!-- Slide 1: Bienvenida -->
        <div class="carousel-slide active" style="background-image: url('<?php echo URLROOT; ?>/img/carrusel/slide01.jpg');">
            <div class="slide-overlay"></div>
            <div class="container slide-content">
                <span class="slide-tag"><?php echo _t('hero.tag'); ?></span>
                <h1><?php echo _t('hero.title'); ?> <span class="accent">ONTA 2026</span></h1>
                <p><?php echo _t('hero.subtitle'); ?></p>
                <div class="slide-actions">
                    <a href="<?php echo URLROOT; ?>/pages/inscriptions" class="btn btn-gold"><?php echo _t('hero.btn_register'); ?> <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#presentacion" class="nav-btn-outline"><?php echo _t('hero.btn_presentation'); ?></a>
                </div>
            </div>
        </div>

        <!-- Slide 2: Investigación -->
        <div class="carousel-slide" style="background-image: url('<?php echo URLROOT; ?>/img/carrusel/slide04.jpg');">
            <div class="slide-overlay"></div>
            <div class="container slide-content">
                <span class="slide-tag"><?php echo _t('hero.tag'); ?></span>
                <h1><?php echo _t('hero.slide2_title'); ?></h1>
                <p><?php echo _t('hero.slide2_subtitle'); ?></p>
                <div class="slide-actions">
                    <a href="<?php echo URLROOT; ?>/pages/abstracts" class="btn btn-gold"><?php echo _t('nav.abstracts'); ?> <i class="fa-solid fa-file-arrow-up"></i></a>
                </div>
            </div>
        </div>

        <!-- Slide 3: Networking -->
        <div class="carousel-slide" style="background-image: url('<?php echo URLROOT; ?>/img/carrusel/slide03.jpg');">
            <div class="slide-overlay"></div>
            <div class="container slide-content">
                <span class="slide-tag"><?php echo _t('hero.tag'); ?></span>
                <h1><?php echo _t('hero.slide3_title'); ?></h1>
                <p><?php echo _t('hero.slide3_subtitle'); ?></p>
                <div class="slide-actions">
                    <a href="<?php echo URLROOT; ?>/pages/inscriptions" class="btn btn-gold"><?php echo _t('hero.btn_register'); ?> <i class="fa-solid fa-user-plus"></i></a>
                </div>
            </div>
        </div>

        <!-- Controles del Carrusel -->
        <button class="carousel-control prev" id="prevSlide"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="carousel-control next" id="nextSlide"><i class="fa-solid fa-chevron-right"></i></button>
        
        <!-- Indicadores -->
        <div class="carousel-indicators">
            <div class="indicator active" data-index="0"></div>
            <div class="indicator" data-index="1"></div>
            <div class="indicator" data-index="2"></div>
        </div>

        <!-- Barra de Cuenta Regresiva (Sin cuadros, centrada) -->
        <div class="hero-countdown">
            <div class="container countdown-container text-center">
                <div class="countdown-item">
                    <span id="days" class="countdown-number">00</span>
                    <span class="countdown-label"><?php echo _t('countdown.days'); ?></span>
                </div>
                <div class="countdown-divider">/</div>
                <div class="countdown-item">
                    <span id="hours" class="countdown-number">00</span>
                    <span class="countdown-label"><?php echo _t('countdown.hours'); ?></span>
                </div>
                <div class="countdown-divider">/</div>
                <div class="countdown-item">
                    <span id="minutes" class="countdown-number">00</span>
                    <span class="countdown-label"><?php echo _t('countdown.minutes'); ?></span>
                </div>
                <div class="countdown-divider">/</div>
                <div class="countdown-item">
                    <span id="seconds" class="countdown-number">00</span>
                    <span class="countdown-label"><?php echo _t('countdown.seconds'); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECCIÓN 2: ¿Por qué participar?
     ============================================ -->
<section class="why-section" id="presentacion">
    <div class="why-section-bg"></div>
    <div class="container">
        <header class="why-header">
            <span class="why-badge"><?php echo _t('home.why_badge'); ?></span>
            <h2 class="section-title"><?php echo _t('home.why_title'); ?></h2>
            <p class="why-intro"><?php echo _t('home.why_intro'); ?></p>
        </header>

        <!-- Beneficios principales con Iconos Scientific -->
        <div class="benefits-grid">
            <article class="benefit-card">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                <h4><?php echo _t('home.benefit1_title'); ?></h4>
                <p><?php echo _t('home.benefit1_desc'); ?></p>
            </article>
            <article class="benefit-card">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-microchip"></i>
                </div>
                <h4><?php echo _t('home.benefit2_title'); ?></h4>
                <p><?php echo _t('home.benefit2_desc'); ?></p>
            </article>
            <article class="benefit-card">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-flask-vial"></i>
                </div>
                <h4><?php echo _t('home.benefit3_title'); ?></h4>
                <p><?php echo _t('home.benefit3_desc'); ?></p>
            </article>
        </div>

        <!-- Bloques de evidencia visual -->
        <div class="why-evidence">
            <h3 class="why-evidence-title"><?php echo _t('home.evidence_title'); ?></h3>
            <div class="why-grid">
                <article class="why-card why-card-featured">
                    <div class="why-card-img">
                        <img src="<?php echo URLROOT; ?>/img/participar/3.jpeg" alt="Microscopic Analysis" loading="lazy">
                        <span class="why-card-badge"><?php echo _t('home.evidence1_badge'); ?></span>
                    </div>
                    <div class="why-card-body">
                        <h3><?php echo _t('home.evidence1_title'); ?></h3>
                        <p><?php echo _t('home.evidence1_desc'); ?></p>
                        <ul class="why-card-features">
                            <li><i class="fa-solid fa-check"></i> Lab-certified</li>
                            <li><i class="fa-solid fa-check"></i> International Standards</li>
                        </ul>
                    </div>
                </article>
                <article class="why-card why-card-featured">
                    <div class="why-card-img">
                        <img src="<?php echo URLROOT; ?>/img/participar/7.jpeg" alt="Specialized Lab" loading="lazy">
                        <span class="why-card-badge"><?php echo _t('home.evidence2_badge'); ?></span>
                    </div>
                    <div class="why-card-body">
                        <h3><?php echo _t('home.evidence2_title'); ?></h3>
                        <p><?php echo _t('home.evidence2_desc'); ?></p>
                        <ul class="why-card-features">
                            <li><i class="fa-solid fa-check"></i> Species ID</li>
                            <li><i class="fa-solid fa-check"></i> Advanced Diagnostics</li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>

    </div>
</section>

<!-- ============================================
     SECCIÓN 3: Estadísticas
     ============================================ -->
<section class="highlights">
    <div class="container text-center">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">
                    <h2 class="counter" data-target="150">0</h2>
                    <span class="stat-suffix">+</span>
                </div>
                <h4><?php echo _t('home.stat1_label'); ?></h4>
                <p><?php echo _t('home.stat1_sub'); ?></p>
                <i class="fa-solid fa-building-columns stat-icon"></i>
            </div>
            <div class="stat-item">
                <div class="stat-number">
                    <h2 class="counter" data-target="2500">0</h2>
                    <span class="stat-suffix">+</span>
                </div>
                <h4><?php echo _t('home.stat2_label'); ?></h4>
                <p><?php echo _t('home.stat2_sub'); ?></p>
                <i class="fa-solid fa-user-graduate stat-icon"></i>
            </div>
            <div class="stat-item">
                <div class="stat-number">
                    <h2 class="counter" data-target="850">0</h2>
                    <span class="stat-suffix">+</span>
                </div>
                <h4><?php echo _t('home.stat3_label'); ?></h4>
                <p><?php echo _t('home.stat3_sub'); ?></p>
                <i class="fa-solid fa-microphone-lines stat-icon"></i>
            </div>
            <div class="stat-item">
                <div class="stat-number">
                    <h2 class="counter" data-target="25">0</h2>
                    <span class="stat-suffix">+</span>
                </div>
                <h4><?php echo _t('home.stat4_label'); ?></h4>
                <p><?php echo _t('home.stat4_sub'); ?></p>
                <i class="fa-solid fa-earth-americas stat-icon"></i>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SECCIÓN 4: Interacción Institucional
     ============================================ -->
<section class="institutions-section">
    <div class="institutions-bg"></div>
    <div class="container">
        <header class="institutions-header">
            <span class="institutions-badge"><?php echo _t('home.inst_badge'); ?></span>
            <h2 class="section-title"><?php echo _t('home.inst_title'); ?></h2>
            <p class="institutions-intro"><?php echo _t('home.inst_intro'); ?></p>
        </header>

        <div class="institutions-grid">
            <article class="institution-card" data-role="sede">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="UNA Puno" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>UNAP</h4>
                    <p>Universidad Nacional del Altiplano</p>
                </div>
            </article>
            <article class="institution-card" data-role="facultad">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/Agronomica.png" alt="Agronomía" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>Ingeniería Agronómica</h4>
                    <p>Universidad Nacional del Altiplano</p>
                </div>
            </article>
            <article class="institution-card institution-card-featured" data-role="organizador">
                <span class="institution-role institution-role-featured">Organizador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/logo.png" alt="ONTA Perú" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>ONTA PERÚ</h4>
                    <p>Latin American Nematologists Organization</p>
                </div>
            </article>
            <article class="institution-card" data-role="investigacion">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/Instituto.png" alt="Institute" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>Instituto de Investigación</h4>
                    <p>Universidad Nacional del Altiplano</p>
                </div>
            </article>
            <article class="institution-card" data-role="investigacion">
                <span class="institution-role">Colaborador</span>
                <div class="institution-img">
                    <img src="<?php echo URLROOT; ?>/img/logos/3.png" alt="Protección Vegetal" loading="lazy">
                </div>
                <div class="institution-info">
                    <h4>Protección Vegetal</h4>
                    <p>Research Institute</p>
                </div>
            </article>
        </div>

        <div class="institutions-cta">
            <p><?php echo _t('home.inst_cta'); ?></p>
            <a href="javascript:void(0)" class="institutions-link" id="contactBtn"><?php echo _t('common.contact_us'); ?> <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ============================================
     SECCIÓN 5: Galería Científica
     ============================================ -->
<section class="gallery-section">
    <div class="gallery-section-bg"></div>
    <div class="container">
        <header class="gallery-header">
            <span class="gallery-badge"><?php echo _t('home.gallery_badge'); ?></span>
            <h2 class="section-title"><?php echo _t('home.gallery_title'); ?></h2>
            <p class="gallery-intro"><?php echo _t('home.gallery_intro'); ?></p>
        </header>

        <div class="gallery-grid">
            <?php for ($i = 1; $i <= 12; $i++): ?>
            <div class="gallery-item <?php echo($i == 1 || $i == 5 || $i == 8) ? 'gallery-item-large' : ''; ?>">
                <img src="<?php echo URLROOT; ?>/img/galeria/<?php echo $i; ?>.jpeg" alt="Scientific Gallery <?php echo $i; ?>" loading="lazy">
                <div class="gallery-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus gallery-icon"></i>
                    <span class="gallery-caption"><?php echo _t('common.read_more'); ?></span>
                </div>
            </div>
            <?php
endfor; ?>
        </div>
    </div>
</section>

<!-- ============================================
     SECCIÓN 6: Sede del Evento
     ============================================ -->
<section class="venue-section">
    <div class="venue-section-bg"></div>
    <div class="container">
        <header class="venue-header">
            <span class="venue-badge"><?php echo _t('home.venue_badge'); ?></span>
            <h2 class="section-title"><?php echo _t('home.venue_title'); ?></h2>
            <p class="venue-intro"><?php echo _t('home.venue_intro'); ?></p>
        </header>

        <div class="venue-content">
            <div class="venue-video-info">
                <div class="venue-video-wrap">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/7u0C2pi-vXk" frameborder="0" allowfullscreen title="Hotel Libertador Puno"></iframe>
                    </div>
                </div>
                <div class="venue-desc">
                    <h3><?php echo _t('home.venue_subtitle'); ?></h3>
                    <p><?php echo _t('home.venue_desc'); ?></p>
                    <ul class="venue-features">
                        <li><i class="fa-solid fa-wifi"></i> <?php echo _t('home.venue_feat1'); ?></li>
                        <li><i class="fa-solid fa-chalkboard-user"></i> <?php echo _t('home.venue_feat2'); ?></li>
                        <li><i class="fa-solid fa-mountain-sun"></i> <?php echo _t('home.venue_feat3'); ?></li>
                        <li><i class="fa-solid fa-hotel"></i> <?php echo _t('home.venue_feat4'); ?></li>
                        <li><i class="fa-solid fa-utensils"></i> <?php echo _t('home.venue_feat5'); ?></li>
                        <li><i class="fa-solid fa-parking"></i> <?php echo _t('home.venue_feat6'); ?></li>
                    </ul>
                </div>
            </div>

            <div class="venue-map-col">
                <div class="venue-map-wrap">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3839.2312686888496!2d-69.99863452423027!3d-15.828695024090234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915d697818e312ef%3A0xc348259d64a78049!2sHotel%20Libertador%20Puno!5e1!3m2!1ses-419!2spe!4v1710014639433!5m2!1ses-419!2spe" allowfullscreen="" loading="lazy" title="Location Map"></iframe>
                    </div>
                    <div class="venue-map-actions">
                        <a href="https://maps.app.goo.gl/WwGPGJPB2VgFQgDt7" target="_blank" rel="noopener noreferrer" class="btn btn-gold">
                            <i class="fa-solid fa-map-location-dot"></i> <?php echo _t('home.map_btn'); ?>
                        </a>
                        <div class="venue-location-info">
                            <h4><i class="fa-solid fa-location-dot"></i> <?php echo _t('home.loc_title'); ?></h4>
                            <p><?php echo _t('home.loc_desc'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MODALES (GALERÍA Y CONTACTO)
     ============================================ -->
<div id="galleryModal" class="gallery-modal">
    <span class="close-modal">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="modalCaption" class="modal-caption"></div>
</div>

<div id="contactModal" class="contact-modal">
    <div class="contact-modal-content">
        <button class="close-contact-modal"><i class="fa-solid fa-xmark"></i></button>
        
        <div class="contact-modal-header">
            <div class="contact-logo-wrap">
                <img src="<?php echo URLROOT; ?>/img/logos/logo.png" alt="ONTA Perú" class="contact-modal-logo">
            </div>
            <h2><?php echo _t('footer.contact'); ?></h2>
        </div>

        <div class="contact-modal-body">
            <!-- Dirección -->
            <div class="contact-item-box">
                <div class="contact-icon-circle">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="contact-info-text">
                    <span><?php echo _t('common.address'); ?></span>
                    <p>Av. Floral N° 1153, Ciudad Universitaria.</p>
                </div>
            </div>

            <!-- Teléfono -->
            <div class="contact-item-box">
                <div class="contact-icon-circle">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="contact-info-text">
                    <span><?php echo _t('common.phone'); ?></span>
                    <p>+51 956 838 730</p>
                </div>
            </div>

            <!-- Email -->
            <div class="contact-item-box">
                <div class="contact-icon-circle">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="contact-info-text">
                    <span><?php echo _t('common.email'); ?></span>
                    <p>ontaperu@unap.edu.pe</p>
                </div>
            </div>
        </div>

        <div class="contact-modal-footer">
            <div class="footer-decoration"></div>
            <p>ONTA PERU 2026 — Puno</p>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
