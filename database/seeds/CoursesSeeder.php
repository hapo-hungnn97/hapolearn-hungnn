<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
                    'HTML/CSS/js Tutorial', 
                    'LARAVEL Tutorial', 
                    'PHP Tutorial', 
                    'CSS Tutorial', 
                    'Ruby on rails Tutorial', 
                    'Java Tutorial', 
                    'SQL Fundamentals', 
                    'Angular + NestJS'
                ];
        $desc = 'I knew hardly anything about HTML, JS, and CSS before entering New Media.
                I had coded quite a bit, but never touched anything in regards to web development.';
        for ($i = 0; $i < sizeof($name); $i++) {
            $course = new Course;
            $course->name = $name[$i];
            $course->description = $desc;
            $course->teacher_id = $i;
            $course->save();
        }
    }
}
