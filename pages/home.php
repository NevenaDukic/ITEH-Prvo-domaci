<?php

require_once "../controller/HomeController.php";

require_once "../database/database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../js/home.js"></script>

</head>
<body>
	
	<div class="myTickets">
	<button type="button" class = "btn1">Moje karte</button>
    </div>
	<div class="find1">
			<form action = "#" method="POST" id = "find_predstave">
                <label for="find" class = "lbltxt">Pronadji predstave prema nazivu: </label>
                <input type="text" name="find" id="valuetxt">
				<input type="submit" name="button" id="btnFind" value="PRONADJI PREDSTAVE">
            </form>
    </div>


	<div class="table1">  	
		<table id="dataTable">
			<thead>
			<tr>
			<td></td>
			  <td>Id</td>
			  <td>Naziv predstave</td>
			  <td>Datum</td>
			  <td>Broj slobodnih mesta</td>
			</tr>
			</thead>

			<tbody>
				<?php foreach (HomeController::getPredstave($connection) as $predstava=> $value) { ?>
					
					<tr>
						<td><button type="button" class = "btn">Rezervisi kartu</button></td>
						<td><?php echo $value->id ?></td>
						<td><?php echo $value->naziv ?></td>
						<td><?php $date=date_create($value->datum);
								   echo date_format($date,'d.m.Y.');?></td>
						<td><?php echo $value->brojSlMesta ?></td>
						
					</tr>
				<?php }?>
			</tbody>
		  </tab
	</div>

	
</body>
</html>