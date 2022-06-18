<?php

namespace App\Models\StudentModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;
    public function assignStudent(){
        //return $this->belongsTo(AssignStudent::class,'id','reg_id');
    }
}
