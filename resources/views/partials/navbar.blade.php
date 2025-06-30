<nav class="bg-white text-white sticky top-0 z-50 shadow">
    <div class="container mx-auto px-4 md:px-10 lg:px-36 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('icons/logo.png') }}" alt="Logo" class="w-16 md:w-24">
            </a>
            <div>
                <a href="{{ route('home') }}" class="text-sm md:text-2xl lg:text-3xl font-bold"
                    style="color: {{ getSetting('color_primary', '#31552D') }}">
                    {{ getSetting('site_name', 'SMK ALUSI') }}
                </a>
                <p class="text-xs md:text-md lg:text-lg  text-black">
                    {{ getSetting('site_address', 'Bogor') }}</p>
            </div>
        </div>

        {{-- Hamburger Menu --}}
        <div class="md:hidden">
            <button id="mobileMenuButton" class="text-black focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        {{-- Icon User --}}
        <div class="hidden md:block ml-4">
            <a href="{{ route('students.index') }}">
                <i class="fas fa-user-circle text-3xl" style="color: {{ getSetting('color_primary', '#31552D') }}"></i>
            </a>
        </div>
    </div>

    {{-- Desktop Menu --}}
    <div style="background-color: {{ getSetting('color_primary', '#31552D') }}"
        class="hidden md:flex justify-center py-4">
        <ul class="flex lg:gap-20 font-semibold text-lg text-center">
            <a href="{{ route('home') }}" class="hover:bg-white hover:bg-opacity-10 rounded-sm px-4 py-2">Profile</a>
            </li>
            <a href="{{ route('study-program') }}"
                class="hover:bg-white hover:bg-opacity-10 rounded-sm px-4 py-2">Program Studi</a></li>
            <a href="{{ route('news') }}" class="hover:bg-white hover:bg-opacity-10 rounded-sm px-4 py-2">Berita</a>


            <div class="relative inline-block text-left">
                <button id="dropdownButton" class="text-white font-semibold px-4 py-2 rounded-sm">
                    Akademis
                </button>
                <div id="dropdownMenu"
                    class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-2">
                    <ul class="py-1 text-sm text-gray-700">
                        <li><a href="{{ route('academic.extra') }}"
                                class="block px-4 py-2 hover:bg-gray-100">EkstraKulikuler</a></li>
                        <li><a href="{{ route('academic.osis') }}" class="block px-4 py-2 hover:bg-gray-100">Osis</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('register-form') }}"
                class="hover:bg-white hover:bg-opacity-10 rounded-sm px-4 py-2">Pendaftaran</a>
            <a href="{{ route('fasility') }}"
                class="hover:bg-white hover:bg-opacity-10 rounded-sm px-4 py-2">Fasilitas</a>
        </ul>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="md:hidden hidden px-6 pb-4"
        style="background-color: {{ \App\Models\Setting::getValue('color_primary') }}">
        <ul class="flex flex-col gap-2 font-semibold text-white">
            <li><a href="{{ route('home') }}" class="block py-2">Profile</a></li>
            <li><a href="{{ route('study-program') }}" class="block py-2">Program Studi</a></li>
            <li><a href="{{ route('news') }}" class="block py-2">Berita</a></li>
            <li>
                <div class="relative">
                    <button id="mobileDropdownButton" class="w-full text-left py-2">Akademis</button>
                    <div id="mobileDropdownMenu" class="hidden bg-white text-black rounded mt-1">
                        <a href="{{ route('academic.extra') }}"
                            class="block px-4 py-2 hover:bg-gray-100">EkstraKulikuler</a>
                        <a href="{{ route('academic.osis') }}" class="block px-4 py-2 hover:bg-gray-100">Osis</a>
                    </div>
                </div>
            </li>
            <li><a href="{{ route('register-form') }}" class="block py-2">Pendaftaran</a></li>
            <li><a href="{{ route('fasility') }}" class="block py-2">Fasilitas</a></li>
            <li><a href="{{ route('students.index') }}" class="block py-2"><i class="fas fa-user-circle text-xl"></i>
                    Siswa</a></li>
        </ul>
    </div>
</nav>

{{-- Script --}}
<script>
    const dropdownBtn = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const mobileBtn = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileDropdownBtn = document.getElementById('mobileDropdownButton');
    const mobileDropdownMenu = document.getElementById('mobileDropdownMenu');

    dropdownBtn?.addEventListener('click', () => dropdownMenu.classList.toggle('hidden'));

    document.addEventListener('click', function(event) {
        if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });

    mobileBtn?.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    mobileDropdownBtn?.addEventListener('click', () => {
        mobileDropdownMenu.classList.toggle('hidden');
    });
</script>
