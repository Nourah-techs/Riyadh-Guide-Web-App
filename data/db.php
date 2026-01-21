<?php
// Database connection configuration
// Note: Use environment variables or secure storage for production credentials
$host = '127.0.0.1'; 
$user = 'DB_USER_REPLACE_ME'; 
$password = 'DB_PASS_REPLACE_ME'; 
$database = 'riyadh_guide_db'; 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
