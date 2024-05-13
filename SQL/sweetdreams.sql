-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 13 May 2024, 19:51:02
-- Sunucu sürümü: 8.2.0
-- PHP Sürümü: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sweetdreams`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ImageURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Price` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Category`, `ImageURL`, `Price`) VALUES
(1, 'Sufle', 'tatlilar', 'img/featured/feature-1.jpg', 50.00),
(2, 'Baklava', 'tatlilar', 'img/featured/feature-2.jpg', 60.00),
(3, 'Meyveli Pasta', 'pastalar', 'img/featured/feature-3.jpg', 40.00),
(4, 'D.Günü Pastası', 'pastalar', 'img/featured/feature-4.jpg', 120.00),
(5, 'Parçacıklı Kurabiye', 'kurabiyeler', 'img/featured/feature-5.jpg', 35.00),
(6, 'Çubuk Dondurma', 'dondurmalar', 'img/featured/feature-6.jpg', 20.00),
(7, 'Zencefilli Kurabiye', 'kurabiyeler', 'img/featured/feature-7.jpg', 35.00),
(8, 'Külahta Dondurma', 'dondurmalar', 'img/featured/feature-8.jpg', 40.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
