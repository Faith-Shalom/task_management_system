<!-- Save this file in your htdocs , open it on your browswer so it checks if you can connect to the database -->
 <!-- Put your own xampp pasword here ($pass = "1234";) ...my password is 1234 thats why i have 1 to 4 there-->


<?php
// Server name (localhost means your own computer)
$sName = "localhost";

// MySQL username (default in XAMPP is root)
$uName = "root";

// MySQL password (use the one you set, e.g., "1234")
$pass = "1234";

// Name of the database you want to connect to
$db_name = "task_management_db";

try {
    // Create a new PDO connection to MySQL
    // Format: "mysql:host=SERVER_NAME;dbname=DATABASE_NAME"
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);

    // Set error mode to exception
    // This helps show errors clearly instead of silent failures
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If connection is successful, display message
    echo "✅ Connection successful";

} catch(PDOException $e){
    // If connection fails, show error message
    echo "❌ Connection failed: " . $e->getMessage();

    // Stop the script from continuing
    exit;
}
?>