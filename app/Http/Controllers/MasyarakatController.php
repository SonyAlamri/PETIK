<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BukuModel
use App\Models\masyarakatModel;

class masyarakatController extends Controller
{
    //method untuk tampil data masyarakat
    public function masyarakattampil()
    {
        $datamasyarakat = masyarakatModel::orderby('id_masyarakat', 'ASC')
        ->paginate(5);

        return view('halaman/view_masyarakat',['masyarakat'=>$datamasyarakat]);
    }

    //method untuk tambah data masyarakat
    public function masyarakattambah(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama_peserta' => 'required',
            'email' => 'required',
            'hp' => 'required'
        ]);

        masyarakatModel::create([
            'nik' => $request->nik,
            'nama_peserta' => $request->nama_peserta,
            'email' => $request->email,
            'hp' => $request->hp
        ]);

        return redirect('/masyarakat');
    }

     //method untuk hapus data masyarakat
     public function masyarakathapus($id_masyarakat)
     {
         $datamasyarakat=masyarakatModel::find($id_masyarakat);
         $datamasyarakat->delete();
 
         return redirect()->back();
     }

     //method untuk edit data masyarakat
    public function masyarakatedit($id_masyarakat, Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama_peserta' => 'required',
            'email' => 'required',
            'hp' => 'required'
        ]);

        $id_masyarakat = masyarakatModel::find($id_masyarakat);
        $id_masyarakat->nik   = $request->nik;
        $id_masyarakat->nama_peserta      = $request->nama_peserta;
        $id_masyarakat->email  = $request->email;
        $id_masyarakat->hp   = $request->hp;

        $id_masyarakat->save();

        return redirect()->back();
    }
}