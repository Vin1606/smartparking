-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2024 pada 16.21
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartparking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nopol` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `date` varchar(128) NOT NULL,
  `time` varchar(128) NOT NULL,
  `end_time` varchar(128) NOT NULL,
  `location_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `stok_dikembalikan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `nopol`, `brand`, `date`, `time`, `end_time`, `location_id`, `description`, `price`, `stok_dikembalikan`) VALUES
(130, 19, 'B 9000 JU', 'AVANZA', '2024-06-25', '10:00', '12:00', 1, '', 5000, 0),
(131, 19, 'B 3289 JUA', 'BRIO', '2024-06-26', '13:00', '15:00', 2, '', 5000, 0),
(132, 20, 'B 3489 HS', 'Hiace', '2024-06-26', '13:00', '15:00', 3, '', 5000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parking_slots`
--

CREATE TABLE `parking_slots` (
  `id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `parking_slots`
--

INSERT INTO `parking_slots` (`id`, `location`, `stok`) VALUES
(1, 'A01', 5),
(2, 'B02', 5),
(3, 'C03', 5),
(4, 'D04', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `amount_paid`, `payment_status`, `payment_date`) VALUES
(138, 130, '10000.00', 'Lunas', '0000-00-00 00:00:00'),
(139, 131, '10000.00', 'Lunas', '0000-00-00 00:00:00'),
(140, 132, '10000.00', 'Lunas', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `phone`, `role_id`, `is_active`, `date_created`) VALUES
(18, 'Cornelius Kevin', 'kevin@gmail.com', 'a8e38489a1d83dece1ba5d89a81709b7.jpg', '$2y$10$KE/JTiGuYbx4.6qraXkKiOT.EpfE8vfVNCZZ5Wwok8UnIOKO1.ABe', '08199999', 1, 1, 1719312034),
(19, 'brook', 'brook@gmail.com', '4a4f324385996060a1221e9767abdf59.jpg', '$2y$10$dw0Kw0A3zsbGdOxE.0tMwOnb1TMUVCQpMQHZze2NuVOdiv/pD4rVq', '1234567', 2, 1, 1719212256),
(20, 'Dave', 'dave@gmail.com', 'default.jpg', '$2y$10$cgvOOUF0P.MqCgGv.RlpBeA0bLr/oRRd6rWGEAqClyppfycWnUbse', '', 2, 1, 1719306472);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tempat` (`location_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `parking_slots`
--
ALTER TABLE `parking_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT untuk tabel `parking_slots`
--
ALTER TABLE `parking_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `parking_slots` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
