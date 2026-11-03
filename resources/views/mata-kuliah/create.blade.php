<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Mata Kuliah
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm rounded-xl">

                <form action="{{ route('mata-kuliah.store') }}"
                      method="POST">

                    @csrf

                    @include('mata-kuliah._form')

                    <div class="flex justify-end gap-3 mt-6">

                        <a href="{{ route('mata-kuliah.index') }}"
                           class="px-4 py-2 bg-gray-200 rounded-lg">
                            Kembali
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-gray-400 rounded-lg">
                            Simpan
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>