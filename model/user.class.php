<?php

include '../config/messages.php';

class user{
  public $local;

  public function __construct(){
    require_once("../config/config.php");
    $this->local = new PDO(DSN, DBUSER, DBPASS);
    // $this->local->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if($this->local->errorCode()){
    //   die("Something went wrong connecting to local database.");
    // } else{
    //     echo "Connected from local database.";
    // }
  }

// ------------------------------------------------------------------------------------------------- //

  // Insert account model
  public function insertAccount($fullname, $status){
    try{
      $statement = $this->local->prepare("INSERT INTO tutorial.account(name, status) VALUES ('$fullname', '$status')");
      $statement->execute();
      echo message::INSERTED_SUCCESSFULLY;
    } catch(PDOException $e){
      echo message::INSERT_FAILED;
      throw $e;
    }
  }

  // Insert account details model
  public function insertAccountDetails($address, $gender){
    try{
      $statement = $this->local->prepare("INSERT INTO tutorial.accountdetails(address, gender) VALUES ('$address', '$gender')");
      $statement->execute();
      echo message::INSERTED_SUCCESSFULLY;
    } catch(PDOException $e){
      echo message::INSERT_FAILED;
      throw $e;
    }
  }

// ------------------------------------------------------------------------------------------------- //

  // Edit/Update account model
  public function editAccountRecord($id, $fullname, $status){
    try{
      $statement = $this->local->prepare("UPDATE tutorial.account SET name = :name, status = :status WHERE id = :id");
      $statement->bindParam(':id', $id);
      $statement->bindParam(':name', $fullname);
      $statement->bindParam(':status', $status);
      $statement->execute();
      echo message::UPDATED_SUCCESSFULLY;
    }catch(PDOException $e){
      echo message::UPDATED_FAILED;
      throw $e;
    }
  }

  // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //

  // Edit/Update account details model
  public function editAccountDetailsRecord($id, $address){
    try{
      $statement = $this->local->prepare("UPDATE tutorial.accountdetails SET address = :address WHERE account_id = :id");
      $statement->bindParam(':id', $id);
      $statement->bindParam(':address', $address);
      $statement->execute();
      echo message::UPDATED_SUCCESSFULLY;
    }catch(PDOException $e){
      echo message::UPDATED_FAILED;
      throw $e;
    }
  }

  // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //

// ------------------------------------------------------------------------------------------------- //

  //    Update query - NOTE: 
  public function selectAccount($id){
    try{
        $query = "SELECT id, name, status FROM tutorial.account WHERE id = $id";
        $statement = $this->local->prepare($query);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        // print_r($data);
        // return json_encode($data);
        return $data;        
        // return $statement;
    }catch(PDOException $e){
        throw $e;
    }
  }

  public function selectAccountDetails($id){
      try{
          $query = "SELECT account_id, address FROM tutorial.accountdetails WHERE account_id = $id";
          $statement = $this->local->prepare($query);
          $statement->execute();
          $data = $statement->fetch(PDO::FETCH_ASSOC);
          // print_r($data);
          // return json_encode($data);
          return $data; 
          // print_r($statement);
          // return $statement;
      }catch(PDOException $e){
          throw $e;
      }
  }
  //    Update query - NOTE: 

// ------------------------------------------------------------------------------------------------- //

  // Delete account model
  public function deleteAccountRecord($id){
    try{
      $statement = $this->local->query("DELETE FROM tutorial.account WHERE id = $id");
      $statement->execute();
      echo message::DELETED_SUCCESSFULLY;
    }catch(PDOException $e){
      echo message::DELETED_FAILED;
      throw $e;
    }
  }

  // Delete account details model
  public function deleteAccountDetailsRecord($account_id){
    try{
      $statement = $this->local->query("DELETE FROM tutorial.accountdetails WHERE account_id = $account_id");
      $statement->execute();
      echo message::DELETED_SUCCESSFULLY;
    }catch(PDOException $e){
      echo message::DELETED_FAILED;
      throw $e;
    }
  }

// ------------------------------------------------------------------------------------------------- //

}



?>