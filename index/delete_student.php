<?php
// Database connection settings
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = mysqli_connect('localhost','root','','NEI');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is provided
if (isset($_GET['id'])) {
    // Get the user ID from the URL parameter
    $id = $_GET['id'];

    // Prepare SQL statement to delete student record with the specified ID
    $sql = "DELETE FROM users WHERE user_id = $user_id";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student deleted successfully!'); window.location.href = 'Student.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "User ID not provided.";
}

// Close connection
$conn->close();
?>
