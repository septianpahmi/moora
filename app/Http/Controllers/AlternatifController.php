<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index(){
        $title = "Data Alternatif";
        $data = Alternatif::all();
        return view('dashboard.alternatif.index',compact('title','data'));
    }

    public function create(Request $request){
        $file = $request->file('foto');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('img/karyawan', $filename);
        Alternatif::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'foto' => $filename,
        ]);

    return redirect()->back()->with('success','Alternatif berhasil dibuat');
    }

    public function delete($id){
        $data = Alternatif::find($id);
        $data->delete();

        return redirect()->back()->with('success','Alternatif berhasil dihapus');
    }

    public function update(Request $request, $id){
         $file = $request->file('foto');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('img/karyawan', $filename);
        $data = Alternatif::find($id);
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->nip = $request->nip;
        $data->foto = $filename;
        $data->save();
    return redirect()->back()->with('success','Alternatif berhasil diubah');
    }
}
