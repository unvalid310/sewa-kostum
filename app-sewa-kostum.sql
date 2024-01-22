/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MariaDB
 Source Server Version : 110202 (11.2.2-MariaDB-log)
 Source Host           : localhost:3306
 Source Schema         : app-sewa-kostum

 Target Server Type    : MariaDB
 Target Server Version : 110202 (11.2.2-MariaDB-log)
 File Encoding         : 65001

 Date: 22/01/2024 09:48:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_products` int(11) DEFAULT NULL,
  `id_user` bigint(20) unsigned DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `variant` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cart`),
  KEY `cart_product` (`id_products`),
  KEY `user_cart` (`id_user`),
  CONSTRAINT `cart_product` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`),
  CONSTRAINT `user_cart` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of cart
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` (`id`, `category`, `slug`) VALUES (1, 'New Arrivals', 'new-arrivals');
INSERT INTO `categories` (`id`, `category`, `slug`) VALUES (2, 'Most Popular', 'most-popular');
INSERT INTO `categories` (`id`, `category`, `slug`) VALUES (3, 'Best Offers', 'best-offers');
COMMIT;

-- ----------------------------
-- Table structure for detail_transaction
-- ----------------------------
DROP TABLE IF EXISTS `detail_transaction`;
CREATE TABLE `detail_transaction` (
  `id_transaction` int(11) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `variant` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  KEY `detail_id_transaction` (`id_transaction`),
  CONSTRAINT `detail_id_transaction` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of detail_transaction
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
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

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2024_01_01_134701_create_permission_tables', 1);
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
BEGIN;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (1, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 8);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 9);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 13);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 14);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 15);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 16);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 17);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 18);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 19);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 20);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 26);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\Models\\User', 27);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for payment_method
-- ----------------------------
DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE `payment_method` (
  `id_payment` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `va_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of payment_method
-- ----------------------------
BEGIN;
INSERT INTO `payment_method` (`id_payment`, `label`, `bank`, `va_number`) VALUES ('bca_va', 'BCA', NULL, NULL);
INSERT INTO `payment_method` (`id_payment`, `label`, `bank`, `va_number`) VALUES ('bni_va', 'BNI', NULL, NULL);
INSERT INTO `payment_method` (`id_payment`, `label`, `bank`, `va_number`) VALUES ('bri_va', 'BRI', 'bri', '70888345289878865');
INSERT INTO `payment_method` (`id_payment`, `label`, `bank`, `va_number`) VALUES ('permata_va', 'PERMATA', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1, 'dashboard', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (2, 'view produk', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (3, 'create produk', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (4, 'update produk', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (5, 'delete produk', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (6, 'publish produk', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (7, 'unpublish produk', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (8, 'view transaksi', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (9, 'update transaksi', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (10, 'delete transaksi', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (11, 'publish transaksi', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (12, 'unpublish transaksi', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (13, 'view pengembalian', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (14, 'update pengembalian', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (15, 'delete pengembalian', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (16, 'publish pengembalian', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (17, 'unpublish pengembalian', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (18, 'view profil', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (19, 'view keranjang', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (20, 'tambah keranjang', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (21, 'beli langsung', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (22, 'view pembayaran', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (23, 'proses pembayaran', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id_products` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `old_price` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `variant` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `image` text DEFAULT 'default/assets/uploads/product-1.jpg',
  `status` enum('publish','unpublish') NOT NULL DEFAULT 'publish',
  PRIMARY KEY (`id_products`),
  KEY `product_categories` (`id_categories`),
  CONSTRAINT `product_categories` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (1, 'vestibulum ante ipsum primis in faucibus orci', 1, 10, 0, 282118, 0, 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'unpublish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (2, 'interdum eu tincidunt in leo maecenas', 1, 10, 0, 288526, 0, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (3, 'faucibus orci luctus et ultrices posuere', 3, 10, 10, 301700, 311700, 'Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (4, 'quam pharetra magna ac consequat metus', 2, 10, 0, 248994, 0, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (5, 'ante vestibulum ante ipsum primis in', 2, 10, 0, 158727, 0, 'Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (6, 'hac habitasse platea dictumst etiam faucibus', 2, 10, 0, 103508, 0, 'Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (7, 'diam id ornare imperdiet sapien urna pretium', 2, 10, 0, 300094, 0, 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (8, 'dui vel sem sed sagittis nam congue', 3, 10, 10, 350936, 360936, 'Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (9, 'eget semper rutrum nulla nunc', 1, 9, 0, 110151, 0, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (10, 'ultricies eu nibh quisque id justo', 2, 9, 0, 183731, 0, 'Morbi vel lectus in quam fringilla rhoncus.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (11, 'platea dictumst aliquam augue quam', 3, 9, 10, 400270, 410270, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (12, 'blandit nam nulla integer pede justo lacinia', 1, 9, 0, 249679, 0, 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (13, 'interdum mauris ullamcorper purus sit amet nulla', 1, 10, 0, 482150, 0, 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (14, 'id massa id nisl venenatis lacinia aenean', 3, 10, 10, 113126, 123126, 'Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (15, 'lorem quis tortor id nulla ultrices', 3, 8, 10, 284209, 294209, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (16, 'vestibulum ante ipsum primis in faucibus', 3, 10, 10, 499107, 509107, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (17, 'sem duis aliquam convallis nunc', 2, 10, 0, 184902, 0, 'Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (18, 'orci eget orci vehicula condimentum', 2, 10, 0, 413124, 0, 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (19, 'sed vestibulum sit amet cursus id', 2, 10, 0, 476263, 0, 'In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', 'Putih, Biru, Cokelat', 'S,M,L,XL,XXL,XXXL', 'default/assets/uploads/product-1.jpg', 'publish');
INSERT INTO `products` (`id_products`, `name`, `id_categories`, `stock`, `discount`, `price`, `old_price`, `description`, `variant`, `size`, `image`, `status`) VALUES (20, 'aenean lectus pellentesque eget nunc donec', 3, 10, 10, 556243, 566243, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor.', 'Putih,kuning', 'S,M,L,XL', 'default/assets/uploads/product-1.jpg', 'publish');
COMMIT;

-- ----------------------------
-- Table structure for return_transaction
-- ----------------------------
DROP TABLE IF EXISTS `return_transaction`;
CREATE TABLE `return_transaction` (
  `id_return` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) DEFAULT NULL,
  `return_invoice` int(11) DEFAULT NULL,
  `return_qty` int(11) DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `late` int(11) DEFAULT NULL,
  `late_fee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_return`),
  KEY `return_of_transaction` (`id_transaction`),
  CONSTRAINT `return_of_transaction` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of return_transaction
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
BEGIN;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (2, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (3, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (4, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (5, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (6, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (7, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (8, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (9, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (11, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (12, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (13, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (14, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (15, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (16, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (17, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (18, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (19, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (20, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (21, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (22, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (23, 2);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1, 'admin', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (2, 'customer', 'web', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
COMMIT;

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned DEFAULT NULL,
  `invoice` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qty` int(11) NOT NULL,
  `total` int(255) NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `id_card` text DEFAULT NULL,
  `id_payment` varchar(255) DEFAULT NULL,
  `va_number` int(11) DEFAULT NULL,
  `pdf_url` text DEFAULT NULL,
  `snap_token` text DEFAULT NULL,
  `status` enum('1','2','3','4') DEFAULT '1',
  `payment_date` datetime DEFAULT NULL,
  `length_rent` int(11) DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaction`) USING BTREE,
  KEY `user_payment` (`id_user`),
  KEY `payment_method` (`id_payment`),
  CONSTRAINT `payment_method` FOREIGN KEY (`id_payment`) REFERENCES `payment_method` (`id_payment`),
  CONSTRAINT `user_payment` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of transaction
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ttl` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `ttl`, `email`, `no_hp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Jhon Doe', '1996-02-01', 'jhondoe@gmail.com', NULL, '2024-01-01 15:18:06', '$2y$10$EYH3NEZZhdFrgRmIPCNVueYXOk1XH.dx1N8nLCbxAPUuQrF2UqbeS', 'JQrJoWn5tMJcVki2GqhEm5Lc9lYATzhSWUC2U4MxDZIQfofjfolNvjvUkoXz', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `users` (`id`, `name`, `ttl`, `email`, `no_hp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'Admin', NULL, 'admin@gmail.com', NULL, '2024-01-01 15:18:06', '$2y$10$Is8cIAv.f7hjFRZRUBMlleFfwjzUjQlSktC0OQiRtzfMP5UwwIHu6', 'xDGd7cU7qrrlmTl24eMGGADSY8wnNHzz3Wn5RZLoelxe5h7GHZu3bM7f79E5', '2024-01-01 15:18:06', '2024-01-01 15:18:06');
INSERT INTO `users` (`id`, `name`, `ttl`, `email`, `no_hp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (27, 'Tya Agustin', NULL, 'agustintya23@gmail.com', '085769213985', '2024-01-13 13:26:20', '$2y$10$W.5LuvLAfiKsFjU9kI6I.OnWCtVQQzuzN3K28DTzyiqRXnBxkZn86', 'SwOhGt3NMsxcmDxkMM1TNUeJgrt3hFbCCURB3VVOTVg0mLUMusStzb2BATBF', '2024-01-13 13:26:20', '2024-01-13 13:26:20');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
