-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2024 at 09:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flora_reuse`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `seller_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(11, 0, 'Insence Wood', 'insence-wood', 1, '2023-10-24 13:39:24', '2024-10-16 01:00:14'),
(12, 0, 'Forest Wood', 'forest-wood', 1, '2023-10-24 13:39:32', '2024-10-16 00:59:29'),
(13, 0, 'xyz', 'xyz', 1, '2023-10-24 13:39:38', '2024-10-16 02:37:43'),
(16, 21, 'Refill Pack', 'refill-pack', 1, '2024-10-13 08:17:26', '2024-10-16 00:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `showHome` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `seller_id`, `name`, `slug`, `image`, `status`, `showHome`, `created_at`, `updated_at`) VALUES
(28, 2, 'Incense Cones', 'incense-cones', '1728896347_product5.png', 1, 'Yes', '2024-10-13 14:30:35', '2024-10-14 04:01:58'),
(29, 21, 'Refill Pack', 'refill-pack', '1728895628_product2.png', 1, 'Yes', '2024-10-14 03:17:08', '2024-10-14 04:03:05'),
(30, 21, 'Forest Wood', 'forest-wood', '1728895909_product3.png', 1, 'Yes', '2024-10-14 03:18:36', '2024-10-14 04:02:52'),
(31, 21, 'Rooh Rose', 'rooh-rose', '1728896055_product4.png', 1, 'Yes', '2024-10-14 03:24:15', '2024-10-14 04:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(9, 'vaibhav', 'nikamvaibhav028@gmail.com', '9730214356', 'hello', 'c', '2023-11-06 12:46:56', '2023-11-06 12:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'US', NULL, NULL),
(2, 'Canada', 'CA', NULL, NULL),
(3, 'Afghanistan', 'AF', NULL, NULL),
(4, 'Albania', 'AL', NULL, NULL),
(5, 'Algeria', 'DZ', NULL, NULL),
(6, 'American Samoa', 'AS', NULL, NULL),
(7, 'Andorra', 'AD', NULL, NULL),
(8, 'Angola', 'AO', NULL, NULL),
(9, 'Anguilla', 'AI', NULL, NULL),
(10, 'Antarctica', 'AQ', NULL, NULL),
(11, 'Antigua and/or Barbuda', 'AG', NULL, NULL),
(12, 'Argentina', 'AR', NULL, NULL),
(13, 'Armenia', 'AM', NULL, NULL),
(14, 'Aruba', 'AW', NULL, NULL),
(15, 'Australia', 'AU', NULL, NULL),
(16, 'Austria', 'AT', NULL, NULL),
(17, 'Azerbaijan', 'AZ', NULL, NULL),
(18, 'Bahamas', 'BS', NULL, NULL),
(19, 'Bahrain', 'BH', NULL, NULL),
(20, 'Bangladesh', 'BD', NULL, NULL),
(21, 'Barbados', 'BB', NULL, NULL),
(22, 'Belarus', 'BY', NULL, NULL),
(23, 'Belgium', 'BE', NULL, NULL),
(24, 'Belize', 'BZ', NULL, NULL),
(25, 'Benin', 'BJ', NULL, NULL),
(26, 'Bermuda', 'BM', NULL, NULL),
(27, 'Bhutan', 'BT', NULL, NULL),
(28, 'Bolivia', 'BO', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'Botswana', 'BW', NULL, NULL),
(31, 'Bouvet Island', 'BV', NULL, NULL),
(32, 'Brazil', 'BR', NULL, NULL),
(33, 'British lndian Ocean Territory', 'IO', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', NULL, NULL),
(35, 'Bulgaria', 'BG', NULL, NULL),
(36, 'Burkina Faso', 'BF', NULL, NULL),
(37, 'Burundi', 'BI', NULL, NULL),
(38, 'Cambodia', 'KH', NULL, NULL),
(39, 'Cameroon', 'CM', NULL, NULL),
(40, 'Cape Verde', 'CV', NULL, NULL),
(41, 'Cayman Islands', 'KY', NULL, NULL),
(42, 'Central African Republic', 'CF', NULL, NULL),
(43, 'Chad', 'TD', NULL, NULL),
(44, 'Chile', 'CL', NULL, NULL),
(45, 'China', 'CN', NULL, NULL),
(46, 'Christmas Island', 'CX', NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(48, 'Colombia', 'CO', NULL, NULL),
(49, 'Comoros', 'KM', NULL, NULL),
(50, 'Congo', 'CG', NULL, NULL),
(51, 'Cook Islands', 'CK', NULL, NULL),
(52, 'Costa Rica', 'CR', NULL, NULL),
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL),
(54, 'Cuba', 'CU', NULL, NULL),
(55, 'Cyprus', 'CY', NULL, NULL),
(56, 'Czech Republic', 'CZ', NULL, NULL),
(57, 'Democratic Republic of Congo', 'CD', NULL, NULL),
(58, 'Denmark', 'DK', NULL, NULL),
(59, 'Djibouti', 'DJ', NULL, NULL),
(60, 'Dominica', 'DM', NULL, NULL),
(61, 'Dominican Republic', 'DO', NULL, NULL),
(62, 'East Timor', 'TP', NULL, NULL),
(63, 'Ecudaor', 'EC', NULL, NULL),
(64, 'Egypt', 'EG', NULL, NULL),
(65, 'El Salvador', 'SV', NULL, NULL),
(66, 'Equatorial Guinea', 'GQ', NULL, NULL),
(67, 'Eritrea', 'ER', NULL, NULL),
(68, 'Estonia', 'EE', NULL, NULL),
(69, 'Ethiopia', 'ET', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(71, 'Faroe Islands', 'FO', NULL, NULL),
(72, 'Fiji', 'FJ', NULL, NULL),
(73, 'Finland', 'FI', NULL, NULL),
(74, 'France', 'FR', NULL, NULL),
(75, 'France, Metropolitan', 'FX', NULL, NULL),
(76, 'French Guiana', 'GF', NULL, NULL),
(77, 'French Polynesia', 'PF', NULL, NULL),
(78, 'French Southern Territories', 'TF', NULL, NULL),
(79, 'Gabon', 'GA', NULL, NULL),
(80, 'Gambia', 'GM', NULL, NULL),
(81, 'Georgia', 'GE', NULL, NULL),
(82, 'Germany', 'DE', NULL, NULL),
(83, 'Ghana', 'GH', NULL, NULL),
(84, 'Gibraltar', 'GI', NULL, NULL),
(85, 'Greece', 'GR', NULL, NULL),
(86, 'Greenland', 'GL', NULL, NULL),
(87, 'Grenada', 'GD', NULL, NULL),
(88, 'Guadeloupe', 'GP', NULL, NULL),
(89, 'Guam', 'GU', NULL, NULL),
(90, 'Guatemala', 'GT', NULL, NULL),
(91, 'Guinea', 'GN', NULL, NULL),
(92, 'Guinea-Bissau', 'GW', NULL, NULL),
(93, 'Guyana', 'GY', NULL, NULL),
(94, 'Haiti', 'HT', NULL, NULL),
(95, 'Heard and Mc Donald Islands', 'HM', NULL, NULL),
(96, 'Honduras', 'HN', NULL, NULL),
(97, 'Hong Kong', 'HK', NULL, NULL),
(98, 'Hungary', 'HU', NULL, NULL),
(99, 'Iceland', 'IS', NULL, NULL),
(100, 'India', 'IN', NULL, NULL),
(101, 'Indonesia', 'ID', NULL, NULL),
(102, 'Iran (Islamic Republic of)', 'IR', NULL, NULL),
(103, 'Iraq', 'IQ', NULL, NULL),
(104, 'Ireland', 'IE', NULL, NULL),
(105, 'Israel', 'IL', NULL, NULL),
(106, 'Italy', 'IT', NULL, NULL),
(107, 'Ivory Coast', 'CI', NULL, NULL),
(108, 'Jamaica', 'JM', NULL, NULL),
(109, 'Japan', 'JP', NULL, NULL),
(110, 'Jordan', 'JO', NULL, NULL),
(111, 'Kazakhstan', 'KZ', NULL, NULL),
(112, 'Kenya', 'KE', NULL, NULL),
(113, 'Kiribati', 'KI', NULL, NULL),
(114, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(115, 'Korea, Republic of', 'KR', NULL, NULL),
(116, 'Kuwait', 'KW', NULL, NULL),
(117, 'Kyrgyzstan', 'KG', NULL, NULL),
(118, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(119, 'Latvia', 'LV', NULL, NULL),
(120, 'Lebanon', 'LB', NULL, NULL),
(121, 'Lesotho', 'LS', NULL, NULL),
(122, 'Liberia', 'LR', NULL, NULL),
(123, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),
(124, 'Liechtenstein', 'LI', NULL, NULL),
(125, 'Lithuania', 'LT', NULL, NULL),
(126, 'Luxembourg', 'LU', NULL, NULL),
(127, 'Macau', 'MO', NULL, NULL),
(128, 'Macedonia', 'MK', NULL, NULL),
(129, 'Madagascar', 'MG', NULL, NULL),
(130, 'Malawi', 'MW', NULL, NULL),
(131, 'Malaysia', 'MY', NULL, NULL),
(132, 'Maldives', 'MV', NULL, NULL),
(133, 'Mali', 'ML', NULL, NULL),
(134, 'Malta', 'MT', NULL, NULL),
(135, 'Marshall Islands', 'MH', NULL, NULL),
(136, 'Martinique', 'MQ', NULL, NULL),
(137, 'Mauritania', 'MR', NULL, NULL),
(138, 'Mauritius', 'MU', NULL, NULL),
(139, 'Mayotte', 'TY', NULL, NULL),
(140, 'Mexico', 'MX', NULL, NULL),
(141, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(142, 'Moldova, Republic of', 'MD', NULL, NULL),
(143, 'Monaco', 'MC', NULL, NULL),
(144, 'Mongolia', 'MN', NULL, NULL),
(145, 'Montserrat', 'MS', NULL, NULL),
(146, 'Morocco', 'MA', NULL, NULL),
(147, 'Mozambique', 'MZ', NULL, NULL),
(148, 'Myanmar', 'MM', NULL, NULL),
(149, 'Namibia', 'NA', NULL, NULL),
(150, 'Nauru', 'NR', NULL, NULL),
(151, 'Nepal', 'NP', NULL, NULL),
(152, 'Netherlands', 'NL', NULL, NULL),
(153, 'Netherlands Antilles', 'AN', NULL, NULL),
(154, 'New Caledonia', 'NC', NULL, NULL),
(155, 'New Zealand', 'NZ', NULL, NULL),
(156, 'Nicaragua', 'NI', NULL, NULL),
(157, 'Niger', 'NE', NULL, NULL),
(158, 'Nigeria', 'NG', NULL, NULL),
(159, 'Niue', 'NU', NULL, NULL),
(160, 'Norfork Island', 'NF', NULL, NULL),
(161, 'Northern Mariana Islands', 'MP', NULL, NULL),
(162, 'Norway', 'NO', NULL, NULL),
(163, 'Oman', 'OM', NULL, NULL),
(164, 'Pakistan', 'PK', NULL, NULL),
(165, 'Palau', 'PW', NULL, NULL),
(166, 'Panama', 'PA', NULL, NULL),
(167, 'Papua New Guinea', 'PG', NULL, NULL),
(168, 'Paraguay', 'PY', NULL, NULL),
(169, 'Peru', 'PE', NULL, NULL),
(170, 'Philippines', 'PH', NULL, NULL),
(171, 'Pitcairn', 'PN', NULL, NULL),
(172, 'Poland', 'PL', NULL, NULL),
(173, 'Portugal', 'PT', NULL, NULL),
(174, 'Puerto Rico', 'PR', NULL, NULL),
(175, 'Qatar', 'QA', NULL, NULL),
(176, 'Republic of South Sudan', 'SS', NULL, NULL),
(177, 'Reunion', 'RE', NULL, NULL),
(178, 'Romania', 'RO', NULL, NULL),
(179, 'Russian Federation', 'RU', NULL, NULL),
(180, 'Rwanda', 'RW', NULL, NULL),
(181, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(182, 'Saint Lucia', 'LC', NULL, NULL),
(183, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(184, 'Samoa', 'WS', NULL, NULL),
(185, 'San Marino', 'SM', NULL, NULL),
(186, 'Sao Tome and Principe', 'ST', NULL, NULL),
(187, 'Saudi Arabia', 'SA', NULL, NULL),
(188, 'Senegal', 'SN', NULL, NULL),
(189, 'Serbia', 'RS', NULL, NULL),
(190, 'Seychelles', 'SC', NULL, NULL),
(191, 'Sierra Leone', 'SL', NULL, NULL),
(192, 'Singapore', 'SG', NULL, NULL),
(193, 'Slovakia', 'SK', NULL, NULL),
(194, 'Slovenia', 'SI', NULL, NULL),
(195, 'Solomon Islands', 'SB', NULL, NULL),
(196, 'Somalia', 'SO', NULL, NULL),
(197, 'South Africa', 'ZA', NULL, NULL),
(198, 'South Georgia South Sandwich Islands', 'GS', NULL, NULL),
(199, 'Spain', 'ES', NULL, NULL),
(200, 'Sri Lanka', 'LK', NULL, NULL),
(201, 'St. Helena', 'SH', NULL, NULL),
(202, 'St. Pierre and Miquelon', 'PM', NULL, NULL),
(203, 'Sudan', 'SD', NULL, NULL),
(204, 'Suriname', 'SR', NULL, NULL),
(205, 'Svalbarn and Jan Mayen Islands', 'SJ', NULL, NULL),
(206, 'Swaziland', 'SZ', NULL, NULL),
(207, 'Sweden', 'SE', NULL, NULL),
(208, 'Switzerland', 'CH', NULL, NULL),
(209, 'Syrian Arab Republic', 'SY', NULL, NULL),
(210, 'Taiwan', 'TW', NULL, NULL),
(211, 'Tajikistan', 'TJ', NULL, NULL),
(212, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(213, 'Thailand', 'TH', NULL, NULL),
(214, 'Togo', 'TG', NULL, NULL),
(215, 'Tokelau', 'TK', NULL, NULL),
(216, 'Tonga', 'TO', NULL, NULL),
(217, 'Trinidad and Tobago', 'TT', NULL, NULL),
(218, 'Tunisia', 'TN', NULL, NULL),
(219, 'Turkey', 'TR', NULL, NULL),
(220, 'Turkmenistan', 'TM', NULL, NULL),
(221, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(222, 'Tuvalu', 'TV', NULL, NULL),
(223, 'Uganda', 'UG', NULL, NULL),
(224, 'Ukraine', 'UA', NULL, NULL),
(225, 'United Arab Emirates', 'AE', NULL, NULL),
(226, 'United Kingdom', 'GB', NULL, NULL),
(227, 'United States minor outlying islands', 'UM', NULL, NULL),
(228, 'Uruguay', 'UY', NULL, NULL),
(229, 'Uzbekistan', 'UZ', NULL, NULL),
(230, 'Vanuatu', 'VU', NULL, NULL),
(231, 'Vatican City State', 'VA', NULL, NULL),
(232, 'Venezuela', 'VE', NULL, NULL),
(233, 'Vietnam', 'VN', NULL, NULL),
(234, 'Virgin Islands (British)', 'VG', NULL, NULL),
(235, 'Virgin Islands (U.S.)', 'VI', NULL, NULL),
(236, 'Wallis and Futuna Islands', 'WF', NULL, NULL),
(237, 'Western Sahara', 'EH', NULL, NULL),
(238, 'Yemen', 'YE', NULL, NULL),
(239, 'Yugoslavia', 'YU', NULL, NULL),
(240, 'Zaire', 'ZR', NULL, NULL),
(241, 'Zambia', 'ZM', NULL, NULL),
(242, 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `appartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile`, `country_id`, `address`, `appartment`, `city`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(10, 21, 'sundar', 'Karkyale', 'sundarrajkarkyale@gmail.com', '07517978898', 100, 'At Hanegao', NULL, 'Degloor', 'Maharashtra', '431741', '2024-10-10 04:36:01', '2024-10-10 04:36:01'),
(11, 20, 'Shubham', 'Pande', 'shubhampande732003@gmail.com', '9373003200', 100, 'Mahesh Nager Aurangabad', 'XYXYXYYXYX', 'Aurangabad', 'Maharashtra', '431001', '2024-10-15 02:53:05', '2024-10-15 02:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE `discount_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `max_use` int(11) DEFAULT NULL,
  `max_uses_user` int(11) DEFAULT NULL,
  `type` enum('percent','fixed') NOT NULL DEFAULT 'fixed',
  `discount_amount` double(10,2) NOT NULL,
  `min_amount` double(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `starts_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_coupons`
--

INSERT INTO `discount_coupons` (`id`, `seller_id`, `code`, `name`, `description`, `max_use`, `max_uses_user`, `type`, `discount_amount`, `min_amount`, `status`, `starts_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(6, 2, '347908', 'Flat50', 'tt', 4, 3, 'percent', 4.00, 44.00, 1, '2024-10-14 20:11:20', '2025-07-10 20:11:22', '2024-10-13 14:41:28', '2024-10-16 02:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_16_130941_alert_users_table', 1),
(6, '2023_07_16_173926_create_categories_table', 1),
(7, '2023_07_17_162737_create_temp_images_table', 1),
(8, '2023_07_18_131349_create_sub_categories_table', 1),
(9, '2023_07_19_084647_create_brands_table', 1),
(10, '2023_07_22_095539_create_products_table', 1),
(11, '2023_07_22_095713_create_product_images_table', 1),
(12, '2023_08_10_143051_alter_categories_table', 1),
(13, '2023_08_10_154032_alter_products_table', 1),
(14, '2023_08_10_155202_alter_sub_categories_table', 1),
(15, '2023_08_13_130446_alter_products_table', 1),
(16, '2023_08_15_033642_alter_users_table', 1),
(17, '2023_08_15_065121_create_countries_table', 1),
(18, '2023_08_15_111616_create_customer_addresses', 1),
(19, '2023_08_15_143233_create_shipping_charges_table', 1),
(20, '2023_09_03_141718_create_discount_coupons_table', 1),
(21, '2023_09_04_180313_create_orders_table', 1),
(22, '2023_09_04_193623_alter_orders_table', 1),
(23, '2023_09_05_191016_alter_orders_table', 1),
(24, '2023_09_07_082309_create_whishlists_table', 1),
(25, '2023_09_10_131156_create_order_items_table', 1),
(26, '2023_09_10_183609_create_contact_us_table', 2),
(27, '2023_09_10_185412_create_contacts_table', 3),
(28, '2023_09_19_132939_alter_users_table', 4),
(29, '2024_10_08_173945_create_roles_table', 5),
(30, '2024_10_08_190540_add_metadata_to_products_table', 6),
(31, '2024_10_08_193726_add_type_to_products_table', 7),
(32, '2024_10_08_194102_add_user_id_to_products_table', 8),
(33, '2024_10_08_194103_add_user_id_to_products_table', 9),
(35, '2024_10_11_143256_add_seller_id_to_orders_table', 10),
(36, '2024_10_13_175812_add_seller_id_to_discount_coupons_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `shipping` double(10,2) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_code_id` int(11) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `grand_total` double(10,2) NOT NULL,
  `payment_status` enum('paid','not paid') NOT NULL DEFAULT 'not paid',
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `shipped_date` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `appartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `seller_id`, `user_id`, `subtotal`, `shipping`, `coupon_code`, `coupon_code_id`, `discount`, `grand_total`, `payment_status`, `status`, `shipped_date`, `first_name`, `last_name`, `email`, `mobile`, `country_id`, `address`, `appartment`, `city`, `state`, `zip`, `notes`, `created_at`, `updated_at`) VALUES
(34, NULL, 21, 165000.00, 49.00, '', NULL, 0.00, 165049.00, 'not paid', 'pending', NULL, 'sundar', 'Karkyale', 'sundarrajkarkyale@gmail.com', '07517978898', 100, 'At Hanegao', NULL, 'Degloor', 'Maharashtra', '431741', NULL, '2024-10-10 04:36:01', '2024-10-10 04:36:01'),
(35, NULL, 21, 165000.00, 49.00, '', NULL, 0.00, 165049.00, 'not paid', 'pending', NULL, 'sundar', 'Karkyale', 'sundarrajkarkyale@gmail.com', '07517978898', 100, 'At Hanegao', NULL, 'Degloor', 'Maharashtra', '431741', NULL, '2024-10-10 04:40:31', '2024-10-10 04:40:31'),
(37, 21, 21, 165000.00, 49.00, '', NULL, 0.00, 165049.00, 'not paid', 'shipped', '2024-10-14 14:41:54', 'sundar', 'Karkyale', 'sundarrajkarkyale@gmail.com', '07517978898', 100, 'At Hanegao', NULL, 'Degloor', 'Maharashtra', '431741', NULL, '2024-10-10 04:42:43', '2024-10-13 09:12:01'),
(38, NULL, 20, 5000.00, 50.00, '', NULL, 0.00, 5050.00, 'not paid', 'pending', NULL, 'Shubham', 'Pande', 'shubhampande732003@gmail.com', '9373003200', 100, 'Mahesh Nager Aurangabad', 'XYXYXYYXYX', 'Aurangabad', 'Maharashtra', '431001', NULL, '2024-10-15 02:53:05', '2024-10-15 02:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(41, 38, 54, 'vfdcs', 1, 5000.00, 5000.00, '2024-10-15 02:53:05', '2024-10-15 02:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `shipping_returns` text DEFAULT NULL,
  `related_products` text DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `compare_price` double(10,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_featured` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sku` varchar(255) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `track_qty` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `qty` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `type` varchar(255) NOT NULL DEFAULT 'raw_material'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `slug`, `description`, `short_description`, `shipping_returns`, `related_products`, `price`, `compare_price`, `category_id`, `sub_category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `status`, `created_at`, `updated_at`, `metadata`, `type`) VALUES
(54, 2, 'vfdcs', 'vfdcs', '<p>gvds</p>', '<p>frdse</p>', '<p>bvdc</p>', '', 5000.00, 3422.00, 28, 22, NULL, 'No', 'yyr33ds', NULL, 'Yes', 332, 1, '2024-10-13 14:40:21', '2024-10-15 02:53:05', NULL, 'manufactured_material');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(185, 54, 'b6f7a24b-3cf4-44f8-a756-07953d4f306b.jpg', NULL, '2024-10-13 14:40:22', '2024-10-13 14:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2024-10-08 12:22:35', '2024-10-08 12:22:35'),
(2, 'Manufacturer', '2024-10-08 12:22:35', '2024-10-08 12:22:35'),
(3, 'Raw Material Seller', '2024-10-08 12:22:35', '2024-10-08 12:22:35'),
(4, 'End User', '2024-10-08 12:22:35', '2024-10-08 12:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `seller_id`, `country_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 0, '100', 50.00, '2023-09-10 09:13:09', '2024-10-13 08:43:28'),
(2, 0, 'rest_of_world', 1049.00, '2023-09-10 09:13:28', '2023-10-18 19:26:56'),
(4, 21, '3', 344.00, '2024-10-13 08:55:19', '2024-10-13 08:55:19'),
(5, 2, '2', 344.00, '2024-10-13 14:40:41', '2024-10-13 14:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `showHome` enum('Yes','No') NOT NULL DEFAULT 'No',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `status`, `showHome`, `category_id`, `created_at`, `updated_at`) VALUES
(22, 'Tengale', 'tengale', 1, 'Yes', 28, '2024-10-13 14:37:41', '2024-10-13 14:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_images`
--

INSERT INTO `temp_images` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1694353580.jpg', '2023-09-10 08:16:20', '2023-09-10 08:16:20'),
(2, '1694353600.jpg', '2023-09-10 08:16:40', '2023-09-10 08:16:40'),
(3, '1694353848.jpg', '2023-09-10 08:20:48', '2023-09-10 08:20:48'),
(4, '1694354312.jpg', '2023-09-10 08:28:32', '2023-09-10 08:28:32'),
(5, '1694354631.jpg', '2023-09-10 08:33:51', '2023-09-10 08:33:51'),
(6, '1694354666.jpg', '2023-09-10 08:34:26', '2023-09-10 08:34:26'),
(7, '1694354698.jpg', '2023-09-10 08:34:58', '2023-09-10 08:34:58'),
(8, '1694354811.jpg', '2023-09-10 08:36:51', '2023-09-10 08:36:51'),
(9, '1694354865.jpg', '2023-09-10 08:37:45', '2023-09-10 08:37:45'),
(10, '1694354981.jpg', '2023-09-10 08:39:41', '2023-09-10 08:39:41'),
(11, '1694355039.jpg', '2023-09-10 08:40:39', '2023-09-10 08:40:39'),
(12, '1694355075.jpg', '2023-09-10 08:41:15', '2023-09-10 08:41:15'),
(13, '1694355153.jpg', '2023-09-10 08:42:33', '2023-09-10 08:42:33'),
(14, '1694355217.jpg', '2023-09-10 08:43:37', '2023-09-10 08:43:37'),
(15, '1694356179.jpg', '2023-09-10 08:59:39', '2023-09-10 08:59:39'),
(16, '1694356180.jpg', '2023-09-10 08:59:40', '2023-09-10 08:59:40'),
(17, '1694356180.jpg', '2023-09-10 08:59:40', '2023-09-10 08:59:40'),
(18, '1694356180.jpg', '2023-09-10 08:59:40', '2023-09-10 08:59:40'),
(19, '1694356181.jpg', '2023-09-10 08:59:41', '2023-09-10 08:59:41'),
(20, '1694356181.jpg', '2023-09-10 08:59:41', '2023-09-10 08:59:41'),
(21, '1694362699.jpg', '2023-09-10 10:48:19', '2023-09-10 10:48:19'),
(22, '1694362700.jpg', '2023-09-10 10:48:20', '2023-09-10 10:48:20'),
(23, '1694362700.jpg', '2023-09-10 10:48:20', '2023-09-10 10:48:20'),
(24, '1694363113.jpg', '2023-09-10 10:55:13', '2023-09-10 10:55:13'),
(25, '1694363113.jpg', '2023-09-10 10:55:13', '2023-09-10 10:55:13'),
(26, '1694363114.jpg', '2023-09-10 10:55:14', '2023-09-10 10:55:14'),
(27, '1694363114.jpg', '2023-09-10 10:55:14', '2023-09-10 10:55:14'),
(28, '1694363153.jpg', '2023-09-10 10:55:53', '2023-09-10 10:55:53'),
(29, '1694363179.jpg', '2023-09-10 10:56:19', '2023-09-10 10:56:19'),
(30, '1694363179.jpg', '2023-09-10 10:56:19', '2023-09-10 10:56:19'),
(31, '1694363180.jpg', '2023-09-10 10:56:20', '2023-09-10 10:56:20'),
(32, '1694363540.jpg', '2023-09-10 11:02:20', '2023-09-10 11:02:20'),
(33, '1694363540.jpg', '2023-09-10 11:02:20', '2023-09-10 11:02:20'),
(34, '1694363541.jpg', '2023-09-10 11:02:21', '2023-09-10 11:02:21'),
(35, '1694363541.jpg', '2023-09-10 11:02:21', '2023-09-10 11:02:21'),
(36, '1694363986.jpg', '2023-09-10 11:09:46', '2023-09-10 11:09:46'),
(37, '1694363986.jpg', '2023-09-10 11:09:46', '2023-09-10 11:09:46'),
(38, '1694364263.jpg', '2023-09-10 11:14:23', '2023-09-10 11:14:23'),
(39, '1694364264.jpg', '2023-09-10 11:14:24', '2023-09-10 11:14:24'),
(40, '1694364264.jpg', '2023-09-10 11:14:24', '2023-09-10 11:14:24'),
(41, '1694364264.jpg', '2023-09-10 11:14:24', '2023-09-10 11:14:24'),
(42, '1694364264.jpg', '2023-09-10 11:14:24', '2023-09-10 11:14:24'),
(43, '1694365217.jpg', '2023-09-10 11:30:17', '2023-09-10 11:30:17'),
(44, '1694365218.jpg', '2023-09-10 11:30:18', '2023-09-10 11:30:18'),
(45, '1694365219.jpg', '2023-09-10 11:30:19', '2023-09-10 11:30:19'),
(46, '1694365644.jpg', '2023-09-10 11:37:24', '2023-09-10 11:37:24'),
(47, '1694366062.jpg', '2023-09-10 11:44:22', '2023-09-10 11:44:22'),
(48, '1694366568.jpg', '2023-09-10 11:52:48', '2023-09-10 11:52:48'),
(49, '1694366790.jpg', '2023-09-10 11:56:30', '2023-09-10 11:56:30'),
(50, '1694367002.jpg', '2023-09-10 12:00:02', '2023-09-10 12:00:02'),
(51, '1694367216.jpg', '2023-09-10 12:03:36', '2023-09-10 12:03:36'),
(52, '1694367216.jpg', '2023-09-10 12:03:36', '2023-09-10 12:03:36'),
(53, '1694367216.jpg', '2023-09-10 12:03:36', '2023-09-10 12:03:36'),
(54, '1694419585.jpg', '2023-09-11 02:36:25', '2023-09-11 02:36:25'),
(55, '1697530970.jpeg', '2023-10-17 08:22:50', '2023-10-17 08:22:50'),
(56, '1697530970.jpg', '2023-10-17 08:22:50', '2023-10-17 08:22:50'),
(57, '1697530970.jpg', '2023-10-17 08:22:50', '2023-10-17 08:22:50'),
(58, '1697530970.jpeg', '2023-10-17 08:22:50', '2023-10-17 08:22:50'),
(59, '1697530970.jpeg', '2023-10-17 08:22:50', '2023-10-17 08:22:50'),
(60, '1697530970.jpeg', '2023-10-17 08:22:50', '2023-10-17 08:22:50'),
(61, '1697532256.jpeg', '2023-10-17 08:44:16', '2023-10-17 08:44:16'),
(62, '1697532338.jpeg', '2023-10-17 08:45:38', '2023-10-17 08:45:38'),
(63, '1697532438.jpg', '2023-10-17 08:47:18', '2023-10-17 08:47:18'),
(64, '1697532483.jpg', '2023-10-17 08:48:03', '2023-10-17 08:48:03'),
(65, '1697532662.jpg', '2023-10-17 08:51:02', '2023-10-17 08:51:02'),
(66, '1697532696.jpeg', '2023-10-17 08:51:36', '2023-10-17 08:51:36'),
(67, '1697533498.jpeg', '2023-10-17 09:04:58', '2023-10-17 09:04:58'),
(68, '1697533551.jpeg', '2023-10-17 09:05:51', '2023-10-17 09:05:51'),
(69, '1697533935.jpeg', '2023-10-17 09:12:15', '2023-10-17 09:12:15'),
(70, '1697534033.jpeg', '2023-10-17 09:13:53', '2023-10-17 09:13:53'),
(71, '1697534147.jpg', '2023-10-17 09:15:47', '2023-10-17 09:15:47'),
(72, '1697534344.jpeg', '2023-10-17 09:19:04', '2023-10-17 09:19:04'),
(73, '1697534753.jpeg', '2023-10-17 09:25:53', '2023-10-17 09:25:53'),
(74, '1697535190.jpeg', '2023-10-17 09:33:10', '2023-10-17 09:33:10'),
(75, '1697535232.jpg', '2023-10-17 09:33:52', '2023-10-17 09:33:52'),
(76, '1697535431.jpeg', '2023-10-17 09:37:11', '2023-10-17 09:37:11'),
(77, '1697535796.jpg', '2023-10-17 09:43:16', '2023-10-17 09:43:16'),
(78, '1697536188.jpg', '2023-10-17 09:49:48', '2023-10-17 09:49:48'),
(79, '1697536228.jpg', '2023-10-17 09:50:28', '2023-10-17 09:50:28'),
(80, '1697537607.jpg', '2023-10-17 10:13:27', '2023-10-17 10:13:27'),
(81, '1697538163.jpeg', '2023-10-17 10:22:43', '2023-10-17 10:22:43'),
(82, '1697539225.jpg', '2023-10-17 10:40:25', '2023-10-17 10:40:25'),
(83, '1697539307.jpg', '2023-10-17 10:41:47', '2023-10-17 10:41:47'),
(84, '1697539659.jpg', '2023-10-17 10:47:39', '2023-10-17 10:47:39'),
(85, '1697540024.jpeg', '2023-10-17 10:53:44', '2023-10-17 10:53:44'),
(86, '1697540211.jpeg', '2023-10-17 10:56:51', '2023-10-17 10:56:51'),
(87, '1697540537.jpeg', '2023-10-17 11:02:17', '2023-10-17 11:02:17'),
(88, '1697540630.jpg', '2023-10-17 11:03:50', '2023-10-17 11:03:50'),
(89, '1697540724.jpg', '2023-10-17 11:05:24', '2023-10-17 11:05:24'),
(90, '1697540927.jpg', '2023-10-17 11:08:47', '2023-10-17 11:08:47'),
(91, '1697541005.png', '2023-10-17 11:10:05', '2023-10-17 11:10:05'),
(92, '1697541182.jpeg', '2023-10-17 11:13:02', '2023-10-17 11:13:02'),
(93, '1697541229.png', '2023-10-17 11:13:49', '2023-10-17 11:13:49'),
(94, '1697541305.png', '2023-10-17 11:15:05', '2023-10-17 11:15:05'),
(95, '1697541435.jpeg', '2023-10-17 11:17:15', '2023-10-17 11:17:15'),
(96, '1697541703.png', '2023-10-17 11:21:43', '2023-10-17 11:21:43'),
(97, '1697541752.png', '2023-10-17 11:22:32', '2023-10-17 11:22:32'),
(98, '1697541814.png', '2023-10-17 11:23:34', '2023-10-17 11:23:34'),
(99, '1697541925.png', '2023-10-17 11:25:25', '2023-10-17 11:25:25'),
(100, '1697542582.jpeg', '2023-10-17 11:36:22', '2023-10-17 11:36:22'),
(101, '1697542594.jpeg', '2023-10-17 11:36:34', '2023-10-17 11:36:34'),
(102, '1697542690.jpeg', '2023-10-17 11:38:10', '2023-10-17 11:38:10'),
(103, '1697543146.png', '2023-10-17 11:45:46', '2023-10-17 11:45:46'),
(104, '1697543265.png', '2023-10-17 11:47:45', '2023-10-17 11:47:45'),
(105, '1697543490.jpeg', '2023-10-17 11:51:30', '2023-10-17 11:51:30'),
(106, '1697543584.png', '2023-10-17 11:53:04', '2023-10-17 11:53:04'),
(107, '1697543764.png', '2023-10-17 11:56:04', '2023-10-17 11:56:04'),
(108, '1697544370.jpeg', '2023-10-17 12:06:10', '2023-10-17 12:06:10'),
(109, '1697544425.png', '2023-10-17 12:07:05', '2023-10-17 12:07:05'),
(110, '1697544466.png', '2023-10-17 12:07:46', '2023-10-17 12:07:46'),
(111, '1697545193.jpeg', '2023-10-17 12:19:53', '2023-10-17 12:19:53'),
(112, '1697545341.jpeg', '2023-10-17 12:22:21', '2023-10-17 12:22:21'),
(113, '1697545357.jpeg', '2023-10-17 12:22:37', '2023-10-17 12:22:37'),
(114, '1697549483.png', '2023-10-17 13:31:23', '2023-10-17 13:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Vaibhav Nikam', 'manufacturer@gmail.com', '9730213456', 2, 1, NULL, '$2y$10$MVKRP3lYAcVr2DaUnhP.N.Up9WC3B4ht0/McpnM/cF28pbkhWZTua', NULL, '2023-09-10 08:09:16', '2023-10-19 11:47:54'),
(19, 'Shivam Singh', 'superadmin@gmail.com', '8080303822', 1, 1, NULL, '$2y$10$MVKRP3lYAcVr2DaUnhP.N.Up9WC3B4ht0/McpnM/cF28pbkhWZTua', NULL, '2023-10-19 10:34:54', '2023-11-06 12:41:12'),
(20, 'Shubham Pande', 'enduser@gmail.com', '1234567890', 4, 1, NULL, '$2y$10$MVKRP3lYAcVr2DaUnhP.N.Up9WC3B4ht0/McpnM/cF28pbkhWZTua', NULL, '2024-10-08 12:29:03', '2024-10-15 02:49:35'),
(21, 'Raw', 'rawmaterial@gmail.com', '1234567890', 3, 1, NULL, '$2y$10$MVKRP3lYAcVr2DaUnhP.N.Up9WC3B4ht0/McpnM/cF28pbkhWZTua', NULL, '2024-10-08 14:02:58', '2024-10-08 14:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `whishlists`
--

CREATE TABLE `whishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whishlists`
--

INSERT INTO `whishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(10, 20, 54, '2024-10-16 04:10:00', '2024-10-16 04:10:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_user_id_foreign` (`user_id`),
  ADD KEY `customer_addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_coupons_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`),
  ADD KEY `orders_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `temp_images`
--
ALTER TABLE `temp_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whishlists`
--
ALTER TABLE `whishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `whishlists_user_id_foreign` (`user_id`),
  ADD KEY `whishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `whishlists`
--
ALTER TABLE `whishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD CONSTRAINT `discount_coupons_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `whishlists`
--
ALTER TABLE `whishlists`
  ADD CONSTRAINT `whishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `whishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
