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

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Prepare SQL statement to update course record
    $sql = "UPDATE courses SET course_name='$course_name', description='$description', start_date='$start_date', end_date='$end_date' WHERE course_id=$course_id";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Course updated successfully, redirect to course page
        header("Location: course.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}

// Close connection
$conn->close();
?>
