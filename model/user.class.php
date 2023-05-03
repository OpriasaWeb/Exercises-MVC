<?php


//require_once 'connection.class.php';
require_once(APPROOT."/model/lcl_db.class.php");

// Account
class User{

    public $localModel;

    public function __construct(){     
//        Local connection object
        $this->localModel = new local_connection();
    }
    
// ----------------------------------------------------- // 
//    Insert user account - full name and status to tutorial.account table
    public function insertUser($fullname, $status){
        try{
            $query = "INSERT INTO tutorial.account (name, status) VALUES ('$fullname', '$status')";
            $stmt = $this->localModel->executeQuery($query);
            return $stmt;
        } catch (PDOException $e) {
            throw $e;
        }
    }
// ----------------------------------------------------- // 
    
// ----------------------------------------------------- // 
    
//    Insert account details - account_id, address, and gender to tutorial.accountdetails table
    public function insertUserDetails($account_id, $full_address, $gender){
        try{
            $query = "INSERT INTO tutorial.accountdetails (account_id, address, gender) VALUES ('$account_id', '$full_address', '$gender')";
            $stmt = $this->localModel->executeQuery($query);
            return $stmt;
            
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
// ----------------------------------------------------- // 
    
//    Select all info from both tables (account and accountdetails) using join clause in sql query
    public function showall(){
        try{
            $query = "SELECT a.name, ad.address, a.status FROM tutorial.account a LEFT JOIN tutorial.accountdetails ad ON a.id = ad.account_id";
//        echo $query;
            return $this->localModel->getData($query);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
// ----------------------------------------------------- // 
    
//    Update query
//    
//    Update query
    
    
//    Delete query
    
//    Delete query
    
}

?>