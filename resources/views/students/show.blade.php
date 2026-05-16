<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Siswa: ') }} {{ $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Info Siswa -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-1">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-4 border-b pb-2">Informasi Siswa</h3>
                        <div class="space-y-3">
                            <p><span class="font-semibold">Nama:</span><br>{{ $student->name }}</p>
                            <p><span class="font-semibold">Gender:</span><br>{{ $student->gender }}</p>
                            <p><span class="font-semibold">Tgl Lahir:</span><br>{{ $student->birth_date }}</p>
                            <p><span class="font-semibold">Orang Tua:</span><br>{{ $student->parent_name }}</p>
                            <p><span class="font-semibold">Telepon:</span><br>{{ $student->phone }}</p>
                            <p><span class="font-semibold">Alamat:</span><br>{{ $student->address }}</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn-secondary w-full text-center mb-3">Edit Data Siswa</a>
                            <a href="{{ route('students.index') }}" class="block text-center text-gray-500 font-semibold hover:underline">← Kembali</a>
                        </div>
                    </div>
                </div>

                <!-- Kegiatan -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-2">
                    <div class="p-8 text-gray-900">
                        <h3 class="text-xl font-bold mb-6 text-gray-700">Jurnal Kegiatan Harian</h3>

                        @if(session('success'))
                            <div class="bg-green-50 border-l-4 border-[#004B23] text-[#004B23] px-6 py-4 rounded-2xl relative mb-8 shadow-sm" role="alert">
                                <span class="block sm:inline font-bold"><i class="fas fa-check-circle mr-2"></i> {{ session('success') }}</span>
                            </div>
                        @endif
                        
                        <!-- Form Tambah Kegiatan -->
                        <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data" class="mb-10 bg-gray-50 p-6 rounded-2xl border border-gray-100 shadow-inner">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-bold text-gray-600 mb-2">Nama Kegiatan</label>
                                    <input type="text" name="activity_name" class="w-full border-gray-200 rounded-xl shadow-sm focus:border-[#004B23] focus:ring-[#004B23]" placeholder="Contoh: Mewarnai, Membaca..." required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-600 mb-2">Tanggal Kegiatan</label>
                                    <input type="date" name="activity_date" class="w-full border-gray-200 rounded-xl shadow-sm focus:border-[#004B23] focus:ring-[#004B23]" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-600 mb-2">Keterangan / Catatan Guru</label>
                                    <textarea name="description" rows="3" class="w-full border-gray-200 rounded-xl shadow-sm focus:border-[#004B23] focus:ring-[#004B23]" placeholder="Berikan catatan mengenai perkembangan siswa hari ini..."></textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-600 mb-2">Foto Dokumentasi (Opsional)</label>
                                    <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#E6F2EB] file:text-[#004B23] hover:file:bg-[#D4E9DD]">
                                </div>
                            </div>
                            <button type="submit" class="btn-primary flex items-center justify-center gap-2 w-full md:w-auto" style="background: #004B23 !important; color: white !important; padding: 14px 32px; border-radius: 50px; font-weight: 800; box-shadow: 0 10px 20px rgba(0, 75, 35, 0.2); border: none; cursor: pointer;">
                                <i class="fas fa-paper-plane"></i> Simpan Jurnal Kegiatan
                            </button>
                        </form>

                        <!-- List Kegiatan -->
                        <div class="space-y-6">
                            @forelse($student->activities->sortByDesc('activity_date') as $activity)
                                <div class="relative pl-8 border-l-2 border-dashed border-gray-200 py-2">
                                    <div class="absolute w-4 h-4 bg-[#FFC300] rounded-full -left-[9px] top-4 border-4 border-white shadow-sm"></div>
                                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex justify-between items-start hover:shadow-md transition">
                                        <div>
                                            <h4 class="font-bold text-gray-800 text-lg">{{ $activity->activity_name }}</h4>
                                            <p class="text-sm font-semibold text-[#004B23]">{{ $activity->activity_date }}</p>
                                            <p class="mt-3 text-gray-600 leading-relaxed">{{ $activity->description }}</p>
                                            @if($activity->image)
                                                <div class="mt-4">
                                                    <img src="{{ asset('storage/' . $activity->image) }}" alt="Foto Kegiatan" class="rounded-xl max-w-full h-auto shadow-sm border border-gray-100">
                                                </div>
                                            @endif
                                        </div>
                                        <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" onsubmit="return confirm('Hapus catatan kegiatan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-300 hover:text-red-500 transition" title="Hapus Catatan">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-10 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                    <p class="text-gray-400 italic">Belum ada catatan kegiatan harian.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
