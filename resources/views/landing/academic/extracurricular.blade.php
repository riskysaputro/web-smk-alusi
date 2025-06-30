@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <div class="relative">
        <img src="{{ asset('image/pramuka.png') }}" class="w-full" />
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-9/12 md:w-1/3 text-center mx-auto space-y-2 px-4 py-2 rounded-t-lg"
            style="background-color: rgba(2, 128, 2, 0.646);">
            <p class="text-sm md:text-xl font-medium text-white">Akademisi</p>
            <p class="font-semibold text-base md:text-4xl"
                style="color: {{ \App\Models\Setting::getValue('color_secondary') }}">Ekstrakurikuler</p>
        </div>
    </div>
    {{-- Crum Menu --}}
    <div class="px-5 md:px-28 py-16 text-base md:text-lg text-primary">
        <div class="px-5 md:px-28 py-6 text-sm md:text-base">
            <nav class="flex" aria-label="Breadcrumb">
                <li class="inline-flex items-center space-x-1 md:space-x-3">
                    <a href="{{ route('home') }}" class="text-black hover:text-blue-600">Home</a>
                </li>
                <div class="flex items-center ml-2">
                    >>
                    <li class="inline-flex items-center">
                        <a href="{{ route('academic.extra') }}"
                            class="ml-1 font-medium hover:text-blue-600 md:ml-2">Ekstrakulikuler</a>
                    </li>
                </div>
            </nav>
            <div class="mb-10">
                <p class="mt-16 mb-5 text-3xl md:text-4xl font-bold"
                    style="color: {{ \App\Models\Setting::getValue('color_primary') }}">
                    Ekstrakulikuler</p>
                <p class="text-lg" style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Ekstrakurikuler
                    adalah kegiatan
                    pendidikan yang dilakukan di luar jam pelajaran wajib, baik di sekolah maupun di luar sekolah, yang
                    bertujuan untuk mengembangkan potensi, bakat, minat, kepribadian, keterampilan, serta rasa tanggung
                    jawab
                    siswa secara menyeluruh.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($extra as $item)
                    <div class="flex flex-col space-y-2">
                        <img src="{{ asset($item['gambar']) }}" alt="{{ $item['judul'] }}"
                            class="rounded-md w-full h-56 object-cover">
                        <h2 class="text-green-800 text-xl font-bold">{{ $item['judul'] }}</h2>
                        <p class="text-gray-700 text-lg">{{ $item['deskripsi'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection()
