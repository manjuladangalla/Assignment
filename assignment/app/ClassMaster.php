<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassMaster extends Model
{
    public function students(){
        return $this->hasMany(Student::class,'class_id','id');
    }
}
