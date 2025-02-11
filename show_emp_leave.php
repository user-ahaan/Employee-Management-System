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

if (!isset($_SESSION['employee_id'])) {
    header('Location: elogin.html');
    exit();
}

$employeeId = $_SESSION['employee_id'];

$sql = "SELECT * FROM leaves WHERE eid = $employeeId";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leaves - Employee Dashboard</title>
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
            background-color: #f2f2f2;
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
        <h1>My Leaves</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Leave ID</th><th>Start Date</th><th>End Date</th><th>Reason</th><th>Status</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['lid'] . "</td>";
                echo "<td>" . $row['sdate'] . "</td>";
                echo "<td>" . $row['edate'] . "</td>";
                echo "<td>" . $row['reason'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No leaves requested</p>";
        }
        ?>
    </div>

    <footer>
        <!-- Your footer content here -->
    </footer>

</body>
</html>

<?php
$conn->close();
?>
