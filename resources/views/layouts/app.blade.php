<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TK An - Nahl - Dashboard') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Outfit', sans-serif !important; background-color: #F9FCF9 !important; }
            .bg-white { background-color: #ffffff !important; }
            header.bg-white { border-bottom: 3px solid #004B23 !important; box-shadow: 0 4px 15px rgba(0, 75, 35, 0.08) !important; }
            nav.bg-white { border-bottom: 1px solid #eef2ee !important; }
            .shadow-sm { box-shadow: 0 10px 30px rgba(0,0,0,0.03) !important; border-radius: 24px !important; overflow: hidden; }
            .btn-primary { background: #004B23 !important; color: white !important; padding: 12px 24px; border-radius: 14px; font-weight: 600; transition: 0.3s; display: inline-block; border: none; }
            .btn-primary:hover { background: #00381a !important; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0, 75, 35, 0.3); }
            .btn-secondary { background: #FFC300 !important; color: #00301A !important; padding: 12px 24px; border-radius: 14px; font-weight: 600; transition: 0.3s; display: inline-block; border: none; }
            .btn-secondary:hover { background: #eab100 !important; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(255, 195, 0, 0.3); }
            table { border-collapse: separate !important; border-spacing: 0 10px !important; width: 100%; }
            tr { background: #fff !important; border-radius: 16px !important; transition: 0.3s; border: 1px solid #f0f5f0; }
            tr:hover { transform: scale(1.005); box-shadow: 0 5px 15px rgba(0,0,0,0.02); }
            th { text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1.5px; color: #78909C; padding: 18px !important; font-weight: 700; }
            td { padding: 18px !important; }
            td:first-child { border-top-left-radius: 16px; border-bottom-left-radius: 16px; }
            td:last-child { border-top-right-radius: 16px; border-bottom-right-radius: 16px; }
            .text-coral-500 { color: #004B23 !important; }
            .bg-coral-100 { background: #E8F5E9 !important; }
            .text-secondary { color: #FFC300 !important; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-bold text-2xl leading-tight text-[#004B23]">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
