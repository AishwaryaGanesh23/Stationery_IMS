-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 10:14 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stationery_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(5) NOT NULL,
  `bill_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prod_company` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prod_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prod_unit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prod_packsize` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `bill_id`, `prod_company`, `prod_name`, `prod_unit`, `prod_packsize`, `price`, `qty`) VALUES
(1, '1', 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', 'sheets', '40', '30', 2),
(2, '1', 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', 'sheets', '80', '50', 1),
(3, '2', 'Navneet', 'A4 Notebook', 'pages', '100', '25', 6),
(4, '3', 'Scotch', 'Clear Tape', 'm', '5', '50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `billing_header`
--

CREATE TABLE `billing_header` (
  `id` int(5) NOT NULL,
  `phno` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `bill_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `billing_header`
--

INSERT INTO `billing_header` (`id`, `phno`, `payment_method`, `date`, `bill_no`) VALUES
(1, '7774841977', 'Cash', '2020-12-16', '00001'),
(2, '9999999999', 'UPI', '2020-12-16', '00002'),
(3, '123456789', 'Credit', '2020-12-16', '00003');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `phno` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`phno`, `full_name`) VALUES
('123', 'abc'),
('123456789', 'kuro'),
('7774841977', 'Aishwarya'),
('9999999999', 'ninenine');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `packing_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_name`, `product_name`, `packing_size`, `unit`) VALUES
(1, 'Navneet', 'A4 Notebook', '100', 'pages'),
(2, 'Natraj', 'HB Pencils', '10', 'pieces'),
(3, 'Classmate', '2B Pencils', '20', 'pieces'),
(5, 'Cello', 'Butterflow Blue Ball Pens', '25', 'pieces'),
(7, 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', '40', 'sheets'),
(8, 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', '80', 'sheets'),
(9, 'Solimo', 'Journal', '300', 'pages'),
(10, 'Scotch', 'Clear Tape', '5', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `prod_company`
--

CREATE TABLE `prod_company` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prod_company`
--

INSERT INTO `prod_company` (`id`, `company_name`) VALUES
(1, 'Natraj'),
(2, 'Navneet'),
(3, 'Solimo'),
(4, 'Cello'),
(5, 'Classmate'),
(7, 'Scotch'),
(8, 'Faber-Castell'),
(9, 'Camlin Kokuyo'),
(10, 'Camel'),
(11, 'Maped'),
(12, 'Casio'),
(13, 'Apsara'),
(14, 'Staedtler'),
(15, 'Post-it');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `packing_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `supplier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_purchase` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`id`, `company_name`, `product_name`, `unit`, `packing_size`, `quantity`, `price`, `supplier`, `payment_method`, `date_of_purchase`) VALUES
(8, 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', 'sheets', '80', 20, '800', 'JD wholesellers', 'Cash', '2020-12-25'),
(9, 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', 'sheets', '40', 25, '500', 'JD wholesellers', 'Cash', '2020-12-25'),
(12, 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', 'sheets', '80', 20, '750', 'JD wholesellers', 'Credit Card', '2020-12-25'),
(14, 'Navneet', 'A4 Notebook', 'pages', '100', 100, '2000', 'MBD', 'Credit Card', '2020-12-10'),
(15, 'Cello', 'Butterflow Blue Ball Pens', 'pieces', '25', 10, '2000', 'Choudhary Trading Co.', 'Digital Payment', '2020-12-15'),
(16, 'Solimo', 'Journal', 'pages', '300', 10, '2000', 'Casa JD Fernandes', 'Bank Transfer', '2020-12-14'),
(17, 'Natraj', 'HB Pencils', 'pieces', '10', 100, '2500', 'Choudhary Trading Co.', 'Bank Transfer', '2020-12-16'),
(18, 'Scotch', 'Clear Tape', 'm', '5', 50, '1500', 'Choudhary Trading Co.', 'Credit Card', '2020-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `stock_master`
--

CREATE TABLE `stock_master` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prod_pack_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prod_qty` int(10) NOT NULL,
  `prod_sell_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_master`
--

INSERT INTO `stock_master` (`id`, `company_name`, `product_name`, `product_unit`, `prod_pack_size`, `prod_qty`, `prod_sell_price`) VALUES
(1, 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', 'sheets', '80', 39, '50'),
(2, 'Post-it', 'Cube 4 colour Sticky Note 3x3 inch', 'sheets', '40', 23, '30'),
(3, 'Navneet', 'A4 Notebook', 'pages', '100', 94, '25'),
(4, 'Cello', 'Butterflow Blue Ball Pens', 'pieces', '25', 10, '250'),
(5, 'Solimo', 'Journal', 'pages', '300', 10, '300'),
(6, 'Natraj', 'HB Pencils', 'pieces', '10', 100, '40'),
(7, 'Scotch', 'Clear Tape', 'm', '5', 47, '50');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(5) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact`, `address`, `city`) VALUES
(1, 'Casa JD Fernandes', '08322228004', 'Garcia de Orta Garden Serene square', 'Panjim'),
(2, 'MBD GROUP', '0832 241 3982', '932, Pundalik Nagar, Kranti Nagar, Porvorim, Goa 403521', 'Porvorim'),
(3, 'Choudhary Trading Co.', '0832 223 6913', 'Neugi Nagar, Goa', 'Panjim'),
(4, 'Royal Enterprise Stationery And Xerox', '098347 04129', 'Shop No S-9, Demop Tower, EDC Complex, patto, Patto Centre, Panaji, Goa 403001', 'Panaji');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`) VALUES
(1, 'each'),
(4, 'g'),
(5, 'ml'),
(6, 'l'),
(7, 'mg'),
(8, 'pages'),
(9, 'pieces'),
(10, 'sheets'),
(11, 'packs'),
(12, 'm'),
(13, 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`) VALUES
(1, 'aishwarya', 'ganesh', 'aishu', 'aishu123', 'employee', 'active'),
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'active'),
(3, 'Coco', 'Shiro', 'coshiro', 'cocoloco', 'employee', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_header`
--
ALTER TABLE `billing_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phno_FK` (`phno`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`phno`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_company`
--
ALTER TABLE `prod_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_master`
--
ALTER TABLE `stock_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billing_header`
--
ALTER TABLE `billing_header`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prod_company`
--
ALTER TABLE `prod_company`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stock_master`
--
ALTER TABLE `stock_master`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_header`
--
ALTER TABLE `billing_header`
  ADD CONSTRAINT `phno_FK` FOREIGN KEY (`phno`) REFERENCES `customers` (`phno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
