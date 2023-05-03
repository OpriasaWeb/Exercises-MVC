<?php
include '../model/insert.class.php';


class insertController{

  public $insertRecord;

  public function __construct(){
    // require(APPROOT."/model/user.class.php");
    $this->insertRecord = new insert();
  }

  // ------------------------------------------------------------- // 

  // INSERT
  public function insertAccount($fullname, $status){
    $insertRecordAccount = $this->insertRecord->insertAccount($fullname, $status);
    return $insertRecordAccount;
  }

  public function insertAccountDetails($account_id, $address, $gender){
    $insertRecordAccountDetails = $this->insertRecord->insertAccountDetails($account_id, $address, $gender);
    return $insertRecordAccountDetails;
  }
  // INSERT

  // ------------------------------------------------------------- // 

  // UPDATE/EDIT
  public function editAccountRecord($id, $name, $status){
    $editAccountRecord = $this->insertRecord->editAccountRecord($id, $name, $status);
    return $editAccountRecord;
  }

  public function editAccountDetailsRecord($account_id, $address, $gender){
    $editAccountDetailsRecord = $this->insertRecord->editAccountDetailsRecord($account_id, $address, $gender);
    return $editAccountDetailsRecord;
  }
  // UPDATE/EDIT

  // ------------------------------------------------------------- // 

  // DELETE
  public function deleteAccountRecord($id){
    $deleteAccountRecord = $this->insertRecord->deleteAccountRecord($id);
    return $deleteAccountRecord;
  }

  public function deleteAccountDetailsRecord($id){
    $deleteAccountDetailsRecord = $this->insertRecord->deleteAccountDetailsRecord($id);
    return $deleteAccountDetailsRecord;
  }

  // DELETE

  // ------------------------------------------------------------- // 

}




?>