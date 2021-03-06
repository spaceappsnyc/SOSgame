<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(items::class);
        $this->call(characters::class);
        $this->call(disasters::class);
        $this->call(emojis::class);
        $this->call(needs::class);
        $this->call(decisions::class);
        $this->call(disaster_decision::class);
    }
}
