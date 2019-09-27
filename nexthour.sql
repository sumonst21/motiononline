-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2019 at 11:23 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexthour`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `ad_type` varchar(100) NOT NULL,
  `ad_image` varchar(100) NOT NULL,
  `ad_video` varchar(100) NOT NULL,
  `ad_url` varchar(100) DEFAULT NULL,
  `ad_location` varchar(100) NOT NULL,
  `ad_target` varchar(100) DEFAULT NULL,
  `ad_hold` int(50) DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `endtime` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audio_languages`
--

CREATE TABLE `audio_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audio_languages`
--

INSERT INTO `audio_languages` (`id`, `language`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Hindi\"}', '2019-07-24 23:48:58', '2019-07-24 23:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `auth_customizes`
--

CREATE TABLE `auth_customizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_customizes`
--

INSERT INTO `auth_customizes` (`id`, `image`, `detail`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"auth_page1524556424login.jpg\"}', '{\"en\":\"<h1 class=\\\"heading--primary\\\"><span>Welcome to<\\/span><br> Next Hour<\\/h1>\\r\\n<h2 class=\\\"heading--secondary\\\">Are you ready to join the elite?<\\/h2>\"}', '2018-04-21 18:30:00', '2018-04-24 02:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `id` int(10) UNSIGNED NOT NULL,
  `rightclick` tinyint(1) NOT NULL DEFAULT '1',
  `inspect` tinyint(1) DEFAULT NULL,
  `goto` tinyint(1) NOT NULL DEFAULT '1',
  `color` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buttons`
--

INSERT INTO `buttons` (`id`, `rightclick`, `inspect`, `goto`, `color`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, 0, '2018-07-31 06:00:00', '2019-08-24 02:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_pub_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_mar_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_add` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prime_main_slider` tinyint(1) NOT NULL DEFAULT '1',
  `prime_genre_slider` tinyint(1) NOT NULL DEFAULT '1',
  `prime_footer` tinyint(1) NOT NULL DEFAULT '1',
  `prime_movie_single` tinyint(1) NOT NULL DEFAULT '1',
  `terms_condition` text COLLATE utf8mb4_unicode_ci,
  `privacy_pol` text COLLATE utf8mb4_unicode_ci,
  `refund_pol` text COLLATE utf8mb4_unicode_ci,
  `copyright` text COLLATE utf8mb4_unicode_ci,
  `stripe_payment` tinyint(1) NOT NULL DEFAULT '1',
  `paypal_payment` tinyint(1) NOT NULL DEFAULT '1',
  `payu_payment` tinyint(1) NOT NULL DEFAULT '1',
  `paytm_payment` int(11) UNSIGNED DEFAULT '0',
  `preloader` tinyint(1) NOT NULL DEFAULT '1',
  `wel_eml` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `logo`, `favicon`, `title`, `w_email`, `stripe_pub_key`, `stripe_secret_key`, `paypal_mar_email`, `currency_code`, `currency_symbol`, `invoice_add`, `prime_main_slider`, `prime_genre_slider`, `prime_footer`, `prime_movie_single`, `terms_condition`, `privacy_pol`, `refund_pol`, `copyright`, `stripe_payment`, `paypal_payment`, `payu_payment`, `paytm_payment`, `preloader`, `wel_eml`, `created_at`, `updated_at`) VALUES
(1, 'logo_1550663262logo.png', 'favicon.png', '{\"en\":\"Nexthour\"}', 'contact@nexthour.com', '', '', '', 'INR', 'fa fa-inr', '{\"en\":null}', 0, 1, 1, 1, '{\"en\":\"<p>new goodes<\\/p>\",\"nl\":\"<p>newvious&nbsp;goodesioanos<\\/p>\"}', NULL, NULL, '{\"en\":\"<p>&copy; 2019&nbsp;Next Hour | All Rights Reserved.<\\/p>\"}', 0, 0, 0, 1, 1, 0, NULL, '2019-08-22 03:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_codes`
--

CREATE TABLE `coupon_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_off` double(8,2) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_off` double(8,2) DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'once',
  `max_redemptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redeem_by` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donater_lists`
--

CREATE TABLE `donater_lists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `method` varchar(191) DEFAULT NULL,
  `donor_msg` longtext,
  `amount` varchar(191) DEFAULT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `seasons_id` int(10) UNSIGNED NOT NULL,
  `tmdb_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `episode_no` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmdb` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `a_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` tinyint(1) DEFAULT NULL,
  `subtitle_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `released` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'E',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `seasons_id`, `tmdb_id`, `episode_no`, `title`, `tmdb`, `duration`, `detail`, `a_language`, `subtitle`, `subtitle_list`, `subtitle_files`, `released`, `type`, `created_at`, `updated_at`) VALUES
(5, 4, NULL, 1, 'ccnnb', 'N', 'ccc', '{\"en\":\"xxccvvcbv\"}', '1', 0, NULL, NULL, '3032-05-04', 'E', '2019-08-10 05:00:20', '2019-08-10 05:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_translations`
--

CREATE TABLE `footer_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_translations`
--

INSERT INTO `footer_translations` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'terms and condition', '{\"en\":\"Terms and condition\",\"nl\":\"Terms and condition2\",\"de\":\"Gesch\\u00e4ftsbedingung\"}', NULL, '2018-04-24 03:31:15'),
(2, 'privacy policy', '{\"en\":\"Privacy policy\",\"nl\":\"Privacy policy2\",\"de\":\"Datenschutz-Bestimmungen\"}', NULL, '2018-04-24 03:31:15'),
(3, 'refund policy', '{\"en\":\"Refund policy\",\"nl\":\"Refund policy2\",\"de\":\"R\\u00fcckgaberecht\"}', NULL, '2018-04-24 03:31:15'),
(4, 'help', '{\"en\":\"Help\",\"nl\":\"Help2\",\"de\":\"Hilfe\"}', NULL, '2018-04-24 03:31:15'),
(5, 'corporate', '{\"en\":\"Corporate\",\"nl\":\"Corporate2\",\"de\":\"Unternehmen\"}', NULL, '2018-04-24 03:31:15'),
(6, 'sitemap', '{\"en\":\"Sitemap\",\"nl\":\"Sitemap2\",\"de\":\"Seitenverzeichnis\"}', NULL, '2018-04-24 03:31:15'),
(7, 'subscribe', '{\"en\":\"Subscribe\",\"nl\":\"Subscribe2\",\"de\":\"Abonnieren\"}', NULL, '2018-04-24 03:31:15'),
(8, 'subscribe text', '{\"en\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.\",\"nl\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.2\",\"de\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.\"}', NULL, '2018-04-24 03:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `front_slider_updates`
--

CREATE TABLE `front_slider_updates` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_show` int(11) UNSIGNED DEFAULT NULL,
  `orderby` int(11) DEFAULT '1',
  `sliderview` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front_slider_updates`
--

INSERT INTO `front_slider_updates` (`id`, `item_show`, `orderby`, `sliderview`) VALUES
(1, 5, 1, 0),
(2, 5, 1, 0),
(3, 5, 1, 0),
(4, 5, 0, 0),
(5, NULL, 1, 0),
(6, NULL, 1, 0),
(7, NULL, 1, 0),
(8, NULL, 1, 0),
(9, NULL, 1, 0),
(10, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_translations`
--

CREATE TABLE `header_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_translations`
--

INSERT INTO `header_translations` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(4, 'dashboard', '{\"en\":\"Dashboard\",\"nl\":\"Dashboard\",\"de\":\"Instrumententafel\"}', NULL, '2019-02-11 09:31:22'),
(5, 'faqs', '{\"en\":\"Faq\'s\",\"nl\":\"Faq\'s\",\"de\":\"Faq\'s\"}', NULL, '2018-04-24 03:30:15'),
(6, 'sign in', '{\"en\":\"Sign In\",\"nl\":\"Sign In\",\"de\":\"Anmelden\"}', NULL, '2018-04-24 03:30:15'),
(7, 'sign out', '{\"en\":\"Sign Out\",\"nl\":\"Sign Out\",\"de\":\"Ausloggen\"}', NULL, '2018-04-24 03:30:15'),
(8, 'watchlist', '{\"en\":\"Watchlist\",\"nl\":\"Watchlist\",\"de\":\"Beobachtungsliste\"}', NULL, '2018-04-24 03:30:15'),
(9, 'register', '{\"en\":\"Register\",\"nl\":\"Register\",\"de\":\"Registrieren\"}', NULL, '2018-04-24 03:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED DEFAULT NULL,
  `tv_series_id` int(10) UNSIGNED DEFAULT NULL,
  `slide_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_translations`
--

CREATE TABLE `home_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_translations`
--

INSERT INTO `home_translations` (`id`, `key`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'watch next tv series and movies', '{\"en\":\"Watch Next TV Series And Movies\",\"nl\":\"Watch Nexot TV Seriesee And Moviessk\",\"de\":\"Schaue n\\u00e4chste TV-Serie und Filme\"}', 1, NULL, '2019-05-06 12:54:11'),
(2, 'watch next movies', '{\"en\":\"Watch Next Movies\",\"nl\":\"Watch Next Movies5\",\"de\":\"Sieh dir die n\\u00e4chsten Filme an\"}', 1, NULL, '2019-05-06 12:54:01'),
(3, 'watch next tv series', '{\"en\":\"Watch Next TV Series\",\"nl\":\"Watch Next TV Series5\",\"de\":\"Sehen Sie sich die n\\u00e4chste TV-Serie an\"}', 1, NULL, '2019-05-06 12:37:21'),
(4, 'view all', '{\"en\":\"View all\",\"nl\":\"View all5\",\"de\":\"Alle ansehen\"}', 1, NULL, '2019-02-10 11:10:32'),
(5, 'featured', '{\"en\":\"Featured\",\"nl\":\"featured5\",\"de\":\"gekennzeichnet\"}', 1, NULL, '2019-07-24 23:37:51'),
(7, 'movies in', '{\"en\":\"Movies  in\",\"nl\":\"movies  in5\",\"de\":\"Filme in\"}', 1, NULL, '2019-05-06 12:53:12'),
(8, 'tv shows in', '{\"en\":\"Tv Shows in\",\"nl\":\"tv shows in5\",\"de\":\"Fernsehshows in\"}', 1, NULL, '2019-07-24 23:50:09'),
(9, 'at the big screen at home', '{\"en\":\"at the big screen at home\",\"nl\":\"at the big screen at home5\",\"de\":\"auf dem gro\\u00dfen Bildschirm zu Hause\"}', 1, NULL, '2018-04-24 03:36:54'),
(10, 'recently added', '{\"en\":\"Recently Added\",\"nl\":\"Recently Added5\",\"de\":\"K\\u00fcrzlich hinzugef\\u00fcgt\"}', 1, NULL, '2018-04-24 03:36:54'),
(11, 'found for', '{\"en\":\"Found for\",\"nl\":\"found for5\",\"de\":\"gefunden f\\u00fcr\"}', 1, NULL, '2018-04-24 03:39:13'),
(12, 'directors', '{\"en\":\"Directors\",\"nl\":\"Directors5\",\"de\":\"Direktoren\"}', 1, NULL, '2018-04-24 03:36:54'),
(13, 'starring', '{\"en\":\"Starring\",\"nl\":\"Starring5\",\"de\":\"Mit\"}', 1, NULL, '2018-04-24 03:36:54'),
(14, 'genres', '{\"en\":\"Genres\",\"nl\":\"Genres5\",\"de\":\"Genres\"}', 1, NULL, '2018-04-24 03:36:54'),
(15, 'audio languages', '{\"en\":\"Audio Languages\",\"nl\":\"Audio Languages5\",\"de\":\"Audio-Sprachen\"}', 1, NULL, '2018-04-24 03:36:54'),
(16, 'customers also watched', '{\"en\":\"Customers also watched\",\"nl\":\"Customers also watched5\",\"de\":\"Kunden haben auch zugeschaut\"}', 1, NULL, '2018-04-24 03:36:54'),
(17, 'episodes', '{\"en\":\"Episodes\",\"nl\":\"Episodes5\",\"de\":\"Episoden\"}', 1, NULL, '2018-04-24 03:36:54'),
(18, 'series', '{\"en\":\"Series\",\"nl\":\"Series5\",\"de\":\"Serie\"}', 1, NULL, '2018-04-24 03:36:54'),
(19, 'frequently asked questions', '{\"en\":\"Frequently Asked Questions\",\"nl\":\"Frequently Asked Questions5\",\"de\":\"H\\u00e4ufig gestellte Fragen\"}', 1, NULL, '2018-04-24 03:36:54'),
(20, 'movies', '{\"en\":\"Movies\",\"nl\":\"Movies5\",\"de\":\"Filme\"}', 1, NULL, '2019-05-07 12:03:39'),
(21, 'tv shows', '{\"en\":\"Tv Shows\",\"nl\":\"Tv Shows5\",\"de\":\"Fernsehshows\"}', 1, NULL, '2019-05-07 12:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `landing_pages`
--

CREATE TABLE `landing_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `button` tinyint(1) NOT NULL DEFAULT '1',
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left` tinyint(1) NOT NULL DEFAULT '1',
  `position` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_pages`
--

INSERT INTO `landing_pages` (`id`, `image`, `heading`, `detail`, `button`, `button_text`, `button_link`, `left`, `position`, `created_at`, `updated_at`) VALUES
(1, 'landing_page_1524556124home_1.jpg', '{\"en\":\"Welcome!  Join Next Hour\",\"de\":\"Herzlich willkommen! Beitreten Next Hour\"}', '{\"en\":\"Join Next Hour to watch the most recent motion pictures, elite TV appears and grant winning Next Hour membership at simply least cost.\",\"de\":\"Nehmen Sie an der Next Hour teil und schauen Sie sich die neuesten Filme an, das Elite-TV-Programm erscheint und gew\\u00e4hrt Ihnen die beste Mitgliedschaft in der n\\u00e4chsten Stunde zu den niedrigsten Kosten.\"}', 1, '{\"en\":\"Join Next Hour\",\"de\":\"Join Next Hour\"}', 'login', 0, 1, '2018-04-24 02:18:44', '2018-04-24 03:26:57'),
(2, 'landing_page_1524556182home_3.jpg', '{\"en\":\"Don\'t Miss TV Shows\",\"de\":\"Vermisse Fernsehserien nicht\"}', '{\"en\":\"With your Next Hour membership, you approach select US and all TV shows, grant winning Next Hour Original Series and kids and children shows.\",\"de\":\"Mit Ihrer Mitgliedschaft bei der n\\u00e4chsten Stunde n\\u00e4hern Sie sich ausgew\\u00e4hlten US- und allen TV-Shows, gewinnen Next-Hour-Serien und Kinder- und Kindershows.\"}', 1, '{\"en\":\"Register Now\",\"de\":\"Register Now\"}', 'register', 1, 2, '2018-04-24 02:19:42', '2018-04-24 03:27:48'),
(3, 'landing_page_1524556261home_5.jpg', '{\"en\":\"Membership for Movies & TV shows\",\"de\":\"Mitgliedschaft f\\u00fcr Filme und TV-Sendungen\"}', '{\"en\":\"Notwithstanding boundless gushing, your Next Hour membership incorporates elite Bollywood, Hollywood films, US and all TV shows, grant winning Next Hour Series and kids shows.\",\"de\":\"Trotz grenzenloser Begeisterung enth\\u00e4lt Ihre Next Hour-Mitgliedschaft Elite-Bollywood, Hollywood-Filme, US-amerikanische und alle TV-Shows, die Grant Winning Next Hour Series und Kindershows.\"}', 1, '{\"en\":\"Login Now\",\"de\":\"Login Now\"}', 'login', 0, 3, '2018-04-24 02:21:01', '2018-04-24 03:28:09'),
(4, 'landing_page_1524556322home_9.jpg', '{\"en\":\"Kids Special\",\"de\":\"Kinder Spezial\"}', '{\"en\":\"With simple to utilize parental controls and a committed children page, you can appreciate secure, advertisement free children and kids diversion. Children and kids can appreciate famous TV shows\",\"de\":\"Mit einfach zu verwenden Kindersicherung und eine engagierte Kinder Seite k\\u00f6nnen Sie sicher, werbefreie Kinder und Kinder Ablenkung sch\\u00e4tzen. Kinder und Kinder k\\u00f6nnen ber\\u00fchmte Fernsehshows genie\\u00dfen\"}', 1, '{\"en\":\"Get Now\",\"de\":\"Get Now\"}', 'register', 0, 4, '2018-04-24 02:22:02', '2018-04-24 03:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `local` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `def` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `local`, `name`, `def`, `created_at`, `updated_at`) VALUES
(3, 'en', 'English', 1, '2019-05-02 12:23:19', '2019-05-12 10:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_videos`
--

CREATE TABLE `menu_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED DEFAULT NULL,
  `tv_series_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_03_07_311070_create_tracker_paths_table', 1),
(4, '2015_03_07_311071_create_tracker_queries_table', 1),
(5, '2015_03_07_311072_create_tracker_queries_arguments_table', 1),
(6, '2015_03_07_311073_create_tracker_routes_table', 1),
(7, '2015_03_07_311074_create_tracker_routes_paths_table', 1),
(8, '2015_03_07_311075_create_tracker_route_path_parameters_table', 1),
(9, '2015_03_07_311076_create_tracker_agents_table', 1),
(10, '2015_03_07_311077_create_tracker_cookies_table', 1),
(11, '2015_03_07_311078_create_tracker_devices_table', 1),
(12, '2015_03_07_311079_create_tracker_domains_table', 1),
(13, '2015_03_07_311080_create_tracker_referers_table', 1),
(14, '2015_03_07_311081_create_tracker_geoip_table', 1),
(15, '2015_03_07_311082_create_tracker_sessions_table', 1),
(16, '2015_03_07_311083_create_tracker_errors_table', 1),
(17, '2015_03_07_311084_create_tracker_system_classes_table', 1),
(18, '2015_03_07_311085_create_tracker_log_table', 1),
(19, '2015_03_07_311086_create_tracker_events_table', 1),
(20, '2015_03_07_311087_create_tracker_events_log_table', 1),
(21, '2015_03_07_311088_create_tracker_sql_queries_table', 1),
(22, '2015_03_07_311089_create_tracker_sql_query_bindings_table', 1),
(23, '2015_03_07_311090_create_tracker_sql_query_bindings_parameters_table', 1),
(24, '2015_03_07_311091_create_tracker_sql_queries_log_table', 1),
(25, '2015_03_07_311092_create_tracker_connections_table', 1),
(26, '2015_03_07_311093_create_tracker_tables_relations', 1),
(27, '2015_03_13_311094_create_tracker_referer_search_term_table', 1),
(28, '2015_03_13_311095_add_tracker_referer_columns', 1),
(29, '2015_11_23_311096_add_tracker_referer_column_to_log', 1),
(30, '2015_11_23_311097_create_tracker_languages_table', 1),
(31, '2015_11_23_311098_add_language_id_column_to_sessions', 1),
(32, '2015_11_23_311099_add_tracker_language_foreign_key_to_sessions', 1),
(33, '2015_11_23_311100_add_nullable_to_tracker_error', 1),
(34, '2017_01_31_311101_fix_agent_name', 1),
(35, '2017_06_20_311102_add_agent_name_hash', 1),
(36, '2017_11_11_083037_create_movies_table', 1),
(37, '2017_11_12_054912_create_directors_table', 1),
(38, '2017_11_12_055733_create_actors_table', 1),
(39, '2017_11_12_060041_create_genres_table', 1),
(40, '2017_11_12_060748_create_packages_table', 1),
(41, '2017_11_12_061316_create_faqs_table', 1),
(42, '2017_11_12_061432_create_configs_table', 1),
(43, '2018_01_09_083026_add_cashier_table_fields', 1),
(44, '2018_01_09_090132_create_permission_tables', 1),
(45, '2018_01_11_040258_create_coupon_codes_table', 1),
(46, '2018_01_16_110614_create_movie_series_table', 1),
(47, '2018_01_16_153532_create_audio_languages_table', 1),
(48, '2018_01_24_123038_create_tv_series_table', 1),
(49, '2018_02_03_073641_create_wishlists_table', 1),
(50, '2018_03_14_132728_create_home_sliders_table', 1),
(51, '2018_03_14_135038_create_seasons_table', 1),
(52, '2018_03_14_140100_create_episodes_table', 1),
(53, '2018_03_25_132517_create_videolinks_table', 1),
(54, '2018_04_02_140524_create_paypal_subscriptions_table', 1),
(55, '2018_04_12_035533_create_languages_table', 1),
(56, '2018_04_14_053616_create_home_translations_table', 2),
(57, '2018_04_14_172143_create_header_translations_table', 3),
(58, '2018_04_14_172228_create_footer_translations_table', 3),
(59, '2018_04_14_180413_create_popover_translations_table', 4),
(60, '2018_04_16_065808_create_menus_table', 5),
(61, '2018_04_16_070130_create_menu_videos_table', 5),
(62, '2018_04_16_080456_create_menu_videos_table', 6),
(63, '2016_12_03_000000_create_payu_payments_table', 7),
(64, '2018_04_19_163952_create_landing_pages_table', 8),
(65, '2018_04_22_163308_create_manage_packages_table', 9),
(66, '2018_04_22_165105_create_auth_customizes_table', 10),
(67, '2018_07_20_113202_create_subs_table', 11),
(68, '2018_07_20_171234_create_seos_table', 11),
(69, '2018_07_21_053731_create_plans_table', 12),
(70, '2018_07_31_115802_create_buttons_table', 13),
(72, '2019_02_10_115619_create_pricing_texts_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `tmdb_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmdb` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fetch_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `rating` int(11) DEFAULT NULL,
  `maturity_rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` tinyint(1) DEFAULT NULL,
  `subtitle_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_year` int(11) DEFAULT NULL,
  `released` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `series` tinyint(1) DEFAULT NULL,
  `a_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movie_series`
--

CREATE TABLE `movie_series` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `series_movie_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multiplescreens`
--

CREATE TABLE `multiplescreens` (
  `id` int(11) UNSIGNED NOT NULL,
  `screen1` varchar(50) DEFAULT NULL,
  `screen2` varchar(50) DEFAULT NULL,
  `screen3` varchar(50) DEFAULT NULL,
  `screen4` varchar(50) DEFAULT NULL,
  `screen5` varchar(50) DEFAULT NULL,
  `screen6` varchar(50) DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `activescreen` varchar(191) DEFAULT NULL,
  `pkg_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for multiple screens for user ';

--
-- Dumping data for table `multiplescreens`
--

INSERT INTO `multiplescreens` (`id`, `screen1`, `screen2`, `screen3`, `screen4`, `screen5`, `screen6`, `user_id`, `activescreen`, `pkg_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2019-08-21 05:10:13', '2019-08-21 05:10:13'),
(2, 'Admin', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2019-08-21 08:53:42', '2019-08-21 08:53:42'),
(3, 'Admin', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2019-08-22 08:38:16', '2019-08-22 08:38:16'),
(4, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, '2019-08-23 04:15:28', '2019-08-23 04:15:28'),
(5, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, '2019-08-23 04:16:00', '2019-08-23 04:16:00'),
(6, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, '2019-08-23 04:20:30', '2019-08-23 04:20:30'),
(7, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, '2019-08-23 04:23:22', '2019-08-23 04:23:22'),
(8, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, '2019-08-23 04:25:34', '2019-08-23 04:25:34'),
(9, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, '2019-08-23 04:26:38', '2019-08-23 04:26:38'),
(10, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, '2019-08-23 04:27:16', '2019-08-23 04:27:16'),
(11, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, '2019-08-23 04:29:26', '2019-08-23 04:29:26'),
(12, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-23 04:33:49', '2019-08-23 04:33:49'),
(13, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-23 04:37:21', '2019-08-23 04:37:21'),
(14, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-23 04:41:59', '2019-08-23 04:41:59'),
(15, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-23 04:42:43', '2019-08-23 04:42:43'),
(16, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-23 04:43:51', '2019-08-23 04:43:51'),
(17, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-23 04:44:12', '2019-08-23 04:44:12'),
(18, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:17:11', '2019-08-24 00:17:11'),
(19, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:24:54', '2019-08-24 00:24:54'),
(20, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:25:20', '2019-08-24 00:25:20'),
(21, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:27:59', '2019-08-24 00:27:59'),
(22, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:35:42', '2019-08-24 00:35:42'),
(23, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:36:29', '2019-08-24 00:36:29'),
(24, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:36:56', '2019-08-24 00:36:56'),
(25, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:37:06', '2019-08-24 00:37:06'),
(26, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:37:29', '2019-08-24 00:37:29'),
(27, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:38:28', '2019-08-24 00:38:28'),
(28, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:38:58', '2019-08-24 00:38:58'),
(29, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:44:48', '2019-08-24 00:44:48'),
(30, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:45:24', '2019-08-24 00:45:24'),
(31, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 00:56:24', '2019-08-24 00:56:24'),
(32, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:02:43', '2019-08-24 01:02:43'),
(33, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:03:41', '2019-08-24 01:03:41'),
(34, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:08:49', '2019-08-24 01:08:49'),
(35, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:10:56', '2019-08-24 01:10:56'),
(36, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:11:37', '2019-08-24 01:11:37'),
(37, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:13:12', '2019-08-24 01:13:12'),
(38, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:15:02', '2019-08-24 01:15:02'),
(39, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:17:34', '2019-08-24 01:17:34'),
(40, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:18:51', '2019-08-24 01:18:51'),
(41, 'John', NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2019-08-24 01:21:05', '2019-08-24 01:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) UNSIGNED NOT NULL,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `interval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval_count` int(11) DEFAULT NULL,
  `trial_period_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `screens` int(11) UNSIGNED DEFAULT '1',
  `delete_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_menu`
--

CREATE TABLE `package_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `package_id` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@mediacity.co.in', '$2y$10$MYykmCl2xOQ/k7F/PhsuruA4jlLqW.ASAASQAGBiz0rByJH2e6U9C', '2019-07-03 04:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_subscriptions`
--

CREATE TABLE `paypal_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_from` timestamp NULL DEFAULT NULL,
  `subscription_to` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player_settings`
--

CREATE TABLE `player_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_enable` tinyint(1) DEFAULT NULL,
  `cpy_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `share_opt` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_settings`
--

INSERT INTO `player_settings` (`id`, `logo`, `logo_enable`, `cpy_text`, `share_opt`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 1, '2019 Nexthour', 1, NULL, '2019-03-29 05:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `popover_translations`
--

CREATE TABLE `popover_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popover_translations`
--

INSERT INTO `popover_translations` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'mins', '{\"en\":\"Mins\",\"nl\":\"mins2\",\"de\":\"Minuten\"}', NULL, '2018-04-24 03:38:42'),
(2, 'season', '{\"en\":\"Season\",\"nl\":\"season2\",\"de\":\"Jahreszeit\"}', NULL, '2018-04-24 03:38:42'),
(3, 'all age', '{\"en\":\"All age\",\"nl\":\"all age2\",\"de\":\"jedes Alter\"}', NULL, '2018-04-24 03:38:42'),
(4, 'read more', '{\"en\":\"Read more\",\"nl\":\"Read more2\",\"de\":\"Weiterlesen\"}', NULL, '2018-04-24 03:38:04'),
(5, 'less', '{\"en\":\"Less\",\"nl\":\"Less2\",\"de\":\"Weniger\"}', NULL, '2018-04-24 03:38:04'),
(6, 'play', '{\"en\":\"Play Now\",\"nl\":\"play2\",\"de\":\"abspielen\"}', NULL, '2018-04-24 03:38:42'),
(7, 'watch trailer', '{\"en\":\"Watch trailer\",\"nl\":\"watch trailer2\",\"de\":\"Trailer ansehen\"}', NULL, '2018-04-24 03:38:42'),
(8, 'add to watchlist', '{\"en\":\"Add to watchlist\",\"nl\":\"add to watchlist2\",\"de\":\"Auf die Beobachtungsliste\"}', NULL, '2018-04-24 03:38:42'),
(9, 'remove from watchlist', '{\"en\":\"Remove  from watchlist\",\"nl\":\"remove  from watchlist2\",\"de\":\"aus der Beobachtungsliste entfernen\"}', NULL, '2018-04-24 03:38:42'),
(10, 'subtitles', '{\"en\":\"Subtitles\",\"nl\":\"subtitles2\",\"de\":\"Untertitel\"}', NULL, '2018-04-24 03:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_texts`
--

CREATE TABLE `pricing_texts` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_texts`
--

INSERT INTO `pricing_texts` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'title1', '{\"en\":\"Min duration\",\"de\":\"Minimale duur\",\"es-co\":\"Min duration vbbffghhgh\",\"es\":\"Min duration\",\"De\":\"Min duration\"}', NULL, '2019-06-10 23:42:49'),
(2, 'title2', '{\"en\":\"Watch on your laptop, TV, phone and tablet\",\"de\":\"Kijk op je laptop, tv, telefoon en tablet\",\"es-co\":\"Watch on your laptop, TV, phone and tablet\",\"es\":\"Watch on your laptop, TV, phone and tablet\",\"De\":\"Watch on your laptop, TV, phone and tablet\"}', NULL, '2019-06-10 23:42:49'),
(3, 'title3', '{\"en\":\"Full HD and 4K available\",\"de\":\"Full HD en 4K beschikbaar\",\"es-co\":\"Full HD and 4K available\",\"es\":\"Full HD and 4K available\",\"De\":\"Full HD and 4K available\"}', NULL, '2019-06-10 23:42:49'),
(4, 'title4', '{\"en\":\"Unlimited movies and TV shows\",\"de\":\"Ongelimiteerde films en tv-programma\'s\",\"es-co\":\"Unlimited movies and TV shows\",\"es\":\"Unlimited movies and TV shows\",\"De\":\"Unlimited movies and TV shows\"}', NULL, '2019-06-10 23:52:15'),
(5, 'title5', '{\"en\":\"24\\/7 Tech Support\",\"de\":\"24\\/7 technische ondersteuning\",\"es-co\":\"24\\/7 Tech Support\",\"es\":\"24\\/7 Tech Supports\",\"De\":\"24\\/7 Tech Support\"}', NULL, '2019-06-10 23:42:49'),
(6, 'title6', '{\"en\":\"Cancel anytime\",\"de\":\"Annuleer op elk gewenst moment\",\"es-co\":\"Cancel anytime\",\"es\":\"Cancel anytimes\",\"De\":\"Cancel anytimes\"}', NULL, '2019-06-10 23:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `tv_series_id` int(10) UNSIGNED NOT NULL,
  `tmdb_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season_no` bigint(20) NOT NULL,
  `tmdb` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` tinyint(1) DEFAULT NULL,
  `subtitle_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `tv_series_id`, `tmdb_id`, `season_no`, `tmdb`, `publish_year`, `thumbnail`, `poster`, `actor_id`, `a_language`, `subtitle`, `subtitle_list`, `detail`, `featured`, `type`, `created_at`, `updated_at`) VALUES
(4, 4, NULL, 1, 'N', '5023', 'thumb_1565432984entertainment-ipad-mockup-265685.jpg', NULL, '1', '1', 0, NULL, '{\"en\":\"dffg\"}', 0, 'S', '2019-08-10 04:59:44', '2019-08-10 04:59:44'),
(5, 4, NULL, 1, 'N', '5023', 'thumb_1565432985entertainment-ipad-mockup-265685.jpg', NULL, '1', '1', 0, NULL, '{\"en\":\"dffg\"}', 0, 'S', '2019-08-10 04:59:45', '2019-08-10 04:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` text COLLATE utf8mb4_unicode_ci,
  `google` text COLLATE utf8mb4_unicode_ci,
  `metadata` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `author`, `fb`, `google`, `metadata`, `description`, `keyword`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Ankit\"}', 'sdf', 'sdfg', '{\"en\":\"this ts a next hour\"}', '{\"en\":\"sdff\"}', '{\"en\":\"dsdgf\"}', NULL, '2019-04-29 08:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE `social_icons` (
  `id` int(11) NOT NULL,
  `url1` varchar(191) DEFAULT NULL,
  `url2` varchar(191) DEFAULT NULL,
  `url3` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`id`, `url1`, `url2`, `url3`, `created_at`, `updated_at`) VALUES
(1, 'http://facebook.com', 'http://twitter.com', 'http://youtube.com', '2019-03-29 05:22:39', '2019-03-28 23:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subtitles`
--

CREATE TABLE `subtitles` (
  `id` int(11) UNSIGNED NOT NULL,
  `sub_lang` varchar(100) DEFAULT NULL,
  `sub_t` varchar(191) DEFAULT NULL,
  `m_t_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

CREATE TABLE `tv_series` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmdb_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmdb` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `rating` double(8,2) DEFAULT NULL,
  `episode_runtime` double(8,2) DEFAULT NULL,
  `maturity_rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'T',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`id`, `keyword`, `description`, `title`, `tmdb_id`, `tmdb`, `thumbnail`, `poster`, `genre_id`, `detail`, `rating`, `episode_runtime`, `maturity_rating`, `featured`, `type`, `created_at`, `updated_at`) VALUES
(4, '{\"en\":\"cvbvb\"}', '{\"en\":\"vbgvb\"}', 'Lost', '4607', 'Y', 'tmdb_jyGspygDXJMydTOJj7iWNx9Elyd.jpg', 'tmdb_pRPJj3oczSIxo8L80qNweXaWnrp.jpg', '1,3,7', '{\"en\":\"Stripped of everything, the survivors of a horrific plane crash  must work together to stay alive. But the island holds many secrets.\"}', 7.80, NULL, 'all age', 0, 'T', '2019-08-10 04:59:10', '2019-08-23 02:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gitlab_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `google_id`, `facebook_id`, `gitlab_id`, `dob`, `mobile`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@mediacity.co.in', '$2y$10$1w2kbraQWFVkZVcyAwXmgeGhD4QYxTcg9Hx12KYtNN821CuOMtyda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'HG4wwAVLRQHOH3HBZSjsowVBQ4JFIU0cFZACP6W6nWfAYkHHrRNztZcXudP2', '2018-04-24 07:56:34', '2018-04-24 07:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `videolinks`
--

CREATE TABLE `videolinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED DEFAULT NULL,
  `episode_id` int(10) UNSIGNED DEFAULT NULL,
  `iframeurl` longtext COLLATE utf8mb4_unicode_ci,
  `ready_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_360` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_480` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_720` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_1080` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videolinks`
--

INSERT INTO `videolinks` (`id`, `movie_id`, `episode_id`, `iframeurl`, `ready_url`, `url_360`, `url_480`, `url_720`, `url_1080`, `created_at`, `updated_at`) VALUES
(11, 7, NULL, NULL, 'https://www.youtube.com/watch?v=C3FVibMcKTk', NULL, NULL, NULL, NULL, '2019-08-10 04:56:21', '2019-08-10 04:56:21'),
(12, 8, NULL, NULL, 'https://www.youtube.com/watch?v=C3FVibMcKTk', NULL, NULL, NULL, NULL, '2019-08-10 04:57:11', '2019-08-10 04:57:11'),
(13, 9, NULL, NULL, 'https://www.youtube.com/watch?v=C3FVibMcKTk', NULL, NULL, NULL, NULL, '2019-08-10 04:58:07', '2019-08-10 04:58:07'),
(14, NULL, 5, NULL, 'https://www.youtube.com/watch?v=C3FVibMcKTk', NULL, NULL, NULL, NULL, '2019-08-10 05:00:20', '2019-08-10 05:00:20'),
(15, 10, NULL, NULL, 'https://www.youtube.com/watch?v=ZyeEFCwdpp8', NULL, NULL, NULL, NULL, '2019-08-13 05:40:34', '2019-08-13 05:40:34'),
(16, 11, NULL, NULL, 'https://www.youtube.com/watch?v=ZyeEFCwdpp8', NULL, NULL, NULL, NULL, '2019-08-13 05:42:33', '2019-08-13 05:42:33'),
(17, 12, NULL, NULL, 'https://www.youtube.com/watch?v=0vA6jhqKwVA', NULL, NULL, NULL, NULL, '2019-08-16 23:58:31', '2019-08-16 23:58:31'),
(18, 13, NULL, NULL, 'https://www.youtube.com/watch?v=xAqNwexcAJk', NULL, NULL, NULL, NULL, '2019-08-17 03:11:40', '2019-08-17 03:11:40'),
(19, 14, NULL, NULL, 'https://www.youtube.com/watch?v=kBkvGyR_ykQ', NULL, NULL, NULL, NULL, '2019-08-17 03:14:07', '2019-08-17 03:14:07'),
(20, 15, NULL, NULL, 'https://www.youtube.com/watch?v=kBkvGyR_ykQ', NULL, NULL, NULL, NULL, '2019-08-17 03:15:27', '2019-08-17 03:15:27'),
(21, 16, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:02:44', '2019-08-19 03:02:44'),
(22, 17, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:03:58', '2019-08-19 03:03:58'),
(23, 18, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:05:20', '2019-08-19 03:05:20'),
(24, 19, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:06:30', '2019-08-19 03:06:30'),
(25, 20, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:07:44', '2019-08-19 03:07:44'),
(26, 21, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:08:23', '2019-08-19 03:08:23'),
(27, 22, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:09:27', '2019-08-19 03:09:27'),
(28, 23, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:10:47', '2019-08-19 03:10:47'),
(29, 24, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:12:37', '2019-08-19 03:12:37'),
(30, 25, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:13:58', '2019-08-19 03:13:58'),
(31, 26, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:15:00', '2019-08-19 03:15:00'),
(32, 27, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:16:02', '2019-08-19 03:16:02'),
(33, 28, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:16:47', '2019-08-19 03:16:47'),
(34, 29, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28', NULL, NULL, NULL, NULL, '2019-08-19 03:19:36', '2019-08-19 03:19:36'),
(35, 30, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:22:59', '2019-08-19 03:22:59'),
(36, 31, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:24:02', '2019-08-19 03:24:02'),
(37, 32, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:26:29', '2019-08-19 03:26:29'),
(38, 33, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:27:17', '2019-08-19 03:27:17'),
(39, 34, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:27:54', '2019-08-19 03:27:54'),
(40, 35, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:28:31', '2019-08-19 03:28:31'),
(41, 36, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:29:38', '2019-08-19 03:29:38'),
(42, 37, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:31:56', '2019-08-19 03:31:56'),
(43, 38, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:32:41', '2019-08-19 03:32:41'),
(44, 39, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:33:27', '2019-08-19 03:33:27'),
(45, 40, NULL, NULL, 'https://www.youtube.com/watch?v=lyxTPc96P28&list=RDlyxTPc96P28&start_radio=1', NULL, NULL, NULL, NULL, '2019-08-19 03:34:35', '2019-08-19 03:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(10) UNSIGNED NOT NULL,
  `viewable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint(20) UNSIGNED NOT NULL,
  `visitor` text COLLATE utf8mb4_unicode_ci,
  `collection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `viewable_type`, `viewable_id`, `visitor`, `collection`, `viewed_at`) VALUES
(2, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 11:42:51'),
(3, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 11:43:30'),
(4, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 11:43:32'),
(5, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 11:48:22'),
(6, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 11:48:34'),
(7, 'App\\Season', 2, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 11:48:52'),
(8, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 11:49:05'),
(9, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 11:50:20'),
(10, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:31:01'),
(11, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:35:14'),
(12, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:35:22'),
(13, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:35:32'),
(14, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:35:40'),
(15, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:35:58'),
(16, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:36:50'),
(17, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:37:24'),
(18, 'App\\Season', 2, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:37:30'),
(19, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 12:37:36'),
(20, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:05:32'),
(21, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:05:43'),
(22, 'App\\Season', 2, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:06:04'),
(23, 'App\\Season', 2, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:06:30'),
(24, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:06:37'),
(25, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:06:47'),
(26, 'App\\Season', 1, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:08:03'),
(27, 'App\\Season', 3, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:39:39'),
(28, 'App\\Season', 3, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-24 23:53:19'),
(29, 'App\\Season', 11, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-25 02:15:16'),
(30, 'App\\Season', 11, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-25 02:15:35'),
(31, 'App\\Season', 11, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-25 02:16:49'),
(32, 'App\\Season', 11, 'pas1RtobGOc7TTexQnv06q7FUqnWf4lUGI80v0qosgp2Hd6mwjN7uB89Q0nBhKXK6dALJZSvIA16QNso', NULL, '2019-07-25 02:17:15'),
(34, 'App\\Season', 1, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-08 03:03:21'),
(35, 'App\\Season', 1, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-08 03:04:37'),
(37, 'App\\Season', 2, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-09 02:02:43'),
(39, 'App\\Movie', 8, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-10 05:02:10'),
(40, 'App\\Movie', 9, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-10 05:26:53'),
(41, 'App\\Movie', 7, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-10 05:28:06'),
(42, 'App\\Movie', 7, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-10 05:49:08'),
(43, 'App\\Movie', 7, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-10 05:51:42'),
(44, 'App\\Season', 4, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-10 07:16:55'),
(45, 'App\\Movie', 9, '0Mf6OsPKxfncaAyuVB3zQegOS06OKa0x3bZfMh2vvoacPN4NmvZfxe8AQ7Hj1BrCbeu61rOAQ7xKaFlg', NULL, '2019-08-13 05:31:56'),
(46, 'App\\Season', 4, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-17 03:09:22'),
(47, 'App\\Season', 5, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-19 02:56:29'),
(48, 'App\\Movie', 13, 'u9CnnvaA36Au7ihUU9xwXnKLHrD8SW4wfc21hsA2VPlP3sAK311E2Yy1KgTSFn9Xm8Wju9bQKqNLCEtR', NULL, '2019-08-20 05:45:45'),
(49, 'App\\Movie', 8, 'E86dd27hHbnIkCHTJPNUaiGaAGFIk23cwfBKyW59uadE63j0aLdDLaNd5nx6iyEDwMVcc1QItoJ2CcX6', NULL, '2019-08-22 03:56:17'),
(50, 'App\\Movie', 14, 'E86dd27hHbnIkCHTJPNUaiGaAGFIk23cwfBKyW59uadE63j0aLdDLaNd5nx6iyEDwMVcc1QItoJ2CcX6', NULL, '2019-08-22 03:56:40'),
(51, 'App\\Movie', 14, 'E86dd27hHbnIkCHTJPNUaiGaAGFIk23cwfBKyW59uadE63j0aLdDLaNd5nx6iyEDwMVcc1QItoJ2CcX6', NULL, '2019-08-22 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `added` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `movie_id`, `season_id`, `added`, `created_at`, `updated_at`) VALUES
(3, 1, 8, NULL, 1, '2019-08-10 05:05:48', '2019-08-10 05:05:48'),
(4, 1, 7, NULL, 1, '2019-08-10 05:51:50', '2019-08-10 05:51:50'),
(5, 1, 9, NULL, 1, '2019-08-10 05:52:24', '2019-08-10 05:52:24'),
(6, 1, NULL, 4, 1, '2019-08-10 05:53:26', '2019-08-10 05:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_admins`
--

CREATE TABLE `wishlist_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `video_group_id` varchar(110) NOT NULL,
  `day` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_user_groups`
--

CREATE TABLE `wishlist_user_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `user_id` varchar(200) DEFAULT NULL,
  `created_At` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_At` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_video_groups`
--

CREATE TABLE `wishlist_video_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `movie_id` varchar(200) DEFAULT NULL,
  `tv_id` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist_video_groups`
--

INSERT INTO `wishlist_video_groups` (`id`, `title`, `movie_id`, `tv_id`, `created_at`, `updated_at`) VALUES
(1, 'Day 1', '[\"7\",\"8\",\"9\"]', '[\"4\"]', '2019-08-23 09:33:43', '2019-08-23 09:33:43'),
(2, 'Day 2', '[\"8\",\"10\",\"12\",\"34\"]', '[\"4\"]', '2019-08-23 09:34:02', '2019-08-23 09:34:02'),
(3, 'Day 3', '[\"24\",\"25\",\"29\"]', NULL, '2019-08-23 09:34:23', '2019-08-23 09:34:23'),
(4, 'Day 5', '[\"11\",\"12\",\"15\",\"16\"]', '[\"4\"]', '2019-08-23 09:34:46', '2019-08-23 09:34:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audio_languages`
--
ALTER TABLE `audio_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_customizes`
--
ALTER TABLE `auth_customizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_codes`
--
ALTER TABLE `coupon_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donater_lists`
--
ALTER TABLE `donater_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_seasons_id_foreign` (`seasons_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_translations`
--
ALTER TABLE `footer_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_slider_updates`
--
ALTER TABLE `front_slider_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_translations`
--
ALTER TABLE `header_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_sliders_movie_id_foreign` (`movie_id`),
  ADD KEY `home_sliders_tv_series_id_foreign` (`tv_series_id`);

--
-- Indexes for table `home_translations`
--
ALTER TABLE `home_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_pages`
--
ALTER TABLE `landing_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_videos`
--
ALTER TABLE `menu_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_videos_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_videos_movie_id_foreign` (`movie_id`),
  ADD KEY `menu_videos_tv_series_id_foreign` (`tv_series_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_series`
--
ALTER TABLE `movie_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_series_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `multiplescreens`
--
ALTER TABLE `multiplescreens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_menu`
--
ALTER TABLE `package_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paypal_subscriptions`
--
ALTER TABLE `paypal_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_email_unique` (`email`);

--
-- Indexes for table `player_settings`
--
ALTER TABLE `player_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popover_translations`
--
ALTER TABLE `popover_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_texts`
--
ALTER TABLE `pricing_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seasons_tv_series_id_foreign` (`tv_series_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtitles`
--
ALTER TABLE `subtitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `google_id` (`google_id`),
  ADD UNIQUE KEY `facebook_id` (`facebook_id`),
  ADD UNIQUE KEY `gitlab_id` (`gitlab_id`);

--
-- Indexes for table `videolinks`
--
ALTER TABLE `videolinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videolinks_movie_id_foreign` (`movie_id`),
  ADD KEY `videolinks_episode_id_foreign` (`episode_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlist_admins`
--
ALTER TABLE `wishlist_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist_user_groups`
--
ALTER TABLE `wishlist_user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist_video_groups`
--
ALTER TABLE `wishlist_video_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audio_languages`
--
ALTER TABLE `audio_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_customizes`
--
ALTER TABLE `auth_customizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon_codes`
--
ALTER TABLE `coupon_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donater_lists`
--
ALTER TABLE `donater_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_translations`
--
ALTER TABLE `footer_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `front_slider_updates`
--
ALTER TABLE `front_slider_updates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_translations`
--
ALTER TABLE `header_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_translations`
--
ALTER TABLE `home_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `landing_pages`
--
ALTER TABLE `landing_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_videos`
--
ALTER TABLE `menu_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie_series`
--
ALTER TABLE `movie_series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multiplescreens`
--
ALTER TABLE `multiplescreens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_menu`
--
ALTER TABLE `package_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_subscriptions`
--
ALTER TABLE `paypal_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player_settings`
--
ALTER TABLE `player_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `popover_translations`
--
ALTER TABLE `popover_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pricing_texts`
--
ALTER TABLE `pricing_texts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_icons`
--
ALTER TABLE `social_icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subtitles`
--
ALTER TABLE `subtitles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tv_series`
--
ALTER TABLE `tv_series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `videolinks`
--
ALTER TABLE `videolinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist_admins`
--
ALTER TABLE `wishlist_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist_user_groups`
--
ALTER TABLE `wishlist_user_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist_video_groups`
--
ALTER TABLE `wishlist_video_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_seasons_id_foreign` FOREIGN KEY (`seasons_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD CONSTRAINT `home_sliders_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `home_sliders_tv_series_id_foreign` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_videos`
--
ALTER TABLE `menu_videos`
  ADD CONSTRAINT `menu_videos_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_videos_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_videos_tv_series_id_foreign` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movie_series`
--
ALTER TABLE `movie_series`
  ADD CONSTRAINT `movie_series_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_tv_series_id_foreign` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videolinks`
--
ALTER TABLE `videolinks`
  ADD CONSTRAINT `videolinks_episode_id_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episodes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videolinks_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
