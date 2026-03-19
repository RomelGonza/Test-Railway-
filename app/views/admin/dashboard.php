<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONTA 2026 · Panel de Administración</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/img/logo_onta.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Source+Serif+4:opsz,wght@8..60,400;8..60,600;8..60,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* ============================================================
           ONTA 2026 — Panel Administrativo · Design System Dark
           ============================================================ */
        :root {
            --bg:        #0f0d14;
            --surface:   #161220;
            --surface2:  #1e1a2e;
            --border:    rgba(255,255,255,0.07);
            --border2:   rgba(255,255,255,0.12);
            --pink:      #C41E5A;
            --pink-g:    #e0285e;
            --pink-dim:  rgba(196,30,90,0.15);
            --blue:      #3b82f6;
            --blue-dim:  rgba(59,130,246,0.12);
            --green:     #22c55e;
            --green-dim: rgba(34,197,94,0.12);
            --yellow:    #eab308;
            --yellow-dim:rgba(234,179,8,0.12);
            --red:       #ef4444;
            --red-dim:   rgba(239,68,68,0.12);
            --text:      #e2dff0;
            --muted:     #7c7a90;
            --sidebar-w: 260px;
            --radius:    16px;
            --shadow:    0 8px 30px rgba(0,0,0,0.5);
            --transition:all 0.25s cubic-bezier(0.4,0,0.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            line-height: 1.55;
        }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(196,30,90,0.3); border-radius: 3px; }

        /* ──────────────────────────────────
           SIDEBAR
        ────────────────────────────────── */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--surface);
            border-right: 1px solid var(--border);
            position: fixed;
            inset: 0 auto 0 0;
            display: flex;
            flex-direction: column;
            padding: 1.75rem 1.25rem;
            z-index: 100;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding-bottom: 1.75rem;
            border-bottom: 1px solid var(--border);
            margin-bottom: 1.5rem;
            text-decoration: none;
        }

        .brand-logo {
            width: 42px; height: 42px;
            border-radius: 12px;
            background: var(--pink-dim);
            border: 1px solid rgba(196,30,90,0.3);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .brand-logo img { width: 26px; filter: brightness(0) invert(1); }

        .brand-text strong { display: block; font-size: 1rem; color: #fff; letter-spacing: 0.2px; }
        .brand-text small  { font-size: 0.65rem; color: var(--muted); text-transform: uppercase; letter-spacing: 1.5px; }

        /* User badge */
        .admin-badge {
            background: var(--surface2);
            border: 1px solid var(--border2);
            border-radius: 14px;
            padding: 1rem 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.85rem;
            margin-bottom: 1.75rem;
        }

        .admin-avatar {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--pink), #ff6b9d);
            color: #fff;
            font-size: 1.2rem;
            font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(196,30,90,0.35);
        }

        .admin-badge-info h4 { font-size: 0.88rem; color: #fff; margin-bottom: 0.15rem; font-weight: 600; }
        .admin-badge-info span { font-size: 0.62rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--pink); font-weight: 700; }

        /* Nav */
        .nav-label {
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--muted);
            padding: 0.5rem 0.5rem 0.3rem;
            margin-top: 0.75rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.75rem 1rem;
            color: var(--muted);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.88rem;
            transition: var(--transition);
            margin-bottom: 0.2rem;
            cursor: pointer;
            border: 1px solid transparent;
        }
        .nav-link i { width: 18px; text-align: center; font-size: 0.95rem; }
        .nav-link:hover { color: #fff; background: rgba(255,255,255,0.05); }
        .nav-link.active {
            color: #fff;
            background: var(--pink-dim);
            border-color: rgba(196,30,90,0.25);
        }
        .nav-link.active i { color: var(--pink); }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding-top: 1.25rem;
        }
        .sidebar-footer p { font-size: 0.68rem; color: var(--muted); text-align: center; line-height: 1.5; }

        /* ──────────────────────────────────
           MAIN
        ────────────────────────────────── */
        .main {
            margin-left: var(--sidebar-w);
            width: calc(100% - var(--sidebar-w));
            min-width: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Topbar */
        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-title { font-size: 0.9rem; color: var(--muted); font-weight: 500; }
        .topbar-title span { color: var(--pink); font-weight: 700; }

        .topbar-actions { display: flex; align-items: center; gap: 1rem; }

        .btn-site {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 1.1rem;
            border-radius: 10px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--muted);
            border: 1px solid var(--border2);
            background: var(--surface2);
            transition: var(--transition);
        }
        .btn-site:hover { color: #fff; border-color: rgba(255,255,255,0.2); }

        .btn-logout-top {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 1.1rem;
            border-radius: 10px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            color: var(--red);
            border: 1px solid rgba(239,68,68,0.25);
            background: var(--red-dim);
            transition: var(--transition);
        }
        .btn-logout-top:hover { background: var(--red); color: #fff; }

        /* Content */
        .content { padding: 2.5rem; flex: 1; }

        /* ──────────────────────────────────
           SECTIONS
        ────────────────────────────────── */
        .admin-section { display: none; animation: fadeUp 0.3s ease; }
        .admin-section.active { display: block; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ──────────────────────────────────
           WELCOME PANEL
        ────────────────────────────────── */
        .welcome-banner {
            background: linear-gradient(135deg, var(--surface2) 0%, #1a0f2e 100%);
            border: 1px solid var(--border2);
            border-radius: 24px;
            padding: 2.5rem 3rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }
        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 250px; height: 250px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(196,30,90,0.18), transparent 70%);
        }
        .welcome-banner h1 {
            font-family: 'Source Serif 4', serif;
            font-size: 2.2rem;
            color: #fff;
            margin-bottom: 0.5rem;
            position: relative;
        }
        .welcome-banner p { color: var(--muted); font-size: 1rem; max-width: 580px; position: relative; line-height: 1.7; }
        .welcome-banner .ghost {
            position: absolute; right: 2rem; top: 50%;
            transform: translateY(-50%);
            font-size: 9rem;
            opacity: 0.06;
            color: var(--pink);
        }

        /* ──────────────────────────────────
           KPI CARDS
        ────────────────────────────────── */
        .kpi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .kpi-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem 1.75rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            transition: var(--transition);
        }
        .kpi-card:hover { border-color: var(--border2); transform: translateY(-3px); box-shadow: var(--shadow); }

        .kpi-icon {
            width: 50px; height: 50px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .kpi-label { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); margin-bottom: 0.3rem; }
        .kpi-value { font-size: 2rem; font-weight: 800; color: #fff; font-family: 'Source Serif 4', serif; line-height: 1; }

        /* System status card */
        .status-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }
        .status-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 10px var(--green);
            animation: pulse 2s infinite;
            flex-shrink: 0;
        }
        @keyframes pulse {
            0%,100% { opacity: 1; }
            50%      { opacity: 0.5; }
        }
        .status-card h4 { color: var(--green); font-size: 0.95rem; margin-bottom: 0.25rem; }
        .status-card p  { color: var(--muted); font-size: 0.85rem; margin: 0; }

        /* ──────────────────────────────────
           SECTION HEADER
        ────────────────────────────────── */
        .sec-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.75rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid var(--border);
        }
        .sec-header h2 {
            font-family: 'Source Serif 4', serif;
            color: #fff;
            font-size: 1.6rem;
        }

        .count-pill {
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* ──────────────────────────────────
           TABLES
        ────────────────────────────────── */
        .table-wrap { overflow-x: auto; border-radius: var(--radius); border: 1px solid var(--border); }

        table.adm-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.88rem;
        }

        .adm-table thead tr {
            background: var(--surface2);
            border-bottom: 1px solid var(--border2);
        }

        .adm-table th {
            padding: 0.85rem 1.25rem;
            text-align: left;
            color: var(--muted);
            text-transform: uppercase;
            font-size: 0.68rem;
            letter-spacing: 1.2px;
            font-weight: 700;
            white-space: nowrap;
        }

        .adm-table td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
            color: var(--text);
        }

        .adm-table tbody tr:last-child td { border-bottom: none; }
        .adm-table tbody tr { transition: background 0.2s; }
        .adm-table tbody tr:hover { background: rgba(255,255,255,0.02); }

        .td-id { color: var(--muted); font-size: 0.78rem; font-weight: 700; }
        .td-name { font-weight: 700; color: #fff; margin-bottom: 0.2rem; }
        .td-sub  { font-size: 0.78rem; color: var(--muted); display: flex; align-items: center; gap: 0.35rem; margin-top: 0.2rem; }
        .td-sub i { font-size: 0.7rem; }
        .td-mono { font-family: monospace; font-size: 0.82rem; background: rgba(255,255,255,0.04); padding: 0.15rem 0.5rem; border-radius: 5px; }

        /* Pills */
        .pill {
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            display: inline-block;
        }
        .pill-blue   { background: var(--blue-dim);   color: var(--blue); }
        .pill-purple { background: rgba(139,92,246,0.12); color: #a78bfa; }

        /* Action buttons */
        .action-btns { display: flex; gap: 0.35rem; }

        .act-btn {
            width: 34px; height: 34px;
            border-radius: 9px;
            border: 1.5px solid var(--border2);
            background: transparent;
            color: var(--muted);
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem;
            transition: var(--transition);
        }
        .act-btn:hover { color: #fff; }
        .act-btn.approve.on  { background: var(--green-dim);  color: var(--green);  border-color: rgba(34,197,94,0.35); }
        .act-btn.approve:hover { background: var(--green); color: #fff; border-color: var(--green); }
        .act-btn.pending.on  { background: var(--yellow-dim); color: var(--yellow); border-color: rgba(234,179,8,0.35); }
        .act-btn.pending:hover { background: var(--yellow); color: #fff; border-color: var(--yellow); }
        .act-btn.reject.on   { background: var(--red-dim);   color: var(--red);    border-color: rgba(239,68,68,0.35); }
        .act-btn.reject:hover { background: var(--red); color: #fff; border-color: var(--red); }

        /* PDF / Voucher Link */
        .file-link {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.4rem 0.9rem;
            border-radius: 9px;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }
        .file-link.pdf    { background: var(--red-dim);  color: var(--red);  border: 1px solid rgba(239,68,68,0.25); }
        .file-link.pdf:hover { background: var(--red); color: #fff; }
        .file-link.voucher{ background: var(--blue-dim); color: var(--blue); border: 1px solid rgba(59,130,246,0.25); }
        .file-link.voucher:hover { background: var(--blue); color: #fff; }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            color: var(--muted);
        }
        .empty-state h3 { font-size: 1.1rem; color: var(--muted); margin-bottom: 0.3rem; }
        .empty-state p  { font-size: 0.87rem; }

        /* ──────────────────────────────────
           SEARCH & PAGINATION
        ────────────────────────────────── */
        .table-controls {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 1.5rem; gap: 1rem;
        }
        .search-box {
            position: relative; flex: 1; max-width: 400px;
        }
        .search-box i {
            position: absolute; left: 1rem; top: 50%; transform: translateY(-50%);
            color: var(--muted); font-size: 0.9rem;
        }
        .search-input {
            width: 100%; background: var(--surface2); border: 1px solid var(--border);
            border-radius: 12px; padding: 0.75rem 1rem 0.75rem 2.8rem;
            color: #fff; font-family: inherit; font-size: 0.88rem; transition: var(--transition);
        }
        .search-input:focus { border-color: var(--pink); outline: none; box-shadow: 0 0 0 3px var(--pink-dim); }

        .pagination {
            display: flex; align-items: center; gap: 0.5rem;
        }
        .pg-btn {
            min-width: 36px; height: 36px; padding: 0 0.5rem;
            border-radius: 8px; border: 1px solid var(--border);
            background: var(--surface2); color: var(--muted);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-weight: 600; font-size: 0.82rem; transition: var(--transition);
        }
        .pg-btn:hover:not(:disabled) { border-color: var(--pink); color: #fff; }
        .pg-btn.active { background: var(--pink); color: #fff; border-color: var(--pink); }
        .pg-btn:disabled { opacity: 0.3; cursor: not-allowed; }
        .pg-info { font-size: 0.8rem; color: var(--muted); font-weight: 500; margin: 0 0.5rem; }

        /* ──────────────────────────────────
           MODALS
        ────────────────────────────────── */
        .modal-overlay {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.85);
            backdrop-filter: blur(8px);
            display: none; align-items: center; justify-content: center;
            z-index: 1000; padding: 2rem;
        }
        .modal-overlay.active { display: flex; }

        .modal-box {
            background: var(--surface2);
            border: 1px solid var(--border2);
            border-radius: 24px;
            width: 100%; max-width: 800px;
            max-height: 90vh; overflow-y: auto;
            position: relative;
            box-shadow: 0 20px 60px rgba(0,0,0,0.8);
            animation: modalIn 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.95) translateY(10px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }

        .modal-header {
            padding: 1.75rem 2.5rem;
            border-bottom: 1px solid var(--border);
            display: flex; justify-content: space-between; align-items: center;
            position: sticky; top: 0; background: var(--surface2); z-index: 10;
        }
        .modal-header h3 { font-family: 'Source Serif 4', serif; font-size: 1.5rem; }
        .modal-close { background: transparent; border: none; color: var(--muted); font-size: 1.5rem; cursor: pointer; }

        .modal-content { padding: 2.5rem; }

        /* Grid for details */
        .details-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem; }
        .detail-item label { display: block; font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; color: var(--pink); font-weight: 800; margin-bottom: 0.5rem; }
        .detail-item p { font-size: 1rem; color: #fff; font-weight: 500; }

        .sec-title { border-left: 4px solid var(--pink); padding-left: 1rem; margin: 2rem 0 1rem; font-size: 1.1rem; color: #fff; font-family: 'Source Serif 4', serif; }

        /* Form in modal */
        .adm-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
        .adm-field { margin-bottom: 1.25rem; }
        .adm-field label { display: block; font-size: 0.75rem; font-weight: 700; color: var(--muted); margin-bottom: 0.5rem; }
        .adm-input {
            width: 100%; padding: 0.85rem 1.1rem; background: var(--bg); border: 1px solid var(--border);
            border-radius: 12px; color: #fff; font-family: inherit; font-size: 0.95rem; transition: var(--transition);
        }
        .adm-input:focus { border-color: var(--pink); outline: none; box-shadow: 0 0 0 3px var(--pink-dim); }

        .btn-save {
            background: var(--pink); color: #fff; border: none; padding: 1rem 2.5rem;
            border-radius: 12px; font-weight: 700; cursor: pointer; width: 100%;
            font-family: inherit; margin-top: 1rem; transition: var(--transition);
        }
        .btn-save:hover { background: var(--pink-g); transform: translateY(-2px); }
    </style>
</head>
<body>

<!-- ────────────── SIDEBAR ────────────── -->
<aside class="sidebar">
    <a href="<?php echo URLROOT; ?>" class="brand">
        <div class="brand-logo">
            <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA">
        </div>
        <div class="brand-text">
            <strong>ONTA Admin</strong>
            <small>Centro de Control</small>
        </div>
    </a>

    <div class="admin-badge">
        <div class="admin-avatar"><?php echo strtoupper(substr($_SESSION['admin_name'], 0, 1)); ?></div>
        <div class="admin-badge-info">
            <h4><?php echo htmlspecialchars($_SESSION['admin_name']); ?></h4>
            <span>Comité Ejecutivo</span>
        </div>
    </div>

    <nav>
        <div class="nav-label">General</div>
        <a href="#dashboard" class="nav-link active"><i class="fa-solid fa-chart-pie"></i> Vista General</a>
        <div class="nav-label">Gestión</div>
        <a href="#inscripciones" class="nav-link"><i class="fa-solid fa-users"></i> Inscripciones</a>
        <a href="#resumenes" class="nav-link"><i class="fa-solid fa-file-pdf"></i> Resúmenes</a>
        <a href="#pagos" class="nav-link"><i class="fa-solid fa-receipt"></i> Control de Pagos</a>
        <a href="#asistencias" class="nav-link"><i class="fa-solid fa-clipboard-user"></i> Asistencias</a>
    </nav>

    <div class="sidebar-footer">
        <p>&copy; <?php echo date('Y'); ?> ONTA · Puno, Perú<br>Sistema Administrativo v2.0</p>
    </div>
</aside>

<!-- ────────────── MAIN ────────────── -->
<div class="main">

    <!-- Topbar -->
    <header class="topbar">
        <div class="topbar-title"><span>Panel Central</span> de Administración · ONTA 2026</div>
        <div class="topbar-actions">
            <a href="<?php echo URLROOT; ?>" class="btn-site" target="_blank">
                <i class="fa-solid fa-globe"></i> Ver Sitio Web
            </a>
            <a href="<?php echo URLROOT; ?>/onta_admin/logout" class="btn-logout-top">
                <i class="fa-solid fa-power-off"></i> Cerrar Sesión
            </a>
        </div>
    </header>

    <div class="content">

        <!-- ═══ DASHBOARD ═══ -->
        <div id="dashboard" class="admin-section active">

            <div class="welcome-banner">
                <h1>Hola, <?php echo explode(' ', $_SESSION['admin_name'])[0]; ?> 👋</h1>
                <p>Bienvenido al Centro de Control de <strong style="color:#fff;">ONTA 2026</strong>. Desde aquí puedes supervisar y gestionar todas las áreas operativas del congreso.</p>
                <i class="fa-solid fa-shield-halved ghost"></i>
            </div>

            <!-- KPIs -->
            <div class="kpi-grid">
                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--blue-dim); color: var(--blue);">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <div class="kpi-label">Investigadores Registrados</div>
                        <div class="kpi-value"><?php echo max(0, count($data['users'] ?? []) - 1); ?></div>
                    </div>
                </div>

                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--yellow-dim); color: var(--yellow);">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <div>
                        <div class="kpi-label">Resúmenes Pendientes</div>
                        <div class="kpi-value">
                            <?php
$pendientes = 0;
foreach ($data['abstracts'] ?? [] as $abs) {
    if (strtolower($abs->estado) == 'pendiente')
        $pendientes++;
}
echo $pendientes;
?>
                        </div>
                    </div>
                </div>

                <div class="kpi-card">
                    <div class="kpi-icon" style="background: var(--green-dim); color: var(--green);">
                        <i class="fa-solid fa-money-check-dollar"></i>
                    </div>
                    <div>
                        <div class="kpi-label">Pagos Verificados</div>
                        <div class="kpi-value">
                            <?php
$pagos_ok = 0;
foreach ($data['inscriptions'] ?? [] as $ins) {
    if (strtolower($ins->payment_status) == 'aprobado')
        $pagos_ok++;
}
echo $pagos_ok;
?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div class="status-card">
                <div class="status-dot"></div>
                <div>
                    <h4>Sistema Operativo · Todos los servicios activos</h4>
                    <p>Los puentes MVC con la base de datos funcionan correctamente. Usa la barra lateral para gestionar la información de los participantes.</p>
                </div>
            </div>
        </div>

        <!-- ═══ INSCRIPCIONES ═══ -->
        <div id="inscripciones" class="admin-section">
            <div class="sec-header">
                <h2>Inscripciones · Gestión de Cuentas</h2>
                <span class="count-pill" style="background: var(--blue-dim); color: var(--blue);">
                    <i class="fa-solid fa-users"></i> <span id="count-inscripciones"><?php echo max(0, count($data['users'] ?? []) - 1); ?></span> registros
                </span>
            </div>

            <div class="table-controls">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search-input table-search" placeholder="Buscar por nombre, DNI, institución o correo..." data-target="table-inscripciones">
                </div>
                <div class="pagination" id="pag-inscripciones"></div>
            </div>

            <div class="table-wrap">
                <table class="adm-table" id="table-inscripciones">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Investigador / DNI</th>
                            <th>Contacto</th>
                            <th>Institución</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['users'] ?? [] as $u):
    if ($u->role == 'admin')
        continue; ?>
                        <tr>
                            <td><span class="td-id">#<?php echo $u->id; ?></span></td>
                            <td>
                                <div class="td-name"><?php echo htmlspecialchars($u->name); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-id-card"></i> <span class="td-mono"><?php echo htmlspecialchars($u->dni); ?></span></div>
                            </td>
                            <td>
                                <div class="td-sub"><i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars($u->email); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-phone"></i> <?php echo htmlspecialchars($u->phone); ?></div>
                            </td>
                            <td>
                                <div style="font-weight:600; color:#fff; font-size:0.88rem;"><?php echo htmlspecialchars($u->university); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($u->department); ?></div>
                            </td>
                            <td>
                                <span class="pill pill-purple"><?php echo str_replace('_', ' ', htmlspecialchars($u->user_category)); ?></span>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <button type="button" onclick="viewUserDetails(<?php echo $u->id; ?>)" title="Ver Todo" class="act-btn approve on">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button type="button" onclick="editUser(<?php echo $u->id; ?>)" title="Editar Datos" class="act-btn pending on">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <form action="<?php echo URLROOT; ?>/onta_admin/deleteUser/<?php echo $u->id; ?>" method="POST" onsubmit="return confirmDelete('esta cuenta de usuario');">
                                        <button type="submit" title="Eliminar Usuario" class="act-btn reject">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php
endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ═══ RESÚMENES ═══ -->
        <div id="resumenes" class="admin-section">
            <div class="sec-header">
                <h2>Resúmenes Científicos</h2>
                <span class="count-pill" style="background: var(--yellow-dim); color: var(--yellow);">
                    <i class="fa-solid fa-file-lines"></i> <span id="count-resumenes"><?php echo count($data['abstracts'] ?? []); ?></span> trabajos
                </span>
            </div>

            <?php if (empty($data['abstracts'])): ?>
                <div class="empty-state">
                    <i class="fa-solid fa-folder-open"></i>
                    <h3>Bandeja Vacía</h3>
                    <p>Aún no se han recibido resúmenes científicos.</p>
                </div>
            <?php
else: ?>
            <div class="table-controls">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search-input table-search" placeholder="Buscar por autor, título o palabras clave..." data-target="table-resumenes">
                </div>
                <div class="pagination" id="pag-resumenes"></div>
            </div>

            <div class="table-wrap">
                <table class="adm-table" id="table-resumenes">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Código</th>
                            <th>Investigador</th>
                            <th>Título</th>
                            <th>Keywords</th>
                            <th>PDF</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['abstracts'] ?? [] as $abs): ?>
                        <tr>
                            <td>
                                <div style="white-space:nowrap; font-size:0.82rem;"><?php echo date('d M Y', strtotime($abs->fecha_envio)); ?></div>
                                <div class="td-sub"><?php echo date('H:i', strtotime($abs->fecha_envio)); ?></div>
                            </td>
                            <td>
                                <span class="badge-code" style="background: var(--pink-dim); color: var(--pink); padding: 0.3rem 0.6rem; border-radius: 6px; font-weight: 700; font-size: 0.85rem; border: 1px solid rgba(196,30,90,0.2);">
                                    <?php echo $abs->codigo_seguimiento; ?>
                                </span>
                            </td>
                            <td>
                                <div class="td-name" style="font-size:0.82rem;"><?php echo htmlspecialchars($abs->autores); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-building-columns"></i> <?php echo htmlspecialchars($abs->afiliacion); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars($abs->correo); ?></div>
                            </td>
                            <td style="max-width:240px;">
                                <span style="font-family:'Source Serif 4',serif; font-size:0.88rem; color:#fff; line-height:1.4;"><?php echo htmlspecialchars($abs->titulo); ?></span>
                            </td>
                            <td style="max-width:180px; font-size:0.78rem; color:var(--muted);">
                                <?php echo htmlspecialchars($abs->keywords); ?>
                            </td>
                            <td>
                                <a href="<?php echo URLROOT; ?>/uploads/abstracts/<?php echo urlencode($abs->archivo_pdf); ?>" target="_blank" class="file-link pdf">
                                    <i class="fa-solid fa-file-pdf"></i> PDF
                                </a>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <form action="<?php echo URLROOT; ?>/onta_admin/updateAbstractStatus" method="POST">
                                        <input type="hidden" name="abstract_id" value="<?php echo $abs->id; ?>">
                                        <input type="hidden" name="status" value="aprobado">
                                        <button type="submit" title="Aprobar" class="act-btn approve <?php echo($abs->estado == 'aprobado') ? 'on' : ''; ?>">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo URLROOT; ?>/onta_admin/updateAbstractStatus" method="POST">
                                        <input type="hidden" name="abstract_id" value="<?php echo $abs->id; ?>">
                                        <input type="hidden" name="status" value="pendiente">
                                        <button type="submit" title="Pendiente" class="act-btn pending <?php echo($abs->estado == 'pendiente') ? 'on' : ''; ?>">
                                            <i class="fa-solid fa-clock-rotate-left"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo URLROOT; ?>/onta_admin/updateAbstractStatus" method="POST">
                                        <input type="hidden" name="abstract_id" value="<?php echo $abs->id; ?>">
                                        <input type="hidden" name="status" value="rechazado">
                                        <button type="submit" title="Rechazar" class="act-btn reject <?php echo($abs->estado == 'rechazado') ? 'on' : ''; ?>">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                    <button type="button" onclick="editAbstract(<?php echo $abs->id; ?>)" title="Editar Parámetros" class="act-btn pending on">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <form action="<?php echo URLROOT; ?>/onta_admin/deleteAbstract/<?php echo $abs->id; ?>" method="POST" onsubmit="return confirmDelete('este resumen científico');">
                                        <button type="submit" title="Eliminar Permanente" class="act-btn reject">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php
    endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
endif; ?>
        </div>

        <!-- ═══ PAGOS ═══ -->
        <div id="pagos" class="admin-section">
            <div class="sec-header">
                <h2>Control de Pagos</h2>
                <span class="count-pill" style="background: var(--green-dim); color: var(--green);">
                    <i class="fa-solid fa-receipt"></i> <?php echo count($data['inscriptions'] ?? []); ?> transacciones
                </span>
            </div>

            <?php if (empty($data['inscriptions'])): ?>
                <div class="empty-state">
                    <i class="fa-solid fa-wallet"></i>
                    <h3>Sin Movimientos</h3>
                    <p>No se han registrado pagos hasta el momento.</p>
                </div>
            <?php
else: ?>
            <div class="table-wrap">
                <table class="adm-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Participante</th>
                            <th>Contacto</th>
                            <th>Comprobante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['inscriptions'] ?? [] as $ins): ?>
                        <tr>
                            <td>
                                <div style="white-space:nowrap; font-size:0.82rem;"><?php echo date('d M Y', strtotime($ins->created_at)); ?></div>
                                <div class="td-sub"><?php echo date('H:i', strtotime($ins->created_at)); ?></div>
                            </td>
                            <td>
                                <div class="td-name"><?php echo htmlspecialchars($ins->full_name); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-map-pin"></i> <?php echo htmlspecialchars($ins->country); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-building-columns"></i> <?php echo htmlspecialchars($ins->institution); ?></div>
                            </td>
                            <td>
                                <div class="td-sub"><i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars($ins->email); ?></div>
                                <div class="td-sub"><i class="fa-solid fa-phone"></i> <?php echo htmlspecialchars($ins->phone); ?></div>
                            </td>
                            <td>
                                <a href="<?php echo URLROOT; ?>/uploads/receipts/<?php echo urlencode($ins->payment_receipt); ?>" target="_blank" class="file-link voucher">
                                    <i class="fa-solid fa-file-invoice-dollar"></i> Ver Voucher
                                </a>
                            </td>
                            <td>
                                <div class="action-btns">
                                    <form action="<?php echo URLROOT; ?>/onta_admin/updateInscriptionStatus" method="POST">
                                        <input type="hidden" name="inscription_id" value="<?php echo $ins->id; ?>">
                                        <input type="hidden" name="status" value="aprobado">
                                        <button type="submit" title="Pago Confirmado" class="act-btn approve <?php echo($ins->payment_status == 'aprobado') ? 'on' : ''; ?>">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo URLROOT; ?>/onta_admin/updateInscriptionStatus" method="POST">
                                        <input type="hidden" name="inscription_id" value="<?php echo $ins->id; ?>">
                                        <input type="hidden" name="status" value="pendiente">
                                        <button type="submit" title="Marcar Pendiente" class="act-btn pending <?php echo($ins->payment_status == 'pendiente') ? 'on' : ''; ?>">
                                            <i class="fa-solid fa-clock-rotate-left"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo URLROOT; ?>/onta_admin/updateInscriptionStatus" method="POST">
                                        <input type="hidden" name="inscription_id" value="<?php echo $ins->id; ?>">
                                        <input type="hidden" name="status" value="rechazado">
                                        <button type="submit" title="Rechazar Pago" class="act-btn reject <?php echo($ins->payment_status == 'rechazado') ? 'on' : ''; ?>">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo URLROOT; ?>/onta_admin/deleteInscription/<?php echo $ins->id; ?>" method="POST" onsubmit="return confirmDelete('esta inscripción de pago');">
                                        <button type="submit" title="Eliminar Permanente" class="act-btn reject">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php
    endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
endif; ?>
        </div>

        <!-- ═══ ASISTENCIAS (IN PROGRESS) ═══ -->
        <div id="asistencias" class="admin-section">
            <div class="sec-header">
                <h2>Control de Asistencias ONTA 2026</h2>
                <span class="count-pill" style="background: var(--pink-dim); color: var(--pink);">
                    <i class="fa-solid fa-microchip"></i> Módulo QR
                </span>
            </div>

            <div class="empty-state" style="background: var(--surface); border-radius: 24px; border: 1px dashed var(--border2); padding: 6rem 2rem;">
                <div style="position: relative; display: inline-block; margin-bottom: 2rem;">
                    <i class="fa-solid fa-qrcode" style="font-size: 5rem; opacity: 0.15;"></i>
                    <i class="fa-solid fa-screwdriver-wrench" style="position: absolute; bottom: 0; right: -10px; font-size: 2rem; color: var(--pink);"></i>
                </div>
                <h3 style="color: #fff; font-size: 1.5rem; margin-bottom: 0.5rem; font-family: 'Source Serif 4', serif;">Implementación en Proceso</h3>
                <p style="max-width: 450px; margin: 0 auto; line-height: 1.7;">
                    Estamos desarrollando el sistema de control de accesos mediante **Código QR**. Muy pronto podrás escanear credenciales y generar reportes de asistencia en tiempo real.
                </p>
                
                <div style="margin-top: 3rem; display: flex; justify-content: center; gap: 1rem;">
                    <div style="padding: 1rem; background: var(--surface2); border-radius: 12px; border: 1px solid var(--border); width: 140px;">
                        <i class="fa-solid fa-laptop-code" style="color: var(--pink); margin-bottom: 0.5rem;"></i>
                        <div style="font-size: 0.65rem; text-transform: uppercase;">Frontend</div>
                        <div style="font-weight: 700; font-size: 0.8rem; color: #fff;">80% Listo</div>
                    </div>
                    <div style="padding: 1rem; background: var(--surface2); border-radius: 12px; border: 1px solid var(--border); width: 140px;">
                        <i class="fa-solid fa-server" style="color: var(--blue); margin-bottom: 0.5rem;"></i>
                        <div style="font-size: 0.65rem; text-transform: uppercase;">Backend</div>
                        <div style="font-weight: 700; font-size: 0.8rem; color: #fff;">40% Listo</div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /content -->
</div><!-- /main -->

<!-- ────────────── MODALS ────────────── -->

<!-- Modal: Edit User -->
<div id="modalEdit" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Editar Perfil de Investigador</h3>
            <button class="modal-close" onclick="closeModal('modalEdit')">&times;</button>
        </div>
        <div class="modal-content">
            <form action="<?php echo URLROOT; ?>/onta_admin/updateUser" method="POST" class="adm-form">
                <input type="hidden" name="id" id="edit_id">
                <div class="adm-form-grid">
                    <div class="adm-field">
                        <label>Nombre Completo</label>
                        <input type="text" name="name" id="edit_name" class="adm-input" required>
                    </div>
                    <div class="adm-field">
                        <label>Correo Electrónico</label>
                        <input type="email" name="email" id="edit_email" class="adm-input" required>
                    </div>
                    <div class="adm-field">
                        <label>DNI / Pasaporte</label>
                        <input type="text" name="dni" id="edit_dni" class="adm-input" required>
                    </div>
                    <div class="adm-field">
                        <label>Teléfono</label>
                        <input type="text" name="phone" id="edit_phone" class="adm-input">
                    </div>
                    <div class="adm-field" style="grid-column: span 2;">
                        <label>Institución / Universidad</label>
                        <input type="text" name="university" id="edit_university" class="adm-input" required>
                    </div>
                    <div class="adm-field">
                        <label>Escuela Profesional</label>
                        <input type="text" name="professional_school" id="edit_school" class="adm-input">
                    </div>
                    <div class="adm-field">
                        <label>Departamento / Área</label>
                        <input type="text" name="department" id="edit_dept" class="adm-input">
                    </div>
                    <div class="adm-field" style="grid-column: span 2;">
                        <label>Categoría de Participante</label>
                        <select name="user_category" id="edit_category" class="adm-input">
                            <option value="miembro_onta">MIEMBRO ONTA</option>
                            <option value="no_miembro">NO MIEMBRO</option>
                            <option value="extranjero">EXTRANJERO</option>
                            <option value="nacional">NACIONAL</option>
                        </select>
                    </div>
                    <div class="adm-field" style="grid-column: span 2;">
                        <label>Nueva Contraseña (Dejar en blanco para no cambiar)</label>
                        <input type="password" name="password" id="edit_password" class="adm-input" placeholder="••••••••">
                        <small style="color: var(--muted); font-size: 0.7rem;">Solo complete este campo si desea resetear la clave del investigador.</small>
                    </div>
                </div>
                <button type="submit" class="btn-save">GUARDAR CAMBIOS</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal: View Details -->
<div id="modalView" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Ficha Completa del Investigador</h3>
            <button class="modal-close" onclick="closeModal('modalView')">&times;</button>
        </div>
        <div class="modal-content" id="detailsContent">
            <!-- Populated by JS -->
        </div>
    </div>
</div>

<!-- Modal: Edit Abstract -->
<div id="modalEditAbstract" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Editar Parámetros del Resumen</h3>
            <button class="modal-close" onclick="closeModal('modalEditAbstract')">&times;</button>
        </div>
        <div class="modal-content">
            <form action="<?php echo URLROOT; ?>/onta_admin/updateAbstract" method="POST" class="adm-form">
                <input type="hidden" name="id" id="abs_edit_id">
                <div class="adm-form-grid">
                    <div class="adm-field" style="grid-column: span 2;">
                        <label>Título del Trabajo</label>
                        <input type="text" name="titulo" id="abs_edit_titulo" class="adm-input" required>
                    </div>
                    <div class="adm-field" style="grid-column: span 2;">
                        <label>Autores (Separados por comas)</label>
                        <input type="text" name="autores" id="abs_edit_autores" class="adm-input" required>
                    </div>
                    <div class="adm-field" style="grid-column: span 2;">
                        <label>Afiliación Institucional</label>
                        <input type="text" name="afiliacion" id="abs_edit_afiliacion" class="adm-input" required>
                    </div>
                    <div class="adm-field">
                        <label>Correo de Contacto</label>
                        <input type="email" name="correo" id="abs_edit_correo" class="adm-input" required>
                    </div>
                    <div class="adm-field">
                        <label>Palabras Clave (Keywords)</label>
                        <input type="text" name="keywords" id="abs_edit_keywords" class="adm-input" required>
                    </div>
                </div>
                <button type="submit" class="btn-save">ACTUALIZAR RESUMEN</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const links    = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('.admin-section');

    links.forEach(link => {
        link.addEventListener('click', e => {
            const href = link.getAttribute('href');
            if (!href || !href.startsWith('#')) return;
            e.preventDefault();

            links.forEach(l => l.classList.remove('active'));
            link.classList.add('active');

            sections.forEach(s => s.classList.remove('active'));
            const target = document.getElementById(href.substring(1));
            if (target) target.classList.add('active');
        });
    });

    // ═══ PAGINATION & SEARCH LOGIC ═══
    const itemsPerPage = 10;
    
    function initTable(tableId, paginationId) {
        const table = document.getElementById(tableId);
        if (!table) return;
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const pagination = document.getElementById(paginationId);
        
        let filteredRows = [...rows];
        let currentPage = 1;

        function updateTable() {
            const totalPages = Math.ceil(filteredRows.length / itemsPerPage);
            if (currentPage > totalPages) currentPage = Math.max(1, totalPages);

            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            // Hide all rows
            rows.forEach(r => r.style.display = 'none');
            
            // Show only filtered and paginated rows
            filteredRows.slice(start, end).forEach(r => r.style.display = '');

            updatePagination(totalPages);
        }

        function updatePagination(totalPages) {
            pagination.innerHTML = '';
            if (totalPages <= 1) return;

            // Prev
            const prev = document.createElement('button');
            prev.className = 'pg-btn';
            prev.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
            prev.disabled = currentPage === 1;
            prev.onclick = () => { currentPage--; updateTable(); };
            pagination.appendChild(prev);

            // Limited numbers (example: info text)
            const info = document.createElement('span');
            info.className = 'pg-info';
            info.textContent = `Página ${currentPage} de ${totalPages}`;
            pagination.appendChild(info);

            // Next
            const next = document.createElement('button');
            next.className = 'pg-btn';
            next.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
            next.disabled = currentPage === totalPages;
            next.onclick = () => { currentPage++; updateTable(); };
            pagination.appendChild(next);
        }

        // Search link
        const searchInput = document.querySelector(`.table-search[data-target="${tableId}"]`);
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const term = e.target.value.toLowerCase().trim();
                filteredRows = rows.filter(row => {
                    return row.textContent.toLowerCase().includes(term);
                });
                currentPage = 1;
                updateTable();
            });
        }

        updateTable();
    }

    initTable('table-inscripciones', 'pag-inscripciones');
    initTable('table-resumenes', 'pag-resumenes');
    initTable('table-pagos', 'pag-pagos');
});

function confirmDelete(item) {
    return confirm("¿Estás absolutamente seguro de eliminar " + item + "? Esta acción no se puede deshacer.");
}

function closeModal(id) {
    document.getElementById(id).classList.remove('active');
}

async function viewUserDetails(id) {
    const overlay = document.getElementById('modalView');
    const content = document.getElementById('detailsContent');
    content.innerHTML = '<div style="text-align:center; padding: 2rem;"><i class="fa-solid fa-spinner fa-spin" style="font-size: 2rem; color: var(--pink);"></i><p style="margin-top:1rem; color:var(--muted);">Sincronizando ficha técnica...</p></div>';
    overlay.classList.add('active');

    try {
        const response = await fetch('<?php echo URLROOT; ?>/onta_admin/getUserJson/' + id);
        const data = await response.json();
        const u = data.user;
        const abstracts = data.abstracts;
        const ins = data.inscriptions;

        let html = `
            <div class="details-grid">
                <div class="detail-item"><label>Investigador</label><p>${u.name}</p></div>
                <div class="detail-item"><label>Categoría</label><span class="pill pill-purple">${u.user_category.replace('_',' ')}</span></div>
                <div class="detail-item"><label>DNI / Pasaporte</label><p class="td-mono">${u.dni}</p></div>
                <div class="detail-item"><label>Teléfono</label><p>${u.phone || 'No registrado'}</p></div>
                <div class="detail-item" style="grid-column: span 2;"><label>Institución Base</label><p>${u.university}</p></div>
                <div class="detail-item"><label>Correo Principal</label><p>${u.email}</p></div>
                <div class="detail-item"><label>Departamento</label><p>${u.department || '-'}</p></div>
            </div>

            <div class="sec-title">Participación Financiera (Pagos)</div>
            ${ins.length > 0 ? ins.map(i => `
                <div style="background:var(--surface); border:1px solid var(--border); padding:1rem; border-radius:12px; margin-bottom:1rem; display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <div style="font-size:0.85rem; font-weight:700;">Voucher ID: #${i.id}</div>
                        <div class="td-sub"><i class="fa-regular fa-calendar"></i> ${i.created_at}</div>
                    </div>
                    <div style="text-align:right;">
                        <span class="pill ${i.payment_status == 'aprobado' ? 'pill-blue' : 'pill-purple'}" style="margin-left: 10px;">${i.payment_status.toUpperCase()}</span>
                        <a href="<?php echo URLROOT; ?>/uploads/receipts/${i.payment_receipt}" target="_blank" class="file-link voucher" style="margin-left:10px;">VER VOUCHER</a>
                    </div>
                </div>
            `).join('') : '<p style="color:var(--muted); font-size:0.9rem; font-style:italic;">No se han registrado vouchers de pago todavía.</p>'}

            <div class="sec-title">Resúmenes Científicos Presentados</div>
            ${abstracts.length > 0 ? abstracts.map(a => `
                <div style="background:var(--surface); border:1px solid var(--border); padding:1rem; border-radius:12px; margin-bottom:1rem;">
                    <div style="font-family:'Source Serif 4',serif; color:#fff; font-size:1rem; margin-bottom:0.5rem;">${a.titulo}</div>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <div class="td-sub"><i class="fa-solid fa-list-check"></i> ${a.estado.toUpperCase()}</div>
                        <a href="<?php echo URLROOT; ?>/uploads/abstracts/${a.archivo_pdf}" target="_blank" class="file-link pdf">VER PDF</a>
                    </div>
                </div>
            `).join('') : '<p style="color:var(--muted); font-size:0.9rem; font-style:italic;">El investigador no ha enviado resúmenes científicos.</p>'}
        `;
        content.innerHTML = html;
    } catch (e) {
        content.innerHTML = '<p style="color:var(--red);">Error al cargar los datos.</p>';
    }
}

async function editUser(id) {
    const overlay = document.getElementById('modalEdit');
    overlay.classList.add('active');

    try {
        const response = await fetch('<?php echo URLROOT; ?>/onta_admin/getUserJson/' + id);
        const data = await response.json();
        const u = data.user;

        document.getElementById('edit_id').value = u.id;
        document.getElementById('edit_name').value = u.name;
        document.getElementById('edit_email').value = u.email;
        document.getElementById('edit_dni').value = u.dni;
        document.getElementById('edit_phone').value = u.phone;
        document.getElementById('edit_university').value = u.university;
        document.getElementById('edit_school').value = u.professional_school;
        document.getElementById('edit_dept').value = u.department;
        document.getElementById('edit_category').value = u.user_category;
        document.getElementById('edit_password').value = '';
    } catch (e) {
        alert('Error al obtener datos');
    }
}

async function editAbstract(id) {
    const overlay = document.getElementById('modalEditAbstract');
    overlay.classList.add('active');

    try {
        const response = await fetch('<?php echo URLROOT; ?>/onta_admin/getAbstractJson/' + id);
        const a = await response.json();

        document.getElementById('abs_edit_id').value = a.id;
        document.getElementById('abs_edit_titulo').value = a.titulo;
        document.getElementById('abs_edit_autores').value = a.autores;
        document.getElementById('abs_edit_afiliacion').value = a.afiliacion;
        document.getElementById('abs_edit_correo').value = a.correo;
        document.getElementById('abs_edit_keywords').value = a.keywords;
    } catch (e) {
        alert('Error al obtener datos del resumen');
    }
}
</script>
</body>
</html>
