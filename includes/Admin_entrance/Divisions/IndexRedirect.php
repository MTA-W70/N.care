<!DOCTYPE html>
<html>
<head>
<!-- JQuery -->
<script src="jquery-3.5.1.min.js"></script> 
<!-- End JQuery  --> 
</head>

<body>

<!-- Propogate necessary properties to the session (devision name, room number and bed number), derived from the file path -->
<?php
   session_start();
   $_SESSION['devision_name'] = basename(dirname(dirname(dirname(__FILE__))));
   $_SESSION['room_number'] = str_replace("room", "", basename(dirname(dirname(__FILE__))));
   $_SESSION['bed_number'] = str_replace("bed", "", basename(dirname(__FILE__)));
?>

<!-- Header to be uploaded from server - the Header.html should be located in the server-->
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

<main>

	<section> 
		<h1 style="text-align:center">Welcome to N.care</h1><br>
		<a style = "font-size:15px;  color: black; display = none;" href="http://royin.mtacloud.co.il/includes/PatientUI/CreateRequest.php" >New Request</a><br><br>
		<a style = "font-size:15px;  color: black; display = none;" href="http://royin.mtacloud.co.il/includes/PatientUI/DisplayStatus.php" >Check Status</a><br><br>
	</section>

</main>





<!-- Footer to be uploaded from server - the Footer.html should be located in the server -->
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
</body>
</html>
