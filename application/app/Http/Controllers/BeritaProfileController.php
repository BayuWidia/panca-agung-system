<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaProfileController extends Controller
{
  public function lihat()
  {

    if (Auth::user()->level=="1") {
      $getinfoutama = Berita::join('kategori_berita', 'berita.id_kategori', '=', 'kategori_berita.id')
        ->where([
          ['kategori_berita.flag_utama', 0]
        ])->select('*', 'berita.id as id_berita', 'berita.created_at as tanggal_posting')->get();
    } else {
      $getinfoutama = Berita::join('kategori_berita', 'berita.id_kategori', '=', 'kategori_berita.id')
          ->where([
            ['berita.id_user', Auth::user()->id],
            ['kategori_berita.flag_utama', 0]
          ])->select('*', 'berita.id as id_berita', 'berita.created_at as tanggal_posting')->get();
    }

    return view('backend/pages/lihatprofile')->with('getinfoutama', $getinfoutama);
  }

  public function tambah()
  {
    // if (Auth::user()->level=="1") {
    //   $getkategori = KategoriBerita::where('flag_utama', 0)->paginate(10);
    // } else {
    //   $getkategori = KategoriBerita::where('id_user', Auth::user()->id)->where('flag_utama', 0)->paginate(10);
    // }
    $getkategori = KategoriBerita::where('flag_utama', 0)->where('flag_kategori', 1)->get();

    return view('backend/pages/tambahprofile')->with('getkategori', $getkategori);
  }

  public function store(Request $request)
  {
    // dd($request);
    $set = new Berita;
    $set->id_kategori = $request->id_kategori;
    $set->isi_berita = $request->isi_berita;
    $set->flag_publish = 0;
    $set->id_user = Auth::user()->id;
    $set->save();

    return redirect()->route('profile.tambah')->with('message', 'Berhasil memasukkan konten profile.');
  }

  public function flagpublish($id)
  {
    $set = Berita::find($id);
    if($set->flag_publish=="1") {
      $set->flag_publish = 0;
      $set->save();
    } elseif ($set->flag_publish=="0") {
      $set->flag_publish = 1;
      $set->save();
    }

    return redirect()->route('profile.lihat')->with('message', 'Berhasil mengubah status publikasi.');
  }

  public function edit($id)
  {
    $editinfo = Berita::find($id);

    // if (Auth::user()->level=="1") {
    //   $getkategori = KategoriBerita::where([['id_skpd', null], ['flag_utama', 1]])->paginate(10);
    // } else {
    //   $getkategori = KategoriBerita::where([['id_skpd', Auth::user()->masterskpd->id], ['flag_utama', 1]])->paginate(10);
    // }
    $getkategori = KategoriBerita::where('flag_utama', 0)->where('flag_kategori', 1)->get();

    return view('backend/pages/tambahprofile', compact('editinfo', 'getkategori'));
  }

  public function update(Request $request, $id)
  {

    $set = Berita::find($id);
    $set->id_kategori = $request->id_kategori;
    $set->isi_berita = $request->isi_berita;
    $set->save();

    return redirect()->route('profile.lihat')->with('message', 'Berhasil mengubah konten informasi utama.');
  }

  public function delete($id)
  {
    $set = Berita::find($id);
    $set->delete();

    return redirect()->route('profile.lihat')->with('message', 'Berhasil menghapus konten informasi utama.');
  }
}
