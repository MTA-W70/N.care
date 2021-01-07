<!DOCTYPE html>
<html>
<head>
    <title>N.Care - TEMPLATE</title>
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
            <!-- PUT YOUR CONTENT HERE -->
        </div>
    </main>
    <footer><!-- This content load dynamically with js from footer.html --></footer>
</body>
</html>
