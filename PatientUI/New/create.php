<!DOCTYPE html>
<html >
		<head>
		<title>Create New Request</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
		</head>



<h1 style="text-align:center">NEW REQUEST</h1>
<!--Start form-->
	
		<section>		
				<p id="welcome">
		
		<form name="RequestForm" action="AddRequest.php" method="post">

		<!-- input Choise of Request -->
		<legend>PLEASE CHOOSE THE REQUEST TYPE AND A THERAPIST WILL HELP YOU SHORTLY</legend>
		<p>beans selection:<select name="Beans" id="beans" size="1">
			<option value="Food">Food</option>
			<option value="Medical Assistance">Medical Assistance</option>
			<option value="Lavatory Assistance">Lavatory Assistance</option>
			<option value="Transport">Transport</option>
			<option value="Clean Room">Clean Room</option>
			<option value="Doctor Request">Doctor Request</option>
			</select></p>

		<!-- input type submit -->
		 		<input type="submit" value="Submit" title="SUBMIT DETAILS"></label></p>

		</form>

<?php  
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    echo "The current page name is: ".$curPageName;  
    echo "</br>";  
?>   
   
<form style="margin:auto" ,method="post" action="DivisionAdded.php">
<p><label>Number of beds per room:<br>
<input type="int" name="BedsNumber" maxlength="1" required> </label></p>



<form style="margin:auto" ,method="post" action="DivisionAdded.php">
<p><label>Status:<br>
<select type="varchar" name="Status" required> 
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>
</label></p>
</select><br>

<br>
 <p> <input  type="submit" value="Create division" id="submit"> </p>

</form> 

	<div class="footer" >
			  
				
	</div>

</html>

