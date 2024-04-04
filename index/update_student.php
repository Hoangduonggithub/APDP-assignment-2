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
$sql = "UPDATE users SET username='$username', gender='$gender', email='$email', address='$address', phone='$phone'";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Student updated successfully!'); window.location.href = 'welcome.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
