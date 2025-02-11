<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!isset($_SESSION['employee_id'])) {
    header('Location: elogin.html');
    exit();
}

$employee_id = $_SESSION['employee_id'];

$sql = "SELECT * FROM elogin WHERE id = '$employee_id'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employee_name = $row['firstname'] . ' ' . $row['lastname'];
    $employee_email = $row['email'];
    $employee_birthday = $row['birthday'];
    $employee_gender = $row['gender'];
    $employee_contact = $row['contact'];
    $employee_address = $row['address'];
    $employee_dept = $row['dept'];
    $employee_degree = $row['degree'];
    $employee_salary = $row['salary'];
} else {
    $employee_name = $employee_email = $employee_birthday = $employee_gender = $employee_contact = '';
    $employee_address = $employee_dept = $employee_degree = $employee_salary = 'Details not found';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile-Employee Dashboard</title>
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

    <div class="info-container">
        <h1>Employee Profile:</h1>
        <h2>Name: <?php echo $employee_name; ?></h2>
        <h2>Email: <?php echo $employee_email; ?></h2>
        <h2>Birthday: <?php echo $employee_birthday; ?></h2>
        <h2>Gender: <?php echo $employee_gender; ?></h2>
        <h2>Contact: <?php echo $employee_contact; ?></h2>
        <h2>Address: <?php echo $employee_address; ?></h2>
        <h2>Department: <?php echo $employee_dept; ?></h2>
        <h2>Degree: <?php echo $employee_degree; ?></h2>
        <h2>Salary: <?php echo $employee_salary; ?></h2>
    </div>

    <footer>
        <p>&copy; 2023 Employee Management System</p>
    </footer>
</body>
</html>
