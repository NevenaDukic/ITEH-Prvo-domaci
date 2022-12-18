<?php
 if(!isset($_SESSION)) 
 { 
	session_start(); 
 } 

require_once "../controller/HomeController.php";

require_once "../database/database.php";
require_once "../entity/User.php";
require_once "../entity/Karta.php";
require_once "../entity/Predstava.php";

$method = $_SERVER['REQUEST_METHOD'];

switch($method){

	case 'POST':
		$naziv = $_POST["find"];

		if($naziv==''){
			$res = HomeController::getPredstave($connection);
				echo json_encode($res);
		}else{
    	$resultSet = HomeController::getPredstaveCtiteria($connection,$naziv);
		echo json_encode($resultSet);
		}
		break;
	case 'GET':
		$id = $_GET["value"];

		$res1 = Predstava::getNumSlMesta($connection, $id);
		if($res1>0){
			HomeController::updatePredstava($connection, $id);
			$res = Karta::createKarta(new Karta(0,new Predstava($id,null,null,0),new User(null,null,null,null,0,$_SESSION["id"])),$connection);
			if($res){
			echo "upisao";
			}else
			echo "nije upisao";		
		}else{
			echo "nema karata";
		}
		break;


}

// if (isset($_POST["find"])) {
// 	$naziv = $_POST["find"];

// 	if($naziv==''){
// 		$res = HomeController::getPredstave($connection);
// 		echo json_encode($res);
// 	}else{
//     	$resultSet = HomeController::getPredstaveCtiteria($connection,$naziv);
// 		echo json_encode($resultSet);
// 	}
// }

// if (isset($_POST["value"])) {
// 	//echo("USAO OVDE");
// 	$id = $_POST["value"];

// 	$res1 = Predstava::getNumSlMesta($connection, $id);
// 	if($res1>0){

// 		HomeController::updatePredstava($connection, $id);


// 	$res = Karta::createKarta(new Karta(0,new Predstava($id,null,null,0),new User(null,null,null,null,0,$_SESSION["id"])),$connection);


// 	if($res){
// 		echo "upisao";
// 	}else
// 		echo "nije upisao";
		
// 	}else{
// 		echo "nema karata";
// 	}
	
	
	
// }

?>
