<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  protected $table = 'galery';

  protected $fillable = [
    'url_gambar', 'keterangan_gambar', 'flag_gambar'
  ];
}
