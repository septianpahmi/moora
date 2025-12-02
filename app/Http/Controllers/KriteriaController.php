<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KriteriaController extends Controller
{
    public function index()
    {
        $title = "Kriteria";
        $data = Kriteria::all();
        return view('dashboard.kriteria.index', compact('title', 'data'));
    }

    public function delete($id)
    {
        $data = Kriteria::find($id);
        $data->delete();

        return Redirect()->back()->with('success', 'Data Berhasil dihapus.');
    }

    public function create(Request $request)
    {
        $existCode = Kriteria::where('code', $request->code)->exists();
        if ($existCode) {
            return Redirect()->back()->with('error', 'Data dengan code' . ' ' . $request->code . ' ' . 'sudah terdaftar.');
        }
        if ($request->bobot > 100) {
            return Redirect()->back()->with('error', 'Bobot tidak bole lebih dari 100');
        }
        Kriteria::create([
            'code' => $request->code,
            'title' => $request->title,
            'bobot' => $request->bobot,
            'type' => $request->type,
        ]);

        return Redirect()->back()->with('success', 'Data Berhasil dibuat.');
    }
    public function update(Request $request, $id)
    {
        if ($request->bobot > 100) {
            return Redirect()->back()->with('error', 'Bobot tidak bole lebih dari 100');
        }
        $existCode = Kriteria::where('code', $request->code)
            ->where('id', '!=', $id)
            ->exists();
        if ($existCode) {
            return Redirect()->back()->with('error', 'Data dengan code' . ' ' . $request->code . ' ' . 'sudah terdaftar.');
        }
        $data = Kriteria::find($id);
        $data->update([
            'code'  => $request->code,
            'title' => $request->title,
            'bobot' => $request->bobot,
            'type'  => $request->type,
        ]);

        return Redirect()->back()->with('success', 'Data Berhasil diperbarui.');
    }
}
