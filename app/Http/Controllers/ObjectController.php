<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\CheckBox;

class ObjectController extends Controller {

    public function index() {
        
        $boxes = CheckBox::All();
        return view('object.home', ['boxes' => $boxes]);
        
    }
    
    public function insert() {
        
      $row = $_POST['row'];
      $column = $_POST['column'];
              
      //CheckBox::insert(array('checkbox_row' => $row, 'checkbox_col' => $column));
      CheckBox::where([['checkbox_row', $row], ['checkbox_col' , $column]])->update(['check' => true]);
        
    }
    
    public function delete() {
        
      $row = $_POST['row'];
      $column = $_POST['column'];
        
      CheckBox::where([['checkbox_row', $row], ['checkbox_col' , $column]])->update(['check' => false]);
        
    }
    
    public function selectRow() {
        
        $row = $_POST['row'];
        CheckBox::where([['checkbox_row' , $row]])->update(['check' => true]);
        
    }
    
    public function selectColumn(){
        
        $column = $_POST['column'];
        CheckBox::where([['checkbox_col' , $column]])->update(['check' => true]);
    }
    
    public function selectAll(){
        
       CheckBox::query()->update(['check' => true]);
       
    }
    
    public function deSelectRow() {
        
        $row = $_POST['row'];
        CheckBox::where([['checkbox_row' , $row]])->update(['check' => false]);
        
    }
    
    public function deSelectColumn(){
        
        $column = $_POST['column'];
        CheckBox::where([['checkbox_col' , $column]])->update(['check' => false]);
        
    }
    
    public function deSelectAll(){
        CheckBox::query()->update(['check' => false]);
    }
     

}
