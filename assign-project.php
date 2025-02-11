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
    $employeeId = $_POST['eid'];
    $projectName = $_POST['pname'];
    $dueDate = $_POST['dueDate'];

    $sql = "INSERT INTO `project`(`eid`, `pname`, `duedate` , `status`) VALUES ('$employeeId' , '$projectName' , '$dueDate' , 'Due')";
    $result = mysqli_query($conn, $sql);

    if (($result) == 1) {
        echo ("<SCRIPT>
            window.alert('Project Assigned Successfully.')
            window.location.href='assign_project.html';
            </SCRIPT>");
    } else {
        echo ("<SCRIPT>
            window.alert('Failed to Assign Project.')
            window.location.href='assign_project.html';
            </SCRIPT>");
    }
}

$conn->close();
?>
