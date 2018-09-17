<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Head extends Model{
    
    protected $table = 'head';
    
    protected $fillable = [
            'fio', 'position', 'employment_date', 'salary'
    ];
    
    
    

    
    public function subordinates(){
        return $this->hasMany('App\RegionalManager','chiefID');
    }
}

