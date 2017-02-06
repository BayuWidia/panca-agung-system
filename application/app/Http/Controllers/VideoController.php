<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Video;
use App\Http\Requests;
use Illuminate\Http\Request;

class VideoController extends Controller
{
  public function index()
  {
    $getvideo = Video::get();
    return view('backend/pages/kelolavideo')->with('getvideo', $getvideo);
  }

  public function store(Request $request)
  {
      $set = new Video;
      $set->id_user = Auth::user()->id;
      $set->url_video = $request->url_video;
      $set->judul_video = $request->judul_video;
      $set->flag_video = $request->flag_video;
      $set->save();

    return redirect()->route('video.index')->with('message', 'Berhasil memasukkan video baru.');
  }

  public function edit(Request $request)
  {
      $set = Video::find($request->id);
      $set->url_video = $request->url_video;
      $set->judul_video = $request->judul_video;
      $set->flag_video = $request->flag_video;
      $set->save();

    return redirect()->route('video.index')->with('message', 'Berhasil mengubah konten video.');
  }

  public function bind($id)
  {
    $get = Video::find($id);
    return $get;
  }

  public function delete($id)
  {
    $set = Video::find($id);
    $set->delete();

    return redirect()->route('video.index')->with('message', 'Berhasil menghapus data video.');
  }

  public function publish($id)
  {
    $set = Video::find($id);
    if($set->flag_video=="1") {
      $set->flag_video = 0;
      $set->save();
    } elseif ($set->flag_video=="0") {
      $set->flag_video = 1;
      $set->save();
    }

    return redirect()->route('video.index')->with('message', 'Berhasil mengubah status video.');
  }
}
