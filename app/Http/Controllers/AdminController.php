<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addalternatif()
    {
        return view('alternatif');
    }

    public function addkriteria()
    {
        return view('kriteria');
    }
    public function addsubkriteria()
    {
        return view('subkriteria');
    }
}
