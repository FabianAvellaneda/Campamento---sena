<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bootcamp;
use File;

class BootcampSeeder extends Seeder
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
        $json = File::get("database/_data/bootcamps.json");
        //2.1 convertir el contenido json a array
        $arreglo_bootcamps = json_decode($json);
        //3. recorrer ese archivo y por cada bootcamp
        foreach($arreglo_bootcamps as $bootcamp){
            //4. crear un bootcamp por cada uno
            $b = new Bootcamp();
            $b->name = $bootcamp->name;
            $b->description = $bootcamp->description;
            $b->website = $bootcamp->website;
            $b->phone = $bootcamp->phone;
            $b->average_rating = $bootcamp->average_rating;
            $b->average_cost = $bootcamp->average_cost;
            $b->user_id = 1;
            $b->save();
        }
    }
}
