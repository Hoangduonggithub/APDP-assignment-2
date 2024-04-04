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
$course_name = $_POST['course_name'];
$description = $_POST['description'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

// Prepare SQL statement
$sql = "INSERT INTO courses (course_name, description, start_date, end_date) VALUES ('$course_name', '$description', '$start_date', '$end_date')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Course added successfully!'); window.location.href = 'course.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
