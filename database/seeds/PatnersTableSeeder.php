<?php

use Illuminate\Database\Seeder;

class PatnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Patner::class,10)->create();
    }
}
