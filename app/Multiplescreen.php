<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multiplescreen extends Model
{
    public function users(){
    	return $this->hasMany('App\User','id');
    }
}
