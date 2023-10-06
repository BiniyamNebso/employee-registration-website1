<?php

include('server.php');

    //Import data into db

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

    mysqli_close($con);

?>
