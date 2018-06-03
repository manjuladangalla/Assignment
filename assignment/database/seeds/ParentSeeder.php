<?php

use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Parents::class, 100)->create();
    }
}
