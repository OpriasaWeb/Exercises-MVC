<?php

/**
 * Description of connection
 *
 * @author jdopriasa
 */

// Database connection
// 1. PDO procedure
// 2. PDO OOP
// 3. 

// NOTE: THIS IS LOCAL DATABASE CONNECTION

class connection {
    //put your code here
    protected $_link;
    
    public function __construct(){
        require_once(APPROOT."/config/config.php");
//        require_once("./config/config.php");
//        Defined name from config database details
        $this->_link = new PDO(DSN,DBUSER,DBPASS);
        if($this->_link->errorCode()){
            die("Something went wrong connecting to local database.");
        } else{
            echo "Connected from local database.";
        }
    }
    
    
//    bind parameter switch case condition
    public function bindParamater($param, $value, $type = null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        
        $bind = $this->_link->bindParam($param, $value, $type);
        if($bind == true){
            echo "Binded to a corresponding data";
        } else{
            echo "Binding to a corresponding data failed, ".$this->_link->errorCode();
        }
        
    }
//    bind parameter switch case condition
    
//    Execute database query 
    public function executeQuery($query){
        $result = $this->_link->query($query);
        if($result == true){
            echo "New row inserted successfully.";
        } else{
            echo "Row not inserted, ".$this->_link->errorCode();
        }
        return $result;
    }
//    Execute database query 
    
//    Fetch all data from local database
    public function fetchAll($pdo_fetchassoc){
        $this->_link->executeQuery();
        $fetchResult = $this->_link->fetchAll($pdo_fetchassoc);
        if($fetchResult == true){
          echo "Fetch all data successfully.";
          echo $fetchResult;
        } else{
            echo "Fetching data failed., ".$this->_link->errorCode();
        }
        return $fetchResult;
        
    }
//    Fetch all data from local database
    
}
