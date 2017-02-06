<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $table = 'client';

  protected $fillable = [
    'nama_client', 'keterangan_client', 'url_client', 'logo_client', 'tags', 'link_client', 'flag_client'
  ];

}
