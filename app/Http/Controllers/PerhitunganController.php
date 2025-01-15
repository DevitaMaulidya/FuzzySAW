<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Fuzzy;
use App\Models\DataFuzzy;
use App\Models\FuzzyResult;
use App\Models\Perhitungan;
use App\Models\NilaiPreferensi;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $penilaians = Penilaian::all();
        $fuzzys = Fuzzy::all();
        $datafuzzys = DataFuzzy::all();
        $fuzzyresults = FuzzyResult::all();
        $perhitungans = Perhitungan::all();
        $preferensis = NilaiPreferensi::all();

        return view('calculation', compact('alternatifs', 'kriterias', 'penilaians', 'fuzzys', 
        'datafuzzys', 'fuzzyresults', 'perhitungans', 'preferensis'));
    }
}