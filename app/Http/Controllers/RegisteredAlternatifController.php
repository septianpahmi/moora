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
                'kriteria' => $sub_id
            ],
        );
    }

    return redirect()->back()->with('success', 'Data berhasil disimpan.');
}
    
}
