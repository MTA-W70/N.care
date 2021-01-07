<!DOCTYPE html>
<html>
<head>
    <title>N.Care - Improving Hospital Care</title>
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
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="/images/divisions.png" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">Create Divisions</h5>
                            <a class="btn btn-primary" href="/Divisions/SetNewDivision.php">Go</a>
                        </div>
                    </div>
                </div>
           
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="/images/therapists.png" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">Create Therapists</h5>
                            <a class="btn btn-primary" href="/Therapists/SetNewTherapist.php">Go</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer><!-- This content load dynamically with js from footer.html --></footer>
</body>
</html>
