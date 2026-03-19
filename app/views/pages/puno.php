<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- GOOGLE FONTS para tipografía premium -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">

<!-- ====================================================
     HERO — Cinematográfico Full Screen
     ==================================================== -->
<section class="ph-hero">
    <div class="ph-hero-bg" style="background-image: url('<?php echo URLROOT; ?>/img/portadas/explora.jpg');"></div>
    <div class="ph-hero-overlay"></div>
    <div class="ph-hero-content">
        <p class="ph-hero-eyebrow">
            <span class="ph-dot-live"></span>
            Capital del Folklore Peruano · 3,812 m.s.n.m.
        </p>
        <h1 class="ph-hero-h1">
            Enamórate<br>
            <em>de Puno</em>
        </h1>
        <p class="ph-hero-sub">Donde la ciencia, la cultura y los Andes se encuentran en el ONTA 2026</p>
        <div class="ph-hero-pills">
            <span>🌊 Lago Titicaca</span>
            <span>🎭 300 Danzas</span>
            <span>🏔️ Andes Sagrados</span>
            <span>🔬 ONTA 2026</span>
        </div>
        <a href="#cultura" class="ph-scroll-cta">
            <span>Descubrir</span>
            <div class="ph-scroll-ring"><i class="fa-solid fa-arrow-down"></i></div>
        </a>
    </div>
    <!-- Números flotantes -->
    <div class="ph-hero-numbers">
        <div class="ph-num"><strong>8,562</strong><span>km² de lago</span></div>
        <div class="ph-num"><strong>300+</strong><span>danzas únicas</span></div>
        <div class="ph-num"><strong>56a</strong><span>reunión ONTA</span></div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Galería Inmersiva de Puno
     ==================================================== -->
<section class="ph-gallery-section" id="cultura">
    <div class="ph-gallery-header">
        <span class="ph-label">📸 Puno en Imágenes</span>
        <h2>Un destino que <em>te conquista</em></h2>
    </div>
    <div class="ph-masonry">
        <div class="ph-photo ph-photo-tall">
            <img src="<?php echo URLROOT; ?>/img/puno/titicaca.jpg" alt="Lago Titicaca">
            <div class="ph-photo-caption">
                <h3>Lago Titicaca</h3>
                <p>El lago navegable más alto del mundo · Patrimonio UNESCO</p>
            </div>
        </div>
        <div class="ph-photo-col">
            <div class="ph-photo">
                <img src="<?php echo URLROOT; ?>/img/puno/sillustani.jpg" alt="Sillustani">
                <div class="ph-photo-caption">
                    <h3>Sillustani</h3>
                    <p>Torres funerarias milenarias</p>
                </div>
            </div>
            <div class="ph-photo">
                <img src="<?php echo URLROOT; ?>/img/puno/taquile.jpg" alt="Isla Taquile">
                <div class="ph-photo-caption">
                    <h3>Isla Taquile</h3>
                    <p>Textiles Patrimonio UNESCO</p>
                </div>
            </div>
        </div>
        <div class="ph-photo-col">
            <div class="ph-photo">
                <img src="<?php echo URLROOT; ?>/img/puno/catedral.jpg" alt="Catedral">
                <div class="ph-photo-caption">
                    <h3>Catedral de Puno</h3>
                    <p>Barroco mestizo, siglo XVII</p>
                </div>
            </div>
            <div class="ph-photo">
                <img src="<?php echo URLROOT; ?>/img/puno/mirador.jpg" alt="Mirador">
                <div class="ph-photo-caption">
                    <h3>Mirador Puma Uta</h3>
                    <p>Puno desde las alturas</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Cultura — Bento Grid
     ==================================================== -->
<section class="ph-section ph-bento-section">
    <div class="container">
        <div class="ph-section-header">
            <span class="ph-label">🎭 Cultura Viva</span>
            <h2>Folklore que <em>hipnotiza</em></h2>
        </div>
        <div class="ph-bento">
            <!-- Card Grande — Candelaria -->
            <div class="ph-bento-card ph-bento-big" style="background: linear-gradient(to top, rgba(60,5,30,0.82) 0%, rgba(196,20,90,0.35) 60%, rgba(0,0,0,0.1) 100%), url('<?php echo URLROOT; ?>/img/puno/candelaria.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-tag">🏆 La más grande</span>
                    <h3>Virgen de la Candelaria</h3>
                    <p>40,000 danzantes · 18 días · Patrimonio UNESCO</p>
                </div>
            </div>
            <!-- Card Caporal -->
            <div class="ph-bento-card" style="background: linear-gradient(to top, rgba(40,10,90,0.85) 0%, rgba(109,40,217,0.35) 60%, rgba(0,0,0,0.08) 100%), url('<?php echo URLROOT; ?>/img/puno/caporal.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-icon">🎭</span>
                    <h3>El Caporal</h3>
                    <p>El folklore que más representa a Puno ante el mundo.</p>
                </div>
            </div>
            <!-- Card Textil -->
            <div class="ph-bento-card" style="background: linear-gradient(to top, rgba(4,50,65,0.85) 0%, rgba(14,116,144,0.35) 60%, rgba(0,0,0,0.08) 100%), url('<?php echo URLROOT; ?>/img/puno/textiles.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-icon">🧶</span>
                    <h3>Textiles Andinos</h3>
                    <p>Cada hilo cuenta la historia de siglos de cultura viva.</p>
                </div>
            </div>
            <!-- Card Gastronomía -->
            <div class="ph-bento-card" style="background: linear-gradient(to top, rgba(80,30,0,0.85) 0%, rgba(180,83,9,0.35) 60%, rgba(0,0,0,0.08) 100%), url('<?php echo URLROOT; ?>/img/puno/comida.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-icon">🍽</span>
                    <h3>Sabores del Altiplano</h3>
                    <p>Trucha del Titicaca, Quinua real y Chuño ancestral.</p>
                </div>
            </div>
            <!-- Card Naturaleza -->
            <div class="ph-bento-card ph-bento-wide" style="background: linear-gradient(to top, rgba(4,50,45,0.85) 0%, rgba(15,118,110,0.35) 60%, rgba(0,0,0,0.08) 100%), url('<?php echo URLROOT; ?>/img/puno/fauna.jpg') center/cover no-repeat;">
                <div class="ph-bento-content">
                    <span class="ph-bento-icon">🦙</span>
                    <h3>Fauna &amp; Biodiversidad Andina</h3>
                    <p>Flamencos rosados, vicuñas, totoras y el pez carachi del Titicaca.</p>
                    <div style="display:flex;gap:1rem;margin-top:1rem;flex-wrap:wrap;">
                        <span class="ph-bento-pill">🦩 Flamencos</span>
                        <span class="ph-bento-pill">🦙 Vicuñas</span>
                        <span class="ph-bento-pill">🐟 Pez Carachi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Videos de Danzas — Cinema Dark
     ==================================================== -->
<section class="ph-cinema-section" id="videos">
    <div class="container">
        <div class="ph-section-header ph-light-header">
            <span class="ph-label ph-label-gold">🎬 YouTube · Danzas &amp; Cultura</span>
            <h2 style="color:white;">Vívelo antes de <em>llegar</em></h2>
            <p style="color:rgba(255,255,255,0.5);font-size:1rem;max-width:500px;margin:0 auto;">Sumérgete en los colores, la música y la energía de Puno con estos videos.</p>
        </div>

        <!-- VIDEO DESTACADO -->
        <div class="ph-video-featured">
            <div class="ph-video-frame">
                <!-- Video 1: Candelaria -->
                <iframe src="https://www.youtube.com/embed/QsDIsJg5tZg" title="Virgen de la Candelaria" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="ph-video-featured-info">
                <span class="ph-label ph-label-gold">🏆 Festival Principal</span>
                <h3>Virgen de la Candelaria</h3>
                <p>La festividad más grande de América Latina. Un espectáculo de colores, máscaras y ritmo que debes vivir en persona.</p>
            </div>
        </div>

        <!-- GRID DE VIDEOS SECUNDARIOS -->
        <div class="ph-video-grid">
            <div class="ph-video-card">
                <div class="ph-video-thumb">
                    <!-- Video 2: Diablada Puneña -->
                    <iframe src="https://www.youtube.com/embed/a5UFc19fBcs" title="Diablada Puneña" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="ph-video-meta">
                    <span>🎭 Danza Ritual</span>
                    <h4>La Diablada Puneña</h4>
                </div>
            </div>
            <div class="ph-video-card">
                <div class="ph-video-thumb">
                    <!-- Video 3: Lago Titicaca -->
                    <iframe src="https://www.youtube.com/embed/c7n87kqbqaQ" title="Lago Titicaca" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="ph-video-meta">
                    <span>🌊 Naturaleza</span>
                    <h4>Lago Titicaca Desde el Cielo</h4>
                </div>
            </div>
            <div class="ph-video-card">
                <div class="ph-video-thumb">
                    <!-- Video 4: Folklore Puno -->
                    <iframe src="https://www.youtube.com/embed/sC-Nr3gUtZA" title="Folklore Puno" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="ph-video-meta">
                    <span>💃 Folklore</span>
                    <h4>300 Danzas del Altiplano</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     SECCIÓN: Circuito Sur Andino — Visual + Mapa
     ==================================================== -->
<section class="ph-section ph-circuit-section" id="circuito">
    <div class="container">
        <div class="ph-section-header">
            <span class="ph-label">🗺 Circuito Sur Andino</span>
            <h2>El Viaje más <em>Épico</em> del Perú</h2>
            <p class="ph-desc">Aprovecha el congreso y recorre los destinos más increíbles de Sudamérica en un solo viaje.</p>
        </div>

        <div class="ph-circuit-layout">
            <!-- Paradas visuales -->
            <div class="ph-stops">
                <div class="ph-stop-card">
                    <div class="ph-stop-num" style="background:#e07b39;">01</div>
                    <div class="ph-stop-body">
                        <h4>Arequipa <span class="ph-km">5h · Bus</span></h4>
                        <p>Ciudad Blanca, Cañón del Colca &amp; volcanes majestuosos.</p>
                        <div class="ph-stop-icons">🏛 💎 🌋</div>
                    </div>
                </div>
                <div class="ph-stop-arrow">↓</div>

                <div class="ph-stop-card ph-stop-highlight">
                    <div class="ph-stop-num" style="background:#E74C74;">02</div>
                    <div class="ph-stop-body">
                        <h4>Puno <span class="ph-badge-onta">ONTA 2026</span></h4>
                        <p>Lago Titicaca, Islas flotantes de los Uros, Folklore Patrimonio UNESCO.</p>
                        <div class="ph-stop-icons">🌊 🎭 🔬</div>
                    </div>
                </div>
                <div class="ph-stop-arrow">↓</div>

                <div class="ph-stop-card">
                    <div class="ph-stop-num" style="background:#7c3aed;">03</div>
                    <div class="ph-stop-body">
                        <h4>Cusco <span class="ph-km">6h · Tren/Bus</span></h4>
                        <p>Capital del Imperio Inca, Sacsayhuamán &amp; Valle Sagrado.</p>
                        <div class="ph-stop-icons">🏯 ⛰️ 🌿</div>
                    </div>
                </div>
                <div class="ph-stop-arrow">↓</div>

                <div class="ph-stop-card">
                    <div class="ph-stop-num" style="background:#0e7490;">04</div>
                    <div class="ph-stop-body">
                        <h4>Machu Picchu <span class="ph-km">4h · Tren</span></h4>
                        <p>La 8va Maravilla del Mundo. La ciudadela inca entre las nubes.</p>
                        <div class="ph-stop-icons">🏔️ ✨ 🌎</div>
                    </div>
                </div>
            </div>

            <!-- Mapa -->
            <div class="ph-map-container">
                <div class="ph-map-badge">Ruta interactiva · 1,200 km</div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m30!1m8!1m3!1d2448924.8516510795!2d-72.3145185!3d-14.9620779!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0x91424a487785b9b3:0xa3c4a612b9942036!2sArequipa!3m2!1d-16.4057001!2d-71.5400994!4m5!1s0x915d6985f4e74135:0x1e341dd8f24d32cf!2sPuno!3m2!1d-15.8402218!2d-70.0218805!4m5!1s0x916dd5d826598431:0x2aa996cc2318315d!2sCusco!3m2!1d-13.53195!2d-71.96746259999999!5e1!3m2!1ses!2spe!4v1773332928478!5m2!1ses!2spe"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Circuito Sur Andino - Arequipa Puno Cusco">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- ====================================================
     CTA FINAL — Inmersivo
     ==================================================== -->
<section class="ph-final-cta">
    <div class="ph-cta-bg" style="background-image: url('<?php echo URLROOT; ?>/img/puno/titicaca.jpg');"></div>
    <div class="ph-cta-overlay"></div>
    <div class="ph-cta-body">
        <div class="ph-cta-eyebrow">
            <span class="ph-dot-live"></span>
            Inscripciones Abiertas · ONTA 2026 · Puno, Perú
        </div>
        <h2 class="ph-cta-h2">Ciencia en el <em>techo del mundo</em></h2>
        <p class="ph-cta-p">Un congreso. Una cultura. Una experiencia que no se olvida.</p>
        <div class="ph-cta-buttons">
            <a href="<?php echo URLROOT; ?>/inscriptions" class="ph-cta-btn-primary">
                <i class="fa-solid fa-user-plus"></i> Inscribirse al ONTA 2026
            </a>
            <a href="<?php echo URLROOT; ?>/pages/programacion" class="ph-cta-btn-ghost">
                <i class="fa-solid fa-calendar-days"></i> Ver Programación
            </a>
        </div>
        <!-- Indicadores de confianza -->
        <div class="ph-trust-row">
            <div class="ph-trust-item"><i class="fa-solid fa-earth-americas"></i><span>+20 países</span></div>
            <div class="ph-trust-div"></div>
            <div class="ph-trust-item"><i class="fa-solid fa-users-between-lines"></i><span>+500 científicos</span></div>
            <div class="ph-trust-div"></div>
            <div class="ph-trust-item"><i class="fa-solid fa-award"></i><span>56ª Edición</span></div>
        </div>
    </div>
</section>

<!-- ====================================================
     CSS PREMIUM — EXPLORA PUNO v2
     ==================================================== -->
<style>
/* -- Variables ----------------------------------------- */
:root {
    --ph-gold:   #DEB05A;
    --ph-pink:   #E74C74;
    --ph-dark:   #0d0b18;
    --ph-indigo: #1a1625;
    --ph-glass:  rgba(255,255,255,0.04);
    --ph-border: rgba(255,255,255,0.08);
}

/* -- Hero Cinematográfico ------------------------------ */
.ph-hero {
    height: 100vh;
    min-height: 600px;
    position: relative;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}

.ph-hero-bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    transform: scale(1.05);
    animation: heroZoom 20s ease-in-out infinite alternate;
}

@keyframes heroZoom {
    from { transform: scale(1.05); }
    to   { transform: scale(1.12); }
}

.ph-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(10,8,20,0.97) 0%,
        rgba(10,8,20,0.55) 50%,
        rgba(10,8,20,0.2) 100%
    );
}

.ph-hero-content {
    position: relative;
    z-index: 10;
    padding: 0 6vw 6rem;
    max-width: 900px;
}

.ph-hero-eyebrow {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    color: rgba(255,255,255,0.6);
    font-size: 0.85rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 1.5rem;
}

.ph-dot-live {
    width: 8px; height: 8px;
    background: #4afe98;
    border-radius: 50%;
    box-shadow: 0 0 10px #4afe98;
    animation: livePulse 1.5s infinite;
}

@keyframes livePulse {
    0%,100% { opacity: 1; }
    50%      { opacity: 0.3; }
}

.ph-hero-h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(4rem, 11vw, 9rem);
    color: white;
    line-height: 0.9;
    margin-bottom: 1.5rem;
    letter-spacing: -3px;
}

.ph-hero-h1 em {
    color: var(--ph-gold);
    font-style: italic;
}

.ph-hero-sub {
    font-size: clamp(1rem, 2vw, 1.3rem);
    color: rgba(255,255,255,0.65);
    margin-bottom: 2rem;
    font-weight: 300;
}

.ph-hero-pills {
    display: flex;
    gap: 0.8rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.ph-hero-pills span {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    color: rgba(255,255,255,0.8);
    padding: 0.5rem 1.2rem;
    border-radius: 100px;
    font-size: 0.85rem;
    font-weight: 500;
    backdrop-filter: blur(8px);
}

.ph-scroll-cta {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    color: white;
    text-decoration: none;
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.ph-scroll-ring {
    width: 48px; height: 48px;
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    animation: bounceDown 2s infinite;
}

@keyframes bounceDown {
    0%,100% { transform: translateY(0); }
    50%      { transform: translateY(8px); }
}

.ph-hero-numbers {
    position: absolute;
    bottom: 5rem;
    right: 5vw;
    z-index: 10;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 1.5rem;
}

.ph-num {
    text-align: right;
}

.ph-num strong {
    display: block;
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--ph-gold);
    line-height: 1;
}

.ph-num span {
    display: block;
    font-size: 0.72rem;
    color: rgba(255,255,255,0.45);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* -- Galería Inmersiva ---------------------------------- */
.ph-gallery-section {
    background: #000;
}

.ph-gallery-header {
    padding: 5rem 5vw 3rem;
    color: white;
}

.ph-gallery-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 5vw, 4rem);
    color: white;
    line-height: 1.1;
    margin-top: 0.8rem;
}

.ph-gallery-header h2 em { color: var(--ph-gold); font-style: italic; }

.ph-masonry {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr;
    gap: 4px;
    height: 70vh;
    min-height: 500px;
}

.ph-photo-tall { grid-row: span 2; }

.ph-photo-col {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.ph-photo {
    position: relative;
    overflow: hidden;
    flex: 1;
    cursor: pointer;
}

.ph-photo img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.4,0,0.2,1);
    display: block;
}

.ph-photo:hover img { transform: scale(1.08); }

.ph-photo-caption {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    padding: 1.5rem;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 100%);
    transform: translateY(100%);
    transition: transform 0.4s ease;
}

.ph-photo:hover .ph-photo-caption { transform: translateY(0); }

.ph-photo-caption h3 {
    color: white;
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    margin-bottom: 0.3rem;
}

.ph-photo-caption p { color: rgba(255,255,255,0.7); font-size: 0.85rem; }

/* -- Labels y helpers ---------------------------------- */
.ph-label {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(222,176,90,0.12);
    border: 1px solid rgba(222,176,90,0.25);
    color: var(--ph-gold);
    padding: 0.4rem 1rem;
    border-radius: 100px;
    font-size: 0.72rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
}

.ph-label-gold { background: rgba(222,176,90,0.18); }

/* -- Sections Base ------------------------------------- */
.ph-section { padding: 7rem 0; }

.ph-section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.ph-section-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 4vw, 3.2rem);
    color: var(--ph-indigo);
    margin: 1rem 0 0.5rem;
    line-height: 1.15;
}

.ph-section-header h2 em { color: var(--ph-pink); font-style: italic; }

.ph-desc {
    color: #888;
    font-size: 1rem;
    max-width: 520px;
    margin: 0 auto;
    line-height: 1.6;
}

.ph-light-header h2 em { color: var(--ph-gold); }
.ph-light-header h2 { color: white; }

/* -- Bento Grid Cultura -------------------------------- */
.ph-bento-section { background: #f7f7f9; }

.ph-bento {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: auto auto;
    gap: 1rem;
}

.ph-bento-card {
    border-radius: 20px;
    padding: 2.5rem 2rem;
    min-height: 220px;
    display: flex;
    align-items: flex-end;
    transition: transform 0.4s ease;
    overflow: hidden;
    position: relative;
}

.ph-bento-card:hover { transform: scale(1.02); }

.ph-bento-big {
    grid-column: span 2;
    grid-row: span 2;
    min-height: 460px;
    align-items: flex-end;
}

.ph-bento-wide { grid-column: span 2; }

.ph-bento-content { position: relative; z-index: 2; }

.ph-bento-tag {
    display: inline-block;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 100px;
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.8rem;
}

.ph-bento-icon {
    display: block;
    font-size: 2.5rem;
    margin-bottom: 0.8rem;
}

.ph-bento-content h3 {
    font-family: 'Playfair Display', serif;
    color: white;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    line-height: 1.2;
}

.ph-bento-big h3 { font-size: 2.2rem; }

.ph-bento-content p { color: rgba(255,255,255,0.7); font-size: 0.9rem; line-height: 1.4; }

.ph-bento-pill {
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    padding: 0.25rem 0.7rem;
    border-radius: 100px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* -- Cinema Videos ------------------------------------- */
.ph-cinema-section {
    background: var(--ph-dark);
    padding: 7rem 0;
    position: relative;
    overflow: hidden;
}

.ph-cinema-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(222,176,90,0.04) 1px, transparent 1px);
    background-size: 28px 28px;
}

.ph-video-featured {
    display: grid;
    grid-template-columns: 1.6fr 1fr;
    gap: 2.5rem;
    align-items: center;
    margin-bottom: 2rem;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 24px;
    overflow: hidden;
    position: relative;
}

.ph-video-frame {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
}

.ph-video-frame iframe {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
}

.ph-video-featured-info {
    padding: 3rem 3rem 3rem 0;
}

.ph-video-featured-info h3 {
    font-family: 'Playfair Display', serif;
    color: white;
    font-size: 2rem;
    margin: 1rem 0 0.8rem;
    line-height: 1.2;
}

.ph-video-featured-info p { color: rgba(255,255,255,0.55); font-size: 1rem; line-height: 1.6; }

.ph-video-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.ph-video-card {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.ph-video-card:hover { transform: scale(1.03); }

.ph-video-thumb {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    background: #000;
}

.ph-video-thumb iframe {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
}

.ph-video-meta {
    padding: 1rem 1.2rem;
}

.ph-video-meta span {
    font-size: 0.72rem;
    font-weight: 800;
    color: var(--ph-gold);
    display: block;
    margin-bottom: 0.35rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.ph-video-meta h4 { color: white; font-size: 0.95rem; font-weight: 700; line-height: 1.3; }

/* -- Circuit Section ----------------------------------- */
.ph-circuit-section { background: white; }

.ph-circuit-layout {
    display: grid;
    grid-template-columns: 0.7fr 1fr;
    gap: 3rem;
    align-items: start;
}

.ph-stops { display: flex; flex-direction: column; }

.ph-stop-card {
    display: flex;
    align-items: flex-start;
    gap: 1.2rem;
    padding: 1.2rem;
    border-radius: 16px;
    transition: background 0.3s ease;
}

.ph-stop-card:hover { background: #f7f7f9; }

.ph-stop-highlight {
    background: #fff0f4;
    border: 1.5px solid rgba(231,76,116,0.2);
}

.ph-stop-num {
    width: 42px; height: 42px;
    min-width: 42px;
    border-radius: 12px;
    color: white;
    font-weight: 900;
    font-size: 1rem;
    display: flex; align-items: center; justify-content: center;
}

.ph-stop-body h4 {
    font-weight: 700;
    font-size: 1rem;
    color: var(--ph-indigo);
    margin-bottom: 0.3rem;
    display: flex;
    align-items: center;
    gap: 0.6rem;
    flex-wrap: wrap;
}

.ph-stop-body p { color: #777; font-size: 0.85rem; line-height: 1.4; margin-bottom: 0.5rem; }

.ph-stop-icons { font-size: 1.3rem; }

.ph-km {
    font-size: 0.65rem;
    font-weight: 700;
    background: #f0f0f0;
    color: #888;
    padding: 0.2rem 0.6rem;
    border-radius: 100px;
    font-style: normal;
}

.ph-badge-onta {
    font-size: 0.6rem;
    font-weight: 900;
    background: var(--ph-pink);
    color: white;
    padding: 0.2rem 0.7rem;
    border-radius: 100px;
    letter-spacing: 0.3px;
    font-style: normal;
}

.ph-stop-arrow {
    padding: 0 0 0 20px;
    color: #ddd;
    font-size: 1.2rem;
    font-weight: 900;
}

.ph-map-container {
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 30px 60px rgba(0,0,0,0.12);
    border: 1px solid #f0f0f0;
    height: 480px;
    position: relative;
    position: sticky;
    top: 100px;
}

.ph-map-badge {
    position: absolute;
    top: 12px; left: 12px;
    z-index: 99;
    background: rgba(26,22,37,0.92);
    color: var(--ph-gold);
    padding: 0.5rem 1rem;
    border-radius: 100px;
    font-size: 0.72rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    backdrop-filter: blur(8px);
}

.ph-map-container iframe {
    width: 100%; height: 100%;
    border: none;
}

/* -- CTA Final ----------------------------------------- */
.ph-final-cta {
    position: relative;
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    text-align: center;
}

.ph-cta-bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    animation: heroZoom 20s ease-in-out infinite alternate-reverse;
}

.ph-cta-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(10,8,20,0.7) 0%, rgba(10,8,20,0.88) 100%);
}

.ph-cta-body {
    position: relative;
    z-index: 10;
    padding: 6rem 2rem;
    max-width: 700px;
}

.ph-cta-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    color: rgba(255,255,255,0.5);
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 1.5rem;
}

.ph-cta-h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 6vw, 5rem);
    color: white;
    line-height: 1.05;
    letter-spacing: -2px;
    margin-bottom: 1.5rem;
}

.ph-cta-h2 em { color: var(--ph-gold); font-style: italic; }

.ph-cta-p { color: rgba(255,255,255,0.55); font-size: 1.1rem; margin-bottom: 3rem; }

.ph-cta-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 3rem;
}

.ph-cta-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    background: var(--ph-pink);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 14px;
    font-weight: 800;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 15px 30px rgba(231,76,116,0.35);
}

.ph-cta-btn-primary:hover {
    background: #d4365a;
    transform: translateY(-5px);
    box-shadow: 0 25px 45px rgba(231,76,116,0.45);
}

.ph-cta-btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 14px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.ph-cta-btn-ghost:hover {
    border-color: rgba(255,255,255,0.5);
    background: rgba(255,255,255,0.08);
    transform: translateY(-5px);
}

.ph-trust-row {
    display: inline-flex;
    align-items: center;
    gap: 2rem;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.08);
    padding: 1rem 2rem;
    border-radius: 100px;
    backdrop-filter: blur(10px);
}

.ph-trust-item {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    font-size: 0.85rem;
    font-weight: 600;
    color: rgba(255,255,255,0.75);
}

.ph-trust-item i { color: var(--ph-gold); }

.ph-trust-div { width: 1px; height: 20px; background: rgba(255,255,255,0.12); }

/* -- Responsive ---------------------------------------- */
@media (max-width: 1200px) {
    .ph-bento { grid-template-columns: repeat(2, 1fr); }
    .ph-bento-big { grid-row: span 1; min-height: 280px; }
}

@media (max-width: 900px) {
    .ph-masonry { grid-template-columns: 1fr 1fr; height: auto; }
    .ph-photo-tall { grid-row: span 1; min-height: 250px; }
    .ph-photo-col { display: contents; }
    .ph-photo { min-height: 220px; }
    .ph-video-featured { grid-template-columns: 1fr; }
    .ph-video-featured-info { padding: 1.5rem 2rem 2rem; }
    .ph-video-grid { grid-template-columns: 1fr 1fr; }
    .ph-circuit-layout { grid-template-columns: 1fr; }
    .ph-map-container { height: 350px; position: relative; top: 0; }
    .ph-hero-numbers { display: none; }
}

@media (max-width: 600px) {
    .ph-masonry { grid-template-columns: 1fr; height: auto; }
    .ph-video-grid { grid-template-columns: 1fr; }
    .ph-bento { grid-template-columns: 1fr; }
    .ph-bento-big { grid-column: span 1; }
    .ph-bento-wide { grid-column: span 1; }
    .ph-trust-row { flex-direction: column; gap: 1rem; border-radius: 20px; }
    .ph-trust-div { width: 40px; height: 1px; }
}
</style>

<?php require APPROOT . '/views/inc/footer.php'; ?>
