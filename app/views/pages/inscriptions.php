<?php

$hasRegError = isset($_SESSION['register_error']);
require APPROOT . '/views/inc/header.php';

?>

<section class="comite-hero" style="background-image: linear-gradient(rgba(26, 22, 37, 0.7), rgba(26, 22, 37, 0.7)), url('<?php echo URLROOT; ?>/img/portadas/inscripciones.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <header class="comite-header">
            <span class="comite-badge"><?php echo _t('inscriptions.page_badge'); ?></span>
            <h1 class="section-title"><?php echo _t('inscriptions.page_title'); ?></h1>
            <p class="comite-intro"><?php echo _t('inscriptions.page_intro'); ?></p>
        </header>
        <div class="comite-stats">
            <div class="comite-stat">
                <span class="comite-stat-num">3</span>
                <span class="comite-stat-label"><?php echo _t('inscriptions.stat_categories'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">6</span>
                <span class="comite-stat-label"><?php echo _t('inscriptions.stat_periods'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">$300</span>
                <span class="comite-stat-label"><?php echo _t('inscriptions.stat_from'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">500+</span>
                <span class="comite-stat-label"><?php echo _t('inscriptions.stat_attendees'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Convocatoria Científica e Inscripción Premium Evolution -->
<section class="scientific-premium-section">
    <div class="registration-background-texture"></div>
    <div class="container relative z-10">
        <div class="master-card-evolution">
            
            <!-- Cabecera Ultra-Compacta -->
            <div class="header-premium-dark">
                <div class="header-inner-content">
                    <div class="badge-container">
                        <span class="premium-flair-badge">
                            <i class="fa-solid fa-microscope"></i>
                            <span>Portal ONTA 2026</span>
                        </span>
                    </div>
                    <div class="title-meta-wrap">
                        <h2 class="hero-title-serif">Vanguardia e Investigación <span class="gold-text-gradient">Sin Fronteras</span></h2>
                        <div class="header-meta">
                            <div class="meta-item active-tag">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>Pre-registro Activo</span>
                            </div>
                            <div class="meta-item defer-tag">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <span>Pago Diferido</span>
                            </div>
                        </div>
                    </div>
                    <p class="hero-description">
                        Registro abierto para <span class="highlight-free">Inscripción Libre</span>. 
                        Asegura tu cupo hoy; el pago se habilitará en la etapa de confirmación final.
                    </p>
                </div>
            </div>

            <!-- Cuerpo del Módulo: Arquitectura de Información Refinada -->
            <div class="master-body-layout">
                
                <!-- Timeline: El Viaje del Participante -->
                <div class="journey-column">
                    <h3 class="journey-title">Mapa de Participación</h3>
                    
                    <div class="journey-timeline">
                        <!-- Nodo 01 -->
                        <div class="journey-node animated-step-1">
                            <div class="node-numeric">01</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4>Identidad Digital</h4>
                                    <span class="status-tag tag-free">OBLIGATORIO</span>
                                </div>
                                <p>Crea tu acceso único al ecosistema ONTA para gestionar tu asistencia. <strong>Sin costo inicial.</strong></p>
                            </div>
                        </div>

                        <!-- Nodo 02 -->
                        <div class="journey-node animated-step-2">
                            <div class="node-numeric">02</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4>Contribución Científica</h4>
                                    <span class="status-tag tag-opt">Opcional</span>
                                </div>
                                <p>Carga tu Abstract si deseas participar en los sub-eventos. Un comité evaluará tu propuesta técnica.</p>
                            </div>
                        </div>

                        <!-- Nodo 03 -->
                        <div class="journey-node animated-step-3">
                            <div class="node-numeric">03</div>
                            <div class="node-info-box">
                                <div class="node-header">
                                    <h4>Confirmación de Asistencia</h4>
                                    <span class="status-tag tag-soon">Posterior</span>
                                </div>
                                <p>La pasarela de pago se habilitará próximamente para reservar tu cupo físico y kits del congreso.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Portal de Acción Compacto -->
                <div class="portal-cta-column">
                    <div class="glass-portal-card">
                        <div class="portal-content">
                            <div class="portal-icon-box-mini">
                                <i class="fa-solid fa-fingerprint"></i>
                            </div>
                            <h3>Acceso al Ecosistema</h3>
                            <p>Gestiona documentos y certificados en una sola plataforma diseñada para científicos.</p>
                            
                            <button class="btn-royal-action open-registration-modal">
                                <span class="btn-main-txt">INSCRIBIRSE AHORA</span>
                                <div class="btn-aura"></div>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
/* 
   SCIENTIFIC PREMIUM EVOLUTION - CSS 
   Concepto: "Elegancia Académica y Minimalismo Tecnológico"
*/

:root {
    --p-indigo: #1a1625;
    --p-purple: #2d2440;
    --p-gold: #DEB05A;
    --p-pink: #E74C74;
    --p-text-dim: rgba(255,255,255,0.7);
    --p-shadow: 0 40px 100px -20px rgba(0,0,0,0.15);
}

.scientific-premium-section {
    padding: 4rem 0; /* Achatado */
    background-color: #fcfcfd;
    position: relative;
    overflow: hidden;
}

.registration-background-texture {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background-image: radial-gradient(#2d2440 0.5px, transparent 0.5px);
    background-size: 30px 30px;
    opacity: 0.03;
    pointer-events: none;
}

/* Master Card Logic */
.master-card-evolution {
    background: #fff;
    border-radius: 40px; /* Reducido para compactar */
    box-shadow: var(--p-shadow);
    overflow: hidden;
    position: relative;
    border: 1px solid rgba(0,0,0,0.03);
}

/* Header Evolution Ultra Compact */
.header-premium-dark {
    background: var(--p-indigo);
    padding: 2.5rem 4rem; /* Más achatado */
    color: white;
    position: relative;
    overflow: hidden;
    border-bottom: 3px solid var(--p-gold);
}

.title-meta-wrap {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
    margin-bottom: 0.5rem;
}

.header-premium-dark::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(45deg, rgba(231, 76, 116, 0.05) 0%, transparent 70%);
}

.badge-container { margin-bottom: 0.8rem; }

.premium-flair-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    background: rgba(255,255,255,0.05);
    padding: 0.4rem 1rem;
    border-radius: 100px;
    font-size: 0.65rem;
    font-weight: 800;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    border: 1px solid rgba(255,255,255,0.1);
    color: var(--p-gold);
}

.hero-title-serif {
    font-family: 'Playfair Display', "Marcellus", serif;
    font-size: 2.2rem; /* Más pequeño */
    line-height: 1.2;
    margin: 0;
    letter-spacing: -0.5px;
}

.gold-text-gradient {
    background: linear-gradient(135deg, #DEB05A, #F3D9A1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-description {
    font-size: 1.1rem; /* Compactado */
    line-height: 1.4;
    max-width: 650px;
    color: var(--p-text-dim);
    margin-top: 0.5rem;
}

.highlight-free {
    color: white;
    font-weight: 700;
    background: rgba(231,76,116,0.25);
    padding: 1px 6px;
    border-radius: 4px;
}

.header-meta {
    display: flex;
    gap: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.05);
}

.active-tag { color: #4ade80; border-color: rgba(74, 222, 128, 0.2); }
.defer-tag { color: var(--p-gold); border-color: rgba(222, 176, 90, 0.2); }

/* Master Body Compact */
.master-body-layout {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 3rem;
    padding: 2.5rem 4rem; /* Achatado */
}

.journey-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    color: var(--p-indigo);
    margin-bottom: 2rem;
    position: relative;
    padding-left: 1.2rem;
}

.journey-title::before {
    content: ''; position: absolute; left: 0; top: 50%; transform: translateY(-50%);
    width: 4px; height: 25px; background: var(--p-pink); border-radius: 2px;
}

/* Timeline Evolution */
.journey-timeline { position: relative; }
.journey-node {
    display: flex;
    gap: 2rem;
    padding-bottom: 2rem; /* Compacto */
    position: relative;
}

.journey-node:last-child { padding-bottom: 0; }
.journey-node::before {
    content: ''; position: absolute; left: 22px; top: 50px;
    width: 1px; height: calc(100% - 50px);
    background: #eee;
}

.node-numeric {
    width: 45px; height: 45px; /* Más pequeño */
    background: #fff;
    border: 1px solid #eee;
    display: flex; align-items: center; justify-content: center;
    border-radius: 12px;
    font-weight: 900;
    font-size: 0.9rem;
    color: #bbb;
    z-index: 2;
}

.node-info-box h4 { font-size: 1.1rem; font-weight: 700; color: var(--p-indigo); margin-bottom: 0.3rem; transition: color 0.5s ease; }
.node-info-box p { color: #666; font-size: 0.95rem; line-height: 1.4; }

/* Animación Dinámica del Timeline */
@keyframes stepHighlight {
    0%, 30% { border-color: var(--p-pink); color: var(--p-pink); transform: scale(1.15); box-shadow: 0 5px 15px rgba(231,76,116,0.2); }
    33%, 100% { border-color: #eee; color: #bbb; transform: scale(1); box-shadow: none; }
}

@keyframes textHighlight {
    0%, 30% { color: var(--p-pink); }
    33%, 100% { color: var(--p-indigo); }
}

.animated-step-1 .node-numeric { animation: stepHighlight 9s infinite; }
.animated-step-1 h4 { animation: textHighlight 9s infinite; }

.animated-step-2 .node-numeric { animation: stepHighlight 9s infinite 3s; }
.animated-step-2 h4 { animation: textHighlight 9s infinite 3s; }

.animated-step-3 .node-numeric { animation: stepHighlight 9s infinite 6s; }
.animated-step-3 h4 { animation: textHighlight 9s infinite 6s; }

.status-tag {
    padding: 0.3rem 0.9rem; border-radius: 100px; font-size: 0.65rem; font-weight: 900; text-transform: uppercase;
}
.tag-free { background: #f0fdf4; color: #16a34a; }
.tag-opt { background: #eff6ff; color: #2563eb; }
.tag-soon { background: #fafafa; color: #999; border: 1px solid #eee; }

.journey-node.step-completed .node-numeric { border-color: var(--p-pink); color: var(--p-pink); box-shadow: 0 10px 20px rgba(231,76,116,0.1); }
.journey-node.step-optional .node-numeric { border-style: dashed; }
.journey-node p { color: #666; font-size: 1.05rem; line-height: 1.5; }

/* Portal CTA Compact */
.glass-portal-card {
    background: #fdfdfd;
    border-radius: 30px;
    padding: 2.5rem 3rem; /* Más pequeño */
    text-align: center;
    border: 1px solid rgba(0,0,0,0.04);
}

.portal-icon-box-mini {
    width: 70px; height: 70px;
    background: var(--p-indigo);
    color: white;
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.8rem;
    margin: 0 auto 1.5rem;
    box-shadow: 0 10px 20px rgba(26,22,37,0.1);
}

.portal-content h3 { font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 0.8rem; color: var(--p-indigo); }
.portal-content p { color: #777; font-size: 0.95rem; margin-bottom: 2rem; line-height: 1.5; }

/* New Royal Action Button - Improved */
.btn-royal-action {
    width: 100%;
    background: var(--p-indigo);
    color: white;
    border: none;
    padding: 1.2rem 2rem;
    border-radius: 16px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 15px 30px -5px rgba(26,22,37,0.4);
}

.btn-royal-action .btn-main-txt {
    display: block;
    font-weight: 900;
    font-size: 1.2rem;
    letter-spacing: 2px;
    position: relative; z-index: 2;
}

.btn-royal-action .btn-sub-txt {
    display: block;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    opacity: 0.7;
    margin-top: 4px;
    position: relative; z-index: 2;
}

.btn-aura {
    position: absolute;
    top: 50%; left: 50%; width: 0; height: 0;
    background: radial-gradient(circle, rgba(231, 76, 116, 0.4) 0%, transparent 70%);
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
    z-index: 1;
}

.btn-royal-action:hover {
    transform: translateY(-5px);
    background: var(--p-pink); /* Rosa Sólido */
    color: white;
    box-shadow: 0 25px 50px -10px rgba(231, 76, 116, 0.4);
}

.btn-royal-action:hover .btn-main-txt,
.btn-royal-action:hover .btn-sub-txt {
    color: white;
}

.btn-royal-action::after {
    content: '';
    position: absolute;
    top: 0; left: -100%; width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
    transition: left 0.5s ease;
}

.btn-royal-action:hover::after { left: 100%; }

/* Responsive Evolution */
@media (max-width: 1200px) {
    .header-premium-dark { padding: 4rem; }
    .hero-title-serif { font-size: 3rem; }
    .master-body-layout { padding: 4rem; grid-template-columns: 1fr; }
    .glass-portal-card { position: relative; top: 0; }
}

/* Google reCAPTCHA logic inside premium layout */
.g-recaptcha { margin: 1rem 0; transform-origin: left; transform: scale(0.9); }
@media (max-width: 768px) { .g-recaptcha { transform: scale(0.8); } }
</style>

<!-- Tarifas de Inscripción -->
<section class="comite-section comite-section-light">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('inscriptions.pricing_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('inscriptions.pricing_desc'); ?></p>
        </header>

        <div class="pricing-grid">
            <!-- Miembros ONTA -->
            <article class="pricing-card" style="border-top: 5px solid var(--pink);">
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--pink" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem;">
                        <i class="fa-solid fa-id-badge"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);">Miembros ONTA</h3>
                </div>
                
                <div class="pricing-options" style="flex: 1;">
                    <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <span style="display: block; font-size: 0.8rem; color: var(--pink); font-weight: 700; text-transform: uppercase;">Inscripción Temprana</span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;">Enero - Agosto</span>
                        <div class="amount"><span class="currency">$</span>550</div>
                    </div>
                    <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <span style="display: block; font-size: 0.8rem; color: var(--purple); font-weight: 700; text-transform: uppercase;">Inscripción Tardía</span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;">Agosto - Septiembre</span>
                        <div class="amount"><span class="currency">$</span>580</div>
                    </div>
                    <div>
                        <span style="display: block; font-size: 0.8rem; color: var(--coral); font-weight: 700; text-transform: uppercase;">Inscripción Completa</span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;">Después de Septiembre</span>
                        <div class="amount"><span class="currency">$</span>600</div>
                    </div>
                </div>
            </article>

            <!-- No Miembros ONTA -->
            <article class="pricing-card" style="border-top: 5px solid var(--purple);">
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--purple" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem;">
                        <i class="fa-solid fa-user-tag"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);">No Miembros ONTA</h3>
                </div>
                
                <div class="pricing-options" style="flex: 1;">
                    <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <span style="display: block; font-size: 0.8rem; color: var(--pink); font-weight: 700; text-transform: uppercase;">Inscripción Temprana</span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;">Enero - Agosto</span>
                        <div class="amount"><span class="currency">$</span>650</div>
                    </div>
                    <div style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <span style="display: block; font-size: 0.8rem; color: var(--purple); font-weight: 700; text-transform: uppercase;">Inscripción Tardía</span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;">Agosto - Septiembre</span>
                        <div class="amount"><span class="currency">$</span>680</div>
                    </div>
                    <div>
                        <span style="display: block; font-size: 0.8rem; color: var(--coral); font-weight: 700; text-transform: uppercase;">Inscripción Completa</span>
                        <span style="display: block; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.5rem;">Después de Septiembre</span>
                        <div class="amount"><span class="currency">$</span>700</div>
                    </div>
                </div>
            </article>

                        <!-- Inscripciones Nacionales -->
            <article class="pricing-card" style="border-top: 5px solid #0e7490;">
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--teal" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem;">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);">Inscripciones Nacionales</h3>
                </div>
                
                <div class="pricing-options" style="flex: 1; text-align: center; padding: 2rem 1rem;">
                    <p style="font-size: 1rem; color: var(--text-dark); margin-bottom: 1.5rem; line-height: 1.6;">
                        Para inscripciones nacionales comunicarse al:
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 1rem; align-items: center;">
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <a href="mailto:ontaperu@unap.edu.pe" style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-dark); text-decoration: none; font-size: 0.9rem;">
                                <i class="fa-solid fa-envelope"></i>
                                ontaperu@unap.edu.pe
                            </a>
                            <a href="mailto:ilima@unap.edu.pe" style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-dark); text-decoration: none; font-size: 0.9rem;">
                                <i class="fa-solid fa-envelope"></i>
                                ilima@unap.edu.pe
                            </a>
                            <a href="https://wa.me/51956838730" target="_blank" style="display: flex; align-items: center; gap: 0.8rem; color: var(--green); font-weight: 600; text-decoration: none; font-size: 0.95rem;">
                            <i class="fa-brands fa-whatsapp" style="font-size: 1.2rem;"></i>
                            WhatsApp 956838730
                        </a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Estudiantes Extranjeros -->
            <article class="pricing-card featured" style="border-top: 5px solid var(--yellow);">
                <div style="position: absolute; top: 15px; right: -30px; background: var(--yellow); color: var(--text-dark); padding: 5px 40px; transform: rotate(45deg); font-size: 0.7rem; font-weight: 700; text-transform: uppercase;">Especial</div>
                <div class="pricing-header" style="text-align: center; margin-bottom: 2rem;">
                    <div class="sci-icon-box sci-icon-box--yellow" style="width: 60px; height: 60px; margin: 0 auto 1.5rem; font-size: 1.5rem; background: var(--yellow); color: var(--text-dark);">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--text-dark);">Estudiantes Extranjeros</h3>
                </div>
                
                <div class="pricing-options" style="flex: 1; display: flex; flex-direction: column; justify-content: center; text-align: center;">
                    <div style="margin-bottom: 2rem;">
                        <span style="display: block; font-size: 1.1rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.5rem;">Precio Preferencial</span>
                        <div class="amount"><span class="currency">$</span>300<span class="asterisk">*</span></div>
                    </div>
                    <div style="padding: 1.25rem; background: var(--cream); border-radius: 12px; border: 1px dashed var(--yellow);">
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0; line-height: 1.5;">
                            <i class="fa-solid fa-circle-info" style="color: var(--yellow); margin-bottom: 0.5rem; display: block; font-size: 1.2rem;"></i> 
                            *Se debe adjuntar certificado de alumno regular. Dicho certificado se deberá enviar al correo <strong>ontarticulos@unap.edu.pe</strong>, con el asunto: <strong>Envío certificado alumno extranjero</strong>.
                        </p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Modal de Inscripción Unificado -->
<div id="registrationModal" class="sci-modal">
    <div class="sci-modal-content" id="modalMainContent" style="max-width: 650px; padding: 0; overflow: hidden; max-height: 95vh; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); border-radius: 32px; border: none; box-shadow: 0 30px 60px rgba(0,0,0,0.3);">
        <span class="sci-modal-close" onclick="closeRegModal('registrationModal')" style="z-index: 10; position: absolute; right: 25px; top: 20px;">&times;</span>
        
        <!-- VISTA 1: Selección de Opción -->
        <div id="selectionView" style="padding: 4rem 3rem; transition: opacity 0.3s ease;">
            <div class="sci-icon-box sci-icon-box--pink" style="width: 80px; height: 80px; margin: 0 auto 1.5rem; font-size: 2.5rem;">
                <i class="fa-solid fa-user-gear"></i>
            </div>
            <h2 style="font-family: var(--font-serif); color: var(--text-dark); margin-bottom: 1rem;">Acceso al Congreso</h2>
            <p style="color: var(--text-muted); margin-bottom: 2.5rem;">Para inscribirse en ONTA 2026, por favor elija una de las siguientes opciones:</p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div onclick="showRegisterView()" class="sci-option-card" style="cursor: pointer;">
                    <i class="fa-solid fa-user-plus"></i>
                    <h4>Nueva Cuenta</h4>
                    <p>Soy nuevo participante</p>
                </div>
                <a href="<?php echo URLROOT; ?>/users/login" class="sci-option-card login">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <h4>Ya tengo cuenta</h4>
                    <p>Acceder a mi panel</p>
                </a>
            </div>
        </div>

        <!-- VISTA 2: Formulario de Registro -->
        <div id="registerView" style="display: none; opacity: 0; transition: opacity 0.3s ease;">
            <div style="display: flex; min-height: 600px; text-align: left;">
                <!-- Left Side: Information -->
                <div class="auth-info-side" style="width: 35%; background: var(--purple); color: var(--white); padding: 3rem; display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                     <div style="position: absolute; top:0; left:0; width:100%; height:100%; opacity: 0.1; background-image: url('<?php echo URLROOT; ?>/img/logo_onta.png'); background-repeat: no-repeat; background-position: center; background-size: 80%;"></div>
                     <div style="position: relative; z-index: 2;">
                         <button onclick="showSelectionView()" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; margin-bottom: 2rem;">
                             <i class="fa-solid fa-arrow-left"></i>
                         </button>
                         <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA" style="width: 70px; height: auto; margin-bottom: 1.5rem; filter: brightness(0) invert(1);">
                         <h2 style="font-family: var(--font-serif); font-size: 2rem; line-height: 1.1; margin-bottom: 1rem;">Unete a la Ciencia</h2>
                         <p style="font-size: 0.9rem; opacity: 0.8; line-height: 1.6;">Forma parte de la 56ª Reunión Anual ONTA 2026. Al registrarte podrás gestionar tus abstractos, inscripciones y certificados.</p>
                         
                         <ul style="margin-top: 2rem; list-style: none; padding: 0;">
                             <li style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem; font-size: 0.85rem;">
                                 <i class="fa-solid fa-circle-check" style="color: var(--pink);"></i> Acceso a todas las ponencias
                             </li>
                             <li style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem; font-size: 0.85rem;">
                                 <i class="fa-solid fa-circle-check" style="color: var(--pink);"></i> Pódras subir tus abstracts    
                             </li>
                             <li style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem; font-size: 0.85rem;">
                                 <i class="fa-solid fa-circle-check" style="color: var(--pink);"></i> Networking científico
                             </li>
                         </ul>
                     </div>
                     
                     <div style="position: relative; z-index: 2; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1);">
                         <p style="font-size: 0.8rem; opacity: 0.6; margin-bottom: 0.5rem;">¿Ya tienes cuenta?</p>
                         <a href="<?php echo URLROOT; ?>/users/login" style="color: var(--pink); font-weight: 700; text-decoration: none; font-size: 0.9rem;">Inicia sesión aquí <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i></a>
                     </div>
                </div>

                <!-- Right Side: Form -->
                <div class="auth-form-side" style="width: 65%; background: var(--white); padding: 3rem; position: relative; overflow-y: auto; max-height: 95vh;">
                    <div style="margin-bottom: 2rem;">
                        <h2 style="font-family: var(--font-serif); color: var(--text-dark); margin-bottom: 0.4rem; font-size: 2rem;">Crear Cuenta</h2>
                        <p style="color: var(--text-muted); font-size: 0.95rem;">Registro rápido para el ONTA 2026</p>
                    </div>

                    <?php flash('register_error'); ?>

                    <form action="<?php echo URLROOT; ?>/users/register" method="post">
                        <?php echo csrf_field(); ?>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                            <div class="form-group" style="grid-column: span 2;">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Nombres y Apellidos Completos:</label>
                                <div style="position: relative;">
                                    <i class="fa-solid fa-user" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--peach); font-size: 0.9rem;"></i>
                                    <input type="text" name="name" required style="width: 100%; padding: 0.8rem 1rem 0.8rem 2.8rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="EJ: DR. JUAN PÉREZ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">DNI / ID:</label>
                                <input type="text" name="dni" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="DOCUMENTO IDENTIDAD">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;"><?php echo _t('login.category_label'); ?>:</label>
                                <div style="position: relative;">
                                    <select name="user_category" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); appearance: none; cursor: pointer; font-size: 0.9rem;">
                                        <option value="">SELECCIONA CATEGORÍA...</option>
                                        <option value="miembro_onta"><?php echo _t('login.type_miembro'); ?></option>
                                        <option value="no_miembro"><?php echo _t('login.type_no_miembro'); ?></option>
                                        <option value="extranjero"><?php echo _t('login.type_extranjero'); ?></option>
                                        <option value="nacional"><?php echo _t('login.type_nacional'); ?></option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-muted); pointer-events: none; font-size: 0.8rem;"></i>
                                </div>
                            </div>

                            <div class="form-group" style="grid-column: span 2;">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Institución / Universidad:</label>
                                <div style="position: relative;">
                                    <i class="fa-solid fa-building-columns" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--peach); font-size: 0.9rem;"></i>
                                    <input type="text" name="university" required style="width: 100%; padding: 0.8rem 1rem 0.8rem 2.8rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="TU UNIVERSIDAD O ENTIDAD">
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Escuela Profesional:</label>
                                <input type="text" name="professional_school" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="CARRERA">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Teléfono / WhatsApp:</label>
                                <input type="text" name="phone" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="+51 000 000 000">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Departamento / Ciudad:</label>
                                <input type="text" name="department" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="EJ: PUNO">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Correo Electrónico:</label>
                                <input type="email" name="email" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); text-transform: uppercase; font-size: 0.9rem;" placeholder="TU@CORREO.COM">
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Contraseña:</label>
                                <div style="position: relative;">
                                    <input type="password" name="password" id="regPassword" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); font-size: 0.9rem;" placeholder="******">
                                    <i class="fa-solid fa-eye-slash" onclick="togglePasswordVisibility('regPassword', this)" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); cursor: pointer; color: var(--text-muted); font-size: 0.8rem;"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Confirmar:</label>
                                <div style="position: relative;">
                                    <input type="password" name="confirm_password" id="regConfirmPassword" required style="width: 100%; padding: 0.8rem 1rem; border-radius: 12px; border: 1.5px solid var(--cream); background: var(--ivory); outline: none; transition: var(--transition); font-size: 0.9rem;" placeholder="******">
                                    <i class="fa-solid fa-eye-slash" onclick="togglePasswordVisibility('regConfirmPassword', this)" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); cursor: pointer; color: var(--text-muted); font-size: 0.8rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text-dark); font-size: 0.85rem;">Verificación de Seguridad:</label>
                                <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>"></div>
                            </div>

                        <button type="submit" class="btn btn-gold" style="width: 100%; justify-content: center; padding: 1rem; font-size: 1rem; border-radius: 50px; box-shadow: 0 10px 20px rgba(196, 30, 90, 0.2); margin-top: 1.5rem;">
                            <i class="fa-solid fa-user-plus"></i> Finalizar Registro
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.sci-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.6);
    backdrop-filter: blur(5px);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.sci-modal.active {
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1;
}
.sci-modal-content {
    background-color: var(--white);
    padding: 3rem;
    border-radius: 30px;
    width: 90%;
    max-width: 650px;
    position: relative;
    transform: translateY(20px);
    transition: transform 0.3s ease;
    text-align: center;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
.sci-modal.active .sci-modal-content {
    transform: translateY(0);
}
.sci-modal-close {
    position: absolute;
    right: 25px;
    top: 20px;
    font-size: 2rem;
    color: var(--text-muted);
    cursor: pointer;
    line-height: 1;
    transition: var(--transition);
}
.sci-modal-close:hover { 
    color: var(--pink);
    transform: rotate(90deg);
}

.sci-option-card {
    background: var(--cream);
    padding: 2rem;
    border-radius: 20px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}
.sci-option-card i { font-size: 2.5rem; color: var(--pink); margin-bottom: 1rem; display: block; }
.sci-option-card h4 { color: var(--text-dark); margin-bottom: 0.5rem; font-size: 1.25rem; }
.sci-option-card p { color: var(--text-muted); font-size: 0.85rem; margin: 0; }
.sci-option-card:hover { transform: translateY(-5px); border-color: var(--pink); box-shadow: var(--shadow); }

.sci-option-card.login { background: #f0f7ff; }
.sci-option-card.login i { color: var(--purple); }
.sci-option-card.login:hover { border-color: var(--purple); }

/* Custom scrollbar for the form side */
.auth-form-side::-webkit-scrollbar {
    width: 6px;
}
.auth-form-side::-webkit-scrollbar-track {
    background: var(--ivory);
}
.auth-form-side::-webkit-scrollbar-thumb {
    background: var(--peach);
    border-radius: 10px;
}
.auth-form-side::-webkit-scrollbar-thumb:hover {
    background: var(--pink);
}

@media (max-width: 900px) {
    .auth-info-side { display: none !important; }
    .auth-form-side { width: 100% !important; padding: 2rem !important; }
    #modalMainContent { width: 95% !important; max-width: 500px !important; }
}
</style>

<script>
function openRegModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    showSelectionView(); // Siempre empezar en la selección
}

function closeRegModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

function showRegisterView() {
    const selection = document.getElementById('selectionView');
    const register = document.getElementById('registerView');
    const content = document.getElementById('modalMainContent');

    if (selection) selection.style.opacity = '0';
    setTimeout(() => {
        if (selection) selection.style.display = 'none';
        if (register) register.style.display = 'block';
        if (content) content.style.maxWidth = '1000px';
        setTimeout(() => {
            if (register) register.style.opacity = '1';
        }, 50);
    }, 300);
}

function showSelectionView() {
    const selection = document.getElementById('selectionView');
    const register = document.getElementById('registerView');
    const content = document.getElementById('modalMainContent');

    register.style.opacity = '0';
    setTimeout(() => {
        register.style.display = 'none';
        selection.style.display = 'block';
        content.style.maxWidth = '650px';
        setTimeout(() => {
            selection.style.opacity = '1';
        }, 50);
    }, 300);
}

function togglePasswordVisibility(id, icon) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const btns = document.querySelectorAll('.open-registration-modal');
    
    btns.forEach(btn => {
        btn.onclick = function() {
            openRegModal('registrationModal');
        }
    });

    window.onclick = function(event) {
        if (event.target.classList.contains('sci-modal')) {
            closeRegModal(event.target.id);
        }
    }

    // Auto-open modal if there was a registration error or if requested via URL
    <?php if ($hasRegError || (isset($_GET['action']) && $_GET['action'] == 'register')): ?>
        openRegModal('registrationModal');
        showRegisterView();
    <?php
endif; ?>
});
</script>

<!-- Soporte -->
<section class="comite-section">
    <div class="container">
        <div class="support-info">
            <h3 class="support-title">
                <i class="fa-solid fa-headset"></i>
                <?php echo _t('inscriptions.support_title'); ?>
            </h3>
            <p class="support-desc"><?php echo _t('inscriptions.support_desc'); ?></p>
            <div class="support-methods">
                <div class="support-item">
                    <div class="sci-icon-box sci-icon-box--pink support-sci-icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="support-details">
                        <h4>WhatsApp</h4>
                        <p>+51 958 274 958</p>
                    </div>
                </div>
                <div class="support-item">
                    <div class="sci-icon-box sci-icon-box--purple support-sci-icon">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <div class="support-details">
                        <h4>Email</h4>
                        <p>ontarticulos@unap.edu.pe</p>
                    </div>
                </div>
            </div>
            <p class="support-note">
                <small><?php echo _t('inscriptions.support_response'); ?></small>
            </p>
        </div>
    </div>
</section>

<!-- CTA -->
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

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
