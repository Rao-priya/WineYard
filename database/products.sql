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

CREATE TABLE `Products` (
  `SKU ID` int(11) NOT NULL,
  `SKU DESC` char(50) NOT NULL,
  `TYPE` char(50) NOT NULL,
  `NAT/IMP` char(50) NOT NULL,
  `COUNTRY` char(50) NOT NULL,
  `REGION` char(50) NOT NULL,
  `ABV` float NOT NULL,
  `PAIRING` char(50) NOT NULL,
  `PRICE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`SKU ID`, `SKU DESC`, `TYPE`, `NAT/IMP`, `COUNTRY`, `REGION`, `ABV`, `PAIRING`, `PRICE`) VALUES
(1, 'Poet''s Leap Riesling 2014', 'White', 'National', 'USA', 'Columbia Valley', 12.9, 'FISH', 21.99),
(2, 'Ritual Casablanca Valley Sauvignon Blanc 2013', 'White', 'Imported', 'Chile', 'Chile', 14.1, 'FISH', 16.99),
(3, 'Giant Steps Tarraford Vineyard Chardonnay 2013', 'White', 'Imported', 'Australia', 'Yarra Valley', 13, 'FISH', 39.99),
(4, 'Melville Verna''s Viognier 2013', 'White', 'National', 'USA', 'Central Coast', 14, 'FISH', 22.99),
(5, 'K Vintners Viognier 2013', 'White', 'National', 'USA', 'Columbia Valley  Washington', 14.2, 'FISH', 22.99),
(6, 'Elk Cove Pinot Gris 2014', 'White', 'National', 'USA', 'Willamette Valley  Oregon', 13, 'FISH', 18.99),
(7, 'WillaKenzie Estate Pinot Gris 2014', 'White', 'National', 'USA', 'Willamette Valley  Oregon', 14.2, 'FISH', 19.99),
(8, 'Bogle Chardonnay 2013', 'White', 'National', 'USA', 'California', 13.5, 'FISH', 8.99),
(9, 'Dog Point Vineyard Sauvignon Blanc 2014', 'White', 'Imported', 'New Zeland', 'New Zeland', 13.5, 'FISH', 17.99),
(10, 'Greywacke Wild Sauvignon 2013', 'White', 'Imported', 'New Zeland', 'Marlborough', 14, 'FISH', 30.99),
(11, 'Castello di Volpaia Chianti Classico Riserva 2011', 'Red', 'Imported', 'Italy', 'Tuscany', 14.5, 'BEEF', 28.99),
(12, 'Felsina Berardenga Chianti Classico 2012', 'Red', 'Imported', 'Italy', 'Tuscany', 13, 'BEEF', 21.99),
(13, 'Luigi Oddero Barolo 2009', 'Red', 'Imported', 'Italy', 'Piedmont', 14.5, 'BEEF', 39.99),
(14, 'Wynns Coonawarra Estate Black Label Cabernet Sauvi', 'Red', 'Imported', 'Australia', 'Coonawarra', 13.5, 'BEEF', 34.99),
(15, 'Penfolds Bin 407 Cabernet Sauvignon 2012', 'Red', 'Imported', 'Australia', 'Australia', 14.5, 'BEEF', 65.99),
(16, 'Terra d''Oro Deaver Ranch Old Vine Zinfandel 2013', 'Red', 'National', 'USA', 'Sierra Foothills', 13.5, 'BEEF', 25.99),
(17, 'Balnaves Cabernet Sauvignon 2010', 'Red', 'Imported', 'Australia', 'Coonawarra', 14.5, 'BEEF', 39.99),
(18, 'Frog''s Leap Zinfandel 2013', 'Red', 'National', 'USA', 'Napa Valley', 13.8, 'BEEF', 27.99),
(19, 'Seghesio Home Ranch Zinfandel 2012', 'Red', 'National', 'USA', 'Sonoma County', 14.8, 'BEEF', 54.99),
(20, 'Beckmen Purisima Mountain Vineyard Syrah 2013', 'Red', 'National', 'USA', 'Central Coast California', 15.1, 'BEEF', 29.99),
(21, 'Bodegas Muriel Reserva 2008', 'Red', 'Imported', 'Spain', 'Rioja, Spain', 13, 'PASTA', 16.99),
(22, 'TintoNegro Uco Valley-Mendoza Malbec 2012', 'Red', 'Imported', 'Argentina', 'Argentina', 14, 'PASTA', 13.99),
(23, 'Chateau de Chantegrive 2009', 'Red', 'Imported', 'France', 'Graves Bordeaux', 13, 'PASTA', 22.99),
(24, 'Oberon Cabernet Sauvignon 2013', 'Red', 'National', 'USA', 'Napa Valley', 13.8, 'PASTA', 21.99),
(25, 'Lincourt Lindsay''s Pinot Noir 2013', 'Red', 'National', 'USA', 'Central Coast', 14.5, 'PASTA', 18.99),
(26, 'Decoy Sonoma Cabernet Sauvignon 2013', 'Red', 'National', 'USA', 'Sonoma County California', 13.9, 'PASTA', 19.99),
(27, 'Hahn Estates Santa Lucia Highlands Pinot Noir 2013', 'Red', 'National', 'USA', 'Central Coast', 14.5, 'PASTA', 21.99),
(28, 'Yalumba The Guardian Shiraz Viognier 2010', 'Red', 'Imported', 'Australia', 'Barossa Valley', 13.5, 'PASTA', 14.99),
(29, 'St Hallett Faith Shiraz 2013', 'Red', 'Imported', 'Australia', 'Barossa Valley', 14.5, 'PASTA', 14.99),
(30, 'Flora Springs Napa Valley Cabernet Sauvignon 2012', 'Red', 'National', 'USA', 'Napa Valley', 14.2, 'PASTA', 14.99),
(31, 'Stags'' Leap Winery Cabernet Sauvignon 2012', 'Red', 'National', 'USA', 'Napa Valley', 14.1, 'CHICKEN', 44.99),
(32, 'Bodegas Volver Tarima Hill 2012', 'Red', 'Imported', 'Spain', 'Spain', 14, 'CHICKEN', 13.99),
(33, 'Bila-Haut by Michel Chapoutier Occultum Lapidem 20', 'Red', 'Imported', 'France', 'Languedoc-Roussillon', 14, 'CHICKEN', 27.99),
(34, 'Adelsheim Pinot Noir 2013', 'Red', 'National', 'USA', 'Willamette Valley', 13, 'CHICKEN', 28.99),
(35, 'K Vintners River Rock Syrah 2012', 'Red', 'National', 'USA', 'Washington', 14.5, 'CHICKEN', 54.99),
(36, 'Frescobaldi Nipozzano Chianti Rufina Riserva 2011', 'Red', 'Imported', 'Italy', 'Tuscany', 14, 'CHICKEN', 21.99),
(37, 'Emiliana Coyam (Certified Biodynamic) 2011', 'Red', 'Imported', 'Chile', 'Chile', 14.5, 'CHICKEN', 33.99),
(38, 'Bodegas Volver Triga 2012', 'Red', 'Imported', 'Spain', 'Spain', 14, 'CHICKEN', 37.99),
(39, 'Foxen Santa Maria Valley Pinot Noir 2013', 'Red', 'National', 'USA', 'Santa Maria', 14, 'CHICKEN', 34.99),
(40, 'Guigal Chateauneuf-du-Pape 2009', 'Red', 'Imported', 'France', 'Chateauneuf-du-Pape Rhone', 14, 'CHICKEN', 49.99),
(41, 'TintoNegro Uco Valley-Mendoza Malbec 2012', 'Red', 'Imported', 'Argentina', 'Argentina', 14, 'CHICKEN', 13.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`SKU ID`),
  ADD KEY `SKU ID` (`SKU ID`),
  ADD KEY `SKU DESC` (`SKU DESC`),
  ADD KEY `SKU DESC_2` (`SKU DESC`),
  ADD KEY `SKU DESC_3` (`SKU DESC`),
  ADD KEY `TYPE` (`TYPE`),
  ADD KEY `NAT/IMP` (`NAT/IMP`),
  ADD KEY `COUNTRY` (`COUNTRY`),
  ADD KEY `REGION` (`REGION`),
  ADD KEY `ABV` (`ABV`),
  ADD KEY `PAIRING` (`PAIRING`),
  ADD KEY `PRICE` (`PRICE`);
