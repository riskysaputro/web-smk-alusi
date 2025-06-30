@extends('layouts.adminLayout')

@section('content')
    <div class="p-6 bg-white shadow rounded-lg">
        <h6 class="text-2xl font-bold mb-6">Setting Tampilan Website</h6>

        <form method="POST" action="{{ route('admin.settings.update') }}"
            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
                <input type="text" name="site_name" value="{{ \App\Models\Setting::getValue('site_name') }}"
                    class="w-full py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Sekolah</label>
                <input type="text" name="site_name" value="{{ \App\Models\Setting::getValue('site_address') }}"
                    class="w-full py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email Sekolah</label>
                <input type="text" name="email_name" value="{{ \App\Models\Setting::getValue('email_name') }}"
                    class="w-full py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon Sekolah</label>
                <input type="text" name="phone_number" value="{{ \App\Models\Setting::getValue('phone_number') }}"
                    class="w-full py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Instagram Sekolah</label>
                <input type="text" name="instagram_name" value="{{ \App\Models\Setting::getValue('instagram_name') }}"
                    class="w-full py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Link Instagram Sekolah</label>
                <input type="text" name="instagram_url" placeholder="https://www.instagram.com/smkalusi_/"
                    value="{{ \App\Models\Setting::getValue('instagram-url') }}"
                    class="w-full py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Footer</label>
                <input type="text" name="footer_text" value="{{ \App\Models\Setting::getValue('footer_text') }}"
                    class="w-full py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Warna Utama Website</label>
                <input type="color" name="color_primary" value="{{ \App\Models\Setting::getValue('color_primary') }}"
                    class="w-full h-10 border rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Warna Sekunder Website</label>
                <input type="color" name="color_secondary" value="{{ \App\Models\Setting::getValue('color_secondary') }}"
                    class="w-full h-10 border rounded-lg">
            </div>

            {{-- <div class="md:col-span-2 lg:col-span-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Footer</label>
                <textarea name="footer_text" rows="3" placeholder="©2025 SMK ALUSI. All Rights Reserved."
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $settings['footer_text'] ?? '' }}</textarea>
            </div> --}}

            <div class="md:col-span-2 lg:col-span-3 text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
