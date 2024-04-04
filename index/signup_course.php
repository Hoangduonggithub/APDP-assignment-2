<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Sign-Up</title>
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
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Course Sign-Up</h1>
        <nav>
            <a href="userdashboard.php">Home</a>
        </nav>
    </header>

    <div class="container">
        <form action="usercourse.php" method="post">
            <label for="course">Select Course:</label>
            <select name="course" id="course">
                <?php
                // Fetch course data from the database
                $servername = "localhost";
                $dbname = "NEI";
                $conn = new mysqli($servername, "root", "", $dbname);

                $sql = "SELECT * FROM courses";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No courses available</option>";
                }

                $conn->close();
                ?>
            </select>
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
