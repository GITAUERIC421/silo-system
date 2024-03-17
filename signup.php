<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .signup-container {
            background-color: #fbc9c9;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        .signup-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .signup-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .signup-form button {
            background-color: #1256ea;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .signup-form button:hover {
            background-color: #5894ef;
        }

        /* Corrected inline style for the anchor tag */
        .signup-form p a {
            color: yellow;
            text-decoration: none;
        }

        .signup-form p a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="signup-container">
    <h2>Signup</h2>
    <form class="signup-form" action="process_signup.php" method="post">
        <input type="text" placeholder="Username" name="username" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="email" placeholder="Email" name="email" required>
        <button type="submit">Signup</button>
        <br>
        <p>Already have an account <a href="index.php"><b>Login</b></a></p>
    </form>
</div>

</body>
</html>
