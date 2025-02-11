<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Project - Employee Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 100%;
            height: 60px;
        }


        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2em;
        }

        .image-container {
            margin: 2em;
            text-align: center;
        }

        .image-container img {
            max-width: 50px;
            height: 50px;
            border-radius: 8px;
        }

        .info-container {
            text-align: center;
            margin: 2em;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        form {
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 1em;
        }

        input {
            width: 100%;
            padding: 0.5em;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 0.5em 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container {
            display: grid;
            place-items: center;
            min-height: 500px;
        }

        form {
            width: 50%;
        }
    </style>
</head>
<body>

    <header>
        <div class="image-container">
            <img src="images/logo.jpg" alt="Logo">
        </div>

        <nav>
            <a href="employee_dashboard.html">Home</a>
            <a href="profile.php">View Profile</a>
            <a href="edit_profile.php">Update Profile</a>
            <a href="emp_project.php">My Project</a>
            <a href="sub_project.php">Submit Project</a>
            <a href="emp_leave.php">Leave Request</a>
            <a href="show_emp_leave.php">My Leaves</a>
            <a href="index.html">Logout</a>
        </nav>
    </header>

    <div class="form-container">
        <form action="sub_project.php" method="post">
            <label for="projectId">Project ID:</label>
            <input type="number" id="projectId" name="projectId" required>
            <br>
            <br>
            <button type="submit">Submit Project</button>
        </form>
    </div>

</body>
</html>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectId = $_POST['projectId'];
    $employeeId = $_SESSION['employee_id'];

    $updateSql = "UPDATE project SET status='Submitted', subdate=NOW() WHERE pid=$projectId AND eid=$employeeId";

    if ($conn->query($updateSql) === TRUE) {
        echo "Project submitted successfully";
    } else {
        echo "Error submitting project: " . $conn->error;
    }
}

$conn->close();
?>
