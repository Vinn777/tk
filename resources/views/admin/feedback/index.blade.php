<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Saran dan Kritik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">
                        <h3 class="text-2xl font-extrabold text-[#00301A]">Daftar Pesan Masuk</h3>
                        <p class="text-gray-500">Kumpulan saran dan kritik dari orang tua dan pengunjung.</p>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-50 border-l-4 border-[#004B23] text-[#004B23] px-6 py-4 rounded-2xl relative mb-8 shadow-sm" role="alert">
                            <span class="block sm:inline font-bold">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-left border-b-2 border-gray-100">
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Status</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Pengirim</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Jenis</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs w-1/3">Pesan</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Waktu</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($feedbacks as $feedback)
                                    <tr class="hover:bg-gray-50 transition {{ $feedback->is_read ? 'opacity-75' : 'bg-green-50/30 font-semibold' }}">
                                        <td class="py-5">
                                            @if($feedback->is_read)
                                                <span class="px-3 py-1 bg-gray-100 text-gray-500 rounded-full text-xs font-bold">Dibaca</span>
                                            @else
                                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold animate-pulse">Baru</span>
                                            @endif
                                        </td>
                                        <td class="py-5">
                                            <div class="text-sm font-bold text-gray-800">{{ $feedback->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $feedback->email }}</div>
                                            @if($feedback->user_id)
                                                <span class="inline-block mt-1 px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-[10px] uppercase font-bold">Parent</span>
                                            @endif
                                        </td>
                                        <td class="py-5">
                                            <span class="px-3 py-1 {{ $feedback->type == 'Saran' ? 'bg-blue-100 text-blue-700' : 'bg-red-100 text-red-700' }} rounded-full text-xs font-bold">
                                                {{ $feedback->type }}
                                            </span>
                                        </td>
                                        <td class="py-5">
                                            <div class="text-sm text-gray-700 whitespace-normal break-words">{{ $feedback->message }}</div>
                                        </td>
                                        <td class="py-5 text-xs text-gray-500">
                                            {{ $feedback->created_at->diffForHumans() }}
                                            <div class="text-[10px]">{{ $feedback->created_at->format('d M Y, H:i') }}</div>
                                        </td>
                                        <td class="py-5 text-right">
                                            <div class="flex justify-end gap-2">
                                                @if(!$feedback->is_read)
                                                    <form action="{{ route('admin.feedback.read', $feedback) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition" title="Tandai sudah dibaca">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.feedback.destroy', $feedback) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-10 text-center text-gray-500">Belum ada saran atau kritik yang masuk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-6">
                        {{ $feedbacks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
