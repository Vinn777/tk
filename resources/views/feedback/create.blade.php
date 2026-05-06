<x-guest-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-green-100">
                <div class="p-8 sm:p-12">
                    <div class="text-center mb-10">
                        <h2 class="text-3xl font-extrabold text-green-800 tracking-tight">Saran dan Kritik</h2>
                        <p class="mt-2 text-lg text-gray-600">Bantu kami meningkatkan kualitas layanan pendidikan di TK An-Nahl.</p>
                    </div>

                    @if (session('success'))
                        <div class="mb-8 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-lg animate-pulse">
                            <div class="flex items-center">
                                <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ auth()->user()->name ?? old('name') }}" 
                                    class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring-green-500 transition-all duration-200" required>
                                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                                <input type="email" name="email" id="email" value="{{ auth()->user()->email ?? old('email') }}" 
                                    class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring-green-500 transition-all duration-200" required>
                                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Pesan</label>
                            <div class="flex items-center space-x-6 mt-2">
                                <label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="type" value="Saran" class="form-radio text-green-600 focus:ring-green-500 h-5 w-5 transition duration-150 ease-in-out" {{ old('type', 'Saran') == 'Saran' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 group-hover:text-green-700 transition-colors">Saran</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer group">
                                    <input type="radio" name="type" value="Kritik" class="form-radio text-green-600 focus:ring-green-500 h-5 w-5 transition duration-150 ease-in-out" {{ old('type') == 'Kritik' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 group-hover:text-green-700 transition-colors">Kritik</span>
                                </label>
                            </div>
                            @error('type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-1">Pesan / Masukan</label>
                            <textarea name="message" id="message" rows="5" 
                                class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring-green-500 transition-all duration-200" 
                                placeholder="Tuliskan saran atau kritik Anda di sini..." required>{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>

                    <div class="mt-10 pt-8 border-t border-gray-100 flex justify-between items-center text-sm text-gray-500">
                        <a href="{{ route('home') }}" class="flex items-center hover:text-green-600 transition-colors">
                            <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Beranda
                        </a>
                        <span class="bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full font-medium">TK An-Nahl</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
