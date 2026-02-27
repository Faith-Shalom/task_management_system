<?php
// Start session
session_start();

// Check if user is logged in
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    // OPTIONAL: Restrict access to only admin
    if ($_SESSION['role'] != 'admin') {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Your custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Sidebar toggle checkbox -->
    <input type="checkbox" id="checkbox">

    <!-- Header -->
    <?php include "inc/header.php"; ?>

    <div class="body">

        <!-- Sidebar navigation -->
        <?php include "inc/nav.php"; ?>

        <!-- Main content -->
        <section class="section-1">

            <!-- Page title -->
            <h4 class="title">
                Add User 
                <a href="user.php">Users</a>
            </h4>

            <!-- Display error message if exists -->
            <?php if (isset($_GET['error'])) { ?>
                <p style="color:red;"><?=$_GET['error']?></p>
            <?php } ?>

            <!-- Display success message -->
            <?php if (isset($_GET['success'])) { ?>
                <p style="color:green;"><?=$_GET['success']?></p>
            <?php } ?>

            <!-- Add user form -->
            <form class="form-1" method="POST" action="app/add-user.php">

                <!-- Full Name -->
                <div class="input-holder">
                    <label>Full Name:</label>
                    <input type="text" name="full_name" class="input-1" placeholder="Full Name" required>
                </div>

                <!-- Username -->
                <div class="input-holder">
                    <label>Username:</label>
                    <input type="text" name="user_name" class="input-1" placeholder="Username" required>
                </div>

                <!-- Password -->
                <div class="input-holder">
                    <label>Password:</label>
                    <input type="password" name="password" class="input-1" placeholder="Password" required>
                </div>

                <!-- Submit button -->
                <button type="submit" class="edit-btn">Add User</button>

            </form>

        </section>
    </div>

    <!-- Highlight active menu -->
    <script>
        var active = document.querySelector("#navlist li:nth-child(2)");
        if (active) {
            active.classList.add("active"); // FIXED: classList (not classlist)
        }
    </script>

</body>
</html>

<?php
} else {
    // If not logged in → redirect to login
    header("Location: login.php?error=First login");
    exit();
}
?>