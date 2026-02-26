<!-- php
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "task_management_db";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: ".$e->getMessage();
    exit;
} -->

<?php
// Database server (localhost = your computer)
$sName = "localhost";

// MySQL username (default for XAMPP)
$uName = "root";

// Your MySQL password (you set this earlier)
$pass = "1234";

// Database name
$db_name = "task_management_db";

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);

    // Tell PDO to show errors clearly (important for debugging)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    // Stop everything if connection fails
    die("Connection failed: " . $e->getMessage());
}
?>