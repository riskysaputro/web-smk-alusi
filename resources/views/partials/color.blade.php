<style>
    :root {
        --color-primary: {{ \App\Models\Setting::getValue('color_primary', '#31552d') }};
        --color-secondary: {{ \App\Models\Setting::getValue('color_secondary', '#6c757d') }};
    }

    body {
        background-color: var(--color-secondary);
        font-family: 'Poppins', sans-serif;
    }

    .btn-custom {
        background-color: var(--color-primary);
        color: white;
    }
</style>
