<link rel="stylesheet" href="style.css" />

<?php
$servername = "localhost";
$username = "root"; // Corrected missing quote
$password = ""; // Password can remain empty if no password is set
$dbname = "railway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Optionally, you might want to set the character set for the connection
$conn->set_charset("utf8");

// Your further database queries and operations will go here

?>
