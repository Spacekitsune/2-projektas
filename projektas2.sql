-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 06:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektas2`
--

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_10_080853_create_statuses_table', 1),
(6, '2022_05_10_080854_create_priorities_table', 1),
(7, '2022_05_10_080855_create_projects_table', 1),
(8, '2022_05_10_080918_create_tasks_table', 1),
(9, '2022_05_13_094544_create_project_user_table', 1),
(10, '2022_08_18_134656_add_facebook_id_in_users_table', 1),
(11, '2022_08_18_142958_add_google_id_in_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `title`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Organized incremental function', 'Good-bye, feet!\' (for when she next peeped out the words: \'Where\'s the other guinea-pig cheered, and was beating her violently with its eyelids, Banana.', 2, NULL, '2022-11-06 13:30:28'),
(2, 'De-engineered 4th Banana core', 'English!\' said the Gryphon, sighing in his confusion he bit a large cat which was a body to cut it off from: that he shook his grey locks, \'I kept all my limbs very supple By the use of a book,\' thought Alice to herself, as well say,\' added the.', 2, NULL, '2022-11-06 10:33:14'),
(3, 'Proactive fault-tolerant extranet', 'In another moment down went Alice after it, never once considering how in the world she was to get out again.', 2, NULL, NULL),
(4, 'Managed mobile focus group', 'WHAT are you?\' said Alice, \'because I\'m not myself, you see.\' \'I don\'t know the meaning of half those long words, and, what\'s more, I don\'t think,\' Alice went timidly up to the Queen, \'and he shall tell you how it was all dark overhead; before her was.', 1, NULL, NULL),
(5, 'Pre-emptive real-time monitoring', 'Alice, with a T!\' said the Gryphon whispered in a minute or two, which gave the Pigeon the opportunity of saying to her that she wanted to send the hedgehog to, and, as the White Rabbit, \'and that\'s why. Pig!\' She said this last word two or three times.', 3, NULL, NULL),
(21, 'Re-contextualized clear-thinking structure', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 1, NULL, NULL),
(22, 'Extended hybrid middleware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, NULL, NULL),
(23, 'Profound attitude-oriented website', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 3, NULL, NULL),
(24, 'Phased local open architecture', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3, NULL, NULL),
(25, 'Organized coherent architecture', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(26, 'Pre-emptive mobile capacity', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', 1, NULL, NULL),
(27, 'Re-contextualized bottom-line Graphic Interface', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 3, NULL, NULL),
(28, 'Sharable interactive knowledge base', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 3, NULL, NULL),
(29, 'Enhanced regional artificial intelligence', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 2, NULL, NULL),
(30, 'Quality-focused intermediate moderator', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, NULL, NULL),
(31, 'Object-based dynamic synergy', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 3, NULL, NULL),
(32, 'Intuitive asymmetric local area network', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 1, NULL, NULL),
(33, 'Enhanced global software', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 2, NULL, NULL),
(34, 'Versatile logistical frame', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 2, NULL, NULL),
(35, 'Reactive secondary capacity', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 3, NULL, NULL),
(36, 'Multi-channelled composite help-desk', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 2, NULL, NULL),
(37, 'Self-enabling discrete access', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 2, NULL, NULL),
(38, 'Operative local secured line', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 3, NULL, NULL),
(39, 'Horizontal cohesive moderator', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 2, NULL, NULL),
(40, 'Open-source contextually-based matrix', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3, NULL, NULL),
(41, 'Expanded upward-trending utilisation', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 3, NULL, NULL),
(42, 'Visionary stable structure', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 1, NULL, NULL),
(43, 'Multi-lateral context-sensitive application', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 3, NULL, NULL),
(44, 'Universal intangible migration', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 3, NULL, NULL),
(45, 'Profit-focused holistic complexity', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, NULL, NULL),
(46, 'De-engineered foreground groupware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 2, NULL, NULL),
(47, 'Secured interactive protocol', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, NULL, NULL),
(48, 'Synchronised web-enabled initiative', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 3, NULL, NULL),
(49, 'Re-contextualized client-driven project', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 2, NULL, NULL),
(50, 'Self-enabling system-worthy orchestration', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(51, 'Vision-oriented high-level local area network', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 2, NULL, NULL),
(52, 'User-friendly foreground service-desk', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, NULL, NULL),
(53, 'Persistent responsive analyzer', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 2, NULL, NULL),
(54, 'Reduced background website', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 2, NULL, NULL),
(55, 'Focused exuding portal', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 2, NULL, NULL),
(56, 'Open-architected secondary solution', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 1, NULL, NULL),
(57, 'Digitized methodical methodology', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 1, NULL, NULL),
(58, 'Extended discrete matrix', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 3, NULL, NULL),
(59, 'Extended national definition', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 1, NULL, NULL),
(60, 'Managed holistic support', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 3, NULL, NULL),
(61, 'Focused radical definition', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(62, 'Persevering next generation help-desk', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, NULL, NULL),
(63, 'Visionary discrete middleware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 3, NULL, NULL),
(64, 'Function-based bottom-line emulation', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 3, NULL, NULL),
(65, 'Synergized 4th generation Graphical User Interface', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 2, NULL, NULL),
(66, 'Adaptive clear-thinking instruction set', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 1, NULL, NULL),
(67, 'Enterprise-wide tangible array', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 3, NULL, NULL),
(68, 'Diverse grid-enabled time-frame', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 1, NULL, NULL),
(69, 'Operative static initiative', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 3, NULL, NULL),
(70, 'Grass-roots context-sensitive access', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 3, NULL, NULL),
(71, 'Re-contextualized clear-thinking structure', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 1, NULL, NULL),
(72, 'Extended hybrid middleware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, NULL, NULL),
(73, 'Profound attitude-oriented website', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 3, NULL, NULL),
(74, 'Phased local open architecture', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3, NULL, NULL),
(75, 'Organized coherent architecture', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(76, 'Pre-emptive mobile capacity', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', 1, NULL, NULL),
(77, 'Re-contextualized bottom-line Graphic Interface', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 3, NULL, NULL),
(78, 'Sharable interactive knowledge base', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 3, NULL, NULL),
(79, 'Enhanced regional artificial intelligence', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 2, NULL, NULL),
(80, 'Quality-focused intermediate moderator', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, NULL, NULL),
(81, 'Object-based dynamic synergy', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 3, NULL, NULL),
(82, 'Intuitive asymmetric local area network', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 1, NULL, NULL),
(83, 'Enhanced global software', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 2, NULL, NULL),
(84, 'Versatile logistical frame', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 2, NULL, NULL),
(85, 'Reactive secondary capacity', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 3, NULL, NULL),
(86, 'Multi-channelled composite help-desk', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 2, NULL, NULL),
(87, 'Self-enabling discrete access', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 2, NULL, NULL),
(88, 'Operative local secured line', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 3, NULL, NULL),
(89, 'Horizontal cohesive moderator', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 2, NULL, NULL),
(90, 'Open-source contextually-based matrix', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3, NULL, NULL),
(91, 'Expanded upward-trending utilisation', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 3, NULL, NULL),
(92, 'Visionary stable structure', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 1, NULL, NULL),
(93, 'Multi-lateral context-sensitive application', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 3, NULL, NULL),
(94, 'Universal intangible migration', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 3, NULL, NULL),
(95, 'Profit-focused holistic complexity', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, NULL, NULL),
(96, 'De-engineered foreground groupware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 2, NULL, NULL),
(97, 'Secured interactive protocol', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, NULL, NULL),
(98, 'Synchronised web-enabled initiative', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 3, NULL, NULL),
(99, 'Re-contextualized client-driven project', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 2, NULL, NULL),
(100, 'Self-enabling system-worthy orchestration', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(101, 'Vision-oriented high-level local area network', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 2, NULL, NULL),
(102, 'User-friendly foreground service-desk', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, NULL, NULL),
(103, 'Persistent responsive analyzer', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 2, NULL, NULL),
(104, 'Reduced background website', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 2, NULL, NULL),
(105, 'Focused exuding portal', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 2, NULL, NULL),
(106, 'Open-architected secondary solution', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 1, NULL, NULL),
(107, 'Digitized methodical methodology', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 1, NULL, NULL),
(108, 'Extended discrete matrix', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 3, NULL, NULL),
(109, 'Extended national definition', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 1, NULL, NULL),
(110, 'Managed holistic support', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 3, NULL, NULL),
(111, 'Focused radical definition', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(112, 'Persevering next generation help-desk', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, NULL, NULL),
(113, 'Visionary discrete middleware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 3, NULL, NULL),
(114, 'Function-based bottom-line emulation', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 3, NULL, NULL),
(115, 'Synergized 4th generation Graphical User Interface', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 2, NULL, NULL),
(116, 'Adaptive clear-thinking instruction set', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 1, NULL, NULL),
(117, 'Enterprise-wide tangible array', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 3, NULL, NULL),
(118, 'Diverse grid-enabled time-frame', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 1, NULL, NULL),
(119, 'Operative static initiative', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 3, NULL, NULL),
(120, 'Grass-roots context-sensitive access', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 3, NULL, NULL),
(121, 'Re-contextualized clear-thinking structure', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 1, NULL, NULL),
(122, 'Extended hybrid middleware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, NULL, NULL),
(123, 'Profound attitude-oriented website', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 3, NULL, NULL),
(124, 'Phased local open architecture', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3, NULL, NULL),
(125, 'Organized coherent architecture', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(126, 'Pre-emptive mobile capacity', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', 1, NULL, NULL),
(127, 'Re-contextualized bottom-line Graphic Interface', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 3, NULL, NULL),
(128, 'Sharable interactive knowledge base', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 3, NULL, NULL),
(129, 'Enhanced regional artificial intelligence', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 2, NULL, NULL),
(130, 'Quality-focused intermediate moderator', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, NULL, NULL),
(131, 'Object-based dynamic synergy', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 3, NULL, NULL),
(132, 'Intuitive asymmetric local area network', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 1, NULL, NULL),
(133, 'Enhanced global software', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 2, NULL, NULL),
(134, 'Versatile logistical frame', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 2, NULL, NULL),
(135, 'Reactive secondary capacity', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 3, NULL, NULL),
(136, 'Multi-channelled composite help-desk', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 2, NULL, NULL),
(137, 'Self-enabling discrete access', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 2, NULL, NULL),
(138, 'Operative local secured line', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 3, NULL, NULL),
(139, 'Horizontal cohesive moderator', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 2, NULL, NULL),
(140, 'Open-source contextually-based matrix', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3, NULL, NULL),
(141, 'Expanded upward-trending utilisation', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 3, NULL, NULL),
(142, 'Visionary stable structure', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 1, NULL, NULL),
(143, 'Multi-lateral context-sensitive application', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 3, NULL, NULL),
(144, 'Universal intangible migration', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 3, NULL, NULL),
(145, 'Profit-focused holistic complexity', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, NULL, NULL),
(146, 'De-engineered foreground groupware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 2, NULL, NULL),
(147, 'Secured interactive protocol', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, NULL, NULL),
(148, 'Synchronised web-enabled initiative', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 3, NULL, NULL),
(149, 'Re-contextualized client-driven project', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 2, NULL, NULL),
(150, 'Self-enabling system-worthy orchestration', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(151, 'Vision-oriented high-level local area network', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 2, NULL, NULL),
(152, 'User-friendly foreground service-desk', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, NULL, NULL),
(153, 'Persistent responsive analyzer', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 2, NULL, NULL),
(154, 'Reduced background website', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 2, NULL, NULL),
(155, 'Focused exuding portal', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 2, NULL, NULL),
(156, 'Open-architected secondary solution', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 1, NULL, NULL),
(157, 'Digitized methodical methodology', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 1, NULL, NULL),
(158, 'Extended discrete matrix', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 3, NULL, NULL),
(159, 'Extended national definition', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 1, NULL, NULL),
(160, 'Managed holistic support', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 3, NULL, NULL),
(161, 'Focused radical definition', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(162, 'Persevering next generation help-desk', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, NULL, NULL),
(163, 'Visionary discrete middleware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 3, NULL, NULL),
(164, 'Function-based bottom-line emulation', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 3, NULL, NULL),
(165, 'Synergized 4th generation Graphical User Interface', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 2, NULL, NULL),
(166, 'Adaptive clear-thinking instruction set', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 1, NULL, NULL),
(167, 'Enterprise-wide tangible array', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 3, NULL, NULL),
(168, 'Diverse grid-enabled time-frame', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 1, NULL, NULL),
(169, 'Operative static initiative', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 3, NULL, NULL),
(170, 'Grass-roots context-sensitive access', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 3, NULL, NULL),
(171, 'Re-contextualized clear-thinking structure', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 1, NULL, NULL),
(172, 'Extended hybrid middleware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, NULL, NULL),
(173, 'Profound attitude-oriented website', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 3, NULL, NULL),
(174, 'Phased local open architecture', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3, NULL, NULL),
(175, 'Organized coherent architecture', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(176, 'Pre-emptive mobile capacity', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.', 1, NULL, NULL),
(177, 'Re-contextualized bottom-line Graphic Interface', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 3, NULL, NULL),
(178, 'Sharable interactive knowledge base', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 3, NULL, NULL),
(179, 'Enhanced regional artificial intelligence', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 2, NULL, NULL),
(180, 'Quality-focused intermediate moderator', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, NULL, NULL),
(181, 'Object-based dynamic synergy', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 3, NULL, NULL),
(182, 'Intuitive asymmetric local area network', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 1, NULL, NULL),
(183, 'Enhanced global software', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 2, NULL, NULL),
(184, 'Versatile logistical frame', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 2, NULL, NULL),
(185, 'Reactive secondary capacity', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 3, NULL, NULL),
(186, 'Multi-channelled composite help-desk', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 2, NULL, NULL),
(187, 'Self-enabling discrete access', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 2, NULL, NULL),
(188, 'Operative local secured line', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 3, NULL, NULL),
(189, 'Horizontal cohesive moderator', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 2, NULL, NULL),
(190, 'Open-source contextually-based matrix', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 3, NULL, NULL),
(191, 'Expanded upward-trending utilisation', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 3, NULL, NULL),
(192, 'Visionary stable structure', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 1, NULL, NULL),
(193, 'Multi-lateral context-sensitive application', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 3, NULL, NULL),
(194, 'Universal intangible migration', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 3, NULL, NULL),
(195, 'Profit-focused holistic complexity', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, NULL, NULL),
(196, 'De-engineered foreground groupware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 2, NULL, NULL),
(197, 'Secured interactive protocol', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, NULL, NULL),
(198, 'Synchronised web-enabled initiative', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 3, NULL, NULL),
(199, 'Re-contextualized client-driven project', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 2, NULL, NULL),
(200, 'Self-enabling system-worthy orchestration', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(201, 'Vision-oriented high-level local area network', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 2, NULL, NULL),
(202, 'User-friendly foreground service-desk', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 1, NULL, NULL),
(203, 'Persistent responsive analyzer', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 2, NULL, NULL),
(204, 'Reduced background website', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 2, NULL, NULL),
(205, 'Focused exuding portal', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 2, NULL, NULL),
(206, 'Open-architected secondary solution', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 1, NULL, NULL),
(207, 'Digitized methodical methodology', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 1, NULL, NULL),
(208, 'Extended discrete matrix', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 3, NULL, NULL),
(209, 'Extended national definition', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 1, NULL, NULL),
(210, 'Managed holistic support', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 2, NULL, '2022-11-06 13:35:34'),
(211, 'Focused radical definition', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2, NULL, NULL),
(212, 'Persevering next generation help-desk', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, NULL, NULL),
(213, 'Visionary discrete middleware', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 3, NULL, NULL),
(214, 'Function-based bottom-line emulation', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 3, NULL, NULL),
(215, 'Synergized 4th generation Graphical User Interface', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 2, NULL, NULL),
(216, 'Adaptive clear-thinking instruction set', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 1, NULL, NULL),
(217, 'Enterprise-wide tangible array', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 3, NULL, NULL),
(218, 'Diverse grid-enabled time-frame', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 1, NULL, NULL),
(219, 'Operative static initiative', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 3, NULL, NULL),
(220, 'Grass-roots context-sensitive access', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 2, '2022-11-04 13:44:47', '2022-11-04 13:44:47'),
(3, 5, '2022-11-04 13:44:47', '2022-11-04 13:44:47'),
(4, 2, '2022-11-04 13:44:47', '2022-11-04 13:44:47'),
(4, 3, '2022-11-04 13:44:47', '2022-11-04 13:44:47'),
(4, 1, '2022-11-04 13:44:47', '2022-11-04 13:44:47'),
(5, 5, '2022-11-04 13:44:47', '2022-11-04 13:44:47'),
(5, 4, '2022-11-04 13:44:47', '2022-11-04 13:44:47'),
(5, 3, '2022-11-04 13:44:47', '2022-11-04 13:44:47'),
(1, 5, '2022-11-06 10:31:20', '2022-11-06 10:31:20'),
(1, 3, '2022-11-06 10:31:20', '2022-11-06 10:31:20'),
(1, 1, '2022-11-06 10:31:20', '2022-11-06 10:31:20'),
(1, 4, '2022-11-06 10:31:20', '2022-11-06 10:31:20'),
(2, 2, '2022-11-06 10:33:14', '2022-11-06 10:33:14'),
(2, 1, '2022-11-06 10:33:14', '2022-11-06 10:33:14'),
(2, 4, '2022-11-06 10:33:14', '2022-11-06 10:33:14'),
(2, 5, '2022-11-06 10:33:14', '2022-11-06 10:33:14'),
(2, 3, '2022-11-06 10:33:14', '2022-11-06 10:33:14'),
(25, 1, NULL, NULL),
(216, 5, NULL, NULL),
(107, 1, NULL, NULL),
(1, 3, NULL, NULL),
(87, 2, NULL, NULL),
(27, 3, NULL, NULL),
(213, 4, NULL, NULL),
(116, 1, NULL, NULL),
(43, 3, NULL, NULL),
(52, 5, NULL, NULL),
(51, 1, NULL, NULL),
(194, 2, NULL, NULL),
(35, 5, NULL, NULL),
(107, 1, NULL, NULL),
(32, 1, NULL, NULL),
(205, 2, NULL, NULL),
(174, 4, NULL, NULL),
(71, 3, NULL, NULL),
(97, 3, NULL, NULL),
(169, 5, NULL, NULL),
(2, 2, NULL, NULL),
(116, 4, NULL, NULL),
(175, 1, NULL, NULL),
(114, 5, NULL, NULL),
(64, 5, NULL, NULL),
(102, 4, NULL, NULL),
(91, 5, NULL, NULL),
(160, 3, NULL, NULL),
(216, 2, NULL, NULL),
(3, 3, NULL, NULL),
(22, 2, NULL, NULL),
(104, 2, NULL, NULL),
(164, 4, NULL, NULL),
(153, 3, NULL, NULL),
(87, 3, NULL, NULL),
(122, 3, NULL, NULL),
(162, 4, NULL, NULL),
(126, 5, NULL, NULL),
(193, 4, NULL, NULL),
(92, 1, NULL, NULL),
(27, 1, NULL, NULL),
(93, 4, NULL, NULL),
(187, 3, NULL, NULL),
(191, 4, NULL, NULL),
(185, 4, NULL, NULL),
(134, 4, NULL, NULL),
(147, 5, NULL, NULL),
(180, 3, NULL, NULL),
(123, 2, NULL, NULL),
(87, 2, NULL, NULL),
(193, 5, NULL, NULL),
(220, 1, NULL, NULL),
(215, 2, NULL, NULL),
(165, 4, NULL, NULL),
(110, 2, NULL, NULL),
(175, 1, NULL, NULL),
(142, 1, NULL, NULL),
(149, 5, NULL, NULL),
(128, 5, NULL, NULL),
(118, 3, NULL, NULL),
(140, 2, NULL, NULL),
(62, 5, NULL, NULL),
(95, 2, NULL, NULL),
(84, 5, NULL, NULL),
(95, 4, NULL, NULL),
(158, 4, NULL, NULL),
(196, 2, NULL, NULL),
(96, 1, NULL, NULL),
(159, 5, NULL, NULL),
(24, 3, NULL, NULL),
(172, 3, NULL, NULL),
(198, 5, NULL, NULL),
(157, 4, NULL, NULL),
(81, 4, NULL, NULL),
(122, 3, NULL, NULL),
(210, 1, NULL, NULL),
(54, 2, NULL, NULL),
(41, 4, NULL, NULL),
(174, 5, NULL, NULL),
(132, 3, NULL, NULL),
(157, 3, NULL, NULL),
(142, 5, NULL, NULL),
(31, 2, NULL, NULL),
(97, 5, NULL, NULL),
(124, 3, NULL, NULL),
(59, 5, NULL, NULL),
(41, 1, NULL, NULL),
(138, 4, NULL, NULL),
(58, 2, NULL, NULL),
(218, 3, NULL, NULL),
(111, 4, NULL, NULL),
(48, 5, NULL, NULL),
(54, 4, NULL, NULL),
(153, 4, NULL, NULL),
(60, 5, NULL, NULL),
(203, 4, NULL, NULL),
(126, 3, NULL, NULL),
(130, 3, NULL, NULL),
(33, 1, NULL, NULL),
(189, 4, NULL, NULL),
(26, 3, NULL, NULL),
(36, 3, NULL, NULL),
(218, 3, NULL, NULL),
(113, 5, NULL, NULL),
(84, 4, NULL, NULL),
(207, 2, NULL, NULL),
(206, 4, NULL, NULL),
(200, 4, NULL, NULL),
(201, 2, NULL, NULL),
(108, 3, NULL, NULL),
(34, 3, NULL, NULL),
(195, 1, NULL, NULL),
(23, 1, NULL, NULL),
(129, 2, NULL, NULL),
(193, 2, NULL, NULL),
(79, 3, NULL, NULL),
(125, 1, NULL, NULL),
(122, 3, NULL, NULL),
(179, 3, NULL, NULL),
(183, 4, NULL, NULL),
(104, 1, NULL, NULL),
(74, 4, NULL, NULL),
(73, 4, NULL, NULL),
(153, 4, NULL, NULL),
(136, 2, NULL, NULL),
(136, 1, NULL, NULL),
(38, 2, NULL, NULL),
(124, 5, NULL, NULL),
(111, 5, NULL, NULL),
(177, 2, NULL, NULL),
(204, 3, NULL, NULL),
(70, 4, NULL, NULL),
(39, 4, NULL, NULL),
(126, 1, NULL, NULL),
(87, 3, NULL, NULL),
(39, 2, NULL, NULL),
(142, 1, NULL, NULL),
(46, 1, NULL, NULL),
(122, 5, NULL, NULL),
(54, 4, NULL, NULL),
(56, 5, NULL, NULL),
(91, 5, NULL, NULL),
(37, 3, NULL, NULL),
(184, 2, NULL, NULL),
(183, 2, NULL, NULL),
(109, 5, NULL, NULL),
(113, 3, NULL, NULL),
(210, 6, NULL, NULL),
(170, 6, NULL, NULL),
(33, 6, NULL, NULL),
(38, 6, NULL, NULL),
(135, 6, NULL, NULL),
(46, 6, NULL, NULL),
(156, 6, NULL, NULL),
(140, 6, NULL, NULL),
(49, 6, NULL, NULL),
(131, 6, NULL, NULL),
(45, 6, NULL, NULL),
(150, 6, NULL, NULL),
(198, 6, NULL, NULL),
(37, 6, NULL, NULL),
(158, 6, NULL, NULL),
(201, 6, NULL, NULL),
(151, 6, NULL, NULL),
(165, 6, NULL, NULL),
(35, 6, NULL, NULL),
(169, 6, NULL, NULL),
(111, 6, NULL, NULL),
(92, 6, NULL, NULL),
(99, 6, NULL, NULL),
(124, 6, NULL, NULL),
(131, 6, NULL, NULL),
(171, 6, NULL, NULL),
(216, 6, NULL, NULL),
(22, 6, NULL, NULL),
(114, 6, NULL, NULL),
(168, 6, NULL, NULL),
(134, 6, NULL, NULL),
(83, 6, NULL, NULL),
(57, 6, NULL, NULL),
(95, 6, NULL, NULL),
(38, 6, NULL, NULL),
(43, 6, NULL, NULL),
(65, 6, NULL, NULL),
(25, 6, NULL, NULL),
(181, 6, NULL, NULL),
(172, 6, NULL, NULL),
(197, 6, NULL, NULL),
(162, 6, NULL, NULL),
(160, 6, NULL, NULL),
(216, 6, NULL, NULL),
(145, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `title`) VALUES
(1, 'To do'),
(2, 'In progress'),
(3, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `priority_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `project_id`, `user_id`, `status_id`, `priority_id`, `created_at`, `updated_at`) VALUES
(1, 'Synergistic solution-oriented intranet', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.', 1, 1, 2, 1, NULL, '2022-11-06 11:48:05'),
(2, 'Operative web-enabled installation', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.', 1, 1, 3, 1, NULL, NULL),
(3, 'Quality-focused multi-state project', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 1, 1, 3, 1, NULL, '2022-11-06 13:30:28'),
(4, 'Balanced responsive matrices', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 2, 1, 3, 2, NULL, NULL),
(5, 'Automated exuding Graphical User Interface', 'Fusce consequat. Nulla nisl. Nunc nisl.', 2, 1, 2, 2, NULL, NULL),
(6, 'Secured background initiative', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 2, 1, 2, 2, NULL, NULL),
(7, 'Configurable well-modulated approach', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 3, 1, 3, 3, NULL, NULL),
(8, 'Cross-group explicit functionalities', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', 3, 1, 2, 3, NULL, NULL),
(9, 'Up-sized holistic contingency', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 3, 1, 1, 3, NULL, NULL),
(10, 'Profit-focused systematic hierarchy', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 5, 1, 3, 1, NULL, NULL),
(11, 'Business-focused encompassing capacity', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 5, 1, 3, 1, NULL, NULL),
(23, 'Task210-1', 'Task210-1', 210, 1, 1, 1, '2022-11-06 13:35:34', '2022-11-06 13:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `facebook_id`, `google_id`) VALUES
(1, 'Dr. Lucienne Orn PhD', 'hudson.aubree@example.org', '2022-11-04 13:44:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U4jFwzIK8Q1WEVlgbCWUBRPyl8iUoIi7Si1DIuF91fm8tB4qAPr9SZKbIweU', '2022-11-04 13:44:47', '2022-11-04 13:44:47', NULL, NULL),
(2, 'Jayne Thompson', 'bonita90@example.net', '2022-11-04 13:44:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IIbo3sZu1htCFbqaLyfY1V4ZVizyfWuSD5EKor7PBqpGywYPhJLsCl2csIE3', '2022-11-04 13:44:47', '2022-11-04 13:44:47', NULL, NULL),
(3, 'Keanu Hahn MD', 'eugene.gibson@example.com', '2022-11-04 13:44:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wRamFngfOD', '2022-11-04 13:44:47', '2022-11-04 13:44:47', NULL, NULL),
(4, 'Prof. Dawn Boyer', 'tracey.beatty@example.org', '2022-11-04 13:44:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1OP0UHnnoO', '2022-11-04 13:44:47', '2022-11-04 13:44:47', NULL, NULL),
(5, 'Jamarcus Walker PhD', 'stiedemann.lesly@example.net', '2022-11-04 13:44:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VtvDGdYA3m', '2022-11-04 13:44:47', '2022-11-04 13:44:47', NULL, NULL),
(6, 'kuki', 'uki.chian@gmail.com', NULL, '$2y$10$6ZdNzlR6kZ5f20TJSwukD.1XwNsd71vP.A/sVhvXXm9SDxzl/ioYi', NULL, '2022-11-04 14:01:56', '2022-11-04 14:01:56', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_status_id_foreign` (`status_id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD KEY `project_user_project_id_foreign` (`project_id`),
  ADD KEY `project_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`),
  ADD KEY `tasks_status_id_foreign` (`status_id`),
  ADD KEY `tasks_priority_id_foreign` (`priority_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `project_user_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`),
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `tasks_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
