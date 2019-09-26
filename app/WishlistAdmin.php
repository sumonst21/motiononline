<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistAdmin extends Model
{
   
    protected $fillable = [
     'title',
      'user_group_id', 
      'video_group_id',
      'day',
    ];
    protected $casts=['video_group_id'=> 'array'];

}
