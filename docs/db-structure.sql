-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `OshopDB`;
CREATE DATABASE `OshopDB` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `OshopDB`;

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `order` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id de la catégorie',
  `name` varchar(64) NOT NULL COMMENT 'nom de la catégorie',
  `subtitle` varchar(64) DEFAULT NULL COMMENT 'sous-titre slogan de la categorie',
  `picture` varchar(255) DEFAULT NULL COMMENT 'image de fond de la catégorie',
  `order` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'order d''affichage de la categorie sur la home (0=pas affichée)',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'date de creation de la categorie',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'la date de dernière modification de la categorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'L''identifiant unique du produit',
  `name` varchar(64) NOT NULL COMMENT 'Le nom du produit',
  `description` text DEFAULT NULL COMMENT 'la description du produit',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT 0.00 COMMENT 'Le prix du produit',
  `picture` varchar(255) DEFAULT NULL COMMENT 'Chemin vers l''image du produit',
  `stock` int(11) NOT NULL DEFAULT 0 COMMENT 'Nombre dispo en stock',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'Date de création du produit',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Date de dernière modif',
  `brand_id` int(10) unsigned NOT NULL COMMENT 'L''identifiant de la marque',
  `category_id` int(10) unsigned NOT NULL COMMENT 'L''identifiant de la catégorie',
  `type_id` int(10) unsigned NOT NULL COMMENT 'L''identifiant du type',
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `order` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-07-03 10:00:27