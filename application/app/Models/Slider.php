<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
  protected $table = 'slider';

  protected $fillable = [
    'url_slider', 'keterangan_slider', 'flag_slider'
  ];

}
