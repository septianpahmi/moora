<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Periode;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $title = "Hasil perhitungan MOORA";
        $periode = Periode::all();
        return view('dashboard.hasil.index', compact('title', 'periode'));
    }

    public function getData($periode)
    {
        $title = "Detail Hasil";
        $data = Hasil::where('periode_id', $periode)->get()->sortByDesc('yi');
        $periodeData = Periode::where('id', $periode)->first();
        return view('dashboard.hasil.detail', compact('title', 'data', 'periodeData'));
    }
}
