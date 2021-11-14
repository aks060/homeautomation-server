<?php
header('Content-type: application/json');
if(isset($_GET['username']) && isset($_GET['secret']) && $_GET['username']==='akashhdr' && $_GET['secret']==='Ganga ki 108 Dhaar'){

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