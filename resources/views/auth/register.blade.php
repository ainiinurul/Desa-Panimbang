<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Desa Panimbang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-50 to-gray-100 font-sans antialiased" style="font-family: 'Poppins', sans-serif;">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-blue-600 py-4 px-6">
                    <img class="mx-auto h-12 w-auto" src="{{ asset('img/logo_cilacap.png') }}" alt="Logo Desa">
                    <h2 class="mt-3 text-center text-2xl font-semibold text-white">
                        Buat Akun Baru
                    </h2>
                </div>
                
                <div class="p-6 sm:p-8">
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                            <div class="font-medium">Terjadi kesalahan:</div>
                            <ul class="mt-1 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="space-y-5" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input id="name" name="name" type="text" autocomplete="name" required 
                                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="Nama lengkap">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                                <input id="email" name="email" type="email" autocomplete="email" required 
                                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="email@contoh.com">
                            </div>
                            <div class="relative">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <input id="password" name="password" type="password" autocomplete="new-password" required 
                                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 peer"
                                    placeholder="•••••••• (minimal 8 karakter)"
                                    minlength="8"
                                    oninput="validatePassword(this)">
                                <div id="password-error" class="hidden absolute mt-1 text-xs text-red-600">
                                    Password harus minimal 8 karakter
                                </div>
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" 
                                    autocomplete="new-password" required 
                                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="••••••••">
                            </div>
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Daftar Sebagai</label>
                                <select id="role" name="role" required
                                    class="w-full px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                    <option value="">Pilih peran</option>
                                    <option value="user">User Biasa</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" required
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            </div>
                            <label for="terms" class="ml-2 block text-sm text-gray-600">
                                Saya menyetujui <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Syarat dan Ketentuan</a>
                            </label>
                        </div>

                        <div class="pt-2">
                            <button type="submit" 
                                class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-2 text-white font-medium rounded-lg text-sm transition duration-200 focus:outline-none focus:ring-2">
                                Daftar
                            </button>
                        </div>
                    </form>
                    
                    <div class="mt-6 text-center text-sm text-gray-600">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Masuk disini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validatePassword(input) {
            const passwordError = document.getElementById('password-error');
            if (input.value.length > 0 && input.value.length < 8) {
                input.classList.add('border-red-500');
                input.classList.remove('border-gray-300');
                passwordError.classList.remove('hidden');
            } else {
                input.classList.remove('border-red-500');
                input.classList.add('border-gray-300');
                passwordError.classList.add('hidden');
            }
        }
    </script>
</body>
</html>