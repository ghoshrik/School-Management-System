<?php

namespace App\Models\StudentModel;

use App\Models\SetupModel\Year;
use App\Models\SetupModel\ClassMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(StudentRegistration::class,'reg_id','id');
    }
    public function class_name(){
        return $this->belongsTo(ClassMaster::class,'class_id','class_id');
    }
    public function year(){
        return $this->belongsTo(Year::class,'year_id','year_id');
    }
}
