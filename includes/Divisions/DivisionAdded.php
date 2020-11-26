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
$RoomsNumber=(int)$_REQUEST['RoomsNumber'];
$BedsNumber=(int)$_REQUEST['BedsNumber'];
$Status=$_REQUEST['Status'];
$divisionName='\$divisionName';

$sql = "INSERT INTO DIVISION VALUES ('".$DivisionName."', '".$RoomsNumber."', '".$BedsNumber."','".$Status."')";

if ($conn->query($sql) === TRUE) {
  echo "New Division created successfully ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


shell_exec("mkdir ".$DivisionName."; echo \"<?php ". $divisionName."='".$DivisionName."'?>\">> divisionName.php;  cp DivisionTemplate.php  ".
$DivisionName."/; mv divisionName.php ".$DivisionName."/");



for($i=1; $i< $RoomsNumber+1;$i++){
    shell_exec("cd ". $DivisionName.";mkdir room".$i);

        for($j=1; $j<$BedsNumber+1;$j++){
            shell_exec("cd ". $DivisionName.";cd room".$i.";mkdir bed".$j);
            QRcode::png("http://royin.mtacloud.co.il/includes/Divisions/".$DivisionName ."/room".$i."/bed".$j, "bed".$j.".png", "L", 4, 4);
            shell_exec("mv bed".$j.".png ". $DivisionName ."/room".$i."/bed".$j);
            /*shell_exec("cp bed".$j.".png ". $DivisionName ."/room".$i."/bed".$j);*/
            $sql = "INSERT INTO BEDS VALUES ('".$DivisionName."', '".$i."', '".$j."','http://royin.mtacloud.co.il/includes/Divisions/".$DivisionName.
            "/room".$i."/bed".$j."/bed".$j.".png ','Active')";

            if ($conn->query($sql) === TRUE) {
              echo "New Bed created successfully ";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }

    
}



$conn->close();
?>

 </body>
    <a style = "font-size:15px;  color: black; display = none;" href="ManageDivisions.php" >Back to manage divisions</a>


				
</html>
