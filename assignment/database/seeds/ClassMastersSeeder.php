<?php

use App\ClassMaster;
use Illuminate\Database\Seeder;

class ClassMastersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 10; $x++) {

            ClassMaster::create([
                'name' => 'Class '.$x,
                'year' => 2010
            ]);

        }

    }
}
