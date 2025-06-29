-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 04:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_ciamis`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `nama_kota`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Ciamis', 'Ciamis adalah salah satu kabupaten yang terletak di Provinsi Jawa barat, Indonesia. Ibu kotanya juga bernama Ciamis, dan lokasinya berada di bagian timur Jawa Barat. Kabupaten ini dikenal punya suasana yang adem, asri, dan masyarakatnya ramah-ramah banget. Cocok lah buat lu yang suka ketenangan, jauh dari hiruk-pikuk kota Besar Dulu, wilayah Kabupaten Ciamis tuh luas banget karena masih mencakup daerah Pangandaran, yang punya banyak pantai. Tapi sejak tahun 2012, Pangandaran resmi memisahkan diri dan jadi kabupaten sendiri. Walaupun udah &amp;amp;quot;cerai&amp;amp;quot;, Ciamis tetap punya daya tarik tersendiri yang nggak kalah keren.', 'assets/images/about/about-ciamis.png', '2025-06-21 22:16:53', '2025-06-21 23:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `description`, `location`, `image_url`, `created_at`, `updated_at`) VALUES
(2, 'Curug Tujuh Cibolang', 'Obyek Wisata Curug Tujuh adalah wisata yang tidak boleh dilewatkan saat ke Kota Ciamis. Curug yang memiliki sejuta keindahan ini berada di tempat yang tersembunyi di balik pepohonan yang menjulang tinggi. Udara yang segar dengan suara jatuh membuat betah berlama-lama disana. Penduduk lokalnya juga sangat ramah tamah terhadap wisatawan lokal maupun swisatawan asing.\r\n\r\nSesuai dengan namanya curug ini memiliki 7 (tujuh) buah air terjun (curug) yang tersebar dan tidak berjauhan letaknya. Bahkan curug 4 dan 5 lokasinya hanya terpisah kurang lebih 2 meter jaraknya, untuk dapat menikmati keindahan dan keasrian ketujuh air terjun tersebut adalah dengan cara mengitari bukit, menapaki jalan setapak mulai dari kaki ke puncak bukit dan kembali lagi.', 'Sandingtaman, Kec. Panjalu, Kabupaten Ciamis, Jawa Barat 46264', 'assets/images/best-destination/1.jpg', '2025-06-21 13:04:12', '2025-06-22 13:48:15'),
(4, 'Situ Lengkong', 'Situ Lengkong merupakan suatu danau yang memiliki luas 57,95 Ha. Konon di kawasan Situ Lengkong dahulunya menjadi pusat pemerintahan Kerajaan Panjalu Ciamis. Terletak di sepanjang tepi utara Panjalu. Sekarang terdapat 3 buah nusa (pulau kecil). Masing-masing digunakan sebagai tempat bangunan istana kerajaan, kepatihan, dan staf kerajaan, juga sebagai taman rekreasi.\n\nSitu Lengkong merupakan obyek wisata yang dikelola oleh pemerintah daerah Kabupaten Ciamis dengan mengedepankan wisata ziarah. Peziarah berbondong-bondong datang dari berbagai daerah di Indosesia untuk berziarah ke makam Prabu Hariang Kencana yang makamnya berada di tengah-tengah nusa. Selain berziarah, wisatawan yang datang ke Situ Lengkong juga bisa bermain kayak di Panjalu.', 'Panjalu, Kec. Panjalu, Kabupaten Ciamis, Jawa Barat', 'assets/images/best-destination/2.jpg', '2025-06-21 17:04:06', '2025-06-22 02:28:15'),
(5, 'Hutan Pinus Darmacaang', 'Hutan Pinus Darmacaang masuk dalam kawasan kaki Gunung Sawal, jadi udara disini pasti dingin dan sejuk. Disini bisa terlihat pemandangan dua kota sekaligus, yaitu Kota Tasikmalaya dan Kota Ciamis. Ada banyak aktivitas yang bisa dilakukan di Hutan Pinus Darmacaang, mulai dari berfoto, berkemah, hammocking, minum kopi, membuat suatu acara atau sekedar bersantai sambil menikmati makanan bahkan bisa dijadikan arena offroad yang sangat asik dan menantang loh. Disana juga ada cafe yang bernama Kopinus, harga yang ditawarkan sangat affordable. Selain itu, banyak warung yang menjual nasi liwet lengkap dengan lauknya, cocok sekali disantap di bawah rindangnya pohon pinus sambil ditemani angin yang sejuk.', 'P7PF+JC9, Darmacaang, Kec. Cikoneng, Kabupaten Ciamis, Jawa Barat 46261', 'assets/images/best-destination/3.jpg', '2025-06-21 19:52:11', '2025-06-22 02:15:00'),
(6, 'Puncak Jamiaki', 'Puncak Jamiaki berada di ketinggian sekitar 1020 meter di atas permukaan laut itu mempunyai panorama indah saat siang hari, apalagi jika di malam hari wisatawan bisa melihat cahaya lampu perkotaan Ciamis dan Tasikmalaya dari atas.\n\nUntuk menuju ke Puncak Jamiaki, harus menempuh jalur pendakian sekitar 1,5 km. Kondisi jalannya menanjak. Namun, semua rasa cape dan lelah setelah pendakian akan terbayar lunas dengan keindahan alamnya.\n\nSalah satu yang istimewa di Puncak Jamiaki adalah pengelola telah menyediakan berbagai fasilitas, salah satunya adalah sumber air dan MCK. Meskipun begitu, fasilitas yang ada tidak menghalangi suasana alam bebas pegunungannya yang indah dan sejuk. Ada juga pedagang makanan dan tour guide yang bisa menemani bercamping ria serta dapat menjamin kebutuhan saat Camping di Puncak Jamiaki.', 'Medanglayang, Kec. Panumbangan, Kabupaten Ciamis, Jawa Barat 46263', 'assets/images/best-destination/4.jpg', '2025-06-21 19:53:02', '2025-06-22 02:44:12'),
(7, 'Jahim Pass', 'Jahim Pass (Atraksi Wisata) terletak di Jawa Barat, Indonesia. Daerah atau landmark terdekat adalah Sukamantri. Alamat Jahim Pass adalah Puncak Jahim,, Jl. Cikijing-Panjalu, Cibeureum, Sukamantri, Kabupaten Ciamis, Jawa Barat 46264, Indonesia. Jahim Pass memiliki cukup banyak tempat yang terdaftar di sekitarnya dan kami mencakup setidaknya 62 tempat di sekitarnya di Helpmecovid.com.', 'Puncak Jahim,, Jl. Cikijing-Panjalu, Cibeureum, Kec. Sukamantri, Kabupaten Ciamis, Jawa Barat', 'assets/images/best-destination/5.jpg', '2025-06-21 19:53:29', '2025-06-22 02:41:44'),
(8, 'Bukit Sampalan Asri', 'Bukit Sampalan Asri merupakan tempat wisata alam yang memiliki panorama yang apik dan menarik, udaranya masih sangat segar, sehingga wisatawan dapat merasakan secara langsung nuansa keindahan alam Gunung Sawal. Disana juga terdapat spot foto, joglo, dan kolam anak-anak. Warga di daerah sana pun sangat ramah sekali kepada para wisatawan yang datang berkunjung.\r\n\r\nUntuk sampai di Bukit Sampalan Asri, pengunjung harus jalan kaki sekitar kurang lebih 100 meter dari lokasi parkir kendaraan. Bagi para wisatawan yang hobi nge-camp bisa, Bukit Sampalan Asri cocok untuk dijadikan agenda liburan dengan melihat gemerlapnya lampu kota di malam hari.', 'Q67F+H5G, Sukamaju, Kec. Cihaurbeuti, Kabupaten Ciamis, Jawa Barat 46262', 'assets/images/best-destination/6.jpg', '2025-06-21 19:53:45', '2025-06-22 02:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_url`, `created_at`, `updated_at`) VALUES
(9, 'assets/images/gallery/gallery-1.jpg', '2025-06-21 22:35:34', '2025-06-22 01:32:53'),
(10, 'assets/images/gallery/gallery-2.jpg', '2025-06-21 22:35:44', '2025-06-22 01:33:07'),
(11, 'assets/images/gallery/gallery-3.jpg', '2025-06-21 22:41:20', '2025-06-22 01:33:19'),
(12, 'assets/images/gallery/gallery-4.jpg', '2025-06-21 22:41:32', '2025-06-22 01:33:30'),
(13, 'assets/images/gallery/gallery-5.jpg', '2025-06-21 22:41:41', '2025-06-22 01:33:43'),
(14, 'assets/images/gallery/gallery-6.jpg', '2025-06-21 22:41:58', '2025-06-22 01:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$Ry7IuQpY9/ZEY6JPw2/EIex/jji53tKfjb1ArIwryAJE4QFL3VpW6', 'Administrator', 'admin', '2025-06-21 13:44:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
