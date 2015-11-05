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
        factory(App\Publisher::class, 10)->create()->each(function($obj) {
            $obj->save();
        });
    }
}
