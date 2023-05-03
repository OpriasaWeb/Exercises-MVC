<?php

// Main controller
// localhost/mvc_project/index.php?module=user&action=insert
// ROOT FOLDER
define("APPROOT", dirname(__FILE__));
define("APPBASEURL", "localhost/mvc_project/");


if(empty($_REQUEST['module'])){
    die("<h1>Module not specified, please check the url.</h1>");
}

if(empty($_REQUEST['action'])){
    die("<p>Action not specified, please check the url.</p>");
}

$module = $_REQUEST['module']; // user
$action = $_REQUEST['action']; // insert, record
$controller = $module."Controller"; // userController

if(file_exists("controller/$controller.php")){
    include("controller/$controller.php");
    $activeController = new $controller();
    if(method_exists($activeController, $action)){
        $activeController->$action($_REQUEST);
    } else{
        die("<h1>Specified action $action of this module = $module is not exist.</h1> <p>Please check the url.</p>");
    }
} else{
    die("<h1>Specified module $module not exist.</h1> <p>please check the url.</p>");
}
        
?>