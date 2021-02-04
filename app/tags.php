<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
   protected $table = 'tags';

   public function  tagpost(){
      return $this->belongsToMany('App\posts', 'posttag', 'tag_id', 'post_id');
   }
}
