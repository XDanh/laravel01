-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table laravel.dichvu: ~4 rows (approximately)
/*!40000 ALTER TABLE `dichvu` DISABLE KEYS */;
INSERT INTO `dichvu` (`MaDV`, `Tendichvu`) VALUES
	(1, 'VNPT CA'),
	(2, 'VNPT-BHXH'),
	(3, 'cA+VAN'),
	(4, 'VNPT Pharmacy');
/*!40000 ALTER TABLE `dichvu` ENABLE KEYS */;

-- Dumping data for table laravel.goicuoc: ~16 rows (approximately)
/*!40000 ALTER TABLE `goicuoc` DISABLE KEYS */;
INSERT INTO `goicuoc` (`MaDV`, `MaGC`, `TenGoiCuoc`, `LoaiGoi`, `ThoiGian`) VALUES
	(1, 1, 'OID Standard ', '', '0000-00-00'),
	(1, 2, 'Staff ID Pro ', '', '0000-00-00'),
	(1, 3, 'Device ID', '', '0000-00-00'),
	(1, 4, 'Device ID (dùng cho HDDT VNPT)', '', '0000-00-00'),
	(2, 5, 'VAN10', '', '0000-00-00'),
	(2, 6, 'VAN100', '', '0000-00-00'),
	(2, 7, 'VAN1000', '', '0000-00-00'),
	(2, 8, 'VAN Max', '', '0000-00-00'),
	(3, 9, 'CA+VAN10', '', '0000-00-00'),
	(3, 10, 'CA+VAN100', '', '0000-00-00'),
	(3, 11, 'CA+VAN1000', '', '0000-00-00'),
	(3, 12, 'CA+VAN Max', '', '0000-00-00'),
	(4, 13, 'Pharmacy', '', '0000-00-00'),
	(4, 14, 'SmartCA Cá nhân cơ bản', '', '0000-00-00'),
	(4, 15, 'SmartCA Nhân viên cơ bản', '', '0000-00-00'),
	(4, 16, 'SmartCA Doanh nghiệp cơ bản', '', '0000-00-00');
/*!40000 ALTER TABLE `goicuoc` ENABLE KEYS */;

-- Dumping data for table laravel.loaitb: ~4 rows (approximately)
/*!40000 ALTER TABLE `loaitb` DISABLE KEYS */;
INSERT INTO `loaitb` (`MaTB`, `TenTB`, `created_at`, `updated_at`) VALUES
	(1, 'Mua\r\n\r\n', NULL, NULL),
	(2, 'Khuyến mãi', NULL, NULL),
	(3, 'Tự trang bị', NULL, NULL),
	(4, 'Không có', NULL, NULL);

/*!40000 ALTER TABLE `loaitb` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
INSERT INTO `loaitb` (`MaGC`, `GiaTruocThue`,'VAT', `created_at`, `updated_at`) VALUES

