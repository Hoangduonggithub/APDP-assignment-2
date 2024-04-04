<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to NEI Student Management</title>
    <style>
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
        .student-info-box {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .student-info {
            flex: 1; /* Student information takes up most of the space */
        }
        .student-info h2 {
            margin-top: 0;
            color: #007bff;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .student-info p {
            color: #555;
            margin-bottom: 10px;
        }
        .student-info p:last-child {
            margin-bottom: 0;
        }
        .student-image {
            flex-shrink: 0; /* Prevent image from shrinking */
            margin-left: 20px;
        }
        .student-image img {
            max-width: 100%; /* Ensure image does not exceed its container */
            border-radius: 8px;
        }
        
        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            float: right;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <h1>NEI Student Management</h1>
    </header>
        <nav>
            <a href="#">Home</a>
            <a href="Student.php">Students</a>
            <a href="course.php">Courses</a>
            <a href="index.php" class="logout-btn">Logout</a>

        </nav>
    </header>
    <div class="container">
        <!-- Student Information Section -->
        <div class="student-info">

            <?php
            session_start();
            // Database connection settings
            $servername = "localhost";
            $dbname = "NEI";

            // Create connection
            $conn = mysqli_connect('localhost','root','','NEI');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch student information
            $sql = "SELECT * FROM users"; 
            $result = $conn->query($sql);

            // Display student information
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='student-info-box'>";
                echo "<h2>Student Information</h2>";
                echo "<p><strong>Name:</strong> " . $row["username"] . "</p>";
                echo "<p><strong>ID:</strong> " . $row["user_id"] . "</p>";
                echo "<p><strong>Gender:</strong> " . $row["gender"] . "</p>";
                echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
                echo "<p><strong>Address:</strong> " . $row["address"] . "</p>";
                echo "<p><strong>Phone:</strong> " . $row["phone"] . "</p>";
                echo "</div>";
                }
            } else {
                echo "<tr><td colspan='2'>No student found.</td></tr>";
            }
            // Close connection
            $conn->close();
            ?>
        </div>
        <!-- End of Student Information Section -->
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> NEI Student Management. All rights reserved.
    </footer>
</body>
</html>

