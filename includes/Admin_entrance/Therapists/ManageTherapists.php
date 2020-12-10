<!DOCTYPE html>
<html >
		<head>
		<title>Manage therapists</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
		</head>



<h1 style="text-align:center">Manage therapists</h1><br>


<a style = "font-size:15px;  color: black; display = none;" href="SetNewTherapist.php" >Create new therpaist</a><br><br>

<a style = "font-size:15px;  color: black; display = none;" href="EditTherapist.php" >Edit therpaists</a><br><br>



<h4>
Active therapists</h4>
<br> 

<?php
session_start();

 $host="localhost";
$username="royin_roy";
$password ="Roy123456";
$database="royin_N.care";

$conn = new mysqli($host, $username, $password , $database);
if ($conn->connect_error) {
echo "<h1>error !! </h1>";
}

$sql = " SELECT Therapist_name from THERAPISTS  where  Status = 'Active'";
 $result=$conn->query($sql); 
 if($result->num_rows >0 )  
 {while($row =$result->fetch_assoc())
 
    echo " <a style = 'font-size:15px;  color: black;' href='".$row["Therapist_name" ]."/TherapistTemplate.php'>".$row["Therapist_name" ]."</a>";
     

 }
    else echo "<p>No data found</p>";   

?>




</html>

