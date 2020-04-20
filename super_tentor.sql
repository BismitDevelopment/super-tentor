-- MariaDB dump 10.17  Distrib 10.4.12-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: super_tentor
-- ------------------------------------------------------
-- Server version	10.4.12-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,'Category 1','category-1','2020-03-03 06:29:55','2020-03-03 06:29:55'),(2,NULL,1,'Category 2','category-2','2020-03-03 06:29:55','2020-03-03 06:29:55');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,'{}',1),(2,1,'name','text','Name',1,1,1,1,1,1,'{}',2),(3,1,'email','text','Email',1,1,1,1,1,1,'{}',3),(4,1,'password','password','Password',1,0,0,1,1,0,'{}',4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,'{}',5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,'{}',8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,'{}',12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,'{}',1),(17,3,'name','text','Name',1,1,1,1,1,1,'{}',2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,'{}',5),(21,1,'role_id','text','Role',0,1,1,1,1,1,'{}',9),(22,4,'id','number','ID',1,0,0,0,0,0,NULL,1),(23,4,'parent_id','select_dropdown','Parent',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2),(24,4,'order','text','Order',1,1,1,1,1,1,'{\"default\":1}',3),(25,4,'name','text','Name',1,1,1,1,1,1,NULL,4),(26,4,'slug','text','Slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5),(27,4,'created_at','timestamp','Created At',0,0,1,0,0,0,NULL,6),(28,4,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(29,5,'id','number','ID',1,0,0,0,0,0,NULL,1),(30,5,'author_id','text','Author',1,0,1,1,0,1,NULL,2),(31,5,'category_id','text','Category',1,0,1,1,1,0,NULL,3),(32,5,'title','text','Title',1,1,1,1,1,1,NULL,4),(33,5,'excerpt','text_area','Excerpt',1,0,1,1,1,1,NULL,5),(34,5,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,6),(35,5,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),(36,5,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}',8),(37,5,'meta_description','text_area','Meta Description',1,0,1,1,1,1,NULL,9),(38,5,'meta_keywords','text_area','Meta Keywords',1,0,1,1,1,1,NULL,10),(39,5,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),(40,5,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,12),(41,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,13),(42,5,'seo_title','text','SEO Title',0,1,1,1,1,1,NULL,14),(43,5,'featured','checkbox','Featured',1,1,1,1,1,1,NULL,15),(44,6,'id','number','ID',1,0,0,0,0,0,NULL,1),(45,6,'author_id','text','Author',1,0,0,0,0,0,NULL,2),(46,6,'title','text','Title',1,1,1,1,1,1,NULL,3),(47,6,'excerpt','text_area','Excerpt',1,0,1,1,1,1,NULL,4),(48,6,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,5),(49,6,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}',6),(50,6,'meta_description','text','Meta Description',1,0,1,1,1,1,NULL,7),(51,6,'meta_keywords','text','Meta Keywords',1,0,1,1,1,1,NULL,8),(52,6,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',9),(53,6,'created_at','timestamp','Created At',1,1,1,0,0,0,NULL,10),(54,6,'updated_at','timestamp','Updated At',1,0,0,0,0,0,NULL,11),(55,6,'image','image','Page Image',0,1,1,1,1,1,NULL,12),(56,1,'email_verified_at','timestamp','Email Verified At',0,1,1,1,1,1,'{}',6),(61,13,'id','text','Id',1,0,0,0,0,0,'{}',1),(62,13,'nama','text','Nama',1,1,1,1,1,1,'{}',2),(63,13,'jenis_tryout','select_dropdown','Jenis Tryout',1,1,1,1,1,1,'{\"default\":\"0\",\"options\":{\"0\":\"Free\",\"1\":\"Premium\",\"2\":\"Nasional\"}}',3),(64,13,'paket_soal_hasmany_soal_tius_relationship','relationship','soal_tius',0,1,1,1,1,1,'{\"model\":\"App\\\\SoalTiu\",\"table\":\"soal_tius\",\"type\":\"hasMany\",\"column\":\"paket_id\",\"key\":\"id\",\"label\":\"soal\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',4),(65,13,'paket_soal_hasmany_soal_tkp_relationship','relationship','soal_tkps',0,1,1,1,1,1,'{\"model\":\"App\\\\SoalTkp\",\"table\":\"soal_tkps\",\"type\":\"hasMany\",\"column\":\"paket_id\",\"key\":\"id\",\"label\":\"soal\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',5),(66,13,'paket_soal_hasmany_soal_twk_relationship','relationship','soal_twks',0,1,1,1,1,1,'{\"model\":\"App\\\\SoalTwk\",\"table\":\"soal_twks\",\"type\":\"hasMany\",\"column\":\"paket_id\",\"key\":\"id\",\"label\":\"soal\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',6),(68,15,'id','text','Id',1,0,0,0,0,0,'{}',1),(69,15,'soal','text','Soal',1,1,1,1,1,1,'{}',2),(70,15,'pilihan_1','text','Pilihan 1',1,1,1,1,1,1,'{}',3),(71,15,'pilihan_2','text','Pilihan 2',1,1,1,1,1,1,'{}',4),(72,15,'pilihan_3','text','Pilihan 3',1,1,1,1,1,1,'{}',5),(73,15,'pilihan_4','text','Pilihan 4',1,1,1,1,1,1,'{}',6),(74,15,'jawaban','text','Jawaban',1,1,1,1,1,1,'{}',7),(75,15,'pembahasan','text','Pembahasan',1,1,1,1,1,1,'{}',8),(76,15,'paket_id','text','Paket Id',1,1,1,1,1,1,'{}',9),(77,16,'id','text','Id',1,0,0,0,0,0,'{}',1),(78,16,'soal','text','Soal',1,1,1,1,1,1,'{}',2),(79,16,'pilihan_1','text','Pilihan 1',1,1,1,1,1,1,'{}',3),(80,16,'pilihan_2','text','Pilihan 2',1,1,1,1,1,1,'{}',4),(81,16,'pilihan_3','text','Pilihan 3',1,1,1,1,1,1,'{}',5),(82,16,'pilihan_4','text','Pilihan 4',1,1,1,1,1,1,'{}',6),(83,16,'jawaban','text','Jawaban',1,1,1,1,1,1,'{}',7),(84,16,'pembahasan','text','Pembahasan',1,1,1,1,1,1,'{}',8),(85,16,'paket_id','number','Paket Id',1,1,1,1,1,1,'{}',9),(95,20,'id','text','Id',1,0,0,0,0,0,'{}',1),(96,20,'soal','text','Soal',1,1,1,1,1,1,'{}',2),(97,20,'pilihan_1','text','Pilihan 1',1,1,1,1,1,1,'{}',3),(98,20,'pilihan_2','text','Pilihan 2',1,1,1,1,1,1,'{}',4),(99,20,'pilihan_3','text','Pilihan 3',1,1,1,1,1,1,'{}',5),(100,20,'pilihan_4','text','Pilihan 4',1,1,1,1,1,1,'{}',6),(101,20,'jawaban','text','Jawaban',1,1,1,1,1,1,'{}',7),(102,20,'pembahasan','text','Pembahasan',1,1,1,1,1,1,'{}',8),(103,20,'paket_id','select_dropdown','Paket Id',1,1,1,1,1,1,'{}',9),(104,15,'soal_tkp_belongsto_paket_soal_relationship','relationship','paket_soals',0,1,1,1,1,1,'{\"model\":\"App\\\\PaketSoal\",\"table\":\"paket_soals\",\"type\":\"belongsTo\",\"column\":\"paket_id\",\"key\":\"id\",\"label\":\"nama\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',10),(105,20,'soal_tius_belongsto_paket_soal_relationship','relationship','paket_soals',0,1,1,1,1,1,'{\"model\":\"App\\\\PaketSoal\",\"table\":\"paket_soals\",\"type\":\"belongsTo\",\"column\":\"paket_id\",\"key\":\"id\",\"label\":\"nama\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',10),(106,16,'soal_twk_belongsto_paket_soal_relationship','relationship','paket_soals',0,1,1,1,1,1,'{\"model\":\"App\\\\PaketSoal\",\"table\":\"paket_soals\",\"type\":\"belongsTo\",\"column\":\"paket_id\",\"key\":\"id\",\"label\":\"nama\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',10),(107,13,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',4),(108,13,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-03-03 06:29:55','2020-04-16 23:17:28'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-03-03 06:29:55','2020-03-03 06:33:28'),(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category',NULL,'','',1,0,NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(5,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy','','',1,0,NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(6,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(13,'paket_soals','paket-soals','Paket Soal','Paket Soals',NULL,'App\\PaketSoal',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":\"nama\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-04-16 23:38:58','2020-04-17 01:25:37'),(15,'soal_tkps','soal-tkps','Soal Tkp','Soal Tkps',NULL,'App\\SoalTkp',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":\"soal\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-04-16 23:47:34','2020-04-17 00:03:52'),(16,'soal_twks','soal-twks','Soal Twk','Soal Twks',NULL,'App\\SoalTwk',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":\"soal\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-04-16 23:47:47','2020-04-17 00:06:26'),(20,'soal_tius','soal-tius','Soal Tiu','Soal Tius',NULL,'App\\SoalTiu',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":\"soal\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-04-17 00:00:49','2020-04-17 00:07:22');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2020-03-03 06:29:55','2020-03-03 06:29:55',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,10,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,11,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,12,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,13,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,14,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.settings.index',NULL),(11,1,'Categories','','_self','voyager-categories',NULL,NULL,8,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.categories.index',NULL),(12,1,'Posts','','_self','voyager-news',NULL,NULL,6,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.posts.index',NULL),(13,1,'Pages','','_self','voyager-file-text',NULL,NULL,7,'2020-03-03 06:29:55','2020-03-03 06:29:55','voyager.pages.index',NULL),(14,1,'Hooks','','_self','voyager-hook',NULL,5,13,'2020-03-03 06:29:56','2020-03-03 06:29:56','voyager.hooks',NULL),(20,1,'Paket Soals','','_self',NULL,NULL,NULL,15,'2020-04-16 23:38:58','2020-04-16 23:38:58','voyager.paket-soals.index',NULL),(22,1,'Soal Tkps','','_self',NULL,NULL,NULL,17,'2020-04-16 23:47:34','2020-04-16 23:47:34','voyager.soal-tkps.index',NULL),(23,1,'Soal Twks','','_self',NULL,NULL,NULL,18,'2020-04-16 23:47:47','2020-04-16 23:47:47','voyager.soal-twks.index',NULL),(26,1,'Soal Tius','','_self',NULL,NULL,NULL,19,'2020-04-17 00:00:49','2020-04-17 00:00:49','voyager.soal-tius.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2020-03-03 06:29:55','2020-03-03 06:29:55');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_05_19_173453_create_menu_table',1),(6,'2016_10_21_190000_create_roles_table',1),(7,'2016_10_21_190000_create_settings_table',1),(8,'2016_11_30_135954_create_permission_table',1),(9,'2016_11_30_141208_create_permission_role_table',1),(10,'2016_12_26_201236_data_types__add__server_side',1),(11,'2017_01_13_000000_add_route_to_menu_items_table',1),(12,'2017_01_14_005015_create_translations_table',1),(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(14,'2017_03_06_000000_add_controller_to_data_types_table',1),(15,'2017_04_21_000000_add_order_to_data_rows_table',1),(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),(17,'2017_08_05_000000_add_group_to_settings_table',1),(18,'2017_11_26_013050_add_user_role_relationship',1),(19,'2017_11_26_015000_create_user_roles_table',1),(20,'2018_03_11_000000_add_user_settings',1),(21,'2018_03_14_000000_add_details_to_data_types_table',1),(22,'2018_03_16_000000_make_settings_value_nullable',1),(23,'2019_08_19_000000_create_failed_jobs_table',1),(24,'2016_01_01_000000_create_pages_table',2),(25,'2016_01_01_000000_create_posts_table',2),(26,'2016_02_15_204651_create_categories_table',2),(27,'2017_04_11_000000_alter_post_nullable_fields_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,0,'Hello World','Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.','<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','pages/page1.jpg','hello-world','Yar Meta Description','Keyword1, Keyword2','ACTIVE','2020-03-03 06:29:55','2020-03-03 06:29:55');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paket_soals`
--

DROP TABLE IF EXISTS `paket_soals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paket_soals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tryout` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paket_soals`
--

LOCK TABLES `paket_soals` WRITE;
/*!40000 ALTER TABLE `paket_soals` DISABLE KEYS */;
INSERT INTO `paket_soals` VALUES (2,'Paket 1',0,'2020-04-17 01:25:53','2020-04-17 01:25:53');
/*!40000 ALTER TABLE `paket_soals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(67,1),(68,1),(69,1),(70,1),(71,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(97,1),(98,1),(99,1),(100,1),(101,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(2,'browse_bread',NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(3,'browse_database',NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(4,'browse_media',NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(5,'browse_compass',NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(6,'browse_menus','menus','2020-03-03 06:29:55','2020-03-03 06:29:55'),(7,'read_menus','menus','2020-03-03 06:29:55','2020-03-03 06:29:55'),(8,'edit_menus','menus','2020-03-03 06:29:55','2020-03-03 06:29:55'),(9,'add_menus','menus','2020-03-03 06:29:55','2020-03-03 06:29:55'),(10,'delete_menus','menus','2020-03-03 06:29:55','2020-03-03 06:29:55'),(11,'browse_roles','roles','2020-03-03 06:29:55','2020-03-03 06:29:55'),(12,'read_roles','roles','2020-03-03 06:29:55','2020-03-03 06:29:55'),(13,'edit_roles','roles','2020-03-03 06:29:55','2020-03-03 06:29:55'),(14,'add_roles','roles','2020-03-03 06:29:55','2020-03-03 06:29:55'),(15,'delete_roles','roles','2020-03-03 06:29:55','2020-03-03 06:29:55'),(16,'browse_users','users','2020-03-03 06:29:55','2020-03-03 06:29:55'),(17,'read_users','users','2020-03-03 06:29:55','2020-03-03 06:29:55'),(18,'edit_users','users','2020-03-03 06:29:55','2020-03-03 06:29:55'),(19,'add_users','users','2020-03-03 06:29:55','2020-03-03 06:29:55'),(20,'delete_users','users','2020-03-03 06:29:55','2020-03-03 06:29:55'),(21,'browse_settings','settings','2020-03-03 06:29:55','2020-03-03 06:29:55'),(22,'read_settings','settings','2020-03-03 06:29:55','2020-03-03 06:29:55'),(23,'edit_settings','settings','2020-03-03 06:29:55','2020-03-03 06:29:55'),(24,'add_settings','settings','2020-03-03 06:29:55','2020-03-03 06:29:55'),(25,'delete_settings','settings','2020-03-03 06:29:55','2020-03-03 06:29:55'),(26,'browse_categories','categories','2020-03-03 06:29:55','2020-03-03 06:29:55'),(27,'read_categories','categories','2020-03-03 06:29:55','2020-03-03 06:29:55'),(28,'edit_categories','categories','2020-03-03 06:29:55','2020-03-03 06:29:55'),(29,'add_categories','categories','2020-03-03 06:29:55','2020-03-03 06:29:55'),(30,'delete_categories','categories','2020-03-03 06:29:55','2020-03-03 06:29:55'),(31,'browse_posts','posts','2020-03-03 06:29:55','2020-03-03 06:29:55'),(32,'read_posts','posts','2020-03-03 06:29:55','2020-03-03 06:29:55'),(33,'edit_posts','posts','2020-03-03 06:29:55','2020-03-03 06:29:55'),(34,'add_posts','posts','2020-03-03 06:29:55','2020-03-03 06:29:55'),(35,'delete_posts','posts','2020-03-03 06:29:55','2020-03-03 06:29:55'),(36,'browse_pages','pages','2020-03-03 06:29:55','2020-03-03 06:29:55'),(37,'read_pages','pages','2020-03-03 06:29:55','2020-03-03 06:29:55'),(38,'edit_pages','pages','2020-03-03 06:29:55','2020-03-03 06:29:55'),(39,'add_pages','pages','2020-03-03 06:29:55','2020-03-03 06:29:55'),(40,'delete_pages','pages','2020-03-03 06:29:55','2020-03-03 06:29:55'),(41,'browse_hooks',NULL,'2020-03-03 06:29:56','2020-03-03 06:29:56'),(67,'browse_paket_soals','paket_soals','2020-04-16 23:38:58','2020-04-16 23:38:58'),(68,'read_paket_soals','paket_soals','2020-04-16 23:38:58','2020-04-16 23:38:58'),(69,'edit_paket_soals','paket_soals','2020-04-16 23:38:58','2020-04-16 23:38:58'),(70,'add_paket_soals','paket_soals','2020-04-16 23:38:58','2020-04-16 23:38:58'),(71,'delete_paket_soals','paket_soals','2020-04-16 23:38:58','2020-04-16 23:38:58'),(77,'browse_soal_tkps','soal_tkps','2020-04-16 23:47:34','2020-04-16 23:47:34'),(78,'read_soal_tkps','soal_tkps','2020-04-16 23:47:34','2020-04-16 23:47:34'),(79,'edit_soal_tkps','soal_tkps','2020-04-16 23:47:34','2020-04-16 23:47:34'),(80,'add_soal_tkps','soal_tkps','2020-04-16 23:47:34','2020-04-16 23:47:34'),(81,'delete_soal_tkps','soal_tkps','2020-04-16 23:47:34','2020-04-16 23:47:34'),(82,'browse_soal_twks','soal_twks','2020-04-16 23:47:47','2020-04-16 23:47:47'),(83,'read_soal_twks','soal_twks','2020-04-16 23:47:47','2020-04-16 23:47:47'),(84,'edit_soal_twks','soal_twks','2020-04-16 23:47:47','2020-04-16 23:47:47'),(85,'add_soal_twks','soal_twks','2020-04-16 23:47:47','2020-04-16 23:47:47'),(86,'delete_soal_twks','soal_twks','2020-04-16 23:47:47','2020-04-16 23:47:47'),(97,'browse_soal_tius','soal_tius','2020-04-17 00:00:49','2020-04-17 00:00:49'),(98,'read_soal_tius','soal_tius','2020-04-17 00:00:49','2020-04-17 00:00:49'),(99,'edit_soal_tius','soal_tius','2020-04-17 00:00:49','2020-04-17 00:00:49'),(100,'add_soal_tius','soal_tius','2020-04-17 00:00:49','2020-04-17 00:00:49'),(101,'delete_soal_tius','soal_tius','2020-04-17 00:00:49','2020-04-17 00:00:49');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,0,NULL,'Lorem Ipsum Post',NULL,'This is the excerpt for the Lorem Ipsum Post','<p>This is the body of the lorem ipsum post</p>','posts/post1.jpg','lorem-ipsum-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(2,0,NULL,'My Sample Post',NULL,'This is the excerpt for the sample Post','<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>','posts/post2.jpg','my-sample-post','Meta Description for sample post','keyword1, keyword2, keyword3','PUBLISHED',0,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(3,0,NULL,'Latest Post',NULL,'This is the excerpt for the latest post','<p>This is the body for the latest post</p>','posts/post3.jpg','latest-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(4,0,NULL,'Yarr Post',NULL,'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.','<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>','posts/post4.jpg','yarr-post','this be a meta descript','keyword1, keyword2, keyword3','PUBLISHED',0,'2020-03-03 06:29:55','2020-03-03 06:29:55');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-03-03 06:29:55','2020-03-03 06:29:55'),(2,'user','Free User','2020-03-03 06:29:55','2020-04-08 07:53:44');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Site Title','','text',1,'Site'),(2,'site.description','Site Description','Site Description','','text',2,'Site'),(3,'site.logo','Site Logo','','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_tius`
--

DROP TABLE IF EXISTS `soal_tius`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_tius` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembahasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_tius`
--

LOCK TABLES `soal_tius` WRITE;
/*!40000 ALTER TABLE `soal_tius` DISABLE KEYS */;
INSERT INTO `soal_tius` VALUES (3,'APA ITU BURUNG?','MAMALIA','UNGGAS','REPTIL','IKAN','UNGGAS','Burung adalah unggas',2,'2020-04-19 02:30:39','2020-04-19 02:30:39'),(4,'Apa itu TIU?','pilih ini bro','pilihini coba','coba pilih','pilih 4 nih','jawabannya ini','pembahasan ini',2,'2020-04-19 10:14:31','2020-04-19 10:14:31'),(5,'Coonsol TIU','pilih TIU 1','Pilih TIU 2','pilih TIU3','pilih TIU 4','Jawaban TIU','Pmebahasn TIU',2,'2020-04-19 10:15:09','2020-04-19 10:15:09');
/*!40000 ALTER TABLE `soal_tius` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_tkps`
--

DROP TABLE IF EXISTS `soal_tkps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_tkps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembahasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_tkps`
--

LOCK TABLES `soal_tkps` WRITE;
/*!40000 ALTER TABLE `soal_tkps` DISABLE KEYS */;
INSERT INTO `soal_tkps` VALUES (1,'APA ITU GAJAH?','MAMALIA','UNGGAS','REPTIL','IKAN','AMFIBI','Gajah adalah amfibi',2,'2020-04-19 01:02:50','2020-04-19 01:02:50'),(2,'Apa itu apa?','Pil 1','Pil 2','Pil 3','Pil 4','Jawss','Apa itu pertanyaan',2,'2020-04-19 09:55:28','2020-04-19 09:55:28'),(3,'Consol TKP','ini jawab','pillih ini','coba pilih','ini dong','ini jawaban','ini pembahasan',2,'2020-04-19 10:12:46','2020-04-19 10:12:46');
/*!40000 ALTER TABLE `soal_tkps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_twks`
--

DROP TABLE IF EXISTS `soal_twks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_twks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembahasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_twks`
--

LOCK TABLES `soal_twks` WRITE;
/*!40000 ALTER TABLE `soal_twks` DISABLE KEYS */;
INSERT INTO `soal_twks` VALUES (1,'APA ITU MANUSIA?','MAMALIA','UNGGAS','REPTIL','IKAN','MAMALIA','MANUSIA adalah amfibi',2,'2020-04-19 02:30:00','2020-04-19 02:30:00'),(2,'CONTOH TWK','pilihan 1 twk','pilihan 1 twksd','pilihan 1 twkfff','pilihan 1 twkggg','Jawaban 1 TWK','Pemabahsan 1 TWK',2,'2020-04-19 10:34:58','2020-04-19 10:34:58'),(3,'APA ITU TWK?','Tidak tahu','tauah','apasih','gajeals','TWK ADAH TWLW','Pemabahasn itu ajsafksdjnfc',2,'2020-04-19 10:35:30','2020-04-19 10:35:30');
/*!40000 ALTER TABLE `soal_twks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (1,'data_types','display_name_singular',5,'pt','Post','2020-03-03 06:29:55','2020-03-03 06:29:55'),(2,'data_types','display_name_singular',6,'pt','Página','2020-03-03 06:29:55','2020-03-03 06:29:55'),(3,'data_types','display_name_singular',1,'pt','Utilizador','2020-03-03 06:29:55','2020-03-03 06:29:55'),(4,'data_types','display_name_singular',4,'pt','Categoria','2020-03-03 06:29:55','2020-03-03 06:29:55'),(5,'data_types','display_name_singular',2,'pt','Menu','2020-03-03 06:29:55','2020-03-03 06:29:55'),(6,'data_types','display_name_singular',3,'pt','Função','2020-03-03 06:29:55','2020-03-03 06:29:55'),(7,'data_types','display_name_plural',5,'pt','Posts','2020-03-03 06:29:55','2020-03-03 06:29:55'),(8,'data_types','display_name_plural',6,'pt','Páginas','2020-03-03 06:29:55','2020-03-03 06:29:55'),(9,'data_types','display_name_plural',1,'pt','Utilizadores','2020-03-03 06:29:55','2020-03-03 06:29:55'),(10,'data_types','display_name_plural',4,'pt','Categorias','2020-03-03 06:29:55','2020-03-03 06:29:55'),(11,'data_types','display_name_plural',2,'pt','Menus','2020-03-03 06:29:55','2020-03-03 06:29:55'),(12,'data_types','display_name_plural',3,'pt','Funções','2020-03-03 06:29:55','2020-03-03 06:29:55'),(13,'categories','slug',1,'pt','categoria-1','2020-03-03 06:29:55','2020-03-03 06:29:55'),(14,'categories','name',1,'pt','Categoria 1','2020-03-03 06:29:55','2020-03-03 06:29:55'),(15,'categories','slug',2,'pt','categoria-2','2020-03-03 06:29:55','2020-03-03 06:29:55'),(16,'categories','name',2,'pt','Categoria 2','2020-03-03 06:29:55','2020-03-03 06:29:55'),(17,'pages','title',1,'pt','Olá Mundo','2020-03-03 06:29:55','2020-03-03 06:29:55'),(18,'pages','slug',1,'pt','ola-mundo','2020-03-03 06:29:55','2020-03-03 06:29:55'),(19,'pages','body',1,'pt','<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','2020-03-03 06:29:55','2020-03-03 06:29:55'),(20,'menu_items','title',1,'pt','Painel de Controle','2020-03-03 06:29:55','2020-03-03 06:29:55'),(21,'menu_items','title',2,'pt','Media','2020-03-03 06:29:55','2020-03-03 06:29:55'),(22,'menu_items','title',12,'pt','Publicações','2020-03-03 06:29:55','2020-03-03 06:29:55'),(23,'menu_items','title',3,'pt','Utilizadores','2020-03-03 06:29:55','2020-03-03 06:29:55'),(24,'menu_items','title',11,'pt','Categorias','2020-03-03 06:29:56','2020-03-03 06:29:56'),(25,'menu_items','title',13,'pt','Páginas','2020-03-03 06:29:56','2020-03-03 06:29:56'),(26,'menu_items','title',4,'pt','Funções','2020-03-03 06:29:56','2020-03-03 06:29:56'),(27,'menu_items','title',5,'pt','Ferramentas','2020-03-03 06:29:56','2020-03-03 06:29:56'),(28,'menu_items','title',6,'pt','Menus','2020-03-03 06:29:56','2020-03-03 06:29:56'),(29,'menu_items','title',7,'pt','Base de dados','2020-03-03 06:29:56','2020-03-03 06:29:56'),(30,'menu_items','title',10,'pt','Configurações','2020-03-03 06:29:56','2020-03-03 06:29:56');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Admin','admin@admin.com','users/default.png',NULL,'$2y$10$1fOUcH2Hnoi5uuUa3J/bSuv9PxyG9SdXHiPLy00hW1CETf7ZEkf9G','sVVs74SCJkEcWza9SJ3Y8MezJyiEyHsIO1TZbuCHyZwIhTrspf2PXMPp8jla',NULL,'2020-03-03 06:29:55','2020-03-03 06:29:55'),(2,2,'AAA','aaa@gmail.com','users/default.png',NULL,'$2y$10$6LrePeYOlY/ufbQun2rQBOVqNTXYlPVRuKPgbDCrLju7TyaJMFUY.',NULL,NULL,'2020-03-03 06:50:14','2020-03-03 06:50:14'),(3,2,'AAAAAA','aaaaa@gmail.com','users/default.png','2020-03-03 06:52:57','$2y$10$qTEhmFsRCHer/16vLifimutOc.pJ.vWR/wu8wMJ7eI4B4xHZYAfru',NULL,NULL,'2020-03-03 06:51:41','2020-03-03 06:52:57'),(4,2,'test','test@test.com','users/default.png','2020-04-08 14:39:13','$2y$10$xNRjFHa.N6uPXDGFUmYbseB6tQ9KbnHqIvP9MBnJCii.T47CYD/Ku',NULL,NULL,'2020-04-08 07:27:38','2020-04-08 07:27:38'),(6,2,'test1','test1@test1.com','users/default.png',NULL,'$2y$10$5CcgIOKkHhyr4XJtRJgj4OCOfRy61Vo4ldg6n/Q65MFEcd4h7pL7.',NULL,NULL,'2020-04-08 07:54:35','2020-04-08 07:54:35'),(7,2,'aaa','bbbb@gmail.com','users/default.png','2020-04-17 10:55:45','bbbbbbbb',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-20 22:21:52
