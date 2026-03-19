<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="abstract-list" style="padding-top: calc(100px + 5rem); padding-bottom: 5rem; background: var(--purple); min-height: 100vh;">
    <div class="container">
        <div class="list-card" style="max-width: 1000px; margin: 0 auto; background: var(--white); border-radius: 20px; box-shadow: var(--shadow-hover); overflow: hidden;">
            <div class="list-header" style="background: var(--pink); color: var(--white); padding: 3rem; text-align: center;">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin-bottom: 0.5rem;">Mis Resúmenes</h2>
                <p style="font-size: 1.1rem; opacity: 0.9;">Haga un seguimiento de sus trabajos científicos</p>
            </div>
            <div class="list-body" style="padding: 3.5rem;">
                <!-- Flash Messages -->
                <?php flash('abstract_success'); ?>

                <?php if (empty($data['abstracts'])): ?>
                    <div style="text-align: center; padding: 3rem;">
                        <i class="fa-solid fa-file-circle-question" style="font-size: 4rem; color: var(--peach); margin-bottom: 1rem;"></i>
                        <p style="font-size: 1.2rem; color: var(--text-body);">No ha enviado ningún resumen todavía.</p>
                        <a href="<?php echo URLROOT; ?>/abstracts/submit" class="btn btn-gold" style="margin-top: 1.5rem;">
                            <i class="fa-solid fa-plus"></i> Enviar nuevo resumen
                        </a>
                    </div>
                <?php
else: ?>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 1rem; color: var(--purple);">
                        <thead>
                            <tr style="border-bottom: 2px solid var(--peach);">
                                <th style="padding: 1.2rem; text-align: left;">Título</th>
                                <th style="padding: 1.2rem; text-align: left;">Fecha</th>
                                <th style="padding: 1.2rem; text-align: left;">Estado</th>
                                <th style="padding: 1.2rem; text-align: center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['abstracts'] as $abstract): ?>
                                <tr style="border-bottom: 1px solid var(--yellow); transition: background 0.3s; cursor: pointer;">
                                    <td style="padding: 1.2rem; font-weight: 600; max-width: 400px;"><?php echo $abstract->title; ?></td>
                                    <td style="padding: 1.2rem;"><?php echo date('d/m/Y', strtotime($abstract->created_at)); ?></td>
                                    <td style="padding: 1.2rem;">
                                        <?php if ($abstract->status == 'pending'): ?>
                                            <span style="background: var(--yellow); padding: 0.3rem 0.8rem; border-radius: 50px; font-size: 0.8rem; font-weight: 700;">En Revisión</span>
                                        <?php
        elseif ($abstract->status == 'accepted'): ?>
                                            <span style="background: #a8f0ad; color: #155724; padding: 0.3rem 0.8rem; border-radius: 50px; font-size: 0.8rem; font-weight: 700;">Aceptado</span>
                                        <?php
        else: ?>
                                            <span style="background: var(--coral); color: white; padding: 0.3rem 0.8rem; border-radius: 50px; font-size: 0.8rem; font-weight: 700;">Rechazado</span>
                                        <?php
        endif; ?>
                                    </td>
                                    <td style="padding: 1.2rem; text-align: center;">
                                        <a href="#" class="btn btn-gold" style="padding: 0.5rem 1rem; font-size: 0.8rem;">
                                            <i class="fa-solid fa-file-lines"></i> Ver Texto
                                        </a>
                                    </td>
                                </tr>
                            <?php
    endforeach; ?>
                        </tbody>
                    </table>
                <?php
endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
