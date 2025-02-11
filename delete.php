<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Employee - Admin Dashboard</title>
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

        .form-container {
            display: grid;
            place-items: center;
            min-height: 500px;
        }

        .image-container img {
            max-width: 50px;
            height: 50px;
            border-radius: 8px;
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
    </style>
</head>
<body>

    <header>
        <div class="image-container">
            <img src="images/logo.jpg" alt="Logo">
        </div>

        <nav>
            <a href="admin_dashboard.html">Home</a>
            <a href="add_employee.html">Add Employee</a>
            <a href="edit.php">Update Employee</a>
            <a href="delete.php">Delete Employee</a>
            <a href="show-employee.php">View Employee</a>
            <a href="assign_project.html">Assign Project</a>
            <a href="show-project.php">Project Status</a>
            <a href="a_leave.php">Manage Leaves</a>
            <a href="index.html">Logout</a>
        </nav>
    </header>

    <div class="form-container">
    <form action="delete.php" method="get">
        <label for="employeeId">Employee ID:</label>
        <input type="number" id="id" name="id" required>
        <br>
        <br>
        <button type="submit">Delete Employee</button>
    </form>
    </div>

</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM elogin WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Employee deleted successfully";
    } else {
        echo "Error deleting employee: " . $conn->error;
    }
} else {
    echo "Employee ID not provided.";
}

$conn->close();
?>
