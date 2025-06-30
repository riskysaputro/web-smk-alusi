@extends('layouts.adminLayout')

@section('content')
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-6">Edit Berita</h2>

        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Judul Berita</label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}"
                    class="w-full my-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">Judul wajib di isi</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Konten Berita</label>
                <textarea name="content" rows="6"
                    class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Thumbnail (Opsional)</label>
                <input type="file" name="thumbnail"
                    class="mt-1 block w-full text-sm text-gray-600 file:border file:border-gray-300 file:rounded-lg file:px-4 file:py-2 file:bg-gray-100 hover:file:bg-gray-200">
                @error('thumbnail')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                @if ($news->thumbnail)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Thumbnail saat ini:</p>
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="Thumbnail"
                            class="w-32 rounded-lg border mt-2">
                    </div>
                @endif
            </div>

            <div class="text-right space-x-4">
                <a href="{{ route('news.index') }}""
                    class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg shadow">
                    Close
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                    Update Berita
                </button>
            </div>
        </form>
    </div>
@endsection
