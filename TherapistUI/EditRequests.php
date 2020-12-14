<html >


<br> 

<?php

	$host="localhost";
	$username="royin_roy";
	$password ="Roy123456";
	$database="royin_N.care";
	
    $conn = new mysqli($host, $username, $password , $database);
    if ($conn->connect_error) {
    echo "<h1>error !! </h1>";
    }
    echo " <table style='width:100%'><tr><th>Request ID</th><th>Time stamp</th>".
    "<th>Request type</th><th>Current Status</th><th>Therapist name</th><th>Divition name</th><th>Room number</th><th>Bed number</th></th></tr>";
    $sql = " SELECT Request ID, Time stamp , Request type, Status, Therapist, Divition_name, Room_number, Bed_number from REQUESTS ";
    $result=$conn->query($sql); 
    if($result->num_rows >0 )  
     {
        
         while($row =$result->fetch_assoc()){
     
         echo "<tr><td><input type='int' name='Request ID' value='".$row['Request ID' ]."'>".
        "</td><td><input type='varchar' name='Timestamp' value='".$row['Time stamp' ]."'></td><td><input type='varchar' name='Request type' value='".$row['Request type' ].
        "'></td><td>".$row['Status' ]."</td><td><select type='varchar' name='Status' >". 
        "<option value='New'>New</option><option value='In process'>In process</option><option value='Closed'>Closed</option></select>".
        "<tr><td><input type='varchar' name='Therapist name' value='".$row['Therapist' ]."'>".
        "</td><td><input type='varchar' name='Division name' value='".$row['Division_name' ]."'></td><td><input type='int' name='Room number' value='".$row['Room_number' ].
        "'></td><td>".$row['Bed_number' ]."</td><td><select type='int' name='Bed number' >". 
		" </td><td><input  type='submit' value='Send Changes' id='submit'></form><form method='post' action='TherapistDeleted.php'><input  type='submit' value='delete' id='submit'></td></tr>";
        }
	     echo "</table></form>";
           
     }
    else echo "<p>No data found</p>";   
    $conn->close();



?>

</html>