<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Http\Requests;
use App\Models\Gallery;

class GalleryController extends Controller
{
  public function index()
  {
    $getgaleri = Gallery::get();

    return view('backend/pages/kelolagaleri')->with('getgaleri', $getgaleri);
  }

  public function store(Request $request)
  {
    // dd($request);
    $file = $request->file('url_gambar');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        // $photo40 = $photo1[0]."_40x40.".$photo1[1];
        $photo200 = $photo1[0]."_200x122.".$photo1[1];

        Image::make($file)->fit(810,426)->save('images/'. $photo_name);
        // Image::make($file)->fit(40,40)->save('images/'. $photo40);
        Image::make($file)->fit(200,122)->save('images/'. $photo200);

        $set = new Gallery;
        $set->id_user = Auth::user()->id;
        $set->url_gambar = $photo_name;
        $set->keterangan_gambar = $request->keterangan_gambar;
        $set->flag_gambar = $request->flag_gambar;
        $set->save();
    } else {
        $set = new Gallery;
        $set->id_user = Auth::user()->id;
        $set->keterangan_gambar = $request->keterangan_gambar;
        $set->flag_gambar = $request->flag_gambar;
        $set->save();
    }

    return redirect()->route('galeri.index')->with('message', 'Berhasil memasukkan galeri baru.');
  }

  public function publish($id)
  {
    $set = Gallery::find($id);
    if($set->flag_gambar=="1") {
      $set->flag_gambar = 0;
      $set->save();
    } elseif ($set->flag_gambar=="0") {
      $set->flag_gambar = 1;
      $set->save();
    }

    return redirect()->route('galeri.index')->with('message', 'Berhasil mengubah status gambar.');
  }

  public function bind($id)
  {
    $get = Gallery::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    $file = $request->file('url_gambar');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

      $photo1 = explode('.', $photo_name);
      // $photo40 = $photo1[0]."_40x40.".$photo1[1];
      $photo200 = $photo1[0]."_200x122.".$photo1[1];

      Image::make($file)->fit(810,426)->save('images/'. $photo_name);
      // Image::make($file)->fit(40,40)->save('images/'. $photo40);
      Image::make($file)->fit(200,122)->save('images/'. $photo200);

      $set = Gallery::find($request->id);
      $set->url_gambar = $photo_name;
      $set->keterangan_gambar = $request->keterangan_gambar;
      $set->flag_gambar = $request->flag_gambar;
      $set->save();
    } else {
      $set = Gallery::find($request->id);
      $set->keterangan_gambar = $request->keterangan_gambar;
      $set->flag_gambar = $request->flag_gambar;
      $set->save();
    }

    return redirect()->route('galeri.index')->with('message', 'Berhasil mengubah konten galeri.');
  }
  public function delete($id)
  {
    $set = Gallery::find($id);
    $set->delete();

    return redirect()->route('galeri.index')->with('message', 'Berhasil menghapus gambar.');
  }
}
