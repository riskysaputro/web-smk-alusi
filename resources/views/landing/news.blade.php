{{-- @extends('layouts.app')
@include('partials.navbar')
@section('content')
    <div class="relative">
        <img src="{{ asset('images/berita.jpg') }}" alt="Header" class="w-full h-auto object-cover">
        <div
            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-9/12 md:w-1/3 bg-green-800/70 text-center mx-auto space-y-2 px-4 py-2 rounded-t-lg">
            <p class="text-sm md:text-xl font-medium text-white">Terkini</p>
            <p class="font-semibold text-base md:text-4xl"
                style="color: {{ \App\Models\Setting::getValue('color_secondary') }}">Berita</p>
        </div>
    </div>

    <div class="px-5 md:px-28 py-16 text-base md:text-lg text-primary pb-56">
        <nav class="flex" aria-label="breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        Profile
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        >>
                        <a href="{{ route('news') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Program
                            Studi</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    @include('partials.footer')
@endsection() --}}

@extends('layouts.app')
@include('partials.navbar')

@section('title', 'Berita - SMK Alusi')

@section('content')
    {{-- Header Gambar --}}
    <div class="relative">
        <img src="{{ asset('image/berita.png') }}" alt="Header Berita" class="w-full h-auto object-cover">
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-9/12 md:w-1/3 text-center mx-auto space-y-2 px-4 py-2 rounded-t-lg"
            style="background-color: rgba(2, 128, 2, 0.646);">
            <p class="text-sm md:text-xl font-medium text-white">Terkini</p>
            <p class="font-semibold text-base md:text-4xl"
                style="color: {{ \App\Models\Setting::getValue('color_secondary') }}">Berita</p>
        </div>
    </div>

    {{-- Breadcrumb --}}
    <div class="px-5 md:px-28 py-6 text-sm md:text-base">
        <nav class="flex" aria-label="Breadcrumb">
            <li class="inline-flex items-center space-x-1 md:space-x-3">
                <a href="{{ route('home') }}" class="text-black hover:text-blue-600">Home</a>
            </li>
            <div class="flex items-center ml-2">
                >>
                <li class="inline-flex items-center">
                    <a href="{{ route('news') }}" class="ml-1 font-medium text-black hover:text-blue-600 md:ml-2">Berita</a>
                </li>
            </div>
        </nav>
    </div>

    {{-- Daftar Berita --}}
    <div class="px-5 md:px-28 pb-20">
        <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8">BERITA TERBARU</h1>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($news as $item)
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-full h-52 object-cover">
                    <div class="p-5 space-y-2">
                        <h2 class="text-xl font-bold text-green-800">{{ $item->title }}</h2>
                        <p class="text-gray-700 text-sm line-clamp-3">{{ $item->excerpt }}</p>
                        <a {{-- href="{{ route('news.show', $item->slug) }}" --}} class="text-blue-600 font-medium hover:underline">Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $news->links() }}
        </div>
    </div>
    @include('partials.footer')
@endsection
