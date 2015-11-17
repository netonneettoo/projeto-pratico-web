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
        $edition = array('First edition', 'Second edition', 'Third edition', 'Fourth edition', 'Fifth edition', 'Sixth edition', 'Seventh edition', 'Eighth edition', 'Ninth edition', 'Tenth edition');
        $status = array('active', 'inactive');
        $publishers = \App\Publisher::getByStatus(\App\Publisher::STATUS_ACTIVE)->get()->toArray();
        $workTypes = \App\WorkType::all()->toArray();

        for($i = 0; $i < 50; $i++) {
            $work = new \App\Work();
            $work->title = 'work name ' . $i;
            $work->publication_year = rand(2000, 2015);
            $work->edition = $edition[array_rand($edition)];
            $work->price = 123.45;
            $work->isbn = '12345678910' . $i;
            $work->publisher_id = $publishers[array_rand($publishers)]['id'];
            $work->work_type_id = $workTypes[array_rand($workTypes)]['id'];
            $work->status = $status[array_rand($status)];
            $work->save();
        }
    }
}
