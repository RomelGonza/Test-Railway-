<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="search-results-section" style="padding-top: calc(100px + 5rem); padding-bottom: 5rem; min-height: 80vh; background: var(--ivory);">
    <div class="container">
        <!-- Search Header -->
        <header class="search-page-header" style="text-align: center; margin-bottom: 4rem;">
            <span class="why-badge">Busqueda Científica</span>
            <h1 class="section-title">Resultados para: <span class="accent">"<?php echo htmlspecialchars($data['query']); ?>"</span></h1>
            <p class="section-subtitle">Hemos encontrado <?php echo $data['total_count']; ?> coincidencias en nuestra plataforma.</p>
            
            <form action="<?php echo URLROOT; ?>/search" method="get" style="max-width: 600px; margin: 2rem auto; position: relative;">
                <input type="text" name="q" value="<?php echo htmlspecialchars($data['query']); ?>" 
                       style="width: 100%; padding: 1.2rem 2rem; border-radius: 50px; border: 2px solid var(--cream); box-shadow: var(--shadow); font-family: var(--font-sans); outline: none; transition: var(--transition);" 
                       placeholder="Nueva búsqueda...">
                <button type="submit" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: var(--pink); color: white; border: none; width: 45px; height: 45px; border-radius: 50%; cursor: pointer; transition: var(--transition);">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </header>

        <div class="search-grid" style="display: grid; grid-template-columns: 300px 1fr; gap: 3rem;">
            <!-- Filters/Sidebar -->
            <aside class="search-sidebar">
                <div style="background: white; padding: 2rem; border-radius: 24px; box-shadow: var(--shadow); position: sticky; top: 120px;">
                    <h3 style="font-family: var(--font-serif); margin-bottom: 1.5rem; color: var(--text-dark);">Filtrar por</h3>
                    
                    <ul class="search-filters" style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 1rem;">
                            <a href="#all" class="filter-link active" style="display: flex; align-items: center; justify-content: space-between; padding: 0.8rem 1rem; border-radius: 12px; background: rgba(196, 30, 90, 0.05); color: var(--pink); font-weight: 600;">
                                <span><i class="fa-solid fa-layer-group" style="margin-right: 0.8rem;"></i> Todos</span>
                                <span style="font-size: 0.8rem; background: var(--pink); color: white; padding: 2px 8px; border-radius: 10px;"><?php echo $data['total_count']; ?></span>
                            </a>
                        </li>
                        <li style="margin-bottom: 1rem;">
                            <a href="#pages" class="filter-link" style="display: flex; align-items: center; justify-content: space-between; padding: 0.8rem 1rem; border-radius: 12px; transition: var(--transition); color: var(--text-muted);">
                                <span><i class="fa-solid fa-file-lines" style="margin-right: 0.8rem;"></i> Páginas</span>
                                <span style="font-size: 0.8rem; background: var(--cream); color: var(--text-dark); padding: 2px 8px; border-radius: 10px;"><?php echo count($data['static_results']); ?></span>
                            </a>
                        </li>
                        <li style="margin-bottom: 1rem;">
                            <a href="#content" class="filter-link" style="display: flex; align-items: center; justify-content: space-between; padding: 0.8rem 1rem; border-radius: 12px; transition: var(--transition); color: var(--text-muted);">
                                <span><i class="fa-solid fa-flask-vial" style="margin-right: 0.8rem;"></i> Contenido</span>
                                <span style="font-size: 0.8rem; background: var(--cream); color: var(--text-dark); padding: 2px 8px; border-radius: 10px;"><?php echo count($data['db_results']); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Results Listing -->
            <main class="search-main">
                <?php if ($data['total_count'] == 0): ?>
                    <div style="text-align: center; padding: 5rem 2rem; background: white; border-radius: 32px; box-shadow: var(--shadow);">
                        <div class="sci-icon-box sci-icon-box--pink" style="width: 100px; height: 100px; margin: 0 auto 2rem; font-size: 3rem; background: var(--cream); color: var(--pink);">
                            <i class="fa-solid fa-face-frown"></i>
                        </div>
                        <h2 style="font-family: var(--font-serif); margin-bottom: 1rem;">No encontramos coincidencias</h2>
                        <p style="color: var(--text-muted);">Pruebe con otros términos o términos más generales.</p>
                    </div>
                <?php else: ?>
                    
                    <!-- Static Page Results -->
                    <?php if (count($data['static_results']) > 0): ?>
                    <div class="result-group" id="pages" style="margin-bottom: 4rem;">
                        <h3 style="font-family: var(--font-serif); margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 2px solid var(--cream); display: flex; align-items: center; gap: 1rem;">
                            <i class="fa-solid fa-file-lines" style="color: var(--pink);"></i> Secciones del Sitio
                        </h3>
                        <div class="results-list" style="display: grid; gap: 1.5rem;">
                            <?php foreach($data['static_results'] as $result): ?>
                                <a href="<?php echo $this->mapResultToLink($result['id']); ?>" class="search-result-card" style="display: block; background: white; padding: 2rem; border-radius: 20px; box-shadow: var(--shadow); transition: var(--transition); border: 1px solid transparent; text-decoration: none;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem;">
                                        <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--pink); font-weight: 700;"><?php echo $result['result_subtitle']; ?></span>
                                        <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.8rem; color: var(--cream);"></i>
                                    </div>
                                    <h4 style="color: var(--text-dark); font-size: 1.25rem; margin-bottom: 0.5rem;"><?php echo $result['result_title']; ?></h4>
                                    <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">Encontrado en la sección de información general del congreso.</p>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Database Results -->
                    <?php if (count($data['db_results']) > 0): ?>
                    <div class="result-group" id="content" style="margin-bottom: 4rem;">
                        <h3 style="font-family: var(--font-serif); margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 2px solid var(--cream); display: flex; align-items: center; gap: 1rem;">
                            <i class="fa-solid fa-flask-vial" style="color: var(--purple);"></i> Contenido Científico y Agenda
                        </h3>
                        <div class="results-list" style="display: grid; gap: 1.5rem;">
                            <?php foreach($data['db_results'] as $result): ?>
                                <div class="search-result-card" style="background: white; padding: 2rem; border-radius: 20px; box-shadow: var(--shadow); transition: var(--transition); border: 1px solid transparent;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem;">
                                        <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--purple); font-weight: 700;">
                                            <?php echo $result->category == 'abstracts' ? 'Resumen Científico' : ($result->category == 'agenda' ? 'Actividad / Agenda' : 'Galería'); ?>
                                        </span>
                                        <span style="background: var(--cream); padding: 4px 12px; border-radius: 10px; font-size: 0.7rem; font-weight: 600; color: var(--text-dark);">ID: #<?php echo $result->id; ?></span>
                                    </div>
                                    <h4 style="color: var(--text-dark); font-size: 1.25rem; margin-bottom: 0.5rem;"><?php echo $result->result_title; ?></h4>
                                    <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0;">
                                        <i class="fa-solid fa-user-tie" style="margin-right: 0.5rem; color: var(--pink);"></i> <?php echo $result->result_subtitle; ?>
                                    </p>
                                    <?php if($result->category == 'abstracts'): ?>
                                    <a href="<?php echo URLROOT; ?>/pages/abstracts" class="btn-text" style="display: inline-block; margin-top: 1rem; color: var(--pink); font-weight: 700; font-size: 0.85rem; text-decoration: none;">Ver panel de resúmenes <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i></a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                <?php endif; ?>
            </main>
        </div>
    </div>
</section>

<style>
.search-result-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(196, 30, 90, 0.2);
}
.filter-link:not(.active):hover {
    background: rgba(0,0,0,0.02);
    color: var(--text-dark);
}
.btn-text:hover {
    text-decoration: underline;
}

@media (max-width: 992px) {
    .search-grid {
        grid-template-columns: 1fr;
    }
    .search-sidebar {
        display: none;
    }
}
</style>

<?php require APPROOT . '/views/inc/footer.php'; ?>
