<?php

require "../database/database.php";
require "../entity/User.php";

session_start();

if (isset($_POST["username"]) && isset($_POST["pswd"])) {
   
   $username = $_POST["username"];
   $pswd = $_POST["pswd"];

   $res = User::log_In($username,$pswd, $connection);

   if($res!="failed"){
      $_SESSION["id"] = $res->id;
      echo "success";
   }else{
      echo "failed";
   }
   
   
    
}
?>
