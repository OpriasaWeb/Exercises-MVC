<?php

// Connect the local database class here
include 'lcl_db.class.php';
$local_database = new lcl_db();

// Connect the account class here
include 'account.class.php';
$account = new account();

class Model{
    
    public function insertAccount($fullname, $status){
        try{
            $sql = "INSERT INTO account (name, status) VALUES (:name, :status);";
    
            $this->local_database->prepare($sql); // using now the prepare from local database
            $this->local_database->bindParam("name", $fullname, PDO::PARAM_STR);
            $this->local_database->bindParam("status", $status, PDO::PARAM_STR);
            $this->local_database->execute();
            return true;
            
        } catch (PDOException $e) {
            echo "Error connecting database: " . $e->getMessage();
        }
        

    }
    
    
    public function insertAccountDetails($id, $address, $gender){
        
    }
    

    
}

