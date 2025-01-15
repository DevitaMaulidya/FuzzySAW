<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs= Alternatif::all();

        return view('alternative', compact('alternatifs'));
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
        ]);
    
        Alternatif::create([
            'name' => $request->name,
            'symbol' => $request->symbol,
        ]);
    
        return redirect()->route('alternatif.index')->with('success', 'Data alternatif berhasil ditambahkan.');
       
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
        $alternatif = Alternatif::find($id);
        return view('alternative', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:255',
        ]);
        Alternatif::findOrFail($id)->update([
            'name' => $request->name,
            'symbol' => $request->symbol,
        ]);
        return redirect()->route('alternatif.index')->with('success', 'Data alternatif berhasil diperbarui.');      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();
    
        return redirect()->route('alternatif.index')->with('success', 'Data alternatif berhasil dihapus.');    
    }
}