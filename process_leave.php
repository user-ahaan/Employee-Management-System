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
    $leaveId = $_POST['leave_id'];

    if (isset($_POST['approve'])) {
        $updateSql = "UPDATE leaves SET status='Approved' WHERE lid=$leaveId";
    } elseif (isset($_POST['reject'])) {
        $updateSql = "UPDATE leaves SET status='Rejected' WHERE lid=$leaveId";
    }

    if ($conn->query($updateSql) === TRUE) {
        header("Location: a_leave.php");
        exit();
    } else {
        echo "Error processing leave request: " . $conn->error;
    }
}

$conn->close();
?>
