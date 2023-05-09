<?php

// Account
class home{

    public $localModel;

    public function __construct(){     
//        Local connection object
        require_once(APPROOT."/config/config.php");
        $this->localModel = new PDO(DSN, DBUSER, DBPASS);
        // $this->localModel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($this->localModel->errorCode()){
            die("Something went wrong connecting to local database.");
        } else{
            echo "Connected from local database.";
        }
    }
    
// ----------------------------------------------------- // 

// ----------------------------------------------------- // 
    
//    Select all info from both tables (account and accountdetails) using join clause in sql query
    public function showall(){
        try{
            $query = "SELECT a.id, a.name, ad.address, a.status FROM tutorial.account a LEFT JOIN tutorial.accountdetails ad ON a.id = ad.account_id";
            $statement = $this->localModel->query($query);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
// ----------------------------------------------------- // 
    
//    Update query - NOTE: Kindly disregard this lines of code
    public function selectAccount($id){
        try{
            $query = "SELECT name, status FROM tutorial.account WHERE id = $id";
            $statement = $this->localModel->query($query);
            $statement->execute();
            return $statement;
        }catch(PDOException $e){
            throw $e;
        }
    }

    public function selectAccountDetails($id){
        try{
            $query = "SELECT address FROM tutorial.accountdetails WHERE account_id = $id";
            $statement = $this->localModel->query($query);
            $statement->execute();
            return $statement;
        }catch(PDOException $e){
            throw $e;
        }
    }
//    Update query - NOTE: Kindly disregard this lines of code
    
    
//    Delete query
    
//    Delete query
    
}

?>