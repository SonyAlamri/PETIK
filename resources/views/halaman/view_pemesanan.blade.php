@extends('index')
@section('title', 'pemesanan')

@section('isihalaman')
    <h3><center>Data pemesanan konser</center><h3>
    <h3><center>PK | Pemesanan Konser</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpemesananTambah"> 
        Tambah Data pemesanan 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID pemesanan</td>
                <td align="center">Nama Petugas</td>
                <td align="center">Nama masyarakat</td>
                <td align="center">Judul konser</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pemesanan as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $pemesanan->firstItem() }}</td>
                    <td align="center">{{$p->id_pemesanan}}</td>
                    <td>{{$p->petugas->nama_petugas}}</td>
                    <td>{{$p->masyarakat->nama_peserta}}</td>
                    <td>{{$p->konser->judul}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalpemesananEdit{{$p->id_pemesanan}}"> 
                            Edit
                        </button>

                        <!-- Awal Modal EDIT data pemesanan -->
                        <div class="modal fade" id="modalpemesananEdit{{$p->id_pemesanan}}" tabindex="-1" role="dialog" aria-labelledby="modalpemesananEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalpemesananEditLabel">Form Edit Data pemesanan</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpemesananedit" id="formpemesananedit" action="/pemesanan/edit/{{ $p->id_pemesanan}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pemesanan" class="col-sm-4 col-form-label">ID pemesanan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" value="{{ $p->id_pemesanan}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_petugas" name="id_petugas">
                                                        @foreach ($petugas as $pt)
                                                            @if ($pt->id_petugas == $p->id_petugas)
                                                                <option value="{{ $pt->id_petugas }}" selected>{{ $pt->nama_petugas }}</option>
                                                            @else
                                                                <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="masyarakat" class="col-sm-4 col-form-label">Nama masyarakat</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_masyarakat" name="id_masyarakat">
                                                        @foreach ($masyarakat as $a)
                                                            @if ($a->id_masyarakat == $p->id_masyarakat)
                                                                <option value="{{ $a->id_masyarakat }}" selected>{{ $a->nama_peserta }}</option>
                                                            @else
                                                                <option value="{{ $a->id_masyarakat }}">{{ $a->nama_peserta }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul konser</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_konser" name="id_konser">
                                                        @foreach ($konser as $bk)
                                                            @if ($bk->id_konser == $p->id_konser)
                                                                <option value="{{ $bk->id_konser }}" selected>{{ $bk->judul }}</option>
                                                            @else
                                                                <option value="{{ $bk->id_konser }}">{{ $bk->judul }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pemesanantambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data pemesanan -->
                        |
                        <a href="pemesanan/hapus/{{$p->id_pemesanan}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $pemesanan->currentPage() }} <br />
    Jumlah Data : {{ $pemesanan->total() }} <br />
    Data Per Halaman : {{ $pemesanan->perPage() }} <br />

    {{ $pemesanan->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data pemesanan -->
    <div class="modal fade" id="modalpemesananTambah" tabindex="-1" role="dialog" aria-labelledby="modalpemesananTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalpemesananTambahLabel">Form Input Data pemesanan</h5>
                </div>
                <div class="modal-body">

                    <form name="formpemesanantambah" id="formpemesanantambah" action="/pemesanan/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_petugas" name="id_petugas" placeholder="Pilih Nama Petugas">
                                    <option></option>
                                    @foreach($petugas as $pt)
                                        <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_masyarakat" class="col-sm-4 col-form-label">Nama masyarakat</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_masyarakat" name="id_masyarakat" placeholder="Pilih Nama masyarakat">
                                    <option></option>
                                    @foreach($masyarakat as $a)
                                        <option value="{{ $a->id_masyarakat }}">{{ $a->nama_peserta }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_konser" class="col-sm-4 col-form-label">Judul konser</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_konser" name="id_konser" placeholder="Pilih Judul konser">
                                    <option></option>
                                    @foreach($konser as $bk)
                                        <option value="{{ $bk->id_konser }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pemesanantambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data pemesanan -->
    
@endsection