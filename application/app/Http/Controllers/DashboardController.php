<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Client;
use DB;

class DashboardController extends Controller
{

  public function index()
  {
    if (Auth::user()->level=="1") {
      $users = DB::table('users')
                        ->select('*')
                        ->orderby('users.created_at', 'desc')
                        ->paginate(8);

      $countberita = Berita::all()->count();
      $countkategori = KategoriBerita::all()->count();
      $countsudahterdaftar = User::where('activated', 1)->count();
      $countpengaduanbelumpublish = Berita::where('flag_publish', 0)->count();
    } else {
      $users = DB::table('users')
                        ->select('*')
                        ->orderby('users.created_at', 'desc')
                        ->paginate(8);

      $countberita = Berita::where('id_user', Auth::user()->id)->count();
      $countkategori = KategoriBerita::all()->count();
      $countsudahterdaftar = User::where('activated', 1)->count();
      $countpengaduanbelumpublish = Berita::where('flag_publish', 0)->where('id_user', Auth::user()->id)->count();
    }

    $getclient = DB::table('client')->select('*')->orderby('client.created_at', 'desc')->limit(5)->get();

    return view('backend/pages/dashboard')
      ->with('countberita', $countberita)
      ->with('countkategori', $countkategori)
      ->with('countsudahterdaftar', $countsudahterdaftar)
      ->with('countpengaduanbelumpublish', $countpengaduanbelumpublish)
      ->with('getclient',$getclient)
      ->with('users', $users);
  }
}
