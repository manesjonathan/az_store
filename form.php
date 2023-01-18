<html>
<form action="" method="post">
    <label for="fname">First-name : </label>
    <input type="text" id="fname" name="fname" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>">
    <br>
    <label for="lname">Last-name : </label>
    <input type="text" id="lname" name="lname" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>">
    <br>
    <label for="mail">E-mail : </label>
    <input type="text" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
    <br>
    <label for="streetNumber">Street and number : </label>
    <input type="text" id="streetNumber" name="streetNumber" value="<?php echo isset($_POST["streetNumber"]) ? $_POST["streetNumber"] : ''; ?>">
    <br>
    <label for="city">City : </label>
    <input type="text" id="city" name="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>">
    <br>
    <label for="postalCode">Postal code : </label>
    <input type="text" id="postalCode" name="postalCode" value="<?php echo isset($_POST["postalCode"]) ? $_POST["postalCode"] : ''; ?>">
    <br>
    <label for="country">Country : </label>
    <input type="text" id="country" name="country" value="<?php echo isset($_POST["country"]) ? $_POST["country"] : ''; ?>">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
<br>

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
    if (ctype_alpha($fname) && ctype_alpha($lname) && filter_var($email, FILTER_VALIDATE_EMAIL) && ctype_digit($postalCode)) {
        $_SESSION['user_input'] = $arrayForm;
        include "./mail.php";
        send_mail($email);
        header("Location: ./confirmation.php");
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

</html>