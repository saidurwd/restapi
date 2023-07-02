/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.3.16-MariaDB : Database - restapi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user` varchar(150) NOT NULL COMMENT 'User',
  `product` varchar(150) NOT NULL COMMENT 'Product',
  `image` varchar(150) NOT NULL COMMENT 'Image',
  `quantity` int(11) NOT NULL COMMENT 'Quantity',
  `price` double(12,2) NOT NULL COMMENT 'Price',
  `total_price` double(12,2) NOT NULL COMMENT 'Total Price',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

insert  into `cart`(`id`,`user`,`product`,`image`,`quantity`,`price`,`total_price`) values 
(1,'Rana','asa','1.jpg',12,12.00,144.00);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `product` varchar(150) NOT NULL COMMENT 'Product',
  `sku` varchar(50) NOT NULL COMMENT 'SKU',
  `price` double(12,2) NOT NULL COMMENT 'Price',
  `image` varchar(150) NOT NULL COMMENT 'Image',
  PRIMARY KEY (`id`,`product`,`sku`,`price`,`image`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product` */

insert  into `product`(`id`,`product`,`sku`,`price`,`image`) values 
(1,'Lorem ipsum dolor sit amet','ABC',1200.00,'1.jpg'),
(2,'Nunc bibendum quis','GFRD',1250.00,'2.jpg'),
(3,'Morbi mollis lacus','KJHF',3280.00,'3.jpg'),
(4,'Nunc accumsan ac sem','LKJHG',2442.00,'4.jpg'),
(5,'Etiam eget augue dapibus','IUIH',5343.00,'5.jpg'),
(6,'Nullam suscipit erat diam','IOIUIO',8786.00,'6.jpg'),
(7,'Mauris sed facilisis orci','OIUOIU',7657.00,'7.jpg'),
(8,'Donec lobortis egestas quam','9JH99',5554.00,'8.jpg'),
(9,'Test','TEST',123.00,''),
(10,'Test','TEST',123.00,''),
(11,'Test','TEST',123.00,''),
(12,'Test','TEST',123.00,'test.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
