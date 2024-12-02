<?php
// Include the database configuration file
require_once "config.php";

// Start a session to store user data
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    // Query to find the user with the entered email
    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Fetch user details
        $user = mysqli_fetch_assoc($result);
        
        // Verify the entered password with the stored hashed password
        if (password_verify($password, $user['password'])) {
            // Start a session and store user info
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            // Redirect to the main (homepage) after successful login
            header("Location: client/main.php");
            exit;
        } else {
            echo "<div class='error'>Incorrect password.</div>";
        }
    } else {
        echo "<div class='error'>No user found with that email.</div>";
    }

    // Close the database connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url(assets/download.gif);">

    <header>
        <div class="logo">
            <img src="assets/logo.png" alt="Logo" style="max-width: 100px;">
        </div>
    </header>

    <h3>Login</h3>
    <div class="loginForm">
        <form action="login.php" method="POST">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" id="loginButton">Login</button>
        </form>
    </div>

    <h4><a href="login.php">Forgot Password?</a> </h4>
    <h4><a href="createAcc.php">Create New Account</a> </h4>

    <footer>
        <p>&copy; 2024 Footprints Printing Services</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
