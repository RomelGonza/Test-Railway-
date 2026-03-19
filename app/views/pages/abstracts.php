<?php

require APPROOT . '/views/inc/header.php';

?>

<style>
/* Estilos Críticos para Modales Scientific */
.sci-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(26, 22, 37, 0.85);
    backdrop-filter: blur(10px);
    overflow-y: auto;
    opacity: 0;
    transition: opacity 0.3s ease;
    align-items: center;
    justify-content: center;
}

.sci-modal.active {
    display: flex !important;
    opacity: 1;
}

.sci-modal-content {
    background: white;
    position: relative;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    transform: translateY(-30px);
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    border-radius: 32px;
    overflow: hidden;
    width: 90%;
    max-width: 800px;
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
    transition: color 0.3s ease;
    z-index: 100;
}

.sci-modal-close:hover {
    color: var(--pink);
}

.instruction-group h4 {
    font-family: var(--font-serif);
    font-size: 1.1rem;
}
</style>

<!-- ============================================
     SECCIÓN: Resúmenes - Header
     ============================================ -->
<section class="comite-hero" style="background-image: linear-gradient(rgba(26, 22, 37, 0.7), rgba(26, 22, 37, 0.7)), url('<?php echo URLROOT; ?>/img/portadas/resumenes.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <header class="comite-header">
            <span class="comite-badge"><?php echo _t('abstracts.page_badge'); ?></span>
            <h1 class="section-title"><?php echo _t('abstracts.page_title'); ?> <span class="accent">ONTA 2026</span></h1>
            <p class="comite-intro"><?php echo _t('abstracts.page_intro'); ?></p>
        </header>

        <div class="comite-stats" style="justify-content: center;">
            <div class="comite-stat">
                <span class="comite-stat-num">09</span>
                <span class="comite-stat-label">Noviembre</span>
            </div>

            <div class="comite-stat">
                <span class="comite-stat-num">11</span>
                <span class="comite-stat-label">Áreas</span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">3</span>
                <span class="comite-stat-label"><?php echo _t('abstracts.stat_modes'); ?></span>
            </div>
            <div class="comite-stat">
                <span class="comite-stat-num">4</span>
                <span class="comite-stat-label"><?php echo _t('abstracts.stat_lang'); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     Información Principal y Countdown
     ============================================ -->
<section class="comite-section comite-section-light">
    <div class="container">
        <div class="abstracts-intro text-center">
            <h2 class="section-title">Envío de <span class="accent">Resúmenes ONTA 2026</span></h2>
            <p class="comite-section-desc"><?php echo _t('abstracts.page_intro'); ?></p>
            
            <!-- Nuevo CTA de Envío de Resúmenes -->
            <div class="abstract-cta-box">
                <h3 class="abstract-cta-title">¿Listo para presentar su investigación?</h3>
                <p class="abstract-cta-desc">Inicie sesión en su cuenta para acceder al sistema de envío oficial. El sistema estará disponible hasta el <strong>09 de Noviembre de 2026</strong>.</p>
                <div class="abstract-cta-actions">
                    <a href="<?php echo URLROOT; ?>/users/login" class="btn-login-sci">
                        <i class="fa-solid fa-right-to-bracket"></i> INGRESAR PARA ENVIAR RESUMEN
                    </a>
                    <p style="margin-top: 15px; font-size: 0.95rem; color: var(--text-muted);">
                        Deberás tener una cuenta creada para enviar tu resumen. 
                        <a href="<?php echo URLROOT; ?>/pages/inscriptions?action=register" style="color: var(--pink); font-weight: 600; text-decoration: underline;">Comienza creando una aquí</a>
                    </p>
                </div>
            </div>

            <!-- Nueva Sección: Pasos para subir el resumen (DENTRO DEL CONTAINER) -->
            <div style="margin-top: 5rem; padding-bottom: 2rem;">
                <header class="comite-section-header text-center">
                    <span class="comite-badge">Guía paso a paso</span>
                    <h2 class="section-title">¿Cómo subir mi <span class="accent">Resumen?</span></h2>
                    <p class="comite-section-desc">Siga este sencillo proceso de 4 pasos para registrar su trabajo correctamente.</p>
                </header>

                <div class="submission-steps-grid">
                    <!-- Paso 1 -->
                    <article class="step-card">
                        <div class="step-img-box gallery-item">
                            <img src="<?php echo URLROOT; ?>/img/pasos/1paso.png" alt="Paso 1: Iniciar Sesión">
                        </div>
                        <div class="step-content">
                            <div class="step-number">1</div>
                            <h4>Iniciar Sesión</h4>
                            <p>Ingrese a su cuenta personal con su correo y contraseña registrada.</p>
                        </div>
                    </article>

                    <!-- Paso 2 -->
                    <article class="step-card">
                        <div class="step-img-box gallery-item">
                            <img src="<?php echo URLROOT; ?>/img/pasos/2paso.png" alt="Paso 2: Acceder a Mis Envíos">
                        </div>
                        <div class="step-content">
                            <div class="step-number">2</div>
                            <h4>Acceder a Mis Envíos</h4>
                            <p>Dentro de su panel, seleccione la opción "Enviar Nuevo Resumen".</p>
                        </div>
                    </article>

                    <!-- Paso 3 -->
                    <article class="step-card">
                        <div class="step-img-box gallery-item">
                            <img src="<?php echo URLROOT; ?>/img/pasos/3paso.png" alt="Paso 3: Cargar Archivo">
                        </div>
                        <div class="step-content">
                            <div class="step-number">3</div>
                            <h4>Cargar Archivo</h4>
                            <p>Complete los datos del resumen y suba su archivo en formato PDF.</p>
                        </div>
                    </article>

                    <!-- Paso 4 -->
                    <article class="step-card">
                        <div class="step-img-box gallery-item">
                            <img src="<?php echo URLROOT; ?>/img/pasos/4paso.png" alt="Paso 4: Confirmación">
                        </div>
                        <div class="step-content">
                            <div class="step-number">4</div>
                            <h4>Confirmación</h4>
                            <p>Reciba su código de seguimiento. La confirmación será vía sistema web de la ONTA.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     Instrucciones con Iconos Scientific
     ============================================ -->
<section class="comite-section">
    <div class="container">
        <header class="comite-section-header">
            <h2 class="section-title"><?php echo _t('abstracts.instructions_title'); ?></h2>
            <p class="comite-section-desc"><?php echo _t('abstracts.instructions_desc'); ?></p>
        </header>
        
        <div class="instructions-grid">
            <!-- Instrucciones para Autores -->
            <article class="scientific-card-modern">
                <div class="sci-icon-box sci-icon-box--pink">
                    <i class="fa-solid fa-book-open-reader"></i>
                </div>
                <div class="sci-card-body">
                    <h3><?php echo _t('abstracts.instructions_title'); ?></h3>
                    <p><?php echo _t('abstracts.instructions_desc'); ?></p>
                    <ul class="sci-feature-list">
                        <li><i class="fa-solid fa-check"></i> Formato y estructura</li>
                        <li><i class="fa-solid fa-check"></i> Criterios de evaluación</li>
                        <li><i class="fa-solid fa-check"></i> Fechas importantes</li>
                    </ul>
                    <a href="javascript:void(0)" class="sci-link-btn" onclick="openRegModal('authorInstructionsModal')">
                        <?php echo _t('common.read_more'); ?> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            
            <!-- Instrucciones para Ponentes -->
            <article class="scientific-card-modern">
                <div class="sci-icon-box sci-icon-box--purple">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <div class="sci-card-body">
                    <h3>Instrucciones para Ponentes</h3>
                    <p>Información específica para presentaciones orales y pósteres</p>
                    <ul class="sci-feature-list">
                        <li><i class="fa-solid fa-check"></i> Duración de charlas</li>
                        <li><i class="fa-solid fa-check"></i> Formatos de póster</li>
                        <li><i class="fa-solid fa-check"></i> Equipamiento disponible</li>
                    </ul>
                    <a href="javascript:void(0)" class="sci-link-btn" onclick="openRegModal('speakerInstructionsModal')">
                        <?php echo _t('common.read_more'); ?> <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            
            <!-- Enviar Resumen -->
            <article class="scientific-card-modern elite">
                <div class="sci-icon-box sci-icon-box--teal">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <div class="sci-card-body">
                    <h3>Enviar Resumen</h3>
                    <p>Sistema online para el envío de su resumen científico</p>
                    <ul class="sci-feature-list">
                        <li><i class="fa-solid fa-check"></i> Formulario simplificado</li>
                        <li><i class="fa-solid fa-check"></i> Carga de archivos PDF</li>
                        <li><i class="fa-solid fa-check"></i> Confirmación vía sistema web</li>
                    </ul>
                    <a href="<?php echo URLROOT; ?>/users/login" class="sci-btn-primary">
                        <?php echo _t('common.send'); ?> <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                    <p style="margin-top: 10px; font-size: 0.85rem; color: var(--text-muted);">
                        ¿No tiene cuenta? <a href="<?php echo URLROOT; ?>/pages/inscriptions?action=register" style="color: var(--teal); font-weight: 600; text-decoration: underline;">Regístrese aquí</a>
                    </p>
                </div>
            </article>
    </div>
</section>

<!-- Modal de Instrucciones para Autores -->
<div id="authorInstructionsModal" class="sci-modal">
    <div class="sci-modal-content" style="max-width: 800px; padding: 3rem; text-align: left;">
        <span class="sci-modal-close" onclick="closeRegModal('authorInstructionsModal')">&times;</span>
        
        <header style="margin-bottom: 2rem; border-bottom: 2px solid var(--cream); padding-bottom: 1rem;">
            <h2 style="font-family: var(--font-serif); color: var(--text-dark); margin: 0;">Directrices para el <span class="accent">Resumen Científico</span></h2>
            <p style="color: var(--text-muted);">Normas editoriales y de redacción para ONTA 2026</p>
        </header>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; max-height: 60vh; overflow-y: auto; padding-right: 15px;">
            <div class="instruction-group">
                <h4 style="color: var(--pink); border-left: 4px solid var(--pink); padding-left: 10px; margin-bottom: 1rem;">1. Estructura y Extensión</h4>
                <ul class="sci-feature-list" style="font-size: 0.9rem;">
                    <li><i class="fa-solid fa-circle-dot"></i> <strong>Extensión:</strong> Entre 200 y 300 palabras (máximo ~300).</li>
                    <li><i class="fa-solid fa-circle-dot"></i> <strong>Párrafo único:</strong> El resumen no se divide en secciones. Todo en un solo bloque.</li>
                    <li><i class="fa-solid fa-circle-dot"></i> <strong>Contenido estructural:</strong> Debe incluir problema, objetivo, metodología, resultados y conclusión.</li>
                </ul>
            </div>

            <div class="instruction-group">
                <h4 style="color: var(--purple); border-left: 4px solid var(--purple); padding-left: 10px; margin-bottom: 1rem;">2. Redacción Científica</h4>
                <ul class="sci-feature-list" style="font-size: 0.9rem;">
                    <li><i class="fa-solid fa-circle-dot"></i> <strong>Estilo:</strong> Lenguaje formal, objetivo y en tercera persona.</li>
                    <li><i class="fa-solid fa-circle-dot"></i> <strong>Tiempos:</strong> Pasado para metodología/resultados, presente para conclusiones.</li>
                    <li><i class="fa-solid fa-circle-dot"></i> <strong>Precisión:</strong> Mencionar método exacto, tipo de datos y hallazgo cuantitativo principal.</li>
                </ul>
            </div>

            <div class="instruction-group">
                <h4 style="color: var(--teal); border-left: 4px solid var(--teal); padding-left: 10px; margin-bottom: 1rem;">3. Restricciones Técnicas</h4>
                <ul class="sci-feature-list" style="font-size: 0.9rem;">
                    <li><i class="fa-solid fa-xmark" style="color: #ff4d4d;"></i> NO se permiten citas, referencias, tablas ni figuras.</li>
                    <li><i class="fa-solid fa-xmark" style="color: #ff4d4d;"></i> NO se aceptan ecuaciones ni notas al pie.</li>
                    <li><i class="fa-solid fa-xmark" style="color: #ff4d4d;"></i> Evitar abreviaturas no definidas previamente.</li>
                </ul>
            </div>

            <div class="instruction-group">
                <h4 style="color: var(--gold); border-left: 4px solid var(--gold); padding-left: 10px; margin-bottom: 1rem;">4. Requisitos de Rigor</h4>
                <ul class="sci-feature-list" style="font-size: 0.9rem;">
                    <li><i class="fa-solid fa-key"></i> <strong>Keywords:</strong> 3 a 5 términos de tesauros científicos.</li>
                    <li><i class="fa-solid fa-check-double"></i> <strong>Coherencia:</strong> Se debe permitir entender el por qué y para qué se investigó.</li>
                </ul>
            </div>
        </div>

        <div style="margin-top: 2rem; background: #f8faff; border-radius: 15px; padding: 1.5rem; display: flex; align-items: center; gap: 1rem;">
            <i class="fa-solid fa-circle-info" style="font-size: 2rem; color: var(--purple);"></i>
            <p style="margin: 0; font-size: 0.85rem; color: var(--text-muted);">
                <strong>Nota Importante:</strong> El resumen debe ser autocontenido. Evite frases subjetivas u opiniones personales.
            </p>
        </div>
    </div>
</div>

<!-- Modal de Instrucciones para Ponentes -->
<div id="speakerInstructionsModal" class="sci-modal">
    <div class="sci-modal-content" style="max-width: 850px; padding: 3rem; text-align: left;">
        <span class="sci-modal-close" onclick="closeRegModal('speakerInstructionsModal')">&times;</span>
        
        <header style="margin-bottom: 2rem; border-bottom: 2px solid var(--cream); padding-bottom: 1rem;">
            <h2 style="font-family: var(--font-serif); color: var(--text-dark); margin: 0;">Guía para <span class="accent">Ponentes</span></h2>
            <p style="color: var(--text-muted);">Especificaciones técnicas para presentaciones en ONTA 2026</p>
            <p style="margin: 0; font-size: 0.85rem; color: var(--text-muted);">
                <strong>Nota Importante:</strong> El resumen también debe ser parte de su presentación. <a href="#" onclick="closeRegModal('speakerInstructionsModal'); setTimeout(function() { openRegModal('authorInstructionsModal'); }, 300); return false;" style="color: var(--pink); font-weight: 600; text-decoration: underline;">Dirigirse a directrices de resumen</a>
            </p>
        </header>

        <div style="max-height: 65vh; overflow-y: auto; padding-right: 15px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <!-- Presentación Oral -->
                <div class="instruction-group">
                    <h4 style="color: var(--purple); border-left: 4px solid var(--purple); padding-left: 10px; margin-bottom: 1rem;">Presentación Oral</h4>
                    <ul class="sci-feature-list" style="font-size: 0.9rem;">
                        <li><i class="fa-solid fa-clock"></i> <strong>Duración:</strong> 10 min exposición + 5 min preguntas.</li>
                        <li><i class="fa-solid fa-file-powerpoint"></i> <strong>Formato:</strong> PowerPoint (.ppt/.pptx) o PDF.</li>
                        <li><i class="fa-solid fa-laptop-code"></i> <strong>Equipo:</strong> Laptop y proyector proporcionado.</li>
                        <li><i class="fa-solid fa-copy"></i> <strong>Límite:</strong> Máximo 12–15 diapositivas recomendadas.</li>
                    </ul>
                    <div style="margin-top: 10px; padding-left: 25px; font-size: 0.85rem; color: var(--text-muted);">
                        <strong>Contenido:</strong> Introducción, Objetivos, Métodología, Resultados, Discusión y Conclusiones.
                    </div>
                </div>

                <!-- Presentación de Póster -->
                <div class="instruction-group">
                    <h4 style="color: var(--teal); border-left: 4px solid var(--teal); padding-left: 10px; margin-bottom: 1rem;">Presentación de Póster</h4>
                    <ul class="sci-feature-list" style="font-size: 0.9rem;">
                        <li><i class="fa-solid fa-maximize"></i> <strong>Dimensiones:</strong> 90 cm (ancho) × 120 cm (alto).</li>
                        <li><i class="fa-solid fa-arrows-up-down"></i> <strong>Orientación:</strong> Vertical.</li>
                        <li><i class="fa-solid fa-text-height"></i> <strong>Fuente - Títulos:</strong> Mínimo 36 pt.</li>
                        <li><i class="fa-solid fa-font"></i> <strong>Fuente - Texto:</strong> Mínimo 24 pt.</li>
                    </ul>
                    <div style="margin-top: 10px; padding-left: 25px; font-size: 0.85rem; color: var(--text-muted);">
                        <strong>Mínimo:</strong> Título, Autores, Introducción, Materiales, Objetivos, Métodología, Resultados, Discusión, Conclusiones y Agradecimientos.
                    </div>
                </div>
            </div>

            <!-- Recomendaciones Generales -->
            <div class="instruction-group" style="background: #fdfaf4; border: 1px solid #f3e5c2; border-radius: 15px; padding: 1.5rem;">
                <h4 style="color: var(--gold); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.8rem;">
                    <i class="fa-solid fa-person-running"></i> Recomendaciones Generales
                </h4>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <ul class="sci-feature-list" style="font-size: 0.85rem;">
                        <li><i class="fa-solid fa-check"></i> Llegar 15 min antes de su sesión.</li>
                        <li><i class="fa-solid fa-check"></i> Probar y entregar archivos antes de iniciar.</li>
                        <li><i class="fa-solid fa-check"></i> Llevar respaldo en memoria USB.</li>
                    </ul>
                    <ul class="sci-feature-list" style="font-size: 0.85rem;">
                        <li><i class="fa-solid fa-check"></i> Ajustarse estrictamente al tiempo.</li>
                        <li><i class="fa-solid fa-check"></i> Usar gráficos claros de alta calidad.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openRegModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeRegModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

document.addEventListener('DOMContentLoaded', function() {
    window.onclick = function(event) {
        if (event.target.classList.contains('sci-modal')) {
            closeRegModal(event.target.id);
        }
    }
});
</script>

<!-- SECCIÓN: Consulta de Estado -->
<section style="background: linear-gradient(to bottom, #fff, #f8f9fa); padding: 5rem 0; margin-top: 2rem; border-top: 1px solid var(--cream);">
    <div class="container" style="max-width: 900px; text-align: center;">
        <span style="display: inline-block; background: rgba(196, 30, 90, 0.1); color: var(--pink); padding: 0.5rem 1.2rem; border-radius: 50px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1.5rem;">Seguimiento Científico</span>
        <h3 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--purple); margin-bottom: 1rem;">¿Ya enviaste tu resumen?</h3>
        <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto 3rem; font-size: 1.1rem;">Ingresa tu código de seguimiento de 8 dígitos para conocer el estado de evaluación en tiempo real.</p>
        
        <div style="background: white; padding: 3rem; border-radius: 30px; box-shadow: 0 20px 40px rgba(26, 22, 37, 0.06); border: 1px solid var(--cream); position: relative; overflow: hidden;">
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; position: relative; z-index: 2;">
                <input type="text" id="trackCode" placeholder="Cód: 84729305" maxlength="8" 
                       style="padding: 1.1rem 2rem; border-radius: 15px; border: 2px solid var(--cream); font-size: 1.2rem; width: 280px; text-align: center; color: var(--purple); font-weight: 700; outline: none; transition: border-color 0.3s ease; background: #fafafa;"
                       onfocus="this.style.borderColor='var(--pink)'" onblur="this.style.borderColor='var(--cream)'">
                <button onclick="checkMyStatus()" class="btn-solid pink" 
                        style="padding: 1.1rem 2.5rem; border-radius: 15px; font-weight: 700; font-size: 1rem; cursor: pointer; border: none; background: var(--pink); color: white; transition: transform 0.2s ease, box-shadow 0.2s ease; display: inline-flex; align-items: center; gap: 0.8rem;">
                    <i class="fa-solid fa-magnifying-glass"></i> Consultar Ahora
                </button>
            </div>
            <div id="trackResult" style="margin-top: 2rem; display: none; padding: 2rem; border-radius: 20px; text-align: left; transition: all 0.4s ease;">
                <!-- Resultado Dinámico -->
            </div>
            <i class="fa-solid fa-microscope" style="position: absolute; right: -20px; bottom: -20px; font-size: 8rem; color: rgba(196, 30, 90, 0.03); transform: rotate(-15deg);"></i>
        </div>
    </div>
</section>

<script>
async function checkMyStatus() {
    const code = document.getElementById('trackCode').value;
    const resultDiv = document.getElementById('trackResult');
    
    if (code.length !== 8) {
        alert('Por favor, ingresa el código de 8 dígitos.');
        return;
    }

    resultDiv.style.display = 'block';
    resultDiv.style.opacity = '0.5';
    resultDiv.innerHTML = '<div style="text-align: center; color: var(--pink);"><i class="fa-solid fa-spinner fa-spin"></i> Consultando base de datos...</div>';
    resultDiv.style.background = '#fcfcfc';

    try {
        const formData = new FormData();
        formData.append('tracking_code', code);
        
        const response = await fetch('<?php echo URLROOT; ?>/abstracts/checkStatus', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        resultDiv.style.opacity = '1';
        
        if (data.success) {
            let statusColor = '#eab308'; 
            let statusBg = 'rgba(234, 179, 8, 0.1)';
            let statusIcon = 'fa-clock';
            if(data.status === 'aprobado' || data.status === 'accepted') { statusColor = '#22c55e'; statusBg = 'rgba(34, 197, 94, 0.1)'; statusIcon = 'fa-check-circle'; }
            if(data.status === 'rechazado' || data.status === 'rejected') { statusColor = '#ef4444'; statusBg = 'rgba(239, 68, 68, 0.1)'; statusIcon = 'fa-circle-xmark'; }

            resultDiv.style.background = '#fff';
            resultDiv.style.border = '1px solid var(--cream)';
            resultDiv.innerHTML = `
                <div style="display: flex; align-items: flex-start; gap: 1.5rem;">
                    <div style="width: 60px; height: 60px; background: ${statusBg}; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: ${statusColor}; flex-shrink: 0;">
                        <i class="fa-solid ${statusIcon}"></i>
                    </div>
                    <div style="flex-grow: 1;">
                        <div style="font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">Título de la Investigación:</div>
                        <div style="font-weight: 700; font-size: 1.15rem; color: var(--purple); margin-bottom: 0.8rem; font-family: var(--font-serif); line-height: 1.4;">${data.title}</div>
                        <div style="display: inline-block; padding: 0.4rem 1rem; border-radius: 8px; background: ${statusBg}; color: ${statusColor}; font-weight: 800; font-size: 0.9rem; text-transform: uppercase;">
                            Estado del Envío: ${data.status.toUpperCase()}
                        </div>
                    </div>
                </div>
            `;
        } else {
            resultDiv.style.background = 'rgba(239, 68, 68, 0.06)';
            resultDiv.style.border = '1px dashed #ef4444';
            resultDiv.innerHTML = `<div style="text-align: center; color: #ef4444; font-weight: 600;"><i class="fa-solid fa-triangle-exclamation"></i> ${data.message}</div>`;
        }
    } catch (error) {
        resultDiv.innerHTML = '<div style="text-align: center; color: #ef4444;">Error de conexión. Reintente.</div>';
    }
}
</script>

<!-- Modal de Galería (Lightbox) para los Pasos -->
<div id="galleryModal" class="gallery-modal">
    <span class="close-modal">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="modalCaption" class="modal-caption" style="font-family: var(--font-serif); font-size: 1.2rem; font-weight: 600;"></div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
