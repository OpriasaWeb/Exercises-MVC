<?php

//include 'connection.class.php';
require_once(APPROOT."/model/connection.class.php");


class userDetails extends pwc_db{
    public $account_id;
    public $address;
    public $gender;
    public $model;
    
    public function __construct(){
        $this->model = new pwc_db();
    }
    
    public function selectRecord($account_id, $address, $gender){
        
    }
    
    
    
}



?>