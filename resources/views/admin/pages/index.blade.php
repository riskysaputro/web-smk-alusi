@extends('layouts.adminLayout')

@section('content')
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Manajemen Halaman</h1>
            <a href="{{ route('admin.pages.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Halaman
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200 text-left text-sm font-semibold text-gray-700">
                    <tr>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Slug</th>
                        <th class="px-4 py-3">Dibuat</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-800 divide-y divide-gray-100">
                    @forelse ($pages as $page)
                        <tr>
                            <td class="px-4 py-2">{{ $page->title }}</td>
                            <td class="px-4 py-2 text-blue-600">{{ $page->slug }}</td>
                            <td class="px-4 py-2">{{ $page->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('admin.pages.edit', $page) }}"
                                    class="text-indigo-600 hover:underline text-sm">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-6 text-gray-500">Belum ada halaman dibuat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
