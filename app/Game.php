<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

      public $incrementing = false;

      /**
      * Sets the UUID value for the primary key field.
      */
      protected function setUUID()
      {
            $this->id = preg_replace('/\./', '', uniqid('bpm', true));
      }

      public function characters()
      {
            return $this->BelongsToMany('App\Character');
      }

      public function disaster()
      {
            return $this->belongsTo('App\Disaster');
      }

}
