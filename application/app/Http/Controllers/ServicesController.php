<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Services;
use App\Http\Requests;

class ServicesController extends Controller
{
  public function index()
  {
    $getservices = Services::get();

    return view('backend/pages/kelolaservices')->with('getservices', $getservices);
  }

  public function store(Request $request)
  {
    $file = $request->file('url_services');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        $photo200 = $photo1[0]."_200x122.".$photo1[1];

        Image::make($file)->fit(866,490)->save('images/'. $photo_name);
        Image::make($file)->fit(200,122)->save('images/'. $photo200);

        $set = new Services;
        $set->id_user = Auth::user()->id;
        $set->nama_service = $request->nama_services;
        $set->keterangan_service = $request->keterangan_services;
        $set->url_service = $photo_name;
        $set->flag_service = $request->flag_services;
        $set->save();
    } else {
        $set = new Services;
        $set->id_user = Auth::user()->id;
        $set->nama_service = $request->nama_services;
        $set->keterangan_service = $request->keterangan_services;
        $set->flag_service = $request->flag_services;
        $set->save();
    }

    return redirect()->route('services.index')->with('message', 'Berhasil memasukkan services baru.');
  }

  public function publish($id)
  {
    $set = Services::find($id);
    if($set->flag_service=="1") {
      $set->flag_service = 0;
      $set->save();
    } elseif ($set->flag_service=="0") {
      $set->flag_service = 1;
      $set->save();
    }

    return redirect()->route('services.index')->with('message', 'Berhasil mengubah status services.');
  }

  public function bind($id)
  {
    $get = Services::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    $file = $request->file('url_services');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();
      // Image::make($file)->fit(572,350)->save('images/'. $photo_name);
      $photo1 = explode('.', $photo_name);
      $photo200 = $photo1[0]."_200x122.".$photo1[1];

      Image::make($file)->fit(866,490)->save('images/'. $photo_name);
      Image::make($file)->fit(200,122)->save('images/'. $photo200);

      $set = Services::find($request->id);
      $set->nama_service = $request->nama_services;
      $set->keterangan_service = $request->keterangan_services;
      $set->url_service = $photo_name;
      $set->flag_service = $request->flag_services;
      $set->save();
    } else {
      $set = Services::find($request->id);
      $set->nama_service = $request->nama_services;
      $set->keterangan_service = $request->keterangan_services;
      $set->flag_service = $request->flag_services;
      $set->save();
    }

    return redirect()->route('services.index')->with('message', 'Berhasil mengubah konten services.');
  }
  public function delete($id)
  {
    $set = Services::find($id);
    $set->delete();

    return redirect()->route('services.index')->with('message', 'Berhasil menghapus services.');
  }
}
