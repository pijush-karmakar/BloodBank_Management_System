-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 04:06 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `bg_id` int(11) NOT NULL,
  `bg_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`bg_id`, `bg_name`) VALUES
(1, 'O+'),
(2, 'O-'),
(3, 'AB+'),
(7, 'AB-'),
(8, 'A+'),
(9, 'A-'),
(10, 'B+'),
(11, 'B-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(100) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminSkill` varchar(100) NOT NULL,
  `adminRole` int(11) NOT NULL DEFAULT '0',
  `adminImage` varchar(255) NOT NULL,
  `adminDetails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminPass`, `adminEmail`, `adminSkill`, `adminRole`, `adminImage`, `adminDetails`) VALUES
(1, 'pijush karmakar', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Web Developer', 0, '', 'Hey i am the admin of this project');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_camp`
--

CREATE TABLE `tbl_camp` (
  `campId` int(11) NOT NULL,
  `distId` int(11) NOT NULL,
  `divId` int(11) NOT NULL,
  `campTitle` varchar(255) NOT NULL,
  `organizedBy` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_camp`
--

INSERT INTO `tbl_camp` (`campId`, `distId`, `divId`, `campTitle`, `organizedBy`, `image`, `details`) VALUES
(8, 1, 1, 'Prime Hospital', 'prime group', 'upload/bca64dd926.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h3>Hey there ...Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</h3>\r\n<p>&nbsp;Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>\r\n</body>\r\n</html>'),
(9, 3, 1, 'Silpokola Academy ', 'Silpokola Academy', 'upload/2865a0c5e8.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit.</p>\r\n</body>\r\n</html>'),
(10, 4, 1, 'Red Crecent', 'crecent', 'upload/ebf90e85db.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit.</p>\r\n</body>\r\n</html>'),
(11, 2, 1, 'Badhon Group blood camp ', 'Badhon ', 'upload/052e28f78d.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&nbsp;sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit.</p>\r\n</body>\r\n</html>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campgallery`
--

CREATE TABLE `tbl_campgallery` (
  `galleryId` int(11) NOT NULL,
  `campId` int(11) NOT NULL,
  `imageTitle` varchar(255) NOT NULL,
  `galleryImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_campgallery`
--

INSERT INTO `tbl_campgallery` (`galleryId`, `campId`, `imageTitle`, `galleryImage`) VALUES
(1, 8, 'pic one', 'upload/4c4df5c23e.jpg'),
(2, 8, 'pic two', 'upload/bd7c9cd584.jpg'),
(3, 10, 'pic ruyht', 'upload/251b8a4669.jpg'),
(4, 8, 'pic four', 'upload/a349beb949.jpg'),
(5, 11, 'pic five', 'upload/5d1393990f.jpg'),
(6, 11, 'pic six', 'upload/95cf0a43e4.jpg'),
(7, 11, 'pic eight', 'upload/d990ef7e7e.jpg'),
(9, 8, 'pic r4 ', 'upload/0420c50e3a.jpg'),
(10, 11, 'rrf frf', 'upload/61169cdd0d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `distId` int(11) NOT NULL,
  `divId` int(11) NOT NULL,
  `distName` varchar(50) NOT NULL,
  `cityName` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`distId`, `divId`, `distName`, `cityName`, `zipcode`) VALUES
(1, 4, 'Noakhali', 'Maijdee', 3800),
(2, 2, 'Laksmipur', 'Eklashpur', 4545),
(3, 5, 'Feni', 'jomidarhat', 1234),
(4, 1, 'Comilla', 'paduyar bazar', 3421);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_division`
--

CREATE TABLE `tbl_division` (
  `divId` int(11) NOT NULL,
  `divName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_division`
--

INSERT INTO `tbl_division` (`divId`, `divName`) VALUES
(1, 'Chittagong'),
(2, 'Barisal'),
(3, 'Rajshahi'),
(4, 'Khulna'),
(5, 'Dhaka'),
(6, 'Sylhet'),
(7, 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donorregister`
--

CREATE TABLE `tbl_donorregister` (
  `donorId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `bg_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `donorImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donorregister`
--

INSERT INTO `tbl_donorregister` (`donorId`, `name`, `gender`, `age`, `mobile`, `bg_id`, `email`, `password`, `donorImage`) VALUES
(1, 'jack', 'male', 23, '01234567812', 7, 'jack@gmail.com', '4ff9fc6e4e5d5f590c4f2134a8cc96d1', 'admin/upload/71773789fc.jpg'),
(2, 'nerru', 'female', 21, '08998', 8, 'nerru@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin/upload/119326db51.jpg'),
(6, 'ruhul', 'male', 24, '12215476239', 1, 'ruhul@gmail.com', '7914774f936ec25d9e9e2548e8a45e8c', 'admin/upload/726f86b95d.jpg'),
(7, 'ariful', 'male', 45, '08998894356', 10, 'ariful@gmail.com', '91f2fc7400bc983bbc38745e4c3a6120', 'admin/upload/d86ddd0ff3.jpg'),
(8, 'mahdi', 'female', 27, '42123542323', 1, 'mahdibilla@gmail.com', 'f9c24b8f961d48841a9838cca5274d8d', 'admin/upload/4688eb53f4.jpg'),
(9, 'zahid', 'male', 23, '21342442326', 1, 'zahid@gmail.com', 'c651148415ab2a260e6c506075c12ae3', 'admin/upload/5adb3272f8.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `requestId` int(11) NOT NULL,
  `reqName` varchar(100) NOT NULL,
  `reqAge` int(11) NOT NULL,
  `reqGender` varchar(50) NOT NULL,
  `reqMobile` varchar(50) NOT NULL,
  `reqEmail` varchar(255) NOT NULL,
  `bg_id` int(11) NOT NULL,
  `reqDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reqDetail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`requestId`, `reqName`, `reqAge`, `reqGender`, `reqMobile`, `reqEmail`, `bg_id`, `reqDate`, `reqDetail`) VALUES
(7, 'Ariful', 23, 'female', '3265466546', 'ariful@gmail.com', 2, '2018-04-14 00:00:00', ' dhfhd '),
(8, 'xgfbf', 45, 'female', '3265466546', 'ami@gmail.com', 9, '2018-04-21 14:22:00', ' hhjdx'),
(9, 'pijush', 23, 'male', '01993446356', 'pij@gmail.com', 1, '2018-04-24 00:00:00', ' Urgent to save life '),
(10, 'Mahdi', 24, 'male', '01693446355', 'mahdi@gmail.com', 2, '2018-04-26 03:45:00', 'save ife'),
(11, 'zahidul', 21, 'male', '3265466546', 'zahidul@gmail.com', 7, '2018-04-26 12:34:00', ' rgt rdh y r');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `body`) VALUES
(2, 'upload/5a44d3fbe1.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>fdsafd&nbsp; jbh iuuhuih iii ljopjioj g ytyftfdrfy tyfgyguyggycghhy yftrtdghji</p>\r\n</body>\r\n</html>'),
(3, 'upload/7c21c0e874.jpg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>huihiu joik iojl ojio&nbsp;Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus. Donec rutrum congue leo eget malesuada. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p>\r\n</body>\r\n</html>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `social_id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL,
  `ins` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_phone` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`social_id`, `fb`, `tw`, `gp`, `ins`, `site_email`, `site_phone`, `copyright`) VALUES
(1, 'facebook', 'twitter', 'google plus', 'instagram', ' info@example.com', '+ 655 8858 54892    ', 'Â© 2018 Blood-Bank. All rights reserved | Design by Pijush Karmakar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`bg_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_camp`
--
ALTER TABLE `tbl_camp`
  ADD PRIMARY KEY (`campId`);

--
-- Indexes for table `tbl_campgallery`
--
ALTER TABLE `tbl_campgallery`
  ADD PRIMARY KEY (`galleryId`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`distId`);

--
-- Indexes for table `tbl_division`
--
ALTER TABLE `tbl_division`
  ADD PRIMARY KEY (`divId`);

--
-- Indexes for table `tbl_donorregister`
--
ALTER TABLE `tbl_donorregister`
  ADD PRIMARY KEY (`donorId`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`requestId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`social_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_camp`
--
ALTER TABLE `tbl_camp`
  MODIFY `campId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_campgallery`
--
ALTER TABLE `tbl_campgallery`
  MODIFY `galleryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `distId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_division`
--
ALTER TABLE `tbl_division`
  MODIFY `divId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_donorregister`
--
ALTER TABLE `tbl_donorregister`
  MODIFY `donorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
