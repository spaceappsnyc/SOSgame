<?php

use Illuminate\Database\Seeder;

class disaster_decision extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('decision_disaster')->delete();
        $json = file_get_contents('database/data/disaster_action.json');
        $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json), true );
        foreach ((array)$data as $key => $val) {
             DB::table('decision_disaster')->insert([
                    'disaster_id' =>                         $val["disaster_id"],
                    'decision_id' =>                         $val["action_id"],
                    'stay_go' =>                         $val["stayorgo"]
             ]);
        }
    }
}
