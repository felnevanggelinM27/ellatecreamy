<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - EllateCreamy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { 
            background: #f8f5f1; 
            font-family: 'Poppins', sans-serif; 
            padding-top: 80px; 
        }
        .success-card { 
            background: white; 
            border-radius: 25px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
            padding: 50px; 
        }
        .text-brown { 
            color: #3b2a22; 
        }
        .btn-custom { 
            background: #d4a373; 
            color: white; 
            border-radius: 15px; 
            padding: 12px 30px; 
            text-decoration: none; 
            transition: 0.3s; 
            font-weight: 600;
        }
        .btn-custom:hover { 
            background: #b08968; 
            color: white; 
        }
        
        /* Timeline Tracker */
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
            background: #3b2a22; 
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
            background: #3b2a22; 
            color: white; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            margin: 0 auto 10px; 
            font-size: 14px; 
        }
        .timeline-step.active .timeline-icon { 
            background: #d4a373; 
            animation: bounce 1s infinite alternate; 
        }
        @keyframes bounce { 
            0% { transform: translateY(0); } 
            100% { transform: translateY(-5px); } 
        }
    </style>
</head>
<body>

<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="success-card">
                <i class="fa-solid fa-circle-check fa-5x text-success mb-4"></i>
                <h2 class="fw-bold text-brown mb-2">Pembayaran Berhasil!</h2>
                <p class="text-muted small">Terima kasih, pembayaranmu telah kami terima. Barista EllateCreamy sedang meracik pesananmu dengan penuh cinta. ✨</p>
                
                <hr class="my-4">
                
                <h6 class="fw-bold text-brown mb-4"><i class="fa-solid fa-map-location-dot me-2"></i>Status Pengiriman Terbaru</h6>
                <div class="tracking-timeline">
                    <div class="timeline-step">
                        <div class="timeline-icon"><i class="fa-solid fa-receipt"></i></div>
                        <small class="d-block fw-semibold text-muted" style="font-size: 11px;">Diterima</small>
                    </div>
                    <div class="timeline-step">
                        <div class="timeline-icon"><i class="fa-solid fa-truck"></i></div>
                        <small class="d-block fw-semibold text-muted" style="font-size: 11px;">Dikirim</small>
                    </div>
                    <div class="timeline-step active">
                        <div class="timeline-icon"><i class="fa-solid fa-mug-hot"></i></div>
                        <small class="d-block fw-bold text-brown" style="font-size: 11px;">Sampai</small>
                    </div>
                </div>

                <div class="mt-5 pt-2">
                    <a href="index.php" class="btn-custom d-block"><i class="fa-solid fa-house me-2"></i>Pesan Kopi Lagi</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>