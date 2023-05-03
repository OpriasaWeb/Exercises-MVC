
<!-- Handler controller -->
<?php

class handlerController{
    
    public $userModel;
    // public $insert;
    
    function __construct(){
        include(APPROOT."/model/user.class.php");
        $this->userModel = new User();
    }
   
// ----------------------------------------------------- //

// ----------------------------------------------------- //
    
    public function showall(){
        $users = $this->userModel->showall();
        include(APPROOT.'/view/User/showall.php');
    }

// ----------------------------------------------------- //

// ----------------------------------------------------- //
    
//    Test input form validation
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
//    Test input form validation
//    
// ----------------------------------------------------- //


    
    public function insert(){
//        echo "Insert user function called";

        // define variables and set to empty values
        $requiredMessage = "";

        if(isset($_POST['fullname']) && isset($_POST['status']) && isset($_POST['account_id']) && isset($_POST['full_address']) && isset($_POST['gender'])){
            if(empty($_POST['fullname']) || empty($_POST['status']) 
            || empty($_POST['account_id']) || empty($_POST['full_address']) 
            || empty($_POST['gender'])){
                $requiredMessage = "* required";
                // header("Location: insert.php");
//                include(APPROOT.'./view/User/insert.php');
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

                $insertedAccount = $userModel->insertUser($fullname, $status);
                $insertedAccountDetails = $userModel->insertUserDetails($account_id, $full_address, $gender);
                
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
    }
}


    
    
