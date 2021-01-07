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

          shell_exec("mkdir ".$TherapistName."; echo \"<?php ". $workerid."='".$WorkerID."'?>\">> TherapistName.php;  cp TherapistTemplate.php  ".$TherapistName."/; cp EditRequests.php ".$TherapistName."/; mv TherapistName.php ".$TherapistName."/");

          /*in case of edition - delete current record*/

          $sqlDeletion="DELETE FROM THERAPISTS WHERE Worker_id=".$WorkerID;
          if ($conn->query($sqlDeletion) === TRUE) {
            
          } else {
              echo "failed delete old instance ";
          }


          /*shell_exec("cd ".$TherapistName);*/
          QRcode::png("http://royin.mtacloud.co.il/Therapists/".$TherapistName ."/EditRequests.php",$TherapistName.".png", "L", 4, 4);
          shell_exec("mv ".$TherapistName.".png ". $TherapistName ."/");
          $sql = "INSERT INTO THERAPISTS VALUES ('".$WorkerID."', '".$TherapistName."', '".$DivisionName."','http://royin.mtacloud.co.il/Therapists/".$TherapistName."/".$TherapistName.".png ','".$Status."')";

          if ($conn->query($sql) === TRUE) {
            echo "<p class=\"text-success\">New Therapist created successfully</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          $conn->close();
        ?>
        <a href="/index.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Back Home</a>
      </div>
    </main>
    <footer><!-- This content load dynamically with js from footer.html --></footer>
</body>
</html>
