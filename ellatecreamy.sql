-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Jun 2026 pada 08.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ellatecreamy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `temperature` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `stock`) VALUES
(1, NULL, 'Caramel Latte', 'Perpaduan espresso mantap, susu lembut, dan sirup karamel manis yang memanjakan lidah.', 28000, 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?q=80&w=1974&auto=format&fit=crop', NULL),
(2, NULL, 'Cappuccino', 'Kopi klasik Italia dengan kombinasi seimbang antara espresso, steamed milk, dan foam tebal di atasnya.', 25000, 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1974&auto=format&fit=crop', NULL),
(3, NULL, 'Vanilla Latte', 'Espresso creamy dengan sentuhan aroma vanilla premium yang menenangkan dan manis pas.', 27000, 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?q=80&w=1974&auto=format&fit=crop', NULL),
(4, NULL, 'Mocha Coffee', 'Kombinasi sempurna bagi pencinta kopi dan cokelat premium dalam satu cangkir hangat.', 30000, 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1974&auto=format&fit=crop', NULL),
(5, NULL, 'Americano', 'Dua shot espresso murni yang dilarutkan dengan air panas, cocok untuk mengawali harimu.', 22000, 'https://images.unsplash.com/photo-1494314671902-399b18174975?q=80&w=1974&auto=format&fit=crop', NULL),
(6, NULL, 'Hazelnut Latte', 'Racikan kopi susu creamy berpadu dengan gurih dan manisnya sirup hazelnut panggang.', 32000, 'https://images.unsplash.com/photo-1485808191679-5f86510681a2?q=80&w=1974&auto=format&fit=crop', NULL),
(7, NULL, 'Matcha Latte', 'Bubuk matcha autentik Jepang yang dilarutkan bersama susu segar, memberikan kesegaran alami.', 29000, 'https://images.unsplash.com/photo-1515823064-d6e0c04616a7?q=80&w=1974&auto=format&fit=crop', NULL),
(8, NULL, 'Affogato', 'Satu scoop es krim vanilla lembut yang disiram langsung dengan espresso shot yang pekat.', 35000, 'https://images.unsplash.com/photo-1512568400610-62da28bc8a13?q=80&w=1974&auto=format&fit=crop', NULL),
(9, NULL, 'Butterscotch Latte', 'Kopi susu kekinian dengan rasa gurih mentega berkaramel yang unik dan nagih.', 33000, 'https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=1974&auto=format&fit=crop', NULL),
(10, NULL, 'Chocolate Cream', 'Minuman cokelat non-kopi yang pekat, disajikan dengan topping cream lembut di atasnya.', 31000, 'https://images.unsplash.com/photo-1464306076886-da185f6a9d05?q=80&w=1974&auto=format&fit=crop', NULL),
(11, NULL, 'Butter Croissant', 'Flaky, buttery, and perfectly baked golden pastry 🥐', 25000, 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?q=80&w=1926&auto=format&fit=crop', NULL),
(12, NULL, 'Classic Tiramisu', 'Layers of espresso-soaked ladyfingers and creamy mascarpone 🍰', 38000, 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?q=80&w=1974&auto=format&fit=crop', NULL),
(13, NULL, 'Strawberry Cheesecake', 'Rich and creamy cheesecake topped with sweet strawberry glaze 🍓', 40000, 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?q=80&w=1974&auto=format&fit=crop', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','customer') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
