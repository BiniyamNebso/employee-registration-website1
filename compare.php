<?php
include ('server.php');
// Connect to the database
$name = "name";
$email = "email";
$password1 = "password";
$password = $password1;


try {
    $conn = new PDO("mysql:host=$name;dbname=$email", $password1, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Retrieve entered name, email, and password
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute a SELECT query
$stmt = $conn->prepare("SELECT * FROM users WHERE name = :name AND email = :email AND password = :password");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Check if any records match the entered credentials
if($stmt->rowCount() > 0) {
    // Credentials matched, do something
    echo '<form method="post" action="homepage.html"><input type="submit"/></form>';
} else {
    // Credentials didn't match, do something else
    echo "wrong entry try again";
}

// Close the connection
$conn = null;
?>