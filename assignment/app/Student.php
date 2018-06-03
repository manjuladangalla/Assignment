<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function classMaster(){
        return $this->belongsTo(ClassMaster::class,'class_id','id');
    }

    public function parents(){
        return $this->belongsToMany(Parents::class,'student_parents','student_id','parent_id');
    }
}
