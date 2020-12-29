<html >
<head>
     
</head>
 
 
 <body>
 
 
<?php
include "QRCreator/qrlib.php";

/* Create Connection*/
session_start();
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

//creates a directory with divisions name at the Patient Entrance. also in that directory a php file that contain the division's name and subdirectories for the rooms and beds
shell_exec("cd ../..;cd Patient_entrance; mkdir ".$DivisionName."; echo \"<?php ". $divisionName."='".$DivisionName."'?>\">> divisionName.php;  cp /home/royin/public_html/includes/Admin_entrance/Divisions/DivisionTemplate.php  /home/royin/public_html/includes/Patient_entrance/".
$DivisionName."/; mv divisionName.php  /home/royin/public_html/includes/Patient_entrance/".$DivisionName."/");



for($i=1; $i< $RoomsNumber+1;$i++){
    shell_exec("cd ../..;cd Patient_entrance; cd ". $DivisionName.";mkdir room".$i);

        for($j=1; $j<$BedsNumber+1;$j++){
            /* Create directory */
            shell_exec("cd ../..;cd Patient_entrance; cd ". $DivisionName.";cd room".$i.";mkdir bed".$j);
            
            /* Build QR code */
            $frm_link = "http://royin.mtacloud.co.il/includes/Patient_entrance/".$DivisionName ."/room".$i."/bed".$j ."/IndexRedirect.php";
            $filename = "bed".$j.".png";
            $errorCorrectionLevel = "L";
            $matrixPointSize = "4";
            $framePointSize = "4";
            QRcode::png($frm_link, $filename, $errorCorrectionLevel, $matrixPointSize, $framePointSize);

            /* Moves png file to Patient_entrance/<devision_name>/<room_number>/<bed_number>/ */
            shell_exec("mv bed".$j.".png /home/royin/public_html/includes/Patient_entrance/". $DivisionName ."/room".$i."/bed".$j);
            
            /* Copy html template to same path */
            $template_path = "/home/royin/public_html/includes/Admin_entrance/Divisions/IndexRedirect.php";
            $bed_path = "/home/royin/public_html/includes/Patient_entrance/".$DivisionName ."/room".$i."/bed".$j ."/IndexRedirect.php";
            copy($template_path, $bed_path);
			
			/* Copy Header\Footer template to same path */
            $template_path = "/home/royin/public_html/includes/Admin_entrance/Divisions/Header.html";
            $bed_path = "/home/royin/public_html/includes/Patient_entrance/".$DivisionName ."/room".$i."/bed".$j ."/Header.html";
            copy($template_path, $bed_path);
			$template_path = "/home/royin/public_html/includes/Admin_entrance/Divisions/Footer.html";
            $bed_path = "/home/royin/public_html/includes/Patient_entrance/".$DivisionName ."/room".$i."/bed".$j ."/Footer.html";
            copy($template_path, $bed_path);
			$template_path = "/home/royin/public_html/includes/Admin_entrance/Divisions/jquery-3.5.1.min.js";
            $bed_path = "/home/royin/public_html/includes/Patient_entrance/".$DivisionName ."/room".$i."/bed".$j ."/jquery-3.5.1.min.js";
            copy($template_path, $bed_path);
			
			
			
            /*shell_exec("cp bed".$j.".png ". $DivisionName ."/room".$i."/bed".$j);*/
            
            $sql = "INSERT INTO BEDS VALUES ('".$DivisionName."', '".$i."', '".$j."','http://royin.mtacloud.co.il/includes/Patient_entrance/".$DivisionName.
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
