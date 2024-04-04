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

    // Fetch course data from the database based on the provided course ID
    $sql = "SELECT * FROM courses WHERE course_id = $course_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Course found, display edit form
        $row = $result->fetch_assoc();
        $course_name = $row['course_name'];
        $description = $row['description'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Course</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
            <style>
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
                label {
                    font-weight: bold;
                }
                input[type="text"],
                input[type="date"],
                textarea,
                input[type="submit"] {
                    width: 100%;
                    padding: 10px;
                    margin-top: 8px;
                    margin-bottom: 16px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    box-sizing: border-box;
                }
                textarea {
                    height: 100px;
                }
                input[type="submit"] {
                    background-color: #007bff;
                    color: white;
                    border: none;
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
                <h1>Edit Course</h1>
            </header>

            <div class="container">
                <form action="update_course.php" method="post">
                    <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                    <label for="course_name">Course Name</label>
                    <input type="text" id="course_name" name="course_name" value="<?php echo $course_name; ?>" required>
                    
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required><?php echo $description; ?></textarea>

                    <label for="start_date">Start Date</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>" required>

                    <label for="end_date">End Date</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo $end_date; ?>" required>
                    
                    <input type="submit" value="Update Course">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Course not found.";
    }
} else {
    echo "No course ID provided.";
}

// Close connection
$conn->close();
?>
