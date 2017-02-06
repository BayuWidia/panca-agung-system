<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
  protected $table = 'berita';

  protected $fillable = [
    'id_kategori', 'id_user', 'flag_headline', 'flag_publish', 'judul_berita', 'tanggal_publish', 'url_foto', 
    'tags', 'isi_berita'
  ];

  public function kategori()
  {
    return $this->belongs_to('App\Models\KategoriBerita', 'id_kategori');
  }

  public function users()
  {
    return $this->belongsTo('App\Models\User', 'id_user');
  }
}
