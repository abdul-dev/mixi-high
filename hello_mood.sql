-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2024 at 12:38 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hello_mood`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` bigint DEFAULT NULL,
  `context` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `file_name`, `type`, `object`, `object_id`, `context`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '65e0b601a9ea1_1.jpeg', '65e0b601a9ea1_1.jpeg', '', 'Category', 1, 'category-image', NULL, '2024-02-29 11:51:13', '2024-02-29 11:51:13'),
(2, '65e0b62baeb80_2.jpeg', '65e0b62baeb80_2.jpeg', '', 'Category', 2, 'category-image', NULL, '2024-02-29 11:51:55', '2024-02-29 11:51:55'),
(3, '2NiTxNIb1t_65e5fd7dd90d7.jpg', '2NiTxNIb1t_65e5fd7dd90d7.jpg', '', 'Product', 3, 'product-image', NULL, '2024-03-04 11:57:33', '2024-03-04 11:57:33'),
(4, 'IMG-20240220-WA0017_65e5fd7dddd5c.jpg', 'IMG-20240220-WA0017_65e5fd7dddd5c.jpg', '', 'Product', 3, 'product-image', NULL, '2024-03-04 11:57:33', '2024-03-04 11:57:33'),
(5, 'WhatsApp Image 2024-01-01 at 22.20.18_b4e53621_65e60377eeac1.jpg', 'WhatsApp Image 2024-01-01 at 22.20.18_b4e53621_65e60377eeac1.jpg', '', 'Product', 3, 'product-image', '2024-03-04 12:41:45', '2024-03-04 12:23:03', '2024-03-04 12:41:45'),
(6, 'IMG-20240217-WA0007_65e603ff66f4c.jpg', 'IMG-20240217-WA0007_65e603ff66f4c.jpg', '', 'Product', 3, 'product-image', NULL, '2024-03-04 12:25:19', '2024-03-04 12:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

DROP TABLE IF EXISTS `bank_accounts`;
CREATE TABLE IF NOT EXISTS `bank_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `account_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routing_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_log` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_accounts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `account_holder_name`, `routing_number`, `account_number`, `stripe_log`, `created_at`, `updated_at`) VALUES
(1, 1, 'TEst', '110000000', '000123456789', 'success', '2024-04-16 01:46:14', '2024-04-11 20:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `short_name`, `code`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Flower', NULL, NULL, 'Flower', '2024-02-29 11:51:13', '2024-02-29 11:51:13'),
(2, 'Gummies', NULL, NULL, 'Gummies', '2024-02-29 11:51:55', '2024-02-29 11:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `iso` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nice_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_code` smallint DEFAULT NULL,
  `phone_code` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=254 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nice_name`, `iso3`, `num_code`, `phone_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93, NULL, NULL, NULL),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355, NULL, NULL, NULL),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213, NULL, NULL, NULL),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684, NULL, NULL, NULL),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376, NULL, NULL, NULL),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244, NULL, NULL, NULL),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264, NULL, NULL, NULL),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0, NULL, NULL, NULL),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268, NULL, NULL, NULL),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54, NULL, NULL, NULL),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374, NULL, NULL, NULL),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297, NULL, NULL, NULL),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61, NULL, NULL, NULL),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43, NULL, NULL, NULL),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994, NULL, NULL, NULL),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242, NULL, NULL, NULL),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973, NULL, NULL, NULL),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880, NULL, NULL, NULL),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246, NULL, NULL, NULL),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375, NULL, NULL, NULL),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32, NULL, NULL, NULL),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501, NULL, NULL, NULL),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229, NULL, NULL, NULL),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441, NULL, NULL, NULL),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975, NULL, NULL, NULL),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591, NULL, NULL, NULL),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387, NULL, NULL, NULL),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267, NULL, NULL, NULL),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0, NULL, NULL, NULL),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55, NULL, NULL, NULL),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246, NULL, NULL, NULL),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673, NULL, NULL, NULL),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359, NULL, NULL, NULL),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226, NULL, NULL, NULL),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257, NULL, NULL, NULL),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855, NULL, NULL, NULL),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237, NULL, NULL, NULL),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1, NULL, NULL, NULL),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238, NULL, NULL, NULL),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345, NULL, NULL, NULL),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236, NULL, NULL, NULL),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235, NULL, NULL, NULL),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56, NULL, NULL, NULL),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86, NULL, NULL, NULL),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61, NULL, NULL, NULL),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672, NULL, NULL, NULL),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57, NULL, NULL, NULL),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269, NULL, NULL, NULL),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242, NULL, NULL, NULL),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242, NULL, NULL, NULL),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682, NULL, NULL, NULL),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506, NULL, NULL, NULL),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225, NULL, NULL, NULL),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385, NULL, NULL, NULL),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53, NULL, NULL, NULL),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357, NULL, NULL, NULL),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420, NULL, NULL, NULL),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45, NULL, NULL, NULL),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253, NULL, NULL, NULL),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767, NULL, NULL, NULL),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809, NULL, NULL, NULL),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593, NULL, NULL, NULL),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20, NULL, NULL, NULL),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503, NULL, NULL, NULL),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240, NULL, NULL, NULL),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291, NULL, NULL, NULL),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372, NULL, NULL, NULL),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251, NULL, NULL, NULL),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, NULL, NULL, NULL),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298, NULL, NULL, NULL),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679, NULL, NULL, NULL),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358, NULL, NULL, NULL),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33, NULL, NULL, NULL),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594, NULL, NULL, NULL),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689, NULL, NULL, NULL),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0, NULL, NULL, NULL),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241, NULL, NULL, NULL),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220, NULL, NULL, NULL),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995, NULL, NULL, NULL),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49, NULL, NULL, NULL),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233, NULL, NULL, NULL),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350, NULL, NULL, NULL),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30, NULL, NULL, NULL),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299, NULL, NULL, NULL),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473, NULL, NULL, NULL),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590, NULL, NULL, NULL),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671, NULL, NULL, NULL),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502, NULL, NULL, NULL),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224, NULL, NULL, NULL),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245, NULL, NULL, NULL),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592, NULL, NULL, NULL),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509, NULL, NULL, NULL),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0, NULL, NULL, NULL),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39, NULL, NULL, NULL),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504, NULL, NULL, NULL),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852, NULL, NULL, NULL),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36, NULL, NULL, NULL),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354, NULL, NULL, NULL),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91, NULL, NULL, NULL),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62, NULL, NULL, NULL),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98, NULL, NULL, NULL),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964, NULL, NULL, NULL),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353, NULL, NULL, NULL),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972, NULL, NULL, NULL),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39, NULL, NULL, NULL),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876, NULL, NULL, NULL),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81, NULL, NULL, NULL),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962, NULL, NULL, NULL),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7, NULL, NULL, NULL),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254, NULL, NULL, NULL),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686, NULL, NULL, NULL),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850, NULL, NULL, NULL),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82, NULL, NULL, NULL),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965, NULL, NULL, NULL),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996, NULL, NULL, NULL),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856, NULL, NULL, NULL),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371, NULL, NULL, NULL),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961, NULL, NULL, NULL),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266, NULL, NULL, NULL),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231, NULL, NULL, NULL),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, NULL, NULL, NULL),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423, NULL, NULL, NULL),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370, NULL, NULL, NULL),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352, NULL, NULL, NULL),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853, NULL, NULL, NULL),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389, NULL, NULL, NULL),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261, NULL, NULL, NULL),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265, NULL, NULL, NULL),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60, NULL, NULL, NULL),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960, NULL, NULL, NULL),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223, NULL, NULL, NULL),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356, NULL, NULL, NULL),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692, NULL, NULL, NULL),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596, NULL, NULL, NULL),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222, NULL, NULL, NULL),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230, NULL, NULL, NULL),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269, NULL, NULL, NULL),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52, NULL, NULL, NULL),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691, NULL, NULL, NULL),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373, NULL, NULL, NULL),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377, NULL, NULL, NULL),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976, NULL, NULL, NULL),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664, NULL, NULL, NULL),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212, NULL, NULL, NULL),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258, NULL, NULL, NULL),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95, NULL, NULL, NULL),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264, NULL, NULL, NULL),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674, NULL, NULL, NULL),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977, NULL, NULL, NULL),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31, NULL, NULL, NULL),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599, NULL, NULL, NULL),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687, NULL, NULL, NULL),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64, NULL, NULL, NULL),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505, NULL, NULL, NULL),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227, NULL, NULL, NULL),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234, NULL, NULL, NULL),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683, NULL, NULL, NULL),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672, NULL, NULL, NULL),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670, NULL, NULL, NULL),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47, NULL, NULL, NULL),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968, NULL, NULL, NULL),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92, NULL, NULL, NULL),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680, NULL, NULL, NULL),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970, NULL, NULL, NULL),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507, NULL, NULL, NULL),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675, NULL, NULL, NULL),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595, NULL, NULL, NULL),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51, NULL, NULL, NULL),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63, NULL, NULL, NULL),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0, NULL, NULL, NULL),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48, NULL, NULL, NULL),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351, NULL, NULL, NULL),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787, NULL, NULL, NULL),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974, NULL, NULL, NULL),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262, NULL, NULL, NULL),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40, NULL, NULL, NULL),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70, NULL, NULL, NULL),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250, NULL, NULL, NULL),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290, NULL, NULL, NULL),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869, NULL, NULL, NULL),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758, NULL, NULL, NULL),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508, NULL, NULL, NULL),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, NULL, NULL, NULL),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684, NULL, NULL, NULL),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378, NULL, NULL, NULL),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239, NULL, NULL, NULL),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966, NULL, NULL, NULL),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221, NULL, NULL, NULL),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381, NULL, NULL, NULL),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248, NULL, NULL, NULL),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232, NULL, NULL, NULL),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65, NULL, NULL, NULL),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421, NULL, NULL, NULL),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386, NULL, NULL, NULL),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677, NULL, NULL, NULL),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252, NULL, NULL, NULL),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27, NULL, NULL, NULL),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0, NULL, NULL, NULL),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34, NULL, NULL, NULL),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94, NULL, NULL, NULL),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249, NULL, NULL, NULL),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597, NULL, NULL, NULL),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47, NULL, NULL, NULL),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268, NULL, NULL, NULL),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46, NULL, NULL, NULL),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41, NULL, NULL, NULL),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963, NULL, NULL, NULL),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886, NULL, NULL, NULL),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992, NULL, NULL, NULL),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255, NULL, NULL, NULL),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66, NULL, NULL, NULL),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670, NULL, NULL, NULL),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228, NULL, NULL, NULL),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690, NULL, NULL, NULL),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676, NULL, NULL, NULL),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868, NULL, NULL, NULL),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216, NULL, NULL, NULL),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90, NULL, NULL, NULL),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370, NULL, NULL, NULL),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649, NULL, NULL, NULL),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688, NULL, NULL, NULL),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256, NULL, NULL, NULL),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380, NULL, NULL, NULL),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971, NULL, NULL, NULL),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44, NULL, NULL, NULL),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1, NULL, NULL, NULL),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1, NULL, NULL, NULL),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598, NULL, NULL, NULL),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998, NULL, NULL, NULL),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678, NULL, NULL, NULL),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58, NULL, NULL, NULL),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84, NULL, NULL, NULL),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284, NULL, NULL, NULL),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340, NULL, NULL, NULL),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681, NULL, NULL, NULL),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212, NULL, NULL, NULL),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967, NULL, NULL, NULL),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260, NULL, NULL, NULL),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263, NULL, NULL, NULL),
(240, 'RS', 'SERBIA', 'Serbia', 'SRB', 688, 381, NULL, NULL, NULL),
(241, 'AP', 'ASIA PACIFIC REGION', 'Asia / Pacific Region', '0', 0, 0, NULL, NULL, NULL),
(242, 'ME', 'MONTENEGRO', 'Montenegro', 'MNE', 499, 382, NULL, NULL, NULL),
(243, 'AX', 'ALAND ISLANDS', 'Aland Islands', 'ALA', 248, 358, NULL, NULL, NULL),
(244, 'BQ', 'BONAIRE, SINT EUSTATIUS AND SABA', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 599, NULL, NULL, NULL),
(245, 'CW', 'CURACAO', 'Curacao', 'CUW', 531, 599, NULL, NULL, NULL),
(246, 'GG', 'GUERNSEY', 'Guernsey', 'GGY', 831, 44, NULL, NULL, NULL),
(247, 'IM', 'ISLE OF MAN', 'Isle of Man', 'IMN', 833, 44, NULL, NULL, NULL),
(248, 'JE', 'JERSEY', 'Jersey', 'JEY', 832, 44, NULL, NULL, NULL),
(249, 'XK', 'KOSOVO', 'Kosovo', '---', 0, 381, NULL, NULL, NULL),
(250, 'BL', 'SAINT BARTHELEMY', 'Saint Barthelemy', 'BLM', 652, 590, NULL, NULL, NULL),
(251, 'MF', 'SAINT MARTIN', 'Saint Martin', 'MAF', 663, 590, NULL, NULL, NULL),
(252, 'SX', 'SINT MAARTEN', 'Sint Maarten', 'SXM', 534, 1, NULL, NULL, NULL),
(253, 'SS', 'SOUTH SUDAN', 'South Sudan', 'SSD', 728, 211, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_05_20_123420_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_29_122214_create_attachments_table', 1),
(7, '2023_05_20_124250_create_countries_table', 1),
(8, '2023_08_18_091107_create_offices_table', 1),
(9, '2023_08_19_112142_create_schools_table', 1),
(10, '2023_08_19_123710_create_airports_table', 1),
(11, '2023_08_28_075136_create_students_table', 1),
(12, '2023_08_28_081238_create_programs_table', 1),
(13, '2023_08_28_081514_create_host_families_table', 1),
(14, '2023_08_28_083056_create_local_coordinators_table', 1),
(15, '2023_08_28_083309_create_partner_abroads_table', 1),
(16, '2023_11_17_124136_create_menus_table', 1),
(17, '2023_11_17_124204_create_role_permissions_table', 1),
(18, '2024_01_12_124814_create_settings_table', 1),
(19, '2024_02_18_152020_create_categories_table', 1),
(20, '2024_02_18_152111_create_unit_measures_table', 1),
(21, '2024_02_18_152112_create_products_table', 1),
(22, '2024_02_18_152140_create_product_tags_table', 1),
(23, '2024_02_20_021203_create_product_attributes_table', 1),
(24, '2024_02_20_021218_create_product_details_table', 1),
(25, '2024_02_20_023132_create_tags_table', 1),
(26, '2024_02_25_145701_create_product_reviews_table', 2),
(30, '2024_03_13_103207_create_states_table', 3),
(29, '2024_03_12_161443_create_orders_table', 3),
(31, '2024_03_13_103345_create_user_delivery_addresses_table', 3),
(32, '2024_03_13_163844_create_order_details_table', 3),
(34, '2024_03_18_144909_create_payment_methods_table', 4),
(35, '2024_03_29_163510_create_bank_accounts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_delivery_address_id` bigint DEFAULT NULL,
  `sub_total` decimal(9,2) NOT NULL DEFAULT '0.00',
  `total` decimal(9,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(9,2) NOT NULL DEFAULT '0.00',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `shipping` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FREE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_delivery_address_id`, `sub_total`, `total`, `tax`, `status`, `shipping`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:45:27', '2024-04-11 20:45:27'),
(2, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:47:06', '2024-04-11 20:47:06'),
(3, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:48:23', '2024-04-11 20:48:23'),
(4, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:48:33', '2024-04-11 20:48:33'),
(5, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:48:40', '2024-04-11 20:48:40'),
(6, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:48:49', '2024-04-11 20:48:49'),
(7, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:48:56', '2024-04-11 20:48:56'),
(8, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:49:02', '2024-04-11 20:49:02'),
(9, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:52:38', '2024-04-11 20:52:38'),
(10, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:53:24', '2024-04-11 20:53:24'),
(11, 1, 1, '0.00', '0.00', '0.00', 'PENDING', 'FREE', '2024-04-11 20:53:58', '2024-04-11 20:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_detail_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `total_amount` decimal(9,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  KEY `order_details_product_detail_id_foreign` (`product_detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_detail_id`, `qty`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, 5, '0.00', '2024-04-11 20:45:27', '2024-04-11 20:45:27'),
(2, 1, 2, 15, 6, '0.00', '2024-04-11 20:45:27', '2024-04-11 20:45:27'),
(3, 2, 1, 20, 5, '0.00', '2024-04-11 20:47:06', '2024-04-11 20:47:06'),
(4, 2, 2, 15, 6, '0.00', '2024-04-11 20:47:06', '2024-04-11 20:47:06'),
(5, 3, 1, 20, 5, '0.00', '2024-04-11 20:48:23', '2024-04-11 20:48:23'),
(6, 3, 2, 15, 6, '0.00', '2024-04-11 20:48:23', '2024-04-11 20:48:23'),
(7, 4, 1, 20, 5, '0.00', '2024-04-11 20:48:33', '2024-04-11 20:48:33'),
(8, 4, 2, 15, 6, '0.00', '2024-04-11 20:48:33', '2024-04-11 20:48:33'),
(9, 5, 1, 20, 5, '0.00', '2024-04-11 20:48:40', '2024-04-11 20:48:40'),
(10, 5, 2, 15, 6, '0.00', '2024-04-11 20:48:40', '2024-04-11 20:48:40'),
(11, 6, 1, 20, 5, '0.00', '2024-04-11 20:48:49', '2024-04-11 20:48:49'),
(12, 6, 2, 15, 6, '0.00', '2024-04-11 20:48:49', '2024-04-11 20:48:49'),
(13, 7, 1, 20, 5, '0.00', '2024-04-11 20:48:56', '2024-04-11 20:48:56'),
(14, 7, 2, 15, 6, '0.00', '2024-04-11 20:48:56', '2024-04-11 20:48:56'),
(15, 8, 1, 20, 5, '0.00', '2024-04-11 20:49:02', '2024-04-11 20:49:02'),
(16, 8, 2, 15, 6, '0.00', '2024-04-11 20:49:02', '2024-04-11 20:49:02'),
(17, 9, 1, 20, 5, '0.00', '2024-04-11 20:52:38', '2024-04-11 20:52:38'),
(18, 9, 2, 15, 6, '0.00', '2024-04-11 20:52:38', '2024-04-11 20:52:38'),
(19, 10, 1, 20, 5, '0.00', '2024-04-11 20:53:24', '2024-04-11 20:53:24'),
(20, 10, 2, 15, 6, '0.00', '2024-04-11 20:53:24', '2024-04-11 20:53:24'),
(21, 11, 1, 20, 5, '0.00', '2024-04-11 20:53:58', '2024-04-11 20:53:58'),
(22, 11, 2, 15, 6, '0.00', '2024-04-11 20:53:58', '2024-04-11 20:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_card_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `priority` int DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_methods_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'users', '46bb10f0007d49d370aa653916f65cd2b56bf87e2a52754f2478776a0780cfad', '[\"*\"]', '2024-04-02 19:58:26', '2024-02-22 06:34:01', '2024-04-02 19:58:26'),
(2, 'App\\Models\\User', 1, 'users', 'ac1b95f65b280735178436c2f110cf3ef68813dcc4bde898a093ce2704075fcd', '[\"*\"]', NULL, '2024-02-22 09:37:39', '2024-02-22 09:37:39'),
(3, 'App\\Models\\User', 1, 'users', '022754eb72ec88d053b143c49be690ae18b3ef0490af0e8cfe35b5160beb38e2', '[\"*\"]', '2024-04-11 20:42:54', '2024-04-11 20:42:31', '2024-04-11 20:42:54'),
(4, 'App\\Models\\User', 1, 'users', '009ed0842983d2af4aea5cf349549aa247820c7ba15ef5cd2dd9bfced24d8aad', '[\"*\"]', '2024-04-11 20:53:58', '2024-04-11 20:45:04', '2024-04-11 20:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `unit_measure_id` bigint UNSIGNED DEFAULT NULL,
  `price` decimal(9,2) DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_unit_measure_id_foreign` (`unit_measure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `unit_measure_id`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pluto', 1, 1, '0.00', 'Unlock out-of-this-world creativity. Colorado-grown, high potency THCa flower for your best thoughts.', '2024-02-29 11:55:36', '2024-02-29 11:55:36', NULL),
(3, 'Bo Steele', 1, 2, '0.00', 'Amet ea est ea vol', '2024-03-04 11:57:33', '2024-03-04 12:46:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

DROP TABLE IF EXISTS `product_attributes`;
CREATE TABLE IF NOT EXISTS `product_attributes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_attributes_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, '21.92% THCa', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(2, 1, 'Indica Hybrid', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(3, 1, 'Pine-y', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(4, 1, 'Pesticide-Free', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(5, 1, 'American Grown', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(6, 1, '100% Federally Legal', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(7, 2, '20.63% THCa', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(8, 2, 'Indica Hybrid', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(9, 2, 'Melty & Sour', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(10, 2, 'Pesticide-Free', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(11, 2, 'American Grown', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(12, 2, '100% Federally Legal', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(48, 3, 'Ut ut ipsa iusto re', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(47, 3, 'Eiusmod nemo commodi', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(46, 3, 'Sed magnam itaque ad', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(45, 3, 'Dolores non aut quib', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(44, 3, 'Lorem voluptatem des', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(43, 3, 'Tempor voluptas dolo', '2024-03-04 12:50:07', '2024-03-04 12:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int DEFAULT '0',
  `unit_price` decimal(9,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_details_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '17.00', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(2, 1, 4, '15.00', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(3, 1, 7, '13.99', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(4, 1, 14, '12.70', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(5, 1, 28, '10.50', '2024-02-29 11:55:36', '2024-02-29 11:55:36'),
(6, 2, 1, '15.00', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(7, 2, 4, '15.00', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(8, 2, 7, '13.28', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(9, 2, 14, '11.43', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(10, 2, 28, '10.40', '2024-02-29 11:57:51', '2024-02-29 11:57:51'),
(46, 3, 898, '894.00', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(45, 3, 277, '974.00', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(44, 3, 952, '990.00', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(43, 3, 172, '452.00', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(42, 3, 810, '801.00', '2024-03-04 12:50:07', '2024-03-04 12:50:07'),
(41, 3, 213, '296.00', '2024-03-04 12:50:07', '2024-03-04 12:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_description` text COLLATE utf8mb4_unicode_ci,
  `rating` int NOT NULL DEFAULT '0',
  `enjoyment_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `user_id`, `title`, `username`, `email`, `review_description`, `rating`, `enjoyment_level`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'test', 'review test', 'test@gmail.com', 'review description', 3, 'very_good', '2024-02-26 09:52:30', '2024-02-26 09:52:30'),
(2, 3, NULL, 'test', 'review test', 'test@gmail.com', 'review description', 3, 'very_good', '2024-03-06 00:22:08', '2024-03-06 00:22:08'),
(3, 3, NULL, 'test', 'review test', 'test@gmail.com', 'review description', 3, 'very_good', '2024-03-06 00:29:46', '2024-03-06 00:29:46'),
(4, 3, NULL, 'test', 'review test', 'test@gmail.com', 'review description', 5, 'very_good', '2024-03-06 00:30:02', '2024-03-06 00:30:02'),
(5, 1, 1, 'test', 'test', 'test@gmail.com', 'review description', 3, 'very_good', '2024-04-02 19:58:26', '2024-04-02 19:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

DROP TABLE IF EXISTS `product_tags`;
CREATE TABLE IF NOT EXISTS `product_tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `tag_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_tags_product_id_foreign` (`product_id`),
  KEY `product_tags_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2024-02-29 11:55:36', '2024-02-29 11:55:36', NULL),
(2, 1, 2, '2024-02-29 11:55:36', '2024-02-29 11:55:36', NULL),
(3, 2, 1, '2024-02-29 11:57:51', '2024-02-29 11:57:51', NULL),
(4, 2, 2, '2024-02-29 11:57:51', '2024-02-29 11:57:51', NULL),
(8, 3, 2, '2024-03-04 12:50:07', '2024-03-04 12:50:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `code`, `notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'Super Admin', NULL, '2024-02-22 06:31:25', '2024-02-22 06:31:25'),
(2, 'Office manager', 'office_manager', 'Office manager', NULL, '2024-02-22 06:31:25', '2024-02-22 06:31:25'),
(3, 'Office assistant', 'office_assistant', 'Office assistant', NULL, '2024-02-22 06:31:25', '2024-02-22 06:31:25'),
(4, 'Local Coordinator', 'local_coordinator', 'Local Coordinator', NULL, '2024-02-22 06:31:25', '2024-02-22 06:31:25'),
(5, 'Office', 'office', 'Office', NULL, '2024-02-22 06:31:25', '2024-02-22 06:31:25'),
(6, 'Student', 'student', 'Student', NULL, '2024-02-22 06:31:25', '2024-02-22 06:31:25'),
(7, 'Partner Abroad', 'partner_abroad', 'Partner Abroad', NULL, '2024-02-22 06:31:25', '2024-02-22 06:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` bigint UNSIGNED DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `can_add` tinyint(1) NOT NULL DEFAULT '1',
  `can_view` tinyint(1) NOT NULL DEFAULT '1',
  `can_edit` tinyint(1) NOT NULL DEFAULT '1',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permissions_menu_id_foreign` (`menu_id`),
  KEY `role_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'business_thumbnail', 'thumbnail-1709575636.jpg', '2024-03-04 12:53:15', '2024-03-04 13:07:16'),
(2, 'business_name', 'Chandler Buckley', '2024-03-04 12:53:15', '2024-03-04 13:06:51'),
(3, 'business_email', 'mane@mailinator.com', '2024-03-04 12:53:15', '2024-03-04 13:06:51'),
(4, 'business_phone', '+1 (777) 724-6101', '2024-03-04 12:53:15', '2024-03-04 13:06:51'),
(5, 'business_website', 'https://www.cyvogovadi.biz', '2024-03-04 12:53:15', '2024-03-04 13:06:51'),
(6, 'business_industry', 'fashion', '2024-03-04 12:53:15', '2024-03-04 13:06:51'),
(7, 'business_currency_id', '1', '2024-03-04 12:53:15', '2024-03-04 12:53:15'),
(8, 'business_timezone_id', '1', '2024-03-04 12:55:06', '2024-03-04 12:55:06'),
(9, 'business_country_id', '36', '2024-03-04 12:55:17', '2024-03-04 13:06:51'),
(10, 'business_address', 'Non ut molestias qui', '2024-03-04 12:55:17', '2024-03-04 13:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Alabama', 'AL', '2023-12-08 02:28:54', NULL),
(2, 'Alaska', 'AK', '2023-12-08 02:28:54', NULL),
(3, 'Arizona', 'AZ', '2023-12-08 02:28:54', NULL),
(4, 'Arkansas', 'AR', '2023-12-08 02:28:54', NULL),
(5, 'California', 'CA', '2023-12-08 02:28:54', NULL),
(6, 'Colorado', 'CO', '2023-12-08 02:28:54', NULL),
(7, 'Connecticut', 'CT', '2023-12-08 02:28:54', NULL),
(8, 'Delaware', 'DE', '2023-12-08 02:28:54', NULL),
(9, 'District of Columbia', 'DC', '2023-12-08 02:28:54', NULL),
(10, 'Florida', 'FL', '2023-12-08 02:28:54', NULL),
(11, 'Georgia', 'GA', '2023-12-08 02:28:54', NULL),
(12, 'Hawaii', 'HI', '2023-12-08 02:28:54', NULL),
(13, 'Idaho', 'ID', '2023-12-08 02:28:54', NULL),
(14, 'Illinois', 'IL', '2023-12-08 02:28:54', NULL),
(15, 'Indiana', 'IN', '2023-12-08 02:28:54', NULL),
(16, 'Iowa', 'IA', '2023-12-08 02:28:54', NULL),
(17, 'Kansas', 'KS', '2023-12-08 02:28:54', NULL),
(18, 'Kentucky', 'KY', '2023-12-08 02:28:54', NULL),
(19, 'Louisiana', 'LA', '2023-12-08 02:28:54', NULL),
(20, 'Maine', 'ME', '2023-12-08 02:28:54', NULL),
(21, 'Maryland', 'MD', '2023-12-08 02:28:54', NULL),
(22, 'Massachusetts', 'MA', '2023-12-08 02:28:54', NULL),
(23, 'Michigan', 'MI', '2023-12-08 02:28:54', NULL),
(24, 'Minnesota', 'MN', '2023-12-08 02:28:54', NULL),
(25, 'Mississippi', 'MS', '2023-12-08 02:28:54', NULL),
(26, 'Missouri', 'MO', '2023-12-08 02:28:54', NULL),
(27, 'Montana', 'MT', '2023-12-08 02:28:54', NULL),
(28, 'Nebraska', 'NE', '2023-12-08 02:28:54', NULL),
(29, 'Nevada', 'NV', '2023-12-08 02:28:54', NULL),
(30, 'New Hampshire', 'NH', '2023-12-08 02:28:54', NULL),
(31, 'New Jersey', 'NJ', '2023-12-08 02:28:54', NULL),
(32, 'New Mexico', 'NM', '2023-12-08 02:28:54', NULL),
(33, 'New York', 'NY', '2023-12-08 02:28:54', NULL),
(34, 'North Carolina', 'NC', '2023-12-08 02:28:54', NULL),
(35, 'North Dakota', 'ND', '2023-12-08 02:28:54', NULL),
(36, 'Ohio', 'OH', '2023-12-08 02:28:54', NULL),
(37, 'Oklahoma', 'OK', '2023-12-08 02:28:54', NULL),
(38, 'Oregon', 'OR', '2023-12-08 02:28:54', NULL),
(39, 'Pennsylvania', 'PA', '2023-12-08 02:28:54', NULL),
(40, 'Rhode Island', 'RI', '2023-12-08 02:28:54', NULL),
(41, 'South Carolina', 'SC', '2023-12-08 02:28:54', NULL),
(42, 'South Dakota', 'SD', '2023-12-08 02:28:54', NULL),
(43, 'Tennessee', 'TN', '2023-12-08 02:28:54', NULL),
(44, 'Texas', 'TX', '2023-12-08 02:28:54', NULL),
(45, 'Utah', 'UT', '2023-12-08 02:28:54', NULL),
(46, 'Vermont', 'VT', '2023-12-08 02:28:54', NULL),
(47, 'Virginia', 'VA', '2023-12-08 02:28:54', NULL),
(48, 'Washington', 'WA', '2023-12-08 02:28:54', NULL),
(49, 'West Virginia', 'WV', '2023-12-08 02:28:54', NULL),
(50, 'Wisconsin', 'WI', '2023-12-08 02:28:54', NULL),
(51, 'Wyoming', 'WY', '2023-12-08 02:28:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `code`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Creative', NULL, NULL, '2024-02-29 11:52:52', '2024-02-29 11:53:05'),
(2, 'High', NULL, NULL, '2024-02-29 11:53:13', '2024-02-29 11:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `unit_measures`
--

DROP TABLE IF EXISTS `unit_measures`;
CREATE TABLE IF NOT EXISTS `unit_measures` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_measures`
--

INSERT INTO `unit_measures` (`id`, `name`, `is_default`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KG', 0, 'KG', '2024-02-29 11:52:10', '2024-02-29 11:52:10', NULL),
(2, 'Pieces', 0, 'Pieces', '2024-02-29 11:52:21', '2024-02-29 11:52:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `reset_password_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_verified` tinyint(1) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `image`, `phone`, `address`, `city`, `state`, `gender`, `fax`, `stripe_customer_id`, `customer_card_id`, `notes`, `reset_password_token`, `email_verified_at`, `is_active`, `is_verified`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test@gmail.com', '$2y$10$dW5FYx/t0zTFgAMc7x84TOC8R8W2R/TM6zppz3H09hAwxWLgImzyC', NULL, '23234234', 'fssdfsdfd', NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, '2024-03-17 09:22:38'),
(2, 1, 'Lawrence Osborn', 'mulizy@mailinator.com', '$2y$10$Px9iHI3pd9OAm3BrIsrmI.3FjlqXqB13HbH6JaRDMwaPwEtctDf.u', NULL, '+1 (516) 434-8272', 'Id facere facilis pl', NULL, NULL, NULL, NULL, NULL, NULL, 'In beatae sit in vo', NULL, NULL, 1, 0, NULL, NULL, '2024-05-03 11:54:44', '2024-05-03 11:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_delivery_addresses`
--

DROP TABLE IF EXISTS `user_delivery_addresses`;
CREATE TABLE IF NOT EXISTS `user_delivery_addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `state_id` bigint UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_delivery_addresses_user_id_foreign` (`user_id`),
  KEY `user_delivery_addresses_state_id_foreign` (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_delivery_addresses`
--

INSERT INTO `user_delivery_addresses` (`id`, `user_id`, `state_id`, `first_name`, `last_name`, `phone`, `company_name`, `street_address`, `address_detail`, `zip_code`, `city`, `is_default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'fsd', 'fsd', '090435', 'company', 'test', 'sd', '38000', 'fsd', 1, '2024-04-02 19:56:56', '2024-04-02 19:57:10', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
