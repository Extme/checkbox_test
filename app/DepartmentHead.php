<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class DepartmentHead extends Model{
    protected $table = 'departmentHeads';
    
    public function subordinates(){
        return $this->hasMany('App\StaffMember','chiefID');
    }
}

