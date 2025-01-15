<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataFuzzy extends Model
{
    protected $table = 'datafuzzys';  // Nama tabel untuk menyimpan nilai fuzzy

    protected $fillable = [
        'penilaian_id',     // ID dari penilaian
        'kriteria_id',
        'alternatif_id',
        'nilai_fuzzy',      // Nilai fuzzy yang dihitung
    ];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}