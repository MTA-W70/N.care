<html >
<head>

</head>
 <body>
<?php
include "QRCreator/qrlib.php";
session_start();

/* Create Connection*/

$host="localhost";
$username="royin_roy";
$password ="Roy123456";
$database="royin_N.care";

$conn = new mysqli($host, $username, $password , $database);
if ($conn->connect_error) {
echo "<h1>error !! </h1>";
}

/* Add data to table*/

$Requesttype=$_REQUEST['RequestType'];
$sql = "INSERT INTO REQUESTS VALUES ('".$Requesttype."')";
$curBed_number=$_REQUEST['curBed_number'];
$sql = "INSERT INTO REQUESTS VALUES ('".$Bed_number."')";
$curRoom_number=$_REQUEST['curRoom_number'];
$sql = "INSERT INTO REQUESTS VALUES ('".$Room_number."')";
$curDiv_number=$_REQUEST['curDiv_number'];
$sql = "INSERT INTO REQUESTS VALUES ('".$Div_number."')";

/*Check creation*/

if ($conn->query($sql) === TRUE) {
  echo "WE RECEIVED YOU REQUEST";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


    
$conn->close();
?>

 </body>
    <a style = "font-size:15px;  color: black; display = none;" href="ManageDivisions.php" >Back to manage divisions</a>


				
</html>
