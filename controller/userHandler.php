<?php

include 'userController.php';

$userController = new userController();

// ------------------------------------------------------------------------- //

// ----------- INSERT ------------- // 
// isset($_POST['fullname']) && isset($_POST['status']) && isset($_POST['account_id']) && isset($_POST['full_address']) && isset($_POST['gender'])
if(isset($_POST['insert'])){

  try{

    if(empty($_POST['fullname']) || empty($_POST['status']) 
      || empty($_POST['full_address']) 
      || empty($_POST['gender'])){
      echo "Cannot be empty. Please fill-in everything.";
      return;
    } else{

      // Insert accounts
      $fullname = $_POST['fullname'];
      $status = $_POST['status'];

      // Insert accountdetails
      $full_address = $_POST['full_address'];
      $gender = $_POST['gender'];

      // Debug
      print_r($_POST);

      // From controller back to view
      $insertedAccount = $userController->insertAccount($fullname, $status);
      $insertedAccountDetails = $userController->insertAccountDetails($full_address, $gender);
      
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

  } catch(PDOException $e){

    throw $e;
  }
  
}
// else{
//     include(APPROOT.'/view/User/insert.php');
// }
// ----------- INSERT ------------- // 

// ------------------------------------------------------------------------- //

// ----------- UPDATE / EDIT ------------- // 
if(isset($_POST['updateData'])){
  try{
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    // $address = $_POST['address'];
    $status = $_POST['status'];

    print_r($_POST);

    $updateAccount = $userController->editAccountRecord($id, $fullname, $status);

    // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //

    // $updateAccountDetails = $insertController->editAccountDetailsRecord($id, $address);

    // ---------- TEST and DEBUGGING (Complete address update) if sir ask  ---------- //

  } catch(PDOException $e){
    throw $e;
  }
  

}

// ----------- UPDATE / EDIT ------------- // 

// ------------------------------------------------------------------------- //

// ----------- SELECT UPDATE ------------- //
if(isset($_POST['fetchData'])){

  try{
    $id = $_POST['fetchId'];
    // print_r($_POST);

    $selectUpdateAccount = $userController->selectAccount($id);
    $selectUpdateAccountDetails = $userController->selectAccountDetails($id);

    $result = array(
      'account' => $selectUpdateAccount,
      'accountDetails' => $selectUpdateAccountDetails
    );

    echo json_encode($result);

  } catch(PDOException $e){
    throw $e;
  }
  
}
// ----------- SELECT UPDATE ------------- //

// ------------------------------------------------------------------------- //

// ----------- DELETE ------------- // 
if(isset($_POST['deleteRec'])){

  try{
    $id = $_POST['delete'];

    $deleteAccount = $userController->deleteAccountRecord($id);
    $deleteAccountDetails = $userController->deleteAccountDetailsRecord($id);

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

  } catch(PDOException $e){

    throw $e;
  }
  
}
// ----------- DELETE ------------- // 

// ------------------------------------------------------------------------- //



?>