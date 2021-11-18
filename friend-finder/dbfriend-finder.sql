-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2021 pada 03.35
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfriend-finder`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(4) NOT NULL,
  `place_id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `contact_person` varchar(12) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `total` int(10) NOT NULL,
  `book_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `place_id`, `customer_name`, `contact_person`, `start`, `end`, `total`, `book_date`) VALUES
(9, 6, 'Jhony Cage', '081515144981', '12:00:00', '13:30:00', 50000, '2021-11-17'),
(10, 4, 'Ibnu', '081515144982', '12:00:00', '14:00:00', 180000, '2021-11-17'),
(11, 4, 'Moh Ibnu', '081515144981', '14:00:00', '15:00:00', 90000, '2021-11-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'Art'),
(1, 'Design'),
(4, 'Education'),
(2, 'Sport');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name_event` varchar(30) NOT NULL,
  `event_owner` varchar(30) NOT NULL,
  `contact_person` varchar(13) NOT NULL,
  `description` text NOT NULL,
  `event_picture` varchar(255) NOT NULL,
  `category_id` int(2) NOT NULL,
  `event_start_date` varchar(10) NOT NULL,
  `event_end_date` varchar(10) NOT NULL,
  `price` int(7) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `name_event`, `event_owner`, `contact_person`, `description`, `event_picture`, `category_id`, `event_start_date`, `event_end_date`, `price`, `location`, `created_by`) VALUES
(4, 'Design For Human', 'Putri Latifatus', '081515144983', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nam sunt enim debitis, repudiandae facere atque corporis explicabo illum! Quis cumque placeat voluptas tempore ipsa numquam vero accusantium ullam amet, consequuntur eligendi totam, adipisci nihil porro itaque, omnis atque iusto?', '618cb45a4e2a4618cb45a4e2a4.jpg', 1, '2021-11-26', '2021-12-04', 90000, 'Gending, Kab Probolinggo', 4),
(5, 'Hackaton 2021', 'Rafli Al Fajar', '081515144982', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nam sunt enim debitis, repudiandae facere atque corporis explicabo illum! Quis cumque placeat voluptas tempore ipsa numquam vero accusantium ullam amet, consequuntur eligendi totam, adipisci nihil porro itaque, omnis atque iusto?', '618c8e01e0625618c8e01e0625.png', 4, '2021-11-11', '2021-11-13', 100000, 'Jatiroto, Lumajang', 2),
(6, 'EPIM 2022', 'HMJTI', '081515144984', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nam sunt enim debitis, repudiandae facere atque corporis explicabo illum! Quis cumque placeat voluptas tempore ipsa numquam vero accusantium ullam amet, consequuntur eligendi totam, adipisci nihil porro itaque, omnis atque iusto?', '618cb6a665c13618cb6a665c13.webp', 4, '2022-01-12', '2022-01-21', 75000, 'Jember, Politeknik Negeri Jember', 4),
(8, 'Sekolah Unggulan 2021', 'UKM Olahraga', '081515144983', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nam sunt enim debitis, repudiandae facere atque corporis explicabo illum! Quis cumque placeat voluptas tempore ipsa numquam vero accusantium ullam amet, consequuntur eligendi totam, adipisci nihil porro itaque, omnis atque iusto?', '618d0e5590189618d0e5590189.jpeg', 4, '2021-11-11', '2021-11-19', 0, 'Gending, Kab Probolinggo', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `place_owner` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `location` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_at` date NOT NULL,
  `place_picture` varchar(255) NOT NULL,
  `place_open_time` time NOT NULL,
  `place_close_time` time NOT NULL,
  `status` varchar(18) NOT NULL,
  `category_id` int(1) NOT NULL,
  `contact_person` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `place`
--

INSERT INTO `place` (`id`, `place_name`, `place_owner`, `price`, `location`, `description`, `created_at`, `place_picture`, `place_open_time`, `place_close_time`, `status`, `category_id`, `contact_person`) VALUES
(4, 'Old Trafford', 'MU', 90000, 'Amsterdam', 'Old Trafford adalah sebuah stadion sepak bola yang berlokasi di Old Trafford, Greater Manchester, Inggris, dan merupakan markas klub sepak bola Manchester United', '2021-11-18', '6191c74a76fb66191c74a76fb6.jpg', '12:00:00', '23:00:00', 'available', 2, '085238960238'),
(6, 'BOBO Futsal', 'aab', 50000, 'Jatiroto', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2021-11-15', '6191fab9b41e16191fab9b41e1.png', '08:00:00', '22:00:00', 'available', 2, '082231159862');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `role_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fullname`, `phone`, `email`, `password`, `profile`, `role_id`) VALUES
(2, 'Rafli Al Fajar', '081515144989', 'raflifajar@gmail.com', '$2y$10$RP3ZxGHwPSo5YBcXYdzTDu003lYT0w6ZgPAVQgsmWqDjhQZ4eOoMu', '618d5fe33e4b5618d5fe33e4b5.png', 2),
(3, 'Ibnu A.S', '081515144981', 'ibnuabdurrohmansutio@gmail.com', '$2y$10$6MftprXvyaVeGPM9t0B/xOdFdwLpLYVLSZfnPFkBHSxU9ABvu1od.', '6191cf0c24c686191cf0c24c68.png', 1),
(4, 'Putri Latifatus', '081515144983', 'putri@gmail.com', '$2y$10$LpM6EDnpxnxek4wV4LGPqeP0ncBaIdDHSA2XppEe/WUwmo.lIGQbS', '618dd0840a1f1618dd0840a1f1.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
