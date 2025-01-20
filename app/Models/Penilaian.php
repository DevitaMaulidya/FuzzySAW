<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DataFuzzy;
use App\Models\FuzzyResult;
use App\Models\Fuzzy;
use App\Http\Controllers\FuzzyController;

class Penilaian extends Model
{
    protected $table = 'penilaians';

    protected $fillable = [
        'alternatif_id', 'kriteria_id', 'nilai'
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    protected static function booted()
    {
        static::saved(function ($penilaian) {
            // Panggil fungsi untuk menghitung dan menyimpan nilai fuzzy setelah penilaian disimpan
            $penilaian->calculateFuzzyMembership();
        });
    }

    /**
     * Fungsi untuk menghitung dan menyimpan nilai fuzzy a, b.
     */
    public function calculateFuzzyMembership()
    {
        // Ambil semua nilai penilaian untuk kriteria yang sama
        $penilaian = Penilaian::where('kriteria_id', $this->kriteria_id)->pluck('nilai');

        if ($penilaian->isEmpty()) {
            return; // Tidak ada nilai untuk kriteria ini
        }

        // Hitung nilai a (min), b (max)
        $a = 1;
        $b = $penilaian->max()*2;

        $kriteria = $this->kriteria;
        $attribute = $kriteria->attribute;

        // Panggil FuzzyController untuk menghitung nilai fuzzy
        $fuzzyController = new FuzzyController();
        $nilai_fuzzy = $fuzzyController->linearMembership($this->nilai, $a, $b, $attribute);

        // Simpan nilai fuzzy ke dalam tabel datafuzzys
        $dataFuzzy = DataFuzzy::updateOrCreate(
            [
                'penilaian_id' => $this->id,
                'kriteria_id' => $this->kriteria_id,
                'alternatif_id' => $this->alternatif_id,
            ],
            ['nilai_fuzzy' => $nilai_fuzzy]
        );

        if ($attribute === 'cost') {
            // Ambil nilai minimum dari fuzzy
            $nilai_terbaik = DataFuzzy::where('kriteria_id', $this->kriteria_id)
                ->min('nilai_fuzzy');
        } elseif ($attribute === 'benefit') {
            // Ambil nilai maksimum dari fuzzy
            $nilai_terbaik = DataFuzzy::where('kriteria_id', $this->kriteria_id)
                ->max('nilai_fuzzy');
        }

        FuzzyResult::updateOrCreate(
        ['kriteria_id' => $this->kriteria_id],
        ['nilai_min_max' => $nilai_terbaik]
        );
        
        // Simpan atau perbarui nilai a, b, untuk kriteria ini di tabel fuzzys
        Fuzzy::updateOrCreate(
            ['kriteria_id' => $this->kriteria_id],
            ['a' => $a, 'b' => $b]
        );
    }
}