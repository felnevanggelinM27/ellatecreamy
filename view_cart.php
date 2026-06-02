<?php
session_start();
include 'config/database.php';

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background:#f8f5f1;
            font-family:Poppins;
        }

        .cart-card{
            background:white;
            padding:30px;
            border-radius:25px;
            margin-bottom:20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .checkout-box{
            background:#3b2a22;
            color:white;
            padding:30px;
            border-radius:25px;
        }

        .btn-checkout{
            background:#d4a373;
            border:none;
            width:100%;
            padding:15px;
            border-radius:15px;
            color:white;
            font-weight:bold;
            transition: 0.3s;
        }
        
        .btn-checkout:hover{
            background:#b08968;
            color: white;
        }
    </style>
</head>

<body>

<div class="container py-5">

<h1 class="mb-5">🛒 My Cart</h1>

<div class="row">

    <div class="col-lg-8">

    <?php
    // 1. Cek apakah session cart ada dan tidak kosong agar tidak error
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

        foreach($_SESSION['cart'] as $cart){
            
            // 2. Amankan ID Produk sebelum masuk query
            $product_id = mysqli_real_escape_string($conn, $cart['product_id']);
            
            $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'");
            $data = mysqli_fetch_array($query);

            // 3. Jika produk ditemukan di database, tampilkan card menu dan hitung harganya
            if ($data) {
                $price = $data['price'];

                if($cart['size'] == 'Large'){
                    $price += 5000;
                }

                $subtotal = $price * $cart['qty'];
                $total += $subtotal;
                ?>

                <div class="cart-card">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img src="<?php echo $data['image']; ?>" class="img-fluid rounded" style="height: 100px; width: 100%; object-fit: cover;">
                        </div>

                        <div class="col-md-6">
                            <h4><?php echo $data['name']; ?></h4>
                            <p class="text-muted mb-1">
                                <?php echo $cart['temperature']; ?> | <?php echo $cart['size']; ?>
                            </p>
                            <p class="mb-0">
                                Qty: <?php echo $cart['qty']; ?>
                            </p>
                        </div>

                        <div class="col-md-3 text-end">
                            <h5>Rp <?php echo number_format($subtotal); ?></h5>
                        </div>
                    </div>
                </div>

                <?php 
            }
            // Skenario else (jika ID produk tidak ditemukan/kosong) sudah dihapus 
            // sehingga sisa data error yang tidak valid otomatis diabaikan (tidak tampil dilayar).
        } 
    } else {
        // Tampilan jika keranjang belanja benar-benar kosong total
        echo "<div class='alert alert-warning text-center p-4 rounded-4'>🛒 Keranjang belanja kamu masih kosong. Yuk balik ke <a href='index.php' class='alert-link'>Menu Utama</a>!</div>";
    }
    ?>

    </div>

    <div class="col-lg-4">
        <div class="checkout-box">
            <h3>Order Summary</h3>
            <hr>
            <h4>Total: Rp <?php echo number_format($total); ?></h4>
            
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart']) && $total > 0): ?>
                <a href="checkout.php" class="btn-checkout d-block text-center text-decoration-none mt-4">Checkout Now</a>
            <?php else: ?>
                <button class="btn-checkout d-block text-center mt-4" disabled style="opacity: 0.5; cursor: not-allowed;">Checkout Now</button>
            <?php endif; ?>
        </div>
    </div>

</div>

</div>

</body>
</html>