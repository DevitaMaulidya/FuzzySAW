<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias= Kriteria::all();

        return view('criteria', compact('kriterias'));
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
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0|max:1',
            'attribute' => 'required|in:cost,benefit',
        ]);
    
        Kriteria::create([
            'name' => $request->name,
            'symbol' => $request->symbol,
            'weight' => $request->weight,
            'attribute' => $request->attribute,
        ]);
    
        return redirect()->route('kriteria.index')->with('success', 'Data Kriteria berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('criteria', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0|max:1',
            'attribute' => 'required|in:cost,benefit',
        ]);
        Kriteria::findOrFail($id)->update([
            'name' => $request->name,
            'symbol' => $request->symbol,
            'weight' => $request->weight,
            'attribute' => $request->attribute,
        ]);
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
    
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil dihapus.');    
    }
}