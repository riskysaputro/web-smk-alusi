<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PageSection;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $news = News::all();
        return view('landing.home',(compact('news')));
    }

public function indexhome(){
    $title = PageSection::where('page', 'home')->pluck('title', 'section');
    $sections = PageSection::where('page', 'home')->pluck('content', 'section');
    return view('homepage', compact('sections','title'));
}


    public function StudyProgram(){
        $title = PageSection::where('page', 'home')->pluck('title', 'section');
    $sections = PageSection::where('page', 'home')->pluck('content', 'section');
        return view('landing.studyProgram', compact('sections','title'));
    }

     public function extracurricular(){
$extra = [
    [
        'judul' => 'Pramuka',
        'gambar' => 'image/pramuka.png',
        'deskripsi' => 'SMK Alusi melaksanakan kegiatan rutin mingguan seperti pelatihan baris-berbaris, tali-temali, hingga kegiatan kemah, guna melatih kedisiplinan, kemandirian, dan kepemimpinan siswa di lingkungan sekolah maupun luar sekolah.',
    ],
    [
        'judul' => 'Pencak Silat',
        'gambar' => 'image/pencaksilat.png',
        'deskripsi' => 'Kegiatan pencak silat di SMK Alusi menjadi wadah bagi siswa yang ingin mengembangkan kemampuan bela diri tradisional Indonesia. Selain melatih fisik, pencak silat juga menanamkan nilai sportivitas, pengendalian diri, dan pelestarian budaya.',
    ],
    [
        'judul' => 'Rohani Islam (Rohis)',
        'gambar' => 'image/rohani.png',
        'deskripsi' => 'SMK Alusi mengadakan berbagai kegiatan keagamaan seperti kajian Islam, pelatihan da’i muda, tadarus Al-Qur’an, serta peringatan hari besar Islam. Kegiatan ini bertujuan memperkuat iman, ilmu, dan akhlak siswa.',
    ],
    [
        'judul' => 'Futsal',
        'gambar' => 'image/futsal.png',
        'deskripsi' => 'Futsal menjadi salah satu ekstrakurikuler favorit siswa SMK Alusi. Latihan rutin dilakukan di lapangan sekolah maupun saat mengikuti turnamen antarsekolah. Kegiatan ini bertujuan mengembangkan kerja sama tim, kecepatan berpikir, serta kebugaran jasmani.',
    ],
];
        return view('landing.academic.extracurricular', compact('extra'));
    }

     public function osis(){
        $title = PageSection::where('page', 'home')->pluck('title', 'section');
    $sections = PageSection::where('page', 'home')->pluck('content', 'section');
        return view('landing.academic.osis', compact('sections','title'));
    }
    public function news(){
    $news = News::latest()->paginate(10);
    return view('landing.news', compact('news'));
}
    public function fasility(){
            $fasility = [
        ['id' => 1, 'path' => 'fasility/kelas.png', 'label' => 'Kelas'],
        ['id' => 2, 'path' => 'fasility/mushola.png', 'label' => 'Mushola'],
        ['id' => 3, 'path' => 'fasility/kantin.png', 'label' => 'Kantin'],
        ['id' => 4, 'path' => 'fasility/perpustakaan.png', 'label' => 'Perpustakaan'],
    ];
        return view('landing.fasility', compact('fasility'));
    }

public function register()
{
return view('landing.register');
}

}
