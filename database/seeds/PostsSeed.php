<?php

use Illuminate\Database\Seeder;
use App\posts;

class PostsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\posts::class, 200)->create()->each(
      function ($el){
      $el->save();
      }
      );  
    }
}
