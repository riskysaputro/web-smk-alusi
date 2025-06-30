@extends('layouts.adminLayout')
@section('content')
    <h2 class="text-xl font-bold mb-4">Kelola Konten Halaman Home</h2>
    <ul class="space-y-2">
        @foreach ($sections as $sec)
            <li>
                <a href="{{ route('admin.sections.edit', $sec->section) }}" class="text-blue-600 hover:underline">
                    Edit Section: {{ $sec->title ?? $sec->section }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
