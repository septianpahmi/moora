<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $title = "Periode";
        $data = Periode::all();
        return view('dashboard.periode.index', compact('title', 'data'));
    }

    public function delete($id)
    {
        $data = Periode::find($id);
        $data->delete();
        return Redirect()->back()->with('success', 'Data Berhasil dihapus.');
    }

    public function create(Request $request)
    {
        Periode::create([
            'nama' => $request->nama,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ]);

        return Redirect()->back()->with('success', 'Data Berhasil dibuat.');
    }
    public function update(Request $request, $id)
    {

        $data = Periode::find($id);
        $data->update([
            'nama' => $request->nama,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ]);

        return Redirect()->back()->with('success', 'Data Berhasil diperbarui.');
    }
}
