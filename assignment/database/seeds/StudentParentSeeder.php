<?php

use App\StudentParent;
use Illuminate\Database\Seeder;

class StudentParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = \App\Student::all();
        foreach ($students as $student){
            StudentParent::create([
                'student_id' => $student->id,
                'parent_id' => random_int(1, 100)
            ]);
        }
    }
}
