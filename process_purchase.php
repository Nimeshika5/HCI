<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register";

$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check for a successful connection.
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get the data from the AJAX request.
$data = json_decode(file_get_contents("php://input"), true);

// Insert the purchase data into the database.
$email = $data["email"];
$address = $data["address"];
$totalAmount = $data["total_amount"];

$sql = "INSERT INTO purchase (email, address, total_amount) VALUES (?, ?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ssd", $email, $address, $totalAmount);

if ($stmt->execute()) {
    echo "Purchase completed successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection.
$stmt->close();
$connection->close();
?>
