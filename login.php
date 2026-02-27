<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Task Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-body">

    <!-- Login Form -->
    <form method="POST" action="app/login.php" class="shadow p-4">

        <!-- Title -->
        <h3 class="display-4 text-center">LOGIN</h3>

        <!-- Error message -->
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php } ?>

        <!-- Success message -->
        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($_GET['success']) ?>
            </div>
        <?php } ?>

        <!-- Username input -->
        <div class="mb-3">
            <label class="form-label">User name</label>
            <input type="text" class="form-control" name="user_name" required>
        </div>

        <!-- Password input -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary w-100">Login</button>

    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>