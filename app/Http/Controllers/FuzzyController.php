<?php

namespace App\Http\Controllers;

use App\Models\DataFuzzy;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Perhitungan;
use App\Models\NilaiPreferensi;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    /**
     * Fungsi keanggotaan untuk kurva segitiga (Triangular Membership Function).
     *
     * @param float $x Nilai input.
     * @param float $a Titik Min.
     * @param float $b Titik Max.
     * @return float Nilai derajat keanggotaan.
     */
    public function linearMembership($x, $a, $b, $attribute)
    {   
        if ($attribute === 'cost') {
            // Keanggotaan menurun (cost)
            if ($x > $b) {
                return 0.0; // Nilai paling besar
            } elseif ($x >= $a && $x <= $b) {
                // Hitung keanggotaan fuzzy menurun
                return ($b - $x) / ($b - $a);
            }
        } elseif ($attribute === 'benefit') {
            // Keanggotaan meningkat (benefit)
            if ($x <= $a) {
                return 0.0; // Nilai paling kecil
            } elseif ($x > $b) {
                return 1.0; // Nilai paling besar
            } elseif ($x >= $a && $x <= $b) {
                return ($x - $a) / ($b - $a);
            }
        }
        return null;
    }

    public function updateAllFuzzyData()
    {
        // Ambil seluruh data penilaian
        $penilaians = Penilaian::all();

        foreach ($penilaians as $penilaian) {
            // Panggil fungsi untuk menghitung dan menyimpan nilai fuzzy
            $penilaian->calculateFuzzyMembership();
        }
        
        Perhitungan::calculateDecisionMatrix();

        $kriterias = Kriteria::all();

        foreach ($kriterias as $kriteria) {
            // Panggil metode untuk setiap kriteria_id
            NilaiPreferensi::calculatePreferenceValue($kriteria->id);
        }

        return redirect()->route('perhitungan.index');
    }
}