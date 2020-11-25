<html dir="rtl">


<br> 

<?php
include "TherapistName.php";

	$host="localhost";
	$username="royin_roy";
	$password ="Roy123456";
	$database="royin_N.care";
	
    $conn = new mysqli($host, $username, $password , $database);
    if ($conn->connect_error) {
    echo "<h1>error !! </h1>";
    }
    echo " <table style='width:100%'><tr><th>workerID</th><th>Therapist Name</th>".
    "<th>Division Name</th><th>QRCode</th></tr>";
    $sql = " SELECT Therapist_name, Worker_id , Division_name, QRCode_link from THERAPISTS  where  Status = 'Active' and Worker_id = '".$workerID."'";
    $result=$conn->query($sql); 
    if($result->num_rows >0 )  
     {while($row =$result->fetch_assoc())
     
        echo "<tr><td>".$row['Worker_id' ].
        "</td><td>".$row['Therapist_name']."<td>".$row['Division_name' ]."</td><td><a href='".$row['QRCode_link' ].
        "' download='QRCode' >download</a></td></tr>";
         
     }
    else echo "<p>No data found</p>";   
    $conn->close();



?>

</html>