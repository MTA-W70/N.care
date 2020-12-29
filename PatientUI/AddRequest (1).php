<html >
<head>
<title>New Request</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
			 <meta charset="utf-8" />


			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- JQuery -->
<script src="jquery-3.5.1.min.js"></script> 
<!-- End JQuery  --> 
</head>
 
 
 <body>
 
 <!-- Header to be uploaded from server - Michael the Header.html should be located in the server-->
<header>
    <div id="header-placeholder">

    </div>

    <script>
    $(function(){
      $("#header-placeholder").load("Header.html");
    });
    </script>

</header>
<!-- End Header  -->
 
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
  echo "WE RECEIVED YOUR REQUEST";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



    
$conn->close();
?>

 </body>
    <a style = "font-size:15px;  color: black; display = none;" href="DisplayStatus.php" >Click here to move to your requests status</a>

<!-- Footer to be uploaded from server - Michael the Footer.html should be located in the server -->
<footer>
    <div id="footer-placeholder">

    </div>

    <script>
    $(function(){
      $("#footer-placeholder").load("Footer.html");
    });
    </script>
</footer>
<!-- End Footer  -->

				
</html>
