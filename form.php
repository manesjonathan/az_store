<html>
<form action="" method="post">
    <label for="fname">First-name : </label>
    <input type="text" id="fname" name="fname">
    <br>
    <label for="lname">Last-name : </label>
    <input type="text" id="lname" name="lname">
    <br>
    <label for="mail">E-mail : </label>
    <input type="text" id="email" name="email">
    <br>
    <label for="streetNumber">Street and number : </label>
    <input type="text" id="streetNumber" name="streetNumber">
    <br>
    <label for="city">City : </label>
    <input type="text" id="city" name="city">
    <br>
    <label for="postalCode">Postal code : </label>
    <input type="text" id="postalCode" name="postalCode">
    <br>
    <label for="country">Country : </label>
    <input type="text" id="country" name="country">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
<br>

<?php

$arrayForm = array($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['streetNumber'], $_POST['city'], $_POST['postalCode'], $_POST['country']);

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
        echo $error_message;
    } else {
        checkForm();
    }
}



function checkForm()
{
    $fname = $_POST['fname'];
    //echo $fname;
    $lname = $_POST['lname'];
    //echo $lname;
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $postalCode = $_POST['postalCode'];
    if (ctype_alpha($fname) && ctype_alpha($lname) && filter_var($email, FILTER_VALIDATE_EMAIL) && ctype_digit($postalCode)) {
?> <img src="assets/image/correct.png" alt="Correct : contient uniquement des lettres" style="width: 2%;">
        <?php
    } else {
        if (!ctype_alpha($fname)) {
        ?>
            <p>Warning: incorrect first-name. It can only contain letters.</p>
        <?php
        }
        if (!ctype_alpha($lname)) {
        ?>
            <p>Warning: incorrect last-name. It can only contain letters.</p>
        <?php
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ?>
            <p>Warning: the format of the e-mail address is incorrect.</p>
        <?php
        }
        if (!ctype_digit($postalCode)) {
        ?>
            <p>Warning: incorrect postal code. It can only contain numbers.</p>
<?php
        }
    }
}






?>

</html>