<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management</title>
    <style>
        /* CSS styles for table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* CSS styles for the page layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        header h1 {
            margin: 0;
        }
        .add-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            float: right;
        }
        .add-btn:hover {
            background-color: #218838;
        }
        nav {
            text-align: center;
            margin-top: 20px;
        }
        nav a {
            color: #007bff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #e9ecef;
            margin: 0 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover {
            background-color: #cfd8dc;
        }
    </style>
</head>
<body>
    <header>
        <h1>Course Management</h1>
        <nav>
            <a href="admindashboard.php">Home</a>
            

        </nav>
    </header>
    <?php
$servername = "localhost";

$dbname = "NEI";

// Create connection
$conn = mysqli_connect('localhost','root','','NEI');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// Fetch course data from the database
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

// Initialize an empty array to store course data
$courses = array();

// Check if there are any results
if ($result->num_rows > 0) {
    // Loop through each row and store the data in the $courses array
    while($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
} else {
    echo "No courses found.";
}
?>
    <div class="container">
        <a href="add_course.php" class="add-btn">Add Course</a>

        <h2>Course List</h2>
        <table>
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Assuming you have fetched course data from the database and stored it in $courses array
                foreach ($courses as $course) {
                    echo "<tr>";
                    echo "<td>" . $course['course_id'] . "</td>";
                    echo "<td>" . $course['course_name'] . "</td>";
                    echo "<td>" . $course['description'] . "</td>";
                    echo "<td>" . $course['start_date'] . "</td>";
                    echo "<td>" . $course['end_date'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_course.php?id=" . $course['course_id'] . "'>Edit</a>";
                    echo "<a href='delete_course.php?id=" . $course['course_id'] . "' onclick='return confirm(\"Are you sure you want to delete this course?\")'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
