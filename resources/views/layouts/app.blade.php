<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ \App\Models\Setting::getValue('site_name', 'SMK ALUSI') }}</title>
    <link rel="icon" href="{{ asset('icons/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-...longhash..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- ALPINE JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    @include('partials.navbar')
    <main class="bg-white text-gray-800 font-poppins">
        @include('partials.color')
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>
