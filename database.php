<?php

include('server.php');
// Define database connection variables
$name = "name";
$email = "email";
$password1 = "password";
$password = $password1;

// Create database connection
$conn = new mysqli($hostname,$username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table to store user information
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
)";

if (isset($_POST['submit']))
{
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $password1 = mysqli_real_escape_string($con, $_POST['password']);
  $password = md5($password1);

  	$query = "INSERT INTO xristes (email,name, password) VALUES('$email','$name','$password')";
  	mysqli_query($con, $query);
    header('location:login.html');
  }
if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>