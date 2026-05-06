<x-guest-layout>
    <x-slot name="header_text">Registrasi Orang Tua</x-slot>
    <x-slot name="sub_text">Daftarkan akun untuk memantau perkembangan Ananda</x-slot>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <!-- Hidden Role for Parent -->
        <input type="hidden" name="role" value="parent">

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap Wali Murid')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Student ID (Always Visible for Parents) -->
        <div class="mt-4">
            <x-input-label for="student_id" :value="__('Pilih Nama Ananda')" />
            <select id="student_id" name="student_id" class="block mt-1 w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>
                <option value="">-- Pilih Nama Siswa --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ (old('student_id') ?? request('student_id')) == $student->id ? 'selected' : '' }}>{{ $student->name }} ({{ $student->grade }})</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            <p class="text-xs text-gray-500 mt-1 italic">*Jika nama Ananda belum terdaftar, mohon hubungi pihak sekolah.</p>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4 mt-8">
            <x-primary-button class="w-full justify-center py-4 text-xl" style="background: #004B23 !important;">
                {{ __('Submit & Buat Akun Portal Orang Tua') }}
            </x-primary-button>

            <div class="text-center">
                <a class="underline text-sm text-gray-600 hover:text-green-700" href="{{ route('login.parent') }}">
                    {{ __('Sudah punya akun? Masuk di sini') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
