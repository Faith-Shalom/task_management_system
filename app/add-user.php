<?php
session_start();

if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    if (isset($_POST['user_name']) && isset($_POST['password']) && isset($_POST['full_name'])) {

        include "../app/DB_connection.php";

        function validate_input($data) {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        $user_name = validate_input($_POST['user_name']);
        $password  = validate_input($_POST['password']);
        $full_name = validate_input($_POST['full_name']);

        // Validation
        if (empty($user_name)) {
            header("Location: ../add-user.php?error=Username required");
            exit();
        }

        if (empty($password)) {
            header("Location: ../add-user.php?error=Password required");
            exit();
        }

        if (empty($full_name)) {
            header("Location: ../add-user.php?error=Full name required");
            exit();
        }

        // 🔥 HASH PASSWORD (THIS FIXES YOUR LOGIN ISSUE)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if username exists
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_name]);

        if ($stmt->rowCount() > 0) {
            header("Location: ../add-user.php?error=Username already exists");
            exit();
        }

        // Insert user
        $sql = "INSERT INTO users (full_name, username, password, role)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$full_name, $user_name, $hashed_password, 'employee']);

        header("Location: ../add-user.php?success=User created successfully");
        exit();

    } else {
        header("Location: ../add-user.php?error=Unknown error");
        exit();
    }

} else {
    header("Location: ../login.php?error=First login");
    exit();
}