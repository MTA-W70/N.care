<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            $("header").load("/header.html");
            $("footer").load("/footer.html");
            $("nav").load("/nav_admin.php");
        });
    </script>
</head>
<body>
    <header><!-- This content load dynamically with js from header.html --></header>
    <main>
      <div class="container">
        <nav><!-- This content load dynamically with js from nav_admin.html --></nav>
        <?php
          include "../libs/QRCreator/qrlib.php";

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
            echo "<p class=\"text-success\">New Division created successfully</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          //creates a directory with divisions name at the Patient Entrance. also in that directory a php file that contain the division's name and subdirectories for the rooms and beds
          shell_exec("cd ..;cd Patient_entrance; mkdir ".$DivisionName."; echo \"<?php ". $divisionName."='".$DivisionName."'?>\">> divisionName.php;  cp /home/royin/public_html/Divisions/DivisionTemplate.php  /home/royin/public_html/Patient_entrance/".
          $DivisionName."/; mv divisionName.php  /home/royin/public_html/Patient_entrance/".$DivisionName."/");

          $fullSuccess = FALSE;
          for($i=1; $i< $RoomsNumber+1;$i++){
              shell_exec("cd ..;cd Patient_entrance; cd ". $DivisionName.";mkdir room".$i);
              for($j=1; $j<$BedsNumber+1;$j++){
                  /* Create directory */
                  shell_exec("cd ..;cd Patient_entrance; cd ". $DivisionName.";cd room".$i.";mkdir bed".$j);
                  /* Build QR code */
                  $frm_link = "http://royin.mtacloud.co.il/Patient_entrance/".$DivisionName ."/room".$i."/bed".$j ."/IndexRedirect.php";
                  $filename = "bed".$j.".png";
                  $errorCorrectionLevel = "L";
                  $matrixPointSize = "4";
                  $framePointSize = "4";
                  QRcode::png($frm_link, $filename, $errorCorrectionLevel, $matrixPointSize, $framePointSize);

                  /* Moves png file to Patient_entrance/<devision_name>/<room_number>/<bed_number>/ */
                  shell_exec("mv bed".$j.".png /home/royin/public_html/Patient_entrance/". $DivisionName ."/room".$i."/bed".$j);

                  /* Copy html template to same path */
                  $template_path = "/home/royin/public_html/Divisions/IndexRedirect.php";
                  $bed_path = "/home/royin/public_html/Patient_entrance/".$DivisionName ."/room".$i."/bed".$j ."/IndexRedirect.php";
                  copy($template_path, $bed_path);

                  /*shell_exec("cp bed".$j.".png ". $DivisionName ."/room".$i."/bed".$j);*/
                  $sql = "INSERT INTO BEDS VALUES ('".$DivisionName."', '".$i."', '".$j."','http://royin.mtacloud.co.il/Patient_entrance/".$DivisionName."/room".$i."/bed".$j."/bed".$j.".png ','Active')";
                  if ($conn->query($sql) === TRUE) {
                    $fullSuccess = TRUE;
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    $fullSuccess = FALSE;
                  }
              }
          }
          
          if ($fullSuccess == TRUE) {
            echo "<p class=\"text-success\">New Bed created successfully</p>";
          }
          $conn->close();
        ?>
        <a href="/index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Back Home</a>
      </div>
    </main>
    <footer><!-- This content load dynamically with js from footer.html --></footer>
</body>
</html>
