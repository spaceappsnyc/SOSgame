<?php

use Illuminate\Database\Seeder;

class characters extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('characters')->delete();
         $json = file_get_contents('database/data/characters.json');
         $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true );
         foreach ((array)$data as $key => $val) {
              DB::table('characters')->insert([
                     'type' =>                           $val["type"],
                     'carry' =>                         $val["carry"],
              ]);
         }
    }
}
