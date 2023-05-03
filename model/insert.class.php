<?php

include '../config/messages.php';

class insert{
  public $local;

  public function __construct(){
    require_once("../config/config.php");
    $this->local = new PDO(DSN, DBUSER, DBPASS);
    // $this->local->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->local->errorCode()){
      die("Something went wrong connecting to local database.");
    } else{
        echo "Connected from local database.";
    }
  }

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
  public function insertAccountDetails($account_id, $address, $gender){
    try{
      $statement = $this->local->prepare("INSERT INTO tutorial.accountdetails(account_id, address, gender) VALUES ('$account_id', '$address', '$gender')");
      $statement->execute();
      echo message::INSERTED_SUCCESSFULLY;
    } catch(PDOException $e){
      echo message::INSERT_FAILED;
      throw $e;
    }
  }

  // Edit/Update account model
  public function editAccountRecord($id, $name, $status){
    try{
      $statement = $this->local->query("UPDATE INTO tutorial.account SET name = $name, status = $status WHERE id = $id");
      $statement->execute();
      echo message::UPDATED_SUCCESSFULLY;
    }catch(PDOException $e){
      echo message::UPDATED_FAILED;
      throw $e;
    }
  }

  // Edit/Update account details model
  public function editAccountDetailsRecord($account_id, $address, $gender){
    try{
      $statement = $this->local->query("UPDATE INTO tutorial.accountdetails SET address = $address, gender = $gender WHERE account_id = $account_id");
      $statement->execute();
      echo message::UPDATED_SUCCESSFULLY;
    }catch(PDOException $e){
      echo message::UPDATED_FAILED;
      throw $e;
    }
  }


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


}



?>