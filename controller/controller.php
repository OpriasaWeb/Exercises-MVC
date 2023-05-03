<?php

  // Local
$local = new PDO('mysql:host=localhost;dbname=tutorial', 'root', '@raym33B3m14');
$local->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_POST['fullname']) && isset($_POST['status']) && isset($_POST['account_id']) && isset($_POST['full_address']) && isset($_POST['gender'])){
    if(empty($_POST['fullname']) || empty($_POST['status']) 
    || empty($_POST['account_id']) || empty($_POST['full_address']) 
    || empty($_POST['gender'])){
        // $requiredMessage = "* required";
        // header("Location: insert.php");
//                include(APPROOT.'./view/User/insert.php');
    } else{

        // Insert accounts
        // $lname = $_POST['lname'];
        $fullname = $_POST['fullname'];

        // $fullname = $lname + " " + $fname;
        $status = $_POST['status'];

        // Insert accountdetails
        
        $full_address = $_POST['full_address'];
        // $islandName = $_POST['islandName'];
        // $regionName = $_POST['regionName'];
        // $provinceName = $_POST['provinceName'];
        // $cityName = $_POST['cityName'];
        // $barangayName = $_POST['barangayName'];

        // $full_address = $ddrss . ", " . $barangayName . ", " . $cityName . ", " . $provinceName . ", " . $regionName . ", " . $islandName;
        
        $account_id = $_POST['account_id'];
        $gender = $_POST['gender'];

        // Debug
        print_r($_POST);


        $insertedAccount = $local->insertUser($fullname, $status);
        $insertedAccountDetails = $local->insertUserDetails($account_id, $full_address, $gender);
        
        if($insertedAccount && $insertedAccountDetails){
            echo "
                <script>console.log('Inserted successfully to both account and account details tables.')</script>
            ";
            // include(APPROOT.'./view/User/insert.php');
        }   
        else{
            echo "
                <script>console.log('Inserting data failed.')</script>
            ";
        }
    }
  }
  else{
      include(APPROOT.'./view/User/insert.php');
  }

?>