<?php

namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Admin view to manage pages
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages',
            'content' => 'required',
        ]);

        Page::create($request->only(['title', 'slug', 'content']));
        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dibuat.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,' . $page->id,
            'content' => 'required',
        ]);

        $page->update($request->only(['title', 'slug', 'content']));
        return back()->with('success', 'Halaman diperbarui.');
    }

    // Public view
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('admin.pages.show', compact('page'));
    }
}
