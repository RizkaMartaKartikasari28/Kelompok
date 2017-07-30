-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 27, 2017 at 03:05 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `db_tggroup`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `kelompok`
-- 

CREATE TABLE `kelompok` (
  `judul` varchar(30) NOT NULL,
  `idbuku` varchar(30) NOT NULL,
  `pengarang` varchar(25) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun` int(30) NOT NULL,
  `jmlhalaman` int(25) NOT NULL,
  `tgl` date NOT NULL,
  `harga` int(11) NOT NULL,
  `IMG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `kelompok`
-- 

INSERT INTO `kelompok` (`judul`, `idbuku`, `pengarang`, `penerbit`, `tahun`, `jmlhalaman`, `tgl`, `harga`, `IMG`) VALUES 
('Rizka Marta', 'Karangtengah', 'Kendal, 28 Mei 1997', '155', 0, 0, '1989-08-09', 0, 'fav_by_mayat_s-d4hp0m8.jpg');
