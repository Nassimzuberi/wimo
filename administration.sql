-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage des données de la table wimo.data_rows : ~64 rows (environ)
DELETE FROM `data_rows`;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
	(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
	(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
	(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
	(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
	(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
	(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
	(8, 1, 'avatar', 'hidden', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
	(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsTo","column":"role_id","key":"id","label":"display_name","pivot_table":"roles","pivot":"0","taggable":"0"}', 10),
	(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsToMany","column":"id","key":"id","label":"display_name","pivot_table":"user_roles","pivot":"1","taggable":"0"}', 11),
	(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
	(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
	(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
	(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
	(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
	(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
	(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
	(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
	(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
	(21, 4, 'id', 'hidden', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
	(22, 4, 'img', 'hidden', 'Img', 0, 1, 1, 1, 1, 1, '{}', 4),
	(23, 4, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
	(24, 4, 'price_unit', 'number', 'Price Unit', 0, 1, 1, 1, 1, 1, '{}', 6),
	(25, 4, 'price_weight', 'number', 'Price Weight', 0, 1, 1, 1, 1, 1, '{}', 7),
	(26, 4, 'seller_id', 'text', 'Seller Id', 1, 1, 1, 1, 1, 1, '{}', 2),
	(27, 4, 'product_id', 'text', 'Product Id', 1, 1, 1, 1, 1, 1, '{}', 3),
	(28, 4, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
	(29, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
	(30, 4, 'sale_belongsto_product_relationship', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Product","table":"products","type":"belongsTo","column":"product_id","key":"id","label":"name","pivot_table":"categories","pivot":"0","taggable":"0"}', 10),
	(31, 4, 'sale_belongsto_seller_relationship', 'relationship', 'sellers', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Seller","table":"sellers","type":"belongsTo","column":"seller_id","key":"id","label":"user_id","pivot_table":"categories","pivot":"0","taggable":"0"}', 11),
	(32, 1, 'role_id', 'text', 'Role Id', 0, 1, 1, 1, 1, 1, '{}', 2),
	(33, 1, 'first_name', 'text', 'First Name', 1, 1, 1, 1, 1, 1, '{}', 3),
	(34, 1, 'last_name', 'text', 'Last Name', 1, 1, 1, 1, 1, 1, '{}', 4),
	(35, 1, 'birthday', 'text', 'Birthday', 1, 1, 1, 1, 1, 1, '{}', 5),
	(36, 1, 'gender', 'text', 'Gender', 1, 1, 1, 1, 1, 1, '{}', 6),
	(37, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 9),
	(38, 5, 'id', 'hidden', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
	(39, 5, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
	(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
	(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
	(42, 6, 'id', 'hidden', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
	(43, 6, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
	(44, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
	(45, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
	(46, 6, 'category_belongstomany_product_relationship', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Product","table":"products","type":"belongsToMany","column":"id","key":"id","label":"name","pivot_table":"tags","pivot":"1","taggable":null}', 5),
	(47, 5, 'product_belongstomany_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Category","table":"categories","type":"belongsToMany","column":"id","key":"id","label":"name","pivot_table":"tags","pivot":"1","taggable":null}', 5),
	(48, 7, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(49, 7, 'sales_id', 'text', 'Sales Id', 1, 1, 1, 1, 1, 1, '{}', 2),
	(50, 7, 'quantity', 'number', 'Quantity', 1, 1, 1, 1, 1, 1, '{}', 4),
	(51, 7, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 3),
	(52, 7, 'total', 'number', 'Total', 1, 1, 1, 1, 1, 1, '{}', 5),
	(53, 7, 'payement_option', 'number', 'Payement Option', 0, 1, 1, 1, 1, 1, '{}', 6),
	(54, 7, 'state', 'number', 'State', 1, 1, 1, 1, 1, 1, '{}', 7),
	(55, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
	(56, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
	(57, 8, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
	(58, 8, 'quantity', 'number', 'Quantity', 0, 1, 1, 1, 1, 1, '{}', 3),
	(59, 8, 'weight', 'number', 'Weight', 0, 1, 1, 1, 1, 1, '{}', 4),
	(60, 8, 'sale_id', 'text', 'Sale Id', 1, 1, 1, 1, 1, 1, '{}', 2),
	(61, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
	(62, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
	(63, 7, 'commande_belongsto_sale_relationship', 'relationship', 'sales', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Sales","table":"sales","type":"belongsTo","column":"sales_id","key":"id","label":"product_id","pivot_table":"categories","pivot":"0","taggable":null}', 10),
	(64, 7, 'commande_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\User","table":"users","type":"belongsTo","column":"user_id","key":"id","label":"email","pivot_table":"categories","pivot":"0","taggable":null}', 11),
	(65, 8, 'inventaire_belongsto_sales_relationship', 'relationship', 'sales', 0, 1, 1, 1, 1, 1, '{"model":"App\\\\Sales","table":"sales","type":"belongsTo","column":"sale_id","key":"id","label":"product_id","pivot_table":"categories","pivot":"0","taggable":"0"}', 7);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;

-- Listage des données de la table wimo.data_types : ~8 rows (environ)
DELETE FROM `data_types`;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
	(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'App\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"desc","default_search_key":null,"scope":null}', '2020-04-15 17:50:38', '2020-04-15 18:06:54'),
	(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-04-15 17:50:38', '2020-04-15 17:50:38'),
	(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2020-04-15 17:50:38', '2020-04-15 17:50:38'),
	(4, 'sales', 'sales', 'Sale', 'Sales', NULL, 'App\\Sales', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2020-04-15 17:58:24', '2020-04-15 18:06:14'),
	(5, 'products', 'products', 'Product', 'Products', NULL, 'App\\Product', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}', '2020-04-15 18:11:32', '2020-04-15 18:11:32'),
	(6, 'categories', 'categories', 'Category', 'Categories', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}', '2020-04-15 18:12:01', '2020-04-15 18:12:01'),
	(7, 'commandes', 'commandes', 'Commande', 'Commandes', NULL, 'App\\Commande', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}', '2020-04-15 18:15:51', '2020-04-15 18:15:51'),
	(8, 'inventaires', 'inventaires', 'Inventaire', 'Inventaires', NULL, 'App\\Inventaire', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}', '2020-04-15 18:16:07', '2020-04-15 18:18:45');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;

-- Listage des données de la table wimo.menus : ~1 rows (environ)
DELETE FROM `menus`;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2020-04-15 17:50:39', '2020-04-15 17:50:39');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Listage des données de la table wimo.menu_items : ~18 rows (environ)
DELETE FROM `menu_items`;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
	(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-04-15 17:50:39', '2020-04-15 17:50:39', 'voyager.dashboard', NULL),
	(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2020-04-15 17:50:39', '2020-04-15 18:09:40', 'voyager.media.index', NULL),
	(3, 1, 'Users', '', '_self', 'voyager-person', NULL, 14, 2, '2020-04-15 17:50:39', '2020-04-15 18:09:27', 'voyager.users.index', NULL),
	(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 14, 1, '2020-04-15 17:50:39', '2020-04-15 18:09:25', 'voyager.roles.index', NULL),
	(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 6, '2020-04-15 17:50:39', '2020-04-15 18:09:40', NULL, NULL),
	(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2020-04-15 17:50:39', '2020-04-15 18:09:23', 'voyager.menus.index', NULL),
	(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2020-04-15 17:50:39', '2020-04-15 18:09:23', 'voyager.database.index', NULL),
	(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2020-04-15 17:50:39', '2020-04-15 18:09:23', 'voyager.compass.index', NULL),
	(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2020-04-15 17:50:39', '2020-04-15 18:09:23', 'voyager.bread.index', NULL),
	(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 7, '2020-04-15 17:50:39', '2020-04-15 18:09:40', 'voyager.settings.index', NULL),
	(11, 1, 'Sales', '', '_self', NULL, NULL, 13, 3, '2020-04-15 17:58:25', '2020-04-15 18:19:22', 'voyager.sales.index', NULL),
	(12, 1, 'Tickets', '/admin/tickets', '_self', 'voyager-brush', '#000000', NULL, 2, '2020-04-15 18:08:17', '2020-04-15 18:09:40', NULL, ''),
	(13, 1, 'Annonces', '', '_self', 'voyager-data', '#000000', NULL, 3, '2020-04-15 18:08:38', '2020-04-15 18:10:22', NULL, ''),
	(14, 1, 'Utilisateurs', '', '_self', 'voyager-browser', '#000000', NULL, 4, '2020-04-15 18:09:19', '2020-04-15 18:09:40', NULL, ''),
	(15, 1, 'Products', '', '_self', NULL, NULL, 13, 1, '2020-04-15 18:11:32', '2020-04-15 18:19:19', 'voyager.products.index', NULL),
	(16, 1, 'Categories', '', '_self', NULL, NULL, 13, 2, '2020-04-15 18:12:01', '2020-04-15 18:19:22', 'voyager.categories.index', NULL),
	(17, 1, 'Commandes', '', '_self', NULL, NULL, 13, 5, '2020-04-15 18:15:52', '2020-04-15 18:19:27', 'voyager.commandes.index', NULL),
	(18, 1, 'Inventaires', '', '_self', NULL, NULL, 13, 4, '2020-04-15 18:16:07', '2020-04-15 18:19:27', 'voyager.inventaires.index', NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;

-- Listage des données de la table wimo.permissions : ~50 rows (environ)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
	(1, 'browse_admin', NULL, '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(2, 'browse_bread', NULL, '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(3, 'browse_database', NULL, '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(4, 'browse_media', NULL, '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(5, 'browse_compass', NULL, '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(6, 'browse_menus', 'menus', '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(7, 'read_menus', 'menus', '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(8, 'edit_menus', 'menus', '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(9, 'add_menus', 'menus', '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(10, 'delete_menus', 'menus', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(11, 'browse_roles', 'roles', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(12, 'read_roles', 'roles', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(13, 'edit_roles', 'roles', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(14, 'add_roles', 'roles', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(15, 'delete_roles', 'roles', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(16, 'browse_users', 'users', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(17, 'read_users', 'users', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(18, 'edit_users', 'users', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(19, 'add_users', 'users', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(20, 'delete_users', 'users', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(21, 'browse_settings', 'settings', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(22, 'read_settings', 'settings', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(23, 'edit_settings', 'settings', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(24, 'add_settings', 'settings', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(25, 'delete_settings', 'settings', '2020-04-15 17:50:40', '2020-04-15 17:50:40'),
	(26, 'browse_sales', 'sales', '2020-04-15 17:58:25', '2020-04-15 17:58:25'),
	(27, 'read_sales', 'sales', '2020-04-15 17:58:25', '2020-04-15 17:58:25'),
	(28, 'edit_sales', 'sales', '2020-04-15 17:58:25', '2020-04-15 17:58:25'),
	(29, 'add_sales', 'sales', '2020-04-15 17:58:25', '2020-04-15 17:58:25'),
	(30, 'delete_sales', 'sales', '2020-04-15 17:58:25', '2020-04-15 17:58:25'),
	(31, 'browse_products', 'products', '2020-04-15 18:11:32', '2020-04-15 18:11:32'),
	(32, 'read_products', 'products', '2020-04-15 18:11:32', '2020-04-15 18:11:32'),
	(33, 'edit_products', 'products', '2020-04-15 18:11:32', '2020-04-15 18:11:32'),
	(34, 'add_products', 'products', '2020-04-15 18:11:32', '2020-04-15 18:11:32'),
	(35, 'delete_products', 'products', '2020-04-15 18:11:32', '2020-04-15 18:11:32'),
	(36, 'browse_categories', 'categories', '2020-04-15 18:12:01', '2020-04-15 18:12:01'),
	(37, 'read_categories', 'categories', '2020-04-15 18:12:01', '2020-04-15 18:12:01'),
	(38, 'edit_categories', 'categories', '2020-04-15 18:12:01', '2020-04-15 18:12:01'),
	(39, 'add_categories', 'categories', '2020-04-15 18:12:01', '2020-04-15 18:12:01'),
	(40, 'delete_categories', 'categories', '2020-04-15 18:12:01', '2020-04-15 18:12:01'),
	(41, 'browse_commandes', 'commandes', '2020-04-15 18:15:52', '2020-04-15 18:15:52'),
	(42, 'read_commandes', 'commandes', '2020-04-15 18:15:52', '2020-04-15 18:15:52'),
	(43, 'edit_commandes', 'commandes', '2020-04-15 18:15:52', '2020-04-15 18:15:52'),
	(44, 'add_commandes', 'commandes', '2020-04-15 18:15:52', '2020-04-15 18:15:52'),
	(45, 'delete_commandes', 'commandes', '2020-04-15 18:15:52', '2020-04-15 18:15:52'),
	(46, 'browse_inventaires', 'inventaires', '2020-04-15 18:16:07', '2020-04-15 18:16:07'),
	(47, 'read_inventaires', 'inventaires', '2020-04-15 18:16:07', '2020-04-15 18:16:07'),
	(48, 'edit_inventaires', 'inventaires', '2020-04-15 18:16:07', '2020-04-15 18:16:07'),
	(49, 'add_inventaires', 'inventaires', '2020-04-15 18:16:07', '2020-04-15 18:16:07'),
	(50, 'delete_inventaires', 'inventaires', '2020-04-15 18:16:07', '2020-04-15 18:16:07');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Listage des données de la table wimo.permission_role : ~81 rows (environ)
DELETE FROM `permission_role`;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 3),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(16, 3),
	(17, 1),
	(17, 3),
	(18, 1),
	(18, 3),
	(19, 1),
	(19, 3),
	(20, 1),
	(20, 3),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(26, 3),
	(27, 1),
	(27, 3),
	(28, 1),
	(28, 3),
	(29, 1),
	(29, 3),
	(30, 1),
	(30, 3),
	(31, 1),
	(31, 3),
	(32, 1),
	(32, 3),
	(33, 1),
	(33, 3),
	(34, 1),
	(34, 3),
	(35, 1),
	(35, 3),
	(36, 1),
	(36, 3),
	(37, 1),
	(37, 3),
	(38, 1),
	(38, 3),
	(39, 1),
	(39, 3),
	(40, 1),
	(40, 3),
	(41, 1),
	(41, 3),
	(42, 1),
	(42, 3),
	(43, 1),
	(43, 3),
	(44, 1),
	(44, 3),
	(45, 1),
	(45, 3),
	(46, 1),
	(46, 3),
	(47, 1),
	(47, 3),
	(48, 1),
	(48, 3),
	(49, 1),
	(49, 3),
	(50, 1),
	(50, 3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Listage des données de la table wimo.roles : ~3 rows (environ)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Administrator', '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(2, 'user', 'Normal User', '2020-04-15 17:50:39', '2020-04-15 17:50:39'),
	(3, 'moderator', 'Moderateur', '2020-04-15 17:50:39', '2020-04-15 17:50:39');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Listage des données de la table wimo.settings : ~10 rows (environ)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
	(1, 'site.title', 'Wimo', 'Wimo', '', 'text', 1, 'Site'),
	(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
	(3, 'site.logo', 'Site Logo', '', '', 'hidden', 3, 'Site'),
	(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
	(5, 'admin.bg_image', 'Admin Background Image', '', '', 'hidden', 5, 'Admin'),
	(6, 'admin.title', 'Admin Title', 'Wimo', '', 'text', 1, 'Admin'),
	(7, 'admin.description', 'Admin Description', 'Administration', '', 'text', 2, 'Admin'),
	(8, 'admin.loader', 'Admin Loader', '', '', 'hidden', 3, 'Admin'),
	(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'hidden', 4, 'Admin'),
	(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Listage des données de la table wimo.translations : ~0 rows (environ)
DELETE FROM `translations`;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;

-- Listage des données de la table wimo.user_roles : ~0 rows (environ)
DELETE FROM `user_roles`;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
