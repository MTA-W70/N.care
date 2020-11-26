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
$DivisionName=$_REQUEST['DivisionName'];
$TherapistName=$_REQUEST['TherapistName'];
$WorkerID=(int)$_REQUEST['WorkerID'];
$Status=$_REQUEST['Status'];
$workerid='\$workerID';

/*shell_exec("cd ".$TherapistName);*/
QRcode::png("http://royin.mtacloud.co.il/includes/Therapists/".$TherapistName ."/",$TherapistName.".png", "L", 4, 4);
shell_exec("mv".$TherapistName."/".$TherapistName.".png ". $TherapistName ."/");
$sql = "INSERT INTO THERAPISTS VALUES ('".$WorkerID."', '".$TherapistName."', '".$DivisionName."','http://royin.mtacloud.co.il/includes/Therapists/".$TherapistName.
"/".$TherapistName.".png ','Active')";



if ($conn->query($sql) === TRUE) {
  echo "New Therapist created successfully ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


shell_exec("mkdir ".$TherapistName."; echo \"<?php ". $workerid."='".$WorkerID."'?>\">> TherapistName.php;  cp TherapistTemplate.php  ".
$TherapistName."/; mv TherapistName.php ".$TherapistName."/");


$conn->close();
?>

 </body>
    <a style = "font-size:15px;  color: black; display = none;" href="ManageTherapists.php" >Back to manage divisions</a>


				
</html>
