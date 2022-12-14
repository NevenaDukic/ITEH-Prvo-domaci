<?php

require "../database/database.php";
require "../entity/User.php";

session_start();

if (isset($_POST["username"]) && isset($_POST["pswd"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["age"]) ) {
   
    $user = new User($_POST["username"], $_POST["pswd"], $_POST["firstName"], $_POST["lastName"], $_POST["age"]);
    


    $res = User::register($user, $connection);
    if($res){
        echo("success");
    }else{
        echo("failed");
    }
    
}
?>
