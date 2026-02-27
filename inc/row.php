<?php
// Start session (VERY IMPORTANT if not already started)
session_start();

// Optional safety check: redirect if not logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}
?>

<!-- Sidebar Navigation -->
<nav class="side-bar">

    <!-- User Profile Section -->
    <div class="user-p">
        <!-- Profile Image -->
        <img src="pic.png.jpg" alt="User Image">

        <!-- Display logged-in username -->
        <h4>@<?= htmlspecialchars($_SESSION['username']) ?></h4>
    </div>

    <?php if ($_SESSION['role'] == "employee") { ?>

        <!-- ================= EMPLOYEE NAVIGATION ================= -->
        <ul>

            <!-- Dashboard -->
            <li>
                <a href="index.php">
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- My Tasks -->
            <li>
                <a href="my_task.php">
                    <i class="fa fa-tasks"></i>
                    <span>My Task</span>
                </a>
            </li>

            <!-- Profile -->
            <li>
                <a href="profile.php">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Notifications -->
            <li>
                <a href="notification.php">
                    <i class="fa fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>

            <!-- Logout -->
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

    <?php } else { ?>

        <!-- ================= ADMIN NAVIGATION ================= -->
        <ul id="navlist">

            <!-- Dashboard -->
            <li>
                <a href="index.php">
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Manage Users -->
            <li class="active">
                <a href="user.php">
                    <i class="fa fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </li>

            <!-- Create Task -->
            <li>
                <a href="create_task.php">
                    <i class="fa fa-plus"></i>
                    <span>Create Task</span>
                </a>
            </li>

            <!-- All Tasks -->
            <li>
                <a href="tasks.php">
                    <i class="fa fa-tasks"></i>
                    <span>All Tasks</span>
                </a>
            </li>

            <!-- Notifications -->
            <li>
                <a href="notification.php">
                    <i class="fa fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>

            <!-- Logout -->
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

    <?php } ?>

</nav>