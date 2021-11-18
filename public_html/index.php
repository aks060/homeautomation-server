<?php
header('Content-type: application/json');
$config = file_get_contents('../config.json'); 

$obj = json_decode($config, true); 
$_GLOBALS["USERNAME"]=$obj["USERNAME"];
$_GLOBALS['PASSWORD']=$obj['PASSWORD'];

if(isset($_GET['username']) && isset($_GET['secret']) && $_GET['username']===$_GLOBALS['USERNAME'] && $_GET['secret']===$_GLOBALS['PASSWORD']){

}
else{
    die('{"status": "UnAuthorised"}');
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $pin=$_POST['pin'];
    $action=$_POST['action'];
    if(ctype_digit($pin) && $action=="OFF"){
        $out=system("homeautomate -p $pin -a False");
    }
    else if(ctype_digit($pin) && $action=="ON"){
        $out=system("homeautomate -p $pin -a True");
    }
    exit('{"status": "Command Executed"}');
}

echo system("homeautomate -status");