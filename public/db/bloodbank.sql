-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 03:42 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodinfo`
--

CREATE DATABASE `bloodbank`;

CREATE TABLE `bloodinfo`
(
  `id`            bigint(20)  NOT NULL,
  `hospital_id`   bigint(20)  NOT NULL,
  `bloodgroup`    varchar(10) NOT NULL,
  `bloodquantity` int(11)     NOT NULL,
  `created_at`    timestamp   NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `bloodinfo`
--

INSERT INTO `bloodinfo` (`id`, `hospital_id`, `bloodgroup`, `bloodquantity`, `created_at`)
VALUES
  (1, 1, 'A+', 50, '2018-12-19 22:02:31'),
  (2, 2, 'B+', 60, '2018-12-19 22:03:44'),
  (3, 2, 'B+', 64, '2018-12-19 22:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE `bloodrequest`
(
  `id`                    bigint(20)   NOT NULL,
  `hospital_id`           bigint(20)   NOT NULL,
  `requester_name`        varchar(255) NOT NULL,
  `requested_blood_group` varchar(10)  NOT NULL,
  `created_at`            timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`id`, `hospital_id`, `requester_name`, `requested_blood_group`, `created_at`)
VALUES
  (1, 1, 'John Doe', 'A+', '2018-12-19 22:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals`
(
  `id`             bigint(20)   NOT NULL,
  `name`           varchar(255) NOT NULL,
  `registrationid` varchar(50)  NOT NULL,
  `email`          varchar(255) NOT NULL,
  `password`       varchar(255) NOT NULL,
  `created_at`     timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `registrationid`, `email`, `password`, `created_at`)
VALUES
(1, 'Excellence Hospital', 'excellence_451', 'blood@excellence.com',
 '$2y$10$7zHVMc0ccfxuaaokOBwezeH5AM6NF70MQVWbXDg/fxudnbK1PLFsu', '2018-12-19 22:01:57'),
(2, 'Brilliant Hospital', 'brilliant_123', 'blood@brilliant.com',
 '$2y$10$B4JV2cEEICYIZ1jjGshO5u0cYhr9g/yQ7VR94WWwz8amWNOgUxnBu', '2018-12-19 22:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers`
(
  `id`         bigint(20)   NOT NULL,
  `name`       varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `email`      varchar(255) NOT NULL,
  `password`   varchar(255) NOT NULL,
  `gender`     varchar(50)  NOT NULL,
  `bloodgroup` varchar(10)  NOT NULL,
  `dob`        datetime     NOT NULL,
  `mobile`     varchar(10)  NOT NULL,
  `state`      varchar(255) NOT NULL,
  `city`       varchar(255) NOT NULL,
  `address`    varchar(400) NOT NULL,
  `pincode`    varchar(6)   NOT NULL,
  `receiverdp` varchar(400) NOT NULL,
  `created_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `name`, `fathername`, `email`, `password`, `gender`, `bloodgroup`, `dob`, `mobile`,
                         `state`, `city`, `address`, `pincode`, `receiverdp`, `created_at`)
VALUES
(1, 'John Doe', 'Jacob Doe', 'johndoe@gmail.com', '$2y$10$DtKLQ/vYjlBg4IaODehS3.zgvzM4zqKkvK3rts/gSEo37OxEezmGe',
 'Male', 'AB+', '2018-12-01 00:00:00', '1234567890', 'Fake State', 'Fake City', 'Fake Address', '123456',
 'images/user_photos/robert.jpg', '2018-12-19 21:57:35'),
(2, 'Jane Doe', 'Jonas Doe', 'jane@gmail.com', '$2y$10$DSjyFeK.QIJZx1jhSLg8o.KQIcbRax3eEIhkMxLaWPIbVW.bxR7dO', 'Female',
 'O+', '2018-12-01 00:00:00', '1234546789', 'Fake State', 'Fake City', 'Fake Address', '123456',
 'images/user_photos/80.jpg', '2018-12-19 22:00:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodinfo`
--
ALTER TABLE `bloodinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodinfo`
--
ALTER TABLE `bloodinfo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodinfo`
--
ALTER TABLE `bloodinfo`
  ADD CONSTRAINT `bloodinfo_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD CONSTRAINT `bloodrequest_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
