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

// Check if course ID parameter is provided
if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    // Prepare SQL statement to delete course record
    $sql = "DELETE FROM courses WHERE course_id = $course_id";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Course deleted successfully, redirect to course page
        header("Location: course.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No course ID provided.";
}

// Close connection
$conn->close();
?>
