-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 03, 2015 at 01:55 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Wine Yard`
--

-- --------------------------------------------------------
--
-- Table structure for table `Products`
--

CREATE TABLE `Members` (
  `FIRST_NAME` char(50) NOT NULL,
  `LAST_NAME` char(50) NOT NULL,
  `TITLE` char(50) NOT NULL,
  `EMAIL` char(50) NOT NULL,
  `SHIPPING_ADDRESS` char(50) NOT NULL,
  `SHIPPING_CITY` char(50) NOT NULL,
  `SHIPPING_STATE` char(50) NOT NULL,
  `SHIPPING_ZIP` int(5) NOT NULL,
  `SHIPPING_COUNTRY` char(50) NOT NULL,
  `CELLPHONE` int(11) NOT NULL,
  `DOB` int(6) NOT NULL,
  `MEMBERSHIP_TYPE` char(50) NOT NULL,
  `BILLING_ADDRESS` char(50) NOT NULL,
  `BILLING_CITY` char(50) NOT NULL,
  `BILLLING_STATE` char(50) NOT NULL,
  `BILLING_ZIP` int(5) NOT NULL,
  `BILLING_COUNTRY` char(50) NOT NULL,
  `USERNAME` char(50) NOT NULL,
  `PASSWORD` char(50) NOT NULL


) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

-- INSERT INTO `Members` ('FIRST_NAME', 'LAST_NAME', 'TITLE', 'EMAIL', 'SHIPPING_ADDRESS', 'SHIPPING_CITY', 'SHIPPING_STATE', 'SHIPPING_ZIP', 'SHIPPING_COUNTRY', 'CELLPHONE', 'DOB', 'MEMBERSHIP_TYPE', 'BILLING_ADDRESS', 'BILLING_CITY', 'BILLLING_STATE', 'BILLING_ZIP', 'BILLING_COUNTRY', 'USERNAME', 'PASSWORD') VALUES
-- ('John', 'Snow', 'Mr.', 'abc@123.com', '123 lala lane', 'Winterfell',94061, 'Westoros', 6504625689, 090690, 'Westoros' , 'Ultimate Member', '123 Lanister lane','Kings Landing','yeah state', 94061 , 'USA' , 'KnightsWatch' , 'EndOfWatch');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `Products`
--
ALTER TABLE `Members`
  ADD PRIMARY KEY (`CELLPHONE`),
  ADD KEY `FIRST_NAME` (`FIRST_NAME`),
  ADD KEY `LAST_NAME` (`LAST_NAME`),
  ADD KEY `EMAIL` (`EMAIL`),
  ADD KEY `USERNAME` (`USERNAME`),
  ADD KEY `PASSWORD` (`PASSWORD`);
