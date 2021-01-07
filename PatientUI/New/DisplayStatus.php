<!DOCTYPE html>
<html>
<head>
    <title>N.Care - Requests Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="container">
            <h4>Requests Status</h4>
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

                $devisionName = $_SESSION['devision_name'];
                $roomNumber = $_SESSION['room_number'];
                $bedNumber = $_SESSION['bed_number'];
                echo "<p>Devision name: ".$devisionName."</p>";
                echo "<p>Room number: ".$roomNumber."</p>";
                echo "<p>Bed number: ".$bedNumber."</p>";
            ?>
            <a href="/PatientUI/CreateRequest.php" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Add another request</a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Request Time</th>
                    <th scope="col">Request Type</th>
                    <th scope="col">Therapist Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM REQUESTS where (Status = 'New' || Status = 'In process') and Division_name = '$devisionName' and Room_number = $roomNumber and Bed_number = $bedNumber";
                    $result=$conn->query($sql);
                    while($row =$result->fetch_assoc()) {
                        echo sprintf("<tr><th scope=\"row\">%s</th><td>%s</td><td>%s</td></tr>", substr($row['Time_stamp'],0,19), $row['Request_type'], $row['Therapist']);
                    }
                ?>
                </tbody>
            </table>
            <?php
            $conn->close();
            ?>
        </div>
    </main>
</body>
</html>

