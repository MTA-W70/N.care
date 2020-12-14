<!DOCTYPE html>
<html >
		<head>
		<title>Create New Request</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
		</head>



<h1 style="text-align:center">NEW REQUEST</h1>

<!--Collect PatientID from URL-->
for(i=1;i<4;i++)
{
	<?php  
    
	$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI']; 
	if(i==1) 
		{
		$curBed_number = explode("/",$link);
		}
	else if(i==2){	
		$curRoom_number = explode("/",$link);
		}
	else{
		$curDiv_number = explode("/",$link);
		}
		
	
	?>   
}

<!--Start form-->
	
		<section>		
				<p id="welcome">
		
		<form name="RequestForm" action="AddRequest.php" method="post">
		
		<!-- input Choise of Request -->
		<legend>PLEASE CHOOSE THE REQUEST TYPE AND A THERAPIST WILL HELP YOU SHORTLY</legend>
			<option value="Food">Food</option>
			<option value="Medical Assistance">Medical Assistance</option>
			<option value="Lavatory Assistance">Lavatory Assistance</option>
			<option value="Transport">Transport</option>
			<option value="Clean Room">Clean Room</option>
			<option value="Doctor Request">Doctor Request</option>
			</select></p>

		<!-- Hidden input PatientID -->		
		<input type="hidden" id="Bednum" name="curBed_number" value=$curBed_number />
		<input type="hidden" id="Roomnum" name="curRoom_number" value=$curRoom_number />
		<input type="hidden" id="Divnum" name="curDiv_number" value=$curDiv_number />
			
		<!-- input type submit -->
		 		<input type="submit" value="Submit" title="SUBMIT DETAILS"></label></p>

		</form>





   
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

