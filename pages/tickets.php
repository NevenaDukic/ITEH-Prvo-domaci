<?php

require_once "../entity/KartaMy.php";
require_once "../entity/Karta.php";
require_once "../database/database.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<link rel="stylesheet" type="text/css" href="../css/tickets.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../js/tickets.js"></script>

</head>
<body>
	

	<div class="back">
	<button type="button" class = "btn1">NAZAD</button>
    </div>
	<div class="table1">  	

	
		<table id="dataTable">
			<thead>
			<tr>
			
			  <td>Naziv</td>
			  <td>Datum</td>
			  <td>Broj karata</td>
			</tr>
			</thead>

			<tbody>
				<?php foreach (Karta::getKarteDistinct($connection) as $karta=> $value) {?>
					<tr>
						<td><?php echo $value->naziv?></td>
						<td><?php $date=date_create($value->datum);
							echo date_format($date,'d.m.Y.');?></td>
						<td><?php echo $value->count?></td>	
							
					</tr>
				<?php }?>
			</tbody>
		  </tab
	</div>

	

	
</body>
</html>