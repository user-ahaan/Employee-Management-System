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
    $firstname = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $birthday =$_POST['birthday'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $dept = $_POST['dept'];
    $degree = $_POST['degree'];
    $salary = $_POST['salary'];
    
    $sql = "INSERT INTO `elogin` (`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `address`, `dept`, `degree`, `salary`) VALUES ('','$firstname','$lastName','$email','$password','$birthday','$gender','$contact','$address','$dept','$degree','$salary')";

    $result = mysqli_query($conn, $sql);

    if(($result) == 1){
        echo ("<SCRIPT>
        window.alert('Succesfully Registered.')
        window.location.href='add_employee.html';
        </SCRIPT>");
    }
    
    else{
        echo ("<SCRIPT>
        window.alert('Failed to Register.')
        window.location.href='add_employee.html';
        </SCRIPT>");
    }
}
?>