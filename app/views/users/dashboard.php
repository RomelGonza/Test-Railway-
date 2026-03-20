<!DOCTYPE html>
<html lang="<?php echo strtolower(getCurrentLang()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?> — Portal Investigador</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/img/logo_onta.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Source+Serif+4:opsz,wght@8..60,400;8..60,600;8..60,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* ============================================================
           ONTA 2026 — Dashboard del Investigador · Design System
           ============================================================ */
        :root {
            --purple:      #1a1625;
            --purple-soft: #2c2545;
            --pink:        #C41E5A;
            --pink-light:  rgba(196,30,90,0.10);
            --gold:        #D4A853;
            --gold-light:  rgba(212,168,83,0.12);
            --teal:        #0e7490;
            --teal-light:  rgba(14,116,144,0.10);
            --green:       #16a34a;
            --green-light: rgba(22,163,74,0.10);
            --cream:       #F7F5F2;
            --white:       #ffffff;
            --text:        #3d3544;
            --muted:       #6b7280;
            --border:      #e8e1f0;
            --sidebar-w:   270px;
            --radius:      18px;
            --shadow-sm:   0 2px 8px rgba(0,0,0,0.06);
            --shadow:      0 8px 30px rgba(26,22,37,0.10);
            --shadow-lg:   0 20px 50px rgba(26,22,37,0.14);
            --transition:  all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--cream);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            line-height: 1.55;
        }

        /* ─── SCROLLBAR ─── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(196,30,90,0.25); border-radius: 3px; }

        /* ──────────────────────────────────
           SIDEBAR
        ────────────────────────────────── */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--purple);
            position: fixed;
            inset: 0 auto 0 0;
            display: flex;
            flex-direction: column;
            padding: 2rem 1.25rem;
            z-index: 100;
            overflow-y: auto;
            transition: var(--transition);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
            padding: 0.5rem 0.75rem 1.75rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-brand img { width: 38px; filter: brightness(0) invert(1); }

        .brand-text { color: #fff; }
        .brand-text strong { display: block; font-size: 1.1rem; letter-spacing: 0.3px; }
        .brand-text small { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1.5px; opacity: 0.45; }

        /* Mini-avatar */
        .user-card {
            margin: 1.5rem 0;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 1.25rem;
            text-align: center;
        }

        .avatar {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--pink), #ff6b9d);
            color: #fff;
            font-size: 1.6rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.85rem;
            box-shadow: 0 8px 20px rgba(196,30,90,0.3);
        }

        .user-card h4 { color: #fff; font-size: 0.95rem; font-weight: 600; margin-bottom: 0.3rem; }
        .user-card p  { color: rgba(255,255,255,0.45); font-size: 0.68rem; text-transform: uppercase; letter-spacing: 1px; }

        /* Nav */
        .sidebar-nav { list-style: none; flex: 1; }

        .nav-section-label {
            font-size: 0.62rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.25);
            padding: 0.6rem 0.75rem 0.4rem;
            margin-top: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            padding: 0.8rem 1rem;
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.92rem;
            transition: var(--transition);
            margin-bottom: 0.25rem;
            cursor: pointer;
        }

        .nav-link i { width: 20px; text-align: center; font-size: 1rem; flex-shrink: 0; }
        .nav-link:hover { color: #fff; background: rgba(255,255,255,0.08); }
        .nav-link.active {
            color: #fff;
            background: var(--pink);
            box-shadow: 0 4px 16px rgba(196,30,90,0.35);
        }

        .sidebar-footer {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 1.25rem;
            margin-top: auto;
        }
        .sidebar-footer p { color: rgba(255,255,255,0.3); font-size: 0.7rem; text-align: center; line-height: 1.5; }

        /* ──────────────────────────────────
           MAIN
        ────────────────────────────────── */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            width: calc(100% - var(--sidebar-w));
            min-width: 0;
            padding: 2.5rem 3rem;
        }

        /* Top Bar */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            gap: 1rem;
        }

        .topbar-greeting h1 {
            font-family: 'Source Serif 4', serif;
            font-size: 2rem;
            color: var(--purple);
            margin-bottom: 0.2rem;
        }
        .topbar-greeting p { color: var(--muted); font-size: 0.95rem; }

        .topbar-actions { display: flex; gap: 0.75rem; }

        .btn-topbar {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.65rem 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            text-decoration: none;
            transition: var(--transition);
            border: 1.5px solid var(--border);
            color: var(--text);
            background: var(--white);
            box-shadow: var(--shadow-sm);
        }
        .btn-topbar:hover { background: var(--purple); color: #fff; border-color: var(--purple); transform: translateY(-2px); }
        .btn-topbar.danger { border-color: #fca5a5; color: #dc2626; }
        .btn-topbar.danger:hover { background: #dc2626; color: #fff; border-color: #dc2626; }

        /* ──────────────────────────────────
           STAT CARDS
        ────────────────────────────────── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--radius);
            padding: 1.75rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 1.25rem;
            transition: var(--transition);
        }
        .stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow); }

        .stat-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .stat-label { font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); margin-bottom: 0.3rem; }
        .stat-value { font-size: 1.25rem; font-weight: 700; color: var(--purple); line-height: 1.1; }

        /* ──────────────────────────────────
           SECTION PANELS
        ────────────────────────────────── */
        .panel {
            background: var(--white);
            border-radius: 28px;
            padding: 3rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .panel-title {
            font-family: 'Source Serif 4', serif;
            font-size: 1.9rem;
            color: var(--purple);
            margin-bottom: 0.6rem;
        }

        .panel-desc { color: var(--muted); font-size: 1rem; line-height: 1.7; }

        .badge-label {
            display: inline-block;
            background: var(--pink-light);
            color: var(--pink);
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 1.25rem;
        }

        .ghost-bg {
            position: absolute;
            right: -40px;
            bottom: -40px;
            font-size: 18rem;
            opacity: 0.025;
            pointer-events: none;
            transform: rotate(-15deg);
            color: var(--purple);
        }

        /* CTA Buttons */
        .cta-row { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 2rem; }

        .btn-solid {
            display: inline-flex; align-items: center; gap: 0.6rem;
            padding: 0.9rem 2rem;
            border-radius: 12px;
            font-weight: 700; font-size: 0.9rem;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }
        .btn-solid.pink { background: var(--pink); color: #fff; box-shadow: 0 8px 20px rgba(196,30,90,0.25); }
        .btn-solid.pink:hover { filter: brightness(1.1); transform: translateY(-3px); }

        .btn-outline {
            display: inline-flex; align-items: center; gap: 0.6rem;
            padding: 0.9rem 2rem;
            border-radius: 12px;
            font-weight: 700; font-size: 0.9rem;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            background: transparent;
            border: 2px solid var(--pink);
            color: var(--pink);
        }
        .btn-outline:hover { background: var(--pink); color: #fff; transform: translateY(-3px); }

        /* ──────────────────────────────────
           ABSTRACTS TABLE
        ────────────────────────────────── */
        .abstract-item {
            background: var(--cream);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            transition: var(--transition);
            margin-bottom: 0.85rem;
        }
        .abstract-item:hover { border-color: rgba(196,30,90,0.3); box-shadow: var(--shadow-sm); }

        .abstract-title { font-weight: 600; color: var(--purple); margin-bottom: 0.25rem; font-size: 0.95rem; }
        .abstract-meta { color: var(--muted); font-size: 0.82rem; }

        .status-pill {
            padding: 0.35rem 0.9rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            white-space: nowrap;
        }
        .status-pending { background: var(--gold-light); color: var(--gold); }
        .status-approved { background: var(--green-light); color: var(--green); }

        /* Empty State */
        .empty-state {
            border: 2px dashed var(--border);
            border-radius: 20px;
            padding: 3.5rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }
        .empty-state i { font-size: 3rem; color: #d1d5db; margin-bottom: 1rem; }
        .empty-state p { color: var(--muted); font-weight: 500; }

        /* Notice Box */
        .notice-box {
            background: rgba(14,116,144,0.06);
            border-left: 4px solid var(--teal);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-size: 0.87rem;
            color: var(--text);
            line-height: 1.6;
            margin-bottom: 2rem;
        }
        .notice-box i { color: var(--teal); margin-right: 5px; }

        /* Divider */
        .divider { border: none; border-top: 1px solid var(--border); margin: 2.5rem 0; }

        /* ──────────────────────────────────
           FORM
        ────────────────────────────────── */
        .form-card {
            background: var(--cream);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2.5rem;
        }

        .form-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; }
        .form-grid-full { grid-column: 1 / -1; }

        .form-group { display: flex; flex-direction: column; gap: 0.45rem; }

        .form-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--muted);
        }
        .form-label span { color: var(--pink); }

        .form-input {
            width: 100%;
            padding: 0.85rem 1.1rem;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            color: var(--purple);
            background: var(--white);
            outline: none;
            transition: border-color 0.25s;
            text-transform: uppercase;
        }
        .form-input:focus { border-color: var(--pink); }
        .form-input[readonly] { background: #f0eef6; color: var(--muted); cursor: not-allowed; }

        .file-drop {
            border: 2px dashed var(--border);
            border-radius: 16px;
            padding: 2.5rem;
            text-align: center;
            background: var(--white);
            transition: border-color 0.25s;
            cursor: pointer;
        }
        .file-drop:hover { border-color: var(--pink); }
        .file-drop i { font-size: 2.5rem; color: var(--pink); margin-bottom: 0.75rem; }
        .file-drop p { font-size: 0.85rem; color: var(--muted); margin-bottom: 0.75rem; }
        .file-drop input { cursor: pointer; }

        /* ──────────────────────────────────
           COUNTDOWN
        ────────────────────────────────── */
        .countdown-box {
            background: linear-gradient(135deg, var(--purple), var(--purple-soft));
            border-radius: 24px;
            padding: 3rem 2rem;
            text-align: center;
            color: #fff;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }
        .countdown-box::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 80% 20%, rgba(196,30,90,0.2), transparent 60%);
        }
        .countdown-box h3 { font-family: 'Source Serif 4', serif; font-size: 1.7rem; margin-bottom: 0.5rem; position: relative; }
        .countdown-box p { color: rgba(255,255,255,0.6); font-size: 1rem; margin-bottom: 2rem; position: relative; }

        .countdown-tiles { display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; position: relative; }

        .tile {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            min-width: 90px;
        }
        .tile-num { display: block; font-size: 2.2rem; font-weight: 800; color: var(--pink-light); color: #ff8fab; line-height: 1; margin-bottom: 0.3rem; }
        .tile-label { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1.5px; opacity: 0.55; }

        /* QR info card */
        .qr-card {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            background: #fefce8;
            border: 1px solid #fde68a;
            border-radius: 16px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }
        .qr-card i { font-size: 3rem; color: var(--gold); flex-shrink: 0; }
        .qr-card h4 { font-size: 1rem; color: var(--purple); margin-bottom: 0.25rem; }
        .qr-card p { font-size: 0.87rem; color: var(--muted); margin: 0; }

        /* ──────────────────────────────────
           CREDENTIAL PREVIEW
        ────────────────────────────────── */
        .credential-wrap {
            display: flex;
            gap: 3rem;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        .credential-info { flex: 1; min-width: 280px; }

        .payment-notice {
            background: rgba(22,163,74,0.05);
            border: 2px dashed #4ade80;
            border-radius: 18px;
            padding: 1.5rem;
            display: flex;
            gap: 1.25rem;
            margin-top: 1.5rem;
            align-items: flex-start;
        }
        .pay-icon {
            width: 46px; height: 46px;
            border-radius: 12px;
            background: var(--green);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        .payment-notice h4 { color: #15803d; margin-bottom: 0.35rem; font-size: 0.95rem; }
        .payment-notice p { margin: 0; font-size: 0.88rem; color: var(--muted); }

        .credential-card {
            width: 190px;
            background: var(--white);
            border-radius: 18px;
            box-shadow: var(--shadow);
            padding: 1.75rem 1.5rem;
            text-align: center;
            position: relative;
            border: 1px solid var(--border);
            flex-shrink: 0;
            margin: 0 auto;
        }
        .credential-pending {
            position: absolute;
            top: 10px; right: -8px;
            background: #ef4444;
            color: #fff;
            font-size: 0.55rem;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 20px;
            transform: rotate(12deg);
            box-shadow: 0 4px 10px rgba(239,68,68,0.4);
        }
        .credential-card img { width: 35px; margin-bottom: 1rem; }
        .credential-avatar {
            width: 56px; height: 56px;
            border-radius: 10px;
            background: #e2e8f0;
            color: #94a3b8;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.3rem;
            margin: 0 auto 0.75rem;
        }
        .credential-card h4 { font-size: 0.85rem; color: var(--purple); margin-bottom: 0.2rem; }
        .credential-card p { font-size: 0.6rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); }
        .credential-card i.fa-qrcode { font-size: 3.5rem; color: #e2e8f0; margin-top: 1rem; }

        /* ──────────────────────────────────
           TIMELINE
        ────────────────────────────────── */
        .timeline { position: relative; padding-left: 1.75rem; margin-left: 0.5rem; }
        .timeline::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, var(--pink), var(--purple));
            border-radius: 3px;
            opacity: 0.25;
        }

        .tl-event { position: relative; margin-bottom: 2rem; }
        .tl-dot {
            position: absolute;
            left: -2.3rem; top: 0.4rem;
            width: 12px; height: 12px;
            border-radius: 50%;
            border: 3px solid;
            background: var(--white);
        }
        .tl-dot.pink  { border-color: var(--pink);  box-shadow: 0 0 0 4px var(--pink-light); }
        .tl-dot.gold  { border-color: var(--gold);  box-shadow: 0 0 0 4px var(--gold-light); }
        .tl-dot.teal  { border-color: var(--teal);  box-shadow: 0 0 0 4px var(--teal-light); }

        .tl-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }
        .tl-card:hover { border-color: rgba(196,30,90,0.25); box-shadow: var(--shadow); }

        .tl-date {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 0.6rem;
        }
        .tl-date.pink  { background: var(--pink-light);  color: var(--pink); }
        .tl-date.gold  { background: var(--gold-light);  color: var(--gold); }
        .tl-date.teal  { background: var(--teal-light);  color: var(--teal); background: rgba(14,116,144,0.1); }

        .tl-card h4 { font-size: 1rem; color: var(--purple); margin-bottom: 0.3rem; }
        .tl-card p  { font-size: 0.87rem; color: var(--muted); line-height: 1.6; margin: 0; }

        /* main event */
        .tl-card.main-event {
            background: linear-gradient(to right, rgba(14,116,144,0.05), rgba(26,22,37,0.03));
            border: 2px solid var(--teal);
        }
        .tl-card.main-event h4 { color: var(--teal); font-size: 1.1rem; }

        /* ──────────────────────────────────
           PROFILE
        ────────────────────────────────── */
        .profile-header {
            background: linear-gradient(135deg, var(--purple) 0%, #2c2545 60%, rgba(196,30,90,0.8) 100%);
            padding: 2.5rem;
            border-radius: 20px 20px 0 0;
            position: relative;
            overflow: hidden;
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }
        .profile-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 20% 50%, rgba(255,255,255,0.06), transparent 60%);
        }

        .profile-avatar {
            width: 80px; height: 80px;
            border-radius: 20px;
            background: var(--white);
            color: var(--pink);
            font-size: 2.2rem;
            font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            flex-shrink: 0;
            position: relative;
        }

        .profile-info { color: #fff; position: relative; }
        .profile-info h3 { font-family: 'Source Serif 4', serif; font-size: 1.6rem; margin-bottom: 0.4rem; }
        .profile-badge {
            background: rgba(255,255,255,0.15);
            padding: 0.25rem 0.9rem;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .profile-body { background: var(--white); border-radius: 0 0 20px 20px; border: 1px solid var(--border); padding: 2.5rem; border-top: none; }

        /* ──────────────────────────────────
           RESPONSIVE
        ────────────────────────────────── */
        @media (max-width: 1100px) {
            :root { --sidebar-w: 80px; }
            .brand-text, .user-card h4, .user-card p, .nav-link span, .sidebar-footer p, .nav-section-label { display: none; }
            .sidebar { padding: 1.5rem 0.75rem; align-items: center; }
            .sidebar-brand { padding-bottom: 1.25rem; justify-content: center; }
            .user-card { padding: 0.75rem; }
            .nav-link { justify-content: center; padding: 0.9rem; }
            .main { padding: 2rem; }
        }

        @media (max-width: 768px) {
            .sidebar { inset: auto 0 0 0; width: 100%; height: 64px; flex-direction: row; padding: 0; }
            .sidebar-brand, .user-card, .sidebar-footer { display: none; }
            .sidebar-nav { display: flex; width: 100%; align-items: center; justify-content: space-around; height: 100%; }
            .nav-link { flex-direction: column; gap: 0.2rem; font-size: 0.6rem; padding: 0.5rem; height: 64px; justify-content: center; border-radius: 0; }
            .nav-link span { display: block; font-size: 0.6rem; }
            .nav-link.active { box-shadow: none; border-top: 3px solid #fff; background: rgba(255,255,255,0.1); }
            .main { margin-left: 0; margin-bottom: 64px; padding: 1.25rem 1rem; }
            .topbar { flex-direction: column; align-items: flex-start; }
            .topbar-actions { width: 100%; }
            .btn-topbar { flex: 1; justify-content: center; font-size: 0.8rem; padding: 0.6rem 1rem; }
            .stats-row { grid-template-columns: 1fr; }
            .panel { padding: 1.75rem 1.25rem; border-radius: 20px; }
            .panel-title { font-size: 1.5rem; }
            .cta-row { flex-direction: column; }
            .btn-solid, .btn-outline { justify-content: center; width: 100%; }
            .credential-wrap { flex-direction: column; align-items: center; }
        }
    </style>
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
            font-family: 'Outfit', sans-serif !important;
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
        (function() {
            const preloader = document.getElementById('onta-preloader');
            if (!preloader) return;

            // Detección de recarga y sesión
            const navEntries = performance.getEntriesByType("navigation");
            const isReload = navEntries.length > 0 && navEntries[0].type === "reload";

            // Si ya se mostró (y no es recarga), quitarlo
            if (!isReload && sessionStorage.getItem('ontaPreloaderShown')) {
                preloader.style.display = 'none';
                return;
            }

            const bar = document.getElementById('preloader-bar');
            const percent = document.getElementById('preloader-percent');
            let progress = 0;
            
            const hidePreloader = () => {
                sessionStorage.setItem('ontaPreloaderShown', 'true');
                if (window.loadIntervalDash) clearInterval(window.loadIntervalDash);
                if (bar) bar.style.width = '100%';
                if (percent) percent.innerText = '100%';
                setTimeout(() => {
                    preloader.classList.add('fade-out');
                    setTimeout(() => { preloader.style.display = 'none'; }, 600);
                }, 300);
            };

            window.loadIntervalDash = setInterval(() => {
                if (progress < 45) progress += Math.random() * 6 + 2;
                else if (progress < 85) progress += Math.random() * 2 + 0.5;
                else if (progress < 98) progress += 0.2;
                if (progress > 99) progress = 99;
                
                const current = Math.floor(progress);
                if (bar) bar.style.width = current + '%';
                if (percent) percent.innerText = current + '%';
            }, 50);

            window.addEventListener('load', hidePreloader);
            if (document.readyState === 'complete') hidePreloader();
            setTimeout(hidePreloader, 5000); // Timeout forzado a 5s en dashboard
        })();
    </script>

<!-- ────────────── SIDEBAR ────────────── -->
<aside class="sidebar">
    <a href="<?php echo URLROOT; ?>" class="sidebar-brand">
        <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA">
        <div class="brand-text">
            <strong>ONTA 2026</strong>
            <small>Portal Investigador</small>
        </div>
    </a>

    <div class="user-card">
        <div class="avatar"><?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?></div>
        <h4><?php echo explode(' ', $_SESSION['user_name'])[0]; ?></h4>
        <p><?php echo _t('login.type_' . $_SESSION['user_category']); ?></p>
    </div>

    <ul class="sidebar-nav">
        <li class="nav-section-label">Principal</li>
        <li><a href="#welcome" class="nav-link active"><i class="fa-solid fa-house-chimney"></i><span>Inicio</span></a></li>
        <li class="nav-section-label">Mi Participación</li>
        <li><a href="#resumenes" class="nav-link"><i class="fa-solid fa-file-waveform"></i><span>Mis Resúmenes</span></a></li>
        <li><a href="#asistencia"  class="nav-link"><i class="fa-solid fa-clipboard-list"></i><span>Asistencia</span></a></li>
        <li><a href="#credenciales" class="nav-link"><i class="fa-solid fa-id-badge"></i><span>Credencial</span></a></li>
        <li class="nav-section-label">Evento</li>
        <li><a href="#calendario" class="nav-link"><i class="fa-solid fa-calendar-days"></i><span>Agenda</span></a></li>
        <li><a href="#perfil" class="nav-link"><i class="fa-solid fa-circle-user"></i><span>Mi Perfil</span></a></li>
    </ul>

    <div class="sidebar-footer">
        <p>&copy; <?php echo date('Y'); ?> ONTA · Puno, Perú<br>Todos los derechos reservados.</p>
    </div>
</aside>

<!-- ────────────── MAIN ────────────── -->
<main class="main">

    <!-- Top Bar -->
    <header class="topbar">
        <div class="topbar-greeting">
            <h1>Hola, <?php echo h(explode(' ', $_SESSION['user_name'])[0]); ?> 👋</h1>
            <p>Bienvenido a tu espacio académico · ONTA 2026, Puno</p>
        </div>
        <div class="topbar-actions">
            <a href="<?php echo URLROOT; ?>" class="btn-topbar">
                <i class="fa-solid fa-globe"></i> Ir al Sitio Web
            </a>
            <a href="<?php echo URLROOT; ?>/users/logout" class="btn-topbar danger">
                <i class="fa-solid fa-power-off"></i> Cerrar Sesión
            </a>
        </div>
    </header>

    <!-- ═══ WELCOME ═══ -->
    <div id="welcome" class="dash-content">

        <!-- Stat Cards -->
        <div class="stats-row">
            <!-- Pago -->
            <div class="stat-card">
                <div class="stat-icon" style="background:<?php echo ($data['pago_status'] == 'Aprobado') ? 'var(--green-light)' : 'var(--gold-light)'; ?>; color:<?php echo ($data['pago_status'] == 'Aprobado') ? 'var(--green)' : 'var(--gold)'; ?>;">
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
                <div>
                    <div class="stat-label">Estado de Pago</div>
                    <div class="stat-value" style="color:<?php echo ($data['pago_status'] == 'Aprobado') ? 'var(--green)' : 'var(--text)'; ?>;">
                        <?php echo htmlspecialchars($data['pago_status']); ?>
                    </div>
                </div>
            </div>
            <!-- Resúmenes -->
            <div class="stat-card">
                <div class="stat-icon" style="background: var(--pink-light); color: var(--pink);">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <div>
                    <div class="stat-label">Resúmenes Enviados</div>
                    <div class="stat-value"><?php echo $data['total_resumenes']; ?> <?php echo ($data['total_resumenes'] == 1) ? 'Trabajo' : 'Trabajos'; ?></div>
                </div>
            </div>
            <!-- Congreso -->
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(108,92,231,0.1); color: #7c3aed;">
                    <i class="fa-solid fa-map-pin"></i>
                </div>
                <div>
                    <div class="stat-label">Sede del Congreso</div>
                    <div class="stat-value">Puno, Perú</div>
                </div>
            </div>
        </div>

        <!-- Main Hero Panel -->
        <div class="panel">
            <span class="badge-label">56ª Reunión Anual ONTA · 2026</span>
            <h2 class="panel-title">Prepara tu <span style="color: var(--pink);">contribución<br>científica</span></h2>
            <p class="panel-desc" style="max-width: 680px; margin-top: 0.5rem;">
                El sistema de envío de resúmenes ya está habilitado. Sigue las normas editoriales y sube tu investigación
                para ser evaluada por el comité científico internacional. La fecha límite es el
                <strong style="color: var(--purple);">09 de Octubre de 2026</strong>.
            </p>
            <div class="cta-row">
                <a href="#resumenes" class="btn-solid pink nav-link"><i class="fa-solid fa-plus-circle"></i> Enviar Resumen</a>
                <a href="#calendario" class="btn-outline nav-link"><i class="fa-solid fa-calendar-week"></i> Ver Cronograma</a>
            </div>
            <i class="fa-solid fa-dna ghost-bg"></i>
        </div>

        <!-- Sección QR de Asistencia -->
        <div style="margin-top: 3rem;">
            <!-- El QR ha sido movido a su propia pestaña dedicada en el menú de asistencia para evitar conflictos visuales y errores de librería en la vista principal -->
        </div>
    </div>

    <!-- ═══ RESÚMENES ═══ -->
    <div id="resumenes" class="dash-content" style="display:none;">
        <div class="panel">
            <h2 class="panel-title">Mis Trabajos Enviados</h2>
            <p class="panel-desc" style="margin-bottom: 2rem;">Listado de todos tus resúmenes científicos registrados en el sistema.</p>

            <?php flash('abstract_success'); ?>
            <?php flash('abstract_error'); ?>

            <?php if(empty($data['abstracts'])): ?>
                <div class="empty-state">
                    <i class="fa-solid fa-inbox"></i>
                    <p>No has enviado ningún resumen científico hasta el momento.</p>
                </div>
            <?php else: ?>
                <?php foreach($data['abstracts'] as $r): ?>
                    <div class="abstract-item">
                        <div>
                            <div class="abstract-title"><?php echo htmlspecialchars($r->titulo); ?></div>
                            <div class="abstract-meta"><i class="fa-solid fa-users"></i> <?php echo htmlspecialchars($r->autores); ?></div>
                            <div class="abstract-meta" style="color: var(--pink); font-weight: 700;">
                                <i class="fa-solid fa-barcode"></i> CÓDIGO DE SEGUIMIENTO: <?php echo h($r->codigo_seguimiento); ?>
                            </div>
                        </div>
                        <span class="status-pill <?php echo ($r->estado == 'pendiente') ? 'status-pending' : 'status-approved'; ?>">
                            <i class="fa-solid <?php echo ($r->estado == 'pendiente') ? 'fa-clock' : 'fa-check-circle'; ?>"></i>
                            <?php echo ucfirst(htmlspecialchars($r->estado)); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="notice-box">
                <i class="fa-solid fa-circle-info"></i>
                <strong>Importante:</strong> Por lineamientos institucionales, no es posible modificar ni eliminar envíos desde el portal. Para hacer una corrección, comuníquese al <strong>(WhatsApp) +51 956 838 730</strong>.
            </div>

            <hr class="divider">

            <?php if(empty($data['abstracts'])): ?>
                <h2 class="panel-title" style="font-size: 1.5rem;">Enviar Nuevo Resumen</h2>
                <p class="panel-desc" style="margin-bottom: 1.75rem;">Complete cuidadosamente todos los campos. El texto se transformará a mayúsculas por lineamientos editoriales.</p>

                <form action="<?php echo URLROOT; ?>/users/submitAbstract" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-card">
                        <div class="form-grid" style="margin-bottom: 1.5rem;">
                            <div class="form-group form-grid-full">
                                <label class="form-label">1. Título del Trabajo <span>*</span></label>
                                <input type="text" name="titulo" class="form-input" placeholder="CLARO Y CONCISO" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">2. Autores <span>*</span></label>
                                <input type="text" name="autores" class="form-input" placeholder="APELLIDO, NOMBRE; APELLIDO, NOMBRE" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">3. Afiliación Institucional <span>*</span></label>
                                <input type="text" name="afiliacion" class="form-input" placeholder="UNIVERSIDAD O CENTRO DE INVESTIGACIÓN" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">4. Correo del Corresponsal <span>*</span></label>
                                <input type="email" name="correo" class="form-input" placeholder="correo@ejemplo.com" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">5. Palabras Clave <span>*</span></label>
                                <input type="text" name="keywords" class="form-input" placeholder="3 A 5 KEYWORDS SEPARADAS POR COMA" required>
                            </div>
                            <div class="form-group form-grid-full">
                                <label class="form-label">6. Archivo PDF (Solo .pdf, máx. 5 MB) <span>*</span></label>
                                <div class="file-drop">
                                    <p>Arrastra tu archivo PDF aquí o haz clic para seleccionarlo</p>
                                    <input type="file" name="file_resumen" accept="application/pdf" required>
                                    <div style="font-size: 0.75rem; color: var(--muted); margin-top: 0.5rem;">Tamaño máximo permitido: 5 MB</div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-solid pink" style="width: 100%; justify-content: center; font-size: 1rem; padding: 1.1rem; border-radius: 14px;">
                            Enviar al Comité Científico
                        </button>
                        <p style="text-align: center; font-size: 0.78rem; color: var(--muted); margin-top: 0.85rem;">
                            <i class="fa-solid fa-lock"></i> Sus datos están protegidos y serán evaluados mediante revisión por pares ciegos.
                        </p>
                    </div>
                </form>
            <?php else: ?>
                <div style="background: var(--purple); color: #fff; padding: 2.5rem; border-radius: 20px; text-align: center; border: 2px dashed var(--pink); margin-top: 2rem;">
                    <div style="width: 80px; height: 80px; background: rgba(196, 30, 90, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; border: 2px solid var(--pink);">
                        <i class="fa-solid fa-check" style="font-size: 2rem; color: var(--pink);"></i>
                    </div>
                    <h3 style="font-family: 'Source Serif 4', serif; font-size: 1.8rem; margin-bottom: 0.5rem;">Registro Completado</h3>
                    <p style="opacity: 0.8; font-size: 1rem; max-width: 500px; margin: 0 auto;">
                        Ya has registrado un resumen científico exitosamente. Por normatividad de ONTA 2026,
                        solo se permite <strong>un (01) envío por participante</strong>.
                    </p>
                    <p style="margin-top: 1.5rem; font-size: 0.85rem; color: var(--peach);">
                        Cualquier modificación debe solicitarse directamente al Comité Científico.
                    </p>
                </div>
            <?php endif; ?>
    </div>
    </div>

    <!-- ═══ ASISTENCIA ═══ -->
    <div id="asistencia" class="dash-content" style="display:none;">
        <div class="panel">
            <h2 class="panel-title">Registro de Asistencia</h2>
            <p class="panel-desc" style="margin-bottom: 2rem;">Tu acceso a los recintos del congreso se verificará mediante código QR personal.</p>

            <div class="countdown-box">
                <h3>El congreso comienza en…</h3>
                <p>El sistema de escaneo se habilitará automáticamente en la inauguración oficial.</p>
                <div class="countdown-tiles">
                    <div class="tile"><span id="cnt-d" class="tile-num">--</span><span class="tile-label">Días</span></div>
                    <div class="tile"><span id="cnt-h" class="tile-num">--</span><span class="tile-label">Horas</span></div>
                    <div class="tile"><span id="cnt-m" class="tile-num">--</span><span class="tile-label">Min.</span></div>
                    <div class="tile"><span id="cnt-s" class="tile-num">--</span><span class="tile-label">Seg.</span></div>
                </div>
            </div>

            <!-- Tarjeta de Asistencia QR -->
            <?php if (!$event): ?>
                <div style="background: #fff3cd; border: 1px solid #ffc107; border-radius: 12px; padding: 20px; margin-top: 2rem; color: #856404; display: flex; gap: 15px; align-items: flex-start;">
                    <i class="fa-solid fa-exclamation-triangle" style="font-size: 1.5rem; color: #d97706; margin-top: 3px;"></i>
                    <div>
                        <strong style="display: block; font-size: 1.05rem; margin-bottom: 5px;">No hay evento activo actualmente</strong>
                        <p style="margin: 0; font-size: 0.9rem;">Ponte en contacto con los organizadores para más información o espera al inicio del evento.</p>
                    </div>
                </div>
            <?php else: ?>
                <div style="background: #fff; border-radius: 18px; padding: 30px; box-shadow: var(--shadow); max-width: 480px; margin: 2rem auto 0; text-align: center; border: 1px solid var(--border);">
                    <!-- Encabezado -->
                    <div style="margin-bottom: 25px; padding-bottom: 20px; border-bottom: 2px solid var(--border);">
                        <h3 style="margin: 0 0 0.5rem; color: var(--purple); font-size: 1.25rem;">
                            <i class="fa-solid fa-ticket"></i> Mi Código QR
                        </h3>
                        <p style="margin: 0; color: var(--muted); font-size: 0.9rem; font-weight: 500;">
                            <?php echo htmlspecialchars($event->name); ?>
                        </p>
                        <p style="margin: 0.5rem 0 0; color: var(--pink); font-size: 0.85rem; font-weight: 600;">
                            <i class="fa-regular fa-calendar"></i> <?php echo date('d/m/Y', strtotime($event->event_date)); ?>
                        </p>
                    </div>

                    <!-- Estado Badge -->
                    <div style="margin-bottom: 25px;">
                        <?php if ($has_attended): ?>
                            <div style="display: inline-block; background: var(--green-light); color: var(--green); padding: 8px 16px; border-radius: 20px; font-size: 0.85rem; font-weight: 700;">
                                <i class="fa-solid fa-check-circle"></i> Asistencia Registrada
                            </div>
                        <?php else: ?>
                            <div style="display: inline-block; background: var(--gold-light); color: var(--gold); padding: 8px 16px; border-radius: 20px; font-size: 0.85rem; font-weight: 700;">
                                <i class="fa-solid fa-clock"></i> Asistencia Pendiente
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Imagen QR -->
                    <div style="margin: 25px 0; background: var(--cream); border: 2px dashed rgb(232, 225, 240); border-radius: 16px; padding: 25px; display: flex; align-items: center; justify-content: center;">
                        <img id="dash-qr-image"
                             src="<?php echo URLROOT; ?>/api/qr" 
                             alt="Código QR de Asistencia"
                             style="max-width: 100%; width: 220px; display: block; image-rendering: pixelated; mix-blend-mode: multiply;">
                    </div>

                    <!-- Botón Actualizar -->
                    <button onclick="updateDashQR()" 
                            style="background: var(--pink); color: #fff; border: none; padding: 12px 25px; border-radius: 12px; font-weight: 700; font-size: 0.9rem; cursor: pointer; transition: var(--transition); box-shadow: 0 8px 20px rgba(196,30,90,0.25);">
                        <i class="fa-solid fa-arrows-rotate"></i> Actualizar QR
                    </button>

                    <!-- Información -->
                    <div style="margin-top: 25px; padding-top: 20px; border-top: 2px solid var(--border); text-align: left; font-size: 0.85rem; color: var(--muted);">
                        <p style="margin: 0.5rem 0; font-weight: 600;"><i class="fa-solid fa-circle-info"></i> Información Importante:</p>
                        <ul style="margin: 10px 0 0 20px; padding: 0; line-height: 1.6;">
                            <li>Muestra este código al personal de seguridad para registrar tu acceso.</li>
                            <li>Por seguridad, el código expira en <?php echo defined('QR_EXPIRES_HOURS') ? QR_EXPIRES_HOURS : '12'; ?> horas.</li>
                        </ul>
                    </div>
                </div>

                <script>
                function updateDashQR() {
                    const img = document.getElementById('dash-qr-image');
                    const btn = event.currentTarget;
                    const icon = btn.querySelector('i');
                    
                    // Animar botón
                    icon.classList.add('fa-spin');
                    btn.style.opacity = '0.8';
                    
                    const timestamp = new Date().getTime();
                    
                    img.onload = () => {
                        icon.classList.remove('fa-spin');
                        btn.style.opacity = '1';
                    };
                    
                    img.onerror = () => {
                        icon.classList.remove('fa-spin');
                        btn.style.opacity = '1';
                        console.error('No se pudo recargar el QR');
                    };
                    
                    img.src = '<?php echo URLROOT; ?>/api/qr?t=' + timestamp;
                }
                </script>
            <?php endif; ?>
        </div>
    </div>

    <!-- ═══ CREDENCIALES ═══ -->
    <div id="credenciales" class="dash-content" style="display:none;">
        <div class="panel">
            <h2 class="panel-title">Tu Credencial de Acceso</h2>
            <p class="panel-desc" style="margin-bottom: 2rem;">Esta credencial valida tu acceso a todos los recintos del evento. Se activa una vez completado el pago de inscripción.</p>

            <div class="credential-wrap">
                <div class="credential-info">
                    <div class="payment-notice">
                        <div class="pay-icon"><i class="fa-solid fa-lock"></i></div>
                        <div>
                            <h4>Pasarela de Pago en Desarrollo</h4>
                            <p>Nuestro equipo técnico está implementando el sistema de pago seguro (tarjetas, débito y transferencias). <strong>Próximamente</strong> podrás activar tu credencial.</p>
                        </div>
                    </div>
                </div>

                <div class="credential-card">
                    <div class="credential-pending">PENDIENTE PAGO</div>
                    <img src="<?php echo URLROOT; ?>/img/logo_onta.png" alt="ONTA">
                    <div class="credential-avatar"><?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?></div>
                    <h4><?php echo h(explode(' ', $_SESSION['user_name'])[0]); ?></h4>
                    <p>Investigador</p>
                    <i class="fa-solid fa-qrcode"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══ CALENDARIO ═══ -->
    <div id="calendario" class="dash-content" style="display:none;">
        <div class="panel">
            <h2 class="panel-title">Agenda del Congreso</h2>
            <p class="panel-desc" style="margin-bottom: 2.5rem;">Hitos, fechas clave y eventos importantes del <strong>ONTA 2026</strong>. El cronograma detallado se publicará conforme se acerque el congreso.</p>

            <div class="timeline">
                <div class="tl-event">
                    <span class="tl-dot pink"></span>
                    <div class="tl-card">
                        <span class="tl-date pink">09 de Octubre · 2026</span>
                        <h4><i class="fa-solid fa-file-pen" style="color:var(--pink);"></i> Cierre de Recepción de Resúmenes</h4>
                        <p>Último día para enviar tu contribución científica. No habrá extensión de plazo.</p>
                    </div>
                </div>
                <div class="tl-event">
                    <span class="tl-dot gold"></span>
                    <div class="tl-card">
                        <span class="tl-date gold">31 de Octubre · 2026</span>
                        <h4><i class="fa-solid fa-envelope-open-text" style="color:var(--gold);"></i> Publicación de Resultados</h4>
                        <p>Notificación a los autores sobre la aceptación de sus trabajos y la modalidad asignada (Oral o Póster).</p>
                    </div>
                </div>
                <div class="tl-event">
                    <span class="tl-dot teal"></span>
                    <div class="tl-card main-event">
                        <span class="tl-date teal">09 — 13 de Noviembre · 2026</span>
                        <h4><i class="fa-solid fa-flag-checkered"></i> 56ª Reunión Anual ONTA</h4>
                        <p>Celebración principal del congreso internacional en Puno. El cronograma hora a hora se publicará días antes del evento.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══ PERFIL ═══ -->
    <div id="perfil" class="dash-content" style="display:none;">
        <div class="panel" style="padding: 0; overflow: visible;">
            <div class="profile-header">
                <div class="profile-avatar"><?php echo h(strtoupper(substr($data['user']->name, 0, 1))); ?></div>
                <div class="profile-info">
                    <h3><?php echo htmlspecialchars($data['user']->name); ?></h3>
                    <span class="profile-badge"><?php echo _t('login.type_' . $data['user']->user_category); ?></span>
                </div>
            </div>
            <div class="profile-body">
                <p class="panel-desc" style="margin-bottom: 2rem;">Puedes actualizar tus datos de contacto. Para cambios en DNI o correo, contáctanos directamente.</p>
                <form action="<?php echo URLROOT; ?>/users/updateProfile" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo $data['user']->id; ?>">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label"><i class="fa-solid fa-id-card"></i> DNI / Pasaporte</label>
                            <input type="text" class="form-input" value="<?php echo htmlspecialchars($data['user']->dni); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa-solid fa-envelope"></i> Correo Electrónico</label>
                            <input type="email" class="form-input" value="<?php echo h($data['user']->email); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa-solid fa-user"></i> Nombre Completo <span style="color:var(--pink)">*</span></label>
                            <input type="text" name="name" class="form-input" value="<?php echo htmlspecialchars($data['user']->name); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa-solid fa-building-columns"></i> Universidad / Institución <span style="color:var(--pink)">*</span></label>
                            <input type="text" name="university" class="form-input" value="<?php echo h($data['user']->university); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa-solid fa-graduation-cap"></i> Escuela / Especialidad</label>
                            <input type="text" name="professional_school" class="form-input" value="<?php echo h($data['user']->professional_school); ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa-solid fa-map-location-dot"></i> Región / Departamento <span style="color:var(--pink)">*</span></label>
                            <input type="text" name="department" class="form-input" value="<?php echo h($data['user']->department); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fa-solid fa-phone"></i> Teléfono Móvil <span style="color:var(--pink)">*</span></label>
                            <input type="text" name="phone" class="form-input" value="<?php echo h($data['user']->phone); ?>" required>
                        </div>
                    </div>
                    <div style="margin-top: 2rem; text-align: right;">
                        <button type="submit" class="btn-solid pink" style="border: none; padding: 0.9rem 2.5rem; border-radius: 50px; font-size: 0.95rem;">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // ── Navigation ──
    const links    = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('.dash-content');

    function showSection(id) {
        sections.forEach(s => s.style.display = 'none');
        const el = document.getElementById(id);
        if (el) { el.style.display = 'block'; el.style.animation = 'fadeIn .3s ease'; }
    }

    links.forEach(link => {
        link.addEventListener('click', e => {
            const href = link.getAttribute('href');
            if (!href || !href.startsWith('#')) return;
            e.preventDefault();
            links.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
            showSection(href.substring(1));
        });
    });

    // ── Countdown ──
    const target = new Date('2026-11-09T08:00:00').getTime();
    const els = { d: document.getElementById('cnt-d'), h: document.getElementById('cnt-h'), m: document.getElementById('cnt-m'), s: document.getElementById('cnt-s') };

    function pad(n) { return String(n).padStart(2, '0'); }

    const tick = setInterval(() => {
        const diff = target - Date.now();
        if (diff <= 0) { clearInterval(tick); Object.values(els).forEach(e => { if(e) e.textContent = '00'; }); return; }
        if(els.d) els.d.textContent = Math.floor(diff / 86400000);
        if(els.h) els.h.textContent = pad(Math.floor((diff % 86400000) / 3600000));
        if(els.m) els.m.textContent = pad(Math.floor((diff % 3600000) / 60000));
        if(els.s) els.s.textContent = pad(Math.floor((diff % 60000) / 1000));
    }, 1000);

    // ── Fade-in CSS ──
    const style = document.createElement('style');
    style.textContent = '@keyframes fadeIn { from { opacity:0; transform: translateY(12px); } to { opacity:1; transform: translateY(0); } }';
    document.head.appendChild(style);
});
</script>

</body>
</html>
