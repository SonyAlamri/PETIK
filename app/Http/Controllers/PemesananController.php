<?php

namespace App\Http\Controllers;

// use App\Models\Model;
// use App\Models\Model;
use Illuminate\Http\Request;

//memanggil model pemesananModel
use App\Models\pemesananModel;

//memanggil model PetugasModel
use App\Models\PetugasModel;

//memanggil model Model
use App\Models\MasyarakatModel;

//memanggil model Model
use App\Models\KonserModel;

class pemesananController extends Controller
{
    //method untuk tampil data pemesanan
    public function pemesanantampil()
    {
        $datapemesanan = pemesananModel::orderby('id_pemesanan', 'ASC')
        ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $datamasyarakat      = MasyarakatModel::all();
        $datakonser       = KonserModel::all();

        return view('halaman/view_pemesanan',['pemesanan'=>$datapemesanan,'petugas'=>$datapetugas,'masyarakat'=>$datamasyarakat,'konser'=>$datakonser]);
    }

    //method untuk tambah data pemesanan
    public function pemesanantambah(Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_masyarakat' => 'required',
            'id_konser' => 'required'
        ]);

        pemesananModel::create([
            'id_petugas' => $request->id_petugas,
            'id_masyarakat' => $request->id_masyarakat,
            'id_konser' => $request->id_konser
        ]);
        return redirect('/pemesanan');
    }

    //method untuk hapus data pemesanan
    public function pemesananhapus($id_pemesanan)
    {
        $datapemesanan=pemesananModel::find($id_pemesanan);
        $datapemesanan->delete();

        return redirect()->back();
    }

    //method untuk edit data pemesanan
    public function pemesananedit($id_pemesanan, Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_masyarakat' => 'required',
            'id_konser' => 'required'
        ]);

        $id_pemesanan = pemesananModel::find($id_pemesanan);
        $id_pemesanan->id_petugas    = $request->id_petugas;
        $id_pemesanan->id_masyarakat      = $request->id_masyarakat;
        $id_pemesanan->id_konser      = $request->id_konser;

        $id_pemesanan->save();

        return redirect()->back();
    }
}