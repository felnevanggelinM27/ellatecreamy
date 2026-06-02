<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - EllateCreamy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #f8f5f1;
            font-family: 'Poppins', sans-serif;
        }

        .checkout-card {
            background: white;
            padding: 40px;
            border-radius: 30px;
            margin-top: 60px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .payment-box {
            border: 2px solid #ddd;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .payment-box:hover {
            border-color: #d4a373;
        }

        /* Style tambahan agar kotak otomatis ikut terpilih saat di-klik */
        .payment-box:has(input:checked) {
            border-color: #d4a373;
            background-color: #fdfaf7;
        }

        .btn-pay {
            background: #d4a373;
            border: none;
            color: white;
            padding: 15px;
            width: 100%;
            border-radius: 15px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-pay:hover {
            background: #b08968;
        }
    </style>
</head>

<body>

<div class="container mb-5">
    <div class="checkout-card">
        <h1 class="mb-5">💳 Checkout</h1>

        <form action="payment_process.php" method="POST">

            <div class="mb-4">
                <label class="form-label fw-bold">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Masukkan nomor telepon aktif" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Address</label>
                <textarea name="address" class="form-control" placeholder="Masukkan alamat pengiriman / detail meja" rows="3" required></textarea>
            </div>

            <h4 class="mb-4 mt-5">Choose Payment Method</h4>

            <div class="payment-box">
                <label class="d-block style-label" style="cursor: pointer;">
                    <input type="radio" name="payment_method" value="QRIS" required checked> QRIS
                </label>
            </div>

            <div class="payment-box">
                <label class="d-block style-label" style="cursor: pointer;">
                    <input type="radio" name="payment_method" value="Bank Transfer" required> Bank Transfer
                </label>
            </div>

            <div class="payment-box">
                <label class="d-block style-label" style="cursor: pointer;">
                    <input type="radio" name="payment_method" value="Cash" required> Cash
                </label>
            </div>

            <button type="submit" class="btn-pay mt-4">
                Pay Now
            </button>
        </form>
    </div>
</div>

</body>
</html>