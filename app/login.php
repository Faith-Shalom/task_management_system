<?php
// Start session to store user data after login
session_start();

// Check if form was submitted
if (isset($_POST['user_name']) && isset($_POST['password'])) {

    // Include database connection
    include "../app/DB_connection.php";

    // Function to clean user input (basic security)
    function validate_input($data) {
        return htmlspecialchars(trim($data));
    }

    // Get and sanitize input values
    $user_name = validate_input($_POST['user_name']);
    $password  = validate_input($_POST['password']);

    // Check if username is empty
    if (empty($user_name)) {
        header("Location: ../login.php?error=User name is required");
        exit(); // stop script
    }

    // Check if password is empty
    if (empty($password)) {
        header("Location: ../login.php?error=Password is required");
        exit();
    }

    // Prepare SQL query to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    // Execute query with user input
    $stmt->execute([$user_name]);

    // Check if exactly one user was found
    if ($stmt->rowCount() === 1) {

        // Fetch user data from database
        $user = $stmt->fetch();

        // Verify entered password with hashed password in DB
        if (password_verify($password, $user['password'])) {

            // Store user info in session
            $_SESSION['role']     = $user['role'];
            $_SESSION['id']       = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to dashboard/home page
            header("Location: ../index.php");
            exit();

        } else {
            // Password is incorrect
            header("Location: ../login.php?error=Incorrect username or password");
            exit();
        }

    } else {
        // No user found with that username
        header("Location: ../login.php?error=User not found");
        exit();
    }

} else {
    // If page accessed without form submission
    header("Location: ../login.php?error=Unknown error occurred");
    exit();
}
?>