<!DOCTYPE html>
<html dir="rtl">
		<head>
		<title>SET NEW DIVISION</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<link rel="stylesheet" type="text/css" href="../css/Payment.css">
			 <meta charset="utf-8" />
		</head>



<h1 style="text-align:center">יצירת מחלקה</h1>


<form style="margin:auto" ,method="post" action="DivisionAdded.php">
<p><label>שם המחלקה:<br>
<input type="varchar" name="DivisionName" required> </label></p>


<form style="margin:auto" ,method="post" action="DivisionAdded.php">
<p><label>מספר חדרים:<br>
<input type="varchar" name="RoomsNumber" required> </label></p>

<form style="margin:auto" ,method="post" action="DivisionAdded.php">
<p><label>מספר מיטות בחדר:<br>
<input type="varchar" name="BedsNumber" required> </label></p>

<form style="margin:auto" ,method="post" action="DivisionAdded.php">
<p><label>סטטוס:<br>
<select type="varchar" name="Status" required> 
<option value='Active'>פעיל</option>
<option value='Inactive'>לא פעיל</option>
</label></p>
</select><br>
<?php
/* Create Connection

 $host="localhost";
$username="royin_roy";
$password ="Roy123456";
$database="royin_N.care";

$conn = new mysqli($host, $username, $password , $database);
if ($conn->connect_error) {
echo "<h1>error !! </h1>";
}
$DivisionName=$_POST['Division name'];
$RoomNumber=$_POST['RoomNumber'];
$BedID=$_POST['BedID'];
$Status=$_POST['Status'];


$sql = "INSERT INTO DIVISION VALUES ('".$DivisionName."', '".RoomNumber."', '".BedID."','".Status."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
/*
?>


<p><label>שם משפחה:<br>
<input type="varchar" name="FamilyName" > </label></p>

<p><label>אימייל:<br> <input type="email"   name="Email" > </label></p>

<p><label>ת"ז:<br><input type="varchar" name="Id"  minlength="8" maxlength="9" > </label></p>

<br>
<img src="../images/creditcards.PNG" alt="error" width="50" height="50" > <br> 

<p><label>מספר כרטיס אשראי:<br>
<input type="bigint" name="CreditCardNumber"  minlength="9" maxlength="16" > </label></p>

<h5 style="font-weight:bold" > תוקף</h5>
<p><label>שנה:  
&#160;
<input type="int" style="width:40px" name="ExpiredYear"  minlength="4" maxlength="4" > </label></p>
<p><label>חודש: 

<input type="int" style="width:40px"  name="ExpiredMonth" minlength="1" maxlength="2" > </label></p>

<p><label>3 ספרות בגב הכרטיס: <input type="int" style="width:40px"  name="CVV" minlength="3" maxlength="3" > </label></p>
<br>
<?php 
echo "<p><input style='display:none;' name='quantity' value=\"".$quantity."\">";
echo "<p><input style='display:none;'  name=\"meal\" value=\"".$meal."\"><p>";
echo "<p>סך הכל לתשלום: ";
echo "$totalAmount שח"

/*echo "<input type='int' style='width:70px', 'background-color:#f1d38000'  name='ExpiredMonth' minlength='1' maxlength='2' value='".$totalAmount." שח'> </p> ";
*/
?>
<br>
 <p> <input  type="submit" value="צור מחלקה" id="submit"> </p>

</form> 

	<div class="footer" >
			  
				
	</div>

</html>

