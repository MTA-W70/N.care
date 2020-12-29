<!DOCTYPE html>
<html >
		<head>
		<title>Requests Status</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
		</head>

<body>
<h1 style="text-align:center">REQUESTS STATUS</h1>

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

$devisionName = $_SESSION['devision_name'];
$roomNumber = $_SESSION['room_number'];
$bedNumber = $_SESSION['bed_number'];
echo "<p>Devision name: ".$devisionName."</p>";
echo "<p>Room number: ".$roomNumber."</p>";
echo "<p>Bed number: ".$bedNumber."</p>";

$sql = "SELECT * FROM REQUESTS where (Status = 'New' || Status = 'In process') and Division_name = '$devisionName' and Room_number = $roomNumber and Bed_number = $bedNumber";
$result=$conn->query($sql);
 if($result->num_rows > 0 )  
 {
     echo "<table style='width:100%'>";
     echo "<tr><th> Request Time </th><th> Request Type </th><th> Therapist Name </th></tr>";
     while($row =$result->fetch_assoc()) {
         echo "<tr><td>" . $row['Time_stamp'] . "</td><td>" . $row['Request_type'] . "</td><td>" .  $row['Therapist'] . "</td></tr>";
     }
     echo "</table>";
 } else {
     echo "NO ACTIVE REQUESTS";
 }
?>

</body>
</html>

