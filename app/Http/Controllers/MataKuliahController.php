<?php
namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = MataKuliah::with([
            'programStudi',
            'dosen',
        ])->latest()->paginate(10);

        return view('mata-kuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        $programStudis = ProgramStudi::orderBy('nama_prodi')->get();
        $mataKuliah = new MataKuliah();

        return view('mata-kuliah.create', compact('mataKuliah', 'programStudis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => [
                'required',
                'string',
                'max:30',
                'unique:mata_kuliahs,kode_mk'
            ],
            'nama_mk' => [
                'required',
                'string',
                'max:255'
            ],
            'sks' => [
                'required',
                'integer',
                'between:1,6'
            ],
            'semester' => [
                'required',
                'integer',
                'between:1,14'
            ],
            'program_studi_id' => [
                'required',
                'exists:program_studis,id'
            ],
        ]);

        $mataKuliah = new MataKuliah($validated);

        // Pemilik ditentukan berdasarkan user yang login
        // Bukan dari input form
        $mataKuliah->user_id = $request->user()->id;

        $mataKuliah->save();

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function show(MataKuliah $mataKuliah)
    {
        $mataKuliah->load(['programStudi', 'dosen']);

        return view('mata-kuliah.show', compact('mataKuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        $programStudis = ProgramStudi::orderBy('nama_prodi')->get();

        return view('mata-kuliah.edit', compact('mataKuliah', 'programStudis'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
        {
        $validated = $request->validate([
            'kode_mk' => [
                'required',
                'string',
                'max:30',
                Rule::unique('mata_kuliahs', 'kode_mk')
                    ->ignore($mataKuliah->id)
            ],
            'nama_mk' => [
                'required',
                'string',
                'max:255'
            ],
            'sks' => [
                'required',
                'integer',
                'between:1,6'
            ],
            'semester' => [
                'required',
                'integer',
                'between:1,14'
            ],
            'program_studi_id' => [
                'required',
                'exists:program_studis,id'
            ],
        ]);

        $mataKuliah->update($validated);

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
