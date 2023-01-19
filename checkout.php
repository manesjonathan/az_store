<?php
session_start();
$arrayForm = array();
if (isset($_POST['submit'])) {
    $error = false;
    $error_message = "";
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $error = true;
            $error_message = "The form is not complete.";
        }
    }
    if ($error) {
?>
        <p class="errorMsg"> <?php $error_message ?></p>
        <?php
        echo $error_message;
    } else {
        $arrayForm = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'streetNumber' => $_POST['streetNumber'],
            'city' => $_POST['city'],
            'postalCode' => $_POST['postalCode'],
            'country' => $_POST['country']
        );
        checkForm($arrayForm);
    }
}

function checkForm($arrayForm)
{
    $fname = $_POST['fname'];
    //echo $fname;
    $lname = $_POST['lname'];
    //echo $lname;
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $postalCode = $_POST['postalCode'];
    if (preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ]+$/', $fname) && preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ]+$/', $lname) && filter_var($email, FILTER_VALIDATE_EMAIL) && ctype_digit($postalCode)) {
        $_SESSION['user_input'] = $arrayForm;
        header("Location: ./confirmation.php");
        include "./mail.php";
        send_mail($email);
    } else {
        if (!ctype_alpha($fname)) {
        ?>
            <p class="errorMsg">Warning: incorrect first-name. It can only contain letters.</p>
        <?php
        }
        if (!ctype_alpha($lname)) {
        ?>
            <p class="errorMsg">Warning: incorrect last-name. It can only contain letters.</p>
        <?php
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ?>
            <p class="errorMsg">Warning: the format of the e-mail address is incorrect.</p>
        <?php
        }
        if (!ctype_digit($postalCode)) {
        ?>
            <p class="errorMsg">Warning: incorrect postal code. It can only contain numbers.</p>
<?php
        }
    }
}
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

<body class="bg-gradient-to-b from-gray-900 via-gray-900 to-black text-center text-white flex flex-col h-screen">
    <?php
    include "./header.php"
    ?>
    <main>
        <h2 class="mt-10 text-4xl">Delivery Information</h2>
        <hr class="w-1/2 h-0.5 mx-auto my-4 bg-gray-100 ">

        <section class="mb-auto flex justify-around items-center mt-10">
            <article class="w-1/2 m-10 p-2 shadow-xl shadow-gray-600">
                <h3>Fill in the form below</h3>
                <form action="" method="post" class="text-white">
                    <label for="fname">First-name : </label>
                    <input class="my-1" type="text" id="fname" name="fname" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>">
                    <br>
                    <label for="lname">Last-name : </label>
                    <input class="my-1" type="text" id="lname" name="lname" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>">
                    <br>
                    <label for="mail">E-mail : </label>
                    <input class="my-1" type="text" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                    <br>
                    <label for="streetNumber">Street and number : </label>
                    <input class="my-1" type="text" id="streetNumber" name="streetNumber" value="<?php echo isset($_POST["streetNumber"]) ? $_POST["streetNumber"] : ''; ?>">
                    <br>
                    <label for="city">City : </label>
                    <input class="my-1" type="text" id="city" name="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>">
                    <br>
                    <label for="postalCode">Postal code : </label>
                    <input class="my-1" type="text" id="postalCode" name="postalCode" value="<?php echo isset($_POST["postalCode"]) ? $_POST["postalCode"] : ''; ?>">
                    <br>
                    <label for="country">Country : </label>
                    <input class="my-1" type="text" id="country" name="country" value="<?php echo isset($_POST["country"]) ? $_POST["country"] : ''; ?>">
                    <br>
                    <input class="bg-blue-600 px-10 py-2 rounded " type="submit"  name="submit" value="Validate">
                </form>
            </article>
            <article class="bg-white w-1/5 text-black">
                <h3>Shopping cart</h3>
                <div class="flex justify-between bg-blue-600 px-10 py-2 rounded">
                    <p class="block text-white">Total</p>
                    <p class="block text-white"><?php echo $_SESSION["price"];?></p>
                </div>
            </article>
        </section>

    </main>

    <?php
    include "./footer.php"
    ?>
</body>

</html>