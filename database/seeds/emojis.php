<?php

use Illuminate\Database\Seeder;

class emojis extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            DB::table('emojis')->delete();
            $json = file_get_contents('database/data/emojis.json');
            $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true );
            foreach ((array)$data as $key => $val) {
                  DB::table('emojis')->insert([
                        'character_id' =>                           $val["character_id"],
                        'code' =>                         $val["code"],
                  ]);
            }
      }
}
