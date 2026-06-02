<?php

include 'config/database.php';

$id = $_GET['id'];

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");

$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Detail Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background:#f8f5f1;
    font-family:Poppins;
}

.detail-card{
    background:white;
    border-radius:30px;
    padding:40px;
    margin-top:80px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

img{
    border-radius:25px;
}

.btn-order{
    background:#d4a373;
    border:none;
    color:white;
    padding:15px;
    width:100%;
    border-radius:15px;
    font-weight:600;
}

.price{
    font-size:35px;
    color:#d4a373;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<div class="detail-card">

<div class="row">

<div class="col-lg-6">

<img src="<?php echo $data['image']; ?>"
class="img-fluid">

</div>

<div class="col-lg-6">

<h1>
<?php echo $data['name']; ?>
</h1>

<p class="mt-3">
<?php echo $data['description']; ?>
</p>

<div class="price mb-4">
Rp <?php echo number_format($data['price']); ?>
</div>

<form action="cart.php" method="POST">

<input type="hidden"
name="product_id"
value="<?php echo $data['id']; ?>">

<!-- TEMPERATURE -->

<label class="fw-bold mb-2">
Choose Temperature
</label>

<select name="temperature"
class="form-select mb-3">

<option value="Hot">
Hot ☕
</option>

<option value="Ice">
Ice ❄
</option>

</select>

<!-- SIZE -->

<label class="fw-bold mb-2">
Choose Size
</label>

<select name="size"
class="form-select mb-3">

<option value="Regular">
Regular
</option>

<option value="Large">
Large + Rp 5.000
</option>

</select>

<!-- QTY -->

<label class="fw-bold mb-2">
Quantity
</label>

<input type="number"
name="qty"
value="1"
class="form-control mb-4">

<button class="btn-order">

🛒 Add To Cart

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>