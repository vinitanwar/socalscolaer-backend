-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 01:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socalscoler`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisory_boards`
--

CREATE TABLE `advisory_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `about_author` text NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `news_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]' CHECK (json_valid(`news_id`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `slug`, `about_author`, `cv`, `image`, `news_id`, `created_at`, `updated_at`) VALUES
(1, 'rahul gandhi', 'rahul-gandhi', 'Dr Rohil is an accomplished academic and researcher, holding a Ph.D. in Political Science from Panjab University, Chandigarh, and bring over five years of experience in teaching, research, and academic administration. He has actively contributed to the academic community by presenting research papers at prestigious national and international platforms. His research has been published in high impact journals.\n\nHe is a regular contributor as an author to various magazines. He is also associated with various academic bodies such as the Digital Humanities Alliance for Research and Teaching Innovation (DHARTI), the International Political Science Association, Indian Political Science Association (IPSA), and the International Association for Political Science Students (IAPSS), Montreal, Canada. Recognized for his efforts in youth development and civic engagement, he has received the Swami Vivekananda Youth Award (2019) and the Rashtriya Gourav Samman (2018).\n\n', NULL, 'cvs/new-event-img1.jpg', '[]', '2025-07-03 23:35:50', '2025-07-03 23:35:50'),
(2, 'vivek', 'vivek', ' ajksdsd nwo we wc wewe', NULL, 'authors/01JZA5A5Y92DE5DJ9N2J5SRQQ4.png', '[]', '2025-07-04 01:57:15', '2025-07-04 01:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) NOT NULL,
  `blog_cat` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `blog_editor` varchar(255) NOT NULL,
  `blog_dis` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`blog_dis`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `banner`, `blog_cat`, `title`, `slug`, `blog_editor`, `blog_dis`, `created_at`, `updated_at`) VALUES
(1, '01JZCYMRSVXTKGNSPEYXZ8E3FF.webp', 'Politics', 'The Future of Sustainable Living: Driving Eco-Friendly Lifestyles', 'the-future-of-sustainable-living-driving-eco-friendly-lifestyles', 'vivek', '[{\"title\":\"_\",\"title_color\":\"#000000\",\"description\":\"<p>he started her blog exactly six months before I launched Camels &amp; Chocolate, and she really set the bar high for my own blog birthday, Y\\u2019all this summer! I\\u2019ve already been brainstorming party ideas \\u2026 who wants to come? It\\u2019s no coincidence that Buster Keaton and Charlot\\u2019s movies of the and award-winning chefs about what exactly makes their hometowns. In fact, not being able to rely on spoken word made them better storytellers. They fully understood and used the power of showing without words. A range of amenities provides many things to do in Bellevue. About 40 percent of the city\\u2019s population are minorities, which contributes to an overall diverse range of lifestyles and ideas.<\\/p><p>I talked to climbers, Olympic mountain bikers, musicians, and award-winning chefs about what exactly makes their hometowns so special and fun.<br><br><\\/p><h2>Bike paths and sidewalks make getting to and from the city\\u2019s many festivals, museums, restaurants and music venues easy...<\\/h2>\",\"image\":null,\"layout\":null},{\"title\":\"Capital of Texas\",\"title_color\":\"#e60808\",\"description\":\"<p>Visual storytelling is simply the way most brands will decide to go in 2016 &amp; beyond, as they try to tell their story to their customers...<\\/p><p>While Denver sits at the base of the Rocky Mountains, it\\u2019s not considered a mountain town since it takes at least an hour to get to the Rockies for snowboarding...<\\/p>\",\"image\":\"01JZCYMRT4FCMDT80FJB30S3WJ.webp\"},{\"title\":\"Great Schools and Entertainment\",\"title_color\":\"#0085ed\",\"description\":\"<p>Education is a high point when it comes to analyzing the quality of life factors that make Ann Arbor one of the best places to live...<\\/p><p>Great Schools and Entertainment<\\/p><p>Bike paths and sidewalks make getting to and from the city\\u2019s many festivals, museums, restaurants and music venues easy... Bike paths and sidewalks make getting to and from the city\\u2019s many festivals, museums, restaurants and music venues easy...Bike paths and sidewalks make getting to and from the city\\u2019s many festivals, museums, restaurants and music venues easy...Bike paths and sidewalks make getting to and from the city\\u2019s many festivals, museums, restaurants and music venues easy...<\\/p>\",\"image\":\"01JZCYMRT96PXZ7S7CFT0EJT5G.webp\"}]', '2025-07-05 03:58:26', '2025-07-05 05:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogtypes`
--

CREATE TABLE `blogtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogtype` varchar(255) NOT NULL,
  `blogtypeimage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogtypes`
--

INSERT INTO `blogtypes` (`id`, `blogtype`, `blogtypeimage`, `created_at`, `updated_at`) VALUES
(1, 'Politics', 'blogtypes/01JRJ6DSF9ZM88KTBCD4TG124V.webp', '2025-07-05 05:21:05', '2025-07-05 05:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1751712720),
('laravel_cache_da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1751712720;', 1751712720),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1751860953),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1751860953;', 1751860953);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `website`, `message`, `checked`, `created_at`, `updated_at`) VALUES
(1, 'vivek', 'jontypundir12@gmail.com', NULL, 'sd qwkdkqwed ed', 1, '2025-07-07 02:00:33', '2025-07-07 02:05:04'),
(2, 'jonty', 'doctorvishalgmc@gmail.com', 'qwdqw', 'd;lwemdkwemf wdcfowe dfow ef', 1, '2025-07-07 02:05:54', '2025-07-07 02:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `editorial_boards`
--

CREATE TABLE `editorial_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(6, '2025_07_03_075357_create_newstypes_table', 2),
(7, '2025_07_03_071426_create_authors_table', 3),
(8, '2025_07_03_061238_create_news_table', 4),
(9, '2025_07_04_063706_news', 5),
(10, '2025_07_04_074521_create_editorial_boards_table', 6),
(12, '2025_07_04_085911_create_personal_access_tokens_table', 6),
(13, '2025_07_05_071005_news', 6),
(14, '2025_07_05_085916_create_b_logs_table', 7),
(15, '2025_07_05_094639_create_blogtypes_table', 8),
(16, '2025_07_07_070006_create_comments_table', 9),
(17, '2025_07_04_074535_create_advisory_boards_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `news_type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `editor` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`des`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `allimages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`allimages`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `image`, `news_type`, `color`, `editor`, `views`, `likes`, `des`, `created_at`, `updated_at`, `region`, `allimages`) VALUES
(1, 'The Plastic Pollution: A Global Crisis and India’s Response', 'the-plastic-pollution-a-global-crisis-and-indias-response', '01JZ9YKYGX0E4B85HY8KMF0WRW.jpg', 'Environment', '#5be388', 'rahul gandhi', 70, 0, '[{\"heading\":\"_\",\"headingColor\":\"#3c9c0d\",\"description\":\"<p>lastic production has skyrocketed over the last 70 years. In 1950, the world produced just two million tonnes of plastic. Fast forward to today, and production has surpassed 450 million tonnes annually, according to the United Nations Environment Programme. While plastics have brought immense value to human lives through their versatility, cost-effectiveness, and utility in industries ranging from medical to agriculture, their environmental consequences are severe and far-reaching. When we look at these statistics, that are very alarming that over 1 million plastic bottles are purchased worldwide every minute. While a single plastic bag takes 20-1,000 years to decompose.<\\/p>\"},{\"heading\":\"_\",\"headingColor\":null,\"description\":\"<p>Plastics are synthetic, organic polymers primarily derived from fossil fuels like petroleum and natural gas. From construction materials to food packaging, plastics have become indispensable. However, the other side of this convenience emerges when plastic waste is mismanaged failing to be recycled and disposed of in sealed landfills. This vast pollution impacts all ecosystems, <strong style=\\\"text-decoration: underline;\\\"><em>including<\\/em><\\/strong> land, <em>freshwater<\\/em>, and marine, and is a major cause of biodiversity loss and ecological degradation. In marine environments, plastics mainly come from land runoff, discarded fishing gear, and ship waste. Over time, macroplastics break down into microplastics (less than 5mm) and nanoplastics (less than 100nm), which can infiltrate food chains and even enter human bodies.<\\/p>\"},{\"heading\":\"heading\",\"headingColor\":null,\"description\":\"<p>Plastic trash has the most evident effects on wildlife, including ingestion, asphyxia, and entanglement. Birds, whales, fish, and turtles mistake indigestible plastic garbage for food and starve to death when their stomachs grow overfilled. It also causes internal and external damage, limiting the ability to swim and fly. Plastic pollution affects domestic farm animals as well. Floating plastics transmit invasive alien species, which are one of the primary drivers of biodiversity loss and extinction. In metropolitan areas with poorly managed waste, cows and other cattle often ingest plastic while foraging in open dumps or garbage piles. Consuming plastic bags and wrappers can block their digestive tracts, leading to severe health issues like indigestion, internal injuries, and malnutrition. Over time, the accumulation of plastics in their stomachs causes reduced appetite, weakness, and even death. Toxic chemicals from plastics can also contaminate their milk, posing risks to human health. Proper waste management and awareness are essential to protect cattle and prevent such harmful consequences.<\\/p>\"}]', '2025-07-04 00:00:15', '2025-07-07 02:05:11', '1', '[\"news-images\\/01JZCQP30N7HEKBJV5JAQC2GE8.jpg\",\"news-images\\/01JZCQP330B0EPM659G3W05GFB.jpg\",\"news-images\\/01JZCQZA3XGF7KB6MCKGSPXXJC.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `newstypes`
--

CREATE TABLE `newstypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newstypes`
--

INSERT INTO `newstypes` (`id`, `categories`, `created_at`, `updated_at`) VALUES
(1, 'Books', '2025-07-03 22:59:33', '2025-07-03 22:59:33'),
(2, 'Environment', '2025-07-03 22:59:46', '2025-07-03 22:59:46'),
(3, 'Health', '2025-07-03 22:59:53', '2025-07-03 22:59:53'),
(4, 'Bharat', '2025-07-03 23:00:02', '2025-07-03 23:00:02'),
(5, 'History', '2025-07-03 23:00:13', '2025-07-03 23:00:13'),
(6, 'Politics', '2025-07-03 23:00:20', '2025-07-03 23:00:20'),
(7, 'Economy', '2025-07-03 23:00:27', '2025-07-03 23:00:27'),
(8, 'Society', '2025-07-03 23:00:35', '2025-07-03 23:00:35'),
(9, 'Science & Technology', '2025-07-03 23:00:42', '2025-07-03 23:00:42'),
(10, 'Policy', '2025-07-03 23:00:49', '2025-07-03 23:00:49'),
(11, 'World', '2025-07-03 23:01:00', '2025-07-03 23:01:00'),
(12, 'News & Opinion', '2025-07-03 23:01:07', '2025-07-03 23:01:07'),
(13, 'IKS', '2025-07-03 23:01:15', '2025-07-03 23:01:15'),
(14, 'Defence', '2025-07-03 23:01:25', '2025-07-03 23:01:25'),
(15, 'Panjab', '2025-07-03 23:01:43', '2025-07-03 23:01:43'),
(16, 'Special Report', '2025-07-03 23:02:01', '2025-07-03 23:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('x1qc0w8O3I9LI70EUByTKk6X7UCUYjAWKhExCvLT', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiMFU5NlRFRUJ1V1VwRmp1QVdoVlR3a0pzbjY4ZXB1NnZ4d1hMamY0diI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vYXV0aG9ycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiR5WGJUL2NZZzJ0V1hMOXVYWDlQWlUuYUJTTnJlUW5JLmF5OGxPT0Ftb2loTnVPNm5aWjdMbSI7czo2OiJ0YWJsZXMiO2E6MTp7czo0MDoiZGNmMWE4OGU4MzUxMTQxN2IwMjdlYmE0ZThlZWM4NDZfZmlsdGVycyI7YToxOntzOjY6Imhhc19jdiI7YToxOntzOjg6ImlzQWN0aXZlIjtiOjA7fX19czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1751874923);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'adimn@mail.com', NULL, '$2y$12$XqBNKxXFYaJysueURQzO5e10QN2eU9HNZCR.csbbKml1QVzWn8OB.', NULL, '2025-07-03 02:17:30', '2025-07-03 02:17:30'),
(2, 'admin', 'admin@mail.com', NULL, '$2y$12$yXbT/cYg2tWXL9uXX9PZU.aBSNreQnI.ay8lOOAmoihNuO6nZZ7Lm', NULL, '2025-07-03 02:21:00', '2025-07-03 02:21:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisory_boards`
--
ALTER TABLE `advisory_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_slug_unique` (`slug`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_title_unique` (`title`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `blogtypes`
--
ALTER TABLE `blogtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editorial_boards`
--
ALTER TABLE `editorial_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_title_unique` (`title`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`);

--
-- Indexes for table `newstypes`
--
ALTER TABLE `newstypes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisory_boards`
--
ALTER TABLE `advisory_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogtypes`
--
ALTER TABLE `blogtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `editorial_boards`
--
ALTER TABLE `editorial_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newstypes`
--
ALTER TABLE `newstypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
