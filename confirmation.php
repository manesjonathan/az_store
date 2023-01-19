<?php
session_start();

$arrayForm = $_SESSION['user_input'];
$fname = $arrayForm['fname'];
$lname = $arrayForm['lname'];
$email = $arrayForm['email'];
$street_number = $arrayForm['streetNumber'];
$city = $arrayForm['city'];
$postal_code = $arrayForm['postalCode'];
$country = $arrayForm['country'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AZ Store">
    <link rel="stylesheet" href="./assets/css/output.css">
    <title>AZ Store</title>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-900 to-black text-center text-white flex flex-col h-screen ">
    <?php
    include "./header.php"
    ?>

    <main>
        <h1 class="mt-10 text-4xl" >AZ[Store]</h1>
        <hr class="w-1/2 h-0.5 mx-auto my-4 bg-gray-100  dark:bg-gray-700">

        <section class="mb-auto flex flex-col items-center mt-10">
            <h2 class="text-2xl"> <?php echo "THANK YOU " . strtoupper($fname) . " " . strtoupper($lname) . " ! " ?> </h2>
            <h3> We have received your order and you will be contacted soon by our team.</h3>
            <article class="bg-white p-5 text-black w-1/2 m-10">
                <h2> Shipping address:</h2>
                <h3 class="mt-5"><?php echo $street_number ?></h3>
                <h3><?php echo $postal_code . " " . $city ?></h3>
                <h3><?php echo $country ?></h3>
            </article>
        </section>
    </main>
    <?php
    include "./footer.php"
    ?>
</body>

</html>