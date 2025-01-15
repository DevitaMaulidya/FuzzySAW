<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $penilaians = Penilaian::with(['alternatif', 'kriteria'])->get();

        return view('evaluation', compact('alternatifs', 'kriterias', 'penilaians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'nilai' => 'required|array',
            'nilai.*' => 'numeric',
        ]);
        

        // Menyimpan data penilaian ke dalam tabel penilaians
        foreach ($request->kriteria_id as $index => $kriteria_id) {
            Penilaian::updateOrCreate(
                [
                    'alternatif_id' => $request->alternatif_id,
                    'kriteria_id' => $kriteria_id,
                ],
                [
                    'nilai' => $request->nilai[$index],
                ]
            );
        }

        return redirect()->route('penilaian.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penilaian = Penilaian::find($id);
        return view('evaluation', compact('penilaian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nilai' => 'required|numeric',
        ]);

        // Menyimpan data penilaian ke dalam tabel penilaians
        Penilaian::findOrFail($id)->update([
            'nilai' => $request->nilai
        ]);

        return redirect()->route('penilaian.index')->with('success', 'Data Kriteria berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}