<?php

namespace App\Models;

use App\Models\Perhitungan;
use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Model;

class NilaiPreferensi extends Model
{
    protected $table = 'preferensis';

    protected $fillable = [
        'alternatif_id', 'kriteria_id', 'nilai_preferensi'
    ];
    
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    
    public static function calculatePreferenceValue($kriteria_id)
    {
        $perhitunganList = Perhitungan::where('kriteria_id', $kriteria_id)->get();
        if ($perhitunganList->isEmpty()) {
            return;
        }

        $kriteria = Kriteria::find($kriteria_id);
        $weight = $kriteria->weight;
        $attribute = $kriteria->attribute;

        foreach ($perhitunganList as $perhitungan) {
            $nilai_matriks = $perhitungan->nilai_matriks;
            
            if ($attribute === 'cost') {
                $nilai_preferensi = $weight * $nilai_matriks;
            } elseif ($attribute === 'benefit') {
                $nilai_preferensi = $weight * $nilai_matriks;
            } else {
                continue; // Jika atribut tidak dikenali, lewati
            }

            NilaiPreferensi::updateOrCreate(
                [
                    'alternatif_id' => $perhitungan->alternatif_id,
                    'kriteria_id' => $perhitungan->kriteria_id,
                ],
                [
                    'nilai_preferensi' => $nilai_preferensi,
                ]
            );
        }
    }
}