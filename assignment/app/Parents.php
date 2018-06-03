<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    public function students(){
        return $this->belongsToMany(Student::class,'student_parents','parent_id','student_id');
    }
}
