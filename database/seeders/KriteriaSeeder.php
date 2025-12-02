<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriterias = [
            ['code' => 'C1', 'title' => 'Kehadiran', 'type' => 'Cost', 'bobot' => 90],
            ['code' => 'C2', 'title' => 'Kepatuhan terhadap jam kerja', 'type' => 'Cost', 'bobot' => 88],
            ['code' => 'C3', 'title' => 'Menyelesaikan tugas tepat waktu', 'type' => 'Benefit', 'bobot' => 75],
            ['code' => 'C4', 'title' => 'Kepedulian terhadap tugas tambahan', 'type' => 'Benefit', 'bobot' => 70],
            ['code' => 'C5', 'title' => 'Pemahaman terhadap tugas', 'type' => 'Benefit', 'bobot' => 85],
            ['code' => 'C6', 'title' => 'Kemampuan menyelesaikan masalah', 'type' => 'Benefit', 'bobot' => 68],
            ['code' => 'C7', 'title' => 'Etika dalam bekerja', 'type' => 'Benefit', 'bobot' => 98],
            ['code' => 'C8', 'title' => 'Kerjasama dengan tim', 'type' => 'Benefit', 'bobot' => 95],
            ['code' => 'C9', 'title' => 'Usulan perbaikan pekerjaan', 'type' => 'Benefit', 'bobot' => 78],
            ['code' => 'C10', 'title' => 'Kemampuan berpikir inovatif', 'type' => 'Benefit', 'bobot' => 78]
        ];

        $subKriteria = [
            // C1
            'C1' => [
                ['title' => 'Kehadiran sangat buruk', 'bobot' => 1],
                ['title' => 'Kehadiran buruk', 'bobot' => 2],
                ['title' => 'Kehadiran cukup', 'bobot' => 3],
                ['title' => 'Kehadiran baik', 'bobot' => 4],
                ['title' => 'Kehadiran sangat baik', 'bobot' => 5],
            ],

            // C2
            'C2' => [
                ['title' => 'Sering terlambat', 'bobot' => 1],
                ['title' => 'Kadang terlambat', 'bobot' => 2],
                ['title' => 'Tepat waktu cukup', 'bobot' => 3],
                ['title' => 'Tepat waktu baik', 'bobot' => 4],
                ['title' => 'Selalu tepat waktu', 'bobot' => 5],
            ],

            // C3
            'C3' => [
                ['title' => 'Sangat sering terlambat', 'bobot' => 1],
                ['title' => 'Kadang terlambat', 'bobot' => 2],
                ['title' => 'Sesuai target', 'bobot' => 3],
                ['title' => 'Lebih cepat dari target', 'bobot' => 4],
                ['title' => 'Selalu lebih cepat & maksimal', 'bobot' => 5],
            ],

            // C4
            'C4' => [
                ['title' => 'Tidak peduli', 'bobot' => 1],
                ['title' => 'Jarang peduli', 'bobot' => 2],
                ['title' => 'Kadang peduli', 'bobot' => 3],
                ['title' => 'Peduli', 'bobot' => 4],
                ['title' => 'Sangat peduli', 'bobot' => 5],
            ],

            // C5
            'C5' => [
                ['title' => 'Tidak memahami', 'bobot' => 1],
                ['title' => 'Kurang memahami', 'bobot' => 2],
                ['title' => 'Memahami cukup', 'bobot' => 3],
                ['title' => 'Memahami dengan baik', 'bobot' => 4],
                ['title' => 'Sangat memahami', 'bobot' => 5],
            ],

            // C6
            'C6' => [
                ['title' => 'Tidak mampu menyelesaikan masalah', 'bobot' => 1],
                ['title' => 'Butuh bantuan penuh', 'bobot' => 2],
                ['title' => 'Mampu dengan sedikit bantuan', 'bobot' => 3],
                ['title' => 'Mandiri dalam menyelesaikan masalah', 'bobot' => 4],
                ['title' => 'Sangat cepat & efektif', 'bobot' => 5],
            ],

            // C7
            'C7' => [
                ['title' => 'Etika sangat buruk', 'bobot' => 1],
                ['title' => 'Etika buruk', 'bobot' => 2],
                ['title' => 'Etika cukup', 'bobot' => 3],
                ['title' => 'Etika baik', 'bobot' => 4],
                ['title' => 'Etika sangat baik', 'bobot' => 5],
            ],

            // C8
            'C8' => [
                ['title' => 'Tidak mau bekerja sama', 'bobot' => 1],
                ['title' => 'Kerjasama buruk', 'bobot' => 2],
                ['title' => 'Kerjasama cukup', 'bobot' => 3],
                ['title' => 'Kerjasama baik', 'bobot' => 4],
                ['title' => 'Sangat kooperatif', 'bobot' => 5],
            ],

            // C9
            'C9' => [
                ['title' => 'Tidak pernah memberi usulan', 'bobot' => 1],
                ['title' => 'Jarang memberi usulan', 'bobot' => 2],
                ['title' => 'Kadang memberi usulan', 'bobot' => 3],
                ['title' => 'Cukup aktif memberi usulan', 'bobot' => 4],
                ['title' => 'Sangat aktif & inovatif', 'bobot' => 5],
            ],

            // C10
            'C10' => [
                ['title' => 'Tidak inovatif', 'bobot' => 1],
                ['title' => 'Inovasi rendah', 'bobot' => 2],
                ['title' => 'Inovasi cukup', 'bobot' => 3],
                ['title' => 'Inovasi baik', 'bobot' => 4],
                ['title' => 'Sangat inovatif', 'bobot' => 5],
            ],
        ];

        // Insert kriteria + subkriteria
        foreach ($kriterias as $kr) {
            $k = Kriteria::create($kr);

            foreach ($subKriteria[$kr['code']] as $sub) {
                SubKriteria::create([
                    'kriteria_id' => $k->id,
                    'title' => $sub['title'],
                    'bobot' => $sub['bobot'],
                ]);
            }
        }
    }
}
