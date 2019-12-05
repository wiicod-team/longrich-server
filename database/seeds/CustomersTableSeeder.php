<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        factory(\App\Customer::class,10)->create();
        $path =base_path("database/seeds/json/customers.json");
        $items = json_decode(file_get_contents($path),true);
        foreach ($items as $item){
            $u = $item['user'];
            $u= \App\User::where('email','=',$u)->first();
            if($u){
                $item['user_id'] = $u->id;
                unset($item['user']);
                \App\Customer::create($item);
            }
        }
    }
}
