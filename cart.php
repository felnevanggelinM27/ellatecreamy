<?php
session_start();

// 1. Cek apakah data dikirim lewat metode POST (mencegah akses langsung via URL)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 2. Ambil data dari form detail.php
    $product_id  = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $temperature = isset($_POST['temperature']) ? $_POST['temperature'] : 'Hot';
    $size        = isset($_POST['size']) ? $_POST['size'] : 'Regular';
    $qty         = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

    // Bersihkan atau pastikan Qty minimal adalah 1
    if ($qty < 1) {
        $qty = 1;
    }

    // 3. Inisialisasi session 'cart' sebagai array jika belum pernah dibuat
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // 4. Bungkus data ke dalam item array
    $item = [
        'product_id'  => $product_id,
        'temperature' => $temperature,
        'size'        => $size,
        'qty'         => $qty
    ];

    // 5. Masukkan item ke dalam keranjang belanja session
    $_SESSION['cart'][] = $item;

    // 6. Alihkan halaman ke view_cart.php
    header("Location: view_cart.php");
    exit(); // Menghentikan eksekusi script setelah redirect

} else {
    // Jika diakses langsung tanpa POST, kembalikan ke index.php
    header("Location: index.php");
    exit();
}
?>