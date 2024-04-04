<?php
// Database connection settings
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere 
$dbname = "NEI"; // Change this to the name of your MySQL database

// Create connection
$conn = mysqli_connect('localhost','root','','NEI');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash password
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$role = ($_POST['role'] == 'Admin') ? 'Admin' : 'User'; // Assign role based on form input

// Insert data into users table with role
$stmt = $conn->prepare("INSERT INTO users (username, email, password, gender, address, phone, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $username, $email, $hashed_password, $gender, $address, $phone, $role);

if ($stmt->execute()) {
    // Registration successful, redirect to index page and display popup
    echo "<script>alert('Registration successful');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>
