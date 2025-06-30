@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    <div class="relative">
        <img src="{{ asset('image/smk_alusi.png') }}" alt="Header" class="w-full h-auto object-cover">
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-9/12 md:w-1/3 text-center mx-auto space-y-2 px-4 py-2 rounded-t-lg"
            style="background-color: rgba(2, 128, 2, 0.646);">
            <p class="text-sm md:text-xl font-medium text-white">Pendaftaran</p>
            <p class="font-semibold text-base md:text-4xl"
                style="color: {{ \App\Models\Setting::getValue('color_secondary') }}">E-Registration
            </p>
        </div>
    </div>

    {{-- Crumb Menu --}}
    <div class="px-5 md:px-28 my-16 text-base md:text-lg text-primary">
        <div class="px-5 md:px-28 py-6 text-sm md:text-base">
            <nav class="flex mb-10" aria-label="Breadcrumb">
                <li class="inline-flex items-center space-x-1 md:space-x-3">
                    <a href="{{ route('home') }}" class="text-black hover:text-blue-600">Home</a>
                </li>
                <div class="flex items-center ml-2">
                    >>
                    <li class="inline-flex items-center">
                        <a href="{{ route('study-program') }}"
                            class="ml-1 font-medium hover:text-blue-600 md:ml-2">Pendaftaran</a>
                    </li>
                </div>
            </nav>

            <div class="text-center space-y-2">
                <p class="text-lg md:text-xl font-medium text-black">FORM PENDAFTARAN</p>
                <p class="text-2xl md:text-4xl font-bold text-green-800">{{ App\Models\Setting::getValue('site_name') }}</p>
            </div>
            @include('partials.notif')

            @if (session('success'))
                <div class="text-center text-green-500 mx-auto">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div style="color:green;">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('register.store') }}" method="POST" class="my-10 space-y-6 max-w-3xl mx-auto">
                @csrf
                <div>
                    <label class="block text-sm font-medium"
                        style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full border rounded px-4 py-2 mt-1">
                </div>
                <div>
                    <label class="block text-sm font-medium"
                        style="color: {{ \App\Models\Setting::getValue('color_primary') }}">NISN
                        <span class="text-red-500">*</span></label>
                    <input type="text" name="nisn" required class="w-full border rounded px-4 py-2 mt-1">
                </div>
                <div>
                    <label class="block text-sm font-medium"
                        style="color: {{ \App\Models\Setting::getValue('color_primary') }}">NIK
                        <span class="text-red-500">*</span></label>
                    <input type="text" name="nik" required class="w-full border rounded px-4 py-2 mt-1">
                </div>
                <div>
                    <label class="block text-sm font-medium"
                        style="color: {{ \App\Models\Setting::getValue('color_primary') }}">No
                        HP <span class="text-red-500">*</span></label>
                    <input type="text" name="phone" required class="w-full border rounded px-4 py-2 mt-1">
                </div>
                <div>
                    <label class="block text-sm font-medium"
                        style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required class="w-full border rounded px-4 py-2 mt-1">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">Email tidak bisa digunakan,silahkan gunakan Email lain</p>
                        {{-- <p class="text-sm text-red-500 mt-1">{{ $message }}</p> --}}
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium"
                        style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Tanggal Lahir <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required class="w-full border rounded px-4 py-2 mt-1">
                </div>
                <div>
                    <div>
                        <label class="block text-sm font-medium"
                            style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Jurusan yang di minati
                            <span class="text-red-500">*</span></label>
                        <input type="text" name="major" required class="w-full border rounded px-4 py-2 mt-1">
                    </div>
                    <br>
                    <div class="mb-4">
                        <label class="block text-sm font-medium"
                            style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Jenis Kelamin <span
                                class="text-red-500">*</span></label>
                        <select name="gender" required class="w-full border rounded px-4 py-2 mt-1">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-Laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium"
                            style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Alamat Tempat Tinggal<span
                                class="text-red-500">*</span></label>
                        <textarea name="address" required class="w-full border rounded px-4 py-2 mt-1"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium"
                            style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Sekolah Asal<span
                                class="text-red-500">*</span></label>
                        <input name="school" required class="w-full border rounded px-4 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium"
                            style="color: {{ \App\Models\Setting::getValue('color_primary') }}">Alamat Sekolah Asal<span
                                class="text-red-500">*</span></label>
                        <textarea name="schooladdress" required class="w-full border rounded px-4 py-2 mt-1"></textarea>
                    </div>
                    {{-- Tombol Submit --}}
                    <br>
                    <div>
                        <button type="submit"
                            class="px-20 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                            <i class="fa fa-cloud-arrow-up"></i>
                            Submit
                        </button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    @include('partials.footer')
@endsection
