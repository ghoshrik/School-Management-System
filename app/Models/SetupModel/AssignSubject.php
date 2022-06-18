<?php

namespace App\Models\SetupModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;
    public function class_name(){
        return $this->belongsTo(ClassMaster::class,'class_id','class_id');
    }
    public function subject_name(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
