<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portal Orang Tua: ') }} {{ $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Info Siswa -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-1">
                    <div class="p-8 text-gray-900">
                        <div class="text-center mb-6">
                            <div class="w-24 h-24 rounded-full mx-auto flex items-center justify-center mb-4" style="background: #E8F5E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" style="color: #2E7D32;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $student->name }}</h3>
                            <p class="text-gray-500">Siswa TK An - Nahl</p>
                        </div>
                        
                        <div class="space-y-4 border-t pt-6">
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Jenis Kelamin</label>
                                <p class="font-semibold text-gray-700">{{ $student->gender }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Tanggal Lahir</label>
                                <p class="font-semibold text-gray-700">{{ $student->birth_date }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Alamat</label>
                                <p class="font-semibold text-gray-700">{{ $student->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Kegiatan -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-2">
                    <div class="p-8 text-gray-900">
                        <h3 class="text-xl font-bold mb-8 text-gray-700 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: #FFC300;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                            Jurnal Kegiatan Anak
                        </h3>
                        
                        <div class="space-y-8">
                            @forelse($student->activities->sortByDesc('activity_date') as $activity)
                                <div class="relative pl-10 border-l-2 border-dashed border-gray-100 py-2">
                                    <div class="absolute w-5 h-5 bg-[#FFC300] rounded-full -left-[11px] top-4 border-4 border-white shadow-md"></div>
                                    <div class="bg-white p-6 rounded-3xl border border-gray-50 shadow-sm hover:shadow-md transition duration-300">
                                        <div class="flex justify-between items-center mb-3">
                                            <h4 class="font-bold text-gray-800 text-lg">{{ $activity->activity_name }}</h4>
                                            <span class="text-xs font-bold bg-green-50 text-[#004B23] px-3 py-1 rounded-full">{{ $activity->activity_date }}</span>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed italic mb-4">"{{ $activity->description }}"</p>
                                        @if($activity->image)
                                            <div class="mt-4">
                                                <img src="{{ asset('storage/' . $activity->image) }}" alt="Foto Kegiatan" class="rounded-2xl max-w-full h-auto shadow-sm border border-gray-100">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-20 bg-gray-50 rounded-3xl border border-dashed border-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-200 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 00-2 2H6a2 2 0 00-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                    <p class="text-gray-400">Belum ada catatan kegiatan hari ini.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
