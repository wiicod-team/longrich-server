<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        factory(\App\User::class,5)->create();
        $path =base_path("database/seeds/json/users.json");
        $items = json_decode(file_get_contents($path),true);
        foreach ($items as $item){
            $item['password']= bcrypt($item['password']);
            \App\User::create($item);
        }
    }
}
