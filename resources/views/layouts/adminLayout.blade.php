<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/icons/logo.ico" class="w-5">
    <title>Dashboard - {{ \App\Models\Setting::getValue('site_name', 'SMK ALUSI') }}</title>
    <link rel="icon" href="{{ asset('icons/logo.png') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-...longhash..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>

</head>

<body class="flex min-h-screen bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-800 text-white flex flex-col p-5 space-y-4">
        <a class="text-xl font-bold" href={{ route('home') }}>Admin Panel</a>
        <a href="{{ url('/admin/students') }}" class="hover:bg-gray-700 p-2 rounded">Data Pendaftar</a>
        <a href="{{ route('admin.pages.index') }}" class="hover:bg-gray-700 p-2 rounded">Pengaturan Konten</a>
        <a href="{{ route('admin.settings.index') }}" class="hover:bg-gray-700 p-2 rounded">Pengaturan Website</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-600 hover:bg-red-700 p-2 rounded w-full mt-4">Logout</button>
        </form>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-6 overflow-y-auto">
        @yield('content')
    </main>
</body>

</html>
