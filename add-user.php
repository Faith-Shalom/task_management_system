<?php
session_start();

// Check login
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    // Only admin allowed
    if ($_SESSION['role'] != 'admin') {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<input type="checkbox" id="checkbox">

<?php include "inc/header.php"; ?>

<div class="body">
    <?php include "inc/nav.php"; ?>

    <section class="section-1">

        <h4 class="title">
            Add User 
            <a href="user.php">Users</a>
        </h4>

        <!-- Error -->
        <?php if (isset($_GET['error'])) { ?>
            <p style="color:red;"><?=$_GET['error']?></p>
        <?php } ?>

        <!-- Success -->
        <?php if (isset($_GET['success'])) { ?>
            <p style="color:green;"><?=$_GET['success']?></p>
        <?php } ?>

        <form class="form-1" method="POST" action="app/add-user.php">

            <!-- Full Name -->
            <div class="input-holder">
                <label>Full Name:</label>
                <input type="text" name="full_name" class="input-1" required>
            </div>

            <!-- Username -->
            <div class="input-holder">
                <label>Username:</label>
                <input type="text" name="user_name" class="input-1" required>
            </div>

            <!-- Password with eye -->
            <div class="input-holder" style="position: relative;">
                <label>Password:</label>
                <input type="password" id="password" name="password" class="input-1" required>

                <i class="fa fa-eye" onclick="togglePassword()" 
                   style="position:absolute; right:15px; top:35px; cursor:pointer;"></i>
            </div>

            <button type="submit" class="edit-btn">Add User</button>

        </form>

    </section>
</div>

<script>
// Toggle password visibility
function togglePassword() {
    let p = document.getElementById("password");
    p.type = (p.type === "password") ? "text" : "password";
}

// Active menu fix
var active = document.querySelector("#navlist li:nth-child(2)");
if (active) active.classList.add("active");
</script>

</body>
</html>

<?php
} else {
    header("Location: login.php?error=First login");
    exit();
}
?>