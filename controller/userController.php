<?php
include '../model/user.class.php';


class userController{

  public $userRecord;

  public function __construct(){
    // require(APPROOT."/model/user.class.php");
    $this->userRecord = new user();
  }

  // ------------------------------------------------------------- // 

  // INSERT
  public function insertAccount($fullname, $status){
    $insertRecordAccount = $this->userRecord->insertAccount($fullname, $status);
    return $insertRecordAccount;
  }

  public function insertAccountDetails($address, $gender){
    $insertRecordAccountDetails = $this->userRecord->insertAccountDetails($address, $gender);
    return $insertRecordAccountDetails;
  }
  // INSERT

  // ------------------------------------------------------------- // 

  // UPDATE/EDIT
  public function editAccountRecord($id, $fullname, $status){
    $editAccountRecord = $this->userRecord->editAccountRecord($id, $fullname, $status);
    return $editAccountRecord;
  }

  public function editAccountDetailsRecord($id, $address){
    $editAccountDetailsRecord = $this->userRecord->editAccountDetailsRecord($id, $address);
    return $editAccountDetailsRecord;
  }
  // UPDATE/EDIT

  // ------------------------------------------------------------- // 

  // SELECT FOR UPDATE

  public function selectAccount($id){
    $selectAccount = $this->userRecord->selectAccount($id);
    return $selectAccount;
  }

  public function selectAccountDetails($id){
    
    $selectAccountDetails = $this->userRecord->selectAccountDetails($id);
    return $selectAccountDetails;
  }

  // SELECT FOR UPDATE

  // ------------------------------------------------------------- // 

  // DELETE
  public function deleteAccountRecord($id){
    $deleteAccountRecord = $this->userRecord->deleteAccountRecord($id);
    return $deleteAccountRecord;
  }

  public function deleteAccountDetailsRecord($id){
    $deleteAccountDetailsRecord = $this->userRecord->deleteAccountDetailsRecord($id);
    return $deleteAccountDetailsRecord;
  }

  // DELETE


  // ------------------------------------------------------------- // 

}




?>