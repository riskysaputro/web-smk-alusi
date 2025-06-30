<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Mail\StudentStatusMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use PDF;

class StudentController extends Controller
{
// ========== Pendaftaran ==========
public function create()
{
return view('register');
}

public function store(Request $request)
{
//      Log::info('Form masuk ke controller:', $request->all());
// dd($request->all());
$request->validate([
'name' => 'required|string|max:100',
'email' => 'required|email|unique:students',
'nisn' => 'required|unique:students',
'nik' => 'required|unique:students',
'phone' => 'required',
'address' => 'required',
'school' => 'required',
'schooladdress' => 'required',
'gender' => 'required|in:Laki-Laki,Perempuan',
'birth_date' => 'required|date',
'major' => 'required',
]);

try {
    Student::create([
        'name' => $request->name,
        'nisn' => $request->nisn,
        'nik' => $request->nik,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'school' => $request->school,
        'schooladdress' => $request->schooladdress,
        'gender' => $request->gender,
        'birth_date' => $request->birth_date,
        'major' => $request->major,
        'status' => 'pending',
    ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil! Cek email secara berkala.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi nanti,atau periksa kembali data kamu.');
    }
}


// return redirect()->back()->with('success', 'Pendaftaran berhasil! Tunggu konfirmasi dari admin,cek Email secara berkala');
// }

// ========== Admin: Lihat & Update Data ==========
    // public function index()
    // {
    // $students = Student::latest()->get();
    // // dd($students);
    // return view('students.index', compact('students'));
    // }

    public function index(Request $request)
{
    $query = Student::query();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
            // ->orWhere('nik', 'like', '%' . $request->search . '%')
            // ->orWhere('nisn', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $students = $query->latest()->get();

    return view('students.index', compact('students'));
}


    public function edit($id){
    //get post by ID
            $students = Student::findOrFail($id);

            //render view with post
            return view('student.edit', compact('student'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function updateStatus(Request $request, $id)
    {
    $request->validate([
    'status' => 'required|in:accepted,rejected',
    ]);

    $student = Student::findOrFail($id);
    $student->status = $request->status;
    $student->save();

    // Kirim email notifikasi
    Mail::to($student->email)->send(new StudentStatusMail($student));

    return redirect()->back()->with('success', 'Status diperbarui & email terkirim.');
    }

// ========== Ekspor ==========
// public function exportExcel()
// {
// return Excel::download(new StudentsExport, 'data_siswa.xlsx');
// }

// public function exportPdf()
// {
// $students = Student::all();
// $pdf = PDF::loadView('admin.students.pdf', compact('students'));
// return $pdf->download('data_siswa.pdf');
// }
}
