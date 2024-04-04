<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        /* CSS styles remain unchanged */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
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
        form {
            margin-top: 20px;
        }
        input[type="text"], input[type="number"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: calc(100% - 20px);
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
        <h1>Edit Student</h1>
    </header>

    <div class="container">
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

        // Check if ID parameter is provided

            // Fetch student data from the database
            $sql = "SELECT * FROM users ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $gender = $row['gender'];
                $email = $row['email'];
                $address = $row['address'];
                $phone = $row['phone'];

                // Display edit form
                echo "<form action='update_student.php' method='post'>";
                echo "<input type='text' name='name' placeholder='Name' value='$username' required>";
                echo "<input type='text' name='gender' placeholder='Gender' value='$gender' required>";
                echo "<input type='email' name='email' placeholder='Email' value='$email' required>";
                echo "<input type='text' name='address' placeholder='Address' value='$address' required>";
                echo "<input type='text' name='phone' placeholder='Phone' value='$phone' required>";
                echo "<input type='submit' value='Update Student'>";
                echo "</form>";
            } else {
                echo "Student not found.";
            }
        
    
        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
