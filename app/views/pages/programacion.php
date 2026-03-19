<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="comite-hero" style="background-image: linear-gradient(rgba(26, 22, 37, 0.7), rgba(26, 22, 37, 0.7)), url('<?php echo URLROOT; ?>/img/portadas/programacion.png'); background-size: cover; background-position: center;">
    <div class="container">
        <header class="comite-header">
            <span class="comite-badge"><?php echo _t('programacion.page_badge'); ?></span>
            <h1 class="section-title"><?php echo _t('programacion.page_title'); ?> <span class="accent">ONTA 2026</span></h1>
            <p class="comite-intro"><?php echo _t('programacion.page_intro'); ?></p>
        </header>
        <div class="comite-stats">
            <div class="comite-stat">
                <span class="comite-stat-num">5</span>
                <span class="comite-stat-label"><?php echo _t('programacion.stat_days'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">80%</span>
                <span class="comite-stat-label"><?php echo _t('programacion.stat_progress'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">+50</span>
                <span class="comite-stat-label"><?php echo _t('programacion.stat_speakers'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">5</span>
                <span class="comite-stat-label"><?php echo _t('programacion.stat_countries'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Estado del Programa -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><span class="sci-icon-inline"><i class="fa-solid fa-flask-vial"></i></span> <?php echo _t('programacion.dev_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.dev_desc'); ?></p>
        </header>
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill" style="width: 80%;">
                    <span class="progress-text">
                        <i class="fa-solid fa-chart-line"></i> 80%
                    </span>
                </div>
            </div>
            <div class="progress-steps">
                <div class="progress-step completed">
                    <i class="fa-solid fa-check-circle"></i>
                    <span>Planificación</span>
                </div>
                <div class="progress-step completed">
                    <i class="fa-solid fa-check-circle"></i>
                    <span>Desarrollo</span>
                </div>
                <div class="progress-step active">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                    <span>Revisión</span>
                </div>
                <div class="progress-step">
                    <i class="fa-solid fa-circle"></i>
                    <span>Finalización</span>
                </div>
            </div>
            <p class="progress-desc"><?php echo _t('programacion.dev_progress'); ?></p>
        </div>
        <div class="comite-organizer-grid" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem;">
            <article class="comite-organizer-card" style="max-width: 320px; flex: 1 1 300px;">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <h4><?php echo _t('programacion.info_dates'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.info_dates_val'); ?></p>
                <p class="comite-organizer-org"><?php echo _t('programacion.info_dates_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 320px; flex: 1 1 300px;">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-users-between-lines"></i>
                </div>
                <h4><?php echo _t('programacion.info_speakers_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.info_speakers_val'); ?></p>
                <p class="comite-organizer-org"><?php echo _t('programacion.info_speakers_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 320px; flex: 1 1 300px;">
                <div class="sci-icon-box sci-icon-box--coral">
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
                <h4><?php echo _t('programacion.info_modes_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.info_modes_val'); ?></p>
                <p class="comite-organizer-org"><?php echo _t('programacion.info_modes_desc'); ?></p>
            </article>
        </div>
    </div>
</section>

<!-- Conferencistas Confirmados -->
<section class="comite-section">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('programacion.speakers_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.speakers_desc'); ?></p>
        </header>
        <div class="comite-featured-grid">
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/Philippe.png" alt="Francia" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">Philippe Castagnone-Sereno</span>
                    <h3>PhD. Philippe Castagnone-Sereno</h3>
                    <p class="comite-card-org">INRAE - Francia</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_research'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-microscope"></i> Investigación</span>
                        <span class="feature-tag"><i class="fa-solid fa-chalkboard-user"></i> Conferencia</span>
                    </div>
                </div>
            </article>
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/bauer.png" alt="Brasil" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">Dr. Cesar Bauer Gomes</span>
                    <h3>Dr. Cesar Bauer Gomes</h3>
                    <p class="comite-card-org">Embrapa - Brasil</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_senior'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-wheat-awn"></i> Agricultura</span>
                        <span class="feature-tag"><i class="fa-solid fa-worm"></i> Nematodos</span>
                    </div>
                </div>
            </article>
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/paola.png" alt="Argentina" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">Dra. Paola Lax</span>
                    <h3>Dra. Paola Lax</h3>
                    <p class="comite-card-org">UNC - Argentina</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_professor'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-dna"></i> Taxonomía</span>
                        <span class="feature-tag"><i class="fa-solid fa-magnifying-glass-chart"></i> Clasificación</span>
                    </div>
                </div>
            </article>
        </div>
        <div class="comite-featured-grid">
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/CESAR.png" alt="Perú" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">PhD. Cesar A. Murguia Reyes</span>
                    <h3>PhD. Cesar A. Murguia Reyes</h3>
                    <p class="comite-card-org">UNP - Perú</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_main_prof'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-wine-bottle"></i> Vid</span>
                        <span class="feature-tag"><i class="fa-solid fa-sun"></i> Condiciones</span>
                    </div>
                </div>
            </article>
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/ernesto.png" alt="Chile" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">PhD. Ernesto San Blas</span>
                    <h3>PhD. Ernesto San Blas</h3>
                    <p class="comite-card-org">UOH - Chile</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_associate'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-shield-virus"></i> Entomopatógenos</span>
                        <span class="feature-tag"><i class="fa-solid fa-shield-halved"></i> Control</span>
                    </div>
                </div>
            </article>
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/JESUS.png" alt="Perú" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">PhD. Jesus H. Arcos Pineda</span>
                    <h3>PhD. Jesus H. Arcos Pineda</h3>
                    <p class="comite-card-org">UNA - Perú</p>
                    <p class="comite-card-title"><?php echo _t('programacion.role_researcher'); ?></p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-mountain-sun"></i> Andes</span>
                        <span class="feature-tag"><i class="fa-solid fa-chart-line"></i> Distribución</span>
                    </div>
                </div>
            </article>
            <div class="comite-card-centered">
            <article class="comite-card">
                <div class="comite-card-img">
                    <img src="<?php echo URLROOT; ?>/img/ponentes/vanessa.png" alt="Brasil" class="speaker-flag">
                </div>
                <div class="comite-card-body">
                    <span class="comite-card-role">Dra. Vanessa Mattos</span>
                    <h3>Dra. Vanessa Mattos</h3>
                    <p class="comite-card-org">Embrapa - Brasil</p>
                    <p class="comite-card-title">Especialista en Diversidad y Manejo de Fitonematodos</p>
                    <div class="comite-card-features">
                        <span class="feature-tag"><i class="fa-solid fa-dna"></i> Taxonomía Integrativa</span>
                        <span class="feature-tag"><i class="fa-solid fa-leaf"></i> Control Biológico</span>
                    </div>
                </div>
            </article>
        </div>
        </div>
        <div class="conference-stats">
            <div class="stat-item">
                <span class="stat-number">6</span>
                <span class="stat-label"><?php echo _t('programacion.stat_speakers'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number">5</span>
                <span class="stat-label"><?php echo _t('programacion.stat_countries'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number">+50</span>
                <span class="stat-label">Años de Experiencia</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label">Expertos Internacionales</span>
            </div>
        </div>
    </div>
</section>

<!-- Lo que Puedes Esperar -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('programacion.expect_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.expect_desc'); ?></p>
        </header>
        <div class="comite-organizer-grid" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 2rem;">
            <article class="comite-organizer-card" style="max-width: 300px; flex: 1 1 250px;">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <h4><?php echo _t('programacion.expect1_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.expect1_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 300px; flex: 1 1 250px;">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-chart-area"></i>
                </div>
                <h4><?php echo _t('programacion.expect2_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.expect2_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 300px; flex: 1 1 250px;">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-flask"></i>
                </div>
                <h4><?php echo _t('programacion.expect3_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.expect3_desc'); ?></p>
            </article>
            <article class="comite-organizer-card" style="max-width: 300px; flex: 1 1 250px;">
                <div class="sci-icon-box sci-icon-box--coral">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <h4><?php echo _t('programacion.expect4_title'); ?></h4>
                <p class="comite-organizer-name"><?php echo _t('programacion.expect4_desc'); ?></p>
            </article>
        </div>
    </div>
</section>

<!-- Estructura del Programa -->
<section class="comite-section">
    <div class="container">
        <div class="sci-card-complex elite" style="background: var(--white); border-radius: 24px; padding: 4rem 2rem; box-shadow: var(--shadow); text-align: center; max-width: 900px; margin: 0 auto; border: 2px dashed var(--pink);">
            <div class="sci-icon-box sci-icon-box--pink" style="width: 100px; height: 100px; margin: 0 auto 2rem; font-size: 3rem; animation: pulse 2s infinite;">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--text-dark); margin-bottom: 1rem;"><?php echo _t('programacion.schedule_title'); ?></h2>
            <p style="color: var(--pink); font-size: 1.2rem; font-weight: 700; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: 1px;">
                <i class="fa-solid fa-flask-vial"></i> <?php echo _t('programacion.schedule_desc'); ?>
            </p>
            <p style="color: var(--text-muted); line-height: 1.8; max-width: 600px; margin: 0 auto;">
                Nuestro comité científico está trabajando arduamente en la arquitectura final del programa para garantizar una experiencia académica de excelencia. ¡Próximamente publicaremos el cronograma detallado!
            </p>
        </div>
    </div>
</section>

<style>
@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.05); opacity: 0.8; }
    100% { transform: scale(1); opacity: 1; }
}
</style>

<!-- Información Importante -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('programacion.info_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('programacion.info_desc'); ?></p>
        </header>
        <div class="info-grid">
            <article class="info-card">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-location-pin"></i>
                </div>
                <h4><?php echo _t('programacion.venue_title'); ?></h4>
                <p class="info-title"><?php echo _t('programacion.venue_val'); ?></p>
                <p class="info-desc"><?php echo _t('programacion.venue_desc'); ?></p>
                <p class="info-detail"><?php echo _t('programacion.venue_sub'); ?></p>
            </article>
            <article class="info-card">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-diagram-project"></i>
                </div>
                <h4><?php echo _t('programacion.modes_title_info'); ?></h4>
                <ul class="info-list">
                    <li><i class="fa-solid fa-circle-check"></i> Ponencias orales (20 min)</li>
                    <li><i class="fa-solid fa-circle-check"></i> Pósteres científicos</li>
                    <li><i class="fa-solid fa-circle-check"></i> Talleres prácticos</li>
                    <li><i class="fa-solid fa-circle-check"></i> Mesas redondas</li>
                </ul>
            </article>
            <article class="info-card">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-users-line"></i>
                </div>
                <h4><?php echo _t('programacion.attendees_title'); ?></h4>
                <p class="info-title"><?php echo _t('programacion.attendees_val'); ?></p>
                <p class="info-desc"><?php echo _t('programacion.attendees_desc'); ?></p>
            </article>
            <div class="info-card-centered">
            <article class="info-card">
                <div class="sci-icon-box sci-icon-box--coral">
                    <i class="fa-solid fa-language"></i>
                </div>
                <h4><?php echo _t('programacion.langs_title'); ?></h4>
                <ul class="info-list">
                    <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.lang1'); ?></li>
                    <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.lang2'); ?></li>
                    <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.lang3'); ?></li>
                    <li><i class="fa-solid fa-circle-check"></i> <?php echo _t('programacion.lang4'); ?></li>
                </ul>
            </article>
        </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="comite-section comite-section-light">
    <div class="container">
        <div class="comite-section-header" style="text-align: center;">
            <h2 class="section-title">¿Listo para ser parte de la 56ª Reunión Anual?</h2>
            <p class="comite-section-desc">Únete a nosotros en Puno para cinco días inolvidables de ciencia, investigación, aprendizaje y colaboración</p>
        </div>
        <div class="comite-cta-buttons" style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <a href="<?php echo URLROOT; ?>/pages/presentacion" class="comite-cta-btn">
                <i class="fa-solid fa-circle-info"></i>
                Conocer Presentación
            </a>
            <a href="<?php echo URLROOT; ?>/pages/areas" class="comite-cta-btn">
                <i class="fa-solid fa-layer-group"></i>
                Ver Áreas Temáticas
            </a>
            <a href="<?php echo URLROOT; ?>/inscriptions" class="comite-cta-btn comite-cta-btn--primary">
                <i class="fa-solid fa-user-plus"></i>
                Inscribirse Ahora
            </a>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
