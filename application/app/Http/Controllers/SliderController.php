<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Slider;
use App\Http\Requests;

class SliderController extends Controller
{
  public function index()
  {
    $getslider = Slider::get();

    return view('backend/pages/kelolaslider')->with('getslider', $getslider);
  }

  public function store(Request $request)
  {
    $file = $request->file('url_slider');
    if($file!="") {
        $photo_name = time(). '.' . $file->getClientOriginalExtension();
        // Image::make($file)->fit(572,350)->save('images/'. $photo_name);

        $photo1 = explode('.', $photo_name);
        $photo300 = $photo1[0]."_300x160.".$photo1[1];
        $photo200 = $photo1[0]."_200x122.".$photo1[1];

        Image::make($file)->fit(866,490)->save('images/'. $photo_name);
        Image::make($file)->fit(300,160)->save('images/'. $photo300);
        Image::make($file)->fit(200,122)->save('images/'. $photo200);

        $set = new Slider;
        $set->id_user = Auth::user()->id;
        $set->url_slider = $photo_name;
        $set->keterangan_slider = $request->keterangan_slider;
        $set->flag_slider = $request->flag_slider;
        $set->save();
     
    } else {
        $set = new Slider;
        $set->id_user = Auth::user()->id;
        $set->keterangan_slider = $request->keterangan_slider;
        $set->flag_slider = $request->flag_slider;
        $set->save();
    }

    return redirect()->route('slider.index')->with('message', 'Berhasil memasukkan slider baru.');
  }

  public function publish($id)
  {
    $set = Slider::find($id);
    if($set->flag_slider=="1") {
      $set->flag_slider = 0;
      $set->save();
    } elseif ($set->flag_slider=="0") {
      $set->flag_slider = 1;
      $set->save();
    }

    return redirect()->route('slider.index')->with('message', 'Berhasil mengubah status slider.');
  }

  public function bind($id)
  {
    $get = Slider::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    $file = $request->file('url_slider');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();
      // Image::make($file)->fit(572,350)->save('images/'. $photo_name);
      $photo1 = explode('.', $photo_name);
      $photo300 = $photo1[0]."_300x160.".$photo1[1];
      $photo200 = $photo1[0]."_200x122.".$photo1[1];

      Image::make($file)->fit(866,490)->save('images/'. $photo_name);
      Image::make($file)->fit(300,160)->save('images/'. $photo300);
      Image::make($file)->fit(200,122)->save('images/'. $photo200);

      $set = Slider::find($request->id);
      $set->url_slider = $photo_name;
      $set->keterangan_slider = $request->keterangan_slider;
      $set->flag_slider = $request->flag_slider;
      $set->save();
    } else {
      $set = Slider::find($request->id);
      $set->keterangan_slider = $request->keterangan_slider;
      $set->flag_slider = $request->flag_slider;
      $set->save();
    }

    return redirect()->route('slider.index')->with('message', 'Berhasil mengubah konten slider.');
  }
  public function delete($id)
  {
    $set = Slider::find($id);
    $set->delete();

    return redirect()->route('slider.index')->with('message', 'Berhasil menghapus slider.');
  }
}
