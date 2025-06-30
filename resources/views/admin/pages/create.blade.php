@extends('layouts.adminLayout')
@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Buat Halaman Baru</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.pages.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                    class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Konten</label>
                <textarea name="content" rows="10" class="w-full border border-gray-300 p-2 rounded" required>{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>

    {{-- Tambahkan CKEditor untuk konten --}}
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
