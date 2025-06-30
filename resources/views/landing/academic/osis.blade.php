@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <div class="relative">
        <img src="{{ asset('image/logo_osis.png') }}" class="w-full" />
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-9/12 md:w-1/3 text-center mx-auto space-y-2 px-4 py-2 rounded-t-lg"
            style="background-color: rgba(2, 128, 2, 0.646);">
            <p class="text-sm md:text-xl font-medium text-white">Akademisi</p>
            <p class="font-semibold text-base md:text-4xl"
                style="color: {{ \App\Models\Setting::getValue('color_secondary') }}">OSIS</p>
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
                        <a href="{{ route('academic.osis') }}" class="ml-1 font-medium hover:text-blue-600 md:ml-2">OSIS</a>
                    </li>
                </div>
            </nav>


            {{-- Content --}}
            <div class="space-y-16 md:space-y-20" style="color: {{ \App\Models\Setting::getValue('color_primary') }}">
                {{-- Deskripsi --}}
                <div class="space-y-8 md:space-y-12 text-sm">
                    <p class="text-xl md:text-5xl font-bold">OSIS AL-MAISYAROH</p>
                    <p class="text-lg">
                        OSIS SMK Al-Maisyaroh berdiri sejak tahun 2010 sebagai wadah bagi siswa untuk mengembangkan
                        kepemimpinan, kreativitas, dan semangat kebersamaan. Sejak awal, OSIS telah aktif menyelenggarakan
                        kegiatan keagamaan, sosial, seni, dan olahraga yang mendukung pembentukan karakter siswa.
                        Dengan moto "Bersatu, Berkarya, Berprestasi", OSIS terus menjadi motor penggerak berbagai kegiatan
                        positif di lingkungan sekolah, sekaligus membawa nama baik SMK Al-Maisyaroh dalam berbagai ajang.
                    </p>
                </div>

                {{-- Visi --}}
                <div class="space-y-8 md:space-y-12">
                    <p class="text-xl md:text-5xl font-bold">VISI</p>
                    <div class="max-w-5xl mx-auto flex justify-center px-10 py-5 border-l-8 border-black bg-gray-200">
                        <div class="flex items-baseline space-x-3">
                            <i class="fa-solid fa-quote-left fa-4x text-black"></i>
                            <p class="mt-5 md:mt-10 w-4/5 text-lg"
                                style="color: {{ \App\Models\Setting::getValue('color_primary') }}">
                                Menjadi organisasi siswa yang berintegritas, inovatif, dan berakhlak mulia dalam mewujudkan
                                lingkungan sekolah yang aktif, kreatif, dan berprestasi.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Misi --}}
                <div class="space-y-8 md:space-y-12 text-sm md:text-base">
                    <p class="text-xl md:text-5xl font-bold">MISI</p>
                    <div>
                        <p class="text-lg">
                            Untuk mewujudkan visi tersebut, OSIS Al-Maisyaroh menetapkan beberapa misi sebagai berikut:
                        </p>
                        <ol class="list-decimal list-inside space-y-3 mt-3 text-lg">
                            <li>
                                Meningkatkan semangat kepemimpinan dan tanggung jawab siswa melalui kegiatan organisasi yang
                                positif.
                            </li>
                            <li>
                                MenanaMenyelenggarakan program kerja yang mendukung pengembangan bakat dan minat siswa di
                                bidang akademik maupun non-akademik.
                            </li>
                            <li>
                                Menanamkan nilai-nilai keagamaan dan moral dalam setiap kegiatan OSIS.
                            </li>
                            <li>
                                Membangun komunikasi yang efektif antara siswa, guru, dan pihak sekolah untuk menciptakan
                                lingkungan belajar yang harmonis.
                            </li>
                            <li>
                                Mengadakan kegiatan sosial dan kemasyarakatan sebagai bentuk kepedulian terhadap lingkungan
                                sekitar.
                            </li>
                        </ol>
                    </div>
                </div>

                {{-- Tujuan --}}
                <div class="space-y-8 md:space-y-12 text-sm md:text-base">
                    <p class="text-xl md:text-5xl font-bold">TUJUAN</p>
                    <div>
                        <p class="text-lg">
                            Sebagai organisasi yang mewadahi pengembangan diri siswa di sekolah, OSIS SMK Al-Maisyaroh
                            memiliki tujuan utama sebagai berikut:
                        </p>
                        <ol class="list-decimal list-inside space-y-3 mt-3 text-lg">
                            <li>
                                Membentuk siswa yang bertanggung jawab, disiplin, dan mampu menjadi teladan di lingkungan
                                sekolah.
                            </li>
                            <li>
                                Menumbuhkan jiwa kepemimpinan dan semangat gotong royong melalui kegiatan organisasi.
                            </li>
                            <li>
                                Menjadi wadah aspirasi, kreativitas, serta pengembangan minat dan bakat siswa.
                            </li>
                            <li>
                                Meningkatkan rasa cinta terhadap sekolah dan kepedulian terhadap lingkungan sosial.
                            </li>
                            <li>
                                Menjalin kerja sama yang harmonis antara siswa, guru, dan warga sekolah lainnya.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection()
