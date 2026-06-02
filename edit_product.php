<?php

include '../config/database.php';

$id = $_GET['id'];

$query = mysqli_query($conn,
"SELECT * FROM products WHERE id='$id'");

$data = mysqli_fetch_array($query);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $price = $_POST['price'];

    mysqli_query($conn,
    "UPDATE products SET
    name='$name',
    price='$price'
    WHERE id='$id'");

    header("Location:dashboard.php");

}

?>

<form method="POST">

<input type="text"
name="name"
value="<?php echo $data['name']; ?>">

<input type="number"
name="price"
value="<?php echo $data['price']; ?>">

<button name="update">
Update
</button>

</form>