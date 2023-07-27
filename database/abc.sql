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

-- Dumping data for table laravel.chitiet: ~0 rows (approximately)
/*!40000 ALTER TABLE `chitiet` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitiet` ENABLE KEYS */;

-- Dumping data for table laravel.count: ~1 rows (approximately)
/*!40000 ALTER TABLE `count` DISABLE KEYS */;
INSERT INTO `count` (`count_number`, `date`) VALUES
	(33, '2023-07-27');
/*!40000 ALTER TABLE `count` ENABLE KEYS */;

-- Dumping data for table laravel.dichvu: ~4 rows (approximately)
/*!40000 ALTER TABLE `dichvu` DISABLE KEYS */;
INSERT INTO `dichvu` (`MaDV`, `DICH_VU`) VALUES
	(1, 'VNPT CA'),
	(2, 'VNPT-BHXH'),
	(3, 'cA+VAN'),
	(4, 'VNPT Pharmacy');
/*!40000 ALTER TABLE `dichvu` ENABLE KEYS */;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping data for table laravel.goicuoc: ~16 rows (approximately)
/*!40000 ALTER TABLE `goicuoc` DISABLE KEYS */;
INSERT INTO `goicuoc` (`MaDV`, `MaGC`, `GOI_CUOC`) VALUES
	(1, 1, 'OID Standard '),
	(1, 2, 'Staff ID Pro '),
	(1, 3, 'Device ID'),
	(1, 4, 'Device ID (dùng cho HDDT VNPT)'),
	(2, 5, 'VAN10'),
	(2, 6, 'VAN100'),
	(2, 7, 'VAN1000'),
	(2, 8, 'VAN Max'),
	(3, 9, 'CA+VAN10'),
	(3, 10, 'CA+VAN100'),
	(3, 11, 'CA+VAN1000'),
	(3, 12, 'CA+VAN Max'),
	(4, 13, 'Pharmacy'),
	(4, 14, 'SmartCA Cá nhân cơ bản'),
	(4, 15, 'SmartCA Nhân viên cơ bản'),
	(4, 16, 'SmartCA Doanh nghiệp cơ bản');
/*!40000 ALTER TABLE `goicuoc` ENABLE KEYS */;

-- Dumping data for table laravel.loaigoi: ~4 rows (approximately)
/*!40000 ALTER TABLE `loaigoi` DISABLE KEYS */;
INSERT INTO `loaigoi` (`MaGC`, `MaLoai`, `LOAI_GOI`) VALUES
	(1, 1, 'Tao Moi'),
	(1, 2, 'GiaHan'),
	(2, 3, 'Tao Moi'),
	(2, 4, 'Gia Han');
/*!40000 ALTER TABLE `loaigoi` ENABLE KEYS */;

-- Dumping data for table laravel.loaitb: ~3 rows (approximately)
/*!40000 ALTER TABLE `loaitb` DISABLE KEYS */;
INSERT INTO `loaitb` (`THIET_BI`, `GIA_TB`, `MaGC`, `MaLoai`, `MaTH`, `created_at`, `updated_at`) VALUES
	('Mua\r\n\r\n', 550000, 1, 1, 1, NULL, NULL),
	('Mua\r\n\r\n', 550000, 1, 1, 2, NULL, NULL),
	('Mua', 165000, 2, 3, 6, NULL, NULL);
/*!40000 ALTER TABLE `loaitb` ENABLE KEYS */;

-- Dumping data for table laravel.migrations: ~14 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_07_19_140552_form1', 1),
	(6, '2023_07_20_142532_loaitb', 1),
	(7, '2023_07_20_142819_chitiet', 1),
	(8, '2023_07_20_145059_dichvu', 1),
	(9, '2023_07_20_145158_goicuoc', 1),
	(10, '2023_07_21_045042_form2', 1),
	(11, '2023_07_21_080023_thoihan', 1),
	(12, '2023_07_21_082357_loaigoi', 1),
	(13, '2023_07_22_032956_nhanvien', 1),
	(14, '2023_07_22_065742_count', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table laravel.nhanvien: ~0 rows (approximately)
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;

-- Dumping data for table laravel.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping data for table laravel.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping data for table laravel.thoihan: ~6 rows (approximately)
/*!40000 ALTER TABLE `thoihan` DISABLE KEYS */;
INSERT INTO `thoihan` (`MaTH`, `MaLoai`, `MaGC`, `THOI_HAN`, `GIA_TRUOC_THUE`) VALUES
	(1, 1, 1, 12, '1157273'),
	(2, 1, 1, 24, '1157273'),
	(3, 1, 1, 36, '1157273'),
	(4, 2, 1, 12, '65156165'),
	(5, 2, 1, 24, '15161161'),
	(6, 2, 1, 36, '45244542');
/*!40000 ALTER TABLE `thoihan` ENABLE KEYS */;

-- Dumping data for table laravel.thong_tin_hop_dong: ~13 rows (approximately)
/*!40000 ALTER TABLE `thong_tin_hop_dong` DISABLE KEYS */;
INSERT INTO `thong_tin_hop_dong` (`id`, `TEN_KHACH_HANG`, `TINH_TP`, `QUAN_HUYEN`, `XA_PHUONG`, `SO_NHA`, `MA_SO_THUE`, `MBHXH`, `NV`, `NGAY_KY_HD`, `MA_HOP_DONG`, `TRANG_THAI_DON_HANG`, `LOAI_DON_HANG`, `DICH_VU`, `GOI_CUOC`, `THOI_GIAN`, `LOAI_TB`, `GIA_THIET_BI`, `GIA_TRUOC_THUE`, `GIA_SAU_THUE`, `GHI_CHU`, `MA_GD`, `MA_THUE_BAO`, `USERNAME`, `SO_SERI`, `SO_HD`, `MA_TRA_CUU`, `NGAY_XUAT_HOA_DON`, `SO_LUONG`, `created_at`, `updated_at`, `LOAI_GOI_CUOC`) VALUES
	(27, 'Nguyễn Xuân Danh', 'Tỉnh Hải Dương', 'Thành phố Hải Dương', 'Phường Bình Hàn', '21', '123456', '654321', NULL, '2023-07-27', '230727033', 'Chưa duyệt', 'L1', 'VNPT CA', 'OID Standard', '12', 'Mua', '550000', '1157273', '1878000.3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-27 06:24:23', '2023-07-27 06:24:23', 'Tao Moi');
/*!40000 ALTER TABLE `thong_tin_hop_dong` ENABLE KEYS */;

-- Dumping data for table laravel.thong_tin_khach_hang: ~0 rows (approximately)
/*!40000 ALTER TABLE `thong_tin_khach_hang` DISABLE KEYS */;
/*!40000 ALTER TABLE `thong_tin_khach_hang` ENABLE KEYS */;

-- Dumping data for table laravel.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
