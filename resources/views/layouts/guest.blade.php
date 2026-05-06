<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TK An - Nahl') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Outfit', sans-serif !important; background: linear-gradient(135deg, #004B23 0%, #00703C 100%) !important; }
            .login-card { 
                background: rgba(255, 255, 255, 0.96) !important; 
                backdrop-filter: blur(20px); 
                border-radius: 30px !important; 
                box-shadow: 0 25px 50px rgba(0,0,0,0.4) !important;
                border: 1px solid rgba(255,255,255,0.7);
            }
            .logo-text { font-size: 2rem; font-weight: 700; color: #004B23; text-align: center; margin-bottom: 0.5rem; display: flex; align-items: center; justify-content: center; gap: 10px; }
            .logo-text span { color: #FFC300; }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md px-10 py-12 login-card">
                <div class="logo-text">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px;">
                    An - <span>Nahl</span>
                </div>
                <h2 class="text-center text-2xl font-bold text-gray-800 mt-2">{{ $header_text ?? 'Portal Guru' }}</h2>
                <p class="text-center text-gray-500 mb-8 font-medium">{{ $sub_text ?? 'Silakan masuk untuk mengelola data siswa' }}</p>
                {{ $slot }}
            </div>
            <a href="{{ url('/') }}" class="mt-6 text-white font-semibold hover:underline">← Kembali ke Beranda</a>
        </div>
    </body>
</html>
