<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="login-page">
    <div class="login-split">

        <!-- Panel izquierdo: Branding institucional -->
        <div class="login-brand-panel">
            <div class="login-brand-content">
                <div class="login-brand-logo">
                    <img src="<?php echo URLROOT; ?>/img/logos/logo.png" alt="ONTA Peru 2026" class="login-logo-img">
                </div>
                <div class="login-brand-text">
                    <span class="login-badge">Congreso Científico Internacional</span>
                    <h2><?php echo _t('login.brand_title'); ?></h2>
                    <p><?php echo _t('login.brand_subtitle'); ?></p>

                    <div class="login-brand-facts">
                        <div class="login-fact">
                            <span class="login-fact-num">56ª</span>
                            <span class="login-fact-label"><?php echo _t('login.fact_1'); ?></span>
                        </div>
                        <div class="login-fact">
                            <span class="login-fact-num">25+</span>
                            <span class="login-fact-label"><?php echo _t('login.fact_2'); ?></span>
                        </div>
                        <div class="login-fact">
                            <span class="login-fact-num">2026</span>
                            <span class="login-fact-label"><?php echo _t('login.fact_3'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="login-brand-quote">
                    <i class="fa-solid fa-quote-left"></i>
                    <p><?php echo _t('login.quote'); ?></p>
                </div>
            </div>
        </div>

        <!-- Panel derecho: Formulario limpio -->
        <div class="login-form-panel">
            <div class="login-form-inner">
                <div class="login-form-header">
                    <h1><?php echo _t('login.title'); ?></h1>
                    <p><?php echo _t('login.subtitle'); ?></p>
                </div>

                <?php flash('register_success'); ?>
                <?php flash('login_needed'); ?>

                <form action="<?php echo URLROOT; ?>/users/login" method="post" class="login-form" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="login-field">
                        <label for="email">
                            <i class="fa-regular fa-envelope"></i>
                            <?php echo _t('login.email_label'); ?>
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="login-input <?php echo (!empty($data['email_err'])) ? 'input-error' : ''; ?>"
                            value="<?php echo $data['email']; ?>"
                            placeholder="INVESTIGADOR@UNIVERSIDAD.EDU"
                            autocomplete="email"
                            style="text-transform: uppercase;"
                            oninput="this.value = this.value.toUpperCase()"
                        >
                        <?php if (!empty($data['email_err'])): ?>
                        <span class="login-error"><i class="fa-solid fa-circle-exclamation"></i> <?php echo $data['email_err']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="login-field">
                        <label for="password">
                            <i class="fa-solid fa-lock"></i>
                            <?php echo _t('login.password_label'); ?>
                        </label>
                        <div class="login-password-wrap">
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="login-input <?php echo (!empty($data['password_err'])) ? 'input-error' : ''; ?>"
                                placeholder="••••••••••"
                                autocomplete="current-password"
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword()" title="Mostrar/ocultar contraseña">
                                <i class="fa-regular fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        <?php if (!empty($data['password_err'])): ?>
                        <span class="login-error"><i class="fa-solid fa-circle-exclamation"></i> <?php echo $data['password_err']; ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="login-submit-btn">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <?php echo _t('login.btn_submit'); ?>
                    </button>
                </form>

                <div class="login-form-footer">
                    <p><?php echo _t('login.no_account'); ?> <a href="<?php echo URLROOT; ?>/pages/inscriptions?action=register"><?php echo _t('login.register_link'); ?></a></p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
function togglePassword() {
    const pass = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    if (pass.type === 'password') {
        pass.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        pass.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
