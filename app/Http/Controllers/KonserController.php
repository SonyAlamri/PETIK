<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model konserModel
use App\Models\konserModel;

class konserController extends Controller
{
    //method untuk tampil data konser
    public function konsertampil()
    {
        $datakonser = konserModel::orderby('kode_konser', 'ASC')
        ->paginate(5);

        return view('halaman/view_konser',['konser'=>$datakonser]);
    }

    //method untuk tambah data konser
    public function konsertambah(Request $request)
    {
        $this->validate($request, [
            'kode_konser' => 'required',
            'judul' => 'required',
            'band' => 'required',
            'kategori' => 'required'
        ]);

        konserModel::create([
            'kode_konser' => $request->kode_konser,
            'judul' => $request->judul,
            'band' => $request->band,
            'kategori' => $request->kategori
        ]);

        return redirect('/konser');
    }

     //method untuk hapus data konser
     public function konserhapus($id_konser)
     {
         $datakonser=konserModel::find($id_konser);
         $datakonser->delete();
 
         return redirect()->back();
     }

     //method untuk edit data konser
    public function konseredit($id_konser, Request $request)
    {
        $this->validate($request, [
            'kode_konser' => 'required',
            'judul' => 'required',
            'band' => 'required',
            'kategori' => 'required'
        ]);

        $id_konser = konserModel::find($id_konser);
        $id_konser->kode_konser   = $request->kode_konser;
        $id_konser->judul      = $request->judul;
        $id_konser->band  = $request->band;
        $id_konser->kategori   = $request->kategori;

        $id_konser->save();

        return redirect()->back();
    }
}