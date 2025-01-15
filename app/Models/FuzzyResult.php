<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuzzyResult extends Model
{
    protected $table = 'fuzzy_values';

    protected $fillable = [
        'kriteria_id', 
        'nilai_min_max',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}