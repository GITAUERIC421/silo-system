<?php
// Assuming you have a users table in your database with columns id, email, verification_code, and verification_time

// Database connection.
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_db";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email from the form
    $email = $_POST["email"];

    // Generate a random 4-digit number
    $verification_code = sprintf('%04d', rand(0, 9999));

    // Set the expiration time for the verification code (e.g., 5 minutes)
    $verification_time = time() + 300;

    // Update the database with the verification code and time
    $sql = "UPDATE user SET reset_token='$verification_code', password_reset_time='$verification_time' WHERE email='$email'";
    
    if ($conn->query($sql) === TRUE) {
        // Send the email with the verification code
        $to = $email;
        $subject = "Password Reset Verification Code";
        $message = "Your verification code is: $verification_code";
        $headers = "From: your_email@example.com";

        mail($to, $subject, $message, $headers);

        echo "<script>alert('Verification code sent to your email.');</script>";
        echo "<script>window.location.href = 'confirm_password.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

