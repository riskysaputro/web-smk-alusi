@extends('layouts.adminLayout')
@section('content')
    <h2 class="text-xl font-bold mb-4">Edit Section: {{ $section->section }}</h2>

    <form method="POST" action="{{ route('admin.sections.update', $section->section) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title', $section->title) }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Konten</label>
            <textarea name="content" id="content" rows="10" class="w-full border p-2 rounded">{{ old('content', $section->content) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>CKEDITOR.replace('content');</script>
@endsection
