<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts_info extends Model
{
   protected $table = 'posts_information';

   public function postInfoPost(){
      return $this->belongsTo('App\posts','post_id','id');
   }
}
