@php
    $sections = \App\Models\PageSection::where('page', 'home')->pluck('content', 'section');
    $title = \App\Models\PageSection::where('page', 'home')->pluck('title', 'section');
@endphp

@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <div class="relative">
        <img src="{{ asset('images/berita.jpg') }}" class="w-full" />
        <div class="absolute bottom-0 w-1/3 bg-green-800 text-center mx-auto space-y-2 ">
            <p class="text-base md:text-xl font-medium text-white">Terkini</p>
            <p class="font-semibold text-xl md:text-4xl text-secondary">Berita</p>
        </div>
    </div>

    <div class="px-5 md:px-28 py-16 text-base md:text-lg text-primary pb-56">
        <nav class="flex" aria-label="breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        Profile
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="#"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Berita</a>
                    </div>
                </li>
            </ol>
        </nav>

        <p class="mt-16 mb-5 text-3xl md:text-4xl font-bold">BERITA</p>

        <div class="md:grid md:grid-cols-2 md:gap-32 space-y-24 md:space-y-0">
            @foreach ($sections as $section => $content)
                <div>
                    {{-- <img src="{{ $item['image'] }}" class="w-full" /> --}}
                    <div class="mt-8">
                        {{-- <p class="text-xl md:text-2xl font-bold">{!! $title !!}</p> --}}
                        {{ str_replace('-', ' ', $section) }}
                        <p class="text-sm md:text-base mt-5">{!! $content !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection()
