@extends('layouts.app')
@section('content')
    <div class="relative">
        <img src="{{ asset('image/headerhomepage.png') }}" alt="Header" class="w-full h-auto object-cover">
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-9/12 md:w-1/3 text-center mx-auto space-y-2 px-4 py-2 rounded-t-lg"
            style="background-color: rgba(2, 128, 2, 0.646);">
            <p class="text-sm md:text-xl font-medium text-white">Program Studi</p>
            <p class="font-semibold text-base md:text-4xl"
                style="color: {{ \App\Models\Setting::getValue('color_secondary') }}">Administrasi Perkantoran</p>
        </div>
    </div>

    {{-- Crumb Menu --}}
    {{-- <div class="px-5 md:px-28 lg:px-28 my-16 text-base md:text-lg text-primary"> --}}
    <div class="px-5 md:px-5 lg:px-5 py-6 text-sm md:text-base">
        <nav class="flex mb-10" aria-label="Breadcrumb">
            <li class="inline-flex items-center space-x-1 md:space-x-3">
                <a href="{{ route('home') }}" class="text-black hover:text-blue-600">Home</a>
            </li>
            <div class="flex items-center ml-2">
                >>
                <li class="inline-flex items-center">
                    <a href="{{ route('study-program') }}" class="ml-1 font-medium hover:text-blue-600 md:ml-2">Program
                        Studi</a>
                </li>
            </div>
        </nav>


        {{-- Content --}}
        <div class="space-y-16 md:space-y-20" style="color: {{ \App\Models\Setting::getValue('color_primary') }}">
            {{-- Deskripsi --}}
            <div class="space-y-8 md:space-y-12 text-sm">
                <p class="text-xl md:text-5xl font-bold">ADMINISTRASI PERKANTORAN</p>
                <p class="text-lg">
                    Siswa/i SMK Alusi Bojong Gede jurusan Administrasi Perkantoran banyak diminati
                    oleh dunia usaha dan industri, bahkan sejak masih menjalani praktik kerja
                    industri. Mereka dibekali keterampilan mengelola surat-menyurat, pengarsipan,
                    pelayanan tamu, serta penguasaan aplikasi perkantoran seperti Microsoft Office.
                    Lulusan siap bekerja sebagai staf administrasi, resepsionis, sekretaris, atau
                    operator kantor di berbagai perusahaan.
                </p>
            </div>

            {{-- Visi --}}
            <div class="space-y-8 md:space-y-12">
                <p class="text-xl md:text-5xl font-bold">VISI PROGRAM KEAHLIAN</p>
                <div class="max-w-5xl mx-auto flex justify-center px-10 py-5 border-l-8 border-black bg-gray-200">
                    <div class="flex items-baseline space-x-3">
                        <i class="fa-solid fa-quote-left fa-4x text-black"></i>
                        <p class="mt-5 md:mt-10 w-4/5 text-lg"
                            style="color: {{ \App\Models\Setting::getValue('color_primary') }}">
                            Menjadi program keahlian yang unggul dalam mencetak tenaga administrasi
                            yang profesional, berkarakter, dan berdaya saing di dunia kerja, serta
                            menjunjung tinggi nilai-nilai Islami.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Misi --}}
            <div class="space-y-8 md:space-y-12 text-sm md:text-base">
                <p class="text-xl md:text-5xl font-bold">MISI PROGRAM KEAHLIAN</p>
                <div>
                    <p class="text-lg">
                        Untuk mewujudkan visi tersebut, Program Keahlian Administrasi Perkantoran
                        SMK Alusi Bojong Gede menetapkan beberapa misi sebagai berikut:
                    </p>
                    <ol class="list-decimal list-inside space-y-3 mt-3 ">
                        <li>
                            Membekali siswa dengan pengetahuan dan keterampilan di bidang
                            administrasi perkantoran sesuai perkembangan teknologi dan kebutuhan
                            dunia kerja.
                        </li>
                        <li>
                            Menanamkan sikap kerja yang disiplin, teliti, tanggung jawab, dan mampu
                            bekerja sama dalam tim.
                        </li>
                        <li>
                            Meningkatkan kemampuan siswa dalam pengoperasian aplikasi perkantoran
                            dan sistem administrasi digital.
                        </li>
                    </ol>
                </div>
            </div>

            {{-- Tujuan --}}
            <div class="space-y-8 md:space-y-12 text-sm md:text-base">
                <p class="text-xl md:text-5xl font-bold">TUJUAN PROGRAM KEAHLIAN</p>
                <div>
                    <p>
                        Program Keahlian Administrasi Perkantoran SMK Alusi Bojong Gede bertujuan
                        untuk:
                    </p>
                    <ol class="list-decimal list-inside space-y-3 mt-3">
                        <li>
                            Menghasilkan lulusan yang kompeten dalam bidang administrasi
                            perkantoran, baik secara manual maupun digital.
                        </li>
                        <li>
                            Mempersiapkan siswa agar mampu mengisi peluang kerja sebagai tenaga
                            administrasi yang profesional dan siap bersaing di dunia industri maupun
                            pemerintahan.
                        </li>
                        <li>
                            Menumbuhkan sikap kerja yang positif, seperti disiplin, jujur, tanggung
                            jawab, teliti, dan mampu berkomunikasi secara efektif.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection()
