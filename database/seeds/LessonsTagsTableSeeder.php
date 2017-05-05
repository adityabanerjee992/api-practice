<?php

use Illuminate\Database\Seeder;

class LessonsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\LessonTag', 10)->create();
    }
}
