<footer style="background-color: {{ getSetting('color_secondary') }}" class="mx-5 md:mx-10 lg:mx-40">
    <div class="flex space-x-4 pt-10">
        <img src="{{ asset(getSetting('/images/site_logo', 'icons/logo.png')) }}" alt="Logo Sekolah" width="80">
        <span class="text-2xl md:text-6xl lg:text-6xl font-bold mt-5" style="color: {{ getSetting('color_primary') }}">
            {{ getSetting('site_name') }}</span>
    </div>


    {{-- Grid Column --}}
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6 my-10">
        {{-- Kolom Deskripsi & Kontak --}}
        <div class="space-y-2">
            <p>{!! nl2br(getSetting('site_description', 'description default')) !!}</p>
            <p>{{ getSetting('site_address', '') }}</p>

            <div>
                <div class="font-semibold">Follow Us:</div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('icons/whatsapp.svg') }}" class="w-6 h-6">
                        <span
                            class="text-sm md:text-lg lg:text-lg">{{ getSetting('whatsapp_number', '+62 815-8490-3569') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('icons/instagram.svg') }}" class="w-6 h-6">
                        <a href="{{ getSetting('instagram_url') }}" target="_blank"
                            class="hover:underline text-sm md:text-lg lg:text-lg">
                            {{ getSetting('instagram_name', 'smkalusi_') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Map --}}
        <div>
            {!! getSetting('map_embed') !!}
        </div>
    </div>


    <div class="text-center pb-8">
        <hr>
        <small class="text-md">{!! getSetting('footer_text') !!}</small>
    </div>
</footer>
