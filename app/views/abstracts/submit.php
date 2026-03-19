<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="abstract-section" style="padding-top: calc(100px + 5rem); padding-bottom: 5rem; background: var(--purple); min-height: 100vh;">
    <div class="container">
        <div class="abstract-form-card" style="max-width: 900px; margin: 0 auto; background: var(--white); border-radius: 20px; box-shadow: var(--shadow-hover); overflow: hidden;">
            <div class="form-header" style="background: var(--pink); color: var(--white); padding: 3rem; text-align: center;">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin-bottom: 0.5rem;">Enviar Resumen</h2>
                <p style="font-size: 1.1rem; opacity: 0.9;">Presente su trabajo de investigación para la 56ª Reunión Anual ONTA</p>
            </div>
            <div class="form-body" style="padding: 3.5rem;">
                <form action="<?php echo URLROOT; ?>/abstracts/submit" method="post">
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Título del Trabajo:</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $data['title']; ?>" style="width: 100%; padding: 1rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow);" placeholder="Título en LETRAS MAYÚSCULAS">
                        <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['title_err']; ?></span>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Autor(es):</label>
                        <input type="text" name="authors" class="form-control" value="<?php echo $data['authors']; ?>" style="width: 100%; padding: 1rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow);" placeholder="Ej: Juan Pérez, Roberto Gómez...">
                        <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['authors_err']; ?></span>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Afiliación Institucional:</label>
                        <input type="text" name="affiliation" class="form-control" value="<?php echo $data['affiliation']; ?>" style="width: 100%; padding: 1rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow);" placeholder="Ej: Universidad Nacional del Altiplano, Puno, Perú">
                        <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['affiliation_err']; ?></span>
                    </div>

                    <div class="form-group" style="margin-bottom: 2rem;">
                        <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Resumen (Máx 300 palabras):</label>
                        <textarea name="content" class="form-control" style="width: 100%; padding: 1rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow); min-height: 250px;" placeholder="Ingrese el texto de su resumen aquí..."><?php echo $data['content']; ?></textarea>
                        <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['content_err']; ?></span>
                    </div>

                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-gold" style="padding: 1rem 4rem; font-size: 1.1rem;">
                            Enviar Resumen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
