<html>
<?php

 $host="localhost";
$username="royin_roy";
$password ="Roy123456";
$database="royin_N.care";

$conn = new mysqli($host, $username, $password , $database);
if ($conn->connect_error) {
echo "<h1>error !! </h1>";
}

$WorkerID=(int)$_REQUEST['WorkerID'];


$sql="DELETE FROM THERAPISTS WHERE Worker_id=".$WorkerID;
if ($conn->query($sql) === TRUE) {
  echo "succesfully deleted instance ";
} else {
}

?>

    <a style = "font-size:15px;  color: black; display = none;" href="ManageTherapists.php" >Back to manage therapists</a>


				
</html>
