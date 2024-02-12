/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - ecom9
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ecom9` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci */;

USE `ecom9`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm` enum('No','Yes') DEFAULT 'No',
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`type`,`vendor_id`,`mobile`,`email`,`password`,`confirm`,`image`,`status`,`created_at`,`updated_at`) values 
(1,'نادر داورمنش','superadmin',0,'09126612898','nader.davarmanesh62@gmail.com','$2y$10$wd51DlChAIuP0OUXmjwKS.9w43cswQz6W/DphFhfQ/Rk.VBKsxxSm','No','82833.jpg',1,NULL,'2023-11-07 08:05:35'),
(45,'رامین','vendor',46,'0322323','ramin2@gmail.com','$2y$10$g/6whexkFgU6dIV3nncmO.wPs4llIqq.M66tHKQLtTq94Be9nSteG','Yes',NULL,1,'2024-02-07 15:11:31','2024-02-12 09:49:35');

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

insert  into `banners`(`id`,`image`,`type`,`link`,`title`,`alt`,`status`,`created_at`,`updated_at`) values 
(12,'75169.png','Fix','asdf','asdf','asdf',1,'2023-11-22 13:51:31','2023-11-22 13:51:31'),
(14,'99456.png','Slider','parsegzoz.com','parsegzoz.com','parsegzoz.com',1,'2024-01-24 09:41:55','2024-01-24 09:41:55'),
(15,'53982.png','Slider','parsegzoz.com','parsegzoz.com','parsegzoz.com',1,'2024-01-24 09:42:35','2024-01-24 09:42:35'),
(16,'59480.png','Slider','parsegzoz.com','parsegzoz.com','parsegzoz.com',1,'2024-01-24 09:42:48','2024-01-24 09:42:48');

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `brands` */

insert  into `brands`(`id`,`name`,`status`,`created_at`,`updated_at`) values 
(1,'Arrow',1,NULL,'2023-12-25 11:22:36'),
(2,'Gap',1,NULL,'2023-11-14 08:20:40'),
(3,'Lee',1,NULL,NULL),
(4,'Samsung',1,NULL,NULL),
(5,'LG',1,NULL,NULL),
(8,'IM',1,'2023-11-14 08:33:12','2023-11-14 08:33:12'),
(9,'iphones',1,'2023-11-14 08:36:44','2023-11-14 08:36:56'),
(10,'دیگر',1,'2023-11-14 08:40:07','2023-11-14 08:40:07'),
(13,'nike',1,'2023-11-27 05:31:46','2023-11-27 05:31:46'),
(14,'پارس اگزوز',1,'2024-01-29 12:46:38','2024-01-29 12:46:38');

/*Table structure for table `carts` */

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_discount` varchar(255) DEFAULT '0',
  `description` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`parent_id`,`section_id`,`category_name`,`category_image`,`category_discount`,`description`,`url`,`meta_title`,`meta_description`,`meta_keywords`,`status`,`created_at`,`updated_at`) values 
(1,0,1,'Men','','0','فاه شستیبمنشب سشینبتشسمکن شسبنتشسیمکبت','men',NULL,NULL,NULL,1,NULL,'2024-02-04 11:11:31'),
(3,0,1,'Kids','','0','','kids','','','',1,NULL,NULL),
(4,0,2,'گوشی هوشمند','','10',NULL,'موبایل','موبایل','موبایل','موبایل',1,'2023-11-12 08:31:42','2023-11-13 08:42:22'),
(6,1,1,'تی شرت','','0',NULL,'تی شرت','تی شرت مردانه','تی شرت های مردانه در رنگ ها وسایز های مختلف','تی شرت مردانه , رنگ بندی , سایز بندی , سایزهای مختلف , کتان , ابرشمی , چهار خانه',1,'2023-11-13 07:25:50','2024-01-21 06:25:38'),
(7,2,1,'تاپ','','0',NULL,'تاپ',NULL,NULL,NULL,1,'2023-11-13 07:29:33','2023-11-13 07:29:33'),
(9,0,1,'زنانه','','0',NULL,'زنانه',NULL,NULL,NULL,1,'2023-11-15 05:25:01','2023-11-15 05:25:01'),
(10,9,1,'دامن','','0',NULL,'دامن',NULL,NULL,NULL,1,'2023-11-20 09:39:37','2024-01-18 08:23:17'),
(11,4,2,'ایفون','','10',NULL,'آیفون',NULL,NULL,NULL,1,'2023-11-20 09:41:12','2023-11-20 09:41:12'),
(12,0,3,'فریزر','','10',NULL,'فریزر',NULL,NULL,NULL,1,'2023-11-20 09:54:58','2023-11-20 09:54:58'),
(13,1,1,'سویی شرت','','10','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','سویی شرت',NULL,NULL,NULL,1,'2023-11-27 08:25:35','2023-11-27 11:27:25'),
(14,9,1,'تاپ','','50',NULL,'تاپ',NULL,NULL,NULL,1,'2023-11-30 07:48:22','2023-11-30 07:48:22'),
(15,4,2,'سامسونگ','','10',NULL,'سامسونگ','سامسونگ','سامسونگ',NULL,1,'2023-12-03 09:08:22','2023-12-03 09:08:22'),
(16,0,36,'انبار میانی','','0',NULL,'انبارمیانی','انبارمیانی','انبارمیانی','انبارمیانی',1,'2024-01-29 12:45:59','2024-01-29 12:45:59');

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` int(11) DEFAULT NULL,
  `country_name` varchar(64) NOT NULL,
  `en_name` varchar(64) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `countries` */

insert  into `countries`(`id`,`country`,`country_name`,`en_name`,`latitude`,`longitude`,`status`) values 
(1,1,'آذربایجان شرقی','East Azerbaijan',37.90357330,46.26821090,1),
(2,1,'آذربایجان غربی','West Azerbaijan',37.45500620,45.00000000,1),
(3,1,'اردبیل','Ardabil',38.48532760,47.89112090,1),
(4,1,'اصفهان','Isfahan',32.65462750,51.66798260,1),
(5,1,'البرز','Alborz',35.99604670,50.92892460,1),
(6,1,'ایلام','Ilam',33.29576180,46.67053400,1),
(7,1,'بوشهر','Bushehr',28.92338370,50.82031400,1),
(8,1,'تهران','Tehran',35.69611100,51.42305600,1),
(9,1,'چهارمحال و بختیاری','Chaharmahal and Bakhtiari ',31.96143480,50.84563230,1),
(10,1,'خراسان جنوبی','South Khorasan',32.51756430,59.10417580,1),
(11,1,'خراسان رضوی','Razavi Khorasan',35.10202530,59.10417580,1),
(12,1,'خراسان شمالی','North Khorasan',37.47103530,57.10131880,1),
(13,1,'خوزستان','Khuzestan',31.43601490,49.04131200,1),
(14,1,'زنجان','Zanjan',36.50181850,48.39881860,1),
(15,1,'سمنان','Semnan',35.22555850,54.43421380,1),
(16,1,'سیستان و بلوچستان','Sistan and Baluchestan',27.52999060,60.58206760,1),
(17,1,'فارس','Fars',29.10438130,53.04589300,1),
(18,1,'قزوین','Qazvin',36.08813170,49.85472660,1),
(19,1,'قم','Qom',34.63994430,50.87594190,1),
(20,1,'كردستان','Kurdistan',35.95535790,47.13621250,1),
(21,1,'كرمان','Kerman',30.28393790,57.08336280,1),
(22,1,'كرمانشاه','Kermanshah',34.31416700,47.06500000,1),
(23,1,'کهگیلویه و بویراحمد','Kohgiluyeh and Boyer-Ahmad',30.65094790,51.60525000,1),
(24,1,'گلستان','Golestan',37.28981230,55.13758340,1),
(25,1,'گیلان','Gilan',37.11716170,49.52799960,1),
(26,1,'لرستان','Lorestan',33.58183940,48.39881860,1),
(27,1,'مازندران','Mazandaran',36.22623930,52.53186040,1),
(28,1,'مركزی','Markazi',33.50932940,-92.39611900,1),
(29,1,'هرمزگان','Hormozgan',27.13872300,55.13758340,1),
(30,1,'همدان','Hamadan',34.76079990,48.39881860,1),
(31,1,'یزد','Yazd',32.10063870,54.43421380,1);

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `coupon_option` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `brands` text NOT NULL,
  `users` varchar(255) NOT NULL,
  `coupon_type` varchar(255) NOT NULL,
  `amount_type` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expire_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupons` */

/*Table structure for table `delivery_addresses` */

DROP TABLE IF EXISTS `delivery_addresses`;

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `delivery_addresses` */

insert  into `delivery_addresses`(`id`,`user_id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`mobile`,`status`,`created_at`,`updated_at`) values 
(14,36,'sadf','asdf','sdf','af','آذربایجان غربی','1234567899','09126612898',1,'2024-02-12 07:54:28','2024-02-12 07:54:28'),
(15,36,'نادر','میدان فردوسی','کرمانشاه','کارمندان','كرمانشاه','1234567899','09126612898',1,'2024-02-12 08:48:46','2024-02-12 08:48:46');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_10_24_042536_create_vendors_table',2),
(6,'2023_10_24_043546_create_admins_table',3),
(7,'2023_10_26_080127_create_vendors_business_details_table',4),
(8,'2023_10_26_081157_create_vendors_bank_details',5),
(9,'2023_11_07_122223_create_sections_table',6),
(10,'2023_11_11_085303_create_categories_table',7),
(11,'2023_11_14_062628_create_brand_table',8),
(12,'2023_11_14_063117_create_brands_table',9),
(13,'2023_11_14_090404_create_products_table',10),
(14,'2023_11_16_072031_create_producte_attributes_tabel',11),
(15,'2023_11_16_074641_create_products_attributes_table',12),
(16,'2023_11_16_074835_create_product_attributes_table',13),
(17,'2023_11_18_080758_create_products_images_table',14),
(18,'2023_11_20_104903_create_banners_tabale',15),
(19,'2023_11_20_110131_create_banners_table',16),
(20,'2023_11_22_112425_update_banners_table',17),
(21,'2023_11_25_050819_update_products_table',18),
(22,'2023_11_29_052248_create_products_filters_table',19),
(23,'2023_11_29_053314_create_products_filters_values_table',20),
(24,'2023_12_12_071837_create_recently_viewed_products_table',21),
(25,'2023_12_12_092742_create_carts_table',22),
(26,'2023_12_19_082455_add_columns_to_users',23),
(27,'2023_12_25_071436_create_coupons_table',24),
(28,'2023_12_30_092506_create_delivery_addresses_table',25),
(29,'2024_01_01_105850_create_orders_table',26),
(30,'2024_01_01_110506_create_orders_products_table',27),
(31,'2024_01_06_103930_create_order_statuses_table',28),
(32,'2024_01_07_093456_create_orders_logs_table',29),
(33,'2024_01_07_113949_update_orders_tabel',30),
(34,'2024_01_11_100808_create_shipping_charges_tabel',31),
(35,'2024_01_13_052847_create_shipping_charges_table',32),
(36,'2024_01_13_113611_drop_column_from_shipping_charges_table',33),
(37,'2024_01_13_113842_add_column_to_shipping_charges_table',34),
(38,'2024_01_21_115723_create_newsletter_subscribers_table',35);

/*Table structure for table `newsletter_subscribers` */

DROP TABLE IF EXISTS `newsletter_subscribers`;

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `newsletter_subscribers` */

insert  into `newsletter_subscribers`(`id`,`email`,`status`,`created_at`,`updated_at`) values 
(1,'nader.davarmanesh62@gmail.com',1,NULL,NULL),
(2,'nader.davarmanesh63@gmail.com',1,NULL,NULL),
(3,'nader@gmail.com',1,'2024-01-22 05:39:01','2024-01-22 05:39:01'),
(4,'kkk@gmail.com',1,'2024-01-22 05:42:18','2024-01-22 05:42:18'),
(5,'aaa@gmail.com',1,'2024-01-22 05:44:24','2024-01-22 05:44:24'),
(6,'aaa@gmail.',1,'2024-01-22 05:44:40','2024-01-22 05:44:40'),
(7,'aaa',1,'2024-01-22 05:44:54','2024-01-22 05:44:54'),
(9,'aada@gmail.com',1,'2024-01-22 05:58:21','2024-01-22 05:58:21');

/*Table structure for table `order_item_statuses` */

DROP TABLE IF EXISTS `order_item_statuses`;

CREATE TABLE `order_item_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_item_statuses` */

insert  into `order_item_statuses`(`id`,`name`,`status`,`created_at`,`updated_at`) values 
(1,'در انتظار تایید','1',NULL,NULL),
(2,'در حال ارسال','1',NULL,NULL),
(3,'ارسال شده','1',NULL,NULL),
(4,'دریافت شده','1',NULL,NULL);

/*Table structure for table `order_statuses` */

DROP TABLE IF EXISTS `order_statuses`;

CREATE TABLE `order_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_statuses` */

insert  into `order_statuses`(`id`,`name`,`status`,`created_at`,`updated_at`) values 
(1,'New','1',NULL,NULL),
(2,'Pending','1',NULL,NULL),
(3,'Cancelled','1',NULL,NULL),
(4,'In Process','1',NULL,NULL),
(5,'Shipped','1',NULL,NULL),
(6,'Partially Shipped','1',NULL,NULL),
(7,'Delivered','1',NULL,NULL),
(8,'Partially Delivered','1',NULL,NULL),
(9,'Paid','1',NULL,NULL);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_amount` double(8,2) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_gateway` varchar(255) NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`mobile`,`email`,`shipping_charges`,`coupon_code`,`coupon_amount`,`order_status`,`payment_method`,`payment_gateway`,`grand_total`,`courier_name`,`tracking_number`,`created_at`,`updated_at`) values 
(54,36,'sadf','asdf','sdf','af','آذربایجان غربی','1234567899','09126612898','nader.dvarmanesh62@gmail.com',0.00,'بدون تخفیف',0.00,'Pending','Prepaid','Paypal',300000.00,NULL,NULL,'2024-02-12 09:02:13','2024-02-12 09:02:13'),
(55,36,'نادر','میدان فردوسی','کرمانشاه','کارمندان','كرمانشاه','1234567899','09126612898','nader.dvarmanesh62@gmail.com',0.00,'بدون تخفیف',0.00,'New','COD','COD',10.00,NULL,NULL,'2024-02-12 09:40:59','2024-02-12 09:40:59'),
(56,36,'نادر','میدان فردوسی','کرمانشاه','کارمندان','كرمانشاه','1234567899','09126612898','nader.dvarmanesh62@gmail.com',0.00,'بدون تخفیف',0.00,'Pending','Prepaid','Paypal',400000.00,NULL,NULL,'2024-02-12 10:14:09','2024-02-12 10:14:09'),
(57,36,'نادر','میدان فردوسی','کرمانشاه','کارمندان','كرمانشاه','1234567899','09126612898','nader.dvarmanesh62@gmail.com',0.00,'بدون تخفیف',0.00,'New','COD','COD',700000.00,NULL,NULL,'2024-02-12 11:36:22','2024-02-12 11:36:22');

/*Table structure for table `orders_logs` */

DROP TABLE IF EXISTS `orders_logs`;

CREATE TABLE `orders_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_item_id` int(11) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders_logs` */

insert  into `orders_logs`(`id`,`order_id`,`order_item_id`,`order_status`,`created_at`,`updated_at`) values 
(14,56,80,'در انتظار تایید','2024-02-12 10:26:36','2024-02-12 10:26:36');

/*Table structure for table `orders_products` */

DROP TABLE IF EXISTS `orders_products`;

CREATE TABLE `orders_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `item_status` varchar(255) DEFAULT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders_products` */

insert  into `orders_products`(`id`,`order_id`,`user_id`,`vendor_id`,`admin_id`,`product_id`,`product_code`,`product_name`,`product_color`,`product_size`,`product_price`,`item_status`,`courier_name`,`tracking_number`,`product_qty`,`created_at`,`updated_at`) values 
(76,54,36,0,1,24,'ٍEQ1','انبار میانی کویک','نقره ایی','free',200000.00,NULL,NULL,NULL,1,'2024-02-12 09:02:13','2024-02-12 09:02:13'),
(77,54,36,1,2,20,'p13','تی شرت صورتی','صورتی','کوچک',100000.00,NULL,NULL,NULL,1,'2024-02-12 09:02:13','2024-02-12 09:02:13'),
(78,55,36,0,1,13,'B01','تی شرت آبی','آبی','کوچک',10.00,NULL,NULL,NULL,1,'2024-02-12 09:40:59','2024-02-12 09:40:59'),
(79,56,36,0,1,24,'ٍEQ1','انبار میانی کویک','نقره ایی','free',200000.00,NULL,NULL,NULL,1,'2024-02-12 10:14:09','2024-02-12 10:14:09'),
(80,56,36,46,45,25,'egz32','انبار عقب بنز','سیاه','free',200000.00,'در انتظار تایید',NULL,NULL,1,'2024-02-12 10:14:09','2024-02-12 10:26:36'),
(81,57,36,1,2,20,'p13','تی شرت صورتی','صورتی','کوچک',100000.00,NULL,NULL,NULL,1,'2024-02-12 11:36:22','2024-02-12 11:36:22'),
(82,57,36,46,45,25,'egz32','انبار عقب بنز','free','free',200000.00,NULL,NULL,NULL,3,'2024-02-12 11:36:22','2024-02-12 11:36:22');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `product_attributes` */

DROP TABLE IF EXISTS `product_attributes`;

CREATE TABLE `product_attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_attributes` */

insert  into `product_attributes`(`id`,`product_id`,`size`,`price`,`stock`,`sku`,`status`,`created_at`,`updated_at`) values 
(12,13,'کوچک',10.00,2,'t-b-1',1,'2023-12-05 08:25:26','2024-02-12 09:40:59'),
(13,13,'متوسط',10.00,6,'t-b-2',1,'2023-12-05 08:26:03','2024-01-28 07:30:31'),
(14,13,'بزرگ',10.00,10,'t-b-3',1,'2023-12-05 08:26:30','2024-01-28 07:30:31'),
(15,16,'64 گیگ',120000.00,5,'s1',1,'2023-12-05 08:27:23','2023-12-05 08:27:23'),
(16,16,'128 گیگ',130000.00,4,'s2',1,'2023-12-05 08:27:53','2023-12-05 08:27:53'),
(17,15,'کوچک',120000.00,1,'SM002',1,'2023-12-05 08:49:13','2024-01-22 09:11:01'),
(19,20,'کوچک',200000.00,2,'SM002d',1,'2023-12-26 11:53:18','2024-02-12 11:36:22'),
(20,22,'کوچک',10.00,5,'dff',1,'2024-01-18 08:21:10','2024-01-20 08:44:25'),
(21,22,'بزرگ',10.00,9,'dcs',1,'2024-01-18 09:33:28','2024-01-20 08:49:36'),
(22,23,'free',2000.00,8,'eg01',1,'2024-01-28 04:34:00','2024-01-29 12:07:12'),
(23,24,'free',200000.00,8,'egz123',1,'2024-02-04 07:12:25','2024-02-12 10:14:09'),
(24,25,'free',200000.00,16,'egz۳۲',1,'2024-02-12 10:12:13','2024-02-12 11:36:22');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_discount` float DEFAULT NULL,
  `product_weight` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `group_code` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `opreation_system` varchar(255) DEFAULT NULL,
  `screen_size` varchar(255) DEFAULT NULL,
  `fit` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `sleeve` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `fabric` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') NOT NULL,
  `is_bestseller` enum('NO','Yes') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`section_id`,`category_id`,`brand_id`,`admin_id`,`vendor_id`,`admin_type`,`product_name`,`product_code`,`product_color`,`product_price`,`product_discount`,`product_weight`,`product_image`,`product_video`,`group_code`,`description`,`opreation_system`,`screen_size`,`fit`,`pattern`,`sleeve`,`ram`,`fabric`,`meta_title`,`meta_keywords`,`meta_description`,`is_featured`,`is_bestseller`,`status`,`created_at`,`updated_at`) values 
(13,1,6,1,1,0,'superadmin','تی شرت آبی','B01','آبی',120000,0,600,'89410.jfif','55959.mp4','100',NULL,NULL,NULL,'کوچک','گل گلی','آستین بلند',NULL,'کتان','تی شرت مردانه','تی شردت ,مردانه,آستین کوتاه,آبی,تی شرت ساده','تی شرت مردانه آبی آستین کوتاه','Yes','Yes',1,'2023-11-23 10:58:10','2024-02-04 07:19:59'),
(14,1,6,2,1,0,'superadmin','تی شرت قرمز','R01','قرمز',30000,10,0,'84253.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'کتان',NULL,NULL,NULL,'Yes','NO',1,'2023-11-23 10:59:22','2024-02-04 07:26:32'),
(15,1,6,3,1,0,'superadmin','تی شرت سبز','G01','سبز',20000,20,0,'36484.jfif',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ابریشم',NULL,NULL,NULL,'Yes','NO',1,'2023-11-23 11:01:20','2024-02-04 07:26:03'),
(16,2,11,4,1,0,'superadmin','گوشی سامسونگ','M01','صورتی',20000,20,0,'60107.jpg',NULL,NULL,'گوشی هوشمند سامسونگ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','Yes',1,'2023-11-23 11:06:19','2024-02-04 11:54:53'),
(17,2,11,9,1,0,'superadmin','گوشی آیفون','I01','آبی',20000,10,0,'97449.jfif',NULL,NULL,'گوش آیفون با بهترین امکانات',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yes','NO',1,'2023-11-23 11:07:43','2024-02-04 12:08:39'),
(18,1,13,13,1,0,'superadmin','سویی شرت سفید','sw01','سفید',450000,10,0,'32487.jfif',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'آستین بلند',NULL,'پلی استر',NULL,NULL,NULL,'Yes','NO',1,'2023-11-27 09:46:21','2024-02-04 07:20:21'),
(19,2,4,9,1,0,'superadmin','گوشی آیفون','AT02','آبی',20000,10,0,'13128.webp',NULL,NULL,NULL,'IOS','۶.۰ اینچ و بزرگتر',NULL,NULL,NULL,'4 گیگ',NULL,NULL,NULL,NULL,'No','NO',1,'2023-12-03 09:36:15','2023-12-03 09:55:50'),
(20,1,6,2,2,1,'vendor','تی شرت صورتی','p13','صورتی',20000,50,1500,'21774.webp',NULL,'100',NULL,NULL,NULL,NULL,NULL,'آستین بلند',NULL,'کتان',NULL,NULL,NULL,'No','NO',1,'2023-12-09 10:30:50','2024-02-06 06:06:58'),
(22,1,10,1,2,1,'vendor','دامن','456','سیاه',20000,0,700,'64757.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'گل گلی','آستین بلند',NULL,NULL,NULL,NULL,NULL,'No','NO',1,'2024-01-18 08:19:56','2024-01-22 08:48:48'),
(24,36,16,14,1,0,'superadmin','انبار میانی کویک','ٍEQ1','نقره ایی',200000,0,0,'31432.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'انبار میانی کویک','انبار میانی کویک','انبار میانی کویک','No','NO',1,'2024-01-29 12:49:22','2024-01-29 12:49:40'),
(25,36,16,14,45,46,'vendor','انبار عقب بنز','egz32','free',200000,0,0,'38941.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','NO',1,'2024-02-12 10:03:18','2024-02-12 10:29:06');

/*Table structure for table `products_filters` */

DROP TABLE IF EXISTS `products_filters`;

CREATE TABLE `products_filters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cat_ids` varchar(255) NOT NULL,
  `filter_name` varchar(255) NOT NULL,
  `filter_column` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products_filters` */

insert  into `products_filters`(`id`,`cat_ids`,`filter_name`,`filter_column`,`status`,`created_at`,`updated_at`) values 
(5,'1,6,13','پارچه','fabric',1,'2023-11-30 07:04:17','2023-11-30 07:04:17'),
(6,'4,11','رم','ram',1,'2023-11-30 07:10:37','2023-11-30 07:10:37'),
(7,'1,6,13,3,9,10,14','آستین','sleeve',1,'2023-11-30 07:49:47','2023-11-30 07:49:47'),
(8,'1,6,13,3,9,10,14','طرح','pattern',1,'2023-11-30 07:51:32','2023-11-30 07:51:32'),
(9,'1,6,13,3,9,14','اندازه','fit',1,'2023-11-30 07:53:55','2023-11-30 07:53:55'),
(10,'4,11','سایز اسکرین','screen_size',1,'2023-11-30 08:52:32','2023-11-30 08:52:32'),
(11,'4,11,15','سیستم عامل','opreation_system',1,'2023-11-30 08:55:18','2023-12-03 09:20:46');

/*Table structure for table `products_filters_values` */

DROP TABLE IF EXISTS `products_filters_values`;

CREATE TABLE `products_filters_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filter_id` int(11) NOT NULL,
  `filter_value` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products_filters_values` */

insert  into `products_filters_values`(`id`,`filter_id`,`filter_value`,`status`,`created_at`,`updated_at`) values 
(5,5,'کتان',1,'2023-11-30 08:46:58','2023-11-30 08:46:58'),
(6,5,'پلی استر',1,'2023-11-30 08:47:37','2023-11-30 08:47:37'),
(7,5,'ابریشم',1,'2023-11-30 08:47:52','2023-11-30 08:47:52'),
(8,7,'آستین بلند',1,'2023-11-30 08:48:20','2023-11-30 08:48:20'),
(9,6,'4 گیگ',1,'2023-11-30 08:51:09','2023-11-30 08:51:09'),
(10,6,'8 گیگ',1,'2023-11-30 08:51:22','2023-11-30 08:51:22'),
(11,10,'بالاتر از 3.9 اینچ',1,'2023-11-30 08:53:46','2023-11-30 08:53:46'),
(12,10,'4 تا 4.4 اینچ',1,'2023-11-30 08:54:20','2023-11-30 08:54:20'),
(13,11,'اندرویید',1,'2023-11-30 08:55:59','2023-11-30 08:55:59'),
(14,11,'IOS',1,'2023-11-30 08:56:23','2023-11-30 08:56:23'),
(15,11,'windows',1,'2023-11-30 08:56:42','2023-11-30 08:56:42'),
(16,8,'گل گلی',1,'2023-11-30 12:07:36','2023-11-30 12:07:36'),
(17,10,'۶.۰ اینچ و بزرگتر',1,'2023-12-03 09:28:39','2023-12-03 09:28:39'),
(18,5,'5.۰ اینچ و بزرگتر',1,'2023-12-03 09:28:49','2023-12-03 09:28:49'),
(19,9,'کوچک',1,'2023-12-11 08:06:37','2023-12-11 08:06:37'),
(20,8,'چهارخانه',1,'2024-01-23 11:59:54','2024-01-23 11:59:54');

/*Table structure for table `products_images` */

DROP TABLE IF EXISTS `products_images`;

CREATE TABLE `products_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products_images` */

insert  into `products_images`(`id`,`product_id`,`image`,`status`,`created_at`,`updated_at`) values 
(2,1,'download (2).jfif25605.jfif',1,'2023-11-18 09:06:26','2023-11-18 09:46:52'),
(4,13,'123.jfif63329.jfif',1,'2023-12-10 09:00:03','2023-12-10 09:00:03'),
(5,14,'644e704d16ce2864228c6566a660a3b81a416c48_cms8141_5.webp26868.webp',1,'2023-12-11 08:54:43','2023-12-11 08:54:43'),
(6,23,'egzoz.png90938.png',1,'2024-01-28 06:47:09','2024-01-28 06:47:09');

/*Table structure for table `recently_viewed_products` */

DROP TABLE IF EXISTS `recently_viewed_products`;

CREATE TABLE `recently_viewed_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `recently_viewed_products` */

insert  into `recently_viewed_products`(`id`,`product_id`,`session_id`,`created_at`,`updated_at`) values 
(3,13,'c7687055b56486d21ed59764a2f0751a',NULL,NULL),
(4,15,'c7687055b56486d21ed59764a2f0751a',NULL,NULL),
(5,14,'c7687055b56486d21ed59764a2f0751a',NULL,NULL),
(6,20,'c7687055b56486d21ed59764a2f0751a',NULL,NULL),
(7,15,'304a5509e38148aefc3f6b8ee72251d8',NULL,NULL),
(8,17,'304a5509e38148aefc3f6b8ee72251d8',NULL,NULL),
(9,13,'304a5509e38148aefc3f6b8ee72251d8',NULL,NULL),
(10,13,'7fbc8a228d47b09a2cb42208235a4516',NULL,NULL),
(11,18,'7fbc8a228d47b09a2cb42208235a4516',NULL,NULL),
(12,17,'7fbc8a228d47b09a2cb42208235a4516',NULL,NULL),
(13,16,'7fbc8a228d47b09a2cb42208235a4516',NULL,NULL),
(14,13,'316fdfe84a632cb0ebda6ac52927fe10',NULL,NULL),
(15,18,'316fdfe84a632cb0ebda6ac52927fe10',NULL,NULL),
(16,16,'316fdfe84a632cb0ebda6ac52927fe10',NULL,NULL),
(17,13,'3ca30ff03cff8019be09533b44a82025',NULL,NULL),
(18,20,'3ca30ff03cff8019be09533b44a82025',NULL,NULL),
(19,15,'3ca30ff03cff8019be09533b44a82025',NULL,NULL),
(20,13,'f7b22a19bb98e15fe48dd56aa4914679',NULL,NULL),
(21,15,'f7b22a19bb98e15fe48dd56aa4914679',NULL,NULL),
(22,13,'5a8d5380eafa28edd37e0004f336d13f',NULL,NULL),
(23,15,'5a8d5380eafa28edd37e0004f336d13f',NULL,NULL),
(24,13,'1cee1d736a82b994676771ac44a419fa',NULL,NULL),
(25,19,'1cee1d736a82b994676771ac44a419fa',NULL,NULL),
(26,17,'1cee1d736a82b994676771ac44a419fa',NULL,NULL),
(27,16,'1cee1d736a82b994676771ac44a419fa',NULL,NULL),
(28,18,'1cee1d736a82b994676771ac44a419fa',NULL,NULL),
(29,15,'1cee1d736a82b994676771ac44a419fa',NULL,NULL),
(30,20,'1cee1d736a82b994676771ac44a419fa',NULL,NULL),
(31,15,'65ca17f30a4427b6ae07a3d683c93d4c',NULL,NULL),
(32,15,'bdb44f1cde46a3d1653d53c056d4f145',NULL,NULL),
(33,20,'bdb44f1cde46a3d1653d53c056d4f145',NULL,NULL),
(34,15,'badaed8b0cba8060525aa58a5fb06277',NULL,NULL),
(35,13,'badaed8b0cba8060525aa58a5fb06277',NULL,NULL),
(36,20,'badaed8b0cba8060525aa58a5fb06277',NULL,NULL),
(37,16,'69d86a1eb0c69a95e115b770411278a2',NULL,NULL),
(38,15,'400a12c873b0acc95158468c91ee915b',NULL,NULL),
(39,20,'400a12c873b0acc95158468c91ee915b',NULL,NULL),
(40,13,'400a12c873b0acc95158468c91ee915b',NULL,NULL),
(41,13,'2782706b14bdf4e046b040d195b61a86',NULL,NULL),
(42,20,'2782706b14bdf4e046b040d195b61a86',NULL,NULL),
(43,18,'2782706b14bdf4e046b040d195b61a86',NULL,NULL),
(44,16,'2782706b14bdf4e046b040d195b61a86',NULL,NULL),
(45,20,'f98cb6d8df3ea09b10129bc04f667449',NULL,NULL),
(46,13,'f98cb6d8df3ea09b10129bc04f667449',NULL,NULL),
(47,16,'f98cb6d8df3ea09b10129bc04f667449',NULL,NULL),
(48,20,'9e5ab412721847960f0065672ce936d5',NULL,NULL),
(49,13,'9e5ab412721847960f0065672ce936d5',NULL,NULL),
(50,16,'460d7b80e04d6af9ecd57fd515bb7e6d',NULL,NULL),
(51,14,'460d7b80e04d6af9ecd57fd515bb7e6d',NULL,NULL),
(52,13,'460d7b80e04d6af9ecd57fd515bb7e6d',NULL,NULL),
(53,20,'460d7b80e04d6af9ecd57fd515bb7e6d',NULL,NULL),
(54,13,'29377d9bf53ccdfaf5d281e2e53afcf8',NULL,NULL),
(55,13,'672b860ac72dbc59d534f23368e21337',NULL,NULL),
(56,13,'e995e1d70597ac82699a46bbb2e8b6aa',NULL,NULL),
(57,20,'e995e1d70597ac82699a46bbb2e8b6aa',NULL,NULL),
(58,13,'688950dbd8917abbe2f7b45416e55fb7',NULL,NULL),
(59,13,'f29e96713337a9b373f42eb9bbb7ab33',NULL,NULL),
(60,19,'ada698a68c0f9b4b826b3db922c299d7',NULL,NULL),
(61,22,'aed6a0adf5c25b35901e047baeeca5cb',NULL,NULL),
(62,13,'aed6a0adf5c25b35901e047baeeca5cb',NULL,NULL),
(63,13,'3045b154d26effbce360163fd8a2c181',NULL,NULL),
(64,14,'3045b154d26effbce360163fd8a2c181',NULL,NULL),
(65,20,'3045b154d26effbce360163fd8a2c181',NULL,NULL),
(66,22,'3045b154d26effbce360163fd8a2c181',NULL,NULL),
(67,13,'120a845b37cd574b692a02d19d219d85',NULL,NULL),
(68,22,'120a845b37cd574b692a02d19d219d85',NULL,NULL),
(69,18,'120a845b37cd574b692a02d19d219d85',NULL,NULL),
(70,15,'058aa47e14d6a5f31dc51dfdfdb9f856',NULL,NULL),
(71,13,'af59dbc22a470144544798b640434edd',NULL,NULL),
(72,16,'57275fb29ed7789d106cdbbb80cf41b0',NULL,NULL),
(73,23,'c279bc1bcf2215218d6c581b76a718c7',NULL,NULL),
(74,22,'87c2d3aa2ce7aecc13328b0c8ae60229',NULL,NULL),
(75,23,'87c2d3aa2ce7aecc13328b0c8ae60229',NULL,NULL),
(76,23,'b76867a6435f483ada4081b3e9883491',NULL,NULL),
(77,13,'b76867a6435f483ada4081b3e9883491',NULL,NULL),
(78,20,'b76867a6435f483ada4081b3e9883491',NULL,NULL),
(79,19,'01eb88a0b70213c557d07e6574795222',NULL,NULL),
(80,16,'01eb88a0b70213c557d07e6574795222',NULL,NULL),
(81,23,'01eb88a0b70213c557d07e6574795222',NULL,NULL),
(82,20,'01eb88a0b70213c557d07e6574795222',NULL,NULL),
(83,13,'01eb88a0b70213c557d07e6574795222',NULL,NULL),
(84,17,'b73187c56c01697d592a7cf0121b9699',NULL,NULL),
(85,23,'b73187c56c01697d592a7cf0121b9699',NULL,NULL),
(86,13,'b73187c56c01697d592a7cf0121b9699',NULL,NULL),
(87,24,'bd8513e43eb474747513d26456a489c1',NULL,NULL),
(88,14,'9a688a83513a39ab7ed55241a0ab7477',NULL,NULL),
(89,13,'ffbd7fb4d4c2f10ddb03dc7c3f70d808',NULL,NULL),
(90,14,'ffbd7fb4d4c2f10ddb03dc7c3f70d808',NULL,NULL),
(91,24,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(92,20,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(93,13,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(94,22,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(95,18,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(96,15,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(97,14,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(98,16,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(99,19,'4d19c8eb634e54c4bc65e018002cf23b',NULL,NULL),
(100,20,'67747d04a1da8bebcf6c93b4c7974544',NULL,NULL),
(101,13,'67747d04a1da8bebcf6c93b4c7974544',NULL,NULL),
(102,15,'67747d04a1da8bebcf6c93b4c7974544',NULL,NULL),
(103,24,'67747d04a1da8bebcf6c93b4c7974544',NULL,NULL),
(104,20,'52c343ea101e074e5cc6542fd7a9030a',NULL,NULL),
(105,14,'67747d04a1da8bebcf6c93b4c7974544',NULL,NULL),
(106,20,'ef054e152d8254803720722af013ea72',NULL,NULL),
(107,24,'ef054e152d8254803720722af013ea72',NULL,NULL),
(108,13,'ef054e152d8254803720722af013ea72',NULL,NULL),
(109,24,'0115d3e2f54213cabc902f836652dcb6',NULL,NULL),
(110,20,'0115d3e2f54213cabc902f836652dcb6',NULL,NULL),
(111,20,'b25631639343ef3d2db622807e162b64',NULL,NULL),
(112,24,'b25631639343ef3d2db622807e162b64',NULL,NULL),
(113,13,'b0ae858103ff46b2d4f91aea1c878424',NULL,NULL),
(114,25,'b0ae858103ff46b2d4f91aea1c878424',NULL,NULL),
(115,24,'b0ae858103ff46b2d4f91aea1c878424',NULL,NULL),
(116,20,'b0ae858103ff46b2d4f91aea1c878424',NULL,NULL);

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sections` */

insert  into `sections`(`id`,`name`,`status`,`created_at`,`updated_at`) values 
(1,'clothes',1,NULL,'2023-11-22 05:23:44'),
(2,'Electornic',1,NULL,'2023-11-14 09:39:12'),
(3,'لوازم خانه',1,NULL,'2023-11-20 09:53:44'),
(4,'کامپیوتر',1,'2023-11-11 08:41:03','2023-11-20 09:09:07'),
(36,'اگزوز',1,'2024-01-29 12:43:27','2024-01-29 12:43:27');

/*Table structure for table `shipping_charges` */

DROP TABLE IF EXISTS `shipping_charges`;

CREATE TABLE `shipping_charges` (
  `id` double DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `0_500g` double DEFAULT NULL,
  `501_1000g` double DEFAULT NULL,
  `1001_2000g` double DEFAULT NULL,
  `2001_5000g` double DEFAULT NULL,
  `above_5000g` double DEFAULT NULL,
  `status` double DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `shipping_charges` */

insert  into `shipping_charges`(`id`,`country`,`0_500g`,`501_1000g`,`1001_2000g`,`2001_5000g`,`above_5000g`,`status`,`created_at`,`updated_at`) values 
(4,'آذربایجان شرقی',0,0,0,0,0,0,'2024-02-12 07:54:29.000000','2024-02-12 04:24:29.000000'),
(5,'آذربایجان غربی',0,0,0,0,0,0,'2024-02-13 07:54:29.000000','2024-02-13 04:24:28.000000'),
(6,'اردبیل',0,0,0,0,0,0,'2024-02-14 07:54:29.000000','2024-02-14 04:24:28.000000'),
(7,'اصفهان',0,0,0,0,0,0,'2024-02-15 07:54:29.000000','2024-02-15 04:24:28.000000'),
(8,'البرز',0,0,0,0,0,0,'2024-02-16 07:54:29.000000','2024-02-16 04:24:28.000000'),
(9,'ایلام',0,0,0,0,0,0,'2024-02-17 07:54:29.000000','2024-02-17 04:24:28.000000'),
(10,'بوشهر',0,0,0,0,0,0,'2024-02-18 07:54:29.000000','2024-02-18 04:24:28.000000'),
(11,'تهران',0,0,0,0,0,0,'2024-02-19 07:54:29.000000','2024-02-19 04:24:28.000000'),
(12,'چهارمحال و بختیاری',0,0,0,0,0,0,'2024-02-20 07:54:29.000000','2024-02-20 04:24:28.000000'),
(13,'خراسان جنوبی',0,0,0,0,0,0,'2024-02-21 07:54:29.000000','2024-02-21 04:24:28.000000'),
(14,'خراسان رضوی',0,0,0,0,0,0,'2024-02-22 07:54:29.000000','2024-02-22 04:24:28.000000'),
(15,'خراسان شمالی',0,0,0,0,0,0,'2024-02-23 07:54:29.000000','2024-02-23 04:24:28.000000'),
(16,'خوزستان',0,0,0,0,0,0,'2024-02-24 07:54:29.000000','2024-02-24 04:24:28.000000'),
(17,'زنجان',0,0,0,0,0,0,'2024-02-25 07:54:29.000000','2024-02-25 04:24:28.000000'),
(18,'سمنان',0,0,0,0,0,0,'2024-02-26 07:54:29.000000','2024-02-26 04:24:28.000000'),
(19,'سیستان و بلوچستان',0,0,0,0,0,0,'2024-02-27 07:54:29.000000','2024-02-27 04:24:28.000000'),
(20,'فارس',0,0,0,0,0,0,'2024-02-28 07:54:29.000000','2024-02-28 04:24:28.000000'),
(21,'قزوین',0,0,0,0,0,0,'2024-02-29 07:54:29.000000','2024-02-29 04:24:28.000000'),
(22,'قم',0,0,0,0,0,0,'2024-03-01 07:54:29.000000','2024-03-01 04:24:28.000000'),
(23,'كردستان',0,0,0,0,0,0,'2024-03-02 07:54:29.000000','2024-03-02 04:24:28.000000'),
(24,'كرمان',0,0,0,0,0,0,'2024-03-03 07:54:29.000000','2024-03-03 04:24:28.000000'),
(25,'كرمانشاه',0,0,0,0,0,0,'2024-03-04 07:54:29.000000','2024-03-04 04:24:28.000000'),
(26,'کهگیلویه و بویراحمد',0,0,0,0,0,0,'2024-03-05 07:54:29.000000','2024-03-05 04:24:28.000000'),
(27,'گلستان',0,0,0,0,0,0,'2024-03-06 07:54:29.000000','2024-03-06 04:24:28.000000'),
(28,'گیلان',0,0,0,0,0,0,'2024-03-07 07:54:29.000000','2024-03-07 04:24:28.000000'),
(29,'لرستان',0,0,0,0,0,0,'2024-03-08 07:54:29.000000','2024-03-08 04:24:28.000000'),
(30,'مازندران',0,0,0,0,0,0,'2024-03-09 07:54:29.000000','2024-03-09 04:24:28.000000'),
(31,'مركزی',0,0,0,0,0,0,'2024-03-10 07:54:29.000000','2024-03-10 04:24:28.000000'),
(32,'هرمزگان',0,0,0,0,0,0,'2024-03-11 07:54:29.000000','2024-03-11 04:24:28.000000'),
(33,'همدان',0,0,0,0,0,0,'2024-03-12 07:54:29.000000','2024-03-12 04:24:28.000000'),
(34,'یزد',0,0,0,0,0,0,'2024-03-13 07:54:29.000000','2024-03-13 04:24:28.000000');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`mobile`,`email`,`email_verified_at`,`password`,`status`,`remember_token`,`created_at`,`updated_at`) values 
(36,'نادر',NULL,NULL,NULL,NULL,NULL,'0126612898','nader.dvarmanesh62@gmail.com',NULL,'$2y$10$cfdy1UzBbqV9t8TTGur29.yAlTr8n76kB595kq89ZXtNPj/VTHKwK',1,NULL,'2024-02-07 12:21:03','2024-02-07 12:22:39');

/*Table structure for table `vendors` */

DROP TABLE IF EXISTS `vendors`;

CREATE TABLE `vendors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `confirm` enum('No','Yes') DEFAULT 'No',
  `commission` float DEFAULT 0,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vendors` */

insert  into `vendors`(`id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`confirm`,`commission`,`mobile`,`email`,`status`,`created_at`,`updated_at`) values 
(46,'رامین',NULL,NULL,NULL,NULL,NULL,'Yes',50,'0322323','ramin2@gmail.com',1,'2024-02-07 15:11:31','2024-02-12 10:21:30');

/*Table structure for table `vendors_bank_details` */

DROP TABLE IF EXISTS `vendors_bank_details`;

CREATE TABLE `vendors_bank_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_ifcs_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vendors_bank_details` */

/*Table structure for table `vendors_business_details` */

DROP TABLE IF EXISTS `vendors_business_details`;

CREATE TABLE `vendors_business_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `shop_city` varchar(255) DEFAULT NULL,
  `shop_state` varchar(255) DEFAULT NULL,
  `shop_country` varchar(255) DEFAULT NULL,
  `shop_pincode` varchar(255) DEFAULT NULL,
  `shop_mobile` varchar(255) DEFAULT NULL,
  `shop_website` varchar(255) DEFAULT NULL,
  `shop_email` varchar(255) DEFAULT NULL,
  `address_proof` varchar(255) DEFAULT NULL,
  `address_proof_image` varchar(255) DEFAULT NULL,
  `business_license_number` varchar(255) DEFAULT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vendors_business_details` */

insert  into `vendors_business_details`(`id`,`vendor_id`,`shop_name`,`shop_address`,`shop_city`,`shop_state`,`shop_country`,`shop_pincode`,`shop_mobile`,`shop_website`,`shop_email`,`address_proof`,`address_proof_image`,`business_license_number`,`gst_number`,`pan_number`,`created_at`,`updated_at`) values 
(42,46,'نادر','شسیب','شسی','شسیب','البرز',NULL,'0012122123',NULL,NULL,'passport','',NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
