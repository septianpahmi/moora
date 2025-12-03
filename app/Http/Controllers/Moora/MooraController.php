<?php

namespace App\Http\Controllers\Moora;

use App\Models\Periode;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MooraController extends Controller
{
    public function stepone($id)
    {
        $title = "Matrik Keputusan X";
        $periode = Periode::where('id', $id)->first();
        $kriteria = Kriteria::orderBy('id')->get();

        $data = Penilaian::where('periode_id', $id)->with([
            'alternatif',
        ])->get()->groupBy('alternatif_id');
        return view('dashboard.moora.step1', compact('data', 'title', 'kriteria', 'periode'));
    }

    public function steptwo($periode)
    {
        $title = "Matrik Ternormalisasi (R)";
        $periodeId = Periode::where('id', $periode)->first();
        $kriteria = Kriteria::orderBy('id')->get();

        $data = Penilaian::where('periode_id', $periode)
            ->with(['alternatif', 'subkrit.kriteria'])
            ->get()
            ->groupBy('alternatif_id');

        $normalisasi = [
            'pembagi' => [],
            'nilai'   => []
        ];

        foreach ($kriteria as $k) {

            $nilai = Penilaian::whereHas('subkrit', function ($q) use ($k) {
                $q->where('kriteria_id', $k->id);
            })
                ->with('subkrit')
                ->get();

            $pembagi = sqrt(
                $nilai->sum(fn($row) => pow($row->subkrit->bobot, 2))
            );

            $normalisasi['pembagi'][$k->id] = $pembagi ?: 1;

            foreach ($nilai as $row) {
                $normalisasi['nilai'][$row->alternatif_id][$k->id] =
                    $row->subkrit->bobot / ($pembagi == 0 ? 1 : $pembagi);
            }
        }

        return view('dashboard.moora.step2', compact('title', 'kriteria', 'data', 'normalisasi', 'periodeId'));
    }


    private function hitungNormalisasi($periode)
    {
        $kriteria = Kriteria::orderBy('id')->get();
        $alternatifs = Alternatif::orderBy('id')->get();

        $penilaians = Penilaian::where('periode_id', $periode)
            ->with('subkrit')
            ->get();

        $normalisasi = [
            'pembagi' => [],
            'nilai'   => []
        ];

        foreach ($kriteria as $k) {
            // hitung sum kuadrat untuk kriteria ini
            $sumSquare = 0;

            foreach ($alternatifs as $alt) {
                // cari penilaian yang sesuai alternatif+kriteria
                $p = $penilaians->first(function ($row) use ($alt, $k) {
                    return $row->alternatif_id == $alt->id
                        && $row->subkrit !== null
                        && $row->subkrit->kriteria_id == $k->id;
                });

                $x = $p->nilai ?? 0; // gunakan field 'nilai' pada Penilaian
                $sumSquare += pow($x, 2);
            }

            $pembagi = sqrt($sumSquare);
            $normalisasi['pembagi'][$k->id] = $pembagi > 0 ? $pembagi : 0;

            // hitung R_ij untuk tiap alternatif
            foreach ($alternatifs as $alt) {
                $p = $penilaians->first(function ($row) use ($alt, $k) {
                    return $row->alternatif_id == $alt->id
                        && $row->subkrit !== null
                        && $row->subkrit->kriteria_id == $k->id;
                });

                $x = $p->nilai ?? 0;
                $r = $pembagi > 0 ? ($x / $pembagi) : 0;

                $normalisasi['nilai'][$alt->id][$k->id] = $r;
            }
        }

        return $normalisasi;
    }

    public function stepThree($periode)
    {
        $title = "Normalisasi Terbobot (Y)";
        $periodeId = Periode::where('id', $periode)->first();
        $kriteria = Kriteria::orderBy('id')->get();
        $data = Penilaian::where('periode_id', $periode)
            ->with(['alternatif', 'subkrit.kriteria'])
            ->get()
            ->groupBy('alternatif_id');

        // ambil hasil normalisasi dari step2
        $normalisasi = $this->hitungNormalisasi($periode);
        // array output
        $bobotData = [];

        foreach ($data as $alternatif_id => $items) {

            $row = [];

            foreach ($kriteria as $k) {

                $Rij = $normalisasi['nilai'][$alternatif_id][$k->id] ?? 0;

                // dd($Rij);
                // *sama seperti kode lama Anda: (nilai/pembagi) × bobot*
                $Yij = $Rij * $k->bobot;

                // simpan
                $row[$k->id] = $Yij;
            }

            $bobotData[$alternatif_id] = [
                'nama' => $items->first()->alternatif->nama,
                'nilai' => $row
            ];
        }


        return view('dashboard.moora.step3', compact('title', 'kriteria', 'data', 'bobotData', 'periodeId'));
    }

    private function pembobotan($periode)
    {
        $title = "Normalisasi Terbobot (Y)";
        $periodeId = Periode::where('id', $periode)->first();
        $kriteria = Kriteria::orderBy('id')->get();
        $data = Penilaian::where('periode_id', $periode)
            ->with(['alternatif', 'subkrit.kriteria'])
            ->get()
            ->groupBy('alternatif_id');

        // ambil hasil normalisasi dari step2
        $normalisasi = $this->hitungNormalisasi($periode);
        // array output
        $bobotData = [];

        foreach ($data as $alternatif_id => $items) {

            $row = [];

            foreach ($kriteria as $k) {

                $Rij = $normalisasi['nilai'][$alternatif_id][$k->id] ?? 0;

                // dd($Rij);
                // *sama seperti kode lama Anda: (nilai/pembagi) × bobot*
                $Yij = $Rij * $k->bobot;

                // simpan
                $row[$k->id] = $Yij;
            }

            $bobotData[$alternatif_id] = [
                'nama' => $items->first()->alternatif->nama,
                'nilai' => $row
            ];
        }


        return view('dashboard.moora.step3', compact('title', 'kriteria', 'data', 'bobotData', 'periodeId'));
    }

    /**
     * Step 3 — Normalisasi Terbobot (Yij = Rij × bobot)
     */
    private function hitungPembobotan($periode)
    {
        // Ambil hasil normalisasi dari step 2
        $step2 = $this->steptwo($periode);

        $kriteria    = $step2['kriteria'];
        $normalisasi = $step2['normalisasi'];

        $pembobotan = [
            'nilai' => []
        ];

        // Loop berdasarkan alternatif
        foreach ($normalisasi['nilai'] as $alternatif_id => $nilaiPerKriteria) {

            foreach ($kriteria as $k) {

                // Nilai normalisasi Rij
                $Rij = $nilaiPerKriteria[$k->id] ?? 0;

                // Hitung Yij = Rij × Bobot Kriteria
                $pembobotan['nilai'][$alternatif_id][$k->id] =
                    $Rij * ($k->bobot ?? 0);
            }
        }

        return $pembobotan;
    }


    public function stepfour($periode)
    {
        $title = "Hasil Perhitungan Yi (Optimisasi)";
        $periodeId = Periode::find($periode);
        $kriteria   = Kriteria::orderBy('id')->get();

        $pembobotan = $this->hitungPembobotan($periode);

        $data = Penilaian::where('periode_id', $periode)
            ->with(['alternatif'])
            ->get()
            ->groupBy('alternatif_id');

        $hasilYi = [];

        foreach ($data as $alternatif_id => $items) {

            $benefit = 0;
            $cost    = 0;

            foreach ($kriteria as $k) {

                $Yij = $pembobotan['nilai'][$alternatif_id][$k->id] ?? 0;
                // dd($Yij);
                if ($k->type == 'Benefit') {
                    $benefit += $Yij;
                } else {
                    $cost += $Yij;
                }
            }

            $Yi = $benefit - $cost;

            $hasilYi[$alternatif_id] = [
                'alternatif' => $items->first()->alternatif->nama,
                'Benefit'    => $benefit,
                'Cost'       => $cost,
                'Yi'         => $Yi
            ];
        }

        usort($hasilYi, fn($a, $b) => $b['Yi'] <=> $a['Yi']);

        $rank = 1;
        foreach ($hasilYi as $index => $val) {
            $hasilYi[$index]['ranking'] = $rank++;
        }

        return view('dashboard.moora.step4', compact('title', 'periodeId', 'hasilYi', 'kriteria'));
    }
}
