-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2023 at 09:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fasttechshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hp', 'hp', 1, '2023-09-10 08:53:16', '2023-09-10 08:53:16'),
(2, 'Dell', 'dell', 1, '2023-09-10 08:53:24', '2023-09-10 08:53:24'),
(3, 'Apple', 'apple', 1, '2023-09-10 08:53:35', '2023-09-10 08:53:35'),
(4, 'Android', 'android', 1, '2023-09-10 08:53:44', '2023-09-10 08:53:44'),
(5, 'Asus', 'asus', 1, '2023-09-10 11:16:55', '2023-09-10 11:16:55'),
(6, 'Acer', 'acer', 1, '2023-09-10 11:46:26', '2023-09-10 11:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `showHome` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `showHome`, `created_at`, `updated_at`) VALUES
(3, 'Laptops', 'Laptops', '1697563355_fq3.jpg', 1, 'Yes', '2023-09-10 08:28:37', '2023-10-17 11:52:35'),
(4, 'Mobiles', 'Mobiles', '1697563273_download (1).jpeg', 1, 'Yes', '2023-09-10 08:39:43', '2023-10-17 11:51:13'),
(5, 'Computers', 'Computers', '1697563252_download (2).jpeg', 1, 'Yes', '2023-09-10 08:42:35', '2023-10-17 11:50:53'),
(6, 'Printers', 'Printers', '1697563212_download.jpeg', 1, 'Yes', '2023-09-11 02:36:28', '2023-10-17 11:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Vaibhav Nikam', 'vaibhavnikam00699@gmail.com', '9730214356', 'hello', 'hello admin', '2023-09-10 13:37:46', '2023-09-10 13:37:46'),
(5, 'Rohan Ghodke', 'rohanghodke9393@gmail.com', '9322843993', 'call me', 'late order', '2023-09-10 14:30:24', '2023-09-10 14:30:24'),
(7, 'suraj jagtap', 'surajjagtap539@gmail.com', '07559297003', 'call me', 'hshssh', '2023-09-11 05:13:34', '2023-09-11 05:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `user_id`, `first_name`, `last_name`, `email`, `mobile`, `country_id`, `address`, `appartment`, `city`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mr Vaibhav', 'NIKAM', 'vaibhavnikam00699@gmail.com', '+919730214356', 100, 'Kannad\r\nKannad\" a', 'Disha Alankar a', 'Aurangabad', 'Maharashtra', '431103', '2023-09-10 09:11:31', '2023-09-19 07:47:27'),
(4, 5, 'Priyanka', 'Thate', 'priyankatathe4@gmail.com', '8330436830', 100, 'cidco cikalthana aurangabad', 'chikaltana', 'Aurangabad', 'Maharastra', '431001', '2023-09-19 07:56:32', '2023-09-19 07:56:32'),
(5, 11, 'Subham', 'Ghodke', 'ghodkeshubham2512@gmail.com', '9307858753', 100, 'Hotel VIP marata, cidco, Sambhajinagar.', NULL, 'Sambhajinagar', 'Maharashtra', '431001', '2023-10-01 08:18:00', '2023-10-01 08:18:00'),
(6, 12, 'Vaibhav', 'Nikam', 'sirsathyogita19@gmail.com', '07559297003', 100, 'Kannad\r\nKannad', NULL, 'Aurangabad', 'Maharashtra', '431103', '2023-10-05 05:45:31', '2023-10-05 05:45:31'),
(7, 14, 'girish', 'siddheshwar', 'girishsiddheshwar8055@gmail.com', '9637771841', 100, 'chh. sambhaji nagar', NULL, 'AURANGABAD', 'Maharashtra', '431103', '2023-10-15 06:05:55', '2023-10-15 06:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE `discount_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_use` int(11) DEFAULT NULL,
  `max_uses_user` int(11) DEFAULT NULL,
  `type` enum('percent','fixed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
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

INSERT INTO `discount_coupons` (`id`, `code`, `name`, `description`, `max_use`, `max_uses_user`, `type`, `discount_amount`, `min_amount`, `status`, `starts_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'DWXZ2030', 'Diwali Dhamaka', 'Diwali Dhamaka offers Order Now', 5, 1, 'percent', 10.00, 20000.00, 1, '2023-09-10 18:30:00', '2023-09-15 06:30:11', '2023-09-11 02:27:51', '2023-09-11 02:29:50'),
(2, 'FS2023', 'Navratri Special', 'Enjoy', 5, 5, 'percent', 10.00, 50000.00, 1, '2023-10-14 18:30:00', '2023-10-19 18:30:45', '2023-10-15 01:27:55', '2023-10-15 01:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(28, '2023_09_19_132939_alter_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `shipping` double(10,2) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code_id` int(11) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `grand_total` double(10,2) NOT NULL,
  `payment_status` enum('paid','not paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not paid',
  `status` enum('pending','shipped','delivered','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `shipped_date` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `shipping`, `coupon_code`, `coupon_code_id`, `discount`, `grand_total`, `payment_status`, `status`, `shipped_date`, `first_name`, `last_name`, `email`, `mobile`, `country_id`, `address`, `appartment`, `city`, `state`, `zip`, `notes`, `created_at`, `updated_at`) VALUES
(28, 1, 19490.00, 49.00, '', NULL, 0.00, 19539.00, 'not paid', 'pending', NULL, 'Mr Vaibhav', 'NIKAM', 'vaibhavnikam00699@gmail.com', '+919730214356', 100, 'Kannad\r\nKannad\" a', 'Disha Alankar a', 'Aurangabad', 'Maharashtra', '431103', NULL, '2023-10-18 02:00:04', '2023-10-18 02:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(30, 28, 28, 'hp laptop', 1, 19490.00, 19490.00, '2023-10-18 02:00:04', '2023-10-18 02:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_returns` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `related_products` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `compare_price` double(10,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_featured` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track_qty` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `qty` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `short_description`, `shipping_returns`, `related_products`, `price`, `compare_price`, `category_id`, `sub_category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(28, 'hp laptop', 'hp-laptop', '<p><br></p><p><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\">Get an HP Chromebook laptop to boost productivity and add some style to your desk. The HP intel Celeron Dual Core laptop gives a theater-like experience from the comfort of your lap thanks to speakers tuned by B&amp;O\'s audio specialists and a micro-edge HD+ touch display. Additionally, you can enjoy the dynamic speed you require to get things done thanks to an Intel Core Processor, ample storage, and up to 12-hour battery life. This laptop is a fantastic addition to your workstation since it starts up in less than ten seconds and is regularly updated to perform at its optimum.</span><br></p>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">14 Inch Full HD, IPS, Anti-Glare, Micro-Edge, </li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Brightness: 250 nits, 157 PPI, Color Gamut: 45% </li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">NTSC, Screen-to-Body Ratio: 82%</li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">Light Laptop without Optical Disk Drive</li></ul>', '<p><br></p><p><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\">Get an HP Chromebook laptop to boost productivity and add some style to your desk. The HP intel Celeron Dual Core laptop gives a theater-like experience from the comfort of your lap thanks to speakers tuned by B&amp;O\'s audio specialists and a micro-edge HD+ touch display. Additionally, you can enjoy the dynamic speed you require to get things done thanks to an Intel Core Processor, ample storage, and up to 12-hour battery life. This laptop is a fantastic addition to your workstation since it starts up in less than ten seconds and is regularly updated to perform at its optimum.</span><br></p>', '', 19490.00, 27500.00, 3, 1, 1, 'Yes', 'hp121', NULL, 'No', NULL, 1, '2023-10-18 01:57:46', '2023-10-18 01:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(70, 28, '3a5807fb-6379-4c9a-8a17-b1cd5db602ce.jpg', NULL, '2023-10-18 01:57:46', '2023-10-18 01:57:46'),
(71, 28, '9a979acc-3869-401f-b7d6-ec9fd5b296e5.jpeg', NULL, '2023-10-18 01:57:47', '2023-10-18 01:57:47'),
(72, 28, 'd2ed308d-3ad9-496f-9093-94d8eec100e1.jpeg', NULL, '2023-10-18 01:57:48', '2023-10-18 01:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, '100', 49.00, '2023-09-10 09:13:09', '2023-09-10 09:13:09'),
(2, 'rest_of_world', 999.00, '2023-09-10 09:13:28', '2023-09-10 09:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `showHome` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `status`, `showHome`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Hp', 'hp', 1, 'Yes', 3, '2023-09-10 08:48:47', '2023-09-10 08:48:47'),
(2, 'Dell', 'dell', 1, 'Yes', 3, '2023-09-10 08:49:00', '2023-09-10 08:49:00'),
(3, 'Asus', 'asus', 1, 'Yes', 3, '2023-09-10 08:49:42', '2023-09-10 08:49:42'),
(4, 'Acer', 'acer', 1, 'Yes', 3, '2023-09-10 08:49:54', '2023-09-10 08:49:54'),
(5, 'Apple', 'apple', 1, 'Yes', 3, '2023-09-10 08:50:09', '2023-09-10 08:50:09'),
(6, 'Dell', 'dell-', 1, 'Yes', 5, '2023-09-10 08:51:49', '2023-09-10 08:51:49'),
(7, 'Hp', 'hp-', 1, 'Yes', 5, '2023-09-10 08:52:02', '2023-09-10 08:52:02'),
(8, 'Android', 'android', 1, 'Yes', 4, '2023-09-10 08:52:28', '2023-09-10 08:52:28'),
(9, 'Apple', 'apple-', 1, 'Yes', 4, '2023-09-10 08:52:53', '2023-09-10 08:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(55, '1697552719.jpeg', '2023-10-17 08:55:19', '2023-10-17 08:55:19'),
(56, '1697554011.png', '2023-10-17 09:16:51', '2023-10-17 09:16:51'),
(57, '1697554409.jpeg', '2023-10-17 09:23:29', '2023-10-17 09:23:29'),
(58, '1697554426.jpeg', '2023-10-17 09:23:46', '2023-10-17 09:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vaibhav Nikam', 'vaibhavnikam00699@gmail.com', '9730214356', 1, 1, NULL, '$2y$10$6Jh4JVUt9FPLO9orboKj/e1N4pcHWztYEtqzChYh/3NIofDg5xdfq', NULL, '2023-09-10 07:56:04', '2023-09-10 07:56:04'),
(2, 'Vaibhav Nikam', 'nikamvaibhav028@gmail.com', '9730214356', 2, 1, NULL, '$2y$10$BiUt.PqDysGiD8ZZ.KyXG.B6wid49dkz7gQh1CWoPKoYrkQ8uzVbq', NULL, '2023-09-10 08:09:16', '2023-10-17 23:30:48'),
(5, 'Priya P Tathe', 'priyankatathe4@gmail.com', '898987667', 1, 0, NULL, '$2y$10$XeGUrlH3U.eAQtPYs3v0vOh7q9BCQB/8P/oXgJqit1qeTm2ak9Xt.', NULL, '2023-09-19 07:50:33', '2023-09-20 02:00:45'),
(8, 'Admin', 'admin1@gmail.com', '7657878799', 2, 1, NULL, '$2y$10$6H7rGnVjutBxRwcJmMnSj.7KIf7R3MNweV9nn3cT4F7K2l9sGrmQq', NULL, '2023-09-19 10:55:20', '2023-09-19 10:55:20'),
(9, 'Mark deo', 'mark@gmail.com', '1098892933', 1, 1, NULL, '$2y$10$AQNnlTz/YVwRXRlFgXJmtOFCfXI80MZvOlj2gmq23t20PP5U4Ow1O', NULL, '2023-09-20 02:11:12', '2023-09-20 02:11:12'),
(10, 'Tushar Nikam', 'tushar0.01@gmail.com', '9559297003', 1, 1, NULL, '$2y$10$QLPXN9jC3fgUzo0u5aebWebzaigcwpSWRZKyJ79fm6JwVInjMTU46', NULL, '2023-09-29 22:56:26', '2023-09-29 23:02:26'),
(11, 'Subham Ghodke', 'ghodkeshubham2512@gmail.com', '9307858753', 1, 1, NULL, '$2y$10$3bVIWBnvM.QXd5fWjvFfu.d4WqqTxpUHULDlhZAjMV5JcJZlJrrfy', NULL, '2023-10-01 08:12:03', '2023-10-01 08:12:03'),
(12, 'Vaibhav Nikam', 'sirsathyogita19@gmail.com', '9755643425', 1, 1, NULL, '$2y$10$PtmeB34o5pvU6qImihHHouxYH06jrf1sC5HeJhRSLCnJjtx7UXEoa', NULL, '2023-10-05 05:42:55', '2023-10-05 05:42:55'),
(13, 'Ravi aware', 'ravindraaware2017@gmai.com', '07559297003', 1, 1, NULL, '$2y$10$I1/dKwLXSA9OGh/MvxSh/uBw3mVPre3QRx35pwcMhcpVwug.0Ikvy', NULL, '2023-10-15 04:58:19', '2023-10-15 04:58:19'),
(14, 'GIRISH', 'girishsiddheshwar8055@gmail.com', '9637771841', 1, 1, NULL, '$2y$10$555r9zvGV6JUSgP4uxrBTOh/SSsIcMMCoxbeO9VJ26Wxa2h2Jeu3G', NULL, '2023-10-15 05:08:42', '2023-10-15 05:08:42'),
(15, 'suraj khandale', 'surajkhandale@gmail.com', '9730214356', 1, 1, NULL, '$2y$10$02Mjn/5ScCkVdM9Rx3yBg.69714onfcDWJjOwSEUPwqUWWYBS5LVO', NULL, '2023-10-16 05:53:18', '2023-10-16 05:53:18');

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_country_id_foreign` (`country_id`);

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
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `whishlists`
--
ALTER TABLE `whishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

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
