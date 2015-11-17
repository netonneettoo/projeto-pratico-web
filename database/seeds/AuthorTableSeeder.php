<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
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
            $author = new \App\Author();
            $author->name = 'author-' . $i;
            $author->status = $status[array_rand($status)];
            $author->save();
        }
    }
}
