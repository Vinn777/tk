<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Siswa: ') }} {{ $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ $student->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="grade">Kelas</label>
                                <select name="grade" id="grade" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="KB" {{ $student->grade == 'KB' ? 'selected' : '' }}>Kelompok Bermain (KB)</option>
                                    <option value="TK A" {{ $student->grade == 'TK A' ? 'selected' : '' }}>TK A</option>
                                    <option value="TK B" {{ $student->grade == 'TK B' ? 'selected' : '' }}>TK B</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="Laki-laki" {{ $student->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $student->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="birth_date">Tanggal Lahir</label>
                                <input type="date" name="birth_date" id="birth_date" value="{{ $student->birth_date }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="parent_name">Nama Orang Tua</label>
                                <input type="text" name="parent_name" id="parent_name" value="{{ $student->parent_name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">No. Telepon</label>
                                <input type="text" name="phone" id="phone" value="{{ $student->phone }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="mb-4 md:col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Alamat</label>
                                <textarea name="address" id="address" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $student->address }}</textarea>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100">
                            <a href="{{ route('students.index') }}" class="text-gray-500 hover:text-gray-700 font-bold mr-6 transition">Batal</a>
                            <button type="submit" class="bg-[#004B23] hover:bg-[#00301A] text-white font-extrabold py-3 px-10 rounded-full focus:outline-none focus:shadow-outline transition shadow-lg flex items-center gap-2">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
