<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
   protected $table = 'posts';

   public function postCat(){
      return $this->belongsTo('App\categories', 'category_id');
   }
   public function postPostInfo(){
      return $this->hasOne('App\posts_info', 'post_id');
   }
}
