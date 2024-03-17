<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    
</head>
<style>
            body {
            font-family: Arial, sans-serif;
            background-image: url(image/images.jpeg);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        form {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-container {
            background-color: red;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }
        .forgot button  {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .forgot button:hover {
    background-color: #109ed6;
        }
</style>
<body>

<div class="login-container">
<form class="forgot" action="reset_password.php" method="post">
    <h2>Forgot Password</h2>
        <label for="email">Enter Email:</label>
        <input type="email" id="email" name="email" required>
        <br> <br>
        <button type="submit">Reset Password</button>
        <br>
        <p>Remember Password<a href="index.php">  Login</a></p>
    </form>
</div>

</body>
</html>
.