<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- ============================================
     SECCIÓN: Comité - Header
     ============================================ -->
<section class="comite-hero" style="background-image: linear-gradient(rgba(26, 22, 37, 0.7), rgba(26, 22, 37, 0.7)), url('<?php echo URLROOT; ?>/img/portadas/comite.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <header class="comite-header">
            <span class="comite-badge"><?php echo _t('comite.page_badge'); ?></span>
            <h1 class="section-title"><?php echo _t('comite.page_title'); ?> <span class="accent">ONTA</span></h1>
            <p class="comite-intro"><?php echo _t('comite.page_intro'); ?></p>
        </header>

        <div class="comite-stats">
            <div class="comite-stat">
                <span class="comite-stat-num">20+</span>
                <span class="comite-stat-label"><?php echo _t('comite.stat_members'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">2</span>
                <span class="comite-stat-label"><?php echo _t('comite.stat_committees'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">10+</span>
                <span class="comite-stat-label"><?php echo _t('comite.stat_countries'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">100%</span>
                <span class="comite-stat-label"><?php echo _t('comite.stat_dedication'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     Nuestra Distinguida Organización (con jerarquía visual)
     ============================================ -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('comite.section_leadership'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('comite.page_intro'); ?></p>
        </header>
        
        <!-- Liderazgo Ejecutivo — Layout Editorial Premium -->
        <div class="leadership-grid">

            <!-- Presidenta ONTA -->
            <article class="leadership-card">
                <div class="leadership-photo-wrap">
                    <img src="<?php echo URLROOT; ?>/img/comite/mara.png"
                         alt="Mara Rúbia Da Rocha"
                         loading="lazy">
                </div>
                <div class="leadership-info">
                    <span class="leadership-role-badge">
                        <i class="fa-solid fa-star"></i>
                        <?php echo _t('comite.role_presidenta'); ?>
                    </span>
                    <p class="leadership-name">Mara Rúbia Da Rocha</p>
                    <p class="leadership-org">Lab. de Nematología — EA/UFG, Brasil</p>
                    <div class="leadership-tags">
                        <span class="leadership-tag"><i class="fa-solid fa-globe"></i> Liderazgo Internacional</span>
                        <span class="leadership-tag"><i class="fa-solid fa-award"></i> Presidenta ONTA</span>
                    </div>
                </div>
            </article>

            <!-- Presidente Organizador — Centro, el más grande -->
            <article class="leadership-card leadership-card--president">
                <div class="leadership-photo-wrap">
                    <img src="<?php echo URLROOT; ?>/img/comite/israel.png"
                         alt="Dr. Israel Lima Medina"
                         loading="lazy">
                </div>
                <div class="leadership-info">
                    <span class="leadership-role-badge leadership-role-badge--organizer">
                        <i class="fa-solid fa-crown"></i>
                        <?php echo _t('comite.role_presidente'); ?>
                    </span>
                    <p class="leadership-name">Dr. Israel Lima Medina</p>
                    <p class="leadership-org">Universidad Nacional del Altiplano, Puno, Perú</p>
                    <div class="leadership-tags">
                        <span class="leadership-tag"><i class="fa-solid fa-star-sharp"></i> Director General</span>
                        <span class="leadership-tag"><i class="fa-solid fa-building-columns"></i> UNA Puno</span>
                    </div>
                </div>
            </article>

            <!-- Vicepresidenta -->
            <article class="leadership-card">
                <div class="leadership-photo-wrap">
                    <img src="<?php echo URLROOT; ?>/img/comite/carolina.png"
                         alt="Carolina Cedano"
                         loading="lazy">
                </div>
                <div class="leadership-info">
                    <span class="leadership-role-badge leadership-role-badge--vice">
                        <i class="fa-solid fa-user-tie"></i>
                        <?php echo _t('comite.role_vice'); ?>
                    </span>
                    <p class="leadership-name">Carolina Cedano</p>
                    <p class="leadership-org">Universidad Nacional de Trujillo, Perú</p>
                    <div class="leadership-tags">
                        <span class="leadership-tag"><i class="fa-solid fa-chart-line"></i> Gestión Estratégica</span>
                        <span class="leadership-tag"><i class="fa-solid fa-handshake"></i> Relaciones Inst.</span>
                    </div>
                </div>
            </article>

        </div>
    </div>
</section>


<!-- ============================================
     Comité Ejecutivo (sin fotos)
     ============================================ -->
<section class="comite-section">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('comite.section_exec'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('comite.page_intro'); ?></p>
        </header>

        <div class="comite-executive-grid">
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/brazil.png" alt="Brazil" class="comite-exec-flag-img">
                <span class="comite-exec-role">Presidenta</span>
                <span class="comite-exec-name">Mara Rúbia Da Rocha</span>
                <span class="comite-exec-org">Lab. de Nematología, Brazil</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/peru.png" alt="Perú" class="comite-exec-flag-img">
                <span class="comite-exec-role">Vicepresidenta</span>
                <span class="comite-exec-name">Carolina Cedano</span>
                <span class="comite-exec-org">Univ. Nac. de Trujillo, Perú</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/chile.png" alt="Chile" class="comite-exec-flag-img">
                <span class="comite-exec-role">Expresidente</span>
                <span class="comite-exec-name">Ernesto San-Blas</span>
                <span class="comite-exec-org">Univ. de O'Higgins, Chile</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/usa.png" alt="USA" class="comite-exec-flag-img">
                <span class="comite-exec-role">Secretaria</span>
                <span class="comite-exec-name">Karla Medina</span>
                <span class="comite-exec-org">Certis Biologicals, USA</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/usa.png" alt="USA" class="comite-exec-flag-img">
                <span class="comite-exec-role">Tesorera</span>
                <span class="comite-exec-name">Renato N. Inserra</span>
                <span class="comite-exec-org">Florida Dept. of Agriculture, USA</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/usa.png" alt="USA" class="comite-exec-flag-img">
                <span class="comite-exec-role">Listserv</span>
                <span class="comite-exec-name">Deborah Neher</span>
                <span class="comite-exec-org">Univ. of Vermont, USA</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/usa.png" alt="USA" class="comite-exec-flag-img">
                <span class="comite-exec-role">Asistente Admin</span>
                <span class="comite-exec-name">Julia Meredith</span>
                <span class="comite-exec-org">Gainesville, Florida, USA</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/costa-rica.png" alt="Costa Rica" class="comite-exec-flag-img">
                <span class="comite-exec-role">Editor Nematropica</span>
                <span class="comite-exec-name">Danny Humphreys-Pereira</span>
                <span class="comite-exec-org">Univ. of Costa Rica</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/uk.png" alt="United Kingdom" class="comite-exec-flag-img">
                <span class="comite-exec-role">Editor Newsletter</span>
                <span class="comite-exec-name">Rosa H. Manzanilla-López</span>
                <span class="comite-exec-org">Harpenden, United Kingdom</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/kenya.png" alt="Kenya" class="comite-exec-flag-img">
                <span class="comite-exec-role">Miembros</span>
                <span class="comite-exec-name">Danny Coyne</span>
                <span class="comite-exec-org">IITA, Kenya</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/chile.png" alt="Chile" class="comite-exec-flag-img">
                <span class="comite-exec-role">Miembros</span>
                <span class="comite-exec-name">Carlos Castañeda</span>
                <span class="comite-exec-org">Chile</span>
            </div>
            <div class="comite-executive-item">
                <img src="<?php echo URLROOT; ?>/img/flags/usa.png" alt="USA" class="comite-exec-flag-img">
                <span class="comite-exec-role">Gerente de Negocios</span>
                <span class="comite-exec-name">Janete Brito</span>
                <span class="comite-exec-org">Florida Dept. of Agriculture, USA</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     Comité Organizador (con logos universidades)
     ============================================ -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('comite.section_organizer'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('comite.page_intro'); ?></p>
        </header>

        <div class="comite-organizer-grid">
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unsa.png" alt="UNSA">
                </div>
                <h4>UNSA</h4>
                <p class="comite-organizer-name">Alberto Anculle Arenas</p>
                <p class="comite-organizer-org">Universidad Nacional de San Agustín</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unt.png" alt="UNT">
                </div>
                <h4>UNT</h4>
                <p class="comite-organizer-name">Carolina Cedano</p>
                <p class="comite-organizer-org">Universidad Nacional de Trujillo</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unp.png" alt="UNP">
                </div>
                <h4>UNP</h4>
                <p class="comite-organizer-name">Cesar Maguiña</p>
                <p class="comite-organizer-org">Universidad Nacional de Piura</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/uniq.png" alt="UNIQ">
                </div>
                <h4>UNIQ</h4>
                <p class="comite-organizer-name">Fanny R. Márquez</p>
                <p class="comite-organizer-org">Universidad Nacional Intercultural de Quillabamba</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="UNA Puno">
                </div>
                <h4>UNAP</h4>
                <p class="comite-organizer-name">Jesús Arcos Pineda</p>
                <p class="comite-organizer-org">Universidad Nacional del Altiplano</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unsa.png" alt="UNSA">
                </div>
                <h4>UNSA</h4>
                <p class="comite-organizer-name">Rosmery Bedregal</p>
                <p class="comite-organizer-org">Universidad Nacional de San Agustín</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="UNA Puno">
                </div>
                <h4>UNAP</h4>
                <p class="comite-organizer-name">Rosario Y. Bravo Portocarrero</p>
                <p class="comite-organizer-org">Universidad Nacional del Altiplano</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="UNA Puno">
                </div>
                <h4>UNAP</h4>
                <p class="comite-organizer-name">Graciela Ramírez Florez</p>
                <p class="comite-organizer-org">Universidad Nacional del Altiplano</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="UNA Puno">
                </div>
                <h4>UNAP</h4>
                <p class="comite-organizer-name">Aurelio Ivan Ramos Flores</p>
                <p class="comite-organizer-org">Universidad Nacional del Altiplano</p>
            </article>
            <article class="comite-organizer-card">
                <div class="comite-organizer-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="UNA Puno">
                </div>
                <h4>UNAP</h4>
                <p class="comite-organizer-name">Elizabeth Gutiérrez</p>
                <p class="comite-organizer-org">Universidad Nacional del Altiplano</p>
            </article>
            <div class="comite-organizer-centered-cards">
                <article class="comite-organizer-card">
                    <div class="comite-organizer-logo">
                        <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="UNA Puno">
                    </div>
                    <h4>UNAP</h4>
                    <p class="comite-organizer-name">Jerson Romario Gomez Cahuana</p>
                    <p class="comite-organizer-org">Universidad Nacional del Altiplano</p>
                </article>
                <article class="comite-organizer-card">
                    <div class="comite-organizer-logo">
                        <img src="<?php echo URLROOT; ?>/img/logos/unalm.png" alt="UNALM">
                    </div>
                    <h4>UNALM</h4>
                    <p class="comite-organizer-name">Dustin Stewart Marin Gil</p>
                    <p class="comite-organizer-org">Universidad Nacional Agraria La Molina</p>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     Universidades Representadas (sin cuadros, nombres completos, logos grandes)
     ============================================ -->
<section class="comite-section comite-universidades">
    <div class="container">
        <h2 class="section-title"><?php echo _t('comite.section_unis'); ?></h2>
        
        <div class="comite-logos-row">
            <div class="comite-logo-item-premium">
                <img src="<?php echo URLROOT; ?>/img/logos/unsa.png" alt="Universidad Nacional de San Agustín">
                <span>Universidad Nacional de San Agustín</span>
            </div>
            <div class="comite-logo-item-premium">
                <img src="<?php echo URLROOT; ?>/img/logos/unt.png" alt="Universidad Nacional de Trujillo">
                <span>Universidad Nacional de Trujillo</span>
            </div>
            <div class="comite-logo-item-premium">
                <img src="<?php echo URLROOT; ?>/img/logos/unp.png" alt="Universidad Nacional de Piura">
                <span>Universidad Nacional de Piura</span>
            </div>
            <div class="comite-logo-item-premium">
                <img src="<?php echo URLROOT; ?>/img/logos/uniq.png" alt="Universidad Nacional Intercultural de Quillabamba">
                <span>Universidad Nacional Intercultural de Quillabamba</span>
            </div>
            <div class="comite-logo-item-premium">
                <img src="<?php echo URLROOT; ?>/img/logos/unapuno.png" alt="Universidad Nacional del Altiplano">
                <span>Universidad Nacional del Altiplano</span>
            </div>
            <div class="comite-logo-item-premium">
                <img src="<?php echo URLROOT; ?>/img/logos/unalm.png" alt="Universidad Nacional Agraria La Molina">
                <span>Universidad Nacional Agraria La Molina</span>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
