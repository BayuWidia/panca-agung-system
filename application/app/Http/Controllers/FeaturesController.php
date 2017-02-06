<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Features;
use App\Http\Requests;

class FeaturesController extends Controller
{
  public function index()
  {
    $getfeatures = Features::get();
    return view('backend/pages/kelolafeatures')->with('getfeatures', $getfeatures);
  }

  public function store(Request $request)
  {
    // dd($request);
    $file = $request->file('url_features');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        $photo200 = $photo1[0]."_200x122.".$photo1[1];

        Image::make($file)->fit(866,490)->save('images/'. $photo_name);
        Image::make($file)->fit(200,122)->save('images/'. $photo200);

        $set = new Features;
        $set->id_user = Auth::user()->id;
        $set->nama_fitur = $request->nama_features;
        $set->keterangan_fitur = $request->keterangan_features;
        $set->url_fitur = $photo_name;
        $set->flag_fitur = $request->flag_features;
        $set->save();
    } else {
        $set = new Features;
        $set->id_user = Auth::user()->id;
        $set->nama_fitur = $request->nama_features;
        $set->keterangan_fitur = $request->keterangan_features;
        $set->flag_fitur = $request->flag_features;
        $set->save();
    }

    return redirect()->route('features.index')->with('message', 'Berhasil memasukkan features baru.');
  }

  public function publish($id)
  {
    $set = Features::find($id);
    if($set->flag_fitur=="1") {
      $set->flag_fitur = 0;
      $set->save();
    } elseif ($set->flag_fitur=="0") {
      $set->flag_fitur = 1;
      $set->save();
    }

    return redirect()->route('features.index')->with('message', 'Berhasil mengubah status features.');
  }

  public function bind($id)
  {
    $get = Features::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    $file = $request->file('url_features');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();
      // Image::make($file)->fit(572,350)->save('images/'. $photo_name);
      $photo1 = explode('.', $photo_name);
      $photo200 = $photo1[0]."_200x122.".$photo1[1];

      Image::make($file)->fit(866,490)->save('images/'. $photo_name);
      Image::make($file)->fit(200,122)->save('images/'. $photo200);

      $set = Features::find($request->id);
      $set->nama_fitur = $request->nama_features;
      $set->keterangan_fitur = $request->keterangan_features;
      $set->url_fitur = $photo_name;
      $set->flag_fitur = $request->flag_features;
      $set->save();
    } else {
      $set = Features::find($request->id);
      $set->nama_fitur = $request->nama_features;
      $set->keterangan_fitur = $request->keterangan_features;
      $set->flag_fitur = $request->flag_features;
      $set->save();
    }

    return redirect()->route('features.index')->with('message', 'Berhasil mengubah konten features.');
  }
  public function delete($id)
  {
    $set = Features::find($id);
    $set->delete();

    return redirect()->route('features.index')->with('message', 'Berhasil menghapus features.');
  }
}
