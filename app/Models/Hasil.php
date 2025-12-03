<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = [
        'alternatif_id',
        'periode_id',
        'max',
        'min',
        'yi',
        'rank',
    ];
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
}
