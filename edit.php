<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee - Admin Dashboard</title>
    
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

<html>
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
        <form action="edit.php" method="POST">
            <h2>Update Employee</h2>
            <div>
                <input type="number" placeholder="id" name="id">
            </div>
            <div>
                <input type="text" placeholder="First Name" name="firstName">
            </div>
            <div>
                <input type="text" placeholder="Last Name" name="lastName">
            </div>
            <div>
                <input type="email" placeholder="Email" name="email">
            </div>
            <div>
                <p>Birthday</p>
                <input type="date" placeholder="BIRTHDATE" name="birthday">
            </div>
            <div>
                <input type="password" placeholder="Password" id="password" name="password">
            </div>
            <div>
                <select name="gender">
                    <option disabled="disabled" selected="selected">GENDER</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <div class="select-dropdown"></div>
            </div>
            <br>
            <div>
                <input type="number" placeholder="Contact Number" name="contact">
            </div>

             <div>
                <input type="text" placeholder="Address" name="address">
            </div>

            <div>
                <input type="text" placeholder="Department" name="dept">
            </div>

            <div>
                <input type="text" placeholder="Degree" name="degree">
            </div>
            <div>
                <input type="number" placeholder="Salary" name="salary">
            </div>
            <div>
                <button type="submit">Update</button>
            </div>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $fieldsToUpdate = array('firstName', 'lastName', 'email', 'password', 'birthday', 'gender', 'contact', 'address', 'dept', 'degree', 'salary');

    $updateFields = array();

    foreach ($fieldsToUpdate as $field) {
        if (isset($_POST[$field]) && !empty($_POST[$field])) {
            $updateFields[] = "$field='" . $_POST[$field] . "'";
        }
    }

    if (!empty($updateFields)) {
        $updateFieldsString = implode(", ", $updateFields);
        $sql = "UPDATE elogin SET $updateFieldsString WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Employee details updated successfully";
        } else {
            echo "Error updating employee details: " . $conn->error;
        }
    } else {
        echo "No fields provided for update.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
