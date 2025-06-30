@extends('layouts.app')
@section('content')
    {{-- Section 1 start --}}
    <div class="relative">
        <img src="{{ asset('image/home_page.png') }}" alt="home" class="w-full object-cover">
        {{-- kotak --}}
        <div class="absolute right-0 top-0 w-3/4 md:w-2/4 h-full text-white flex flex-col justify-between px-10 pt-5 md:pt-0 md:py-28 md:px-32"
            style="background-color: rgba(7, 142, 45, 0.582); border-radius: 200px 0px 0px 0px;">
            {{-- text --}}
            <div class="text-center justify-center my-auto space-y-2 md:space-y-2 lg:space-y-20">
                <p class="font-semibold text-xs md:text-2xl">SELAMAT DATANG DI</p>
                <p
                    class="font-semibold text-2xl md:text-3xl lg:text-6xl text-secondary"style="color: {{ getSetting('color_secondary') }}">
                    SMK ALUSI</p>
                <section>
                    <p class="font-semibold text-xs md:text-xl">Unggul dalam Prestasi,</p>
                    <p class="font-semibold text-xs md:text-xl">Luhur dalam Akhlak</p>
                </section>
            </div>
        </div>
    </div>
    {{-- Section 1 end --}}
    {{-- Section 2 start --}}
    <p class="text-center text-sm md:text-xl lg:text-3xl font-bold py-2 md:py-5 lg:py-7">TENTANG KAMI</p>
    <div class="relative">
        <img src="{{ asset('image/home_page_2.png') }}" alt="tentang kami" class="w-full">
        <div class="absolute left-0 top-0 w-3/4 md:w-2/4 lg:w-3/4 h-full text-white flex flex-col justify-between px-10 pt-5 md:pt-0 md:py-28 md:px-32"
            style="background-color: rgba(7, 142, 45, 0.582); border-radius: 0px 0px 400px 0px;">
            <div class="w-50 h-full">
                <p class="justify-center my-auto text-center text-xs md:text-xl lg:text-2xl font-medium text-white">
                    {{ getSetting('section_2', 'isi section 2 di pengaturan') }}
                </p>
            </div>
        </div>
    </div>
    {{-- Section 2 end --}}

    {{-- Section 3 Start --}}
    <p class="text-center text-sm md:text-xl lg:text-3xl font-bold py-2 md:py-5 lg:py-7">MENGAPA PILIH SMK ALUSI
    </p>
    <div class="relative">
        <img src="{{ asset('image/home_page_3.png') }}" alt="mengapa" class="w-full">
        {{-- kotak --}}
        <div class="absolute right-0 top-0 w-2/4 md:w-2/4 h-2/4"
            style="background-color: rgba(7, 142, 45, 0.582); border-radius: 0px 0px 0px 500px;">
            {{-- text --}}
            <div class="text-white justify-center text-center">
                <p class="pt-60 font-semibold text-lg md:text-2xl">Pembelajaran Berbasis Kompetensi dan Karakter Islami
                </p>
                <p class="p-10 font-semibold text-md sm:text-sm md:text-lg lg:text-xl">SMK Alusi tidak hanya mengajarkan
                    keterampilan
                    kejuruan,
                    tetapi juga membina karakter siswa melalui pendidikan berbasis nilai-nilai Islam, seperti sholat
                    berjamaah, pengajian, dan pembinaan akhlak.</p>
            </div>
        </div>
        {{-- kotak --}}
        <div class="absolute left-0 bottom-0 w-2/4 md:w-2/4 h-2/4"
            style="background-color: rgba(7, 142, 45, 0.582); border-radius: 0px 500px 0px 0px ;">
            {{-- text --}}
            <div class="text-white justify-center text-center">
                <p class="pt-60 font-semibold text-lg md:text-2xl">Praktik Industri & Jaringan Kemitraan

                </p>
                <p class="p-10 font-semibold text-md md:text-xl">Siswa mendapatkan pengalaman langsung di dunia kerja
                    melalui Program Prakerin (Praktek Kerja Industri), bekerja sama dengan berbagai perusahaan, bengkel
                    resmi, dan institusi keuangan mitra sekolah.</p>
            </div>
        </div>
    </div>
    {{-- Section 3 End --}}

    <p class="text-center text-sm md:text-xl lg:text-3xl font-bold py-2 md:py-5 lg:py-7">PROGRAM STUDI</p>
    <img src="{{ asset('image/home_page_4.png') }}" class="w-full">

    {{-- Berita --}}
    <div style="background-color: {{ getSetting('color_secondary') }}" class="py-5">
        <div class="mx-5 md:mx-20 lg:mx-60">
            <p class="text-red-400 font-semibold text-lg md:text-2xl">TERKINI</p>
            <p class="text-primary text-2xl md:text-4xl font-semibold mt-2 md:mt-5"
                style="color:{{ getSetting('color_primary') }}">BERITA & INFO</p>
        </div>
        {{-- berita list --}}
        <div class=" space-y-5 pl-5 md:pl-20 lg:pl-20">
            @foreach ($news as $item)
                <div x-data="{ open: false }" class="">
                    <div class="flex items-center space-x-2 md:space-x-5">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="calendar"
                            class="ml-2 lg:ml-40 w-20 md:w-32">
                        <div>
                            <p class="font-semibold text-sm md:text-xl lg:text-2xl">{{ $item->title }}</p>
                            <button @click="open = !open"
                                class="text-xs md:text-lg text-red-600 font-semibold focus:outline-none">
                                <span x-show="!open">Baca Selengkapnya</span>
                                <span x-show="open">Tutup</span>
                            </button>
                        </div>
                    </div>
                    <!-- Konten Detail -->
                    <div x-show="open" x-transition x-cloak
                        class="bg-gray-100 p-4 rounded-lg border border-gray-300 text-xs md:text-md lg:text-lg mx-2 md:mx-10 lg:mx-40">
                        {!! $item->content !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Sosmed bawah --}}
    <section>
        <div
            class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 mx-auto text-center items-center text-white font-bold text-lg">
            <div class="w-30 bg-blue-400 py-10">
                <div><i class="fa-brands fa-instagram fa-2x"></i></div>
                <span class="text-xs md:text-md lg:text-lg">{{ getSetting('instagram_name', 'smkalusi_') }}</span>
            </div>
            <div class="w-30 bg-red-800 py-10 ">
                <div><i class="fa-regular fa-envelope fa-2x"></i></div>
                <span
                    class="text-sm md:text-md lg:text-lg">{{ getSetting('email_name', 'smkalusi.official01@gmail.com') }}</span>
            </div>
            <div class="w-30 bg-green-900 py-10">
                <div><i class="fa-solid fa-phone fa-2x"></i></div>
                <span class="text-sm md:text-md lg:text-lg">{{ getSetting('phone_number', '(021)87988606') }}</span>
            </div>
        </div>
    </section>
@endsection
