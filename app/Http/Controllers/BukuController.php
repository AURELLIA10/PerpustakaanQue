<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


//panggil model BukuModel
use App\Models\BukuModel;

class BukuController extends Controller
{
    //method untuk tampil data buku tanpa login
    public function databuku()
    {
        $databuku = BukuModel::orderby('kode_buku', 'ASC')
        ->paginate(5);

        return view('halaman.databuku',['buku'=>$databuku]);
    }
    //method untuk tampil data buku dengan login
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('kode_buku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku',['buku'=>$databuku]);
    }
    
    //method untuk tambah data buku
    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'image' => 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        BukuModel::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'image' => $path,
        ]);

        return redirect('/buku');
    }

    //method untuk hapus data buku
    public function bukuhapus($id_buku)
    {
        $databuku=BukuModel::find($id_buku);
        $databuku->delete();

        return redirect()->back();
    }

    //method untuk edit data buku
    public function update(Request $request, $id_buku)
    {
        // Validasi data yang diterima
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Cari data buku yang ingin diupdate
        $buku = BukuModel::find($id_buku);
    
        // Update data buku dengan data baru dari request
        $buku->kode_buku = $request->kode_buku;
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
    
        // Cek apakah request memiliki file gambar baru untuk diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            Storage::delete($buku->image);
    
            // Simpan gambar baru ke storage dan dapatkan nama file baru
            $image = $request->file('image')->store('public/');
            $buku->image = $image;
        }
    
        // Simpan perubahan data buku ke database
        $buku->save();
    
        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect('/buku')->with('success', 'Buku berhasil diupdate');
    }
    
    public function edit($id_buku)
    {
    $buku = BukuModel::findOrFail($id_buku);
    return view('halaman.edit', compact('buku'));
    }

    
}