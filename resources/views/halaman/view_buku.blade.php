@extends('index')
@section('content')
<h3>Daftar Buku Perpustakaan Bersama</h3>

<button id="btnTambahBuku" class="btn btn-success">Tambah Buku</button>

<p>
<table class=" table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">No</td>
            <td align="center">ID Buku</td>
            <td align="center">Kode Buku</td>
            <td align="center">Judul Buku</td>
            <td align="center">Pengarang</td>
            <td align="center">Penerbit</td>
            <td align="center">gambar</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($buku as $index=>$bk)
        <tr>
            <td align="center" scope="row">{{ $index + $buku->firstItem() }}</td>
            <td>{{$bk->id_buku}}</td>
            <td>{{$bk->kode_buku}}</td>
            <td>{{$bk->judul}}</td>
            <td>{{$bk->pengarang}}</td>
            <td>{{$bk->penerbit}}</td>
            <td>
                <img src="{{Storage::url($bk->image)}}" alt="{{ $bk->judul }}" style="max-width: 80px;">
            </td>
            <td align="center">

    <a href="{{ route('buku.edit', $bk->id_buku) }}" class="btn btn-primary btn-sm">Edit</a>


               

                <!-- Akhir Modal EDIT data buku -->
                |
                <a href="buku/hapus/{{$bk->id_buku}}" onclick="return confirm('Yakin mau dihapus?')">
                    <button class="btn btn-danger">
                        Delete
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!--awal pagination-->
Halaman : {{ $buku->currentPage() }} <br />
Jumlah Data : {{ $buku->total() }} <br />
Data Per Halaman : {{ $buku->perPage() }} <br />

{{ $buku->links() }}
<!--akhir pagination-->
<div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog" aria-labelledby="modalBukuTambahLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBukuTambahLabel">Form Input Data Buku</h5>
            </div>
            <div class="modal-body">
                <form action="/buku/tambah " method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <label for="id_buku" class="col-sm-4 col-form-label">Kode Buku</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kode_buku" name="kode_buku"
                                placeholder="Masukan Kode Buku">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="judul" name="judul"
                                placeholder="Masukan Judul Buku">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                placeholder="Masukan Nama Pengarang">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="penerbit" name="penerbit"
                                placeholder="Masukan Penerbit">
                        </div>
                    </div>
                    <p>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-4 col-form-label">Gambar</label>
                        <div class="col-sm-8">
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>
                    </div>

                    <p>
                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="bukutambah" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>@endsection