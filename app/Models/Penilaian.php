<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'alternatif_id',
        'periode_id',
        'subkrit_id',
        'nilai',
    ];

    public function subkrit()
    {
        return $this->belongsTo(SubKriteria::class, 'subkrit_id');
    }
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
}
