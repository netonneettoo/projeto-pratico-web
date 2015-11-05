<?php

use Illuminate\Database\Seeder;

class WorkTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WorkType::class, 10)->create()->each(function($obj) {
            $obj->save();
        });
    }
}
