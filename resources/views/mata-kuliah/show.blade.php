<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Detail Mata Kuliah
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-xl p-6">

                <h3 class="text-lg font-bold mb-6">
                    Informasi Mata Kuliah
                </h3>

                <div class="space-y-4">

                    <div>
                        <p class="text-sm text-gray-500">Kode MK</p>
                        <p class="font-semibold">
                            {{ 
                                $mataKuliah->kode_mk }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Nama Mata Kuliah</p>
                        <p class="font-semibold">
                            {{ 
                                $mataKuliah->nama_mk }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">SKS</p>
                        <p class="font-semibold">
                            {{ 
                                $mataKuliah->sks }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Semester</p>
                        <p class="font-semibold">
                            {{ 
                                $mataKuliah->semester }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Program Studi</p>
                        <p class="font-semibold">
                            {{ 
                                $mataKuliah->programStudi?->nama_prodi ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Dosen Pengampu</p>
                        <p class="font-semibold">
                            {{ 
                                $mataKuliah->dosen?->name ?? 'Belum ditentukan' }}
                        </p>
                    </div>

                </div>

                <a href="{{ route('mata-kuliah.index') }}"
                   class="inline-block mt-6 px-4 py-2
                          bg-gray-200 rounded-lg">
                    Kembali
                </a>

            </div>
        </div>
    </div>
</x-app-layout>