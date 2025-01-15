<?php

namespace App\Models;

use App\Models\DataFuzzy;
use App\Models\FuzzyResult;
use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    protected $table = 'perhitungans';

    protected $fillable = [
        'alternatif_id', 'kriteria_id', 'nilai_matriks'
    ];
    
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    /**
     * Fungsi untuk menghitung matriks keputusan berdasarkan nilai fuzzy.
     */
    public static function calculateDecisionMatrix()
    {
        // Ambil semua nilai fuzzy yang telah disimpan di tabel datafuzzys
        $dataFuzzys = DataFuzzy::all();

        foreach ($dataFuzzys as $dataFuzzy) {
            // Ambil nilai min/max untuk kriteria terkait dari tabel fuzzy_values
            $fuzzyResult = FuzzyResult::where('kriteria_id', $dataFuzzy->kriteria_id)->first();

            if (!$fuzzyResult) {
                continue; // Jika tidak ada nilai min/max, lewati iterasi
            }

            $nilai_fuzzy = $dataFuzzy->nilai_fuzzy;
            $nilai_min_max = $fuzzyResult->nilai_min_max;

            // Ambil atribut kriteria (cost atau benefit)
            $kriteria = Kriteria::find($dataFuzzy->kriteria_id);
            $attribute = $kriteria->attribute;

            // Hitung nilai matriks keputusan
            if ($attribute === 'cost') {
                $nilai_matriks = $nilai_min_max / $nilai_fuzzy;
            } elseif ($attribute === 'benefit') {
                $nilai_matriks = $nilai_min_max / $nilai_fuzzy;
            } else {
                continue; // Jika atribut tidak valid, lewati iterasi
            }

            // Simpan hasil perhitungan ke tabel perhitungans
            Perhitungan::updateOrCreate(
                [
                    'alternatif_id' => $dataFuzzy->alternatif_id,
                    'kriteria_id' => $dataFuzzy->kriteria_id,
                ],
                [
                    'nilai_matriks' => $nilai_matriks,
                ]
            );
        }
    }
}