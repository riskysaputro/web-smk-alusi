@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between p-5 md:px-28 md:py-5">
        <a class="flex items-center space-x-5 md:space-x-10" href="{{ route('home') }}">
            <img src="{{ asset('icons/logo.png') }}" alt="Alusi" class="w-20 md:w-28" />
            <div class="space-y-2">
                <p class="font-bold text-2xl md:text-4xl" style="color:{{ \App\Models\Setting::getValue('color_primary') }}">
                    {{ \App\Models\Setting::getValue('site_name', 'SMK ALUSI') }}</p>
                <p class="text-xs md:text-base">
                    {{ \App\Models\Setting::getValue('site_address', 'Jl. Kp Sawah Indah Bojong Gede Jawa Barat 16922') }}
                </p>
            </div>
        </a>

        {{-- @auth
            <div class="relative group">
                <button class="rounded-full bg-blue-600 text-white p-2">
                    <i class="fas fa-user"></i>
                </button>
                <div class="hidden absolute right-0 mt-2 w-60 bg-white border rounded-lg shadow-lg group-hover:block">
                    <div class="px-5 py-3">
                        <div class="flex items-center space-x-2">
                            <div class="w-10 h-10 flex items-center justify-center bg-blue-600 text-white rounded-full">
                                <i class="fas fa-user"></i>
                            </div>
                            <p>Halo, {{ Auth::user()->name }}</p>
                        </div>
                        <hr class="my-3" />
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full bg-gray-200 text-blue-600 py-2 rounded-lg">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}" class="rounded-full bg-blue-600 text-white p-2">
                <i class="fas fa-user"></i>
            </a>
        @endauth --}}
    </div>

    {{-- Form Login --}}
    <div class="w-full mt-20">
        <div class="max-w-lg mx-auto px-10 py-20 rounded-lg border-2">
            <p class="text-center text-xl font-semibold" style="color:{{ \App\Models\Setting::getValue('color_primary') }}">
                Masuk Ke Akun Anda</p>

            @if (session('error'))
                <div class="text-red-600 mt-4 text-sm text-center">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="mt-10 space-y-7">
                @csrf

                <div>
                    {{-- <label for="email" class="block text-sm font-medium">E-mail</label> --}}
                    <input id="email" type="email" name="email" required autofocus placeholder="Email"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 focus:outline-none focus:ring focus:ring-blue-300" />
                </div>

                <div>
                    {{-- <label for="password" class="block text-sm font-medium">Kata Sandi</label> --}}
                    <div class="relative">
                        <input id="password" type="password" name="password" required placeholder="Kata Sandi"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1 focus:outline-none focus:ring focus:ring-blue-300" />
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-3 text-gray-500 focus:outline-none">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg">
                    Masuk
                </button>

                <div class="text-right mt-5 text-xs text-blue-600">
                    <a href="">Lupa Kata Sandi?</a>
                </div>

                <hr class="my-3" />

                <p class="text-center mt-5 text-sm">
                    Tidak Punya Akun?
                    <a href="{{ route('register') }}" class="text-red-600 font-semibold">Daftar disini</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passField = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (passField.type === 'password') {
                passField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
@endsection
