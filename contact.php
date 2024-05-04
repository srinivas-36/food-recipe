<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database server is hosted elsewhere
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "foodrecipe"; // Name of your database
$table = "contact"; // Name of the table

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS $table (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    text TEXT NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// If form is submitted, insert data into table
if (isset($_POST['submit'])) {
    // Retrieving form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    // Sanitizing data (preventing SQL injection)
    $name = mysqli_real_escape_string($conn, $name);
    $phone = mysqli_real_escape_string($conn, $phone);
    $email = mysqli_real_escape_string($conn, $email);
    $text = mysqli_real_escape_string($conn, $text);

    // Inserting data into the table
    $sql_insert_data = "INSERT INTO $table (name, phone, email, text)
                        VALUES ('$name', '$phone', '$email', '$text')";

    if ($conn->query($sql_insert_data) === TRUE) {
        echo "<script>alert('Contact sent Successful');
    window.location.href = 'home.html';
    </script>";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

$conn->close();
?>