<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\RegisteredAlternatif;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class RegisteredAlternatifController extends Controller
{
    public function index(){
        $title = "Perhitungan";
        $data = Alternatif::all();
        $kriteria = Kriteria::all();
        $sub = SubKriteria::all();
        return view('dashboard.perhitungan.index',compact('title','data','kriteria','sub'));
    }

    public function create(Request $request, $id){
        $request->validate([
        'perhitungan' => 'required|array',
    ]);
    $data = $request->input('perhitungan');

    foreach ($data as $kriteria_id => $sub_id) {
        RegisteredAlternatif::updateOrCreate(
            [
                'alternatif_id' => $id,
                'subkrit_id' => $sub_id
            ],
        );
    }

    return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function moora(){
        $title = "Data Alternatif";
        $data = RegisteredAlternatif::all()->unique('alternatif_id');
        return view('dashboard.moora.step1',compact('data','title'));
    }
    public function matrik(){
        $title = "Matrik Keputusan X";
        $kriteria = Kriteria::orderBy('id')->get();

        $data = RegisteredAlternatif::with([
            'alternatif',
        ])->get()->groupBy('alternatif_id'); 
        return view('dashboard.moora.step2',compact('data','title','kriteria'));
    }

    public function normalisasi(){
        $title = "Matrik Ternormalisasi (R)";
        $kriteria = Kriteria::orderBy('id')->get();

        $data = RegisteredAlternatif::with([
            'alternatif',
            'subkrit.kriteria'
        ])->get()->groupBy('alternatif_id'); 

        
        // PROSES NORMALISASI
        $normalisasi = [];

        foreach ($kriteria as $k) {

            // Ambil semua nilai x_ij untuk kriteria ini
            $nilaiPerKriteria = RegisteredAlternatif::whereHas('subkrit', function ($q) use ($k) {
                $q->where('kriteria_id', $k->id);
            })
            ->with('subkrit')
            ->get();
            // Hitung pembagi = sqrt( sum( x^2 ) )
            $pembagi = sqrt(
                $nilaiPerKriteria->sum(function ($item) {
                    return pow($item->subkrit->bobot, 2);
                })
            );
            
            // Simpan pembagi
            $normalisasi['pembagi'][$k->id] = $pembagi;
            
            // Hitung R_ij untuk setiap alternatif
            foreach ($nilaiPerKriteria as $item) {
                $normalisasi['nilai'][$item->alternatif_id][$k->id] =
                    $item->subkrit->bobot / ($pembagi == 0 ? 1 : $pembagi);
            }
            // dd($normalisasi);
        }
        return view('dashboard.moora.step3',compact('data','title','kriteria','normalisasi'));
    }
    
}
