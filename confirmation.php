<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #008970;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Order Confirmation</h1>
    </div>
    <div class="container">
        <h2>Your Order Has Been Confirmed</h2>
        <?php
        $email = $_GET['email'];
        $shippingAddress = $_GET['shippingAddress'];
        $totalAmount = $_GET['totalAmount'];

        echo "<p>Email: $email</p>";
        echo "<p>Shipping Address: $shippingAddress</p>";
        echo "<p>Total Amount: $totalAmount</p>";
        ?>
        <p>Thank you for your order. Your items will be shipped to your address.</p>
    </div>
</body>
</html>
