@extends('layouts.adminlayout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Detail Siswa</h2>

    <div class="bg-white rounded shadow p-6 space-y-4">
        <p><strong>Nama:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>No HP:</strong> {{ $student->phone }}</p>
        <p><strong>Alamat:</strong> {{ $student->address }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ ucfirst($student->gender) }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $student->birth_date }}</p>
        <p><strong>Jurusan:</strong> {{ $student->major }}</p>
        <p><strong>Status:</strong>
            <span
                class="inline-block px-2 py-1 text-white text-sm rounded
                @if ($student->status == 'accepted') bg-green-600
                @elseif($student->status == 'rejected') bg-red-600
                @else bg-gray-500 @endif">
                {{ ucfirst($student->status) }}
            </span>
        </p>

        <div class="flex gap-4 mt-6">
            <form method="POST" action="{{ route('students.updateStatus', $student->id) }}">
                @csrf
                <input type="hidden" name="status" value="accepted">
                <button class="bg-green-600 text-white px-4 py-2 rounded">Terima</button>
            </form>
            <form method="POST" action="{{ route('students.updateStatus', $student->id) }}">
                @csrf
                <input type="hidden" name="status" value="rejected">
                <button class="bg-red-600 text-white px-4 py-2 rounded">Tolak</button>
            </form>
            <a href="{{ route('students.index') }}" class="ml-auto text-blue-600 hover:underline">← Kembali</a>
        </div>
    </div>
@endsection
