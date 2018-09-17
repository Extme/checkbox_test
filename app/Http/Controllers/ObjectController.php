<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegionalManager;
use App\Head;
use App\BranchDirector;
use App\DepartmentHead;
use App\StaffMember;
use Datatables;

class ObjectController extends Controller {

    public function index() {

        return view('object.employeeTable');
        
    }
    
    public function showTree() {
        
        $head = Head::All();
        $regionalManagers = RegionalManager::All();
        $branchDirectors = BranchDirector::All();
        $departmentHeads = DepartmentHead::All();
        $staffMembers = StaffMember::All();
        return view('object.tree', ['head' => $head,
            'regionalManagers' => $regionalManagers,
            'branchDirectors' => $branchDirectors,
            'departmentHeads' => $departmentHeads,
            'staffMembers' => $staffMembers]);
        
    }

    public function getHead() {
        
        
        $employees = Head::select('id','fio','position','employment_date','salary');
        
        return Datatables::of($employees)->make(true);
    }
    
    public function showSubordinates(){
         
         $id = $_POST['id'];
         $position = $_POST['position'];
       
         if ($position == 'head of company'){
             $temp = Head::find($id);
             $regionalManagers = $temp->subordinates();
        
             return Datatables::of($regionalManagers)->make(true);
         }
         
         elseif ($position == 'regional manager'){
             $temp = RegionalManager::find($id);
             $branchDirectors = $temp->subordinates();
        
             return Datatables::of($branchDirectors)->make(true);
         }
         
         elseif ($position == 'branch director'){
             $temp = BranchDirector::find($id);
             $departmentHeads = $temp->subordinates();
        
             return Datatables::of($departmentHeads)->make(true);
         }
         
         elseif ($position == 'department head'){
             $temp = DepartmentHead::find($id);
             $staffMembers = $temp->subordinates();
        
             return Datatables::of($staffMembers)->make(true);
         }
         
         else return null;
         
     }
     
    
    
     public function edit() {
          return null;
     }
     
     public function destroy(){
          return null;
     }
     
     

}
