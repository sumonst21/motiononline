<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyProgress extends Model
{	

    protected $fillable = [
      'user_id',
      'weight','fat'
    ];
}
