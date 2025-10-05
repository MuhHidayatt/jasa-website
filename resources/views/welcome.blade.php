<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Layanan profesional pembuatan website berbasis Laravel dengan fitur lengkap dan harga kompetitif">
    <title>WebCraft Pro - Jasa Pembuatan Website Laravel Profesional</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .hero-img {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="font-sans text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-indigo-700">WebCraft</span>
                    <span class="text-2xl font-bold text-purple-600">Pro</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-indigo-700 font-medium hover:text-purple-600">Beranda</a>
                    <a href="#features" class="text-gray-600 hover:text-indigo-700">Fitur</a>
                    <a href="#portfolio" class="text-gray-600 hover:text-indigo-700">Portfolio</a>
                    <a href="#vision-mission" class="text-gray-600 hover:text-indigo-700">Visi & Misi</a>
                    <a href="#contact" class="text-gray-600 hover:text-indigo-700">Kontak</a>
                    <div class="flex space-x-4">
                        <a href="{{ route('auth.login') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300">Login</a>
                        <a href="{{ route('auth.register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300">Register</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button class="mobile-menu-button p-2 focus:outline-none">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden bg-white pb-4 px-4">
            <a href="#home" class="block py-2 text-gray-700 hover:text-indigo-700">Beranda</a>
            <a href="#features" class="block py-2 text-gray-700 hover:text-indigo-700">Fitur</a>
            <a href="#portfolio" class="block py-2 text-gray-700 hover:text-indigo-700">Portfolio</a>
            <a href="#vision-mission" class="block py-2 text-gray-700 hover:text-indigo-700">Visi & Misi</a>
            <a href="#contact" class="block py-2 text-gray-700 hover:text-indigo-700">Kontak</a>
            <div class="mt-4 space-y-2">
                <a href="{{ route('auth.login') }}" class="block bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg text-center transition duration-300">Login</a>
                <a href="{{ route('auth.register') }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg text-center transition duration-300">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="gradient-bg text-white py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">Solusi Website Profesional Berbasis <span class="text-yellow-300">Laravel</span></h1>
                    <p class="text-xl mb-8">Kami menyediakan jasa pembuatan website dengan framework Laravel yang cepat, aman, dan mudah dikelola.</p>
                </div>
                <div class="md:w-1/2 flex justify-center hero-img">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/9a594493-910e-4dc5-a237-d96fb61aea7a.png" alt="Dashboard admin modern dengan grafik dan tabel data menggunakan Laravel Framework" class="max-w-full h-auto rounded-lg shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-indigo-700">Keunggulan Laravel</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Framework PHP terbaik untuk membangun aplikasi web yang skalabel dan aman</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-lg shadow-md transition duration-300">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Performansi Tinggi</h3>
                    <p class="text-gray-600">Optimasi caching dan compiler bawaan Laravel membuat website berjalan sangat cepat.</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-lg shadow-md transition duration-300">
                    <div class="text-purple-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Keamanan Terjamin</h3>
                    <p class="text-gray-600">Proteksi XSS, CSRF, SQL injection dan berbagai keamanan lainnya sudah termasuk.</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-lg shadow-md transition duration-300">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Panel Admin Lengkap</h3>
                    <p class="text-gray-600">Termasuk dashboard admin dengan CRUD, laporan, dan manajemen pengguna.</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-lg shadow-md transition duration-300">
                    <div class="text-purple-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">API Ready</h3>
                    <p class="text-gray-600">Siap terintegrasi dengan aplikasi mobile atau sistem lain melalui RESTful API.</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-lg shadow-md transition duration-300">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">SEO Friendly</h3>
                    <p class="text-gray-600">Struktur URL clean, meta tags otomatis, dan sitemap generator untuk optimalisasi SEO.</p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-lg shadow-md transition duration-300">
                    <div class="text-purple-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Garansi & Support</h3>
                    <p class="text-gray-600">Dukungan purna jual dan maintenance selama 6 bulan setelah website launching.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-indigo-700">Portfolio Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Beberapa proyek website Laravel yang telah kami kembangkan</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/78f52157-f831-49b4-8f99-dbcec0293f46.png" alt="Website perusahaan properti dengan galeri proyek dan sistem pencarian menggunakan Laravel" class="w-full h-48 object-cover">
                        <div class="absolute top-0 left-0 bg-indigo-600 text-white text-xs font-bold px-2 py-1">Laravel</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Aplikasi Laravel Penyewaan Sound System dan Alat Acara</h3>
                        <p class="text-gray-600 mb-4">Aplikasi web berbasis Laravel untuk mengelola penyewaan sound system dan alat acara. Dirancang untuk efisiensi bisnis dengan antarmuka ramah pengguna.</p>
                        <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800">Lihat Detail →</a>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/6e0e9e31-0566-444c-9fd1-4a451fb291a2.png" alt="Dashboard sistem manajemen sekolah dengan grafik statistik siswa dan raport" class="w-full h-48 object-cover">
                        <div class="absolute top-0 left-0 bg-indigo-600 text-white text-xs font-bold px-2 py-1">Laravel</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Sistem Informasi Sewa Peralatan Camping & Outdoor</h3>
                        <p class="text-gray-600 mb-4">Sistem Informasi Sewa Peralatan Camping & Outdoor adalah aplikasi web yang dirancang untuk mempermudah pengelolaan bisnis penyewaan peralatan camping seperti tenda, sleeping bag, dan perlengkapan outdoor lainnya.</p>
                        <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800">Lihat Detail →</a>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/367af16a-7000-4a36-99fd-5185a860ef0b.png" alt="E-commerce fashion dengan tampilan produk, keranjang belanja dan sistem pembayaran" class="w-full h-48 object-cover">
                        <div class="absolute top-0 left-0 bg-indigo-600 text-white text-xs font-bold px-2 py-1">Laravel</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Aplikasi Penyewaan Kendaraan (Motor/Mobil) Laravel</h3>
                        <p class="text-gray-600 mb-4">Mengelola bisnis penyewaan motor dan mobil. Aplikasi ini dirancang untuk menyederhanakan proses pemesanan, manajemen armada, dan transaksi, memberikan kemudahan bagi penyedia jasa dan pelanggan.</p>
                        <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800">Lihat Detail →</a>
                    </div>
                </div>
            </div>
            
            <div class="mt-10 text-center">
                <a href="#" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Lihat Semua Portfolio</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-indigo-700">Apa Kata Klien Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Testimonial dari klien yang telah menggunakan jasa kami</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/26e66dc5-7555-441b-9964-d90cb926e6a2.png" alt="Perempuan muda profesional dengan rambut pendek tersenyum" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Nadzwa Nurul Hikmah</h4>
                            <p class="text-gray-600 text-sm">Mahasiswa Universitas Muhammadiyah Cirebon</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"Website dibuat dengan sangat profesional dan sesuai deadline. Fitur admin panelnya sangat membantu untuk mengupdate produk tanpa perlu membayar programmer lagi."</p>
                    <div class="mt-4 flex text-yellow-400">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/5e03c0df-3d76-446c-8207-b24933ae8e3e.png" alt="Pria paruh baya dengan kacamata dan berdasi profesional" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Muhammad Faiz</h4>
                            <p class="text-gray-600 text-sm">Mahasiswa Universitas Muhammadiyah Cirebon</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"Sistem akademik berbasis Laravel ini sangat membantu sekolah kami. Dari penginputan nilai, pembuatan raport, sampai statistik perkembangan siswa semua bisa diakses dalam satu dashboard."</p>
                    <div class="mt-4 flex text-yellow-400">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/7293bdc7-4f32-46c7-87f2-53d9887ea694.png" alt="Wanita muda dengan hijab tersenyum ramah" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Nurkholifa</h4>
                            <p class="text-gray-600 text-sm">Mahasiswa Universitas Muhammadiyah Cirebon</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"Website booking kamar hotel kami dibuat dengan fitur yang sangat lengkap. Tim supportnya juga sangat responsif membantu ketika ada masalah teknis."</p>
                    <div class="mt-4 flex text-yellow-400">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-indigo-700">Pertanyaan Umum</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Temukan jawaban atas pertanyaan yang sering diajukan</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-3 text-indigo-700">Berapa lama waktu yang dibutuhkan untuk membuat website?</h3>
                    <p class="text-gray-600">Waktu pengerjaan tergantung pada kompleksitas proyek. Untuk paket basic biasanya membutuhkan waktu 2-3 minggu, sedangkan paket enterprise bisa memakan waktu 2-3 bulan termasuk testing dan penyesuaian.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-3 text-indigo-700">Apakah saya bisa request fitur tambahan?</h3>
                    <p class="text-gray-600">Tentu saja. Kami akan menganalisis kebutuhan Anda dan memberikan penawaran harga untuk fitur tambahan tersebut. Setelah disetujui, fitur tersebut akan kami develop sesuai timeline yang disepakati.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-3 text-indigo-700">Apakah harga sudah termasuk domain dan hosting?</h3>
                    <p class="text-gray-600">Harga yang tertera adalah untuk development saja. Kami bisa membantu Anda mendapatkan domain dan hosting terpisah sesuai kebutuhan, atau Anda bisa menggunakan layanan hosting sendiri.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-3 text-indigo-700">Bagaimana proses pembayarannya?</h3>
                    <p class="text-gray-600">Pembayaran dilakukan secara bertahap: 30% di awal sebagai booking fee, 40% saat development mencapai 60%, dan 30% sisanya sebelum website di-launching.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section id="vision-mission" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-indigo-700">Visi & Misi Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Komitmen kami untuk memberikan solusi digital terbaik</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-3 text-indigo-700">Visi</h3>
                    <p class="text-gray-600">Menjadi penyedia layanan pengembangan website terdepan di Indonesia yang menghadirkan solusi digital inovatif dan berkualitas tinggi berbasis teknologi Laravel untuk mendukung pertumbuhan bisnis klien kami.</p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-3 text-indigo-700">Misi</h3>
                    <ul class="text-gray-600 list-disc list-inside space-y-2">
                        <li>Menyediakan website yang cepat, aman, dan mudah digunakan untuk berbagai jenis bisnis.</li>
                        <li>Memberikan pelayanan pelanggan yang responsif dan profesional.</li>
                        <li>Mengintegrasikan teknologi terbaru untuk memastikan website klien selalu up-to-date.</li>
                        <li>Mendukung klien dengan solusi yang disesuaikan dengan kebutuhan spesifik mereka.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-indigo-700">Hubungi Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Kirimkan pesan Anda untuk konsultasi atau pertanyaan lebih lanjut</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4 text-indigo-700">Informasi Kontak</h3>
                    <address class="not-italic text-gray-600">
                        <p>Jl. Koreak-Sedong, Kuningan</p>
                        <p>Jawa Barat, Indonesia</p>
                        <p class="mt-2">Email: <a href="mailto:info@webcraftstudio.id" class="text-indigo-600 hover:text-indigo-800">info@webcraftstudio.id</a></p>
                        <p>Telepon: <a href="tel:+6281234567890" class="text-indigo-600 hover:text-indigo-800">+62 812 3456 7890</a></p>
                    </address>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.597 0-2.917-.01-3.96-.058-.976-.045-1.505-.207-1.858-.344-.466-.182-.8-.398-1.15-.748-.35-.35-.566-.683-.748-1.15-.137-.353-.3-.882-.344-1.857-.048-1.055-.058-1.37-.058-4.041v-.08c0-2.597.01-2.917.058-3.96.045-.976.207-1.505.344-1.858a3.097 3.097 0 00.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4 text-indigo-700">Kirim Pesan</h3>
                    <div>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-600 mb-2">Nama</label>
                            <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-600 mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Masukkan email Anda" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-600 mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Tulis pesan Anda" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Kirim Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-indigo-900 text-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">WebCraft Pro</h3>
                    <p class="text-indigo-300">Layanan profesional pembuatan website berbasis Laravel dengan kualitas terbaik untuk bisnis Anda.</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-indigo-300 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#features" class="text-indigo-300 hover:text-white transition duration-300">Fitur</a></li>
                        <li><a href="#portfolio" class="text-indigo-300 hover:text-white transition duration-300">Portfolio</a></li>
                        <li><a href="#vision-mission" class="text-indigo-300 hover:text-white transition duration-300">Visi & Misi</a></li>
                        <li><a href="#contact" class="text-indigo-300 hover:text-white transition duration-300">Kontak</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-indigo-300 hover:text-white transition duration-300">Web Development</a></li>
                        <li><a href="#" class="text-indigo-300 hover:text-white transition duration-300">Mobile App</a></li>
                        <li><a href="#" class="text-indigo-300 hover:text-white transition duration-300">Digital Marketing</a></li>
                        <li><a href="#" class="text-indigo-300 hover:text-white transition duration-300">SEO</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Hubungi Kami</h4>
                    <address class="not-italic text-indigo-300">
                        <p>Jl. Koreak-Sedong, Kuningan</p>
                        <p>Jawa Barat, Indonesia</p>
                        <p class="mt-2">info@webcraftstudio.id</p>
                        <p>+62 812 3456 7890</p>
                    </address>
                    
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-indigo-300 hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-indigo-300 hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.597 0-2.917-.01-3.96-.058-.976-.045-1.505-.207-1.858-.344-.466-.182-.8-.398-1.15-.748-.35-.35-.566-.683-.748-1.15-.137-.353-.3-.882-.344-1.857-.048-1.055-.058-1.37-.058-4.041v-.08c0-2.597.01-2.917.058-3.96.045-.976.207-1.505.344-1.858a3.097 3.097 0 00.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-indigo-300 hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                        <a href="#" class="text-indigo-300 hover:text-white transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-indigo-800 mt-8 pt-8 text-center text-indigo-300">
                <p>© 2023 WebCraft Pro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });
        
        // Scroll reveal animation
        window.addEventListener('scroll', revealOnScroll);
        
        function revealOnScroll() {
            const elements = document.querySelectorAll('.feature-card');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementPosition < windowHeight - 100) {
                    element.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        }
        
        // Initial call to check elements already in view
        revealOnScroll();
    </script>
</body>
</html>