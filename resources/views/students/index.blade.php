@extends('layouts.adminLayout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Data Siswa Pendaftar</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form method="GET" action="" class="mb-4">
        <div class="flex flex-wrap items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..."
                class="border border-gray-300 rounded p-2 w-full sm:w-auto">

            <select name="status" class="border border-gray-300 rounded p-2 w-full sm:w-auto">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Diterima</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
        </div>
    </form>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-left text-sm font-semibold text-gray-700">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">No HP</th>
                    <th class="px-4 py-3">Alamat</th>
                    <th class="px-4 py-3">Gender</th>
                    <th class="px-4 py-3">Tgl Lahir</th>
                    <th class="px-4 py-3">Jurusan</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800 divide-y divide-gray-100">
                @forelse ($students as $student)
                    <tr>
                        <td class="px-4 py-2">{{ $student->name }}</td>
                        <td class="px-4 py-2">{{ $student->email }}</td>
                        <td class="px-4 py-2">{{ $student->phone }}</td>
                        <td class="px-4 py-2">{{ $student->address }}</td>
                        <td class="px-4 py-2 capitalize">{{ $student->gender }}</td>
                        <td class="px-4 py-2">{{ $student->birth_date }}</td>
                        <td class="px-4 py-2">{{ $student->major }}</td>
                        <td class="px-4 py-2">
                            <span
                                class="px-2 py-1 rounded-full text-white text-xs
                                @if ($student->status == 'accepted') bg-green-600
                                @elseif($student->status == 'rejected') bg-red-600
                                @else bg-gray-500 @endif">
                                {{ ucfirst($student->status) }}
                            </span>
                        </td>
                        {{-- <td class="px-4 py-2 text-center">
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-custom">Edit</a>
                            <form method="POST" action="#" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline text-sm" disabled>Hapus</button>
                            </form>
                            {{-- Aksi --}}

                        {{-- </td> --}}
                        <td class="px-4 py-2 text-center space-x-1">
                            <a href="{{ route('students.show', $student->id) }}"
                                class="text-blue-600 hover:underline text-sm">Detail</a>

                            <form method="POST" action="{{ route('students.updateStatus', $student->id) }}"
                                class="inline">
                                @csrf
                                <input type="hidden" name="status" value="accepted">
                                <button class="text-green-600 hover:underline text-sm">Terima</button>
                            </form>

                            <form method="POST" action="{{ route('students.updateStatus', $student->id) }}"
                                class="inline">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button class="text-red-600 hover:underline text-sm">Tolak</button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center px-4 py-6 text-gray-500">Belum ada pendaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
