<?php
include 'config/database.php';

// Tangkap data dari form checkout
$name = isset($_POST['name']) ? $_POST['name'] : 'Pelanggan';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '-';
$address = isset($_POST['address']) ? $_POST['address'] : '-';
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : 'QRIS';

// Simulasi Nomor Virtual Account acak jika memilih Bank Transfer
$va_number = "88062" . rand(1000000000, 9999999999);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Process - EllateCreamy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        body {
            background: #f8f5f1;
            font-family: 'Poppins', sans-serif;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .payment-card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 40px;
            margin-bottom: 30px;
        }
        .text-brown {
            color: #3b2a22;
        }
        .btn-custom {
            background: #d4a373;
            color: white;
            border-radius: 15px;
            padding: 12px 30px;
            transition: 0.3s;
            text-decoration: none;
        }
        .btn-custom:hover {
            background: #b08968;
            color: white;
        }
        /* Style untuk tracking truk */
        .tracking-timeline {
            position: relative;
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            padding: 0 20px;
        }
        .tracking-timeline::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 40px;
            right: 40px;
            height: 4px;
            background: #efe6dc;
            z-index: 1;
        }
        .timeline-step {
            position: relative;
            z-index: 2;
            text-align: center;
        }
        .timeline-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #efe6dc;
            color: #a0a0a0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 14px;
            transition: 0.4s;
        }
        /* Efek Animasi Truk Berjalan */
        .timeline-step.active .timeline-icon {
            background: #d4a373;
            color: white;
            animation: truckDrive 2s ease-in-out infinite alternate;
        }
        .timeline-step.completed .timeline-icon {
            background: #3b2a22;
            color: white;
        }
        @keyframes truckDrive {
            0% { transform: translateX(-3px); }
            100% { transform: translateX(3px); }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <div class="payment-card text-center">
                <h3 class="fw-bold text-brown mb-4">Instruksi Pembayaran</h3>
                <hr>
                
                <div class="my-4">
                    <h6>Metode Pembayaran: <span class="badge bg-secondary"><?php echo strtoupper($payment_method); ?></span></h6>
                </div>

                <?php if ($payment_method == 'QRIS'): ?>
                    <div class="alert alert-light border p-4 rounded-4">
                        <p class="mb-3 text-muted">Silakan pindai kode QRIS di bawah ini untuk menyelesaikan pembayaran:</p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=EllateCreamyOrder" alt="QRIS Code" class="img-fluid rounded shadow-sm mb-3" style="max-width: 200px;">
                        <h5 class="fw-bold text-brown mt-2">ELLATE CREAMY COFFEE</h5>
                        <p class="small text-danger mb-0"><i class="fa-solid fa-clock"></i> Berlaku selama 15 menit</p>
                    </div>

                <?php elseif ($payment_method == 'Bank Transfer'): ?>
                    <div class="alert alert-light border p-4 rounded-4 text-start">
                        <p class="text-muted text-center mb-3">Transfer tepat ke nomor Virtual Account berikut:</p>
                        <div class="p-3 bg-white border rounded-3 text-center mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-1">Nomor Virtual Account (BNI / Mandiri)</small>
                            <h3 class="fw-bold text-success tracking-wide"><?php echo $va_number; ?></h3>
                        </div>
                        <ol class="small text-muted ps-3">
                            <li>Salin nomor Virtual Account di atas.</li>
                            <li>Buka Mobile Banking atau pergi ke ATM terdekat.</li>
                            <li>Pilih menu <b>Transfer > Virtual Account</b>.</li>
                            <li>Masukkan nomor VA dan pastikan nominal tagihan sesuai.</li>
                        </ol>
                    </div>

                <?php else: ?>
                    <div class="alert alert-warning border p-4 rounded-4">
                        <i class="fa-solid fa-money-bill-wave fa-3x mb-3 text-warning"></i>
                        <h5>Bayar di Tempat (Cash)</h5>
                        <p class="small text-muted mb-0">Siapkan uang tunai yang pas saat barista atau kurir kami mengantarkan pesanan lezatmu ke alamat tujuan.</p>
                    </div>
                <?php endif; ?>

                <div class="text-start mt-4 bg-light p-3 rounded-3 small text-muted">
                    <p class="mb-1"><b>Nama Penerima:</b> <?php echo htmlspecialchars($name); ?></p>
                    <p class="mb-1"><b>No. Telepon:</b> <?php echo htmlspecialchars($phone); ?></p>
                    <p class="mb-0"><b>Alamat Pengiriman:</b> <?php echo htmlspecialchars($address); ?></p>
                </div>

      <div class="d-grid gap-2 mt-4">
    <a href="success_payment.php" class="btn btn-success rounded-3 fw-bold p-2 shadow-sm">
        <i class="fa-solid fa-circle-check me-2"></i> Saya Sudah Bayar
    </a>
</div>
            </div>

            <div class="payment-card">
                <h5 class="fw-bold text-brown text-center mb-2"><i class="fa-solid fa-truck-fast me-2"></i>Status Pesanan</h5>
                <p class="small text-muted text-center mb-4">Pantau perjalanan kopi dan dessert pesananmu di bawah ini</p>
                
                <div class="tracking-timeline">
                    <div class="timeline-step completed">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                        <small class="d-block fw-semibold text-muted" style="font-size: 11px;">Diterima</small>
                    </div>
                    
                    <div class="timeline-step active">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <small class="d-block fw-bold text-brown" style="font-size: 11px;">Proses</small>
                    </div>
                    
                    <div class="timeline-step">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-mug-hot"></i>
                        </div>
                        <small class="d-block fw-semibold text-muted" style="font-size: 11px;">Ready</small>
                    </div>
                </div>
                
<div class="text-center mt-5">
    <a href="index.php" class="btn-custom btn-sm"><i class="fa-solid fa-house me-2"></i>Kembali ke Beranda</a>
</div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>