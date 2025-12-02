<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $title = "Alternatif";
        $data = Alternatif::all();
        return view('dashboard.alternatif.index', compact('title', 'data'));
    }

    public function delete($id)
    {
        $data = Alternatif::find($id);
        if (file_exists(public_path('images/alternatif/' . $data->image))) {
            unlink(public_path('images/alternatif/' . $data->image));
        }
        $data->delete();

        return Redirect()->back()->with('success', 'Data Berhasil dihapus.');
    }

    public function create(Request $request)
    {
        $existCode = Alternatif::where('nip', $request->nip)->exists();
        if ($existCode) {
            return Redirect()->back()->with('error', 'Alternatif dengan NIP' . ' ' . $request->nip . ' ' . 'sudah terdaftar.');
        }
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/alternatif'), $imageName);
        Alternatif::create([
            'image' => $imageName,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);

        return Redirect()->back()->with('success', 'Data Berhasil dibuat.');
    }
    public function update(Request $request, $id)
    {
        $existCode = Alternatif::where('nip', $request->nip)
            ->where('id', '!=', $id)
            ->exists();
        if ($existCode) {
            return Redirect()->back()->with('error', 'Data dengan NIP' . ' ' . $request->nip . ' ' . 'sudah terdaftar.');
        }
        $data = Alternatif::find($id);
        if ($request->hasFile('image')) {
            if (file_exists(public_path('images/alternatif/' . $data->image))) {
                unlink(public_path('images/alternatif/' . $data->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/alternatif'), $imageName);
            $data->image = $imageName;
        }
        $data->update([
            'image' => $imageName,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);

        return Redirect()->back()->with('success', 'Data Berhasil diperbarui.');
    }
}
