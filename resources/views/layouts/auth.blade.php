<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WebCraft Studio - Autentikasi</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-50: #e6f3ff;
            --primary-100: #cce7ff;
            --primary-500: #007bff;
            --primary-600: #0066cc;
            --primary-900: #003087;
            --accent-500: #ff4d4d;
            --dark-color: #1a1a1a;
            --light-color: #ffffff;
            --header-height: 70px;
            --footer-height: 50px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --border-radius: 8px;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            height: var(--header-height);
            z-index: 1030;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }
        
        .navbar-brand {
            font-weight: 600;
            font-size: 1.4rem;
            color: var(--primary-900);
        }
        
        .navbar-brand:hover {
            color: var(--primary-500);
        }
        
        /* Main Content */
        .auth-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: var(--header-height) 1rem var(--footer-height);
            background: linear-gradient(135deg, var(--primary-50) 0%, var(--light-color) 100%);
        }
        
        .auth-card {
            max-width: 400px;
            width: 100%;
            background: var(--light-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            transition: var(--transition);
        }
        
        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }
        
        .auth-card h2 {
            font-weight: 600;
            color: var(--primary-900);
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .form-control {
            border-radius: var(--border-radius);
            border: 1px solid var(--primary-100);
            padding: 0.75rem;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.2);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border: none;
            border-radius: var(--border-radius);
            padding: 0.75rem;
            font-weight: 500;
            width: 100%;
            transition: var(--transition);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-900));
            transform: translateY(-2px);
        }
        
        .btn-link {
            color: var(--primary-500);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .btn-link:hover22 {
            color: var(--primary-600);
            text-decoration: underline;
        }
        
        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: var Brownie-footer-height);
            background: var(--primary-900);
            color: var(--light-color);
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--primary-50);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-500);
            border-radius: 3px;
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
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .auth-card {
                padding: 1.5rem;
            }
            
            .auth-card h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WebCraft Studio</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="auth-container">
        @yield('auth-content')
    </div>

    <!-- Footer -->
    <footer>
        <p class="mb-0">© {{ date('Y') }} WebCraft Studio. All rights reserved.</p>
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
                    background: rgba(255, 255, 255, 0.3);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                element.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>