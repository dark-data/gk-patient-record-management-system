-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2020 at 02:00 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gjk`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obfirst`
--

DROP TABLE IF EXISTS `obfirst`;
CREATE TABLE IF NOT EXISTS `obfirst` (
  `rkey` varchar(100) NOT NULL,
  `lmp` date NOT NULL,
  `ga_lmp` varchar(100) NOT NULL,
  `eod_lmp` date NOT NULL,
  `ga_usg` varchar(100) NOT NULL,
  `eod_usg` date NOT NULL,
  `crl` varchar(30) NOT NULL,
  `ges_week` int(5) NOT NULL,
  `ges_day` int(5) NOT NULL,
  `ro` varchar(30) NOT NULL,
  `rom` varchar(30) NOT NULL,
  `lo` varchar(30) NOT NULL,
  `lom` varchar(30) NOT NULL,
  UNIQUE KEY `rkey` (`rkey`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obtwo`
--

DROP TABLE IF EXISTS `obtwo`;
CREATE TABLE IF NOT EXISTS `obtwo` (
  `bpd` varchar(30) NOT NULL,
  `hc` varchar(30) NOT NULL,
  `ac` varchar(30) NOT NULL,
  `fl` varchar(30) NOT NULL,
  `placenta` varchar(30) NOT NULL,
  `liquor` varchar(30) NOT NULL,
  `afi` varchar(30) NOT NULL,
  `fhr` varchar(30) NOT NULL,
  `fwt` varchar(30) NOT NULL,
  `mi` varchar(30) NOT NULL,
  `geswk` varchar(30) NOT NULL,
  `gesdays` varchar(30) NOT NULL,
  `cl` varchar(30) NOT NULL,
  `rkey` varchar(30) NOT NULL,
  `bpdwd` varchar(30) NOT NULL,
  `hcwd` varchar(30) NOT NULL,
  `acwd` varchar(30) NOT NULL,
  `flwd` varchar(30) NOT NULL,
  `sdate` varchar(30) DEFAULT NULL,
  UNIQUE KEY `rkey` (`rkey`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_record_header`
--

DROP TABLE IF EXISTS `patient_record_header`;
CREATE TABLE IF NOT EXISTS `patient_record_header` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(5) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `referredby` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `study` varchar(100) NOT NULL,
  `indication` varchar(100) NOT NULL,
  `rkey` varchar(50) NOT NULL,
  `attendedby` varchar(50) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `rkey` (`rkey`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelvis`
--

DROP TABLE IF EXISTS `pelvis`;
CREATE TABLE IF NOT EXISTS `pelvis` (
  `rkey` varchar(30) NOT NULL,
  `tvaginal` varchar(30) NOT NULL,
  `tabdominal` varchar(30) NOT NULL,
  `uterus_appeared` varchar(30) NOT NULL,
  `uterus_measure` varchar(200) NOT NULL,
  `cavity` varchar(20) NOT NULL,
  `ro_measure` varchar(200) NOT NULL,
  `ro_appear` varchar(50) NOT NULL,
  `ro_comment` varchar(100) NOT NULL,
  `lo_mesure` varchar(200) NOT NULL,
  `lo_appear` varchar(50) NOT NULL,
  `lo_comment` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `day1` varchar(20) NOT NULL,
  `ro1` varchar(50) NOT NULL,
  `lo1` varchar(50) NOT NULL,
  `et1` varchar(20) NOT NULL,
  `date2` date DEFAULT NULL,
  `day2` varchar(20) DEFAULT NULL,
  `ro2` varchar(50) DEFAULT NULL,
  `lo2` varchar(50) DEFAULT NULL,
  `et2` varchar(20) DEFAULT NULL,
  `date3` date DEFAULT NULL,
  `day3` varchar(20) DEFAULT NULL,
  `ro3` varchar(50) DEFAULT NULL,
  `lo3` varchar(50) DEFAULT NULL,
  `et3` varchar(20) DEFAULT NULL,
  `date4` date DEFAULT NULL,
  `day4` varchar(20) DEFAULT NULL,
  `ro4` varchar(50) DEFAULT NULL,
  `lo4` varchar(50) DEFAULT NULL,
  `et4` varchar(20) DEFAULT NULL,
  `impression` varchar(250) DEFAULT NULL,
  UNIQUE KEY `rkey` (`rkey`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelvistwo`
--

DROP TABLE IF EXISTS `pelvistwo`;
CREATE TABLE IF NOT EXISTS `pelvistwo` (
  `rkey` varchar(30) NOT NULL,
  `tvaginal` varchar(20) NOT NULL,
  `tabdominal` varchar(20) NOT NULL,
  `uterus_appeared` varchar(30) NOT NULL,
  `u_measured` varchar(100) NOT NULL,
  `cavity` varchar(50) NOT NULL,
  `endomaterial_thickness` varchar(50) NOT NULL,
  `ro_measure` varchar(100) NOT NULL,
  `ro` varchar(50) NOT NULL,
  `ro_comment` varchar(200) NOT NULL,
  `lo_measure` varchar(100) NOT NULL,
  `lo` varchar(50) NOT NULL,
  `lo_comment` varchar(200) NOT NULL,
  `impression` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `degree` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ID`, `username`, `type`, `password`, `fullname`, `address`, `email`, `phone`, `dob`, `degree`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'xxx', 'xxx@gmail.com', '9998658650', '2019-11-13', 'MD (O&G)'),
(2, 'test', 'normal', 'test', 'xx', 'ccc\r\nvvv\r\nm', 'xx@gmail.com', '7894561230', '1952-03-21', 'tester');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
