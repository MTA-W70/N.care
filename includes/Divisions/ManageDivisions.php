<!DOCTYPE html>
<html >
		<head>
		<title>Manage Divisions</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
<!-- JQuery -->
<script src="jquery-3.5.1.min.js"></script> 
<!-- End JQuery  --> 

		</head>

<!-- Header to be uploaded from server -  the Header.html should be located in the server-->
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

<!-- Nav bar JQuery load - NavAdmin.html should be located in the server-->
    <div id="nav-placeholder">

    </div>

    <script>
    $(function(){
      $("#nav-placeholder").load("Nav.html");
    });
    </script>
<!--end of Navigation bar-->


<h1 style="text-align:center">Mange Divisions</h1><br>


<a style = "text-align:center; font-size:15px;  color: black; display = none;" href="SetNewDivision.php" >Create new division</a><br><br>


<h4 style="text-align:center">
Active Divisions:</h4>
<br> 

<?php
session_start();

 $host="localhost";
$username="royin_roy";
$password ="Roy123456";
$database="royin_N.care";

$conn = new mysqli($host, $username, $password , $database);
if ($conn->connect_error) {
echo "<h1>error !! </h1>";
}

$sql = " SELECT Division_name from DIVISION  where  Status = 'Active'";
 $result=$conn->query($sql); 
 if($result->num_rows >0 )  
 {while($row =$result->fetch_assoc())
 
    echo " <a style = 'font-size:15px;  text-align:center; color: red;' href='http://royin.mtacloud.co.il/includes/Patient_entrance/".$row["Division_name" ]."/DivisionTemplate.php'>".$row["Division_name" ]."</a><br> ";
     

 }
    else echo "<p>No data found</p>";   

?>

<!-- Footer to be uploaded from server -  the Footer.html should be located in the server -->
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

