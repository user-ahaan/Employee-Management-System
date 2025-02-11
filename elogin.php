<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $employee_password = $_POST['employee_password'];

    $sql = "SELECT * FROM elogin WHERE id = '$employee_id' AND password = '$employee_password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $_SESSION['employee_id'] = $employee_id;
        header('Location: employee_dashboard.html');
    } else {
        echo '<script>
            window.location.href="elogin.html";
            alert("Login failed. Invalid usernaame or password")
        </script>';
    }
}

$conn->close();
?>
