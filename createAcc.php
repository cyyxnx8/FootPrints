<?php
// Include the database configuration file
require_once "config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $phone_number = mysqli_real_escape_string($link, $_POST['phoneNumber']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($link, $_POST['confirm-password']);

    // Validate passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (username, phone_number, address, email, password) VALUES ('$username', '$phone_number', '$address', '$email', '$hashed_password')";
    if (mysqli_query($link, $sql)) {
        // Redirect to the login page after successful registration
        header("Location: login.php");
        exit;
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
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
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url(assets/download.gif);">
    <header>
        <div id="navbar">
            <div class="logo">
                <img src="assets/logo.png" alt="Logo" style="max-width: 100px;">
            </div>
            <nav>
                <ul>
                    <li><a href="landing.php">BACK</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="create">
        <h1>CREATE NEW ACCOUNT</h1>
    </div>

    <div class="createForm">
        <form id="new" action="createAcc.php" method="POST">
            <label for="name">USERNAME</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

           
            <label for="phoneNumber">PHONE NUMBER</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>

            <label for="address">ADDRESS</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>

            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required placeholder="Confirm Password">
          
   

            <button type="submit" id="createAccountButton">Sign Up</button>

            <div class="create">
                <h3>Already Registered?<a href="login.php"> Login</a></h3>
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Footprints Printing Services</p>
    </footer>
    
    <script src="script.js"></script>
 
</body>
</html>
