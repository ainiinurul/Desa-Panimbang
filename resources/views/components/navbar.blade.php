<!-- Navbar (Versi yang Diperbaiki) -->
<nav class="bg-white shadow-md sticky top-0 z-50" x-data="{ open: false }">
    <div class="container mx-auto px-4 py-2">
        <div class="flex justify-between items-center">
            <!-- Logo & Title -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('img/logo_cilacap.png') }}" alt="Logo Cilacap" class="h-14 w-auto">
                <div class="flex flex-col">
                    <span class="font-bold text-lg text-blue-800">DESA PANIMBANG</span>
                    <span class="text-xs text-gray-600">KAB. CILACAP</span>
                </div>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <!-- Beranda menu item -->
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }} py-2 font-medium">Beranda</a>
                
                <!-- Tentang dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button @click="open = !open" class="{{ request()->is('sejarah*') || request()->is('wilayah*') || request()->is('statistik*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }} py-2 font-medium flex items-center">Tentang
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-cloak class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                        <a href="/sejarah" class="{{ request()->is('sejarah*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-blue-50' }} block px-4 py-2">Sejarah</a>
                        <a href="/wilayah" class="{{ request()->is('wilayah*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-blue-50' }} block px-4 py-2">Wilayah</a>
                        <a href="/statistik" class="{{ request()->is('statistik*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-blue-50' }} block px-4 py-2">Statistik</a>
                    </div>
                </div>
                
                <!-- Other nav items -->
                <a href="/pelayanan" class="{{ request()->is('pelayanan*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }} py-2 font-medium">Pelayanan Online</a>
                <a href="/pengaduan" class="{{ request()->is('pengaduan*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }} py-2 font-medium">Pengaduan</a>
                <a href="/lembaga" class="{{ request()->is('lembaga*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' }} py-2 font-medium">Lembaga</a>
                
                <!-- Login/Register or User Dropdown -->
                @auth
                <!-- Tampilan ketika user sudah login -->
                <div class="relative" x-data="{ openAuth: false }">
                    <button @click="openAuth = !openAuth" class="flex items-center space-x-1 py-2 text-gray-700 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                    </button>
                    <div x-show="openAuth" @click.away="openAuth = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Logout</button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Tampilan ketika user belum login -->
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 py-2 font-medium">
                    Login
                </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-500 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-cloak class="md:hidden mt-2" @click.away="open = false">
            <a href="/beranda" class="{{ request()->is('beranda') || request()->is('/') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} block py-2 px-4 font-medium">Beranda</a>
            <div x-data="{ openSubMenu: false }">
                <button @click="openSubMenu = !openSubMenu" class="{{ request()->is('sejarah*') || request()->is('wilayah*') || request()->is('statistik*') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} w-full text-left py-2 px-4 font-medium flex items-center justify-between">
                    Tentang
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openSubMenu" class="pl-6">
                    <a href="/sejarah" class="{{ request()->is('sejarah*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-blue-50' }} block py-2 px-4">Sejarah</a>
                    <a href="/wilayah" class="{{ request()->is('wilayah*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-blue-50' }} block py-2 px-4">Wilayah</a>
                    <a href="/statistik" class="{{ request()->is('statistik*') ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-blue-50' }} block py-2 px-4">Statistik</a>
                </div>
            </div>
            <a href="/pelayanan" class="{{ request()->is('pelayanan*') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} block py-2 px-4 font-medium">Pelayanan Online</a>
            <a href="/pengaduan" class="{{ request()->is('pengaduan*') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} block py-2 px-4 font-medium">Pengaduan</a>
            <a href="/lembaga" class="{{ request()->is('lembaga*') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} block py-2 px-4 font-medium">Lembaga</a>
            
            <!-- Mobile Login/Register or User Dropdown -->
            @auth
            <!-- Tampilan ketika user sudah login -->
            <div class="py-2 px-4">
                <div class="relative" x-data="{ openAuth: false }">
                    <button @click="openAuth = !openAuth" class="flex items-center space-x-1 text-gray-700 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                    </button>
                    <div x-show="openAuth" class="mt-2 w-full bg-white rounded-md shadow-lg py-1 z-50">
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" onclick="event.preventDefault(); this.closest('form').submit(); window.location.href = '/';" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <!-- Tampilan ketika user belum login -->
            <a href="{{ route('login') }}" class="block py-2 px-4 text-gray-700 hover:text-blue-600 font-medium">
                Login
            </a>
            @endauth
        </div>
    </div>
</nav>