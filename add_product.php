<?php

include '../config/database.php';

if(isset($_POST['save'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp,
    "../uploads/".$image);

    mysqli_query($conn,
    "INSERT INTO products(name,price,description,image)
    VALUES('$name','$price','$description','$image')");

    echo "Success";

}

?>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="Product Name">

<input type="number" name="price" placeholder="Price">

<textarea name="description"></textarea>

<input type="file" name="image">

<button name="save">Save</button>

</form>