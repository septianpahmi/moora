<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriController extends Controller
{
    public function index(){
        $title = "Data Kriteria";
        $data = Kriteria::all();
        return view('dashboard.kriteria.index',compact('title','data'));
    }

    public function create(Request $request){
        Kriteria::create([
            'code' => $request->code,
            'title' => $request->title,
            'bobot' => $request->bobot,
            'type' => $request->type,
        ]);

    return redirect()->back()->with('success','Kriteria berhasil dibuat');
    }

    public function delete($id){
        $data = Kriteria::find($id);
        $data->delete();

        return redirect()->back()->with('success','Kriteria berhasil dihapus');
    }

    public function update(Request $request, $id){
        $data = Kriteria::find($id);
        $data->code = $request->code;
        $data->title = $request->title;
        $data->bobot = $request->bobot;
        $data->type = $request->type;
        $data->save();
    return redirect()->back()->with('success','Kriteria berhasil diubah');
    }
}
