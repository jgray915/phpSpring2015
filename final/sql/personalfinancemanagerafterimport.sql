-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2015 at 10:28 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `personalfinancemanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkingaccountimport`
--

CREATE TABLE IF NOT EXISTS `checkingaccountimport` (
  `storeId` varchar(100) DEFAULT NULL,
  `transactionDate` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `amountToPrincipal` decimal(10,2) DEFAULT NULL,
  `amountToEscrow` decimal(10,2) DEFAULT NULL,
  `amountToInterest` decimal(10,2) DEFAULT NULL,
  `ledgerBalance` decimal(10,2) DEFAULT NULL,
  `checkNumber` int(11) DEFAULT NULL,
  `transactionType` varchar(30) DEFAULT NULL,
  `pending` tinyint(1) DEFAULT NULL,
  `generatedDescription` varchar(200) DEFAULT NULL,
  `transactionId` varchar(40) DEFAULT NULL,
  `intradayOrderId` varchar(16) DEFAULT NULL,
  `exportTNUM` varchar(30) DEFAULT NULL,
  `depositSlipIdentifier` varchar(100) DEFAULT NULL,
  `checkImageIdentifier` varchar(50) DEFAULT NULL,
  `creditTransaction` tinyint(1) DEFAULT NULL,
`importId` int(11) NOT NULL,
  `importDate` datetime NOT NULL,
  `class` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkingaccountimport`
--

INSERT INTO `checkingaccountimport` (`storeId`, `transactionDate`, `amount`, `fee`, `amountToPrincipal`, `amountToEscrow`, `amountToInterest`, `ledgerBalance`, `checkNumber`, `transactionType`, `pending`, `generatedDescription`, `transactionId`, `intradayOrderId`, `exportTNUM`, `depositSlipIdentifier`, `checkImageIdentifier`, `creditTransaction`, `importId`, `importDate`, `class`, `category`) VALUES
('x x x x x x x x x x', '2015-01-01', '337.82', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Fidelity', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 1, '2015-05-31 16:14:10', 'Savings/Investments', '401k'),
('x x x x x x x x x x', '2015-01-01', '193.34', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Electric Department', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 2, '2015-05-31 16:14:10', 'Expenses', 'Electric Bill'),
('x x x x x x x x x x', '2015-01-01', '73.55', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Movie Theater', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 3, '2015-05-31 16:14:10', 'Spending', 'Entertainment'),
('x x x x x x x x x x', '2015-01-01', '32.06', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Amazon', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 4, '2015-05-31 16:14:10', 'Spending', 'Online Shopping'),
('x x x x x x x x x x', '2015-01-01', '167.14', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Phone Company', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 5, '2015-05-31 16:14:10', 'Expenses', 'Phone Bill'),
('x x x x x x x x x x', '2015-01-01', '217.11', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Apartment Complex', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 6, '2015-05-31 16:14:10', 'Expenses', 'Rent'),
('x x x x x x x x x x', '2015-01-01', '24.69', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'McDonald''s', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 7, '2015-05-31 16:14:10', 'Spending', 'Restaurants'),
('x x x x x x x x x x', '2015-01-01', '178.39', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Savings Account', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 8, '2015-05-31 16:14:10', 'Savings/Investments', 'Savings'),
('x x x x x x x x x x', '2015-01-01', '90.99', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'NEIT', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 9, '2015-05-31 16:14:10', 'Savings/Investments', 'Tuition'),
('x x x x x x x x x x', '2015-02-01', '421.40', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Fidelity', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 10, '2015-05-31 16:14:10', 'Savings/Investments', '401k'),
('x x x x x x x x x x', '2015-02-01', '632.04', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Electric Department', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 11, '2015-05-31 16:14:10', 'Expenses', 'Electric Bill'),
('x x x x x x x x x x', '2015-02-01', '350.12', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Movie Theater', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 12, '2015-05-31 16:14:10', 'Spending', 'Entertainment'),
('x x x x x x x x x x', '2015-02-01', '240.07', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Amazon', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 13, '2015-05-31 16:14:10', 'Spending', 'Online Shopping'),
('x x x x x x x x x x', '2015-02-01', '719.00', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Phone Company', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 14, '2015-05-31 16:14:10', 'Expenses', 'Phone Bill'),
('x x x x x x x x x x', '2015-02-01', '129.83', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Apartment Complex', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 15, '2015-05-31 16:14:10', 'Expenses', 'Rent'),
('x x x x x x x x x x', '2015-02-01', '346.85', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'McDonald''s', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 16, '2015-05-31 16:14:10', 'Spending', 'Restaurants'),
('x x x x x x x x x x', '2015-02-01', '191.05', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Savings Account', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 17, '2015-05-31 16:14:10', 'Savings/Investments', 'Savings'),
('x x x x x x x x x x', '2015-02-01', '39.94', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'NEIT', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 18, '2015-05-31 16:14:10', 'Savings/Investments', 'Tuition'),
('x x x x x x x x x x', '2015-03-01', '135.94', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Fidelity', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 19, '2015-05-31 16:14:10', 'Savings/Investments', '401k'),
('x x x x x x x x x x', '2015-03-01', '358.50', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Electric Department', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 20, '2015-05-31 16:14:10', 'Expenses', 'Electric Bill'),
('x x x x x x x x x x', '2015-03-01', '509.88', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Movie Theater', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 21, '2015-05-31 16:14:10', 'Spending', 'Entertainment'),
('x x x x x x x x x x', '2015-03-01', '109.52', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Amazon', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 22, '2015-05-31 16:14:10', 'Spending', 'Online Shopping'),
('x x x x x x x x x x', '2015-03-01', '328.04', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Phone Company', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 23, '2015-05-31 16:14:10', 'Expenses', 'Phone Bill'),
('x x x x x x x x x x', '2015-03-01', '8.10', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Apartment Complex', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 24, '2015-05-31 16:14:10', 'Expenses', 'Rent'),
('x x x x x x x x x x', '2015-03-01', '85.99', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'McDonald''s', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 25, '2015-05-31 16:14:10', 'Spending', 'Restaurants'),
('x x x x x x x x x x', '2015-03-01', '60.71', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Savings Account', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 26, '2015-05-31 16:14:10', 'Savings/Investments', 'Savings'),
('x x x x x x x x x x', '2015-03-01', '671.23', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'NEIT', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 27, '2015-05-31 16:14:10', 'Savings/Investments', 'Tuition'),
('x x x x x x x x x x', '2015-04-01', '544.68', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Fidelity', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 28, '2015-05-31 16:14:10', 'Savings/Investments', '401k'),
('x x x x x x x x x x', '2015-04-01', '25.57', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Electric Department', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 29, '2015-05-31 16:14:10', 'Expenses', 'Electric Bill'),
('x x x x x x x x x x', '2015-04-01', '24.83', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Movie Theater', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 30, '2015-05-31 16:14:10', 'Spending', 'Entertainment'),
('x x x x x x x x x x', '2015-04-01', '15.71', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Amazon', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 31, '2015-05-31 16:14:10', 'Spending', 'Online Shopping'),
('x x x x x x x x x x', '2015-04-01', '863.75', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Phone Company', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 32, '2015-05-31 16:14:10', 'Expenses', 'Phone Bill'),
('x x x x x x x x x x', '2015-04-01', '163.13', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Apartment Complex', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 33, '2015-05-31 16:14:10', 'Expenses', 'Rent'),
('x x x x x x x x x x', '2015-04-01', '339.30', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'McDonald''s', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 34, '2015-05-31 16:14:10', 'Spending', 'Restaurants'),
('x x x x x x x x x x', '2015-04-01', '149.80', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Savings Account', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 35, '2015-05-31 16:14:10', 'Savings/Investments', 'Savings'),
('x x x x x x x x x x', '2015-04-01', '14.95', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'NEIT', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 36, '2015-05-31 16:14:10', 'Savings/Investments', 'Tuition'),
('x x x x x x x x x x', '2015-01-01', '16.30', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Fidelity', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 37, '2015-05-31 16:22:13', 'Savings/Investments', '401k'),
('x x x x x x x x x x', '2015-01-01', '325.42', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Electric Department', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 38, '2015-05-31 16:22:13', 'Expenses', 'Electric Bill'),
('x x x x x x x x x x', '2015-01-01', '46.34', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Movie Theater', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 39, '2015-05-31 16:22:13', 'Spending', 'Entertainment'),
('x x x x x x x x x x', '2015-01-01', '252.74', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Amazon', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 40, '2015-05-31 16:22:13', 'Spending', 'Online Shopping'),
('x x x x x x x x x x', '2015-01-01', '516.24', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Phone Company', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 41, '2015-05-31 16:22:13', 'Expenses', 'Phone Bill'),
('x x x x x x x x x x', '2015-01-01', '32.58', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Apartment Complex', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 42, '2015-05-31 16:22:13', 'Expenses', 'Rent'),
('x x x x x x x x x x', '2015-01-01', '489.13', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'McDonald''s', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 43, '2015-05-31 16:22:13', 'Spending', 'Restaurants'),
('x x x x x x x x x x', '2015-01-01', '224.57', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Savings Account', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 44, '2015-05-31 16:22:13', 'Savings/Investments', 'Savings'),
('x x x x x x x x x x', '2015-01-01', '18.87', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'NEIT', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 45, '2015-05-31 16:22:13', 'Savings/Investments', 'Tuition'),
('x x x x x x x x x x', '2015-05-01', '150.84', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Fidelity', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 46, '2015-05-31 16:26:24', 'Savings/Investments', '401k'),
('x x x x x x x x x x', '2015-05-01', '806.42', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Electric Department', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 47, '2015-05-31 16:26:24', 'Expenses', 'Electric Bill'),
('x x x x x x x x x x', '2015-05-01', '230.99', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Movie Theater', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 48, '2015-05-31 16:26:24', 'Spending', 'Entertainment'),
('x x x x x x x x x x', '2015-05-01', '778.47', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Amazon', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 49, '2015-05-31 16:26:24', 'Spending', 'Online Shopping'),
('x x x x x x x x x x', '2015-05-01', '51.86', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Phone Company', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 50, '2015-05-31 16:26:24', 'Expenses', 'Phone Bill'),
('x x x x x x x x x x', '2015-05-01', '385.59', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Apartment Complex', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 51, '2015-05-31 16:26:24', 'Expenses', 'Rent'),
('x x x x x x x x x x', '2015-05-01', '137.37', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'McDonald''s', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 52, '2015-05-31 16:26:24', 'Spending', 'Restaurants'),
('x x x x x x x x x x', '2015-05-01', '67.55', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'Savings Account', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 53, '2015-05-31 16:26:24', 'Savings/Investments', 'Savings'),
('x x x x x x x x x x', '2015-05-01', '361.40', '0.00', '0.00', '0.00', '0.00', '0.00', 123, 'WITHDRAWAL', 0, 'NEIT', 'x x x x x x x x x x', 'x x x x x x x x ', 'x x x x x x x x x x', 'x x x x x x x x x x', 'x x x x x x x x x x', 0, 54, '2015-05-31 16:26:24', 'Savings/Investments', 'Tuition');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`UserID` int(11) NOT NULL,
  `UserName` varchar(32) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `UserType` varchar(5) NOT NULL,
  `UserIsActive` tinyint(1) NOT NULL,
  `UserCreated` datetime NOT NULL,
  `UserUpdated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserPassword`, `UserType`, `UserIsActive`, `UserCreated`, `UserUpdated`) VALUES
(1, 'jake', '$2y$10$f2cCQMBcRMOY.82HxqJ.5u7fUqm5JjQSxM33qfFqHKTdPZjmug2mC', 'user', 1, '2015-05-31 15:43:37', '2015-05-31 15:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawalcategories`
--

CREATE TABLE IF NOT EXISTS `withdrawalcategories` (
  `category` varchar(32) NOT NULL,
  `class` varchar(32) NOT NULL,
  `monthlyBudget` decimal(10,2) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdDTS` datetime NOT NULL,
  `updatedDTS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawalcategories`
--

INSERT INTO `withdrawalcategories` (`category`, `class`, `monthlyBudget`, `isActive`, `createdDTS`, `updatedDTS`) VALUES
('401k', 'Savings/Investments', '500.00', 1, '2015-05-31 15:55:48', '2015-05-31 15:55:48'),
('Electric Bill', 'Expenses', '500.00', 1, '2015-05-31 15:55:38', '2015-05-31 15:55:38'),
('Entertainment', 'Spending', '500.00', 1, '2015-05-31 15:58:03', '2015-05-31 15:58:03'),
('Online Shopping', 'Spending', '500.00', 1, '2015-05-31 15:56:01', '2015-05-31 15:56:01'),
('Phone Bill', 'Expenses', '500.00', 1, '2015-05-31 15:56:09', '2015-05-31 15:56:09'),
('Rent', 'Expenses', '500.00', 1, '2015-05-31 15:53:06', '2015-05-31 15:53:06'),
('Restaurants', 'Spending', '500.00', 1, '2015-05-31 15:55:06', '2015-05-31 15:55:06'),
('Savings', 'Savings/Investments', '500.00', 1, '2015-05-31 15:54:49', '2015-05-31 15:54:49'),
('Tuition', 'Savings/Investments', '500.00', 1, '2015-05-31 15:56:33', '2015-05-31 15:56:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkingaccountimport`
--
ALTER TABLE `checkingaccountimport`
 ADD PRIMARY KEY (`importId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UserID`), ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `withdrawalcategories`
--
ALTER TABLE `withdrawalcategories`
 ADD PRIMARY KEY (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkingaccountimport`
--
ALTER TABLE `checkingaccountimport`
MODIFY `importId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

