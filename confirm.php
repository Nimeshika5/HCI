<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $address = $_POST["address"];
    $totalAmount = $_POST["totalAmount"];

    // Include the existing database connection code from "database.php"
    include("database.php");

    // Check the database connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Insert data into the "purchase" table
    $sql = "INSERT INTO purchase (email, address, total_amount) VALUES ('$email', '$address', '$totalAmount')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        // You can perform additional actions here, such as sending confirmation emails.
        // Redirect to the "cart.html" page
        header("Location: cart.html");
        exit;
    } else {
        // Error in inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
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
            position: relative;
        }
        .ribbon {
            background-color: #008970;
            color: #fff;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 10px;
        }
        .container {
            max-width: 600px; /* Reduce the width of the container */
            background-color: #fff;
            padding: 20px; /* Add some padding to the container */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 40px auto; /* Add some margin between ribbon and container, and center the container horizontally */
        }
        h2 {
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="email"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        p {
            font-size: 16px;
            font-weight: bold;
        }
        button {
            background-color: #efbf3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background-color: #075143;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Proceed to Buy</h1>
    </div>
    <div class="container">
        <h2>Confirm Your Order</h2>
        <form id="confirm-form" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>

            <p>Total Amount: $<?php echo $_GET["total"]; ?></p>
            <input type="hidden" name="totalAmount" value="<?php echo $_GET["total"]; ?>">

            <button type="submit">Confirm</button>
            <button type="button" onclick="cancelOrder()">Cancel</button>
        </form>

        <script>
            function cancelOrder() {
                // Handle the cancel logic here
                // Redirect back to the shopping cart page
                window.history.back();
            }
        </script>
    </div>
</body>
</html>

