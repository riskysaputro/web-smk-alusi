@extends('layouts.app')

@section('content')
    @include('partials.navbar')

    <section class="py-16 px-6 bg-gray-100">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-center mb-8">{{ $page->title }}</h1>

            <div class="prose max-w-none">
                {!! $page->content !!}
            </div>
        </div>
    </section>
@endsection
