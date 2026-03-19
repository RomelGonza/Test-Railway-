<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="admin-dashboard" style="padding-top: calc(100px + 5rem); padding-bottom: 5rem; background: #f4f7f6; min-height: 100vh;">
    <div class="container">
        <div style="display: flex; gap: 2rem; align-items: flex-start;">
            <!-- Sidebar -->
            <div style="width: 250px; background: var(--purple); border-radius: 16px; padding: 2rem; color: white;">
                <h3 style="font-size: 1.2rem; margin-bottom: 2rem; border-bottom: 1px solid var(--coral); padding-bottom: 1rem;">Panel Admin</h3>
                <ul style="list-style: none;">
                    <li style="margin-bottom: 1rem;"><a href="<?php echo URLROOT; ?>/admin" style="color: var(--pink); font-weight: 700;"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
                    <li style="margin-bottom: 1rem;"><a href="<?php echo URLROOT; ?>/admin/inscriptions" style="color: var(--yellow);"><i class="fa-solid fa-file-invoice-dollar"></i> Inscripciones</a></li>
                    <li style="margin-bottom: 1rem;"><a href="<?php echo URLROOT; ?>/admin/abstracts" style="color: var(--yellow);"><i class="fa-solid fa-book"></i> Resúmenes</a></li>
                    <li style="margin-bottom: 1rem;"><a href="<?php echo URLROOT; ?>/users/logout" style="color: var(--coral);"><i class="fa-solid fa-power-off"></i> Salir</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div style="flex: 1;">
                <h2 style="font-family: 'Playfair Display', serif; color: var(--purple); font-size: 2.5rem; margin-bottom: 2rem;">Resumen General</h2>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div style="background: white; padding: 2.5rem; border-radius: 20px; box-shadow: var(--shadow); border-left: 8px solid var(--pink);">
                        <h4 style="color: var(--text-body); font-size: 1rem; text-transform: uppercase;">Inscripciones</h4>
                        <p style="font-size: 3.5rem; font-weight: 800; color: var(--purple);"><?php echo $data['inscriptions_count']; ?></p>
                        <a href="<?php echo URLROOT; ?>/admin/inscriptions" style="color: var(--pink); font-weight: 600;">Ver todas <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div style="background: white; padding: 2.5rem; border-radius: 20px; box-shadow: var(--shadow); border-left: 8px solid var(--coral);">
                        <h4 style="color: var(--text-body); font-size: 1rem; text-transform: uppercase;">Resúmenes Enviados</h4>
                        <p style="font-size: 3.5rem; font-weight: 800; color: var(--purple);"><?php echo $data['abstracts_count']; ?></p>
                        <a href="<?php echo URLROOT; ?>/admin/abstracts" style="color: var(--pink); font-weight: 600;">Ver todos <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
