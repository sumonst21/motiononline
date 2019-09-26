<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseReport extends Model
{

    protected $fillable = [
      'user_id','exercise_id','value'
     
    ];
}
