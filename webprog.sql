/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.7.19 : Database - webprog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`webprog` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `webprog`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(20) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(25) DEFAULT NULL,
  `category_flavor` varchar(25) DEFAULT NULL,
  `category_origin` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`category_id`,`category_name`,`category_flavor`,`category_origin`,`created_at`,`updated_at`) values (1,'Chocolate Cake','Sweet','Germany','2018-05-04 15:47:35','2018-05-04 15:47:37'),(2,'Cheese Cake','Buttery','Greece','2018-05-04 15:59:53','2018-05-04 16:00:07'),(3,'Opera Cake','Fruity','France','2018-05-04 16:01:27','2018-05-04 16:01:29'),(4,'Duo Cake','Sweet','Germany','2018-05-04 16:01:42','2018-05-04 16:01:44'),(5,'Romantic','Bitter Sweet','Italy','2018-05-04 16:02:04','2018-05-04 16:02:06');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_gender` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_picture` varchar(50) NOT NULL,
  `customer_type` varchar(10) DEFAULT NULL,
  `customer_status` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`customer_id`,`customer_name`,`customer_email`,`customer_phone`,`customer_password`,`customer_gender`,`customer_address`,`customer_picture`,`customer_type`,`customer_status`,`created_at`,`updated_at`) values (13,'Willy Hystor','willy.astore@gmail.com','08780802934','qweqweqwe','m','Cimone','20180503064516_images (2)_1512902060933.jpg','2',1,'2018-04-30 07:58:00','2018-05-03 06:45:23'),(14,'Admin','admin@gmail.com','123456789','admins','f','MANTA Panjing','20180503091105_images (2)_1512902060933.jpg','1',1,'2018-05-03 09:11:05','2018-05-03 09:11:05'),(15,'qweqwe','qwe@qwe.qwe','123123','qweqwe','f','qweqwe','20180504093635_cheeseberry_cake.jpg','2',1,'2018-05-04 09:36:35','2018-05-04 09:36:35');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_description` varchar(50) DEFAULT NULL,
  `product_price` int(50) DEFAULT NULL,
  `product_picture` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`product_id`,`category_id`,`product_name`,`product_description`,`product_price`,`product_picture`,`created_at`,`updated_at`) values (1,2,'Cheesecakessssss','Manis, asam, asin, rame rasanye',3000012,'20180504093352_josef_keller_cake.jpg','2018-05-03 12:18:14','2018-05-04 09:33:52'),(2,1,'Black Forest Cakess','Banyak dibeli, padahal gak enak',350000,'20180503122449_black_forest.jpg','2018-05-03 12:24:49','2018-05-04 04:50:00'),(3,1,'Josef Keller Cake','Cokelat biasa',450000,'20180503122611_josef_keller_cake.jpg','2018-05-03 12:26:11','2018-05-03 12:26:11'),(4,1,'Duo Maya','Duo maya maknyos',200000,'20180503122718_black_forest.jpg','2018-05-03 12:27:18','2018-05-03 12:27:18'),(5,2,'Kue Romantis','Romantis wokkkkkkkkk',1000000,'20180503122739_josef_keller_cake.jpg','2018-05-03 12:27:39','2018-05-03 12:27:39'),(6,2,'Kue Aniversary','Kue bukan untuk para jomblo',250000,'20180503122807_josef_keller_cake.jpg','2018-05-03 12:28:07','2018-05-03 12:28:07'),(7,2,'CheeseCake Biasa','Gambarnya kue coklat',150000,'20180503122828_black_forest.jpg','2018-05-03 12:28:28','2018-05-03 12:28:28'),(8,3,'Opera Van Java','Di sana gunung di sini gunung',77777777,'20180504085339_black_forest.jpg','2018-05-04 08:53:39','2018-05-04 08:53:39'),(9,4,'qweqweqwe','qweqweqweqwe',123123,'20180504092236_black_forest.jpg','2018-05-04 09:22:36','2018-05-04 09:22:36');

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `transaction_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `product_id` int(20) DEFAULT NULL,
  `transaction_quantity` int(20) DEFAULT NULL,
  `transaction_total_price` int(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transactions` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
