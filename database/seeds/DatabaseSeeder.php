<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	   App\Lesson::truncate();
           App\Tag::truncate();
           App\LessonTag::truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call(LessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LessonsTagsTableSeeder::class);
    }
}
