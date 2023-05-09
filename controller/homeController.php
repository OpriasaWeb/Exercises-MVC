
<!-- Handler controller -->
<?php


class homeController{
    
    public $homeModel;
    
    function __construct(){
        include(APPROOT."/model/home.class.php");
        $this->homeModel = new home();
    }
   
// ----------------------------------------------------- //

// ----------------------------------------------------- //
    
    public function showall(){
        $users = $this->homeModel->showall();
        include(APPROOT.'/view/User/showall.php');
    }

// ----------------------------------------------------- //

// ----------------------------------------------------- //

    public function insert(){
        include(APPROOT.'./view/User/insert.php');
    }

// ----------------------------------------------------- //

// ----------------------------------------------------- //

    public function update(){
        include(APPROOT.'./view/User/update.php');
    }

}



