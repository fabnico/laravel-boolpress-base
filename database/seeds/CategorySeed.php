<?php

use Illuminate\Database\Seeder;
use App\categories;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\categories::class, 30)->create()->each(
      function ($el){
      $el->save();
      }
      );
    }
}
