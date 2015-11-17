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
        for($i = 0; $i < 10; $i++) {
            $workType = new \App\WorkType();
            $workType->description = 'workType' . $i;
            $workType->save();
        }
    }
}
