<?php

use Illuminate\Database\Seeder;

class TownsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        factory(\App\Town::class,10)->create();
        $path =base_path("database/seeds/json/towns.json");
        $items = json_decode(file_get_contents($path),true);
        foreach ($items as $item){
            \App\Town::create($item);

        }
    }
}
