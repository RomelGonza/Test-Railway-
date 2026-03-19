<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- ============================================
     SECCIÓN: Áreas - Header
     ============================================ -->
<section class="comite-hero" style="background-image: linear-gradient(rgba(26, 22, 37, 0.7), rgba(26, 22, 37, 0.7)), url('<?php echo URLROOT; ?>/img/portadas/areas.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <header class="comite-header">
            <span class="comite-badge"><?php echo _t('areas.page_badge'); ?></span>
            <h1 class="section-title"><?php echo _t('areas.page_title'); ?> <span class="accent">ONTA 2026</span></h1>
            <p class="comite-intro"><?php echo _t('areas.page_intro'); ?></p>
        </header>

        <div class="comite-stats">
            <div class="comite-stat">
                <span class="comite-stat-num">11</span>
                <span class="comite-stat-label"><?php echo _t('areas.stat_areas'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">3</span>
                <span class="comite-stat-label"><?php echo _t('areas.stat_modes'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">2026</span>
                <span class="comite-stat-label"><?php echo _t('areas.stat_edition'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">100%</span>
                <span class="comite-stat-label">Dedicación</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     Áreas Temáticas ONTA 2026
     ============================================ -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('areas.specialties_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('areas.specialties_desc'); ?></p>
        </header>

        <div class="scientific-area-grid">
            <!-- Área 1 -->
            <article class="area-premium-card">
                <div class="area-card-num">01</div>
                <div class="area-card-icon sci-icon-box--pink">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area1_title'); ?></span>
                <h3><?php echo _t('areas.area1_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-chalkboard-user"></i> Educación</span>
                    <span class="tag-clean"><i class="fa-solid fa-users-gear"></i> Transferencia</span>
                </div>
            </article>

            <!-- Área 2 -->
            <article class="area-premium-card">
                <div class="area-card-num">02</div>
                <div class="area-card-icon sci-icon-box--purple">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area2_title'); ?></span>
                <h3><?php echo _t('areas.area2_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-dna"></i> Molecular</span>
                    <span class="tag-clean"><i class="fa-solid fa-seedling"></i> Fisiología</span>
                </div>
            </article>

            <!-- Área 3 -->
            <article class="area-premium-card">
                <div class="area-card-num">03</div>
                <div class="area-card-icon sci-icon-box--teal">
                    <i class="fa-solid fa-bug"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area3_title'); ?></span>
                <h3><?php echo _t('areas.area3_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-shield-virus"></i> Biocontrol</span>
                    <span class="tag-clean"><i class="fa-solid fa-microscope"></i> Simbiosis</span>
                </div>
            </article>

            <!-- Área 4 -->
            <article class="area-premium-card">
                <div class="area-card-num">04</div>
                <div class="area-card-icon sci-icon-box--coral">
                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area4_title'); ?></span>
                <h3><?php echo _t('areas.area4_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-sitemap"></i> Clasificación</span>
                    <span class="tag-clean"><i class="fa-solid fa-database"></i> Biodiversidad</span>
                </div>
            </article>

            <!-- Área 5 -->
            <article class="area-premium-card">
                <div class="area-card-num">05</div>
                <div class="area-card-icon sci-icon-box--pink">
                    <i class="fa-solid fa-wheat-awn"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area5_title'); ?></span>
                <h3><?php echo _t('areas.area5_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-rotate"></i> Integrado</span>
                    <span class="tag-clean"><i class="fa-solid fa-recycle"></i> Sostenible</span>
                </div>
            </article>

            <!-- Área 6 -->
            <article class="area-premium-card">
                <div class="area-card-num">06</div>
                <div class="area-card-icon sci-icon-box--purple">
                    <i class="fa-solid fa-flask-vial"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area6_title'); ?></span>
                <h3><?php echo _t('areas.area6_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-shield-halved"></i> Biocontrol</span>
                    <span class="tag-clean"><i class="fa-solid fa-bacterium"></i> Microbios</span>
                </div>
            </article>

            <!-- Área 7 -->
            <article class="area-premium-card">
                <div class="area-card-num">07</div>
                <div class="area-card-icon sci-icon-box--teal">
                    <i class="fa-solid fa-vial-circle-check"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area7_title'); ?></span>
                <h3><?php echo _t('areas.area7_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-vial"></i> Química</span>
                    <span class="tag-clean"><i class="fa-solid fa-earth-americas"></i> Ambiental</span>
                </div>
            </article>

            <!-- Área 8 -->
            <article class="area-premium-card">
                <div class="area-card-num">08</div>
                <div class="area-card-icon sci-icon-box--coral">
                    <i class="fa-solid fa-earth-africa"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area8_title'); ?></span>
                <h3><?php echo _t('areas.area8_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-gauge-high"></i> Indicadores</span>
                    <span class="tag-clean"><i class="fa-solid fa-mountain-sun"></i> Suelo</span>
                </div>
            </article>

            <!-- Área 9 -->
            <article class="area-premium-card">
                <div class="area-card-num">09</div>
                <div class="area-card-icon sci-icon-box--pink">
                    <i class="fa-solid fa-dna"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area9_title'); ?></span>
                <h3><?php echo _t('areas.area9_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-code-branch"></i> Genética</span>
                    <span class="tag-clean"><i class="fa-solid fa-shield-virus"></i> Resistencia</span>
                </div>
            </article>

            <div class="area-premium-centered-cards">
            <!-- Área 10 -->
            <article class="area-premium-card">
                <div class="area-card-num">10</div>
                <div class="area-card-icon sci-icon-box--purple">
                    <i class="fa-solid fa-microscope"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area10_title'); ?></span>
                <h3><?php echo _t('areas.area10_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-vial-virus"></i> Diagnóstico</span>
                    <span class="tag-clean"><i class="fa-solid fa-gears"></i> Biotecnología</span>
                </div>
            </article>

            <!-- Área 11 -->
            <article class="area-premium-card">
                <div class="area-card-num">11</div>
                <div class="area-card-icon sci-icon-box--teal">
                    <i class="fa-solid fa-robot"></i>
                </div>
                <span class="area-badge"><?php echo _t('areas.area11_title'); ?></span>
                <h3><?php echo _t('areas.area11_desc'); ?></h3>
                <div class="area-tags">
                    <span class="tag-clean"><i class="fa-solid fa-brain"></i> IA / ML</span>
                    <span class="tag-clean"><i class="fa-solid fa-display"></i> Digital</span>
                </div>
            </article>
        </div>
        </div>
    </div>
</section>

<section class="comite-section">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title">Modalidades de Participación</h2>
            <p class="comite-section-desc">Formas de presentar tu investigación en la 56ª Reunión Anual ONTA</p>
        </header>
        
        <div class="comite-organizer-grid areas-modality-grid">
            <article class="comite-organizer-card areas-modality-card">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-microphone-lines"></i>
                </div>
                <h4>Ponencias Orales</h4>
                <p class="comite-organizer-name">Presentaciones de 15–20 minutos sobre investigaciones originales en cualquiera de las áreas temáticas ONTA.</p>
            </article>
            
            <article class="comite-organizer-card areas-modality-card">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-file-powerpoint"></i>
                </div>
                <h4>Pósteres Científicos</h4>
                <p class="comite-organizer-name">Exhibición de trabajos de investigación en formato póster durante las sesiones interactivas.</p>
            </article>
            
            <article class="comite-organizer-card areas-modality-card">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-users-viewfinder"></i>
                </div>
                <h4>Talleres Prácticos</h4>
                <p class="comite-organizer-name">Actividades hands-on para aprender técnicas específicas de diagnóstico y manejo.</p>
            </article>
        </div>
    </div>
</section>

<!-- ============================================
     Call to Action
     ============================================ -->
<section class="comite-section comite-section-light">
    <div class="container">
        <div class="comite-section-header" style="text-align: center;">
            <h2 class="section-title">¿Listo para ser parte de la 56ª Reunión Anual?</h2>
            <p class="comite-section-desc">Únete a nosotros en Puno para cinco días inolvidables de ciencia y colaboración</p>
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
