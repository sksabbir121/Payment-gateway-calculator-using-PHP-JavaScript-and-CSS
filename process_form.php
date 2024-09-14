<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "service_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $serviceCharge = $_POST['serviceCharge'];
    $roomCharge = $_POST['roomCharge'];
    $cleaningCharge = $_POST['cleaningCharge'];
    $discount = $_POST['discount'];  // Discount in $
    $totalAmount = $_POST['totalAmount'];  // Final total after discount and extras

    // Insert data into the 'charges' table
    $sql = "INSERT INTO charges (name, email, service_charge, room_charge, cleaning_charge, discount, total_amount) 
            VALUES ('$name', '$email', '$serviceCharge', '$roomCharge', '$cleaningCharge', '$discount', '$totalAmount')";

    if ($conn->query($sql) === TRUE) {
        header("Location: process_form.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Close the database connection
$conn->close();
?>
