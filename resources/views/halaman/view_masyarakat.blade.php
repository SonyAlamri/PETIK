@extends('index')
@section('title', 'masyarakat')

@section('isihalaman')
    <h3><center>Daftar masyarakat PK | Pemesanan Konser</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalmasyarakatTambah"> 
        Tambah Data masyarakat 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID masyarakat</td>
                <td align="center">nik</td>
                <td align="center">Nama masyarakat</td>
                <td align="center">email</td>
                <td align="center">HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($masyarakat as $index=>$a)
                <tr>
                    <td align="center" scope="row">{{ $index + $masyarakat->firstItem() }}</td>
                    <td>{{$a->id_masyarakat}}</td>
                    <td>{{$a->nik}}</td>
                    <td>{{$a->nama_peserta}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalmasyarakatEdit{{$a->id_masyarakat}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data masyarakat -->
                        <div class="modal fade" id="modalmasyarakatEdit{{$a->id_masyarakat}}" tabindex="-1" role="dialog" aria-labelledby="modalmasyarakatEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalmasyarakatEditLabel">Form Edit Data masyarakat</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formmasyarakatedit" id="formmasyarakatedit" action="/masyarakat/edit/{{ $a->id_masyarakat}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_masyarakat" class="col-sm-4 col-form-label">nik</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan nik">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_peserta" class="col-sm-4 col-form-label">Nama masyarakat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" value="{{ $a->nama_peserta}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">email</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="email" name="email" value="{{ $a->email}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $a->hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="masyarakattambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="masyarakat/hapus/{{$a->id_masyarakat}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $masyarakat->currentPage() }} <br />
    Jumlah Data : {{ $masyarakat->total() }} <br />
    Data Per Halaman : {{ $masyarakat->perPage() }} <br />

    {{ $masyarakat->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data masyarakat -->
    <div class="modal fade" id="modalmasyarakatTambah" tabindex="-1" role="dialog" aria-labelledby="modalmasyarakatTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalmasyarakatTambahLabel">Form Input Data Peserta</h5>
                </div>
                <div class="modal-body">
                    <form name="formmasyarakattambah" id="formmasyarakattambah" action="/masyarakat/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_masyarakat" class="col-sm-4 col-form-label">nama peserta</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan nik">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama_peserta" class="col-sm-4 col-form-label">Nama masyarakat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" placeholder="Masukan Nama masyarakat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="masyarakattambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Masyarakat -->
    
@endsection