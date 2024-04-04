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
            <a href="userdashboard.php">Home</a>
        </nav>
    </header>

    <div class="container">
        <h2>Course List</h2>
        <table>
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Enrollment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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

                // SQL query to fetch course data with enrollment information
                $sql = "SELECT courses.*, COUNT(enrollments.student_id) AS enrollment_count FROM courses LEFT JOIN enrollments ON courses.course_id = enrollments.course_id GROUP BY courses.course_id";
                $result = $conn->query($sql);

                // Display course data
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["course_id"]. "</td>";
                        echo "<td>" . $row["course_name"]. "</td>";
                        echo "<td>" . $row["description"]. "</td>";
                        echo "<td>" . $row["start_date"]. "</td>";
                        echo "<td>" . $row["end_date"]. "</td>";
                        echo "<td>" . $row["enrollment_count"]. "</td>";
                        echo "<td><a href='signup_course.php?course_id=" . $row["course_id"] . "' class='btn'>Sign Up</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No courses found.</td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
