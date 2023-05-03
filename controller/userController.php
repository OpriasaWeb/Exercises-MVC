<?php 



//$handler = new handlerController();

class main{
    public $handler;
    
    public function __construct(){
//        include(APPROOT."/model/User.php");
        include(APPROOT.'/controller/handlerController.php');
        $this->handler = new handlerController();
    }
    
    public function insertAccount($fullname, $status){
        $insertAccount = $this->handler->insert($fullname, $status);
        return $insertAccount;
    }
    
    public function insertAccountDetails($account_id, $address, $gender){
        $insertAccountDetails = $this->handler->insertAccDtls($fullname, $status);
        return $insertAccountDetails;
    }
    
}


?>