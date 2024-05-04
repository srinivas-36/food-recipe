<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database server is hosted elsewhere
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "foodrecipe"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname"; // SQL query to create the database

if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Connect to the newly created database
$conn->select_db($dbname);

// Create table
$sql_create_table = "CREATE TABLE IF NOT EXISTS logins (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone BIGINT(15) NOT NULL,
    gender ENUM('m', 'f', 'o') NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table logins created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close(); // Close the connection
?>