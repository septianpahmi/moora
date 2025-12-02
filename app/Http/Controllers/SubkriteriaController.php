<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    public function index($id)
    {
        $title = "Sub Kriteria";
        $data = SubKriteria::where('kriteria_id', $id)->get();
        $kriteria = Kriteria::where('id', $id)->first();
        return view('dashboard.subkriteria.index', compact('title', 'data', 'kriteria'));
    }

    public function delete($id)
    {
        $data = SubKriteria::find($id);
        $data->delete();
        return Redirect()->back()->with('success', 'Data Berhasil dihapus.');
    }

    public function create(Request $request, $kriteria)
    {
        if ($request->bobot > 100) {
            return Redirect()->back()->with('error', 'Bobot tidak bole lebih dari 100');
        }
        SubKriteria::create([
            'kriteria_id' => $kriteria,
            'title' => $request->title,
            'bobot' => $request->bobot,
        ]);

        return Redirect()->back()->with('success', 'Data berhasil ditambah.');
    }

    public function update(Request $request, $id, $kriteria)
    {
        if ($request->bobot > 100) {
            return Redirect()->back()->with('error', 'Bobot tidak bole lebih dari 100');
        }
        $data = SubKriteria::find($id);
        $data->update([
            'kriteria_id'  => $kriteria,
            'title' => $request->title,
            'bobot' => $request->bobot,
        ]);

        return Redirect()->back()->with('success', 'Data Berhasil diperbarui.');
    }
}
