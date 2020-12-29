<html >

<h4>
     Active beds
</h4>
<br> 

<?php
include "divisionName.php";

	$host="localhost";
	$username="royin_roy";
	$password ="Roy123456";
	$database="royin_N.care";
	
    $conn = new mysqli($host, $username, $password , $database);
    if ($conn->connect_error) {
    echo "<h1>error !! </h1>";
    }
    echo " <table style='width:100%'><tr><th>Room number</th><th>Bed number</th>".
    "<th>QRCode</th></tr>";
    $sql = " SELECT Room_number, Bed_number, QRCode_link from BEDS  where  Status = 'Active' and Division_name = '".$divisionName."'";
    $result=$conn->query($sql); 
    if($result->num_rows >0 )  
     {while($row =$result->fetch_assoc())
     
        echo "<tr><td>".$row['Room_number' ].
        "</td><td>".$row['Bed_number' ]."</td><td><a href='".$row['QRCode_link' ].
        "' download='QRCode' >download</a></td></tr>";
         
     }
    else echo "<p>No data found</p>";   
    $conn->close();



?>
<body>
 <a style = "font-size:15px;  color: black; display = none;" href="ManageDivisions.php" >Back to manage divisions</a>
</body>
</html>