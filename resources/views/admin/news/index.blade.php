@extends('layouts.adminLayout')

@section('title', 'Kelola Berita')

@section('content')
    <div class="px-6 py-8 relative" x-data="{ modalOpen: false, modalData: null }">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Kelola Berita</h1>

        {{-- Tombol tambah berita --}}
        <div class="mb-4">
            <a href="{{ route('news.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Tambah Berita
            </a>
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead class="bg-green-700 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">No.</th>
                        <th class="px-4 py-3 text-left">Gambar</th>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-left">Detail</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $index => $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="w-20 px-4 py-3">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt=""
                                    class="w-full h-full object-cover rounded" />
                            </td>
                            <td class="px-4 py-3">{{ $item->title }}</td>
                            <td class="px-4 py-3">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3 text-center">
                                <button
                                    @click="modalOpen = true; modalData = {
                                title: @js($item->title),
                                created_at: '{{ $item->created_at->format('d M Y') }}',
                                thumbnail: '{{ asset('storage/' . $item->thumbnail) }}',
                                content: @js($item->content)
                            }"
                                    class="text-gray-600 hover:text-blue-600" title="Lihat Detail">
                                    <i class="fa-regular fa-eye fa-lg"></i>
                                </button>
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('news.edit', $item->id) }}"
                                    class="text-white p-2 rounded rounded-circle bg-green-600 hover:outline-2 hover:bg-gray-50 hover:text-green-600">Edit</a>
                                <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white p-2 rounded rounded-circle bg-red-600 hover:outline-2 hover:bg-gray-50 hover:text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Modal Detail Berita --}}
        <div x-show="modalOpen" x-transition
            class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center" style="display: none;">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
                <button @click="modalOpen = false"
                    class="absolute top-2 right-3 text-gray-600 hover:text-green-600 text-lg"><i
                        class="fa-solid fa-circle-xmark fa-2x bg-red-600 rounded-full"></i></button>
                <template x-if="modalData">
                    <div class="space-y-4">
                        <img :src="modalData.thumbnail" class="w-full h-48 object-cover rounded" alt="" />
                        <h2 class="text-xl font-bold" x-text="modalData.title"></h2>
                        <p class="text-sm text-gray-500" x-text="modalData.created_at"></p>
                        <div class="text-gray-700" x-html="modalData.content"></div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $news->links() }}
        </div>
    </div>
@endsection
