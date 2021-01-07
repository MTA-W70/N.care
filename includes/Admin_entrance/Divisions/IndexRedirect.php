<!DOCTYPE html>
<html>
<head>
    <title>N.Care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="container">
            <?php
                session_start();
                $_SESSION['devision_name'] = basename(dirname(dirname(dirname(__FILE__))));
                $_SESSION['room_number'] = str_replace("room", "", basename(dirname(dirname(__FILE__))));
                $_SESSION['bed_number'] = str_replace("bed", "", basename(dirname(__FILE__)));
            ?>

            <h1 style="text-align:center">Welcome to N.care</h1><br>
            <ul class="list-group">
                <li class="list-group-item"><a href="/PatientUI/CreateRequest.php">New Request</a></li>
                <li class="list-group-item"><a href="/PatientUI/DisplayStatus.php">Check Status</a></li>
            </ul>
        </div>
    </main>
</body>
</html>
