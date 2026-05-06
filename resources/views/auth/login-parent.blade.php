<x-guest-layout>
    <x-slot name="header_text">Portal Orang Tua</x-slot>
    <x-slot name="sub_text">Silakan masuk untuk melihat perkembangan Ananda</x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username Orang Tua')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 w-full justify-center py-3 text-lg" style="background: #2E7D32 !important;">
                {{ __('Masuk ke Portal') }}
            </x-primary-button>
        </div>
        
        <div class="mt-6 text-center space-y-2">
            <a href="{{ route('login') }}" class="block text-sm text-gray-500 hover:text-green-700">Login sebagai Guru? Klik di sini</a>
            <a href="{{ route('register.parent') }}" class="block text-sm font-bold text-green-700 hover:underline">Belum punya akun? Buat Akun Baru</a>
        </div>
    </form>
</x-guest-layout>
