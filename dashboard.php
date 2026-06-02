<?php

include '../config/database.php';

$query = mysqli_query($conn,
"SELECT * FROM products");

?>

<h1>Admin Dashboard</h1>

<a href="add_product.php">
Tambah Menu
</a>

<hr>

<table border="1" cellpadding="10">

<tr>
<th>No</th>
<th>Image</th>
<th>Name</th>
<th>Price</th>
<th>Action</th>
</tr>

<?php
$no = 1;

while($data = mysqli_fetch_array($query)){
?>

<tr>

<td><?php echo $no++; ?></td>

<td>
<img src="../uploads/<?php echo $data['image']; ?>"
width="100">
</td>

<td>
<?php echo $data['name']; ?>
</td>

<td>
Rp <?php echo number_format($data['price']); ?>
</td>

<td>

<a href="edit_product.php?id=<?php echo $data['id']; ?>">
Edit
</a>

|

<a href="delete_product.php?id=<?php echo $data['id']; ?>">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>