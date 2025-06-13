<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Desa Panimbang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="bg-gradient-to-b from-blue-800 to-blue-900 text-white w-64 space-y-6 px-2 py-4 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20 shadow-xl">
            <div class="flex items-center space-x-2 px-4 py-3 border-b border-blue-700">
                <img src="{{ asset('img/logo_cilacap.png') }}" alt="Logo" class="h-10">
                <span class="text-xl font-bold">Admin Desa</span>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }} group">
                    <i class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.berita.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.berita.*') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }} group">
                    <i class="fas fa-newspaper mr-3 {{ request()->routeIs('admin.berita.*') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                    <span>Manajemen Berita</span>
                </a>
                <a href="{{ route('admin.user.index') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.pengguna.*') ? 'bg-blue-700 shadow-md' : 'hover:bg-blue-700 hover:shadow-md' }} group">
                    <i class="fas fa-users mr-3 {{ request()->routeIs('admin.pengguna.*') ? 'text-white' : 'text-blue-300 group-hover:text-white' }}"></i>
                    <span>Manajemen Pengguna</span>
                </a>
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
                    <img class="h-10 w-10 rounded-full mr-3" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Profile">
                    <div>
                        <p class="font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-blue-300">Administrator</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between px-6 py-3">
                    <div class="flex items-center">
                        <button class="md:hidden text-gray-600 focus:outline-none hover:text-blue-600 transition-colors">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-800 ml-4">@yield('title')</h1>
                    </div>
                    <div class="flex items-center space-x-6">
                        <div class="relative">
                            <button class="text-gray-600 hover:text-blue-600 focus:outline-none transition-colors relative">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                            </button>
                        </div>
                        <div class="relative group">
                            <button class="flex items-center space-x-2 focus:outline-none">
                                <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                                <img class="h-8 w-8 rounded-full border-2 border-blue-500" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Profile">
                                <i class="fas fa-chevron-down text-xs text-gray-500 group-hover:text-blue-600 transition-colors"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block z-20">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-6 py-8">
                    <!-- Breadcrumb -->
                    <div class="flex items-center text-sm text-gray-600 mb-6">
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
                        <span class="mx-2">/</span>
                        <span class="font-medium text-blue-600">@yield('title')</span>
                    </div>
                    
                    <!-- Page Content -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Mobile sidebar toggle
        document.querySelector('.md\\:hidden').addEventListener('click', function() {
            document.querySelector('.transform').classList.toggle('-translate-x-full');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.group');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target)) {
                    const menu = dropdown.querySelector('.group-hover\\:block');
                    if (menu) menu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>