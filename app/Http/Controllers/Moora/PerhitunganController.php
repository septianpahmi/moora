<?php

namespace App\Http\Controllers\Moora;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Periode;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $title = "Perhitungan";
        $data = Periode::all();
        return view('dashboard.perhitungan.index', compact('title', 'data'));
    }

    public function delete($id)
    {
        $data = Penilaian::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data penilaian berhasil dihapus.');
    }
    public function moora(Request $request)
    {
        $title = "Perhitungan MOORA";
        $data = Periode::where('id', $request->periode_id)->first();
        $penilaian = Penilaian::where('periode_id', $data->id)->get()->unique('alternatif_id');
        $periodeId = $request->periode_id;
        $penilaianAlternatifIds = Penilaian::where('periode_id', $periodeId)
            ->pluck('alternatif_id')
            ->toArray();
        $alternatif = Alternatif::whereNotIn('id', $penilaianAlternatifIds)->get();
        $kriteria = Kriteria::all();
        $sub = SubKriteria::all();
        return view('dashboard.perhitungan.moora', compact('title', 'data', 'penilaian', 'alternatif', 'kriteria', 'sub'));
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'perhitungan'   => 'required|array',
        ]);

        $exists = Penilaian::where('alternatif_id', $request->alternatif_id)
            ->where('periode_id', $id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Alternatif ini sudah memiliki penilaian pada periode ini!');
        }
        foreach ($request->perhitungan as $kriteriaId => $subkritId) {

            Penilaian::create([
                'alternatif_id' => $request->alternatif_id,
                'periode_id'    => $id,
                'subkrit_id'    => $subkritId,
                'nilai'         => Subkriteria::find($subkritId)->bobot ?? 0,
            ]);
        }

        return redirect()->back()->with('success', 'Data penilaian berhasil disimpan.');
    }
}
