<!DOCTYPE html>
<html dir="rtl">
		<head>
		<title>SET NEW DIVISION</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
		</head>



<h1 style="text-align:center">מחלקות</h1><br>


<a style = "font-size:15px;  color: black; display = none;" href="SetNewDivision.php" >צור מחלקה חדשה</a><br><br>


<h4>
     מחלקות פעילות
</h4>
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

$sql = " SELECT Division_name from DIVISION  where  Status = 'Active'";
 $result=$conn->query($sql); 
 if($result->num_rows >0 )  
 {while($row =$result->fetch_assoc())
 
    echo " <a style = 'font-size:15px;  color: black;' href='".$row["Division_name" ]."/".$row["Division_name" ].".php'>".$row["Division_name" ]."</a>";
     
 }
    else echo "<p>No data found</p>";   

?>


<h4>
     מיטות פעילות
</h4>
<br> 

<?php


$conn = new mysqli($host, $username, $password , $database);
if ($conn->connect_error) {
echo "<h1>error !! </h1>";
}

$sql = " SELECT Division_name, Room_number, Bed_number, QRCode-link from BEDS  where  Status = 'Active'";
 $result=$conn->query($sql); 
 if($result->num_rows >0 )  
 {while($row =$result->fetch_assoc())
 
    echo " <a style = 'font-size:15px;  color: black;' href='".$row["Division_name" ]."/".$row["Division_name" ].".php'>".$row["Division_name" ]."</a>";
     
 }
    else echo "<p>No data found</p>";   
 $conn->close();

?>

</html>

