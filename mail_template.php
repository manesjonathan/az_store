<!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation</title>
</head>

<body style="font-family: Arial, sans-serif; background: linear-gradient(#111827,#111827, #000); color: white; padding:5%">
    <h1 style="font-size: 24px; margin-bottom: 10px;">Order Confirmation</h1>
    <p>Dear Customer,</p>
    <p>Thank you for your recent purchase on our website! Your order has been received and will be processed shortly.
    </p>
    <p>Order details:</p>
    <table style="border-collapse: collapse; width: 100%; margin-bottom: 20px;">
        <tr>
            <th style="border: 1px solid #dddddd; padding: 8px; text-align: left; background-color: #dddddd; color: #333;">Product</th>
            <th style="border: 1px solid #dddddd; padding: 8px; text-align: left; background-color: #dddddd; color: #333;">Quantity</th>
            <th style="border: 1px solid #dddddd; padding: 8px; text-align: left; background-color: #dddddd; color: #333;">Price</th>
        </tr>
        <?php
        session_start();
        foreach ($_SESSION['shopping-cart'] as $item) {
        ?>
            <tr>
                <td style="border: 1px solid #dddddd; padding: 8px; text-align: left;"><?php echo $item['product']; ?></td>
                <td style="border: 1px solid #dddddd; padding: 8px; text-align: left;"><?php echo $item['quantity']; ?></td>
                <td style="border: 1px solid #dddddd; padding: 8px; text-align: left;">$<?php echo $item['price']; ?></td>
            </tr>

        <?php } ?>
        <tr>
            <td style="border: 1px solid #dddddd; padding: 8px; text-align: right;" colspan="2">Total:</td>
            <td style="border: 1px solid #dddddd; padding: 8px; text-align: left;">$<?php echo $_SESSION['price']; ?></td>
        </tr>
    </table>
    <p>Your order will be shipped to the following address:</p>
    <p style="margin-bottom: 20px;"><?php echo $_SESSION['user_input']['fname'] . ' ' . $_SESSION['user_input']['lname']; ?><br>
        <?php echo $_SESSION['user_input']['streetNumber']; ?><br>
        <?php echo $_SESSION['user_input']['postalCode'] . ' ' . $_SESSION['user_input']['city'] . ', ' . $_SESSION['user_input']['country']; ?></p>
    <p>We hope you enjoy your new shoes! If you have any questions or concerns, please don't hesitate to contact us.</p>
    <p>Best regards,<br>
        AZ[Store]</p>

</body>

</html>