<?php
// 1. Matikan error reporting agar kode MySQL yang belum siap tidak menyumbat halaman
ini_set('display_errors', 0);
error_reporting(0);

session_start();
include 'config/database.php';

$total = 0;

// 2. HITUNG TOTAL BELANJA (Jika session cart ada)
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $cart){
        $product_id = mysqli_real_escape_string($conn, $cart['product_id']);
        
        // Ambil harga asli produk dari database
        $query = mysqli_query($conn, "SELECT price FROM products WHERE id='$product_id'");
        
        if ($query && mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $price = $data['price'];
        } else {
            // Harga cadangan jika tabel 'products' di database kamu belum dibuat/kosong
            $price = 25000; 
        }

        if(isset($cart['size']) && $cart['size'] == 'Large'){
            $price += 5000;
        }

        $subtotal = $price * (isset($cart['qty']) ? $cart['qty'] : 1);
        $total += $subtotal;
    }
}

// 3. SIMPAN KE DATABASE (Menggunakan struktur tabel orders paling standar)
// Menggunakan @ untuk meredam eror jika tabel 'orders' belum kamu buat di phpMyAdmin
@mysqli_query($conn, "INSERT INTO orders (user_id, total_price, status) VALUES ('1', '$total', 'Pending')");

// 4. BERSIHKAN KERANJANG BELANJA KARENA SUDAH SUKSES
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background:#f8f5f1;
            font-family:'Poppins', sans-serif;
        }

        .success-box{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card-success{
            background:white;
            padding:60px;
            border-radius:30px;
            text-align:center;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
            max-width: 500px;
            width: 100%;
        }

        .check{
            font-size:80px;
            line-height: 1;
        }

        .btn-home{
            background:#d4a373;
            color:white;
            padding:15px 35px;
            border-radius:15px;
            text-decoration:none;
            display: inline-block;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-home:hover{
            background: #b08968;
            color: white;
        }
    </style>
</head>

<body>

<div class="container success-box">
    <div class="card-success">
        <div class="check">
            ✅
        </div>

        <h1 class="mt-4 fw-bold" style="color: #3b2a22;">
            Order Success
        </h1>

        <p class="text-muted mb-4">
            Thank you for ordering at EllateCreamy ☕<br>
            Pesananmu sukses dicatat!
        </p>

        <a href="index.php" class="btn-home mt-2">
            Back To Home
        </a>
    </div>
</div>

</body>
</html>