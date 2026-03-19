<!DOCTYPE html>
<html lang="<?php echo strtolower(getCurrentLang()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $data['description'] ?? '56ª Reunión Anual ONTA Puno - Perú 2026. El evento científico de nematología más importante en América Latina.'; ?>">
    <meta name="keywords" content="ONTA, Nematología, Puno, Perú, Congreso Científico, Agricultura Sostenible, Taller Nematodos, 2026">
    <meta name="author" content="ONTA PERU">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo URLROOT; ?>">
    <meta property="og:title" content="<?php echo $data['title'] ?? SITENAME; ?>">
    <meta property="og:description" content="<?php echo $data['description'] ?? 'Únete a nosotros en Puno para la 56ª Reunión Anual de ONTA.'; ?>">
    <meta property="og:image" content="<?php echo URLROOT; ?>/img/portadas/hero_bg.jpg">

    <title><?php echo isset($data['title']) ? $data['title'] : SITENAME; ?></title>
    <!-- Tipografía institucional: sans (UI) + serif (científica/académica) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Source+Serif+4:opsz,wght@8..60,400;8..60,600;8..60,700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/img/logo_onta.png" type="image/x-icon">
    
    <script>
        const URLROOT = '<?php echo URLROOT; ?>';
    </script>
</head>
<body>
    <!-- ============================================
         PRELOADER ONTA 
         ============================================ -->
    <div id="onta-preloader" class="onta-preloader">
        <div class="preloader-content">
            <div class="preloader-logo-container">
                <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA Logo" class="preloader-logo pulse-anim">
            </div>
            
            <div class="preloader-icons">
                <i class="fa-solid fa-flask icon-anim" style="animation-delay: 0s;"></i>
                <i class="fa-solid fa-microscope icon-anim" style="animation-delay: 0.2s;"></i>
                <i class="fa-solid fa-dna icon-anim" style="animation-delay: 0.4s;"></i>
                <i class="fa-solid fa-leaf icon-anim" style="animation-delay: 0.6s;"></i>
            </div>

            <div class="preloader-progress-container">
                <div class="preloader-progress-bar" id="preloader-bar"></div>
            </div>
            <div class="preloader-text">
                CARGANDO... <span id="preloader-percent">0%</span>
            </div>
        </div>
    </div>
    
    <style>
        /* Estilos del Preloader (inline para carga inmediata) */
        .onta-preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--pink, #c41e5a);
            z-index: 999999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.6s ease-out, visibility 0.6s ease-out;
        }
        
        .onta-preloader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        .preloader-content {
            text-align: center;
            width: 100%;
            max-width: 320px;
            padding: 0 20px;
        }

        .preloader-logo-container {
            margin-bottom: 2.5rem;
            position: relative;
        }

        .preloader-logo {
            width: 130px;
            height: auto;
            position: relative;
            z-index: 2;
        }
        
        .pulse-anim {
            animation: pulse-preloader 1.5s infinite alternate ease-in-out;
        }
        
        @keyframes pulse-preloader {
            0% { transform: scale(0.95); filter: brightness(0) invert(1) drop-shadow(0 0 10px rgba(255, 255, 255, 0.4)); }
            100% { transform: scale(1.05); filter: brightness(0) invert(1) drop-shadow(0 0 25px rgba(255, 255, 255, 0.8)); }
        }

        .preloader-icons {
            display: flex;
            justify-content: center;
            gap: 1.8rem;
            margin-bottom: 2.5rem;
        }

        .preloader-icons i {
            color: var(--white, #ffffff);
            font-size: 1.8rem;
            opacity: 0;
        }

        .icon-anim {
            animation: icon-bounce 2s infinite ease-in-out;
        }

        @keyframes icon-bounce {
            0%, 100% { transform: translateY(0); opacity: 0.6; color: rgba(255, 255, 255, 0.7); }
            50% { transform: translateY(-12px); opacity: 1; color: #ffffff; filter: drop-shadow(0 5px 10px rgba(255, 255, 255, 0.5)); }
        }

        .preloader-progress-container {
            width: 100%;
            height: 8px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 1.2rem;
            position: relative;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);
        }

        .preloader-progress-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, rgba(255,255,255,0.7), #ffffff, rgba(255,255,255,0.9));
            background-size: 200% 200%;
            border-radius: 20px;
            transition: width 0.1s ease-out;
            animation: gradient-flow 2s ease infinite;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
        }
        
        @keyframes gradient-flow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .preloader-text {
            color: var(--white, #ffffff);
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        
        .preloader-text span {
            color: var(--white, #ffffff);
            font-weight: 800;
            display: inline-block;
            min-width: 45px;
            text-align: right;
        }
    </style>

    <script>
        // Lógica de carga simulada y control de sesión
        document.addEventListener("DOMContentLoaded", function() {
            const preloader = document.getElementById('onta-preloader');
            
            // Forzar preloader desde PHP (Login/Logout)
            <?php if(isset($_SESSION['force_preloader'])) : ?>
                sessionStorage.removeItem('ontaPreloaderShown');
                <?php unset($_SESSION['force_preloader']); ?>
            <?php endif; ?>

            // Verificar si es una recarga de página usando la API de navegación
            const navEntries = performance.getEntriesByType("navigation");
            const isReload = navEntries.length > 0 && navEntries[0].type === "reload";

            // Mostrar el preloader si es la primera vez en la sesión, O si se ha recargado la página manualmente
            if (!isReload && sessionStorage.getItem('ontaPreloaderShown')) {
                // Si ya se mostró y no es una recarga (es decir, navegación normal), ocultar
                preloader.style.display = 'none';
                return; // Detener la ejecución del resto del script
            }

            const bar = document.getElementById('preloader-bar');
            const percent = document.getElementById('preloader-percent');
            let progress = 0;
            let timeElapsed = 0;
            
            // Simular carga progresiva
            const loadInterval = setInterval(() => {
                timeElapsed += 50;
                
                // La carga avanza rápido al principio, luego se ralentiza
                let increment = 0;
                if (progress < 40) {
                    increment = Math.random() * 8 + 2; 
                } else if (progress < 80) {
                    increment = Math.random() * 4 + 1;
                } else {
                    increment = Math.random() * 1.5 + 0.5;
                }
                
                progress += increment;
                
                // Limitar al 99% mientras sigue cargando la página
                if (progress > 99) {
                    progress = 99;
                }
                
                // Actualizar UI
                const currentPercent = Math.floor(progress);
                bar.style.width = currentPercent + '%';
                percent.innerText = currentPercent + '%';
            }, 60);

            // Cuando todo (imágenes, scripts) ha cargado realmente
            window.addEventListener('load', function() {
                clearInterval(loadInterval); // Detener simulación
                
                // Completar al 100%
                bar.style.width = '100%';
                percent.innerText = '100%';
                
                // Marcar en la sesión que ya se mostró
                sessionStorage.setItem('ontaPreloaderShown', 'true');
                
                // Retraso para que el usuario pueda ver el 100% antes de desaparecer
                setTimeout(() => {
                    preloader.classList.add('fade-out');
                    
                    // Remover del DOM para que no afecte clics futuros
                    setTimeout(() => {
                        preloader.style.display = 'none';
                    }, 650); // Mismo tiempo que la transición CSS (0.6s)
                }, 400); 
            });
            
            // Seguridad: Si la página tarda demasiado (más de 10 seg), forzar quitar el preloader
            setTimeout(() => {
                if(preloader.style.display !== 'none') {
                    clearInterval(loadInterval);
                    sessionStorage.setItem('ontaPreloaderShown', 'true');
                    preloader.classList.add('fade-out');
                    setTimeout(() => { preloader.style.display = 'none'; }, 650);
                }
            }, 10000);
        });
    </script>
    
    <nav class="navbar">
        <div class="container nav-content">
            <!-- LOGO + NOMBRE -->
            <a href="<?php echo URLROOT; ?>" class="nav-logo">
                <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA Logo" class="nav-logo-img">
                <span class="nav-logo-text">56ª Reunión<br> Anual ONTA<br><small>Puno - Perú</small></span>
            </a>

            <!-- MENÚ PRINCIPAL (Desktop: texto; Móvil: panel lateral) -->
            <ul class="nav-links" id="navLinks">
                <li><a href="<?php echo URLROOT; ?>"><?php echo _t('nav.home'); ?></a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/comite"><?php echo _t('nav.comite'); ?></a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/areas"><?php echo _t('nav.areas'); ?></a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/programacion"><?php echo _t('nav.programacion'); ?></a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/inscriptions"><?php echo _t('nav.inscriptions'); ?></a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/abstracts"><?php echo _t('nav.abstracts'); ?></a></li>
                <li><a href="<?php echo URLROOT; ?>/pages/puno"><?php echo _t('nav.puno'); ?></a></li>
            </ul>

            <!-- UTILIDADES: Idioma + Buscador + Login (Desktop + Móvil barra) -->
            <div class="nav-utilities">
                <!-- Selector de Idioma (solo desktop) -->
                <div class="lang-selector desktop-only">
                    <button class="lang-btn" id="langToggle">
                        <i class="fa-solid fa-globe"></i> <?php echo getCurrentLang(); ?> <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <ul class="lang-dropdown" id="langDropdown">
                        <li><a href="?lang=es" class="<?php echo getCurrentLang() == 'ES' ? 'active' : ''; ?>">ES - Español</a></li>
                        <li><a href="?lang=en" class="<?php echo getCurrentLang() == 'EN' ? 'active' : ''; ?>">EN - English</a></li>
                        <li><a href="?lang=fr" class="<?php echo getCurrentLang() == 'FR' ? 'active' : ''; ?>">FR - Français</a></li>
                        <li><a href="?lang=br" class="<?php echo getCurrentLang() == 'BR' ? 'active' : ''; ?>">BR - Português</a></li>
                        <li><a href="?lang=de" class="<?php echo getCurrentLang() == 'DE' ? 'active' : ''; ?>">DE - Deutsch</a></li>
                    </ul>
                </div>

                <!-- Motor de Búsqueda (icono — desktop y móvil) -->
                <div class="nav-search">
                    <button class="search-toggle" id="searchToggle" aria-label="Buscar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <div class="search-box" id="searchBox">
                        <form action="<?php echo URLROOT; ?>/search" method="get" style="display: flex; width: 100%;">
                            <input type="text" name="q" placeholder="Buscar..." id="searchInput">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>

                <!-- Login / Profile (icono — desktop y móvil) -->
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <div class="user-info desktop-only">
                        <span class="user-greeting"><?php echo _t('nav.hello'); ?>, <?php echo h(explode(' ', $_SESSION['user_name'])[0]); ?></span>
                        <a href="<?php echo URLROOT; ?>/users/dashboard" class="nav-btn-outline" style="padding: 0.5rem 1rem; font-size: 0.8rem; margin: 0 0.5rem; border: 2px solid var(--pink); color: var(--pink); border-radius: 50px;">
                            <i class="fa-solid fa-gauge"></i> <?php echo _t('nav.dashboard'); ?>
                        </a>
                        <a href="<?php echo URLROOT; ?>/users/logout" class="nav-login nav-logout">
                            <i class="fa-solid fa-right-from-bracket"></i> <span class="desktop-only"><?php echo _t('nav.logout'); ?></span>
                        </a>
                    </div>
                    <!-- Icono compacto login en móvil -->
                    <a href="<?php echo URLROOT; ?>/users/dashboard" class="nav-icon-btn mobile-only" aria-label="Dashboard">
                        <i class="fa-solid fa-gauge"></i>
                    </a>
                <?php else : ?>
                    <a href="<?php echo URLROOT; ?>/users/login" class="nav-login desktop-only">
                        <i class="fa-solid fa-user"></i> <span><?php echo _t('nav.login'); ?></span>
                    </a>
                    <!-- Icono compacto en móvil -->
                    <a href="<?php echo URLROOT; ?>/users/login" class="nav-icon-btn mobile-only" aria-label="Ingresar">
                        <i class="fa-solid fa-user"></i>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Botón Hamburguesa (solo móvil) -->
            <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú" aria-expanded="false">
                <i class="fa-solid fa-bars" id="menuIcon"></i>
            </button>
        </div>
    </nav>
    <div class="nav-overlay" id="navOverlay" aria-hidden="true"></div>
    <div class="main-wrapper">
