<?php


/**
 * Description of pwc_db
 *
 * @author jdopriasa
 */



class pwc_db {
    //put your code here
    protected $_link;
    
    public function __construct(){
        require_once(APPROOT."/config/config.php");
//        require_once("./config/config.php");
//        Defined name from config database details
        $this->_link = new PDO(PWCdsn,PWCUSER,PWCPASS);
        if($this->_link->errorCode()){
            die("Something went wrong connecting to PWC database.");
        } else{
            echo "Connected from PWC database.";
        }
    }
    
//    Query database code
    public function executeQuery($query){
        $result = $this->_link->query($query);
        if($result == true){
            echo "Selected successfully successfully.";
        } else{
            echo "Selecting data failed, ".$this->_link->errorCode();
        }
        return $result;
    }
//    Query database code
    
//    Fetch all data from local database
    public function fetchAll($pdo_fetchassoc){
        $this->_link->executeQuery();
        $fetchResult = $this->_link->fetchAll($pdo_fetchassoc);
        return $fetchResult;
    }
//    Fetch all data from local database
    
//    Row count
    public function rowCount(){
        return $this->_link->rowCount();
    }
//    Row count
    
//    Get data
    public function getData($query){
        $result = $this->_link->query($query);
        if($result == true){
            
            $resultArray = array();
//        for ($i = 0; $i < count($result->fetchAll(PDO::FETCH_ASSOC)); $i++){
//            $resultArray[$i] = $result->fetch(PDO::FETCH_NUM)
//        }
//        'id'=>1, 'fullname'=>'Bem', 'status'=>'active'
            while($row = $result->fetch(PDO::FETCH_NUM)){
                $resultArray[] = $row;
            }

            return $resultArray;
            
        } else{
            echo "Select query failed.";
        }
        
    }
//    Get data
    
//    Prepare database code
//    public function prepare($sql){
//        $prepare = $this->_link->prepare($sql);
//        return $prepare;
//    }
//    Prepare database code
    

//    Fetch data from local database
//    public function fetch(){
//        $this->statement->execute();
//        $result = $this->statement->fetch();
//        return $result;
//}
//    Fetch data from local database
    

    


}

