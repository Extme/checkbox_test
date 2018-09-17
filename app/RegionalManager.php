<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class RegionalManager extends Model{
    protected $table = 'regionalManagers';
    
    public function subordinates(){
        return $this->hasMany('App\BranchDirector','chiefID');
    }
}
