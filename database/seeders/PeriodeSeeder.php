<?php

namespace Database\Seeders;

use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periode::create([
            'nama' => 'Periode 25/26',
            'date_start' => now()->subYear(),
            'date_end' => now(),
        ]);

        Periode::create([
            'nama' => 'Periode 26/27',
            'date_start' => now(),
            'date_end' => now()->addYear(),
        ]);
    }
}
