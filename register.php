<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "chatbot";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $check_query = "SELECT * FROM user WHERE email='$email'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Insert new user into the database
        $insert_query = "INSERT INTO user (email, username, password) VALUES ('$email','$username', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1 style="margin-left: 45%; margin-right: 40%; margin-top: 5%;">Register</h1>
        <form style="margin-left: 25%; margin-right: 25%;" method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="username" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Register">
            <button class="btn btn-danger"><a href="login.php" class="text-light" style="text-decoration:none;">Sudah Punya Akun?</a></button>
        </form>
</body>
</html>



