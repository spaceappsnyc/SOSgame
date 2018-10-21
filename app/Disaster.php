<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    public function decisions()
    {
          return $this->belongsToMany('App\Decision')->withPivot('stay_go');
   }
}
