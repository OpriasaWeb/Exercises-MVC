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

// Local database connection and creating built in sql function method

class local_connection {
    // Protected is to prevent outside code from modifying a property
    public $_link;
    
    public function __construct(){
        require_once(APPROOT."/config/config.php");
//        require_once("./config/config.php");
//        Defined name from config database details
        $this->_link = new PDO(DSN,DBUSER,DBPASS);
//        $this->_link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($this->_link->errorCode()){
            die("Something went wrong connecting to local database.");
        } else{
            echo "Connected from local database.";
        }
    }

// NOTE: I only created here the built-in sql query    

// ----------------------------------------------------- // 
    
//    Fetch all data from local database
    public function executeFetch(){     
        $fetchResult = $this->_link->fetchAll(PDO::FETCH_ASSOC);
        if($fetchResult == true){
          echo "Fetch all data successfully.";
        } else{
            echo "Fetching data failed., ".$this->_link->errorCode();
        }
        return $fetchResult;
    }
//    Fetch all data from local database
    
// ----------------------------------------------------- // 
//    Get data
    public function getData($query){
        $result = $this->_link->query($query);
        
//        if($result === true){
//            echo "True";
//        } else{
//            echo "False";
//        }
//        
        if($result->rowCount() > 0){
            $resultArray = array();

            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $resultArray[] = $row;
            }

            return $resultArray;
        } else{
            echo "Select query failed.";
        }
    }
//    Get data
    
// ----------------------------------------------------- // 
    
//    Execute database query 
        public function executeQuery($query){
            return $this->_link->query($query);
        }
//    Execute database query 
    
// ----------------------------------------------------- // 
    
//    Execute database query 
    public function executePrepare($query){
        return $this->_link->prepare($query);
    }
//    Execute database query 

    
//        for ($i = 0; $i < count($result->fetchAll(PDO::FETCH_ASSOC)); $i++){
//            $resultArray[$i] = $result->fetch(PDO::FETCH_NUM)
//        }
//        'id'=>1, 'fullname'=>'Bem', 'status'=>'active'
                
    
}
