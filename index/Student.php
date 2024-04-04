<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <style>
        /* CSS styles remain unchanged */
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
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px 0;
            border-radius: 0 0 8px 8px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Management</h1>
    </header>

    <nav>
        <a href="admindashboard.php">Home</a>
        <a href="Student.php">Students</a>
        <a href="course.php">Courses</a>
        <a href="addstudent.php" class="btn">Add Student</a>
    </nav>

    <div class="container">
        <h2>Student List</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
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

            // SQL query to fetch student data
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            // Display student data
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"]. "</td>";
                    echo "<td>" . $row["email"]. "</td>";
                    echo "<td>" . $row["gender"]. "</td>";
                    echo "<td>" . $row["address"]. "</td>";
                    echo "<td>" . $row["phone"]. "</td>";
                    echo "<td><a href='EditStudent.php' class='btn'>Edit</a> <a href='delete_student.php' class='btn'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No students found.</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </table>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> NEI Student Management. All rights reserved.
    </footer>
</body>
</html>
