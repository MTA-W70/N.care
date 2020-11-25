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



/*for($i=1; $i< $RoomsNumber+1;$i++){
    shell_exec("cd ". $TherapistName.";mkdir ".$TherapistName);

            shell_exec("cd ". $DivisionName.";cd ".$TherapistName);
            QRcode::png("http://royin.mtacloud.co.il/includes/Therapists/".$TherapistName ."/".$TherapistName.".png", "L", 4, 4);
            shell_exec("mv ".$TherapistName.".png ". $TherapistName ."/");
          /*  shell_exec("cp bed".$j.".png ". $DivisionName ."/room".$i."/bed".$j);
            $sql = "INSERT INTO BEDS VALUES ('".$WorkerID."', '".$TherapistName."', '".$DivisionName."','http://royin.mtacloud.co.il/includes/Therapists/".$TherapistName.
            "/".$TherapistName.".png ','Active')";

            if ($conn->query($sql) === TRUE) {
              echo "New Bed created successfully ";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

        
    
}*/






/*$url='http://api.qrserver.com/v1/create-qr-code/?data=http://royin.mtacloud.co.il/includes/Divisions/SetNewDivision.php&size=100x100';


// Initializes a new cURL session
$curl = curl_init($url);

// 1. Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_URL, "http://royin.mtacloud.co.il/includes/Divisions/SetNewDivision.php");

// 2. Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_HTTPGET, true);

// 2. Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_FILE, true);*/


/*// 4. Set custom headers for RapidAPI Auth and Content-Type header
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-RapidAPI-Host: https://api.qr-code-generator.com/v1/create/',
  'X-RapidAPI-Key: HtAsvAS5kmztBveK8CoZtnMuET9cFFzitTNRmiUPt6_LQCwHh4Rs8vCGT_cn_iXR',
  'Content-Type: application/json'
]);

// Execute cURL request with all previous settings
$response = curl_exec($curl);

// Close cURL session
curl_close($curl);

if( $response == "OK"){
    
    $url = 'https://kvstore.p.rapidapi.com/collections';
    $collection_name = 'RapidAPI';
    $request_url = $url . '/' . $collection_name;
    $curl = curl_init($request_url);
    
}

else echo "error";
*/
$conn->close();
?>

 </body>
    <a style = "font-size:15px;  color: black; display = none;" href="ManageTherapists.php" >חזרה למחלקות</a>


				
</html>
