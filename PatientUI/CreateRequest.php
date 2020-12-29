<!DOCTYPE html>
<?php 

   session_start(); 
   echo "Devision name: ".$_SESSION['devision_name'];
   echo "\n";
   echo "Room: ".$_SESSION['room_number'];
   echo "\n";
   echo "Bed: ".$_SESSION['bed_number'];

?>
<html >
		<head>
		<title>Create New Request</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
		</head>



<h1 style="text-align:center">NEW REQUEST</h1>

<!-- Set hidden variables from session -->
<?php 
$curDiv_number = $_SESSION['devision_name'];
$curRoom_number = $_SESSION['room_number'];
$curBed_number = $_SESSION['bed_number'];
?>
<!--Start form-->
	
		<section>		
				<p id="welcome">
		
		<form name="RequestForm" action="http://royin.mtacloud.co.il/includes/PatientUI/AddRequest.php" method="post">
		
		<!-- input Choise of Request -->
		<legend>PLEASE CHOOSE THE REQUEST TYPE AND A THERAPIST WILL HELP YOU SHORTLY</legend>
		<p>Request type:<select name="RequestType" id="RequestType" size="1">
			<option value="Food">Food</option>
			<option value="Medical Assistance">Medical Assistance</option>
			<option value="Lavatory Assistance">Lavatory Assistance</option>
			<option value="Transport">Transport</option>
			<option value="Clean Room">Clean Room</option>
			<option value="Doctor Request">Doctor Request</option>
			</select></p>

		<!-- Hidden input PatientID -->		
		<input type="hidden" id="curBed_number" name="curBed_number" value=$curBed_number />
		<input type="hidden" id="curRoom_number" name="curRoom_number" value=$curRoom_number />
		<input type="hidden" id="curDiv_number" name="curDiv_number" value=$curDiv_number />
			
		<!-- input type submit -->
		 <input type="submit" value="Submit" title="SUBMIT DETAILS"></label></p>

		</form>

	<div class="footer" >
			  
				
	</div>

</html>

