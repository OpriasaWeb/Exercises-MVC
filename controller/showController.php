
<!-- Handler controller -->
<?php


class showController{
    
    public $showModel;
    
    function __construct(){
        include(APPROOT."/model/show.class.php");
        $this->showModel = new Show();
    }
   
// ----------------------------------------------------- //

// ----------------------------------------------------- //
    
    public function showall(){
        $users = $this->showModel->showall();
        include(APPROOT.'/view/User/showall.php');
    }

// ----------------------------------------------------- //

// ----------------------------------------------------- //

    public function insert(){
        include(APPROOT.'./view/User/insert.php');
    }
}

// ----------------------------------------------------- //


    
    
