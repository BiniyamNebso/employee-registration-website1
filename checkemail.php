<?php
include 'server.php';

//question based on whether the email entered by the user exists

 $email = mysqli_real_escape_string($con, $_POST["email"]);
 $query = "SELECT * FROM xristes WHERE email = '".$email."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);


?>
