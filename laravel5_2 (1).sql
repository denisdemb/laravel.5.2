-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 25 2017 г., 10:07
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel5.2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rgt` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `url`, `rgt`, `lft`, `depth`, `published`, `created_at`, `updated_at`) VALUES
(1, 'Сноуборды', 'snowboards', 2, 1, 0, 1, '2017-01-23 08:53:22', '2017-01-24 04:24:23'),
(2, 'Ракетки', 'rackets', 4, 3, 0, 1, '2017-01-23 08:53:50', '2017-01-24 04:24:31');

-- --------------------------------------------------------

--
-- Структура таблицы `forum_categories`
--

CREATE TABLE IF NOT EXISTS `forum_categories` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) NOT NULL DEFAULT '0',
  `enable_threads` tinyint(1) NOT NULL DEFAULT '0',
  `thread_count` int(11) NOT NULL DEFAULT '0',
  `post_count` int(11) NOT NULL DEFAULT '0',
  `private` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `forum_categories`
--

INSERT INTO `forum_categories` (`id`, `category_id`, `title`, `description`, `weight`, `enable_threads`, `thread_count`, `post_count`, `private`, `created_at`, `updated_at`) VALUES
(1, 0, 'новая категория', '', 0, 1, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `forum_posts`
--

CREATE TABLE IF NOT EXISTS `forum_posts` (
  `id` int(10) unsigned NOT NULL,
  `thread_id` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(10) unsigned DEFAULT NULL,
  `sequence` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `forum_threads`
--

CREATE TABLE IF NOT EXISTS `forum_threads` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pinned` tinyint(1) DEFAULT '0',
  `locked` tinyint(1) DEFAULT '0',
  `reply_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `forum_threads_read`
--

CREATE TABLE IF NOT EXISTS `forum_threads_read` (
  `thread_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL,
  `categoriy_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pricesale` decimal(10,2) NOT NULL,
  `sale` int(1) NOT NULL,
  `new` int(1) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `categoriy_id`, `title`, `description`, `price`, `pricesale`, `sale`, `new`, `image`, `published`, `created_at`, `updated_at`) VALUES
(0, 1, 'cноуборд', '<p>классный товар покупайте у кого есть деньги и ключи от квартиры где деньги лежат</p>\r\n', '50.00', '0.00', 0, 0, 'images/uploads/b5d20e09d8fcccbcf1ba55a126cba368.jpg', 1, '2017-01-23 04:30:24', '2017-01-24 11:05:11'),
(7, 2, 'суперракетка', '<p>такой зачипенсий сноуборд ыва ыва ыва ыв аыва ыва ыва ыва ывоар ылвора лывора лоывла орывлора ылвора лыоврал орвлоа ы</p>\r\n', '100.00', '0.00', 0, 1, '0', 1, '2017-01-23 08:02:55', '2017-01-24 04:43:47'),
(8, 2, 'ракетка ух', '<p>выа ыва ыува в ыа ыва ыв ыв аыва ыв&nbsp;</p>\r\n', '333.00', '0.00', 1, 0, '0', 1, '2017-01-23 08:20:23', '2017-01-24 04:51:55');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_12_16_131343_entrust_setup_tables', 1),
('2014_05_19_151759_create_forum_table_categories', 2),
('2014_05_19_152425_create_forum_table_threads', 2),
('2014_05_19_152611_create_forum_table_posts', 2),
('2015_04_14_180344_create_forum_table_threads_read', 2),
('2015_07_22_181406_update_forum_table_categories', 2),
('2015_07_22_181409_update_forum_table_threads', 2),
('2015_07_22_181417_update_forum_table_posts', 2),
('2016_05_24_114302_add_defaults_to_forum_table_threads_columns', 2),
('2016_07_09_111441_add_counts_to_categories_table', 2),
('2016_07_09_122706_add_counts_to_threads_table', 2),
('2016_07_10_134700_add_sequence_to_posts_table', 2),
('2015_04_24_142119_create_news_table', 3),
('2015_04_24_142119_create_topmenu_table', 4),
('2015_04_24_142119_create_topsliders_table', 5),
('2016_12_28_113643_create_m_o_d_e_l_s_table', 6),
('2015_04_24_142119_create_pages_table', 7),
('2017_01_19_142853_shopcategories', 8),
('2017_01_19_144851_shopgoods', 9),
('2017_01_20_102507_create_shoppingcart_table', 10),
('2017_01_20_122345_base_fields', 11),
('2017_01_20_123153_extends_field1_table', 12),
('2015_04_24_142119_create_categories_table', 13),
('2017_01_24_104055_create_shop_images_table', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `m_o_d_e_l_s`
--

CREATE TABLE IF NOT EXISTS `m_o_d_e_l_s` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `published` tinyint(1) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `published`, `text`, `image`, `created_at`, `updated_at`) VALUES
(2, 'первая новость', '2017-01-18', 1, '<p>первая новость</p>\r\n', 'images/uploads/5818f1000aecf70e8c2259734b6f6ba8.jpg', '2016-12-27 06:52:48', '2017-01-19 10:08:26'),
(4, 'вторая новость', '2017-01-19', 1, '<p>вторая новость</p>\r\n', 'images/uploads/9fccdbcabb894fa5dbf5c2924fe79a25.jpg', '2017-01-19 10:14:21', '2017-01-19 10:14:21');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `published` tinyint(1) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `uploadfile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `url`, `title`, `description`, `keywords`, `h1`, `date`, `published`, `text`, `uploadfile`, `created_at`, `updated_at`) VALUES
(1, 'main', 'главная страница', 'главная страница', 'главная страница', 'главная страница', '2017-01-19', 1, '<p>главная страница это хорошо</p>\r\n', 'files/uploads/cb974bb2a0497aa51915ce668e0ea131.docx', '2017-01-19 08:55:15', '2017-01-20 04:23:43'),
(2, 'news', 'новости', 'новости', 'новости', 'новости', '2017-01-19', 1, '<p>новости</p>\r\n', '', '2017-01-19 09:12:40', '2017-01-19 09:41:03'),
(3, 'contacts', 'Контакты', 'Контакты', 'Контакты', 'Контакты', '2017-01-18', 1, '<p>Контакты</p>\r\n', '', '2017-01-19 09:51:55', '2017-01-19 09:51:55'),
(4, 'gallery', 'галлерея', 'галлерея', 'галлерея', 'галлерея', '2017-01-19', 1, '<p>галлерея</p>\r\n', '', '2017-01-19 10:36:11', '2017-01-19 10:37:33'),
(5, 'team', 'команда', 'Команда', 'Команда', 'Команда', '2017-01-19', 1, '<p>Команда</p>\r\n', '', '2017-01-19 10:42:05', '2017-01-19 10:55:55');

-- --------------------------------------------------------

--
-- Структура таблицы `parameters`
--

CREATE TABLE IF NOT EXISTS `parameters` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `parameters`
--

INSERT INTO `parameters` (`id`, `title`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Вес', 'г', '2017-01-20 11:23:13', '2017-01-20 11:23:13'),
(2, 'Ширина', 'мм', '2017-01-20 11:23:51', '2017-01-20 11:23:51');

-- --------------------------------------------------------

--
-- Структура таблицы `parameters_values`
--

CREATE TABLE IF NOT EXISTS `parameters_values` (
  `id` int(10) unsigned NOT NULL,
  `items_id` int(11) NOT NULL,
  `parameters_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `parameters_values`
--

INSERT INTO `parameters_values` (`id`, `items_id`, `parameters_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '20', '2017-01-23 04:23:16', '2017-01-23 04:23:16'),
(2, 2, 1, '10', '2017-01-23 04:23:16', '2017-01-23 04:23:16'),
(3, 3, 2, '30', '2017-01-23 04:28:52', '2017-01-23 04:28:52'),
(4, 3, 1, '20', '2017-01-23 04:28:52', '2017-01-23 04:28:52'),
(5, 5, 1, '', '2017-01-23 04:32:21', '2017-01-23 04:32:21');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fntmo@mail.ru', 'd9ddab68858daae2cce8492bba407648c4f0f74b820146175836f84221481405', '2016-12-29 08:35:40');

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-post', 'create-post', 'Create Posts', 'create new blog posts', '2016-12-16 10:31:23', '2016-12-27 11:16:05'),
(2, 'edit-user', 'edit-user', 'Edit Users', 'edit existing users', '2016-12-16 10:32:05', '2016-12-27 11:15:57');

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user', 'Project Owner', 'User is the owner of a given project', '2016-12-16 10:25:34', '2016-12-27 10:17:59'),
(2, 'admin', 'administrator', 'User Administrator', 'User is allowed to manage and edit other users', '2016-12-16 10:26:36', '2016-12-27 10:17:33'),
(3, 'moderator', 'moderator', NULL, NULL, '2016-12-27 10:16:35', '2016-12-27 10:16:57');

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `shopimages`
--

CREATE TABLE IF NOT EXISTS `shopimages` (
  `id` int(10) unsigned NOT NULL,
  `image_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `shopimages`
--

INSERT INTO `shopimages` (`id`, `image_id`, `path`, `created_at`, `updated_at`) VALUES
(1, '4', 'images/uploads/26ce5c1be880a99aaeb99b95e3edddbb.jpg', NULL, NULL),
(2, '4', 'images/uploads/26ce5c1be880a99aaeb99b95e3edddbb.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `topmenu`
--

CREATE TABLE IF NOT EXISTS `topmenu` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `topmenu`
--

INSERT INTO `topmenu` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `title`, `link`, `published`, `created_at`, `updated_at`) VALUES
(1, 0, 7, 12, 0, 'Магазин', '/shop', 1, '2016-12-28 04:45:50', '2017-01-24 04:36:38'),
(2, 5, 16, 17, 2, 'Команда', '/team', 1, '2016-12-28 04:46:25', '2017-01-24 04:36:59'),
(3, 7, 16, 17, 1, 'События', '/events', 1, '2016-12-28 04:46:50', '2017-01-24 04:37:15'),
(4, 5, 18, 13, 2, 'Опыт', '/experience', 1, '2016-12-28 04:47:47', '2017-01-24 04:37:05'),
(5, 0, 15, 14, 1, 'Компания', '/company', 1, '2016-12-28 04:48:25', '2017-01-24 04:36:55'),
(6, 0, 17, 18, 1, 'Контакты', '/contacts', 1, '2016-12-28 04:49:15', '2017-01-24 04:37:19'),
(7, 0, 15, 18, 0, 'Новости', '/news', 1, '2017-01-19 09:17:04', '2017-01-24 04:37:10'),
(8, 0, 19, 20, 0, 'Галлерея', '/gallery', 1, '2017-01-19 10:41:07', '2017-01-24 04:37:24'),
(9, 1, 10, 11, 1, 'Сноуборды', '/shop/snowboards', 1, '2017-01-23 11:50:28', '2017-01-24 04:36:49'),
(10, 1, 2, 3, 1, 'Ракетки', '/shop/rackets', 1, '2017-01-23 11:50:52', '2017-01-24 04:36:45');

-- --------------------------------------------------------

--
-- Структура таблицы `topsliders`
--

CREATE TABLE IF NOT EXISTS `topsliders` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `topsliders`
--

INSERT INTO `topsliders` (`id`, `title`, `link`, `published`, `image`, `created_at`, `updated_at`) VALUES
(1, 'slider2', 'slider2', 1, 'images/uploads/9d9f27cc534ecec0fab59602eff66cf4.jpg', '2016-12-28 05:58:53', '2016-12-28 06:48:27'),
(2, 'slider1', 'slider1', 1, 'images/uploads/42f2dfbfce12756a94877c38874e2815.jpg', '2016-12-28 06:38:36', '2016-12-28 06:38:50');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'denisdemb', 'dembd@yandex.ru', '$2y$10$oyzPDddyTzU7DmjEkP0GyOm9teRBVBHphbNajDJ7BZjbED/X7bDlW', 'tQsfi4vJN897iOt8VXDxLFr1kXpwZnitwJ2QjGuOUkncCPhUZdgWbgV4zMQ8', '', '2016-12-16 10:17:49', '2017-01-20 09:19:32'),
(3, 'NEW', 'fntmo@mail.ru', '$2y$10$uJZTEzdKMgY4xxYM3AmFDeWUqv11MAW4k9mSQuY/aSBQq5BKfiPVS', '20gQGcQL2JYQZlzpstPC5R9XaX5HnYYvvveL8BhHT43cQQCUvc4DWX0dLR93', '', '2016-12-27 10:18:46', '2017-01-20 03:29:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_threads`
--
ALTER TABLE `forum_threads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `m_o_d_e_l_s`
--
ALTER TABLE `m_o_d_e_l_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_o_d_e_l_s_parent_id_index` (`parent_id`),
  ADD KEY `m_o_d_e_l_s_lft_index` (`lft`),
  ADD KEY `m_o_d_e_l_s_rgt_index` (`rgt`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parameters_values`
--
ALTER TABLE `parameters_values`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Индексы таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `shopimages`
--
ALTER TABLE `shopimages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topmenu`
--
ALTER TABLE `topmenu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topsliders`
--
ALTER TABLE `topsliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `forum_threads`
--
ALTER TABLE `forum_threads`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `m_o_d_e_l_s`
--
ALTER TABLE `m_o_d_e_l_s`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `parameters_values`
--
ALTER TABLE `parameters_values`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `shopimages`
--
ALTER TABLE `shopimages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `topmenu`
--
ALTER TABLE `topmenu`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `topsliders`
--
ALTER TABLE `topsliders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
