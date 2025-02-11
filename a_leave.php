<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM leaves";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Leaves - Admin Dashboard</title>

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
        <?php
        if ($result->num_rows > 0) {

            echo "<style>
            table {
                width: 100%;
            }

            th,td {
                text-align: center;
                padding: 8px;
            }

            th {
                background-color: #333;
                color: #ffffff;
            }
            </style>";

            echo "<table>
                    <tr>
                        <th>Leave ID</th>
                        <th>Employee ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["lid"] . "</td>
                        <td>" . $row["eid"] . "</td>
                        <td>" . $row["sdate"] . "</td>
                        <td>" . $row["edate"] . "</td>
                        <td>" . $row["reason"] . "</td>
                        <td>" . $row["status"] . "</td>
                        <td>
                            <form action='process_leave.php' method='post'>
                                <input type='hidden' name='leave_id' value='" . $row["lid"] . "'>
                                <button type='submit' name='approve'>Approve</button>
                                <button type='submit' name='reject'>Reject</button>
                            </form>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No leave requests found</p>";
        }
        ?>
    </div>

</body>
</html>

<?php
$conn->close();
?>
