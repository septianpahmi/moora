<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    public function index(){
        $title = 'subkriteria';
        $data = SubKriteria::all();
        $kriteria = Kriteria::all();
        return view('dashboard.subkriteria.index', compact('title','data','kriteria'));
    }
    
    public function create(Request $request){
        SubKriteria::create([
            'title' => $request->title,
            'bobot' => $request->bobot,
            'kriteria_id' => $request->kriteria_id
        ]);

    return redirect()->back()->with('success','Sub Kriteria berhasil dibuat');
    }

    public function delete($id){
        $data = SubKriteria::find($id);
        $data->delete();

        return redirect()->back()->with('success','Sub Kriteria berhasil dihapus');
    }

    public function update(Request $request, $id){
        $data = SubKriteria::find($id);
        $data->title = $request->title;
        $data->bobot = $request->bobot;
        $data->save();
    return redirect()->back()->with('success','Kriteria berhasil diubah');
    }
}
