<?php


class recordController{
    
    public $model;
    
    function __construct(){
        include(APPROOT."/model/userDetails.php");
        $this->model = new userDetails();
    }
    
    public function view(){
        echo "View record function called";
        
    }
    
    
    
    
}