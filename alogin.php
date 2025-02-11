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
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM alogin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // echo "Login successful";
        header('Location: admin_dashboard.html');
    } else {
        // echo "Username or Password is incorrect.";
        echo '<script>
            window.location.href="alogin.html";
            alert("Login failed. Invalid usernaame or password")
        </script>';
    }
}

$conn->close();
?>
