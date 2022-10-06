-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 04:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_mem`
-- (See below for the actual view)
--
CREATE TABLE `all_mem` (
`id_mem` varchar(13)
,`name_mem` varchar(60)
,`lname_mem` varchar(40)
,`department` varchar(60)
,`phone_num` int(10) unsigned zerofill
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_staff`
-- (See below for the actual view)
--
CREATE TABLE `all_staff` (
`id_staff` tinyint(3) unsigned zerofill
,`name_staff` varchar(60)
,`lname_staff` varchar(40)
,`stype` varchar(40)
,`username` varchar(50)
,`password` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id_book` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `name_book` varchar(60) NOT NULL,
  `page` int(11) NOT NULL,
  `author` varchar(60) NOT NULL,
  `id_btype` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `id_distribution` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `id_publisher` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `year` smallint(4) NOT NULL,
  `isbn` bigint(13) NOT NULL,
  `id_bstatus` tinyint(2) UNSIGNED ZEROFILL NOT NULL DEFAULT '01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id_book`, `name_book`, `page`, `author`, `id_btype`, `id_distribution`, `id_publisher`, `year`, `isbn`, `id_bstatus`) VALUES
(001, 'Social Studies Map สรุปเนื้อหาสังคม', 200, 'ชาญชัย กิจประเสริฐ', 01, 03, 16, 2018, 9786164303232, 02),
(002, 'ทำอะไรก็ดีไปหมดแค่เปลี่ยนความคิด', 300, 'Bruce H. Lipton PhD', 02, 06, 10, 2016, 9786164303294, 02),
(003, ' เจ้าหนูน้อยกับประภาคาร', 214, 'Heidi Howarth', 08, 05, 05, 2015, 9786164303164, 01),
(004, 'ฉันชอบเป็นตัวเองจัง', 333, 'Dreda Blow', 08, 06, 08, 2020, 9786164303157, 01),
(005, 'ฉันชอบเป็นตัวเองจัง', 333, 'Dreda Blow', 08, 06, 08, 2020, 9786164303157, 01),
(006, 'You Are My Glory ดุจดวงดาวเกียรติยศ', 245, 'กู้ม่าน', 01, 09, 08, 2011, 9786161838416, 01),
(007, 'โตขึ้นมาเป็นความสุข', 211, 'คิดมาก', 08, 11, 04, 2013, 9786161837402, 01),
(008, 'ขายดีเพราะขึ้นราคา', 123, 'อิชิฮาระ อากิระ', 08, 02, 03, 2014, 9786162874277, 02),
(009, 'ขายดีเพราะขึ้นราคา', 123, 'อิชิฮาระ อากิระ', 08, 02, 02, 2014, 9786162874277, 02),
(010, 'เริ่มต้นที่รักตัวเอง', 56, 'Mihwa', 09, 10, 11, 2017, 9786161832667, 01),
(011, 'Biology', 580, 'ศุภณัฐ ไพโรหกุล', 07, 03, 01, 2016, 9786164230705, 01),
(013, 'หนังสือ1', 100, 'ผู้แต่งง', 05, 03, 12, 2020, 1233333333333, 01);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_book`
--

CREATE TABLE `borrow_book` (
  `id_borrowb` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `id_book` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `id_borrow` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `id_bstatus` tinyint(2) UNSIGNED ZEROFILL NOT NULL DEFAULT '02'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow_book`
--

INSERT INTO `borrow_book` (`id_borrowb`, `id_book`, `id_borrow`, `id_bstatus`) VALUES
(001, 001, 001, 02),
(002, 009, 001, 02),
(003, 002, 002, 02),
(004, 006, 003, 03),
(005, 008, 003, 02);

-- --------------------------------------------------------

--
-- Table structure for table `bstatus`
--

CREATE TABLE `bstatus` (
  `id_bstatus` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `bstatus` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bstatus`
--

INSERT INTO `bstatus` (`id_bstatus`, `bstatus`) VALUES
(01, 'ว่าง'),
(02, 'ค้างส่ง'),
(03, 'คืนแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `btype`
--

CREATE TABLE `btype` (
  `id_btype` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `btype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `btype`
--

INSERT INTO `btype` (`id_btype`, `btype`) VALUES
(00, 'Animal');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `department` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `department`) VALUES
(01, 'ITI'),
(02, 'INE'),
(03, 'IT'),
(04, 'CMD'),
(05, 'IMT');

-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

CREATE TABLE `distribution` (
  `id_distribution` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `distribution` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`id_distribution`, `distribution`) VALUES
(00, 'home');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_mem` varchar(13) NOT NULL,
  `name_mem` varchar(60) NOT NULL,
  `lname_mem` varchar(40) NOT NULL,
  `id_department` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `phone_num` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_mem`, `name_mem`, `lname_mem`, `id_department`, `phone_num`) VALUES
('6506021411051', 'Thanadon', 'Hanchaiyapoom', 01, 0863249571);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id_publisher` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `publisher` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id_publisher`, `publisher`) VALUES
(000, 'sgfags'),
(003, 'asggas'),
(004, 'gahgasghas');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `name_staff` varchar(60) NOT NULL,
  `lname_staff` varchar(40) NOT NULL,
  `id_stype` tinyint(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `name_staff`, `lname_staff`, `id_stype`, `username`, `password`) VALUES
(001, 'Thanadon', 'Hanchaiyaphum', 1, 'admin', 1234),
(002, 'Nattanan', 'sangdaow', 2, 'daow', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `stype`
--

CREATE TABLE `stype` (
  `id_stype` int(1) NOT NULL,
  `stype` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stype`
--

INSERT INTO `stype` (`id_stype`, `stype`) VALUES
(1, 'Admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Structure for view `all_mem`
--
DROP TABLE IF EXISTS `all_mem`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_mem`  AS  select `member`.`id_mem` AS `id_mem`,`member`.`name_mem` AS `name_mem`,`member`.`lname_mem` AS `lname_mem`,`department`.`department` AS `department`,`member`.`phone_num` AS `phone_num` from (`member` left join `department` on((`member`.`id_department` = `department`.`id_department`))) ;

-- --------------------------------------------------------

--
-- Structure for view `all_staff`
--
DROP TABLE IF EXISTS `all_staff`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_staff`  AS  select `staff`.`id_staff` AS `id_staff`,`staff`.`name_staff` AS `name_staff`,`staff`.`lname_staff` AS `lname_staff`,`stype`.`stype` AS `stype`,`staff`.`username` AS `username`,`staff`.`password` AS `password` from (`staff` left join `stype` on((`staff`.`id_stype` = `stype`.`id_stype`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`);

--
-- Indexes for table `borrow_book`
--
ALTER TABLE `borrow_book`
  ADD PRIMARY KEY (`id_borrowb`);

--
-- Indexes for table `bstatus`
--
ALTER TABLE `bstatus`
  ADD PRIMARY KEY (`id_bstatus`);

--
-- Indexes for table `btype`
--
ALTER TABLE `btype`
  ADD PRIMARY KEY (`id_btype`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`id_distribution`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_mem`),
  ADD KEY `department` (`id_department`),
  ADD KEY `id_department` (`id_department`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id_publisher`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
