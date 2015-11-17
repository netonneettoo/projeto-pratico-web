<?php

use Illuminate\Database\Seeder;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array('active', 'inactive');

        for($i = 0; $i < 10; $i++) {
            $publisher = new \App\Publisher();
            $publisher->name = 'publisher-' . $i;
            $publisher->status = $status[array_rand($status)];
            $publisher->save();
        }
    }
}
