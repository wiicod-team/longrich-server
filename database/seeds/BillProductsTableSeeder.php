<?php

use Illuminate\Database\Seeder;

class BillProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Helpers\FactoryHelper::force_seed(\App\BillProduct::class,160);
    }
}
