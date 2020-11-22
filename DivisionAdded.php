<html >
<head>

</head>
 <body>
<?php
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
$DivisionName=$_REQUEST['DivisionName'];

$sql = "INSERT INTO DIVISION VALUES ('".$DivisionName."', '5', '6','iii')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

shell_exec("mkdir ".$DivisionName);


$conn->close();
?>

 </body>


				
</html>
