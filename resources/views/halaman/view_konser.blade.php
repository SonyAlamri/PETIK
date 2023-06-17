@extends('index')
@section('title', 'konser')

@section('isihalaman')
    <h3><center>Daftar konser | PK</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalkonserTambah"> 
        Tambah Data konser 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID konser</td>
                <td align="center">Kode konser</td>
                <td align="center">Judul konser</td>
                <td align="center">band</td>
                <td align="center">Kategori</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($konser as $index=>$tk)
                <tr>
                    <td align="center" scope="row">{{ $index + $konser->firstItem() }}</td>
                    <td>{{$tk->id_konser}}</td>
                    <td>{{$tk->kode_konser}}</td>
                    <td>{{$tk->judul}}</td>
                    <td>{{$tk->band}}</td>
                    <td>{{$tk->kategori}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalkonserEdit{{$tk->id_konser}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data konser -->
                        <div class="modal fade" id="modalkonserEdit{{$tk->id_konser}}" tabindex="-1" role="dialog" aria-labelledby="modalkonserEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalkonserEditLabel">Form Edit Data konser</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formkonseredit" id="formkonseredit" action="/konser/edit/{{ $tk->id_konser}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_konser" class="col-sm-4 col-form-label">Kode konser</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kode_konser" name="kode_konser" placeholder="Masukan Kode konser">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul konser</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $tk->judul}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="band" class="col-sm-4 col-form-label">Nama band</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="band" name="band" value="{{ $tk->band}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $tk->kategori}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="konsertambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data konser -->
                        |
                        <a href="konser/hapus/{{$tk->id_konser}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $konser->currentPage() }} <br />
    Jumlah Data : {{ $konser->total() }} <br />
    Data Per Halaman : {{ $konser->perPage() }} <br />

    {{ $konser->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data konser -->
    <div class="modal fade" id="modalkonserTambah" tabindex="-1" role="dialog" aria-labelledby="modalkonserTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalkonserTambahLabel">Form Input Data konser</h5>
                </div>
                <div class="modal-body">
                    <form name="formkonsertambah" id="formkonsertambah" action="/konser/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_konser" class="col-sm-4 col-form-label">Kode konser</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_konser" name="kode_konser" placeholder="Masukan Kode konser">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-4 col-form-label">Judul konser</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul konser">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="band" class="col-sm-4 col-form-label">Nama band</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="band" name="band" placeholder="Masukan Nama band">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukan Kategori">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="konsertambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data konser -->
    
@endsection