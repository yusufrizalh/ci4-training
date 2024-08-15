-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 08:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `created_at`, `updated_at`) VALUES
(1, 'Human Resource', '2024-08-15 02:39:20', NULL),
(2, 'Public Relation', '2024-08-15 02:39:30', NULL),
(3, 'Technology', '2024-08-15 02:39:38', NULL),
(4, 'Accounting', '2024-08-15 02:39:45', NULL),
(5, 'Marketing', '2024-08-15 02:39:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Francisca Johnson', 'francisca.johnson@email.com', '766569445630', NULL, '2024-08-13 07:14:09', '2024-08-13 07:21:58'),
(2, 'Fiona Roberts', 'russell.jayden@evans.com', '665956343320', 'Studio 98 Muhammad Rapids', '2024-08-13 07:22:54', NULL),
(3, 'Victoria Walsh', 'xbaker@morris.com', '855641120955', 'Studio 84u Riley Viaduct', '2024-08-13 07:23:22', NULL),
(4, 'Christopher Hunter', 'mprice@hill.co.uk', '944520037540', 'Studio 84i Henry Crossing', '2024-08-13 07:23:45', NULL),
(5, 'Patricia Hill', 'chris.davies@gmail.co.uk', '660599342030', 'Studio 81 Griffiths Orchard', '2024-08-13 07:24:10', NULL),
(6, 'Louis Mason', 'walker.ellie@yahoo.co.uk', '7556405596', '3 Campbell Hollow', '2024-08-13 07:24:45', NULL),
(7, 'Anthony Bailey', 'kelly.benjamin@hotmail.com', '800453954750', '9 Brandon Wells', '2024-08-13 07:25:07', NULL),
(8, 'Sienna Harrison', 'murphy.kirsten@yahoo.co.uk', '5776004530', '236 Cox Greens', '2024-08-13 07:25:26', NULL),
(9, 'Dave James', 'davis.christopher@hotmail.co.uk', '775069976012', '04 Vanessa Divide', '2024-08-13 07:25:44', NULL),
(11, 'Mats Bosmans', 'geerts.ines@massart.net', '76685766504', 'chemin Sahin 28', '2024-08-14 07:01:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`, `created_at`, `updated_at`) VALUES
(1, 'HTML CSS JS', '2024-08-15 04:42:25', NULL),
(2, 'Database', '2024-08-15 04:42:30', NULL),
(3, 'Networking', '2024-08-15 04:42:35', NULL),
(4, 'Security', '2024-08-15 04:42:40', NULL),
(5, 'Framework', '2024-08-15 04:42:48', NULL),
(6, 'Server', '2024-08-15 04:43:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `usermail` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `fk_dept_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `usermail`, `userpass`, `status`, `created_at`, `updated_at`, `fk_dept_id`) VALUES
(1, 'Helena Johnson', 'helena.johnson@email.com', 'password', 1, '2024-08-15 04:47:46', NULL, 2),
(2, 'Olla Stevenson', 'olla.stevenson@email.com', 'password', 1, '2024-08-15 04:48:07', NULL, 3),
(3, 'Anya Cruickshank', 'erling42@hotmail.com', '6C{d=/Qv', 1, '2024-08-15 06:39:55', NULL, 1),
(4, 'Lonie Smitham II', 'ytoy@yahoo.com', 'UX9&~<A9ZY#Y', 1, '2024-08-15 06:39:55', NULL, 5),
(5, 'Dr. Blake Keeling', 'dbayer@graham.info', '3k`j5M=S\"PN5>Qo|', 0, '2024-08-15 06:39:55', NULL, 3),
(6, 'Bobbie Heathcote IV', 'nadia94@yahoo.com', '$],W=2;;JFmbL.n', 0, '2024-08-15 06:39:55', NULL, 3),
(7, 'Yolanda McDermott', 'macejkovic.electa@hotmail.com', 'k$f;$1EY&iJXH', 0, '2024-08-15 06:39:55', NULL, 1),
(8, 'Osvaldo Bernhard', 'towne.elna@bins.com', '{%[*C6k`_y6E', 0, '2024-08-15 06:39:55', NULL, 4),
(9, 'Aida Hoeger', 'dickinson.margarette@gmail.com', '!tgMD|D#aK_%<{Apm7', 0, '2024-08-15 06:39:55', NULL, 1),
(10, 'Delfina Kuhic MD', 'ulabadie@swaniawski.com', 'O7vS_#X0<x>Y7zj25', 1, '2024-08-15 06:39:55', NULL, 4),
(11, 'Jessika Jerde MD', 'leila21@stark.org', 'PM>9rt_bq9Y`3|:6S0LI', 1, '2024-08-15 06:39:55', NULL, 5),
(12, 'Mrs. Kavon Weimann IV', 'dexter.fahey@hotmail.com', '@HkbY^U\"+c4L{_TLG<U', 0, '2024-08-15 06:39:55', NULL, 3),
(13, 'Joshuah Cronin', 'qgerlach@wintheiser.com', '5\"-p5r~.DcKd', 0, '2024-08-15 06:39:55', NULL, 2),
(14, 'Jaylen Kirlin', 'jasen.hansen@mills.com', '}oAS]=q/-DYZS`DxZwk!', 0, '2024-08-15 06:39:55', NULL, 3),
(15, 'Mr. Magnus McGlynn', 'rosie62@bode.com', '/:D\\2k!$', 1, '2024-08-15 06:39:55', NULL, 1),
(16, 'Ned Olson', 'abartoletti@yahoo.com', '}VvZ7RSNjJ:Mlg-cbW^%', 1, '2024-08-15 06:39:55', NULL, 4),
(17, 'Dr. Erik Kub MD', 'ghahn@terry.com', 'dJTsrw]bf#T72{Y', 0, '2024-08-15 06:39:55', NULL, 4),
(18, 'Annabelle Lockman', 'rgoldner@smitham.com', ';.|},P?li8h', 1, '2024-08-15 06:39:55', NULL, 4),
(19, 'Ivah Johnston', 'samanta.heaney@konopelski.com', '/.u0zRm\"ua<3?A', 1, '2024-08-15 06:39:55', NULL, 5),
(20, 'Jaycee Wiza', 'ohara.lillian@mann.com', '1\'x&Zk\"6H3GO', 1, '2024-08-15 06:39:55', NULL, 3),
(21, 'Dr. Margret Leannon', 'bhuels@hotmail.com', 'Df,t}u', 1, '2024-08-15 06:39:55', NULL, 5),
(22, 'Dr. Erin Lubowitz DDS', 'eldon.dooley@yahoo.com', 'd:h@P8E6L@bKiNlx.;_B', 1, '2024-08-15 06:39:55', NULL, 4),
(23, 'Golden Terry', 'marks.toy@hotmail.com', 'kF7uQs~', 0, '2024-08-15 06:39:55', NULL, 1),
(24, 'Amina Crooks V', 'lizeth16@gmail.com', '\"mPKq||DP%~-;5<`+>yZ', 1, '2024-08-15 06:39:55', NULL, 3),
(25, 'Miss Ashlynn Shanahan PhD', 'nkassulke@bode.com', 'ms<KB;Oy;7p', 1, '2024-08-15 06:39:55', NULL, 2),
(26, 'Mrs. Billie Hane MD', 'yvette.bogan@borer.com', 'PLN|2qZSw', 0, '2024-08-15 06:39:55', NULL, 5),
(27, 'Amiya Huel', 'layla.cruickshank@rolfson.org', '!Oy_V{]<*2\'k3(A1^O', 0, '2024-08-15 06:39:55', NULL, 5),
(28, 'Prof. Santiago Goodwin', 'schiller.alize@yahoo.com', '2*&,^O\"`amL~\\!k0>G', 0, '2024-08-15 06:39:55', NULL, 4),
(29, 'Russell Rath II', 'hilpert.nova@yahoo.com', '!e|%&df=', 0, '2024-08-15 06:39:55', NULL, 3),
(30, 'Rebeka Jacobson', 'blake39@gmail.com', '9?17tH;v_nr5cj`mrAT', 0, '2024-08-15 06:39:55', NULL, 1),
(31, 'Stella Hahn', 'peter.kerluke@hotmail.com', '(8al(2^\'c', 1, '2024-08-15 06:39:55', NULL, 3),
(32, 'Dr. Beryl Ondricka', 'smitham.van@wehner.org', 'q</t&!<aT>Z|+', 0, '2024-08-15 06:39:55', NULL, 2),
(33, 'Miss Cecile Breitenberg', 'hand.ashlynn@moore.com', 'HnP8#pf\"(l_)e', 1, '2024-08-15 06:39:55', NULL, 1),
(34, 'Dr. Mack Hettinger II', 'dina.runolfsson@rodriguez.com', '3MIZbAY6SG[k>q7Y', 1, '2024-08-15 06:39:55', NULL, 3),
(35, 'Prof. Bradford Wisoky III', 'estanton@wilderman.com', 'ddM;`-3rf', 0, '2024-08-15 06:39:55', NULL, 1),
(36, 'Wilfrid Mitchell', 'balistreri.bud@hotmail.com', 'N;{RLNTQ$X4h\"c13QN', 1, '2024-08-15 06:39:55', NULL, 3),
(37, 'Bridget Wolf', 'xborer@altenwerth.com', '\'9`({sV#Tby56NFl', 0, '2024-08-15 06:39:55', NULL, 3),
(38, 'Jaunita Reynolds', 'katelyn92@hotmail.com', '}D[r\\;!@t%.k', 1, '2024-08-15 06:39:55', NULL, 4),
(39, 'Prof. Casimer Wehner', 'roob.dandre@torp.com', 'j=hl8xG&`o3', 1, '2024-08-15 06:39:55', NULL, 4),
(40, 'Dr. Precious Schmeler', 'pollich.jerad@wuckert.com', '.Y70oLvm1h', 0, '2024-08-15 06:39:55', NULL, 4),
(41, 'Timmothy Beahan', 'lucile.kilback@mraz.com', '/54\"^9rlo', 1, '2024-08-15 06:39:55', NULL, 4),
(42, 'Mr. Rico Jenkins', 'effertz.christiana@hotmail.com', 'i-1^/\\nw&mNF|d\'2[5~,', 0, '2024-08-15 06:39:55', NULL, 2),
(43, 'Amari Weimann', 'ernest98@hotmail.com', '|SsJmr+!*igC#oO', 0, '2024-08-15 06:39:55', NULL, 1),
(44, 'Darron Schimmel', 'derek80@yahoo.com', '~:qFILip', 1, '2024-08-15 06:39:55', NULL, 5),
(45, 'Ashleigh Schamberger', 'dion.windler@yahoo.com', '3{QNw~G\'2', 0, '2024-08-15 06:39:55', NULL, 4),
(46, 'Domenico Cronin', 'caesar23@russel.com', '$C||7Y7PG0=XvM\"x)', 1, '2024-08-15 06:39:55', NULL, 3),
(47, 'Miss Shaina Heathcote', 'damore.taurean@gmail.com', '!7}k5pxnHY~Y|~@Lnk1l', 0, '2024-08-15 06:39:55', NULL, 4),
(48, 'Ursula Murphy', 'sheaney@beahan.info', '%Vo*IG^', 1, '2024-08-15 06:39:55', NULL, 2),
(49, 'Prof. Edmund Bartoletti MD', 'max.kerluke@jones.com', '0kCsdv*Dp7B0a|C\'', 1, '2024-08-15 06:39:55', NULL, 3),
(50, 'Palma Purdy', 'mcglynn.cassidy@gmail.com', 'j*8`@]WHf', 0, '2024-08-15 06:39:55', NULL, 1),
(51, 'Claudie Brekke', 'audie.buckridge@dooley.com', 'fgwSnMACoON~<W}', 1, '2024-08-15 06:39:55', NULL, 5),
(52, 'Lambert Nader Sr.', 'streich.edythe@hickle.com', '}*k~G?', 1, '2024-08-15 06:39:55', NULL, 1),
(53, 'Gust Jenkins', 'ethiel@gmail.com', '/e!V!8{M', 1, '2024-08-15 06:39:55', NULL, 4),
(54, 'Lindsay Beahan', 'bart15@kerluke.biz', 'i,s$MVa>qYI=t^p1V/\\', 0, '2024-08-15 06:39:55', NULL, 3),
(55, 'Ms. Esta Hand II', 'louisa33@pfeffer.net', '6&a&hLPvOepNuQ]_', 0, '2024-08-15 06:39:55', NULL, 5),
(56, 'Ethyl Bednar DDS', 'mathew.bayer@daugherty.info', '5:l\\{N|T', 0, '2024-08-15 06:39:55', NULL, 5),
(57, 'Mrs. Yoshiko Ledner DVM', 'freda.upton@hotmail.com', '.:YFv`OyH,SfUbb', 1, '2024-08-15 06:39:55', NULL, 5),
(58, 'Fredy Williamson', 'timmy.stamm@hotmail.com', '{UxK6pckN`,I`4', 0, '2024-08-15 06:39:55', NULL, 4),
(59, 'Hayden Wehner', 'kennedi68@hotmail.com', '^p6UTU53CU3),o\"&Uga}', 1, '2024-08-15 06:39:55', NULL, 5),
(60, 'Kaycee Weissnat', 'brittany.brekke@hotmail.com', '[.Fgq?]FW4U-7FYkzjoN', 1, '2024-08-15 06:39:55', NULL, 1),
(61, 'Mrs. Jennifer Breitenberg', 'ubailey@johnson.com', '?u<Q(=', 0, '2024-08-15 06:39:55', NULL, 4),
(62, 'Ottis Boyer', 'wilburn.kub@hotmail.com', '@63^b.P@nc+q..@=zM', 1, '2024-08-15 06:39:55', NULL, 5),
(63, 'Gideon Hammes Sr.', 'isobel21@bernhard.org', 'xd%P]{H%2QBfwh_)HgM', 0, '2024-08-15 06:39:55', NULL, 5),
(64, 'Prof. Johan Cole DVM', 'hand.pasquale@watsica.com', 'nEr\'k3zu', 1, '2024-08-15 06:39:55', NULL, 3),
(65, 'Ms. Isabell Morar', 'flatley.dino@gmail.com', '~%|#R5a|x~E', 1, '2024-08-15 06:39:55', NULL, 5),
(66, 'Ms. Laurine Baumbach', 'layla82@yahoo.com', '6z%9Z!#BZ*', 0, '2024-08-15 06:39:55', NULL, 1),
(67, 'Dr. Abel Paucek Sr.', 'eichmann.doug@skiles.com', 'ZqC=Q?sem<<', 0, '2024-08-15 06:39:55', NULL, 5),
(68, 'Loy Ortiz I', 'lgoodwin@gmail.com', 'i<_=V!', 0, '2024-08-15 06:39:55', NULL, 5),
(69, 'Prof. Phyllis Bernier Jr.', 'davis.buck@gmail.com', 'ZL`<oHn)0ieC|&_\"|', 1, '2024-08-15 06:39:55', NULL, 5),
(70, 'Velda Pfeffer IV', 'keyshawn27@kirlin.com', 'Rxuh-b', 1, '2024-08-15 06:39:55', NULL, 4),
(71, 'Dr. Izaiah Schultz PhD', 'egottlieb@yahoo.com', 'nq\'6v|', 1, '2024-08-15 06:39:55', NULL, 2),
(72, 'Prof. Mac Abernathy', 'williamson.green@turcotte.com', '~]6bBzMvsw\"', 0, '2024-08-15 06:39:55', NULL, 5),
(73, 'Cynthia Abbott', 'baylee.gerlach@hotmail.com', ',ys+g8]M&h', 0, '2024-08-15 06:39:55', NULL, 3),
(74, 'Corbin Monahan', 'dwilliamson@gmail.com', 'rf*>8h\"', 0, '2024-08-15 06:39:55', NULL, 2),
(75, 'Antonia Schiller', 'gregory.schmidt@mcdermott.com', ']LW8>6ux<\"', 1, '2024-08-15 06:39:55', NULL, 2),
(76, 'Maribel Pacocha DVM', 'jean.waelchi@yahoo.com', 'Qifl[DD|', 1, '2024-08-15 06:39:55', NULL, 4),
(77, 'Lilla Sipes', 'montana80@gmail.com', 'Z|9\'iOeS5N', 1, '2024-08-15 06:39:55', NULL, 1),
(78, 'Nels Dickinson', 'ajohns@ohara.com', 'vx.}e1oC@', 1, '2024-08-15 06:39:55', NULL, 2),
(79, 'Dr. Vivianne Koss', 'kkuvalis@hotmail.com', 'dW\'o[){hIJ`', 1, '2024-08-15 06:39:55', NULL, 2),
(80, 'Cedrick Metz', 'beer.lawrence@yahoo.com', 'uSm\'QWPeL7', 0, '2024-08-15 06:39:55', NULL, 5),
(81, 'Marco Toy', 'stokes.mike@hotmail.com', '+|hhsvS=', 0, '2024-08-15 06:39:55', NULL, 4),
(82, 'Neoma Skiles', 'hbashirian@murray.com', 'wG,(::\\RC-Hl=J', 0, '2024-08-15 06:39:55', NULL, 5),
(83, 'Mckayla Wiza III', 'norris.bogisich@hotmail.com', 'kRQz.A;r}{', 0, '2024-08-15 06:39:55', NULL, 3),
(84, 'Maye Mills', 'abshire.mavis@carter.com', '\\-l9\'q', 0, '2024-08-15 06:39:55', NULL, 2),
(85, 'Lia Becker', 'xgerhold@wyman.net', '?n[\'ff&_W~wj6L&tM;p$', 0, '2024-08-15 06:39:55', NULL, 1),
(86, 'Hector Zulauf', 'houston02@doyle.com', 'L>q7y4+iLd0d^~_EU,', 0, '2024-08-15 06:39:55', NULL, 3),
(87, 'Alyce Windler', 'randal96@gmail.com', 'x;g!)FrqADaU7T%NY3v', 1, '2024-08-15 06:39:55', NULL, 3),
(88, 'Kaylin Simonis I', 'mario09@thiel.com', 'F~bd4|f\'', 0, '2024-08-15 06:39:55', NULL, 4),
(89, 'Laisha Emmerich', 'vdouglas@farrell.com', 'o$~$4#u7or$9u-H', 0, '2024-08-15 06:39:55', NULL, 1),
(90, 'Mrs. Christy Rice IV', 'adaline.cronin@upton.com', 'xKBjV8', 0, '2024-08-15 06:39:55', NULL, 4),
(91, 'Giovanni Cruickshank', 'funk.ulises@corwin.com', 'ah*(yQGL7x.];kEPkh', 1, '2024-08-15 06:39:55', NULL, 3),
(92, 'Dr. Milford Connelly', 'quinton.stanton@hotmail.com', 'sL~/Y\\u{OH', 1, '2024-08-15 06:39:55', NULL, 2),
(93, 'Lyric Sanford', 'rgutkowski@halvorson.biz', 'w2>i9TYCHYe!y:qLW}', 1, '2024-08-15 06:39:55', NULL, 1),
(94, 'Carli Koch', 'walker.jermaine@stokes.com', '|8aE<NiB', 0, '2024-08-15 06:39:55', NULL, 5),
(95, 'Jalen Connelly', 'samara.reichel@yahoo.com', '>j=~[5^', 0, '2024-08-15 06:39:55', NULL, 2),
(96, 'Junius Renner PhD', 'schaden.allie@smitham.com', 'p#o6*FKX|', 0, '2024-08-15 06:39:56', NULL, 3),
(97, 'Monique Schaden', 'ernser.nolan@kozey.org', '`gjHg:=+Z', 1, '2024-08-15 06:39:56', NULL, 2),
(98, 'Esperanza Hilpert', 'jacobson.ivory@zemlak.net', 'q@D^t0*hx~JX9#=', 0, '2024-08-15 06:39:56', NULL, 4),
(99, 'Chase Roberts', 'charlene.legros@schowalter.com', 'Q\"<L\"q(<<|^KEKl', 1, '2024-08-15 06:39:56', NULL, 2),
(100, 'Mrs. June Stokes', 'landen87@hotmail.com', 'b[%GGpwpod`LP\"1sj[9', 1, '2024-08-15 06:39:56', NULL, 4),
(101, 'Ashley Stracke', 'willard.ratke@yahoo.com', 'WSV%jY9', 0, '2024-08-15 06:39:56', NULL, 2),
(102, 'Johanna McGlynn Sr.', 'delphia18@padberg.com', '~V&I`(aw[9T7G', 0, '2024-08-15 06:39:56', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `userskills`
--

CREATE TABLE `userskills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fk_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fk_skill_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userskills`
--

INSERT INTO `userskills` (`id`, `fk_user_id`, `fk_skill_id`) VALUES
(4, 2, 1),
(5, 2, 3),
(6, 2, 4),
(7, 2, 6),
(8, 93, 1),
(9, 50, 4),
(10, 32, 3),
(11, 31, 1),
(12, 84, 1),
(13, 15, 3),
(14, 64, 2),
(15, 45, 1),
(16, 92, 4),
(17, 79, 2),
(18, 16, 1),
(19, 29, 2),
(20, 88, 1),
(21, 69, 1),
(22, 24, 1),
(23, 85, 3),
(24, 20, 2),
(25, 93, 1),
(26, 21, 3),
(27, 33, 5),
(28, 15, 2),
(29, 41, 3),
(30, 35, 3),
(31, 44, 4),
(32, 79, 4),
(33, 65, 4),
(34, 45, 1),
(35, 24, 4),
(36, 35, 3),
(37, 28, 2),
(38, 25, 5),
(39, 26, 2),
(40, 37, 4),
(41, 2, 1),
(42, 72, 5),
(43, 67, 2),
(44, 29, 1),
(45, 63, 4),
(46, 38, 4),
(47, 73, 2),
(48, 60, 3),
(49, 81, 5),
(50, 80, 6),
(51, 23, 2),
(52, 98, 2),
(53, 47, 4),
(54, 31, 2),
(55, 88, 1),
(56, 92, 5),
(57, 30, 1),
(58, 79, 3),
(59, 18, 2),
(60, 25, 2),
(61, 16, 6),
(62, 90, 1),
(63, 70, 2),
(64, 88, 3),
(65, 11, 4),
(66, 9, 4),
(67, 41, 4),
(68, 12, 2),
(69, 3, 6),
(70, 49, 5),
(71, 64, 3),
(72, 17, 1),
(73, 22, 4),
(74, 35, 6),
(75, 18, 5),
(76, 6, 4),
(77, 26, 1),
(78, 100, 2),
(79, 39, 1),
(80, 79, 3),
(81, 47, 4),
(82, 30, 5),
(83, 46, 1),
(84, 29, 6),
(85, 6, 2),
(86, 3, 4),
(87, 87, 5),
(88, 25, 2),
(89, 45, 2),
(90, 25, 4),
(91, 24, 3),
(92, 25, 6),
(93, 56, 2),
(94, 6, 3),
(95, 20, 3),
(96, 22, 2),
(97, 47, 3),
(98, 6, 4),
(99, 37, 5),
(100, 15, 5),
(101, 62, 1),
(102, 2, 1),
(103, 101, 3),
(104, 59, 4),
(105, 44, 3),
(106, 51, 6),
(107, 6, 4),
(108, 62, 3),
(109, 34, 6),
(110, 99, 4),
(111, 8, 5),
(112, 68, 5),
(113, 19, 3),
(114, 55, 5),
(115, 65, 4),
(116, 18, 2),
(117, 6, 6),
(118, 57, 5),
(119, 60, 6),
(120, 59, 3),
(121, 53, 4),
(122, 36, 6),
(123, 102, 6),
(124, 45, 2),
(125, 75, 1),
(126, 90, 3),
(127, 96, 6),
(128, 13, 1),
(129, 40, 2),
(130, 54, 2),
(131, 69, 6),
(132, 33, 5),
(133, 95, 6),
(134, 11, 5),
(135, 102, 5),
(136, 65, 6),
(137, 32, 5),
(138, 42, 2),
(139, 3, 6),
(140, 28, 4),
(141, 96, 3),
(142, 3, 6),
(143, 2, 4),
(144, 9, 3),
(145, 79, 6),
(146, 83, 3),
(147, 39, 3),
(148, 43, 2),
(149, 63, 6),
(150, 42, 2),
(151, 94, 5),
(152, 39, 3),
(153, 22, 3),
(154, 28, 5),
(155, 102, 5),
(156, 59, 6),
(157, 8, 1),
(158, 90, 1),
(159, 19, 2),
(160, 8, 1),
(161, 24, 4),
(162, 99, 1),
(163, 93, 5),
(164, 34, 5),
(165, 87, 5),
(166, 82, 6),
(167, 39, 2),
(168, 46, 5),
(169, 80, 3),
(170, 89, 3),
(171, 30, 3),
(172, 102, 1),
(173, 64, 5),
(174, 58, 1),
(175, 89, 1),
(176, 86, 3),
(177, 3, 1),
(178, 88, 3),
(179, 52, 5),
(180, 56, 6),
(181, 25, 2),
(182, 7, 1),
(183, 101, 2),
(184, 32, 1),
(185, 7, 5),
(186, 5, 1),
(187, 37, 2),
(188, 36, 2),
(189, 26, 1),
(190, 33, 3),
(191, 77, 2),
(192, 11, 6),
(193, 2, 2),
(194, 79, 2),
(195, 7, 6),
(196, 30, 1),
(197, 90, 2),
(198, 55, 2),
(199, 21, 1),
(200, 27, 6),
(201, 43, 4),
(202, 95, 1),
(203, 44, 3),
(204, 9, 1),
(205, 66, 6),
(206, 68, 3),
(207, 14, 4),
(208, 63, 2),
(209, 60, 1),
(210, 89, 3),
(211, 98, 5),
(212, 86, 1),
(213, 19, 5),
(214, 27, 4),
(215, 75, 4),
(216, 61, 2),
(217, 100, 4),
(218, 20, 3),
(219, 61, 3),
(220, 31, 1),
(221, 71, 3),
(222, 9, 1),
(223, 49, 2),
(224, 1, 3),
(225, 61, 1),
(226, 22, 3),
(227, 6, 5),
(228, 93, 3),
(229, 22, 4),
(230, 88, 4),
(231, 23, 2),
(232, 88, 6),
(233, 51, 6),
(234, 3, 2),
(235, 53, 1),
(236, 76, 1),
(237, 94, 1),
(238, 99, 2),
(239, 101, 4),
(240, 31, 6),
(241, 100, 1),
(242, 30, 1),
(243, 71, 4),
(244, 93, 4),
(245, 19, 6),
(246, 90, 1),
(247, 87, 3),
(248, 44, 5),
(249, 86, 6),
(250, 86, 3),
(251, 85, 3),
(252, 99, 4),
(253, 45, 4),
(254, 84, 5),
(255, 35, 3),
(256, 37, 1),
(257, 35, 5),
(258, 73, 4),
(259, 87, 1),
(260, 41, 5),
(261, 15, 4),
(262, 39, 2),
(263, 13, 1),
(264, 2, 5),
(265, 90, 6),
(266, 59, 1),
(267, 73, 3),
(268, 15, 1),
(269, 50, 6),
(270, 82, 6),
(271, 11, 4),
(272, 85, 4),
(273, 96, 5),
(274, 12, 5),
(275, 94, 3),
(276, 36, 6),
(277, 32, 4),
(278, 65, 2),
(279, 96, 2),
(280, 23, 2),
(281, 57, 1),
(282, 73, 6),
(283, 47, 5),
(284, 90, 1),
(285, 28, 3),
(286, 11, 3),
(287, 94, 6),
(288, 37, 4),
(289, 33, 2),
(290, 48, 5),
(291, 73, 3),
(292, 39, 2),
(293, 66, 4),
(294, 100, 3),
(295, 96, 6),
(296, 91, 2),
(297, 40, 2),
(298, 61, 1),
(299, 18, 6),
(300, 40, 5),
(301, 55, 5),
(302, 25, 6),
(303, 72, 5),
(304, 23, 2),
(305, 58, 4),
(306, 81, 6),
(307, 81, 3),
(308, 38, 2),
(309, 34, 5),
(310, 102, 6),
(311, 34, 5),
(312, 32, 1),
(313, 17, 5),
(314, 24, 2),
(315, 59, 6),
(316, 53, 4),
(317, 25, 4),
(318, 94, 4),
(319, 5, 4),
(320, 41, 1),
(321, 14, 1),
(322, 59, 3),
(323, 32, 6),
(324, 50, 4),
(325, 84, 4),
(326, 35, 3),
(327, 96, 1),
(328, 60, 1),
(329, 63, 5),
(330, 44, 1),
(331, 6, 6),
(332, 98, 1),
(333, 67, 4),
(334, 22, 4),
(335, 100, 6),
(336, 80, 6),
(337, 79, 1),
(338, 24, 4),
(339, 90, 4),
(340, 25, 5),
(341, 24, 3),
(342, 23, 2),
(343, 46, 6),
(344, 60, 5),
(345, 11, 2),
(346, 18, 2),
(347, 12, 5),
(348, 55, 5),
(349, 29, 4),
(350, 77, 2),
(351, 56, 1),
(352, 82, 3),
(353, 68, 1),
(354, 36, 5),
(355, 43, 1),
(356, 32, 4),
(357, 33, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `id` (`dept_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD UNIQUE KEY `id` (`skill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_dept_id` (`fk_dept_id`);

--
-- Indexes for table `userskills`
--
ALTER TABLE `userskills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_skill_id` (`fk_skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `userskills`
--
ALTER TABLE `userskills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userskills`
--
ALTER TABLE `userskills`
  ADD CONSTRAINT `userskills_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userskills_ibfk_2` FOREIGN KEY (`fk_skill_id`) REFERENCES `skills` (`skill_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
