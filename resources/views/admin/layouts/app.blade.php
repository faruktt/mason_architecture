<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — BIG Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #0a0a0a;
            --sidebar-text: #c8c8c8;
            --sidebar-active: #ffffff;
            --sidebar-hover-bg: rgba(255,255,255,0.08);
            --accent: #e8ff00;
            --accent-dark: #c8dc00;
            --top-bar-height: 60px;
            --body-bg: #f4f5f7;
            --card-bg: #ffffff;
            --border: #e9ecef;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: var(--body-bg); min-height: 100vh; }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-width); height: 100vh;
            background: var(--sidebar-bg);
            display: flex; flex-direction: column;
            z-index: 1000; transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 24px 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            flex-shrink: 0;
        }

        .sidebar-brand .brand-name {
            font-size: 22px; font-weight: 800; letter-spacing: -0.5px;
            color: #ffffff; text-decoration: none; display: block;
        }

        .sidebar-brand .brand-name span {
            color: var(--accent);
        }

        .sidebar-brand .brand-sub {
            font-size: 10px; color: #666; letter-spacing: 2px;
            text-transform: uppercase; margin-top: 3px;
        }

        .sidebar-nav { padding: 16px 12px; flex: 1; }

        .nav-section-label {
            font-size: 9px; text-transform: uppercase; letter-spacing: 2px;
            color: #444; padding: 10px 10px 6px; font-weight: 600;
        }

        .sidebar-nav .nav-item { margin-bottom: 2px; }

        .sidebar-nav .nav-link {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 12px; border-radius: 8px;
            color: var(--sidebar-text); text-decoration: none;
            font-size: 14px; font-weight: 500; transition: all 0.2s;
        }

        .sidebar-nav .nav-link:hover {
            background: var(--sidebar-hover-bg); color: var(--sidebar-active);
        }

        .sidebar-nav .nav-link.active {
            background: var(--accent); color: #000;
            font-weight: 600;
        }

        .sidebar-nav .nav-link i {
            font-size: 16px; width: 20px; text-align: center; flex-shrink: 0;
        }

        .sidebar-nav .nav-link .badge-count {
            margin-left: auto; background: rgba(255,255,255,0.15);
            color: #fff; font-size: 10px; padding: 2px 7px;
            border-radius: 20px; font-weight: 600;
        }

        .sidebar-nav .nav-link.active .badge-count {
            background: rgba(0,0,0,0.2); color: #000;
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,0.08);
            flex-shrink: 0;
        }

        .sidebar-user {
            display: flex; align-items: center; gap: 10px;
            padding: 10px; border-radius: 8px;
            transition: background 0.2s; cursor: pointer;
        }

        .sidebar-user:hover { background: var(--sidebar-hover-bg); }

        .sidebar-user .avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: var(--accent); color: #000;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 14px; flex-shrink: 0;
        }

        .sidebar-user .user-info .name {
            color: #fff; font-size: 13px; font-weight: 600;
        }

        .sidebar-user .user-info .role {
            color: #555; font-size: 11px;
        }

        /* ===== MAIN CONTENT ===== */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin 0.3s ease;
        }

        /* ===== TOP BAR ===== */
        .topbar {
            height: var(--top-bar-height);
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center;
            padding: 0 24px;
            position: sticky; top: 0; z-index: 100;
        }

        .topbar .page-title {
            font-size: 18px; font-weight: 700; color: #0a0a0a;
            margin-right: auto;
        }

        .topbar .page-title span {
            font-weight: 400; color: #999; margin-left: 8px; font-size: 14px;
        }

        .topbar .sidebar-toggle {
            display: none; background: none; border: none;
            font-size: 20px; color: #555; cursor: pointer; margin-right: 16px;
        }

        .topbar-actions { display: flex; align-items: center; gap: 10px; }

        .topbar-actions .btn-icon {
            width: 36px; height: 36px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            border: 1px solid var(--border); background: #fff;
            color: #555; font-size: 16px; cursor: pointer; transition: all 0.2s;
        }

        .topbar-actions .btn-icon:hover {
            background: var(--body-bg); color: #222;
        }

        .topbar-breadcrumb {
            font-size: 12px; color: #999;
            display: flex; align-items: center; gap: 6px;
        }

        .topbar-breadcrumb a { color: #999; text-decoration: none; }
        .topbar-breadcrumb a:hover { color: #222; }
        .topbar-breadcrumb .sep { color: #ccc; }

        /* ===== PAGE CONTENT ===== */
        .page-content { padding: 24px; }

        /* ===== CARDS ===== */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        }

        .card-header {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
            background: transparent;
            display: flex; align-items: center; justify-content: space-between;
        }

        .card-header .card-title {
            font-size: 15px; font-weight: 600; color: #1a1a1a;
        }

        .card-body { padding: 20px; }

        /* ===== STAT CARDS ===== */
        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px 22px;
            display: flex; align-items: center; gap: 16px;
        }

        .stat-card .stat-icon {
            width: 52px; height: 52px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
        }

        .stat-card .stat-num {
            font-size: 28px; font-weight: 800; color: #0a0a0a; line-height: 1;
        }

        .stat-card .stat-label {
            font-size: 13px; color: #777; margin-top: 3px;
        }

        .stat-card .stat-change {
            font-size: 12px; font-weight: 500; margin-top: 4px;
        }

        /* ===== TABLE ===== */
        .table { margin-bottom: 0; }

        .table thead th {
            font-size: 11px; text-transform: uppercase; letter-spacing: 1px;
            color: #999; font-weight: 600; border-bottom: 1px solid var(--border);
            padding: 10px 16px; background: #f8f9fa;
        }

        .table tbody td {
            padding: 13px 16px; font-size: 14px; color: #333;
            border-bottom: 1px solid var(--border); vertical-align: middle;
        }

        .table tbody tr:last-child td { border-bottom: none; }

        .table tbody tr:hover td { background: #fafafa; }

        /* ===== BADGES ===== */
        .badge-status {
            padding: 4px 10px; border-radius: 20px;
            font-size: 11px; font-weight: 600; letter-spacing: 0.3px;
        }

        .badge-published { background: #d1fae5; color: #065f46; }
        .badge-draft { background: #f3f4f6; color: #6b7280; }
        .badge-open { background: #dbeafe; color: #1e40af; }
        .badge-closed { background: #fee2e2; color: #991b1b; }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: #0a0a0a; border-color: #0a0a0a; color: #fff;
            font-weight: 600; font-size: 13px; padding: 8px 18px;
            border-radius: 8px;
        }

        .btn-primary:hover { background: #1a1a1a; border-color: #1a1a1a; }

        .btn-accent {
            background: var(--accent); border-color: var(--accent); color: #000;
            font-weight: 700; font-size: 13px; padding: 8px 18px;
            border-radius: 8px; border: none;
        }

        .btn-accent:hover { background: var(--accent-dark); color: #000; }

        .btn-sm { padding: 5px 12px !important; font-size: 12px !important; }

        /* ===== FORMS ===== */
        .form-label { font-size: 13px; font-weight: 600; color: #444; margin-bottom: 6px; }

        .form-control, .form-select {
            border-radius: 8px; border: 1px solid #dde;
            font-size: 14px; padding: 9px 14px; color: #1a1a1a;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #0a0a0a; box-shadow: 0 0 0 3px rgba(10,10,10,0.08);
        }

        textarea.form-control { resize: vertical; min-height: 120px; }

        /* ===== ALERTS ===== */
        .alert {
            border-radius: 8px; border: none;
            font-size: 14px; padding: 12px 16px;
        }

        .alert-success { background: #d1fae5; color: #065f46; }
        .alert-danger { background: #fee2e2; color: #991b1b; }

        /* ===== ACTIONS ===== */
        .action-btns { display: flex; gap: 6px; }

        .btn-edit {
            background: #f0f4ff; color: #3b5bdb; border: none;
            border-radius: 6px; padding: 5px 10px; font-size: 12px;
        }

        .btn-edit:hover { background: #3b5bdb; color: #fff; }

        .btn-delete {
            background: #fff0f0; color: #e03131; border: none;
            border-radius: 6px; padding: 5px 10px; font-size: 12px;
        }

        .btn-delete:hover { background: #e03131; color: #fff; }

        /* ===== SIDEBAR OVERLAY (mobile) ===== */
        .sidebar-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.5); z-index: 999;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-overlay.show { display: block; }

            .main-wrapper { margin-left: 0; }

            .topbar .sidebar-toggle { display: flex; }

            .page-content { padding: 16px; }
        }

        @media (max-width: 576px) {
            .stat-card .stat-num { font-size: 22px; }
            .topbar .page-title { font-size: 16px; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Sidebar Overlay (mobile) -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-name">B<span>I</span>G</a>
        <div class="brand-sub">Admin Panel</div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section-label">Main</div>
        <div class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
        </div>

        <div class="nav-section-label" style="margin-top:12px">Content</div>
        <div class="nav-item">
            <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="bi bi-building"></i> Projects
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.team.index') }}" class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Team
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.careers.index') }}" class="nav-link {{ request()->routeIs('admin.careers.*') ? 'active' : '' }}">
                <i class="bi bi-briefcase-fill"></i> Careers / Jobs
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> News
            </a>
        </div>

        <div class="nav-section-label" style="margin-top:12px">System</div>
        <div class="nav-item">
            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="bi bi-gear-fill"></i> Settings
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> View Website
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div class="user-info">
                <div class="name">{{ auth()->user()->name }}</div>
                <div class="role">{{ ucfirst(auth()->user()->role) }}</div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" style="margin-top:8px">
            @csrf
            <button type="submit" class="nav-link w-100" style="background:none;border:none;text-align:left;">
                <i class="bi bi-box-arrow-left"></i> Logout
            </button>
        </form>
    </div>
</div>

<!-- Main Wrapper -->
<div class="main-wrapper">
    <!-- Top Bar -->
    <div class="topbar">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>
        <div class="page-title">
            @yield('page-title', 'Dashboard')
        </div>
        <div class="topbar-actions">
            <a href="{{ route('home') }}" target="_blank" class="btn-icon" title="View Site">
                <i class="bi bi-eye"></i>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="btn-icon" title="Settings">
                <i class="bi bi-gear"></i>
            </a>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            {{ session('error') }}
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebarOverlay').classList.toggle('show');
}
function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebarOverlay').classList.remove('show');
}
</script>
@stack('scripts')
</body>
</html>
