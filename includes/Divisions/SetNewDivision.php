<!DOCTYPE html>
<html >
		<head>
		<title>SET NEW DIVISION</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
		</head>



<h1 style="text-align:center">Create Division</h1>


<form style="margin:auto" ,method="post" action="DivisionAdded.php">
<p><label>Division name:<br>
<input type="varchar" name="DivisionName" required> </label></p>


<form style="margin:auto" ,method="post" action="DivisionAdded.php">
<p><label>Number of rooms:<br>
<input type="int" name="RoomsNumber" maxlength="2" required> </label></p>

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

