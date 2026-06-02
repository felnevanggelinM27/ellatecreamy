<?php

include 'config/database.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users(name,email,password)
    VALUES('$name','$email','$password')");

    header("Location: login.php");

}

?>

<form method="POST">

<input type="text" name="name" placeholder="Name">
<input type="email" name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">

<button name="register">Register</button>

</form>