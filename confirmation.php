<?php
session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$street_number = $_POST['streetNumber'];
$city = $_POST['city'];
$postal_code = $_POST['postalCode'];
$country = $_POST['country'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AZ Store">
    <title>AZ Store</title>
</head>

<body>
    <header>
        <h1>AZ Store</h1>
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <main>

        <h2>THANK YOU</h2>

    </main>
    <footer>
        <nav>
            <a class="active" href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </footer>
</body>

</html>