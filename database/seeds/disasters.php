<?php

use Illuminate\Database\Seeder;

class disasters extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            DB::table('disasters')->delete();
            $json = file_get_contents('database/data/disasters.json');
            $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true );
            foreach ((array)$data as $key => $val) {
                  DB::table('disasters')->insert([
                        'name' =>                           $val["name"],
                        'low_severity' =>                         $val["low_severity"],
                        'medium_severity' =>                         $val["medium_severity"],
                        'high_severity' =>                         $val["high_severity"],
                  ]);
            }
      }
}
