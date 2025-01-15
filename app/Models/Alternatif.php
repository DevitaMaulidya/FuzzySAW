<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatifs';
    protected $guarded = ['id'];
    protected $fillable = ['symbol', 'name'];

    public function datafuzzys()
{
    return $this->hasMany(DataFuzzy::class);
}
}