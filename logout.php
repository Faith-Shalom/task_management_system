<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session completely
session_destroy();

// OPTIONAL: Destroy session cookie (extra security)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000, // Expire cookie
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Redirect user to login page
header("Location: login.php");
exit();
?>