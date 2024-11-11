<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased">

    {{-- Displays only on mobile --}}
    <x-nav sticky class="lg:hidden bg-white text-dark">
        <x-slot:brand>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
            Reserva de sala
        </x-slot:brand>
    </x-nav>

    <x-main with-nav full-width>
        <x-slot:sidebar drawer="main-drawer" collapsible class=" bg-white text-dark shadow-xl mr-3">

            {{-- Hidden when collapsed --}}
            <div class="hidden-when-collapsed mx-4 mt-3 font-black text-3xl text-[#003CA2]">Reserva de Sala</div>

            {{-- Display when collapsed --}}
            <div class="display-when-collapsed mx-4 mt-3 font-black text-3xl text-[#003CA2]">VS</div>

            <x-menu activate-by-route>
                <x-menu-item title="Reservar Sala" icon="o-archive-box" link="{{ route('reserva.sala') }}" />

                <x-menu-item title="Lista" icon="o-list-bullet" link="{{ route('sala.index') }}" />
                
                <x-menu-sub title="Cadastros" icon="o-plus">
                    <x-menu-item title="Cadastrar Sala" icon="o-square-3-stack-3d"
                        link="{{ route('sala.cadastro') }}" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            <x-toast />
            {{ $slot }}
        </x-slot:content>
    </x-main>

    @livewireScripts
    @livewireScriptConfig
</body>


</html>
