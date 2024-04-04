<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <?php
    if (isset($_POST["btnAdd"]))
    {
        $Rollno = $_POST['Rollno'];
        $Stname = $_POST['Stname'];
        $Address = $_POST['Address'];
        $Email = $_POST['Email'];
        if ($Rollno == ""|| $Stname == ""|| $Address == ""|| $Email == "")
        {
            echo"(*) is not empty"; 
        }
        else
        {   
            $conn = mysqli_connect('localhost','root','','College1')
            or die ("Can not connect database". mysqli_connect_error());
            $sql = "select * from student";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0)
            {
                $sql = "insert into Student value('$Rollno','$Stname','$Address','$Email')";
                mysqli_query($conn, $sql);
                echo '<meta http-equiv="refresh"content="0; URL = StundentList.php"/>';
            }
            else
            {
                echo "exitsted student in list";
            }
        }
    }
    ?>
    <form method="post" id = "AddStudent">
    <table align="center" border="1px" cellpadding="0" cellspacing="0"
        <caption align="center"><b> Adding Student</b></caption>
        <tr>
            <td>Rollno</td>
            <td><input type="text" name="Rollno"/>(*)</td>
        </tr>
        <tr>
            <td>Student Name</td>
            <td><input type="text" name="Stname"/>(*)</td>
        </tr>
        <tr>
            <td>Student Address</td>
            <td><input type="text" name="Address"/>(*)</td>
        </tr>
        <tr>
            <td>Student Email</td>
            <td><input type="text" name="Email"/>(*)</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <input type="submit" value="Add" name="btnAdd"/>
            <input type="reset" value="Cancel" name="btnCancel"/>
            </td>
        </tr>
    </table>
</body>
</html>