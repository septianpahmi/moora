<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nip',
        'nama',
        'jabatan',
    ];

    public function alternatifnilai()
    {
        return $this->hasMany(Penilaian::class);
    }
}
