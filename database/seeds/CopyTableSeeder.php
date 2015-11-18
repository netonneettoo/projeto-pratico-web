<?php

use Illuminate\Database\Seeder;

class CopyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = \App\Work::where('status', 'active')->get()->toArray();
        $status = array('active', 'inactive');

        for($i = 0; $i < 100; $i++) {
            $copy = new \App\Copy();
            $copy->work_id = $works[array_rand($works)]['id'];
            $copy->number = ($i + 1);
            $copy->status = $status[array_rand($status)];
            $copy->save();
        }
    }
}
