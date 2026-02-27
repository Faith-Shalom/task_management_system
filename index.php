<?php
// Start session to access user data
session_start();

// Check if user is logged in
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Sidebar toggle checkbox -->
    <input type="checkbox" id="checkbox">

    <!-- Include header (top bar) -->
    <?php include "inc/header.php"; ?>

    <div class="body">

        <!-- Include sidebar navigation -->
        <?php include "inc/nav.php"; ?>

        <!-- Main content area -->
        <section class="section-1">

            <!-- Welcome message -->
            <h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h2>

            <!-- Role display -->
            <p>Your role: <strong><?= $_SESSION['role'] ?></strong></p>

            <!-- Simple dashboard content -->
            <div class="dashboard-boxes">

                <div class="box">
                    <i class="fa fa-tasks"></i>
                    <h3>Tasks</h3>
                    <p>Manage your tasks</p>
                </div>

                <div class="box">
                    <i class="fa fa-users"></i>
                    <h3>Users</h3>
                    <p>Manage users</p>
                </div>

                <div class="box">
                    <i class="fa fa-bell"></i>
                    <h3>Notifications</h3>
                    <p>View updates</p>
                </div>

            </div>

        </section>
    </div>

</body>
</html>

<?php
} else {
    // If user is not logged in → redirect to login page
    header("Location: login.php?error=First login");
    exit();
}
?>