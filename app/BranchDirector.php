<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class BranchDirector extends Model{
    protected $table = 'branchDirectors';
    
    public function subordinates(){
        return $this->hasMany('App\DepartmentHead','chiefID');
    }
}