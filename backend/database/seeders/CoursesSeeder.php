<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

use File;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1 truncar la tabla boorcamps
        //hBootcamp::truncate();
        //2. leer el archivo bootcamps.json
        $json = File::get("database/_data/courses.json");
        //2.1 convertir el contenido json a array
        $arreglo_courses = json_decode($json);
        //3. recorrer ese archivo y por cada bootcamp
        foreach($arreglo_courses as $course){
            //4. crear un bootcamp por cada uno
            $b = new Course();
            $b->title = $course->title;
            $b->description = $course->description;
            $b->weeks = $course->weeks;
            $b->enroll_cost = $course->enroll_cost;
            $b->minimum_skill = $course->minimum_skill;
            $b->bootcamps_id = 2;
            $b->save();
        }
    }
}
