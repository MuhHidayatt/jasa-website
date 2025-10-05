<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'WebCraft Studio') }} - @yield('title')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @stack('styles')
    
    <style>
        :root {
            --primary-50: #f0f5ff;
            --primary-100: #dbeafe;
            --primary-500: #3b82f6;
            --primary-600: #2563eb;
            --primary-900: #1e3a8a;
            --accent-500: #f43f5e;
            --dark-color: #111827;
            --light-color: #ffffff;
            --header-height: 80px;
            --footer-height: 70px;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            --transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            --border-radius: 12px;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Enhanced Dark Mode Variables */
        [data-theme="dark"] {
            --primary-50: #0f172a;
            --primary-100: #1e293b;
            --primary-500: #60a5fa;
            --primary-600: #93c5fd;
            --primary-900: #dbeafe;
            --dark-color: #e2e8f0;
            --light-color: #0f172a;
            --accent-500: #fb7185;
            --dark-bg: #0f172a;
            --dark-card: #1e293b;
            --dark-border: #334155;
            --dark-text-secondary: #94a3b8;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            min-height: 100vh;
            overflow-x: hidden;
            line-height: 1.6;
            transition: var(--transition);
        }

        /* Theme transition */
        .theme-transition * {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        
        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(12px);
            height: var(--header-height);
            z-index: 1030;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        [data-theme="dark"] .navbar {
            background: rgba(15, 23, 42, 0.95);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar.collapsed {
            left: var(--sidebar-collapsed-width);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-900);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .navbar-brand:hover {
            color: var(--primary-500);
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--dark-color);
            transition: var(--transition);
        }
        
        .nav-link:hover {
            color: var(--primary-500);
        }
        
        /* Sidebar - Improved Collapsed State */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-50) 0%, var(--light-color) 100%);
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 1025;
            transition: var(--transition);
            overflow-y: auto;
            transform: translateX(0);
        }

        [data-theme="dark"] .sidebar {
            background: linear-gradient(180deg, var(--dark-bg) 0%, #1e293b 100%);
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.3);
        }
        
        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
            transform: translateX(0);
        }
        
        .sidebar.collapsed .sidebar-content .user-info h6,
        .sidebar.collapsed .sidebar-content .user-info small,
        .sidebar.collapsed .sidebar-content span {
            opacity: 0;
            visibility: hidden;
            width: 0;
            height: 0;
            margin: 0;
            padding: 0;
            transition: all 0.3s ease;
        }
        
        .sidebar.collapsed .sidebar-content .nav-link {
            justify-content: center;
            padding: 0.75rem;
            margin: 0.25rem auto;
            width: 48px;
            height: 48px;
            border-radius: 50%;
        }
        
        .sidebar.collapsed .sidebar-content .nav-link i {
            margin-right: 0;
            font-size: 1.25rem;
        }
        
        .sidebar.collapsed .user-info {
            padding: 1rem 0;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: none;
        }
        
        .sidebar.collapsed .avatar {
            width: 40px;
            height: 40px;
            margin: 0 auto;
        }
        
        .sidebar-content {
            padding: 1rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .sidebar.collapsed .sidebar-content {
            align-items: center;
            padding: 0.5rem;
        }
        
        .sidebar .nav-link {
            color: var(--dark-color);
            padding: 0.75rem 1rem;
            margin: 0.25rem 0;
            border-radius: var(--border-radius);
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: var(--transition);
            position: relative;
            width: 100%;
        }
        
        .sidebar .nav-link:hover {
            background: var(--primary-50);
            color: var(--primary-500);
            transform: translateX(5px);
        }

        [data-theme="dark"] .sidebar .nav-link:hover {
            background-color: #1e40af20;
        }
        
        .sidebar.collapsed .nav-link:hover {
            transform: scale(1.1);
            background: rgba(var(--primary-500), 0.1);
        }
        
        .sidebar.collapsed .nav-link:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: calc(var(--sidebar-collapsed-width) + 10px);
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary-900);
            color: var(--light-color);
            padding: 0.5rem 0.75rem;
            border-radius: var(--border-radius);
            font-size: 0.85rem;
            white-space: nowrap;
            z-index: 1000;
            box-shadow: var(--shadow-sm);
        }
        
        .sidebar .nav-link.active {
            background: var(--primary-500);
            color: var(--light-color);
            box-shadow: var(--shadow-sm);
        }

        [data-theme="dark"] .sidebar .nav-link.active {
            background: linear-gradient(135deg, #1e40af, #1e3a8a);
        }
        
        .sidebar.collapsed .nav-link.active {
            transform: none;
        }
        
        .sidebar .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 12px;
            font-size: 1.2rem;
            transition: var(--transition);
        }
        
        .sidebar.collapsed .nav-link i {
            margin-right: 0;
        }
        
        .sidebar .user-info {
            padding: 1rem;
            border-bottom: 1px solid var(--primary-100);
            margin-bottom: 1rem;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            transition: var(--transition);
        }

        [data-theme="dark"] .user-info small {
            color: var(--dark-text-secondary);
        }
        
        .sidebar .user-info h6 {
            font-size: 1.1rem;
            margin-bottom: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }
        
        .sidebar .user-info small {
            font-size: 0.85rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }
        
        /* Main Content */
        .main-content {
            position: fixed;
            top: var(--header-height);
            left: var(--sidebar-width);
            right: 0;
            bottom: var(--footer-height);
            padding: 2.5rem;
            overflow-y: auto;
            background: linear-gradient(145deg, var(--primary-50) 0%, var(--light-color) 100%);
            transition: var(--transition);
            z-index: 1010;
        }

        [data-theme="dark"] .main-content {
            background: linear-gradient(145deg, #0f172a 0%, #1e293b 100%);
        }
        
        .main-content.collapsed {
            left: var(--sidebar-collapsed-width);
        }
        
        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--footer-height);
            background: linear-gradient(180deg, var(--primary-50) 0%, var(--light-color) 100%);
            color: var(--dark-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            z-index: 1030;
            transition: var(--transition);
            box-shadow: 0 -2px 4px rgb(247, 246, 246);
        }


        [data-theme="dark"] footer {
            background: linear-gradient(180deg, var(--dark-bg) 0%, #1e293b 100%);
            color: var(--dark-color);
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
            border-top: 1px solid var(--dark-border);
        }

        
        footer.collapsed {
            left: var(--sidebar-collapsed-width);
        }
        
        footer p {
            margin: 0;
            font-weight: 500;
        }
        
        /* Card */
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            background: var(--light-color);
        }

        [data-theme="dark"] .card {
            background-color: var(--dark-card);
            border: 1px solid var(--dark-border);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: var(--light-color);
            font-weight: 600;
            border-bottom: none;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        [data-theme="dark"] .card-header {
            background: linear-gradient(135deg, #1e40af, #1e3a8a);
            border-bottom: 1px solid var(--dark-border);
        }
        
        /* Button */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border: none;
            border-radius: var(--border-radius);
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-900));
            transform: translateY(-3px);
            box-shadow: var(--shadow-sm);
        }
        
        .btn-link {
            color: var(--primary-500);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        [data-theme="dark"] .btn-link {
            color: var(--primary-600);
        }
        
        .btn-link:hover {
            color: var(--primary-600);
            text-decoration: underline;
        }
        
        /* Form */
        .form-control {
            border-radius: var(--border-radius);
            border: 1px solid var(--primary-100);
            padding: 0.75rem;
            transition: var(--transition);
        }

        [data-theme="dark"] .form-control {
            background-color: #1e293b;
            border-color: var(--dark-border);
            color: var(--dark-color);
        }

        [data-theme="dark"] .form-control:focus {
            background-color: #1e293b;
            color: var(--dark-color);
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        }
        
        .form-control:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        }
        
        /* FAB */
        .fab {
            position: fixed;
            bottom: calc(var(--footer-height) + 25px);
            right: 25px;
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            box-shadow: var(--shadow-md);
            border-radius: 5%;
            color: var(--light-color);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }
        
        .fab:hover {
            transform: translateY(-5px) rotate(180deg);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--primary-50);
        }

        [data-theme="dark"] ::-webkit-scrollbar-track {
            background: var(--dark-card);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-500);
            border-radius: 4px;
        }

        [data-theme="dark"] ::-webkit-scrollbar-thumb {
            background: #334155;
        }
        
        /* Dropdown */
        .dropdown-menu {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--shadow-md);
            background: var(--light-color);
        }

        [data-theme="dark"] .dropdown-menu {
            background-color: var(--dark-card);
            border: 1px solid var(--dark-border);
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: var(--transition);
        }

        [data-theme="dark"] .dropdown-item {
            color: var(--dark-color);
        }

        [data-theme="dark"] .dropdown-item:hover {
            background-color: #334155;
        }
        
        .dropdown-item:hover {
            background: var(--primary-50);
            color: var(--primary-500);
        }
        
        /* Avatar */
        .avatar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden;
            transition: var(--transition);
        }
        
        .avatar-md {
            width: 56px;
            height: 56px;
        }
        
        .avatar-initial {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: var(--light-color);
            font-weight: 600;
        }
        
        /* Animation */
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .ripple {
            position: relative;
            overflow: hidden;
        }
        
        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }
        
        /* Theme Toggle */
        .theme-toggle {
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--dark-color);
            transition: var(--transition);
        }
        
        .theme-toggle:hover {
            color: var(--primary-500);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
                z-index: 1040;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .navbar, .main-content, footer {
                left: 0;
            }
            
            .navbar.collapsed, .main-content.collapsed, footer.collapsed {
                left: 0;
            }
        }
        
        @media (max-width: 576px) {
            .main-content {
                padding: 1.5rem;
            }
            
            .navbar-brand {
                font-size: 1.3rem;
            }
            
            .fab {
                width: 56px;
                height: 56px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="sidebar-toggle me-2 btn btn-sm btn-primary" aria-label="Toggle sidebar">
                <i class="fas fa-bars text-white"></i>
            </button>
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <i class="fas fa-code"></i> WebCraft Studio
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3">
                        <i class="fas fa-sun theme-toggle" id="themeToggle" aria-label="Toggle theme"></i>
                    </li>
                    @if(auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center ripple" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-md me-2">
                                <div class="avatar-initial">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            </div>
                            <span class="d-none d-md-inline fw-medium">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-bell me-2"></i> Notifications <span class="badge bg-primary float-end">3</span></a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" data-aos="fade-right" data-aos-duration="500">
        <div class="sidebar-content">
            <div class="user-info">
                @if(auth()->check())
                    <div class="avatar avatar-md mx-auto mb-2">
                        <div class="avatar-initial">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </div>
                    <h6 class="mb-1 fw-bold">{{ Auth::user()->name }}</h6>
                    <small class="text-muted">{{ Auth::user()->level }}</small>
                @endif
            </div>

            <ul class="nav flex-column w-100">
                @auth
                    <!-- Dashboard -->
                    <li class="nav-item" data-aos="fade-right" data-aos-delay="100">
                        <a class="nav-link {{ Route::is('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}" data-tooltip="Dashboard">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Clients / Customers -->
                    @if(auth()->user()->level === 'admin')
                    <li class="nav-item" data-aos="fade-right" data-aos-delay="150">
                        <a class="nav-link {{ Route::is('customers.index') ? 'active' : '' }}" href="{{ route('customers.index') }}" data-tooltip="Clients">
                            <i class="fas fa-user-friends"></i>
                            <span>Clients</span>
                        </a>
                    </li>
                    @endif

                    <!-- Services -->
                    <li class="nav-item" data-aos="fade-right" data-aos-delay="200">
                        <a class="nav-link {{ Route::is('services.index') ? 'active' : '' }}" href="{{ route('services.index') }}" data-tooltip="Services">
                            <i class="fas fa-tools"></i>
                            <span>Layanan</span>
                        </a>
                    </li>

                    <!-- Orders -->
                    @if(auth()->user()->level === 'admin')
                    <li class="nav-item" data-aos="fade-right" data-aos-delay="250">
                        <a class="nav-link {{ Route::is('orders.index') ? 'active' : '' }}" href="{{ route('orders.index') }}" data-tooltip="Orders">
                            <i class="fas fa-receipt"></i>
                            <span>Orders</span>
                        </a>
                    </li>

                    <!-- Payments -->
                    <li class="nav-item" data-aos="fade-right" data-aos-delay="300">
                        <a class="nav-link {{ Route::is('payments.index') ? 'active' : '' }}" href="{{ route('payments.index') }}" data-tooltip="Payments">
                            <i class="fas fa-credit-card"></i>
                            <span>Payments</span>
                        </a>
                    </li>
                    @endif

                    <!-- Logout -->
                    <li class="nav-item mt-3" data-aos="fade-right" data-aos-delay="350">
                        <a class="nav-link" href="{{ route('logout') }}" data-tooltip="Logout">
                            <i class="fas fa-sign-out-alt text-danger"></i>
                            <span class="text-danger">Logout</span>
                        </a>
                    </li>
                @else
                    <!-- Login -->
                    <li class="nav-item" data-aos="fade-right" data-aos-delay="100">
                        <a class="nav-link" href="{{ route('auth.login') }}" data-tooltip="Login">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Login</span>
                        </a>
                    </li>

                    <!-- Register -->
                    <li class="nav-item" data-aos="fade-right" data-aos-delay="150">
                        <a class="nav-link" href="{{ route('auth.register') }}" data-tooltip="Register">
                            <i class="fas fa-user-plus"></i>
                            <span>Register</span>
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>


    <!-- Main Content -->
    <main class="main-content" data-aos="fade-up" data-aos-duration="600">
        @yield('content')
    </main>

    <!-- FAB -->
    <div class="fab ripple" id="fabButton" data-aos="fade-up" data-aos-delay="200">
        <i class="fas fa-plus"></i>
    </div>

    <!-- Footer -->
    <footer>
        <p class="mb-0">© {{ date('Y') }} WebCraft Studio. Crafted By</i> Muhammad Hidayat.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true
        });

        // Sidebar toggle
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        const footer = document.querySelector('footer');
        const navbar = document.querySelector('.navbar');
        const sidebarToggle = document.querySelector('.sidebar-toggle');
        
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');
            footer.classList.toggle('collapsed');
            navbar.classList.toggle('collapsed');
            localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        });

        // Restore sidebar state from localStorage
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('collapsed');
            footer.classList.add('collapsed');
            navbar.classList.add('collapsed');
        }

        // Mobile sidebar overlay
        function toggleMobileSidebar() {
            if (window.innerWidth < 992 && !sidebar.classList.contains('collapsed')) {
                sidebar.classList.toggle('show');
                if (sidebar.classList.contains('show')) {
                    const overlay = document.createElement('div');
                    overlay.className = 'sidebar-overlay';
                    overlay.style.cssText = `
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: rgba(0,0,0,0.5);
                        z-index: 1035;
                    `;
                    overlay.addEventListener('click', () => {
                        sidebar.classList.remove('show');
                        overlay.remove();
                    });
                    document.body.appendChild(overlay);
                } else {
                    const overlay = document.querySelector('.sidebar-overlay');
                    if (overlay) overlay.remove();
                }
            }
        }

        sidebarToggle.addEventListener('click', toggleMobileSidebar);

        // Close sidebar on link click (mobile)
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 992 && sidebar.classList.contains('show')) {
                    sidebar.classList.remove('show');
                    const overlay = document.querySelector('.sidebar-overlay');
                    if (overlay) overlay.remove();
                }
            });
        });

        // Enhanced theme toggle
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;
        
        function toggleTheme() {
            // Add transition class for smooth change
            document.body.classList.add('theme-transition');
            
            const currentTheme = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', currentTheme);
            themeToggle.className = `fas fa-${currentTheme === 'dark' ? 'moon' : 'sun'} theme-toggle`;
            localStorage.setItem('theme', currentTheme);
            
            // Remove transition class after animation completes
            setTimeout(() => {
                document.body.classList.remove('theme-transition');
            }, 500);
        }

        themeToggle.addEventListener('click', toggleTheme);

        // Restore theme from localStorage
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            html.setAttribute('data-theme', savedTheme);
            themeToggle.className = `fas fa-${savedTheme === 'dark' ? 'moon' : 'sun'} theme-toggle`;
        }

        // Adjust heights
        function adjustHeights() {
            const headerHeight = navbar.offsetHeight;
            const footerHeight = footer.offsetHeight;
            document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
            document.documentElement.style.setProperty('--footer-height', `${footerHeight}px`);
        }

        window.addEventListener('resize', adjustHeights);
        window.addEventListener('load', adjustHeights);

        // Ripple effect
        document.querySelectorAll('.ripple').forEach(element => {
            element.addEventListener('click', (e) => {
                const ripple = document.createElement('span');
                ripple.className = 'ripple-effect';
                const rect = element.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.4);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                element.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // FAB click
        document.getElementById('fabButton').addEventListener('click', () => {
            Swal.fire({
                title: 'Create New Project',
                text: 'Start a new website project now?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, create it!',
                cancelButtonText: 'Not now',
                background: 'var(--primary-50)',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary mx-2',
                    cancelButton: 'btn btn-link mx-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "#";
                }
            });
        });

        // SweetAlert for session messages
        @if($message = Session::get('success'))
            Swal.fire({
                title: "{{ $message }}",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                background: 'var(--primary-50)'
            });
        @endif
        @if($message = Session::get('failed'))
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ $message }}",
                background: 'var(--primary-50)'
            });
        @endif
    </script>
    
    @stack('scripts')
</body>
</html>