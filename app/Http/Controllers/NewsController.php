<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class NewsController extends Controller
{
public function index()
{
    $news = News::latest()->paginate(10);
    return view('admin.news.index', compact('news'));
}

public function create()
{
    return view('form-news');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        // 'slug' => 'nullable',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);
        // Generate slug dari title
    $slug = Str::slug($validated['title']);
    $slugOriginal = $slug;
    $counter = 1;

    // Buat slug unik
    while (News::where('slug', $slug)->exists()) {
        $slug = "{$slugOriginal}-{$counter}";
        $counter++;
    }

    // Masukkan slug ke array validated agar ikut disimpan
    $validated['slug'] = $slug;

    if ($request->hasFile('thumbnail')) {
        $validated['thumbnail'] = $request->file('thumbnail')->store('berita', 'public');
    }

    News::create($validated);

    return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
}

public function edit(News $news)
{
    return view('admin.news.edit-form', compact('news'));
}

public function update(Request $request, News $news)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    // Generate slug dari title (hanya kalau title diubah)
    if ($request->title !== $news->title) {
        $slug = Str::slug($validated['title']);
        $slugOriginal = $slug;
        $counter = 1;

        // Pastikan slug unik, tidak menghitung dirinya sendiri
        while (News::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
            $slug = "{$slugOriginal}-{$counter}";
            $counter++;
        }

        $validated['slug'] = $slug;
    }

    // Handle upload thumbnail jika ada
    if ($request->hasFile('thumbnail')) {
        // Opsional: hapus thumbnail lama
        if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $validated['thumbnail'] = $request->file('thumbnail')->store('berita', 'public');
    }

    $news->update($validated);

    return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui!');
}

public function destroy(News $news)
{
    $news->delete();
    return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
}
}