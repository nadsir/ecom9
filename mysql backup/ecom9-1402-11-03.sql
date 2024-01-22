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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`type`,`vendor_id`,`mobile`,`email`,`password`,`confirm`,`image`,`status`,`created_at`,`updated_at`) values 
(1,'نادر داورمنش','superadmin',0,'09126612898','nader.davarmanesh62@gmail.com','$2y$10$wd51DlChAIuP0OUXmjwKS.9w43cswQz6W/DphFhfQ/Rk.VBKsxxSm','No','82833.jpg',1,NULL,'2023-11-07 08:05:35'),
(2,'مهران ابراهیمی','vendor',1,'09126612898','nader2.davarmanesh62@gmail.com','$2y$10$wd51DlChAIuP0OUXmjwKS.9w43cswQz6W/DphFhfQ/Rk.VBKsxxSm','Yes','81412.png',1,NULL,'2023-11-20 12:29:25'),
(5,'ramin','vendor',6,'09123619210','ramin@gmail.com','$2y$10$wd51DlChAIuP0OUXmjwKS.9w43cswQz6W/DphFhfQ/Rk.VBKsxxSm','No',NULL,1,'2023-12-06 16:34:55','2023-12-09 11:57:53'),
(38,'masoud','vendor',39,'09128389734','test@gmail.com','$2y$10$wd51DlChAIuP0OUXmjwKS.9w43cswQz6W/DphFhfQ/Rk.VBKsxxSm','Yes','',1,'2023-12-09 12:20:12','2023-12-10 05:34:42'),
(39,'test','vendor',40,'09126612897','nader.davarmanesh64@gmail.com','$2y$10$wd51DlChAIuP0OUXmjwKS.9w43cswQz6W/DphFhfQ/Rk.VBKsxxSm','Yes',NULL,1,'2023-12-13 10:25:57','2023-12-13 09:45:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

insert  into `banners`(`id`,`image`,`type`,`link`,`title`,`alt`,`status`,`created_at`,`updated_at`) values 
(10,'62645.png','Slider','asdf','ssadf','asd',1,'2023-11-22 13:50:44','2023-11-22 13:50:44'),
(11,'50666.png','Slider','asdf','asdf','sdf',1,'2023-11-22 13:50:58','2023-11-22 13:50:58'),
(12,'75169.png','Fix','asdf','asdf','asdf',1,'2023-11-22 13:51:31','2023-11-22 13:51:31');

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13,'nike',1,'2023-11-27 05:31:46','2023-11-27 05:31:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`session_id`,`user_id`,`product_id`,`size`,`quantity`,`created_at`,`updated_at`) values 
(29,'5a8d5380eafa28edd37e0004f336d13f',29,15,'کوچک',1,'2023-12-21 08:41:36','2023-12-21 10:16:50'),
(43,'65ca17f30a4427b6ae07a3d683c93d4c',0,15,'کوچک',1,'2023-12-25 07:00:44','2023-12-25 07:00:44'),
(90,'f29e96713337a9b373f42eb9bbb7ab33',0,13,'کوچک',1,'2024-01-16 09:46:54','2024-01-16 09:46:54'),
(128,'120a845b37cd574b692a02d19d219d85',33,13,'کوچک',1,'2024-01-21 06:49:39','2024-01-21 09:10:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`parent_id`,`section_id`,`category_name`,`category_image`,`category_discount`,`description`,`url`,`meta_title`,`meta_description`,`meta_keywords`,`status`,`created_at`,`updated_at`) values 
(1,0,1,'Men','','0','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','men',NULL,NULL,NULL,1,NULL,'2023-11-27 11:26:58'),
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
(15,4,2,'سامسونگ','','10',NULL,'سامسونگ','سامسونگ','سامسونگ',NULL,1,'2023-12-03 09:08:22','2023-12-03 09:08:22');

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) DEFAULT NULL,
  `iso` varchar(2) DEFAULT NULL,
  `domain` varchar(3) DEFAULT NULL,
  `en_name` varchar(100) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `status` tinyint(50) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_cc_fips` (`country_code`) USING BTREE,
  KEY `idx_cc_iso` (`iso`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=270 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

/*Data for the table `countries` */

insert  into `countries`(`id`,`country_code`,`iso`,`domain`,`en_name`,`country_name`,`status`,`created_at`,`updated_at`) values 
(1,'AA','AW','.aw','Aruba','آروبا',1,NULL,NULL),
(2,'AC','AG','.ag','Antigua and Barbuda','آنتیگوا و باربودا',1,NULL,NULL),
(3,'AE','AE','.ae','United Arab Emirates','امارات متحده عربی',1,NULL,NULL),
(4,'AF','AF','.af','Afghanistan','Afghanistan',1,NULL,NULL),
(5,'AG','DZ','.dz','Algeria','الجزایر',1,NULL,NULL),
(6,'AJ','AZ','.az','Azerbaijan','آذربایجان',1,NULL,NULL),
(7,'AL','AL','.al','Albania','آلبانی',1,NULL,NULL),
(8,'AM','AM','.am','Armenia','ارمنستان',1,NULL,NULL),
(9,'AN','AD','.ad','Andorra','آندورا',1,NULL,NULL),
(10,'AO','AO','.ao','Angola','آنگولا',1,NULL,NULL),
(11,'AQ','AS','.as','American Samoa','ساموای آمریکایی',1,NULL,NULL),
(12,'AR','AR','.ar','Argentina','آرژانتین',1,NULL,NULL),
(13,'AS','AU','.au','Australia','استرالیا',1,NULL,NULL),
(14,'AT','-','-','Ashmore and Cartier Islands','اشکمور و جزایر کارتیه',1,NULL,NULL),
(15,'AU','AT','.at','Austria','اتریش',1,NULL,NULL),
(16,'AV','AI','.ai','Anguilla','آنگویلا',1,NULL,NULL),
(17,'AX','AX','.ax','Åland Islands','جزایر الند',1,NULL,NULL),
(18,'AY','AQ','.aq','Antarctica','قطب جنوب',1,NULL,NULL),
(19,'BA','BH','.bh','Bahrain','بحرین',1,NULL,NULL),
(20,'BB','BB','.bb','Barbados','باربادوس',1,NULL,NULL),
(21,'BC','BW','.bw','Botswana','بوتسوانا',1,NULL,NULL),
(22,'BD','BM','.bm','Bermuda','برمودا',1,NULL,NULL),
(23,'BE','BE','.be','Belgium','بلژیک',1,NULL,NULL),
(24,'BF','BS','.bs','Bahamas, The','باهاما، The',1,NULL,NULL),
(25,'BG','BD','.bd','Bangladesh','بنگلادش',1,NULL,NULL),
(26,'BH','BZ','.bz','Belize','بلیز',1,NULL,NULL),
(27,'BK','BA','.ba','Bosnia and Herzegovina','بوسنی و هرزگوین',1,NULL,NULL),
(28,'BL','BO','.bo','Bolivia','بولیوی',1,NULL,NULL),
(29,'BM','MM','.mm','Myanmar','میانمار',1,NULL,NULL),
(30,'BN','BJ','.bj','Benin','بنین',1,NULL,NULL),
(31,'BO','BY','.by','Belarus','بلاروس',1,NULL,NULL),
(32,'BP','SB','.sb','Solomon Islands','جزایر سلیمان',1,NULL,NULL),
(33,'BQ','-','-','Navassa Island','جزیره ناواسا',1,NULL,NULL),
(34,'BR','BR','.br','Brazil','برزیل',1,NULL,NULL),
(35,'BS','-','-','Bassas da India','باساس دا هند',1,NULL,NULL),
(36,'BT','BT','.bt','Bhutan','بوتان',1,NULL,NULL),
(37,'BU','BG','.bg','Bulgaria','بلغارستان',1,NULL,NULL),
(38,'BV','BV','.bv','Bouvet Island','جزیره Bouvet',1,NULL,NULL),
(39,'BX','BN','.bn','Brunei','برونئی',1,NULL,NULL),
(40,'BY','BI','.bi','Burundi','بوروندی',1,NULL,NULL),
(41,'CA','CA','.ca','Canada','کانادا',1,NULL,NULL),
(42,'CB','KH','.kh','Cambodia','کامبوج',1,NULL,NULL),
(43,'CD','TD','.td','Chad','چاد',1,NULL,NULL),
(44,'CE','LK','.lk','Sri Lanka','سری لانکا',1,NULL,NULL),
(45,'CF','CG','.cg','Congo, Republic of the','کنگو، جمهوری',1,NULL,NULL),
(46,'CG','CD','.cd','Congo, Democratic Republic of the','کنگو، جمهوری دموکراتیک',1,NULL,NULL),
(47,'CH','CN','.cn','China','چين',1,NULL,NULL),
(48,'CI','CL','.cl','Chile','شیلی',1,NULL,NULL),
(49,'CJ','KY','.ky','Cayman Islands','جزایر کیمن',1,NULL,NULL),
(50,'CK','CC','.cc','Cocos (Keeling) Islands','جزایر کوکوس (کایلینگ)',1,NULL,NULL),
(51,'CM','CM','.cm','Cameroon','کامرون',1,NULL,NULL),
(52,'CN','KM','.km','Comoros','کومور',1,NULL,NULL),
(53,'CO','CO','.co','Colombia','کلمبیا',1,NULL,NULL),
(54,'CQ','MP','.mp','Northern Mariana Islands','جزایر ماریانای شمالی',1,NULL,NULL),
(55,'CR','-','-','Coral Sea Islands','جزایر دریای مرجانی',1,NULL,NULL),
(56,'CS','CR','.cr','Costa Rica','کاستاریکا',1,NULL,NULL),
(57,'CT','CF','.cf','Central African Republic','جمهوری آفریقای مرکزی',1,NULL,NULL),
(58,'CU','CU','.cu','Cuba','کوبا',1,NULL,NULL),
(59,'CV','CV','.cv','Cape Verde','کیپ ورد',1,NULL,NULL),
(60,'CW','CK','.ck','Cook Islands','جزایر کوک',1,NULL,NULL),
(61,'CY','CY','.cy','Cyprus','قبرس',1,NULL,NULL),
(62,'DA','DK','.dk','Denmark','دانمارک',1,NULL,NULL),
(63,'DJ','DJ','.dj','Djibouti','جیبوتی',1,NULL,NULL),
(64,'DO','DM','.dm','Dominica','دومینیکا',1,NULL,NULL),
(65,'DQ','UM','-','Jarvis Island','جزیره جارویس',1,NULL,NULL),
(66,'DR','DO','.do','Dominican Republic','جمهوری دومینیکن',1,NULL,NULL),
(67,'DX','-','-','Dhekelia Sovereign Base Area','منطقه ممنوعه Dhekelia',1,NULL,NULL),
(68,'EC','EC','.ec','Ecuador','اکوادور',1,NULL,NULL),
(69,'EG','EG','.eg','Egypt','مصر',1,NULL,NULL),
(70,'EI','IE','.ie','Ireland','ایرلند',1,NULL,NULL),
(71,'EK','GQ','.gq','Equatorial Guinea','گینه استوایی',1,NULL,NULL),
(72,'EN','EE','.ee','Estonia','استونی',1,NULL,NULL),
(73,'ER','ER','.er','Eritrea','اریتره',1,NULL,NULL),
(74,'ES','SV','.sv','El Salvador','السالوادور',1,NULL,NULL),
(75,'ET','ET','.et','Ethiopia','اتیوپی',1,NULL,NULL),
(76,'EU','-','-','Europa Island','جزیره اروپا',1,NULL,NULL),
(77,'EZ','CZ','.cz','Czech Republic','جمهوری چک',1,NULL,NULL),
(78,'FG','GF','.gf','French Guiana','گویان فرانسه',1,NULL,NULL),
(79,'FI','FI','.fi','Finland','فنلاند',1,NULL,NULL),
(80,'FJ','FJ','.fj','Fiji','فیجی',1,NULL,NULL),
(81,'FK','FK','.fk','Falkland Islands (Islas Malvinas)','جزایر فالکلند (جزایر مالویناس)',1,NULL,NULL),
(82,'FM','FM','.fm','Micronesia, Federated States of','میکرونزی، ایالات فدرال',1,NULL,NULL),
(83,'FO','FO','.fo','Faroe Islands','جزایر فارو',1,NULL,NULL),
(84,'FP','PF','.pf','French Polynesia','پلینزی فرانسه',1,NULL,NULL),
(85,'FQ','UM','-','Baker Island','جزیره بیکر',1,NULL,NULL),
(86,'FR','FR','.fr','France','فرانسه',1,NULL,NULL),
(87,'FS','TF','.tf','French Southern and Antarctic Lands','زمینهای جنوب و جنوب قطب جنوب فرانسه',1,NULL,NULL),
(88,'GA','GM','.gm','Gambia, The','گامبیا، The',1,NULL,NULL),
(89,'GB','GA','.ga','Gabon','گابن',1,NULL,NULL),
(90,'GG','GE','.ge','Georgia','جورجیا',1,NULL,NULL),
(91,'GH','GH','.gh','Ghana','غنا',1,NULL,NULL),
(92,'GI','GI','.gi','Gibraltar','جبل الطارق',1,NULL,NULL),
(93,'GJ','GD','.gd','Grenada','گرانادا',1,NULL,NULL),
(94,'GK','-','.gg','Guernsey','گورنسی',1,NULL,NULL),
(95,'GL','GL','.gl','Greenland','گرینلند',1,NULL,NULL),
(96,'GM','DE','.de','Germany','آلمان',1,NULL,NULL),
(97,'GO','-','-','Glorioso Islands','جزایر گلوریوزو',1,NULL,NULL),
(98,'GP','GP','.gp','Guadeloupe','گوادلوپ',1,NULL,NULL),
(99,'GQ','GU','.gu','Guam','گوام',1,NULL,NULL),
(100,'GR','GR','.gr','Greece','یونان',1,NULL,NULL),
(101,'GT','GT','.gt','Guatemala','گواتمالا',1,NULL,NULL),
(102,'GV','GN','.gn','Guinea','گینه',1,NULL,NULL),
(103,'GY','GY','.gy','Guyana','گایانا',1,NULL,NULL),
(104,'GZ','-','-','Gaza Strip','نوار غزه',1,NULL,NULL),
(105,'HA','HT','.ht','Haiti','هائیتی',1,NULL,NULL),
(106,'HK','HK','.hk','Hong Kong','هنگ کنگ',1,NULL,NULL),
(107,'HM','HM','.hm','Heard Island and McDonald Islands','جزایر هرد و جزایر مک دونالد',1,NULL,NULL),
(108,'HO','HN','.hn','Honduras','هندوراس',1,NULL,NULL),
(109,'HQ','UM','-','Howland Island','جزیره Howland',1,NULL,NULL),
(110,'HR','HR','.hr','Croatia','کرواسی',1,NULL,NULL),
(111,'HU','HU','.hu','Hungary','مجارستان',1,NULL,NULL),
(112,'IC','IS','.is','Iceland','ایسلند',1,NULL,NULL),
(113,'ID','ID','.id','Indonesia','اندونزی',1,NULL,NULL),
(114,'IM','IM','.im','Isle of Man','جزیره من',1,NULL,NULL),
(115,'IN','IN','.in','India','هندوستان',1,NULL,NULL),
(116,'IO','IO','.io','British Indian Ocean Territory','قلمرو اقیانوس هند بریتانیا',1,NULL,NULL),
(117,'IP','-','-','Clipperton Island','جزیره Clipperton',1,NULL,NULL),
(118,'IR','IR','.ir','Iran','ایران',1,NULL,NULL),
(119,'IS','IL','.il','Israel','اسرائيل',1,NULL,NULL),
(120,'IT','IT','.it','Italy','ایتالیا',1,NULL,NULL),
(121,'IV','CI','.ci','Cote d\'Ivoire','ساحل عاج',1,NULL,NULL),
(122,'IZ','IQ','.iq','Iraq','عراق',1,NULL,NULL),
(123,'JA','JP','.jp','Japan','ژاپن',1,NULL,NULL),
(124,'JE','JE','.je','Jersey','جرسی',1,NULL,NULL),
(125,'JM','JM','.jm','Jamaica','جامائیکا',1,NULL,NULL),
(126,'JN','SJ','-','Jan Mayen','Jan Mayen',1,NULL,NULL),
(127,'JO','JO','.jo','Jordan','اردن',1,NULL,NULL),
(128,'JQ','UM','-','Johnston Atoll','جانستون اتول',1,NULL,NULL),
(129,'JU','-','-','Juan de Nova Island','جزیره خوان جزیره نوا',1,NULL,NULL),
(130,'KE','KE','.ke','Kenya','کنیا',1,NULL,NULL),
(131,'KG','KG','.kg','Kyrgyzstan','قرقیزستان',1,NULL,NULL),
(132,'KN','KP','.kp','Korea, North','کره شمالی',1,NULL,NULL),
(133,'KQ','UM','-','Kingman Reef','کینگمن ریف',1,NULL,NULL),
(134,'KR','KI','.ki','Kiribati','کیریباتی',1,NULL,NULL),
(135,'KS','KR','.kr','Korea, South','کره جنوبی',1,NULL,NULL),
(136,'KT','CX','.cx','Christmas Island','جزیره کریسمس',1,NULL,NULL),
(137,'KU','KW','.kw','Kuwait','کویت',1,NULL,NULL),
(138,'KV','KV','-','Kosovo','کوزوو',1,NULL,NULL),
(139,'KZ','KZ','.kz','Kazakhstan','قزاقستان',1,NULL,NULL),
(140,'LA','LA','.la','Laos','لائوس',1,NULL,NULL),
(141,'LE','LB','.lb','Lebanon','لبنان',1,NULL,NULL),
(142,'LG','LV','.lv','Latvia','لتونی',1,NULL,NULL),
(143,'LH','LT','.lt','Lithuania','لیتوانی',1,NULL,NULL),
(144,'LI','LR','.lr','Liberia','لیبریا',1,NULL,NULL),
(145,'LO','SK','.sk','Slovakia','اسلواکی',1,NULL,NULL),
(146,'LQ','UM','-','Palmyra Atoll','پالمیرا اتل',1,NULL,NULL),
(147,'LS','LI','.li','Liechtenstein','لیختن اشتاین',1,NULL,NULL),
(148,'LT','LS','.ls','Lesotho','لسوتو',1,NULL,NULL),
(149,'LU','LU','.lu','Luxembourg','لوکزامبورگ',1,NULL,NULL),
(150,'LY','LY','.ly','Libyan Arab','عرب لیبی',1,NULL,NULL),
(151,'MA','MG','.mg','Madagascar','ماداگاسکار',1,NULL,NULL),
(152,'MB','MQ','.mq','Martinique','مارتینیک',1,NULL,NULL),
(153,'MC','MO','.mo','Macau','ماکائو',1,NULL,NULL),
(154,'MD','MD','.md','Moldova, Republic of','مولداوی، جمهوری',1,NULL,NULL),
(155,'MF','YT','.yt','Mayotte','مایوت',1,NULL,NULL),
(156,'MG','MN','.mn','Mongolia','مغولستان',1,NULL,NULL),
(157,'MH','MS','.ms','Montserrat','مونتسرات',1,NULL,NULL),
(158,'MI','MW','.mw','Malawi','مالاوی',1,NULL,NULL),
(159,'MJ','ME','.me','Montenegro','مونته نگرو',1,NULL,NULL),
(160,'MK','MK','.mk','The Former Yugoslav Republic of Macedonia','جمهوری مقدونیه یوگسلاوی سابق',1,NULL,NULL),
(161,'ML','ML','.ml','Mali','مالزی',1,NULL,NULL),
(162,'MN','MC','.mc','Monaco','موناکو',1,NULL,NULL),
(163,'MO','MA','.ma','Morocco','مراکش',1,NULL,NULL),
(164,'MP','MU','.mu','Mauritius','موریس',1,NULL,NULL),
(165,'MQ','UM','-','Midway Islands','جزایر میدوی',1,NULL,NULL),
(166,'MR','MR','.mr','Mauritania','موریتانی',1,NULL,NULL),
(167,'MT','MT','.mt','Malta','مالت',1,NULL,NULL),
(168,'MU','OM','.om','Oman','عمان',1,NULL,NULL),
(169,'MV','MV','.mv','Maldives','مالدیو',1,NULL,NULL),
(170,'MX','MX','.mx','Mexico','مکزیک',1,NULL,NULL),
(171,'MY','MY','.my','Malaysia','مالزی',1,NULL,NULL),
(172,'MZ','MZ','.mz','Mozambique','موزامبیک',1,NULL,NULL),
(173,'NC','NC','.nc','New Caledonia','کالدونیای جدید',1,NULL,NULL),
(174,'NE','NU','.nu','Niue','نیو',1,NULL,NULL),
(175,'NF','NF','.nf','Norfolk Island','جزیره نورفولک',1,NULL,NULL),
(176,'NG','NE','.ne','Niger','نیجر',1,NULL,NULL),
(177,'NH','VU','.vu','Vanuatu','وانواتو',1,NULL,NULL),
(178,'NI','NG','.ng','Nigeria','نیجریه',1,NULL,NULL),
(179,'NL','NL','.nl','Netherlands','هلند',1,NULL,NULL),
(180,'NM','','','No Man\'s Land','هیچ مردی زمین نیست',1,NULL,NULL),
(181,'NO','NO','.no','Norway','نروژ',1,NULL,NULL),
(182,'NP','NP','.np','Nepal','نپال',1,NULL,NULL),
(183,'NR','NR','.nr','Nauru','نائورو',1,NULL,NULL),
(184,'NS','SR','.sr','Suriname','سورینام',1,NULL,NULL),
(185,'NT','AN','.an','Netherlands Antilles','آنتیل هلند',1,NULL,NULL),
(186,'NU','NI','.ni','Nicaragua','نیکاراگوئه',1,NULL,NULL),
(187,'NZ','NZ','.nz','New Zealand','نیوزلند',1,NULL,NULL),
(188,'PA','PY','.py','Paraguay','پاراگوئه',1,NULL,NULL),
(189,'PC','PN','.pn','Pitcairn Islands','جزایر پیتکرن',1,NULL,NULL),
(190,'PE','PE','.pe','Peru','پرو',1,NULL,NULL),
(191,'PF','-','-','Paracel Islands','جزایر پاراسل',1,NULL,NULL),
(192,'PG','-','-','Spratly Islands','جزایر اسپارتلی',1,NULL,NULL),
(193,'PK','PK','.pk','Pakistan','پاکستان',1,NULL,NULL),
(194,'PL','PL','.pl','Poland','لهستان',1,NULL,NULL),
(195,'PM','PA','.pa','Panama','پاناما',1,NULL,NULL),
(196,'PO','PT','.pt','Portugal','کشور پرتغال',1,NULL,NULL),
(197,'PP','PG','.pg','Papua New Guinea','پاپوآ گینه نو',1,NULL,NULL),
(198,'PS','PW','.pw','Palau','پالائو',1,NULL,NULL),
(199,'PU','GW','.gw','Guinea-Bissau','گینه بیسائو',1,NULL,NULL),
(200,'QA','QA','.qa','Qatar','قطر',1,NULL,NULL),
(201,'RE','RE','.re','Reunion','تجدید دیدار',1,NULL,NULL),
(202,'RI','RS','.rs','Serbia','صربستان',1,NULL,NULL),
(203,'RM','MH','.mh','Marshall Islands','جزایر مارشال',1,NULL,NULL),
(204,'RN','MF','-','Saint Martin','سنت مارتین',1,NULL,NULL),
(205,'RO','RO','.ro','Romania','رومانی',1,NULL,NULL),
(206,'RP','PH','.ph','Philippines','فیلیپین',1,NULL,NULL),
(207,'RQ','PR','.pr','Puerto Rico','پورتوریکو',1,NULL,NULL),
(208,'RS','RU','.ru','Russia','روسیه',1,NULL,NULL),
(209,'RW','RW','.rw','Rwanda','رواندا',1,NULL,NULL),
(210,'SA','SA','.sa','Saudi Arabia','عربستان سعودی',1,NULL,NULL),
(211,'SB','PM','.pm','Saint Pierre and Miquelon','سنت پیر و میکلون',1,NULL,NULL),
(212,'SC','KN','.kn','Saint Kitts and Nevis','سنت کیتس و نویس',1,NULL,NULL),
(213,'SE','SC','.sc','Seychelles','سیشل',1,NULL,NULL),
(214,'SF','ZA','.za','South Africa','آفریقای جنوبی',1,NULL,NULL),
(215,'SG','SN','.sn','Senegal','سنگال',1,NULL,NULL),
(216,'SH','SH','.sh','Saint Helena','سنت هلن',1,NULL,NULL),
(217,'SI','SI','.si','Slovenia','اسلوونی',1,NULL,NULL),
(218,'SL','SL','.sl','Sierra Leone','سیرا لئون',1,NULL,NULL),
(219,'SM','SM','.sm','San Marino','سان مارینو',1,NULL,NULL),
(220,'SN','SG','.sg','Singapore','سنگاپور',1,NULL,NULL),
(221,'SO','SO','.so','Somalia','سومالی',1,NULL,NULL),
(222,'SP','ES','.es','Spain','اسپانیا',1,NULL,NULL),
(223,'ST','LC','.lc','Saint Lucia','سنت لوسیا',1,NULL,NULL),
(224,'SU','SD','.sd','Sudan','سودان',1,NULL,NULL),
(225,'SV','SJ','.sj','Svalbard','اسباب بازی',1,NULL,NULL),
(226,'SW','SE','.se','Sweden','سوئد',1,NULL,NULL),
(227,'SX','GS','.gs','South Georgia and the Islands','جنوب گرجستان و جزایر',1,NULL,NULL),
(228,'SY','SY','.sy','Syrian Arab Republic','جمهوری عربی سوریه',1,NULL,NULL),
(229,'SZ','CH','.ch','Switzerland','سوئیس',1,NULL,NULL),
(230,'TD','TT','.tt','Trinidad and Tobago','ترینیداد و توباگو',1,NULL,NULL),
(231,'TE','-','-','Tromelin Island','جزیره ترولین',1,NULL,NULL),
(232,'TH','TH','.th','Thailand','تایلند',1,NULL,NULL),
(233,'TI','TJ','.tj','Tajikistan','تاجیکستان',1,NULL,NULL),
(234,'TK','TC','.tc','Turks and Caicos Islands','جزایر ترکس و کایکوس',1,NULL,NULL),
(235,'TL','TK','.tk','Tokelau','توکلو',1,NULL,NULL),
(236,'TN','TO','.to','Tonga','تونگا',1,NULL,NULL),
(237,'TO','TG','.tg','Togo','رفتن',1,NULL,NULL),
(238,'TP','ST','.st','Sao Tome and Principe','سائوتومه و پرنسیپه',1,NULL,NULL),
(239,'TS','TN','.tn','Tunisia','تونس',1,NULL,NULL),
(240,'TT','TL','.tl','East Timor','تیمور شرقی',1,NULL,NULL),
(241,'TU','TR','.tr','Turkey','بوقلمون',1,NULL,NULL),
(242,'TV','TV','.tv','Tuvalu','توووالو',1,NULL,NULL),
(243,'TW','TW','.tw','Taiwan','تایوان',1,NULL,NULL),
(244,'TX','TM','.tm','Turkmenistan','ترکمنستان',1,NULL,NULL),
(245,'TZ','TZ','.tz','Tanzania, United Republic of','تانزانیا، جمهوری متحده',1,NULL,NULL),
(246,'UG','UG','.ug','Uganda','اوگاندا',1,NULL,NULL),
(247,'UK','GB','.uk','United Kingdom','انگلستان',1,NULL,NULL),
(248,'UP','UA','.ua','Ukraine','اوکراین',1,NULL,NULL),
(249,'US','US','.us','United States','ایالات متحده',1,NULL,NULL),
(250,'UV','BF','.bf','Burkina Faso','بورکینافاسو',1,NULL,NULL),
(251,'UY','UY','.uy','Uruguay','اروگوئه',1,NULL,NULL),
(252,'UZ','UZ','.uz','Uzbekistan','ازبکستان',1,NULL,NULL),
(253,'VC','VC','.vc','Saint Vincent and the Grenadines','سنت وینسنت و گرنادین',1,NULL,NULL),
(254,'VE','VE','.ve','Venezuela','ونزوئلا',1,NULL,NULL),
(255,'VI','VG','.vg','British Virgin Islands','جزایر ویرجین بریتانیا',1,NULL,NULL),
(256,'VM','VN','.vn','Vietnam','ویتنام',1,NULL,NULL),
(257,'VQ','VI','.vi','Virgin Islands (US)','جزایر ویرجین (ایالات متحده)',1,NULL,NULL),
(258,'VT','VA','.va','Holy See (Vatican City)','مقدس (واتیکان)',1,NULL,NULL),
(259,'WA','NA','.na','Namibia','نامیبیا',1,NULL,NULL),
(260,'WE','-','-','West Bank','بانک غرب',1,NULL,NULL),
(261,'WF','WF','.wf','Wallis and Futuna','والیس و فوتونا',1,NULL,NULL),
(262,'WI','EH','.eh','Western Sahara','صحرای غربی',1,NULL,NULL),
(263,'WQ','UM','-','Wake Island','جزیره ویک',1,NULL,NULL),
(264,'WS','WS','.ws','Samoa','ساموآ',1,NULL,NULL),
(265,'WZ','SZ','.sz','Swaziland','سوازیلند',1,NULL,NULL),
(266,'YI','CS','.yu','Serbia and Montenegro','صربستان و مونته نگرو',1,NULL,NULL),
(267,'YM','YE','.ye','Yemen','یمن',1,NULL,NULL),
(268,'ZA','ZM','.zm','Zambia','زامبیا',1,NULL,NULL),
(269,'ZI','ZW','.zw','Zimbabwe','زیمبابوه',1,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupons` */

insert  into `coupons`(`id`,`vendor_id`,`coupon_option`,`coupon_code`,`categories`,`brands`,`users`,`coupon_type`,`amount_type`,`amount`,`expire_date`,`status`,`created_at`,`updated_at`) values 
(19,0,'Automatic','f1unCHhk','6,10','1','','Multiple Times','Percentage',50.00,'2024-02-07',1,'2024-01-20 08:39:22','2024-01-20 08:43:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `delivery_addresses` */

insert  into `delivery_addresses`(`id`,`user_id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`mobile`,`status`,`created_at`,`updated_at`) values 
(1,33,'ramin','آلبانی','karaj','alborz','چين','1234567890','09126612898',1,NULL,'2024-01-13 08:14:32'),
(2,33,'meroddddd','12323','karaj','alborz','ایران','1234567890','09126612898',1,NULL,'2024-01-13 08:15:03'),
(7,33,'NADER','Floor. 2,Unit. 3,No. 194','Karaj','Alborz','Afghanistan','3187847968','09126612898',1,'2024-01-01 05:55:06','2024-01-13 08:15:14'),
(9,34,'NADER','Floor. 2,Unit. 3,No. 194','Karaj','Alborz','اتریش','3187847968','09126612898',1,'2024-01-09 11:07:01','2024-01-09 11:07:01');

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
(1,'Pending','1',NULL,NULL),
(2,'In Process','1',NULL,NULL),
(3,'Shipped','1',NULL,NULL),
(4,'Delivered','1',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`mobile`,`email`,`shipping_charges`,`coupon_code`,`coupon_amount`,`order_status`,`payment_method`,`payment_gateway`,`grand_total`,`courier_name`,`tracking_number`,`created_at`,`updated_at`) values 
(44,33,'ramin','آلبانی','karaj','alborz','چين','1234567890','09126612898','mero@gmail.com',0.00,'f۱unCHhk',15.00,'New','COD','COD',15.00,NULL,NULL,'2024-01-20 08:49:36','2024-01-20 08:49:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders_logs` */

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders_products` */

insert  into `orders_products`(`id`,`order_id`,`user_id`,`vendor_id`,`admin_id`,`product_id`,`product_code`,`product_name`,`product_color`,`product_size`,`product_price`,`item_status`,`courier_name`,`tracking_number`,`product_qty`,`created_at`,`updated_at`) values 
(63,44,33,0,1,13,'B01','تی شرت آبی','آبی','کوچک',10.00,NULL,NULL,NULL,1,'2024-01-20 08:49:36','2024-01-20 08:49:36'),
(64,44,33,1,2,22,'123456','دامن','سیاه','بزرگ',10.00,NULL,NULL,NULL,1,'2024-01-20 08:49:36','2024-01-20 08:49:36'),
(65,44,33,1,2,20,'p13','تی شرت صورتی','صورتی','کوچک',10.00,NULL,NULL,NULL,1,'2024-01-20 08:49:36','2024-01-20 08:49:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_attributes` */

insert  into `product_attributes`(`id`,`product_id`,`size`,`price`,`stock`,`sku`,`status`,`created_at`,`updated_at`) values 
(12,13,'کوچک',10.00,6,'t-b-1',1,'2023-12-05 08:25:26','2024-01-20 08:49:36'),
(13,13,'متوسط',10.00,7,'t-b-2',1,'2023-12-05 08:26:03','2024-01-20 08:41:05'),
(14,13,'بزرگ',10.00,10,'t-b-3',1,'2023-12-05 08:26:30','2024-01-20 06:36:55'),
(15,16,'64 گیگ',120000.00,5,'s1',1,'2023-12-05 08:27:23','2023-12-05 08:27:23'),
(16,16,'128 گیگ',130000.00,4,'s2',1,'2023-12-05 08:27:53','2023-12-05 08:27:53'),
(17,15,'کوچک',120000.00,10,'SM002',1,'2023-12-05 08:49:13','2023-12-05 08:49:13'),
(19,20,'کوچک',10.00,4,'SM002d',1,'2023-12-26 11:53:18','2024-01-20 08:49:36'),
(20,22,'کوچک',10.00,5,'dff',1,'2024-01-18 08:21:10','2024-01-20 08:44:25'),
(21,22,'بزرگ',10.00,9,'dcs',1,'2024-01-18 09:33:28','2024-01-20 08:49:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`section_id`,`category_id`,`brand_id`,`admin_id`,`vendor_id`,`admin_type`,`product_name`,`product_code`,`product_color`,`product_price`,`product_discount`,`product_weight`,`product_image`,`product_video`,`group_code`,`description`,`opreation_system`,`screen_size`,`fit`,`pattern`,`sleeve`,`ram`,`fabric`,`meta_title`,`meta_keywords`,`meta_description`,`is_featured`,`is_bestseller`,`status`,`created_at`,`updated_at`) values 
(13,1,6,1,1,0,'superadmin','تی شرت آبی','B01','آبی',120000,0,600,'89410.jfif','55959.mp4','100','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,'کوچک','گل گلی','آستین بلند',NULL,'کتان','تی شرت مردانه','تی شردت ,مردانه,آستین کوتاه,آبی,تی شرت ساده','تی شرت مردانه آبی آستین کوتاه','Yes','Yes',1,'2023-11-23 10:58:10','2024-01-21 06:44:28'),
(14,1,6,2,1,0,'superadmin','تی شرت قرمز','R01','قرمز',30000,10,0,'84253.jpg',NULL,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,NULL,NULL,NULL,NULL,'کتان',NULL,NULL,NULL,'Yes','NO',1,'2023-11-23 10:59:22','2023-12-03 12:12:58'),
(15,1,6,3,1,0,'superadmin','تی شرت سبز','G01','سبز',20000,20,0,'36484.jfif',NULL,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,NULL,NULL,NULL,NULL,'ابریشم',NULL,NULL,NULL,'Yes','NO',1,'2023-11-23 11:01:20','2023-12-05 06:43:04'),
(16,2,11,4,1,0,'superadmin','گوشی سامسونگ','M01','صورتی',20000,20,0,'60107.jpg',NULL,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','Yes',1,'2023-11-23 11:06:19','2023-11-27 11:13:58'),
(17,2,11,9,1,0,'superadmin','گوشی آیفون','I01','آبی',20000,10,0,'97449.jfif',NULL,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yes','NO',1,'2023-11-23 11:07:43','2023-11-27 11:14:06'),
(18,1,13,13,1,0,'superadmin','سویی شرت سفید','sw01','سفید',450000,10,0,'32487.jfif',NULL,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',NULL,NULL,NULL,NULL,'آستین بلند',NULL,'پلی استر',NULL,NULL,NULL,'Yes','NO',1,'2023-11-27 09:46:21','2024-01-21 07:28:03'),
(19,2,4,9,1,0,'superadmin','گوشی آیفون','AT02','آبی',20000,10,0,'13128.webp',NULL,NULL,NULL,'IOS','۶.۰ اینچ و بزرگتر',NULL,NULL,NULL,'4 گیگ',NULL,NULL,NULL,NULL,'No','NO',1,'2023-12-03 09:36:15','2023-12-03 09:55:50'),
(20,1,6,2,2,1,'vendor','تی شرت صورتی','p13','صورتی',20000,0,1500,'21774.webp',NULL,'100',NULL,NULL,NULL,NULL,NULL,'آستین بلند',NULL,'کتان',NULL,NULL,NULL,'No','NO',1,'2023-12-09 10:30:50','2024-01-16 06:33:43'),
(22,1,10,1,2,1,'vendor','دامن','123456','سیاه',20000,0,700,'64757.jpg',NULL,NULL,NULL,NULL,NULL,NULL,'گل گلی','آستین بلند',NULL,NULL,NULL,NULL,NULL,'No','NO',1,'2024-01-18 08:19:56','2024-01-18 09:39:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(19,9,'کوچک',1,'2023-12-11 08:06:37','2023-12-11 08:06:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products_images` */

insert  into `products_images`(`id`,`product_id`,`image`,`status`,`created_at`,`updated_at`) values 
(2,1,'download (2).jfif25605.jfif',1,'2023-11-18 09:06:26','2023-11-18 09:46:52'),
(4,13,'123.jfif63329.jfif',1,'2023-12-10 09:00:03','2023-12-10 09:00:03'),
(5,14,'644e704d16ce2864228c6566a660a3b81a416c48_cms8141_5.webp26868.webp',1,'2023-12-11 08:54:43','2023-12-11 08:54:43');

/*Table structure for table `recently_viewed_products` */

DROP TABLE IF EXISTS `recently_viewed_products`;

CREATE TABLE `recently_viewed_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(69,18,'120a845b37cd574b692a02d19d219d85',NULL,NULL);

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sections` */

insert  into `sections`(`id`,`name`,`status`,`created_at`,`updated_at`) values 
(1,'clothes',1,NULL,'2023-11-22 05:23:44'),
(2,'Electornic',1,NULL,'2023-11-14 09:39:12'),
(3,'لوازم خانه',1,NULL,'2023-11-20 09:53:44'),
(4,'کامپیوتر',1,'2023-11-11 08:41:03','2023-11-20 09:09:07');

/*Table structure for table `shipping_charges` */

DROP TABLE IF EXISTS `shipping_charges`;

CREATE TABLE `shipping_charges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `0_500g` double(8,2) NOT NULL,
  `501_1000g` double(8,2) NOT NULL,
  `1001_2000g` double(8,2) NOT NULL,
  `2001_5000g` double(8,2) NOT NULL,
  `above_5000g` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shipping_charges` */

insert  into `shipping_charges`(`id`,`country`,`0_500g`,`501_1000g`,`1001_2000g`,`2001_5000g`,`above_5000g`,`status`,`created_at`,`updated_at`) values 
(1,'ایران',1000.00,2000.00,3000.00,4000.00,5000.00,1,'2024-01-16 10:06:11','2024-01-16 06:36:11'),
(2,'Afghanistan',0.00,0.00,2000.00,0.00,0.00,1,'2024-01-13 15:45:11','2024-01-13 12:15:11'),
(3,'چين',0.00,0.00,0.00,0.00,0.00,1,'2024-01-13 15:31:13','2024-01-13 07:27:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`mobile`,`email`,`email_verified_at`,`password`,`status`,`remember_token`,`created_at`,`updated_at`) values 
(29,'نادر',NULL,NULL,NULL,NULL,NULL,'09126612898','nader.davarmanesh62@gmail.com',NULL,'$2y$10$wd51DlChAIuP0OUXmjwKS.9w43cswQz6W/DphFhfQ/Rk.VBKsxxSm',1,NULL,'2023-12-21 10:14:17','2023-12-30 09:05:17'),
(33,'مرووو','Floor. 2,Unit. 3,No. 194','Karaj','Alborz','آذربایجان','3187847968','09123619210','mero@gmail.com',NULL,'$2y$10$wd51DlChAIuP0OUXmjwKS.9w43cswQz6W/DphFhfQ/Rk.VBKsxxSm',1,NULL,'2023-12-23 09:25:38','2023-12-30 09:05:27'),
(34,'nader',NULL,NULL,NULL,NULL,NULL,'09127612898','nader3.davarmanesh62@gmail.com',NULL,'$2y$10$9QDMcG8I0N2.DP0Tw4pYUOvqxsqbZr.jczKpEPKrACs4sFdPtJjEO',1,NULL,'2024-01-09 09:49:55','2024-01-09 09:50:21');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vendors` */

insert  into `vendors`(`id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`confirm`,`commission`,`mobile`,`email`,`status`,`created_at`,`updated_at`) values 
(1,'مهران ابراهیمی','اواز','تیبوله','قزوین','ایران','110113','Yes',2,'09126612898','naer2.davarmanesh62@gmial.com',1,NULL,'2024-01-18 08:45:28'),
(6,'ramin','اواز','تیبوله','قزوین','ایران','110113','No',0,'09123619210','ramin@gmail.com',0,'2023-12-06 16:34:55','2023-12-06 16:34:55'),
(39,'masoud','رشت تیبوله پسر','Karaj','Alborz','ایران','3187847968','Yes',0,'09128389734','test@gmail.com',0,'2023-12-09 12:20:12','2023-12-10 05:34:42'),
(40,'test',NULL,NULL,NULL,NULL,NULL,'Yes',0,'09126612897','nader.davarmanesh64@gmail.com',1,'2023-12-13 10:25:57','2023-12-13 09:45:40');

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

insert  into `vendors_bank_details`(`id`,`vendor_id`,`account_holder_name`,`bank_name`,`account_number`,`bank_ifcs_code`,`created_at`,`updated_at`) values 
(1,1,'مرو ابرایمی','بلو بانک','3255445418','123456789',NULL,'2023-10-31 06:39:41'),
(2,39,'مرو ابرایمی','بلو بانک','456456','45456',NULL,NULL),
(3,40,'مرو ابرایمی','بلو بانک','452345324','52345',NULL,'2023-12-13 09:39:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vendors_business_details` */

insert  into `vendors_business_details`(`id`,`vendor_id`,`shop_name`,`shop_address`,`shop_city`,`shop_state`,`shop_country`,`shop_pincode`,`shop_mobile`,`shop_website`,`shop_email`,`address_proof`,`address_proof_image`,`business_license_number`,`gst_number`,`pan_number`,`created_at`,`updated_at`) values 
(1,1,'رویا گالری','123-SCF','البرز','کرج','آروبا','13621687','09126612897','roygallery@gmail.com','nader2.davarmanesh62@gmail.com','Military service','53552.JPG','1362','123456','1234',NULL,'2023-11-07 11:16:15'),
(2,39,'رویا گالری','کرج مهرشهر','البرز','کرج','ایران','13','09126612898',NULL,NULL,'Meli Card','','23112','12123123','123123123',NULL,NULL),
(3,40,'رویا گالری','asdfasdf','asdfasd','fasdfsdf',NULL,'34','09126612897',NULL,NULL,'passport','','asdf',NULL,NULL,NULL,'2023-12-13 09:38:07');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
