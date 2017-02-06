<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Requests;
use App\Models\KategoriBerita;
use App\Models\Berita;

class KategoriProfileController extends Controller
{
  public function lihatkategori()
  {
    $getkategori = KategoriBerita::where('flag_utama', 0)->paginate(10);
    return view('backend/pages/kategoriprofile')->with('getkategori', $getkategori);
  }

  public function store(Request $request)
  {
      $set = new KategoriBerita;
      $set->id_user = Auth::user()->id;
      $set->nama_kategori = $request->nama_kategori;
      $set->keterangan_kategori = $request->keterangan_kategori;
      $set->flag_kategori = $request->flag_kategori;
      $set->flag_utama = 0;
      $set->save();

    return redirect()->route('profile.kategori.lihat')->with('message', 'Berhasil memasukkan kategori untuk profile.');
  }

  public function edit(Request $request)
  {
    $set = KategoriBerita::find($request->id);
    $set->nama_kategori = $request->nama_kategori;
    $set->keterangan_kategori = $request->keterangan_kategori;
    $set->save();

    return redirect()->route('profile.kategori.lihat')->with('message', 'Berhasil mengubah data kategori profile.');
  }

  public function changeflag($id)
  {

    $get = KategoriBerita::find($id);
    if($get->flag_kategori=="1") {
      $get->flag_kategori = "0";
    } elseif($get->flag_kategori=="0") {
      $get->flag_kategori = "1";
    }
    $get->save();
    return redirect()->route('profile.kategori.lihat')->with('message', 'Berhasil mengubah status kategori.');

  }

   public function bind($id)
  {
    $get = KategoriBerita::find($id);
    return $get;
  }

  public function delete($id)
  {
    $check = Berita::where('id_kategori', $id)->first();
    if($check=="") {
      $set = KategoriBerita::find($id);
      $set->delete();
      return redirect()->route('profile.kategori.lihat')->with('message', 'Berhasil menghapus data kategori berita.');
    } else {
      return redirect()->route('profile.kategori.lihat')->with('messagefail', 'Gagal melakukan hapus data. Data kategori berita telah memiliki relasi dengan data yang lain.');
    }
  }

}
