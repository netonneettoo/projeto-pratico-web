<?php

use Illuminate\Database\Seeder;

class WorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Work::class, 50)->create()->each(function($obj) {
            $obj->save();
        });
    }
}
