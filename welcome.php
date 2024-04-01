<?php
// Database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "mukesh";
$password = "Pass@123";
$dbname = "ecom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

// Sanitize input (optional but recommended)
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$mobile = mysqli_real_escape_string($conn, $mobile);

// Insert data into database
$sql = "INSERT INTO users (name, email, mobile) VALUES ('$name', '$email', '$mobile')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
