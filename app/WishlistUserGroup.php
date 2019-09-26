<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistUserGroup extends Model
{
   
    protected $fillable = [
     'title',
      'user_id', 
    ];
    protected $casts=['user_id'=> 'array'];

}
