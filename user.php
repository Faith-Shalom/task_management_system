<?php
// Start session
session_start();

// Check if user is logged in
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    // OPTIONAL: Restrict to admin only
    if ($_SESSION['role'] != 'admin') {
        header("Location: index.php");
        exit();
    }

    // Include database and model
    include "app/DB_connection.php";
    include "app/Model/User.php";

    // Fetch all users
    $users = get_all_users($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Sidebar toggle -->
    <input type="checkbox" id="checkbox">

    <!-- Header -->
    <?php include "inc/header.php"; ?>

    <div class="body">

        <!-- Sidebar -->
        <?php include "inc/nav.php"; ?>

        <!-- Main content -->
        <section class="section-1">

            <!-- Title -->
            <h4 class="title">
                Manage Users 
                <a href="add-user.php">Add User</a>
            </h4>

            <!-- If users exist -->
            <?php if ($users != 0) { ?>

                <table class="main-table">

                    <!-- Table header -->
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>

                    <!-- Loop through users -->
                    <?php $i = 0; foreach ($users as $user) { ?>

                        <tr>
                            <!-- Counter -->
                            <td><?= ++$i ?></td>

                            <!-- User data (escaped for security) -->
                            <td><?= htmlspecialchars($user['full_name']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['role']) ?></td>

                            <!-- Actions -->
                            <td>
                                <a href="edit-user.php?id=<?= $user['id'] ?>" class="edit-btn">Edit</a>
                                <a href="delete-user.php?id=<?= $user['id'] ?>" 
                                   class="delete-btn"
                                   onclick="return confirm('Are you sure you want to delete this user?');">
                                   Delete
                                </a>
                            </td>
                        </tr>

                    <?php } ?>

                </table>

            <?php } else { ?>
                <!-- No users -->
                <h3>No users found</h3>
            <?php } ?>

        </section>
    </div>

    <!-- Highlight active menu -->
    <script>
        var active = document.querySelector("#navlist li:nth-child(2)");
        if (active) {
            active.classList.add("active"); // FIXED
        }
    </script>

</body>
</html>

<?php
} else {
    // Not logged in → redirect
    header("Location: login.php?error=First login");
    exit();
}
?>