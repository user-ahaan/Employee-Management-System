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
    $current_firstname = $row['firstname'];
    $current_lastname = $row['lastname'];
    $current_email = $row['email'];
    $current_birthday = $row['birthday'];
    $current_gender = $row['gender'];
    $current_contact = $row['contact'];
    $current_address = $row['address'];
} else {
    echo "Employee details not found.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_firstname = $_POST['firstname'];
    $new_lastname = $_POST['lastname'];
    $new_email = $_POST['email'];
    $new_birthday = $_POST['birthday'];
    $new_gender = $_POST['gender'];
    $new_contact = $_POST['contact'];
    $new_address = $_POST['address'];

    $update_sql = "UPDATE elogin SET 
        firstName='$new_firstname', 
        lastName='$new_lastname', 
        email='$new_email', 
        birthday='$new_birthday', 
        gender='$new_gender', 
        contact='$new_contact', 
        address='$new_address'
        WHERE id=$employee_id";

    if ($conn->query($update_sql) === TRUE) {
        header('Location: edit_profile.php');
        exit();
    } else {
        echo "Error updating employee details: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile - Employee Dashboard</title>
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
        <form action="edit_profile.php" method="POST">
            <h1>Update Profile</h1>
            <input type="text" name="firstname" placeholder="First Name" value="<?php echo $current_firstname; ?>" required>
            <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $current_lastname; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $current_email; ?>" required>
            <input type="date" name="birthday" value="<?php echo $current_birthday; ?>" required>
            <select name="gender">
                <option value="Male" <?php echo ($current_gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($current_gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo ($current_gender == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
            <br>
            <br>
            <input type="number" name="contact" placeholder="Contact Number" value="<?php echo $current_contact; ?>" required>
            <input type="text" name="address" placeholder="Address" value="<?php echo $current_address; ?>" required>
            <button type="submit">Update Profile</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Employee Management System</p>
    </footer>
</body>
</html>
