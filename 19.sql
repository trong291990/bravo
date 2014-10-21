
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bravo
-- ------------------------------------------------------
-- Server version	5.5.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword_inherit` tinyint(1) NOT NULL DEFAULT '1',
  `meta_keyword` varchar(2047) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(2047) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(2047) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_on_menu` tinyint(1) NOT NULL DEFAULT '0',
  `menu_order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Indochina','If you haven’t travelled in Vietnam, you haven’t lived. This country is mesmerizing, intoxicating, mind-expanding and super fun. In Ho Chi Minh City, one of the highlights is the traffic. We kid you not.Find a safe spot on a roof terrace and be hypnotized by the noisy ballet of motorbikes below. You can stay with local friends in the Mekong, cruise around stunning islands in Nha Trang and Halong Bay, get a new wardrobe in Hoi An and explore Hanoi’s art scene while munching on a baguette.Vietnam is the kind of place you’ll leave relaxed, amazed, cuisinely satisfied, well-dressed and with a thousand tales to tell. Maybe more.',NULL,'indochina-tours',1,NULL,NULL,NULL,1,0),(2,'Vietnam','Our travel specialists have used their knowledge and personal experience of the country to design a comprehensive portfolio of Vietnam tour programs. These journeys have been inspired by the many sights, sounds and flavours of Vietnam. We take you on a journey from North to South, not only visiting the fantastic sights and attractions, but  also getting to know the country and its amazing people. We bring you a unique experience and insight into everyday Vietnamese life.',1,'vietnam-tours',1,NULL,NULL,NULL,1,1),(3,'Cambodia','From magical land Siem Reap to charming Phnom Penh and fascinating places such as Battambang, Kep, Sihanoukville, our travel specialists have used their knowledge and personal experience of the country to design these comprehensive Cambodia tour programs. These journeys bring you the unique experience where glory, ruins and grievousness of the past blend in the lively life of the people nowadays. Browse and pick your journey to the land ',1,'cambodia-tours',1,NULL,NULL,NULL,1,2),(4,'Laos','Laos is full of cultural attractions and natural wonders: temples that reflect the past 500 years of Buddhist architecture, massive stone jars that defy easy explanation, caves crammed full of Buddha images, and a host of eco-friendly options. Below, you’ll find a selection of our most popular tours, but the list is by no means exhaustive. If you don’t find what you’re looking for, please ask us for help. By partnering with the best providers in Laos, we provide you the best quality at the best prices. Our tours show all and tell more. The short nerves and missed chances of doing it yourself are a thing of the past. ',1,'laos-tours',1,NULL,NULL,NULL,1,3);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itineraries`
--

DROP TABLE IF EXISTS `itineraries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itineraries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tour_id` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `hotel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `breakfast` tinyint(1) NOT NULL DEFAULT '1',
  `lunch` tinyint(1) NOT NULL DEFAULT '1',
  `dinner` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `itineraries_tour_id_index` (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itineraries`
--

LOCK TABLES `itineraries` WRITE;
/*!40000 ALTER TABLE `itineraries` DISABLE KEYS */;
/*!40000 ALTER TABLE `itineraries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_08_16_152642_initial_some_tables',1),('2014_08_19_141340_add_thumnail_column_tours_table',2),('2014_08_19_162604_add_some_column_areas_table',2),('2014_08_19_175543_add_search_able_column_places_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_photos`
--

DROP TABLE IF EXISTS `place_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place_photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_photos`
--

LOCK TABLES `place_photos` WRITE;
/*!40000 ALTER TABLE `place_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `place_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_tour`
--

DROP TABLE IF EXISTS `place_tour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place_tour` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `place_tour_tour_id_index` (`tour_id`),
  KEY `place_tour_place_id_index` (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_tour`
--

LOCK TABLES `place_tour` WRITE;
/*!40000 ALTER TABLE `place_tour` DISABLE KEYS */;
INSERT INTO `place_tour` VALUES (1,1,18,1),(2,1,21,1),(3,1,24,1),(4,2,45,1),(5,2,26,1),(6,2,32,1);
/*!40000 ALTER TABLE `place_tour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` float(8,2) DEFAULT NULL,
  `lng` float(8,2) DEFAULT NULL,
  `search_able` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `places_area_id_index` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,2,'HaLong Bay',NULL,NULL,NULL,NULL,7),(2,2,'Hanoi',NULL,NULL,NULL,NULL,2),(3,2,'Da Lat',NULL,NULL,NULL,NULL,0),(4,2,'Phong Nha Ke Bang',NULL,NULL,NULL,NULL,0),(5,2,'Hoi An',NULL,NULL,NULL,NULL,4),(6,2,'Hue',NULL,NULL,NULL,NULL,3),(7,2,'Lang Co',NULL,NULL,NULL,NULL,0),(8,2,'Con Dao Islands',NULL,NULL,NULL,NULL,0),(9,2,'Nha Trang',NULL,NULL,NULL,NULL,0),(10,2,'Saigon',NULL,NULL,NULL,NULL,1),(11,2,'Phu Quoc',NULL,NULL,NULL,NULL,0),(12,3,'Ban Lung',NULL,NULL,NULL,NULL,0),(13,3,'Banteay Chhmar',NULL,NULL,NULL,NULL,0),(14,3,'Battambang',NULL,NULL,NULL,NULL,5),(15,3,'Kampot',NULL,NULL,NULL,NULL,0),(16,3,'Kep',NULL,NULL,NULL,NULL,4),(17,3,'Koh Kong',NULL,NULL,NULL,NULL,0),(18,3,'Kratie & Chhlong',NULL,NULL,NULL,NULL,0),(19,3,'Mondulkiri',NULL,NULL,NULL,NULL,0),(20,3,'Phnom Penh',NULL,NULL,NULL,NULL,1),(21,3,'Ratanakiri',NULL,NULL,NULL,NULL,0),(22,3,'Sen Monorom',NULL,NULL,NULL,NULL,0),(23,3,'Siem Reap',NULL,NULL,NULL,NULL,2),(24,3,'Sihanoukville',NULL,NULL,NULL,NULL,3),(25,3,'Temples of Angkor',NULL,NULL,NULL,NULL,0),(26,4,'Bolaven Plateau',NULL,NULL,NULL,NULL,0),(27,4,'Champasak',NULL,NULL,NULL,NULL,5),(28,4,'Champasak Province',NULL,NULL,NULL,NULL,0),(29,4,'The Far North',NULL,NULL,NULL,NULL,0),(30,4,'Hin Boun',NULL,NULL,NULL,NULL,0),(31,4,'Khammuan & Savannakhet',NULL,NULL,NULL,NULL,0),(32,4,'Luang Nam Tha',NULL,NULL,NULL,NULL,0),(33,4,'Luang Prabang',NULL,NULL,NULL,NULL,2),(34,4,'Muang La',NULL,NULL,NULL,NULL,0),(35,4,'Nong Khiaw',NULL,NULL,NULL,NULL,0),(36,4,'Pakbeng',NULL,NULL,NULL,NULL,0),(37,4,'Pakse',NULL,NULL,NULL,NULL,3),(38,4,'The Plain of Jars',NULL,NULL,NULL,NULL,0),(39,4,'Sam Neau',NULL,NULL,NULL,NULL,0),(40,4,'Tad Lo',NULL,NULL,NULL,NULL,0),(41,4,'Thakek',NULL,NULL,NULL,NULL,0),(42,4,'Vang Vieng',NULL,NULL,NULL,NULL,4),(43,4,'Vientiane',NULL,NULL,NULL,NULL,1),(44,2,'Kon Tum',NULL,NULL,NULL,NULL,0),(45,2,'Ky Son',NULL,NULL,NULL,NULL,0),(46,2,'Lak Lake',NULL,NULL,NULL,NULL,0),(47,2,'Lao Cai',NULL,NULL,NULL,NULL,0),(48,2,'Mai Chau',NULL,NULL,NULL,NULL,0),(49,2,'Mekong Delta',NULL,NULL,NULL,NULL,0),(50,2,'Mu Cang Chai',NULL,NULL,NULL,NULL,0),(51,2,'Mui Ne',NULL,NULL,NULL,NULL,0),(52,2,'Ninh Binh',NULL,NULL,NULL,NULL,0),(53,2,'Northwest Vietnam',NULL,NULL,NULL,NULL,0),(54,2,'Phan Thiet',NULL,NULL,NULL,NULL,0),(55,2,'Qui Nhon',NULL,NULL,NULL,NULL,0),(56,2,'Sapa & the Tonkinese Alps',NULL,NULL,NULL,NULL,6),(57,2,'Da Nang',NULL,NULL,NULL,NULL,5),(58,4,'Savannaket',NULL,NULL,NULL,NULL,6);
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_travel_style`
--

DROP TABLE IF EXISTS `tour_travel_style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_travel_style` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) NOT NULL,
  `travel_style_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tour_travel_style_tour_id_index` (`tour_id`),
  KEY `tour_travel_style_travel_style_id_index` (`travel_style_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_travel_style`
--

LOCK TABLES `tour_travel_style` WRITE;
/*!40000 ALTER TABLE `tour_travel_style` DISABLE KEYS */;
INSERT INTO `tour_travel_style` VALUES (1,1,5),(2,1,7),(3,2,1),(4,2,5);
/*!40000 ALTER TABLE `tour_travel_style` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(2047) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_inherit` tinyint(1) NOT NULL DEFAULT '1',
  `duration` int(11) NOT NULL,
  `price_from` float(8,2) NOT NULL,
  `include` text COLLATE utf8_unicode_ci,
  `not_include` text COLLATE utf8_unicode_ci,
  `overview` text COLLATE utf8_unicode_ci,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tours_area_id_index` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES (1,1,'fefe','BIT2014000001','fefe','',NULL,1,2,44.00,'','','','hoi-an.jpg','','2014-08-19 07:38:39','2014-08-19 08:04:23'),(2,1,'trong tran','BIT2014000002','fef','',NULL,1,33,2.00,'','','','hoi-an.jpg','','2014-08-19 11:44:21','2014-08-19 11:45:24');
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travel_styles`
--

DROP TABLE IF EXISTS `travel_styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travel_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travel_styles`
--

LOCK TABLES `travel_styles` WRITE;
/*!40000 ALTER TABLE `travel_styles` DISABLE KEYS */;
INSERT INTO `travel_styles` VALUES (1,'Day Trip & Short Break'),(2,'Honeymoon Ideas'),(3,'Beach and Relaxion'),(4,'Cruise'),(5,'Adventure & Off the Beaten Track'),(6,'Family Holiday'),(7,'Classic Highlight'),(8,'Rail Journey'),(9,'Luxury Holidays'),(10,'Special Themes');
/*!40000 ALTER TABLE `travel_styles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-20  2:07:52
