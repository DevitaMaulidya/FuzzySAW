<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriterias';
    protected $guarded = ['id'];
    protected $fillable = ['symbol', 'name', 'weight', 'attribute'];
}