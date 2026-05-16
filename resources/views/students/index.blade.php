<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-2xl font-extrabold text-[#00301A]">Daftar Anak Didik An - Nahl</h3>
                        <a href="{{ route('students.create') }}" class="btn-primary" style="background: #004B23; color: white; padding: 12px 24px; border-radius: 50px; font-weight: 700; box-shadow: 0 10px 20px rgba(0, 75, 35, 0.15);">
                            + Tambah Siswa Baru
                        </a>
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
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Nama Lengkap</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Kelas</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Gender</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Tgl Lahir</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Orang Tua</th>
                                    <th class="pb-4 font-extrabold text-[#004B23] uppercase tracking-wider text-xs">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach($students->sortBy('grade') as $student)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="py-5 font-bold text-gray-800">{{ $student->name }}</td>
                                        <td class="py-5">
                                            <span class="px-3 py-1 bg-[#E6F2EB] text-[#004B23] rounded-full text-xs font-bold">{{ $student->grade }}</span>
                                        </td>
                                        <td class="py-5 text-gray-600">{{ $student->gender }}</td>
                                        <td class="py-5 text-gray-600">{{ $student->birth_date }}</td>
                                        <td class="py-5 text-gray-600">{{ $student->parent_name }}</td>
                                        <td class="py-5 flex gap-3">
                                            <a href="{{ route('students.show', $student->id) }}" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
