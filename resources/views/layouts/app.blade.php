<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    {{ $imports ?? null }}
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <div class="container mx-auto">
            <!-- Page Heading -->
            <header class="">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Alerts -->
            @if ($errors->any())
                <x-alert :kind="'error'" :message="$errors->first()" />
            @elseif (session('message'))
                <x-alert :kind="'success'" :message="session('message')" />
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            {{ $fab ?? null }}
        </div>
    </div>
    {{ $scripts ?? null }}
    <script>
        document.getElementById('alertBtn').addEventListener("click", (e) => {
            e.preventDefault();
            document.getElementById('alertBox').classList.toggle("hidden");
        })

    </script>
</body>

</html>
