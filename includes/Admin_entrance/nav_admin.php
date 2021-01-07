<div class="navbar navbar-expand-lg navbar-light bg-light">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
		</li>
		
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Divisions
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="/Divisions/SetNewDivision.php">Create New</a>
				<div class="dropdown-divider"></div>
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
					{
						while($row =$result->fetch_assoc())
							echo sprintf("<a class=\"dropdown-item\" href=\"/Patient_entrance/%s/DivisionTemplate.php\">%s</a>", $row["Division_name"], $row["Division_name"]);
					}
				?>
			</div>
		</li>

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Therapists
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="/Therapists/SetNewTherapist.php">Create New</a>
			<a class="dropdown-item" href="/Therapists/EditTherapist.php">Edit</a>
			<a class="dropdown-item" href="/Therapists/AdminEditRequests.php">Monitor Requests</a>
			<div class="dropdown-divider"></div>
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

				$sql = " SELECT Therapist_name from THERAPISTS  where  Status = 'Active'";
				$result=$conn->query($sql); 
				if($result->num_rows >0 )  
				{
					while($row =$result->fetch_assoc())
						echo sprintf("<a class=\"dropdown-item\" href=\"/Therapists/%s/TherapistTemplate.php\">%s</a>", $row["Therapist_name"], $row["Therapist_name"]);
				}
			?>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/contact.php">Contact US</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/private_policy.php">Privacy Policy</a>
		</li>
	</ul>
</div>
</div>
<br />
<br />
