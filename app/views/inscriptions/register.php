<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="registration-section" style="padding-top: calc(100px + 5rem); padding-bottom: 5rem; background: var(--purple); min-height: 100vh;">
    <div class="container">
        <div class="registration-form-card" style="max-width: 800px; margin: 0 auto; background: var(--white); border-radius: 20px; box-shadow: var(--shadow-hover); overflow: hidden;">
            <div class="form-header" style="background: var(--pink); color: var(--white); padding: 3rem; text-align: center;">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin-bottom: 0.5rem;">Formulario de Inscripción</h2>
                <p style="font-size: 1.1rem; opacity: 0.9;">Complete sus datos para participar en la 56ª Reunión Anual ONTA</p>
            </div>
            <div class="form-body" style="padding: 3.5rem;">
                <form action="<?php echo URLROOT; ?>/inscriptions/register" method="post" enctype="multipart/form-data">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Nombre Completo:</label>
                            <input type="text" name="full_name" class="form-control" value="<?php echo $data['full_name']; ?>" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow);">
                            <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['full_name_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow);">
                            <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['email_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Teléfono / WhatsApp:</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $data['phone']; ?>" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow);" placeholder="+51 000 000 000">
                            <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['phone_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">País:</label>
                            <input type="text" name="country" class="form-control" value="<?php echo $data['country']; ?>" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow);">
                            <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['country_err']; ?></span>
                        </div>
                        <div class="form-group" style="grid-column: span 2;">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Institución / Universidad:</label>
                            <input type="text" name="institution" class="form-control" value="<?php echo $data['institution']; ?>" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 1px solid var(--peach); background: var(--yellow);">
                            <span style="color: var(--pink); font-size: 0.8rem;"><?php echo $data['institution_err']; ?></span>
                        </div>
                        <div class="form-group" style="grid-column: span 2;">
                            <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--purple);">Comprobante de Pago (Imagen/PDF):</label>
                            <input type="file" name="payment_receipt" class="form-control" style="width: 100%; padding: 0.8rem; border-radius: 8px; border: 2px dashed var(--peach); background: var(--white); cursor: pointer;">
                            <p style="font-size: 0.8rem; color: var(--text-body); margin-top: 0.5rem;">Adjunte una foto o captura del voucher de pago o transferencia.</p>
                        </div>
                    </div>
                    <div style="margin-top: 3rem; text-align: center;">
                        <button type="submit" class="btn btn-gold" style="padding: 1rem 4rem; font-size: 1.1rem;">
                            <i class="fa-solid fa-paper-plane"></i> Enviar Inscripción
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
