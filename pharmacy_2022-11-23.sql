# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: pharmacy
# Generation Time: 2022-11-22 7:14:16 PM +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusID` int(11) NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `cuid` int(11) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;

INSERT INTO `addresses` (`id`, `uid`, `address1`, `address2`, `city`, `state`, `zip`, `statusID`, `status`, `cuid`, `uuid`, `created_at`, `updated_at`)
VALUES
	(1,1,'12A','12A','Colombo','Wester','1023',1,'Active',1,1,'2022-11-22 09:29:18','2022-11-22 09:29:18'),
	(2,2,'1/A','First Cross Street','Colombo','Western','1023',1,'Active',2,2,'2022-11-22 12:54:20','2022-11-22 12:54:20');

/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fileP` text COLLATE utf8mb4_unicode_ci,
  `statusID` int(11) NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `cuid` int(11) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `customerID`, `orderID`, `name`, `fileP`, `statusID`, `status`, `cuid`, `uuid`, `created_at`, `updated_at`)
VALUES
	(7,2,4,'11-22-2022-14-48-17_1.png','media/orders/customers/files/11-22-2022-14-48-17_1.png',1,'Active',NULL,NULL,'2022-11-22 14:48:17','2022-11-22 14:48:17'),
	(8,2,4,'11-22-2022-14-48-17_2.png','media/orders/customers/files/11-22-2022-14-48-17_2.png',1,'Active',NULL,NULL,'2022-11-22 14:48:17','2022-11-22 14:48:17'),
	(9,2,4,'11-22-2022-14-48-17_3.png','media/orders/customers/files/11-22-2022-14-48-17_3.png',1,'Active',NULL,NULL,'2022-11-22 14:48:17','2022-11-22 14:48:17'),
	(10,2,5,'11-22-2022-18-46-50_1.png','media/orders/customers/files/11-22-2022-18-46-50_1.png',1,'Active',NULL,NULL,'2022-11-22 18:46:50','2022-11-22 18:46:50'),
	(11,2,6,'11-22-2022-18-57-18_1.png','media/orders/customers/files/11-22-2022-18-57-18_1.png',1,'Active',NULL,NULL,'2022-11-22 18:57:18','2022-11-22 18:57:18'),
	(12,2,6,'11-22-2022-18-57-18_2.png','media/orders/customers/files/11-22-2022-18-57-18_2.png',1,'Active',NULL,NULL,'2022-11-22 18:57:18','2022-11-22 18:57:18'),
	(13,2,6,'11-22-2022-18-57-18_3.png','media/orders/customers/files/11-22-2022-18-57-18_3.png',1,'Active',NULL,NULL,'2022-11-22 18:57:18','2022-11-22 18:57:18');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',2),
	(3,'2019_08_19_000000_create_failed_jobs_table',3),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',4),
	(5,'2022_11_22_084602_create_addresses_table',5),
	(6,'2022_11_22_084953_create_products_table',6),
	(7,'2022_11_22_141844_create_images_table',7),
	(9,'2022_11_22_141852_create_orders_table',8),
	(10,'2022_11_22_172642_create_quotations_table',9);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `deliveryDate` timestamp NULL DEFAULT NULL,
  `timeSlot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusID` int(11) NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `cuid` int(11) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `customerID`, `address`, `deliveryDate`, `timeSlot`, `statusID`, `status`, `cuid`, `uuid`, `created_at`, `updated_at`)
VALUES
	(4,2,'{\"address1\":\"1\\/A\",\"address2\":\"\",\"city\":\"Colombo\",\"state\":\"Western\",\"zip\":\"1023\"}','2022-11-23 00:00:00','10 AM - 12 Noon',2,'Processed',2,2,'2022-11-22 14:48:17','2022-11-22 14:48:17'),
	(5,2,'{\"address1\":\"1\\/A\",\"address2\":\"\",\"city\":\"Colombo\",\"state\":\"Western\",\"zip\":\"1023\"}','2022-11-24 00:00:00','10 AM - 12 Noon',2,'Processed',2,2,'2022-11-22 18:46:50','2022-11-22 18:46:50'),
	(6,2,'{\"address1\":\"1\\/A\",\"address2\":\"\",\"city\":\"Colombo\",\"state\":\"Western\",\"zip\":\"1023\"}','2022-11-25 00:00:00','10 AM - 12 Noon',2,'Processed',2,2,'2022-11-22 18:57:18','2022-11-22 19:02:43');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices` text COLLATE utf8mb4_unicode_ci,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `statusID` int(11) NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `cuid` int(11) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `sku`, `name`, `brand`, `uom`, `prices`, `meta`, `statusID`, `status`, `cuid`, `uuid`, `created_at`, `updated_at`)
VALUES
	(1,'AMX','Amoxicillin 250mg','Moxatag','Caps','{\"selling\":\"100\",\"lowest\":\"90\"}',NULL,1,'Active',1,1,'2022-11-22 12:23:53','2022-11-22 12:23:53'),
	(2,'PAM','Paracetamol 500mg','Calpol','Caps','{\"selling\":\"50\",\"lowest\":\"30\"}',NULL,1,'Active',1,1,'2022-11-22 12:25:22','2022-11-22 12:48:54');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quotations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quotations`;

CREATE TABLE `quotations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `quotedDate` timestamp NULL DEFAULT NULL,
  `validTill` timestamp NULL DEFAULT NULL,
  `products` text COLLATE utf8mb4_unicode_ci,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LKR',
  `subTotal` double NOT NULL DEFAULT '0',
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` double NOT NULL DEFAULT '0',
  `grandTotal` double NOT NULL DEFAULT '0',
  `statusID` int(11) NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `cuid` int(11) DEFAULT NULL,
  `uuid` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `quotations` WRITE;
/*!40000 ALTER TABLE `quotations` DISABLE KEYS */;

INSERT INTO `quotations` (`id`, `orderID`, `customerID`, `quotedDate`, `validTill`, `products`, `currency`, `subTotal`, `discount`, `delivery`, `grandTotal`, `statusID`, `status`, `cuid`, `uuid`, `created_at`, `updated_at`)
VALUES
	(1,4,2,'2022-11-23 00:00:00','2022-11-30 00:00:00','[{\"id\":\"1\",\"name\":\"Amoxicillin 250mg\",\"memo\":\"Amoxicillin\",\"uom\":\"Caps\",\"qty\":\"10\",\"unitPrice\":\"100\",\"lineDiscount\":\"0\",\"lineTotal\":\"1000\"},{\"id\":\"2\",\"name\":\"Paracetamol 500mg\",\"memo\":\"Paracetamol\",\"uom\":\"Caps\",\"qty\":\"10\",\"unitPrice\":\"50\",\"lineDiscount\":\"0\",\"lineTotal\":\"500\"}]','LKR',1500,'0',250,1750,2,'Approved',1,2,'2022-11-22 17:40:31','2022-11-22 18:39:14'),
	(2,5,2,'2022-11-24 00:00:00','2022-12-01 00:00:00','[{\"id\":\"2\",\"name\":\"Paracetamol 500mg\",\"memo\":\"Paracetamol\",\"uom\":\"Caps\",\"qty\":\"20\",\"unitPrice\":\"50\",\"lineDiscount\":\"0\",\"lineTotal\":\"1000\"}]','LKR',1000,'0',200,1200,0,'rejected',1,2,'2022-11-22 18:53:15','2022-11-22 18:54:56'),
	(4,6,2,'2022-11-24 00:00:00','2022-12-01 00:00:00','[{\"id\":\"1\",\"name\":\"Amoxicillin 250mg\",\"memo\":\"Amoxicillin\",\"uom\":\"Caps\",\"qty\":\"15\",\"unitPrice\":\"100\",\"lineDiscount\":\"0\",\"lineTotal\":\"1500\"},{\"id\":\"2\",\"name\":\"Paracetamol 500mg\",\"memo\":\"Paracetamol\",\"uom\":\"Caps\",\"qty\":\"10\",\"unitPrice\":\"50\",\"lineDiscount\":\"0\",\"lineTotal\":\"500\"}]','LKR',2000,'10',200,2190,2,'Approved',1,2,'2022-11-22 19:02:43','2022-11-22 19:04:19');

/*!40000 ALTER TABLE `quotations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusID` int(11) NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `type`, `name`, `email`, `mobile`, `dob`, `email_verified_at`, `password`, `statusID`, `status`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,1,'Gayan Perera','gayan@gmail.com','0778912345','1998-10-01 00:00:00',NULL,'$2y$10$zidEWVfL/YkIBDi94vr8OusINyNde.3vXmrjf.ZURgke4w7UHtrF.',1,'Active','Sh0ivLqaG3nFpRjPptkYzXEyDXlvisT9ZAykuVEv7eq0PRjBPesq5PHnxtar','2022-11-22 09:29:18','2022-11-22 09:29:18'),
	(2,2,'Nimesh Lara','nimesh@gmail.com','0778901234','1996-12-20 00:00:00',NULL,'$2y$10$2FdRA226Cmpmk01.kfRBWuAtstHvVxGIpsJK0LcNE7dUAflz2.UHS',1,'Active','LPp9VlMRF6mU4Wi6QClbwIR8NhDmhyfto7ecLElbKmJcvCKB3PvWSOKwPjDD','2022-11-22 12:54:20','2022-11-22 12:54:20');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
