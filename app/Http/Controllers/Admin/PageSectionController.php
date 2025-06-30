<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class PageSectionController extends Controller
{
    public function index()
    {
        $sections = PageSection::where('page', 'home')->get();
        $title = PageSection::where('page', 'home')->where('title');
        return view('admin.page-sections.index', compact('sections','title'));
    }

    public function edit($section)
    {
        $section = PageSection::where('section', $section)->firstOrFail();
        return view('admin.page-sections.edit', compact('section'));
    }

    public function update(Request $request, $section)
    {
        $request->validate([
            'title' => 'nullable|string',
            'content' => 'nullable|string'
        ]);

        $section = PageSection::where('section', $section)->firstOrFail();
        $section->update($request->only('title', 'content'));

        return redirect()->route('admin.sections.index')->with('success', 'Konten diperbarui.');
    }
}
