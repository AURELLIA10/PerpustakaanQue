@extends('index')

@section('content')
<center><h1>Edit Buku</h1></center>
        <div class="modal-content">
        <form method="POST" action="{{ route('buku.update', $buku->id_buku) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                    <div class="form-group row">
                                        <label for="id_buku" class="col-sm-4 col-form-label">Kode Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="kode_buku" name="kode_buku"
                                                placeholder="Masukan Kode Buku" value="{{ $buku->kode_buku}}" />
                                        </div>
                                    </div>
                                    <p>
                                    <div class="form-group row">
                                        <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                value="{{ $buku->judul}}">
                                        </div>
                                    </div>
                                    <p>
                                    <div class="form-group row">
                                        <label for="pengarang" class="col-sm-4 col-form-label">Nama Pengarang</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                                value="{{ $buku->pengarang}}">
                                        </div>
                                    </div>
                                    <p>
                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-4 col-form-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="penerbit" name="penerbit"
                                                value="{{ $buku->penerbit}}">
                                        </div>
                                    </div>
                                    <p>
                                    <p>
                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-4 col-form-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input id="image" type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <p>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Edit</button>
                                    </div>
                                </form>
        </div>

@endsection