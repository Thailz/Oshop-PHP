SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `brand`    (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'oBrand',      '1', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `brand`    (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'MyLittleToe', '2', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `brand`    (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'oCirage',     '3', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `brand`    (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'oPompes',     '4', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `brand`    (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'oMagad',      '5', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `brand`    (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Shossures',   '0', '0000-00-00 00:00:00.000000', NULL);

INSERT INTO `type`     (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Chaussures de ville',     '1', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `type`     (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Chaussures de sport',     '2', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `type`     (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Tongs',                   '3', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `type`     (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Pantoufles',              '4', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `type`     (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Chaussons',               '5', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `type`     (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Charentaises',            '0', '0000-00-00 00:00:00.000000', NULL);

INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Vintage',  'Desc Vintage',     'images/categ1.jpeg', '1', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Travail',  'Desc Travail',     'images/categ2.jpeg', '2', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Sortir',   'Desc Sortir',      'images/categ3.jpeg', '3', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Détente',  'Desc Détente',     'images/categ4.jpeg', '4', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Cérémonie','Desc Cérémonie',   'images/categ5.jpeg', '5', '0000-00-00 00:00:00.000000', NULL);
INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `order`, `created_at`, `updated_at`) VALUES (NULL, 'Rock',     'Desc Rock',        'images/categ1.jpeg', '0', '0000-00-00 00:00:00.000000', NULL);

INSERT INTO `products` (`id`, `name`, `description`, `price`, `picture`, `stock`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (NULL, 'Crock\'smitaine',                        'Lorem Elsass', '6.00',  NULL, '2',  '0000-00-00 00:00:00.000000', NULL, '1', '1', '1');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `picture`, `stock`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (NULL, 'Crock\'smitaine Rock',                   'Lorem Elsass', '12.00', NULL, '20', '0000-00-00 00:00:00.000000', NULL, '1', '6', '1');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `picture`, `stock`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (NULL, 'Crock\'smitaine Vintage',                'Lorem Elsass', '24.00', NULL, '20', '0000-00-00 00:00:00.000000', NULL, '1', '1', '1');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `picture`, `stock`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (NULL, 'Crock\'smitaine Vintage Pantoufles',     'Lorem Elsass', '48.00', NULL, '20', '0000-00-00 00:00:00.000000', NULL, '1', '1', '4');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `picture`, `stock`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES (NULL, 'Crock\'smitaine Rock Chaussons oMagad',  'Lorem Elsass', '96.00', NULL, '20', '0000-00-00 00:00:00.000000', NULL, '5', '6', '5');
