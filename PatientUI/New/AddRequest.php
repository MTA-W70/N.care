<!DOCTYPE html>
<html>
<head>
    <title>N.Care - Request Accepted</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
<main>
      <div class="container">
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

            /* Add data to table*/
            $requestType = $_POST['RequestType'];
            $roomNumber = intval($_SESSION['room_number']);
            $bedNumber = intval($_SESSION['bed_number']);
            $sql = "INSERT INTO REQUESTS (Request_type, Division_name, Room_number, Bed_number) VALUES ('".$requestType."', '".$_SESSION['devision_name']."', ".$roomNumber." , ".$bedNumber.")";

            /*Check creation*/

            if ($conn->query($sql) === TRUE) {
                echo "<p class=\"text-success\">We received your request</p>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        ?>
        <a href="/PatientUI/DisplayStatus.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Click here to see to your requests status</a>
      </div>
</main>
</body>
</html>












