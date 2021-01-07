<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            $("header").load("/header.html");
            $("footer").load("/footer.html");
            $("nav").load("/nav_admin.php");
        });
    </script>
</head>
<body>
    <header><!-- This content load dynamically with js from header.html --></header>
    <main>
        <div class="container">
            <nav><!-- This content load dynamically with js from nav_admin.html --></nav>
            <?php
                $host="localhost";
                $username="royin_roy";
                $password ="Roy123456";
                $database="royin_N.care";
                
                $conn = new mysqli($host, $username, $password , $database);
                if ($conn->connect_error) {
                    echo "<h1>error !! </h1>";
                }
            ?>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Request ID</th>
                        <th scope="col">Creation Time</th>
                        <th scope="col">Request Type</th>
                        <th scope="col">Current Status</th>
                        <th scope="col">New Status</th>
                        <th scope="col">Current Therapist</th>
                        <th scope="col">Choose Therapist</th>
                        <th scope="col">Division Name</th>
                        <th scope="col">Room Number</th>
                        <th scope="col">Bed Number</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = " SELECT  Request_ID, Time_stamp, Bed_number, Request_type, Status, Therapist, Division_name, Room_number  from REQUESTS ";
                        $result=$conn->query($sql); 
                        if($result->num_rows >0 )  
                        {
                          while($row =$result->fetch_assoc()){
                            $Therapist_sql = " SELECT  Therapist_name  from THERAPISTS WHERE Status='Active'";
                            $Therapist_result=$conn->query($Therapist_sql);
                            if($Therapist_result->num_rows >0 )  
                             {
                                 $select= "<select type='varchar' name='TherapistName' >" ;
                                  while($Therapist_row =$Therapist_result->fetch_assoc()){
                                    $select.="<option value='".$Therapist_row['Therapist_name']."'>".$Therapist_row['Therapist_name']."</option>";
                                      
                                  }
                                  $select.="</select>";
                             }
                            $requestID=intval($row['Request_ID']);
                            $rowTemplate = '
                            <tr>
                              <form method="post" action="/Therapists/UpdateRequest.php">
                              <td><input style="border: 0;" type="varchar" name="RequestID" value="%s" readonly></td>
                              <td><input style="border: 0;" type="varchar" name="Timestamp" value="%s" readonly></td>
                              <td><input style="border: 0;" type="varchar" name="Request type" value="%s" readonly></td>
                              <td>%s</td>
                              <td><select type="varchar" name="Status">
                                <option value="New">New</option>
                                <option value="In process">In process</option>
                                <option value="Closed">Closed</option>
                              </select></td>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td>%s</td>
                              <td><input  type="submit" value="Save" id="submit"></td>
                              </form>
                            </tr>';
                            
                            echo sprintf($rowTemplate, $requestID, substr($row['Time_stamp'],0,19), $row['Request_type' ], $row['Status' ], $row['Therapist' ], $select, $row['Division_name' ], $row['Room_number' ], $row['Bed_number' ]);
                        }
                      }
                    ?>
                    </form>
                    </tbody>
                </table>

                <?php 
                $conn->close();
                ?>
        </div>
    </main>
    <footer><!-- This content load dynamically with js from footer.html --></footer>
</body>
</html>
