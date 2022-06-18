<?php

namespace App\Models\SetupModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmmount extends Model
{
    public function fee_catagory(){
        return $this->belongsTo(Fee::class,'fee_cat_id','id');
    }
    public function class_name(){
        return $this->belongsTo(ClassMaster::class,'class_id','class_id');
    }
}
