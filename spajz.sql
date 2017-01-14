-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 02:28 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spajz`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `password` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'selsebil', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `proizvod` int(11) NOT NULL,
  `komentar` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `proizvod`, `komentar`) VALUES
(14, 24, 'Super je proizvod!');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `email` text COLLATE utf8_slovenian_ci NOT NULL,
  `username` text COLLATE utf8_slovenian_ci NOT NULL,
  `password` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `email`, `username`, `password`) VALUES
(1, 'Selsebil', 'selsebilcatic@gmail.com', 'username1', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Amela', 'amela@gmail.com', 'spajz', '1a1dc91c907325c69271ddf0c944bc72'),
(3, 'Teeest', 'test@gmail.com', 'test', '101a6ec9f938885df0a44f20458d2eb4'),
(7, 'Proba', 'proba@gmail.com', 'proba', 'c0a8e1e5e307cc5b33819b387b5f01fd');

-- --------------------------------------------------------

--
-- Table structure for table `poruka`
--

CREATE TABLE `poruka` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` text COLLATE utf8_slovenian_ci NOT NULL,
  `poruka` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `poruka`
--

INSERT INTO `poruka` (`id`, `ime`, `email`, `poruka`) VALUES
(1, 'Selsebil', 'selsebilcatic@gmail.com', 'Hello'),
(2, 'Amina', 'amina@gmail.com', 'Super je stranica!'),
(3, 'Emina', 'emina@gmail.com', 'Predobrooooo!!!!'),
(7, 'Hello', 'hello@gmail.com', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL,
  `administrator` int(11) NOT NULL,
  `ime` varchar(10) COLLATE utf8_slovenian_ci NOT NULL,
  `cijena` int(5) NOT NULL,
  `slika` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id`, `administrator`, `ime`, `cijena`, `slika`) VALUES
(23, 1, 'Badem', 3, 'http://advent.hr/upload/catalog/variation/87/badem-jezgra-100g-primavita_570771308a757.jpg'),
(24, 1, 'Tip Top', 2, 'http://www.konzumshop.ba/images/products/066/06603001l.gif'),
(25, 1, 'Pardon', 4, 'http://online.idea.rs/images/products/446/446104549l.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proizvod` (`proizvod`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poruka`
--
ALTER TABLE `poruka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrator` (`administrator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `poruka`
--
ALTER TABLE `poruka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `proizvod_constrait` FOREIGN KEY (`proizvod`) REFERENCES `proizvod` (`id`);

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `administrator_constrait` FOREIGN KEY (`administrator`) REFERENCES `administrator` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
