<?php
// Assuming you have a database connection.
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a table named 'your_table_name' with columns 'column_to_check' and 'column_to_update'
    $reset_token = $_POST["current_value"];  // Value to check
    $new_value = $_POST["new_value"];  // New value
    $confirm_value = $_POST["confirm_value"];  // Confirm value

    // Check if the new value and confirmation match
    if ($new_value === $confirm_value) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE user SET password=? WHERE reset_token=?");
        $stmt->bind_param("ss", $new_value, $reset_token);

        if ($stmt->execute()) {
            echo "<script>alert('Password changed successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "error changing email please contact Admin: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Confirmation value does not match the new value. Please try again.";
    }
}

$conn->close();
?>

<!-- HTML form for user input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Row</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #109ed6;
            background-image: url(image/images.jpeg);
        }

        form {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="current_value">Verification code:</label>
        <input type="text" name="current_value" required><br>

        <label for="new_value">New Password:</label>
        <input type="password" name="new_value" required><br>

        <label for="confirm_value">Confirm Password:</label>
        <input type="password" name="confirm_value" required><br>

        <input type="submit" value="Confirm">
    </form>
</body>
</html>

