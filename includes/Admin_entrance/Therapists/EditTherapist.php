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
    echo " <table style='width:100%'><tr><th>workerID</th><th>Therapist Name</th>".
    "<th>Division Name</th><th>Current Status</th></th><th>New Status</th><th></th></th></tr>";
    $sql = " SELECT Therapist_name, Worker_id , Division_name, Status from THERAPISTS ";
    $result=$conn->query($sql); 
    if($result->num_rows >0 )  
     {
         echo "<form method='post' action='TherapistAdded.php'>";
         while($row =$result->fetch_assoc()){
     
         echo "<tr><td><input type='int' name='WorkerID' value='".$row['Worker_id' ]."'>".
        "</td><td><input type='varchar' name='TherapistName' value='".$row['Therapist_name' ]."'></td><td><input type='int' name='DivisionName' value='".$row['Division_name' ].
        "'></td><td>".$row['Status' ]."</td><td><select type='varchar' name='Status' >". 
        "<option value='Active'>Active</option><option value='Inactive'>Inactive</option></select>".
        " </td><td><input  type='submit' value='Send Changes' id='submit'></form><form method='post' action='TherapistDeleted.php'><input  type='submit' value='delete' id='submit'></td></tr>";
        }
	     echo "</table></form>";
           
     }
    else echo "<p>No data found</p>";   
    $conn->close();



?>

</html>