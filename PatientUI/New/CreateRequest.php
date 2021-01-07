<!DOCTYPE html>
<html>
<head>
    <title>N.Care - New Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
</head>
<body>
<main>
    <div class="container">
        <?php
                session_start();
                echo "Devision name: ".$_SESSION['devision_name'];
                echo "\n";
                echo "Room: ".$_SESSION['room_number'];
                echo "\n";
                echo "Bed: ".$_SESSION['bed_number'];

            ?>
        <h1>New Request</h1>
        <!-- Set hidden variables from session -->
        <?php
                $curDiv_number = $_SESSION['devision_name'];
                $curRoom_number = $_SESSION['room_number'];
                $curBed_number = $_SESSION['bed_number'];
            ?>

        <form name="RequestForm" action="http://royin.mtacloud.co.il/PatientUI/AddRequest.php" method="post">
            <legend>Please choose the request type and a therapist will help you shortly</legend>
            <div class="card-group">
                <div class="card">
                    <button style="background: transparent; border: 0px;" type="submit" name="RequestType"
                            value="Clean Room">
                        <img src="/PatientUI/icons/cleaning.png" class="card-img-top" alt="Clean Room">
                        <div class="card-body">
                            <h5 class="card-title">Clean Room</h5>
                        </div>
                    </button>
                </div>
                
                <div class="card">
                    <button style="background: transparent; border: 0px;" type="submit" name="RequestType"
                            value="Food">
                        <img src="/PatientUI/icons/dish.png" class="card-img-top" alt="Food">
                        <div class="card-body">
                            <h5 class="card-title">Food</h5>
                        </div>
                    </button>
                </div>

                <div class="card">
                    <button style="background: transparent; border: 0px;" type="submit" name="RequestType"
                            value="Doctor Requested">
                        <img src="/PatientUI/icons/doctor.png" class="card-img-top" alt="Doctor Requested">
                        <div class="card-body">
                            <h5 class="card-title">Doctor requeste</h5>
                        </div>
                    </button>
                </div>

                <div class="card">
                    <button style="background: transparent; border: 0px;" type="submit" name="RequestType"
                            value="Nurse Requested">
                        <img src="/PatientUI/icons/nurse.png" class="card-img-top" alt="Nurse Requested">
                        <div class="card-body">
                            <h5 class="card-title">Nurse requeste</h5>
                        </div>
                    </button>
                </div>

                <div class="card">
                    <button style="background: transparent; border: 0px;" type="submit" name="RequestType"
                            value="Shower">
                        <img src="/PatientUI/icons/shower.png" class="card-img-top" alt="Shower">
                        <div class="card-body">
                            <h5 class="card-title">Shower</h5>
                        </div>
                    </button>
                </div>

                <div class="card">
                    <button style="background: transparent; border: 0px;" type="submit" name="RequestType"
                            value="Syringe">
                        <img src="/PatientUI/icons/syringe.png" class="card-img-top" alt="Syringe">
                        <div class="card-body">
                            <h5 class="card-title">Medical assistance</h5>
                        </div>
                    </button>
                </div>

                <div class="card">
                    <button style="background: transparent; border: 0px;" type="submit" name="RequestType"
                            value="Transport">
                        <img src="/PatientUI/icons/wheelchair.png" class="card-img-top" alt="Transport">
                        <div class="card-body">
                            <h5 class="card-title">Transport</h5>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
</body>
</html>
