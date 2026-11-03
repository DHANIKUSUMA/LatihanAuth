
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Mata Kuliah
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-xl p-6">

                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">
                            Daftar Mata Kuliah
                        </h3>
                        <p class="text-sm text-gray-500">
                            Kelola data mata kuliah.
                        </p>

                        <a href="{{ route('mata-kuliah.create') }}"> + Tambah Mata Kuliah
                        </a>
                    </div>

                    <a href="{{ route('mata-kuliah.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700
                              text-white px-4 py-2 rounded-lg">
                        + Tambah Mata Kuliah
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-100 text-gray-600">
                            <tr>
                                <th class="p-3">No</th>
                                <th class="p-3">Kode</th>
                                <th class="p-3">Nama Mata Kuliah</th>
                                <th class="p-3">SKS</th>
                                <th class="p-3">Semester</th>
                                <th class="p-3">Program Studi</th>
                                <th class="p-3">Dosen</th>
                                <th class="p-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($matakuliahs as $mk)
                                <tr class="border-b hover:bg-gray-50">

                                    <td class="p-3">
                                        {{ $matakuliahs->firstItem() + $loop->index }}
                                    </td>

                                    <td class="p-3 font-medium">
                                        {{ $mk->kode_mk }}
                                    </td>

                                    <td class="p-3">
                                        {{ $mk->nama_mk }}
                                    </td>

                                    {{-- <td class="p-3">
                                        {{!! $mk->nama_mk !!}}
                                    </td> --}}

                                    <td class="p-3">
                                        {{ $mk->sks }}
                                    </td>

                                    <td class="p-3">
                                        {{ $mk->semester }}
                                    </td>

                                    <td class="p-3">
                                        {{ $mk->programStudi?->nama_prodi ?? '-' }}
                                    </td>

                                    <td class="p-3">
                                        {{ $mk->dosen?->name ?? 'Belum ditentukan' }}
                                    </td>

                                    <td class="p-3">
                                        <div class="flex gap-2">

                                            <a href="{{ route('mata-kuliah.show', $mk) }}"
                                               class="text-blue-600 hover:underline">
                                                Detail
                                            </a>

                                            <a href="{{ route('mata-kuliah.edit', $mk) }}"
                                               class="text-yellow-600 hover:underline">
                                                Edit
                                            </a>

                                            <form action="{{ route('mata-kuliah.destroy', $mk) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="text-red-600 hover:underline">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="8"
                                        class="p-6 text-center text-gray-500">
                                        Belum ada data mata kuliah.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $matakuliahs->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
