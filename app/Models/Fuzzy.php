<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuzzy extends Model
{
    protected $table = 'fuzzys';
    protected $fillable = [
        'kriteria_id', 
        'a', 
        'b', 
        'c',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}