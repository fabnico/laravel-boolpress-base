<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
   protected $table = 'categories';

   public function catPost(){
      return $this->hasMany('App\posts', 'category_id', 'id');
   }
}
