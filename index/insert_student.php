<?php
// Database connection settings
$servername = "localhost";
$dbname = "NEI";

// Create connection
$conn = mysqli_connect('localhost','root','','NEI');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Prepare SQL statement
$sql = "INSERT INTO users (username, gender, email, address, phone) VALUES ('$username', '$gender', '$email', '$address', '$phone')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Student added successfully!'); window.location.href = 'Student.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
