<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends BaseModel
{
      protected $table = 'votes';
      
      public function user() {
          return $this->belongsTo('App\User');
      }
      public function posts() {
          return $this->belongsTo('App\Post');
      }
}
