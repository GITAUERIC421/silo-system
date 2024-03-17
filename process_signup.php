<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "silo";

$conn = new mysqli($servername, $username, $password, $dbname);
// database.github.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//connection.github

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successfull please Login');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
