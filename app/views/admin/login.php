<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONTA 2026 | Admin Portal</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/img/logo_onta.png" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,600;1,8..60,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --ont-purple: #2d3436;
            --ont-pink: #d63031;
            --ont-text: #636e72;
            --ont-bg: #f5f6fa;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #1e272e, #2d3436);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            background: white;
            padding: 3rem 4rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
        }

        .login-wrapper h2 {
            font-family: 'Source Serif 4', serif;
            color: var(--ont-purple);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .login-wrapper p {
            color: var(--ont-text);
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--ont-purple);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #dfe6e9;
            border-radius: 12px;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            box-sizing: border-box;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #0984e3;
        }

        .invalid-feedback {
            color: var(--ont-pink);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: block;
        }

        .btn-admin {
            width: 100%;
            background: #0984e3;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1.1rem;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 1rem;
        }

        .btn-admin:hover {
            background: #74b9ff;
        }

        .logo-box {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .logo-box img {
            width: 50px;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="logo-box">
            <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA">
        </div>

        <h2 style="margin-top: 1rem;">Admin Portal</h2>
        <p>Acceso exclusivo para el Comité Ejecutivo</p>

        <form action="<?php echo URLROOT; ?>/onta_admin/login" method="POST">
            <div class="form-group">
                <label for="email">Correo Institucional</label>
                <input type="email" name="email" id="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($data['email']); ?>" required autofocus style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="password">Contraseña Maestra</label>
                <input type="password" name="password" id="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" required>
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>

            <button type="submit" class="btn-admin">
                <i class="fa-solid fa-shield-halved"></i> Ingresar al Sistema
            </button>
        </form>
    </div>

</body>
</html>
