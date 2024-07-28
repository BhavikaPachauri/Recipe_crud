<?php
$servername = "db";
$username = "user";
$password = "password";
$dbname = "recipe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
