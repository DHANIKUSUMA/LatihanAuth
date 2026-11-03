
<div class="space-y-5">

    <div>
        <label class="block font-medium text-sm text-gray-700">
            Kode Mata Kuliah
        </label>

        <input type="text"
               name="kode_mk"
               value="{{ old('kode_mk', $mataKuliah->kode_mk ?? '') }}"
               class="mt-1 block w-full rounded-lg border-gray-300"
               required>

        @error('kode_mk')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium text-sm text-gray-700">
            Nama Mata Kuliah
        </label>

        <input type="text"
               name="nama_mk"
               value="{{ old('nama_mk', $mataKuliah->nama_mk ?? '') }}"
               class="mt-1 block w-full rounded-lg border-gray-300"
               required>

        @error('nama_mk')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium text-sm text-gray-700">
            SKS
        </label>

        <input type="number"
               name="sks"
               min="1"
               max="6"
               value="{{ old('sks', $mataKuliah->sks ?? '') }}"
               class="mt-1 block w-full rounded-lg border-gray-300"
               required>

        @error('sks')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium text-sm text-gray-700">
            Semester
        </label>

        <input type="number"
               name="semester"
               min="1"
               max="14"
               value="{{ old('semester', $mataKuliah->semester ?? '') }}"
               class="mt-1 block w-full rounded-lg border-gray-300"
               required>

        @error('semester')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium text-sm text-gray-700">
            Program Studi
        </label>

        <select name="program_studi_id"
                class="mt-1 block w-full rounded-lg border-gray-300"
                required>

            <option value="">-- Pilih Program Studi --</option>

            @foreach ($programStudis as $prodi)
                <option value="{{ $prodi->id }}"
                    @selected(
                        (string) old(
                            'program_studi_id',
                            $mataKuliah->program_studi_id ?? ''
                        ) === (string) $prodi->id
                    )>
                    {{ $prodi->nama_prodi }}
                </option>
            @endforeach

        </select>

        @error('program_studi_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>
