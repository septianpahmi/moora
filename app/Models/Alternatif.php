<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jabatan',
        'nip',
        'foto',
    ];

    public function regAlternatif(){
        return $this->hasMany(RegisteredAlternatif::class);
    }
}
