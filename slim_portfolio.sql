-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 06, 2019 at 01:03 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slim_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `images`, `text`, `name`) VALUES
(1, '/assets/content/img/test_1.json', '/assets/content/txt/test_1.json', 'test 1'),
(2, '/assets/content/img/plop.json', '/assets/content/txt/plop.json', 'plop'),
(3, '/assets/content/img/igugc.json', '/assets/content/txt/igugc.json', 'igugc'),
(8, '/assets/content/img/admin_test.json', '/assets/content/txt/admin_test.json', 'admin test');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `date`, `description`) VALUES
(1, 'test 1', 0, 'uhyguygazeur ouagyzerger kjiurthitry jhhgyerkeriuthyugbioiuuyrtrbtuyguer eouihriuhruetehrgbugyfogezrggthjrgojoiun iuuerbrjhbr '),
(2, 'plop', 16653204, 'iuaghpzeurg hjavzeuorvaze ra zeruaozegyr apiçeuryhpiauzerhupiazherb  zieagroagyzerpoazguerae azerezr sqfre t'),
(3, 'igugc', 1560988800, 'zaerzaer'),
(9, 'admin test', 1561766400, 'admin test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
