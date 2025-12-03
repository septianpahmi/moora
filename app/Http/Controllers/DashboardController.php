<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Periode;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $kriteriaCount = Kriteria::count();
        $subCount = SubKriteria::count();
        $altCount = Alternatif::count();

        $latestPeriode = Periode::latest()->first();
        $bestLatest = null;
        if ($latestPeriode) {
            $bestLatest = Hasil::where('periode_id', $latestPeriode->id)
                ->orderBy('rank', 'ASC')
                ->with('alternatif')
                ->first();
        }

        $bestGlobal = Hasil::orderBy('yi', 'DESC')
            ->with('alternatif')
            ->first();
        return view('dashboard.index', compact(
            'title',
            'kriteriaCount',
            'subCount',
            'altCount',
            'bestLatest',
            'latestPeriode',
            'bestGlobal'
        ));
    }
}
