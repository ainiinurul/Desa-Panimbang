<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Desa Panimbang</title>

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    {{-- SAYA GANTI @VITE DENGAN LINK LANGSUNG UNTUK MENJAMIN SEMUANYA BERFUNGSI --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    {{-- -------------------------------------------------------------------------- --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .profile-dropdown {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .profile-avatar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 2px solid rgba(255, 255, 255, 0.18);
        }
        
        .status-indicator {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .notification-badge {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="bg-gradient-to-b from-blue-800 to-blue-900 text-white w-70 space-y-6 px-2 py-4 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20 shadow-xl">
            <div class="flex items-center space-x-2 px-4 py-3 border-b border-blue-700">
                <img src="{{ asset('img/logo_cilacap.png') }}" alt="Logo" class="h-10">
                <span class="text-xl font-bold">Admin Desa</span>
            </div>

            <nav class="space-y-1">
                <!-- 1. Dashboard (Menu Utama) -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }} group">
                    <i class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                    <span>Dashboard</span>
                </a>

                {{-- 2. Manajemen Beranda (Menu Dropdown) --}}
                <div x-data="{ open: {{ request()->routeIs('admin.berita.*') || request()->routeIs('admin.programs.*') || request()->routeIs('admin.settings.*') ? 'true' : 'false' }} }">
                    {{-- Tombol Utama Dropdown --}}
                    <button @click="open = !open" class="flex items-center justify-between w-full py-2.5 px-4 rounded transition duration-200 group {{ request()->routeIs('admin.berita.*') || request()->routeIs('admin.programs.*') || request()->routeIs('admin.settings.*') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }}">
                        <div class="flex items-center">
                            <i class="fas fa-home mr-3 {{ request()->routeIs('admin.berita.*') || request()->routeIs('admin.programs.*') || request()->routeIs('admin.settings.*') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                            <span>Manajemen Beranda</span>
                        </div>
                        <i class="fas text-sm transition-transform duration-300" :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                    </button>

                    {{-- Submenu yang bisa buka-tutup --}}
                    <div x-show="open" x-transition class="pl-8 py-2 space-y-1">
                        <a href="{{ route('admin.settings.index') }}" class="block py-2 px-4 rounded text-sm transition-colors {{ request()->routeIs('admin.settings.*') ? 'text-white font-semibold' : 'hover:bg-blue-700' }}">
                            › Pengaturan Website
                        </a>
                        <a href="{{ route('admin.programs.index') }}" class="block py-2 px-4 rounded text-sm transition-colors {{ request()->routeIs('admin.programs.*') ? 'text-white font-semibold' : 'hover:bg-blue-700' }}">
                            › Program Desa
                        </a>
                        <a href="{{ route('admin.berita.index') }}" class="block py-2 px-4 rounded text-sm transition-colors {{ request()->routeIs('admin.berita.*') ? 'text-white font-semibold' : 'hover:bg-blue-700' }}">
                            › Berita
                        </a>
                    </div>
                </div>

                <!-- 3. Manajemen Desa (Menu Dropdown) - BARU -->
                <div x-data="{ open: {{ request()->routeIs('admin.sejarah.*') || request()->routeIs('admin.wilayah.*') || request()->routeIs('admin.statistik.*') ? 'true' : 'false' }} }">
                    {{-- Tombol Utama Dropdown --}}
                    <button @click="open = !open" class="flex items-center justify-between w-full py-2.5 px-4 rounded transition duration-200 group {{ request()->routeIs('admin.sejarah.*') || request()->routeIs('admin.wilayah.*') || request()->routeIs('admin.statistik.*') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }}">
                        <div class="flex items-center">
                            <i class="fas fa-building mr-3 {{ request()->routeIs('admin.sejarah.*') || request()->routeIs('admin.wilayah.*') || request()->routeIs('admin.statistik.*') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                            <span>Manajemen Desa</span>
                        </div>
                        <i class="fas text-sm transition-transform duration-300" :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                    </button>

                    {{-- Submenu yang bisa buka-tutup --}}
                    <div x-show="open" x-transition class="pl-8 py-2 space-y-1">
                        <a href="{{ route('admin.sejarah.index') }}" class="block py-2 px-4 rounded text-sm transition-colors {{ request()->routeIs('admin.sejarah.*') ? 'text-white font-semibold' : 'hover:bg-blue-700' }}">
                            › Sejarah Desa
                        </a>
                        <a href="{{ route('admin.wilayah.index') }}" class="block py-2 px-4 rounded text-sm transition-colors {{ request()->routeIs('admin.wilayah.*') ? 'text-white font-semibold' : 'hover:bg-blue-700' }}">
                            › Wilayah Desa
                        </a>
                        <a href="{{ route('admin.statistik.index') }}" class="block py-2 px-4 rounded text-sm transition-colors {{ request()->routeIs('admin.statistik.*') ? 'text-white font-semibold' : 'hover:bg-blue-700' }}">
                            › Statistik Desa
                        </a>
                    </div>
                </div>

                <!-- 4. Manajemen Pelayanan (Menu Dropdown) -->
                <div x-data="{ open: {{ request()->routeIs('admin.pelayanan.*') || request()->routeIs('admin.pengaduan.*') ? 'true' : 'false' }} }">
                    {{-- Tombol Utama Dropdown --}}
                    <button @click="open = !open" class="flex items-center justify-between w-full py-2.5 px-4 rounded transition duration-200 group {{ request()->routeIs('admin.pelayanan.*') || request()->routeIs('admin.pengaduan.*') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }}">
                        <div class="flex items-center">
                            <i class="fas fa-hands-helping mr-3 {{ request()->routeIs('admin.pelayanan.*') || request()->routeIs('admin.pengaduan.*') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                            <span>Manajemen Warga</span>
                        </div>
                        <i class="fas text-sm transition-transform duration-300" :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                    </button>

                    {{-- Submenu yang bisa buka-tutup --}}
                    <div x-show="open" x-transition class="pl-8 py-2 space-y-1">
                        <a href="{{ route('admin.pelayanan.index') }}" class="block py-2 px-4 rounded text-sm transition-colors {{ request()->routeIs('admin.pelayanan.*') ? 'text-white font-semibold' : 'hover:bg-blue-700' }}">
                            › Pelayanan Online
                        </a>
                        <a href="{{ route('admin.pengaduan.index') }}" class="block py-2 px-4 rounded text-sm transition-colors {{ request()->routeIs('admin.pengaduan.*') ? 'text-white font-semibold' : 'hover:bg-blue-700' }}">
                            › Pengaduan Warga
                        </a>
                    </div>
                </div>
                
                <!-- 5. Manajemen Lembaga (Menu Utama) -->
                <a href="{{ route('admin.lembaga.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.lembaga.*') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }} group">
                    <i class="fas fa-sitemap mr-3 {{ request()->routeIs('admin.lembaga.*') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                    <span>Manajemen Lembaga</span>
                </a>

                <!-- 6. Manajemen Pengguna (Menu Utama) -->
                <a href="{{ route('admin.user.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.user.*') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }} group">
                    <i class="fas fa-users mr-3 {{ request()->routeIs('admin.user.*') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                    <span>Manajemen Pengguna</span>
                </a>

                <!-- 7. Logout (Menu Utama) -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 hover:shadow-md group text-left">
                        <i class="fas fa-sign-out-alt mr-3 text-blue-300 group-hover:text-white"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
            
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-blue-700">
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full mr-3" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4A90E2&color=fff" alt="Profile">
                    <div>
                        <p class="font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-blue-300 capitalize">{{ Auth::user()->role }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar dengan Header yang Paten -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button id="sidebar-toggle" class="md:hidden text-gray-600 focus:outline-none hover:text-blue-600 transition-colors mr-4">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <!-- Header -->
                        <div class="flex items-center bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-3 rounded-lg shadow-lg">
                            <div class="flex items-center space-x-3">
                                <div class="bg-white bg-opacity-20 p-2 rounded-full">
                                    <i class="fas fa-home text-white text-lg"></i>
                                </div>
                                <div class="text-white">
                                    <h1 class="text-lg font-semibold tracking-wide">Sistem Manajemen Desa Panimbang</h1>
                                    <p class="text-xs font-light opacity-75">Portal Administrasi Digital</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RIGHT SIDE - IMPROVED USER PROFILE SECTION -->
                    <div class="flex items-center space-x-4">
                        <!-- Divider -->
                        <div class="w-px h-8 bg-gray-300"></div>

                        <!-- User Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-3 bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 px-4 py-2 rounded-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 group">
                                <!-- Avatar with Status Indicator -->
                                <div class="relative">
                                    <img class="profile-avatar h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=667eea&color=fff&size=40" alt="Profile">
                                    <div class="status-indicator absolute -bottom-0.5 -right-0.5 h-3 w-3 bg-green-400 rounded-full border-2 border-white"></div>
                                </div>
                                
                                <!-- User Info -->
                                <div class="hidden sm:block text-left">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</span>
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full font-medium capitalize">{{ Auth::user()->role }}</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-0.5">Online sekarang</p>
                                </div>
                                
                                <!-- Chevron -->
                                <i class="fas fa-chevron-down text-xs text-gray-500 transition-transform duration-200 group-hover:text-blue-600" :class="{'rotate-180': open}"></i>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div x-show="open" 
                                 @click.away="open = false" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 class="profile-dropdown absolute right-0 mt-3 w-64 rounded-xl shadow-2xl py-2 z-50 border border-gray-200">
                                
                                <!-- User Info Header -->
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <div class="flex items-center space-x-3">
                                        <img class="h-12 w-12 rounded-full object-cover ring-2 ring-blue-500" src="https://ui-avatars.com/api/?name=Aini+Nurul+Apreliza&background=667eea&color=fff&size=48" alt="Profile">
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                            <div class="flex items-center space-x-1 mt-1">
                                                <div class="h-2 w-2 bg-green-400 rounded-full"></div>
                                                <span class="text-xs text-green-600 font-medium">Online</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Menu Items -->
                                <div class="py-1">
                                    <a href="{{ route('admin.profile.show') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                        <i class="fas fa-user-circle mr-3 text-gray-400"></i>
                                        Profil Saya
                                    </a>
                                </div>
                                
                                <!-- Divider -->
                                <div class="border-t border-gray-100 my-1"></div>
                                
                                <!-- Logout Button -->
                                <div class="py-1">
                                    <button class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <i class="fas fa-sign-out-alt mr-3 text-red-400"></i>
                                        Keluar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Mobile sidebar toggle
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.md\\:relative').classList.toggle('-translate-x-full');
        });
    </script>
    @yield('scripts')
</body>
</html>