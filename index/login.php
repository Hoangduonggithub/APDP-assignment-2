<?php
session_start();

// Database connection settings
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$dbname = "NEI"; // Change this to the name of your MySQL database

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create connection
    $conn = mysqli_connect('localhost','root','','NEI');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch user data
    $stmt = $conn->prepare("SELECT username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User found, fetch password and role from database
        $stmt->bind_result($db_username, $db_password, $db_role);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $db_password)) {
            // Authentication successful, set session variables
            $_SESSION['username'] = $username;
            
            // Redirect to respective pages based on user's role
            if ($db_role == 'Admin') {
                header("Location: admindashboard.php"); // Redirect to admin page
            } else {
                header("Location: userdashboard.php"); // Redirect to user page
            }
            exit();
        } else {
            // Authentication failed, show error message
            $error = "Invalid username or password";
        }
    } else {
        // User not found, show error message
        $error = "Invalid username or password";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <?php if(isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
    </div>
</body>
</html>
