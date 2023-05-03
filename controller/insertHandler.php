<?php

include 'insertController.php';

$insertController = new insertController();

// ------------------------------------------------------------------------- //

// ----------- INSERT ------------- // 
if(isset($_POST['fullname']) && isset($_POST['status']) && isset($_POST['account_id']) && isset($_POST['full_address']) && isset($_POST['gender'])){
  if(empty($_POST['fullname']) || empty($_POST['status']) 
  || empty($_POST['account_id']) || empty($_POST['full_address']) 
  || empty($_POST['gender'])){
      echo "Cannot be empty. Please fill-in everything.";
      return;
      // echo "<script>Cannot be empty. Please fill-in everything.</script>";
    // include(APPROOT.'/view/User/insert.php');  
  } else{

      // Insert accounts
      $fullname = $_POST['fullname'];
      $status = $_POST['status'];

      // Insert accountdetails
      $full_address = $_POST['full_address'];
      $account_id = $_POST['account_id'];
      $gender = $_POST['gender'];

      // Debug
      print_r($_POST);

      // From controller back to view
      $insertedAccount = $insertController->insertAccount($fullname, $status);
      $insertedAccountDetails = $insertController->insertAccountDetails($account_id, $full_address, $gender);
      
      if(!$insertedAccount && $insertedAccountDetails){
          echo "
            <script>console.log('Inserting data failed.')</script>
          ";
      }   
      else{
          echo "
            <script>console.log('Inserted successfully to both account and account details tables.')</script>
          ";
      }
  }
}
else{
    include(APPROOT.'/view/User/insert.php');
}
// ----------- INSERT ------------- // 

// ------------------------------------------------------------------------- //

// ----------- UPDATE / EDIT ------------- // 
if(isset($_POST['edit'])){




  $updateAccount = $insertController->editAccountRecord($id, $name, $status);
  $updateAccountDetails = $insertController->editAccountDetailsRecord($account_id, $address, $gender);

  if(!$updateAccount && $updateAccountDetails){
    echo "
      <script>console.log('Updating record failed.')</script>
    ";
  }   
  else{
      echo "
        <script>console.log('Update record successfully!')</script>
      ";
  }

}

// ----------- UPDATE / EDIT ------------- // 

// ------------------------------------------------------------------------- //

// ----------- DELETE ------------- // 
if(isset($_POST['postDelete'])){

  $id = $_POST['delete'];

  $deleteAccount = $insertController->deleteAccountRecord($id);
  $deleteAccountDetails = $insertController->deleteAccountDetailsRecord($id);

  if(!$deleteAccount && $deleteAccountDetails){
    echo "
      <script>console.log('Deleting record failed.')</script>
    ";
  }   
  else{
      echo "
        <script>console.log('Delete record successfully!')</script>
      ";
  }
  
}
// ----------- DELETE ------------- // 

// ------------------------------------------------------------------------- //

?>