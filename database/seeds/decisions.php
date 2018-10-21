<?php

use Illuminate\Database\Seeder;

class decisions extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            DB::table('decisions')->delete();
            $json = file_get_contents('database/data/actions.json');
            $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true );
            foreach ((array)$data as $key => $val) {
                  DB::table('decisions')->insert([
                        'description' =>                         $val["description"]
                  ]);
            }
      }
}
