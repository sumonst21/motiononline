<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistVideoGroup extends Model
{
   
    protected $fillable = [
     'title',
      'movie_id',
      'tv_id', 
    ];
    protected $casts=['movie_id'=> 'array','tv_id'=> 'array'];
    

}
