<?php

session_start();

include 'config/database.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");

    $data = mysqli_fetch_array($query);

    if(password_verify($password, $data['password'])){

        $_SESSION['user'] = $data;

        header("Location:index.php");

    }

}

?>

<form method="POST">

<input type="email" name="email">
<input type="password" name="password">

<button name="login">Login</button>

</form>