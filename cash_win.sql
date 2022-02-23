-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 05:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cash_win`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bank_code` varchar(20) NOT NULL,
  `count1` varchar(30) NOT NULL,
  `count2` varchar(30) NOT NULL,
  `count3` varchar(30) NOT NULL,
  `destination_account` varchar(100) NOT NULL,
  `extension_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `name`, `bank_code`, `count1`, `count2`, `count3`, `destination_account`, `extension_code`) VALUES
(1, 'ALLBANK (A THRIFT BANK) INC.', 'AUB', '12', '2', '0', 'All Regular Savings, Current & Cash Card Accounts', 'allbankx'),
(2, 'ALLIED BANKING CORP (NOW PNB)', 'BDO', '12', '0', '0', 'All Savings & Checking Account except Cash Card', 'pnbx'),
(3, 'ASIA UNITED BANK', 'BMB', '12', '16', '0', 'All Accounts except CASH CARD', 'aubx'),
(4, 'BANCO DE ORO', 'BOC', '12', '0', '0', 'All Accounts except CASH CARD', 'banco de oro'),
(5, 'BDO NETWORK BANK, INC.', 'BPI', '10', '0', '0', 'All Savings & Checking Account except Cash Card', 'onbx'),
(6, 'BANGKO MABUHAY (A RURAL BANK), INC.', 'BPI', '10', '0', '0', 'All Savings & Checking Account except Cash Card', 'bangkomabuhayx'),
(7, 'BANK OF COMMERCE', 'CBC', '10', '12', '0', 'All Savings & Checking Account except Cash Card', 'bankofcommercex'),
(8, 'BPI', 'CBS', '10', '12', '0', 'All Savings & Checking Account except Cash Card', 'bpi'),
(9, 'BPI FAMILY SAVINGS', 'CTB', '10', '0', '0', 'All Savings & Current Accounts only', 'bpi family savings'),
(10, 'CARD BANK INC', 'CSB', '13', '0', '0', 'All Accounts except CASH CARD', 'cardbankx'),
(11, 'CHINA BANKING CORPORATION', 'CCB', '12', '0', '0', 'All Accounts except CASH CARD', 'chinabankx'),
(12, 'CHINA BANK SAVINGS', 'DBP', '10', '0', '0', 'All ATM Accounts except Cash Card', 'chinabanksavingsx'),
(13, 'CHINA TRUST (PHILS.)', 'EWB', '12', '0', '0', 'All Current, Savings and Passbook Accounts except Cash Card', 'china trust (phils.)'),
(14, 'CITYSTATE SAVINGS BANK INC.', 'EWR', '12', '0', '0', 'All Savings & Checking Account except Cash Card', 'citystate savings bank inc.'),
(15, 'CTBC BANK (PHILIPPINES) CORPORATION', 'EQB', '14', '0', '0', 'All Accounts except CASH CARD (passbook with extra 50 pesos charge)', 'ctbcx'),
(16, 'DEVELOPMENT BANK OF THE PHILIPPINES', 'EBI', '14', '0', '0', 'Savings account only', 'dbpx'),
(17, 'DUNGGANON BANK, INC.', 'IBI', '11', '0', '0', 'All Accounts except CASH CARD', 'dungganonx'),
(18, 'EAST WEST BANKING CORPORATION', 'LBP', '10', '0', '0', 'All Accounts except PAYROLL and PASSBOOK', 'eastwestx'),
(19, 'EASTWEST RURAL BANK', 'MSB', '12', '0', '0', 'All Accounts except CASH CARD', 'eastwest_ruralx'),
(20, 'EQUICOM SAVINGS BANK, INC.', 'MPI', '11', '0', '0', 'Savings, Checking, Passbook & Cash Card', 'equicomx'),
(21, 'G-XCHANGE, INC. (GCASH)', 'MET', '13', '0', '0', 'Savings & Checking Account', 'gcashx'),
(22, 'GRABPAY PHILIPPINES', 'OPI', '16', '0', '0', 'Prepaid Cards', 'grabpayx'),
(23, 'ISLA BANK (A THRIFT BANK), INC.', 'PAR', '13', '0', '0', 'Current & Savings Account Only', 'islax'),
(24, 'LAND BANK OF THE PHILIPPINES', 'SMI', '10', '12', '0', 'All Accounts', 'landbankx'),
(25, 'MALAYAN BANK SAVINGS AND MORTGAGE BANK, INC.', 'PBC', '12', '0', '0', 'All Accounts except CASH CARD', 'malayanx'),
(26, 'MAYBANK PHILIPPINES, INC. ', 'PBB', '12', '0', '0', 'All Accounts except CASH CARD', 'maybankx'),
(27, 'METROBANK ', 'PNB', '12', '16', '0', 'Savings, Checking, Passbook Except Cash Card', 'metrobankx'),
(28, 'OMNIPAY, INC. ', 'PNS', '10', '12', '16', 'All Savings, Current, Passbook & Cash Card', 'omnipayx'),
(29, 'PARTNER RURAL BANK (COTABATO), INC. ', 'PSB', '12', '0', '0', 'All ATM Accounts except Cash Card', 'partnerruralx'),
(30, 'PBCOM ', 'PVB', '13', '0', '0', 'All Savings, Current & Passbook Accounts', 'pbcomx'),
(31, 'PAYMAYA PHILIPPINES, INC. ', 'RCI', '10', '16', '0', 'Savings, Checking, Passbook & Cash Card (Prepaid)', 'paymayax'),
(32, 'PHILIPPINE BUSINESS BANK, INC., A SAVINGS BANK ', 'RSI', '16', '18', '0', 'Savings, Checking, Passbook & Cash Card', 'pbbx'),
(33, 'PHILIPPINE TRUST COMPANY ', 'RBN', '15', '0', '0', 'Savings, Checking, Passbook & Cash Card', 'philippine trust company'),
(34, 'PNB ', 'SEC', '13', '0', '0', 'All savings, Current, Passbook & Cash Card Accounts', 'pnbx'),
(35, 'PHILIPPINE VETERANS BANK ', 'SBA', '15', '16', '0', 'All Accounts except CASH CARD', 'veteransx'),
(36, 'PSBANK ', 'UCP', '10', '12', '0', 'All Savings, Checking, Passbook & Cash Card', 'psbankx'),
(37, 'QUEZON CAPITAL RURAL BANK ', 'USB', '11', '0', '0', 'All Accounts except CASH CARD', 'quezonbankx'),
(38, 'RCBC ', 'UBP', '12', '0', '0', 'All Accounts except CASH CARD', 'rcbcx'),
(39, 'RCBC SAVINGS BANK, INC. ', 'TYB', '12', '0', '0', 'Savings & Checking Account', 'rcbcsavingsx'),
(40, 'ROBINSONS BANK CORPORATION ', '', '', '', '', '', 'robinsonsx'),
(41, 'SECURITY BANK CORPORATION ', '', '', '', '', '', 'securityx'),
(42, 'STERLING BANK OF ASIA ', '', '', '', '', '', 'sterlingx'),
(43, 'SUN SAVINGS BANK, INC. ', '', '', '', '', '', 'sunsavingsx'),
(44, 'UCPB ', '', '', '', '', '', 'ucpbx'),
(45, 'UCPB SAVINGS BANK, INC. ', '', '', '', '', '', 'ucpbsavingsx'),
(46, 'UNION BANK OF THE PHILIPPINES ', '', '', '', '', '', 'unionbankx'),
(47, 'WEALTH DEVELOPMENT BANK,INC. ', '', '', '', '', '', 'wealthx'),
(48, 'YUANTA SAVINGS BANK ', '', '', '', '', '', 'yuanta savings bank');

-- --------------------------------------------------------

--
-- Table structure for table `clients_accounts`
--

CREATE TABLE `clients_accounts` (
  `id` int(10) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_accounts`
--

INSERT INTO `clients_accounts` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `added_at`) VALUES
(23, 'test4', 'test4', 'test4', 'test4@email.com', '$2y$10$F9toqKH5B2NcPwg.glccOezSuK5vUtmJnTKx864be1mUNMMtN7B7u', '2021-12-27 22:16:36'),
(24, 'Jimmy', 'Baruc', 'Jimmy', 'jimmyconsulta@yahoo.com', '$2y$10$IYQHKNwZHIFB6yC1z8FlEuf.Pcp9X9Mk8yaX/uv6/o2M/CXfepama', '2021-12-28 21:57:34'),
(25, 'Juan', 'Pedro', 'Juan', 'juan@email.com', '$2y$10$VmoS2LOXQR1M3fzwFe9N7eB8URFSQ8LXoRhtDiwOuy05FQIoW/wkW', '2022-01-14 21:42:42'),
(26, 'Test', 'test', 'Test', 'testClient@email.com', '$2y$10$JXaecIZKE56MYDbn9VdRnOkE1u2GlM6gat96b/s/pBQaJ4G/8j3dq', '2022-01-24 22:55:04'),
(28, 'test5', 'test5', 'test5', 'test5@email.com', '$2y$10$3q6mVRrnkVgMahwdqK/Yju3uvrlnIM234QCUTljo.6osaQv9iq1vu', '2022-01-26 22:38:17'),
(29, 'test6', 'test6', 'test6', 'test6@email.com', '$2y$10$o7QXJcuLhzphjvWEnz0Yp.mT96fNaoewDaZNYb/zEYxPHVuykyBf6', '2022-01-27 19:06:42'),
(30, 'test7', 'test7', 'test7', 'test7@email.com', '$2y$10$q61BkMHERAAdi5wjflMj2OLu3.sHVnupYZjCJZ0iGM4zSEnclLJPG', '2022-01-27 19:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `clients_action_history`
--

CREATE TABLE `clients_action_history` (
  `id` int(11) NOT NULL,
  `application_no` varchar(10) NOT NULL,
  `remark_content` text NOT NULL,
  `action_by` varchar(50) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_action_history`
--

INSERT INTO `clients_action_history` (`id`, `application_no`, `remark_content`, `action_by`, `added_at`) VALUES
(1, '123490', 'Transferred From Fresh to In Process bucket', 'Jimmy Consulta', '2022-02-20 11:03:17'),
(2, '123490', 'added file', 'Jimmy Consulta', '2022-02-20 12:01:26'),
(3, '123490', 'added file', 'Jimmy Consulta', '2022-02-20 12:01:44'),
(4, '123490', 'added file', 'Jimmy Consulta', '2022-02-20 12:01:45'),
(5, '123490', 'added file', 'Jimmy Consulta', '2022-02-20 12:12:38'),
(6, '123490', 'Added remarksYes', 'Jimmy Consulta', '2022-02-20 12:12:38'),
(7, '123490', 'added file', 'Jimmy Consulta', '2022-02-20 12:13:12'),
(8, '123490', 'Added remarks // Yes', 'Jimmy Consulta', '2022-02-20 12:13:12'),
(9, '123490', 'Added remarks // Hey!', 'Jimmy Consulta', '2022-02-20 12:18:03'),
(10, '123490', 'Edited application details', 'Jimmy Consulta', '2022-02-20 12:22:33'),
(11, '123490', 'Forwarded application to SVO dashboard', 'Jimmy Consulta', '2022-02-20 12:25:36'),
(12, '123490', 'Added remarks // yo!', 'Matthew Genesis', '2022-02-20 15:29:02'),
(13, '123490', 'added file', 'Matthew Genesis', '2022-02-20 15:29:32'),
(14, '123490', 'Added remarks // Hey!', 'Matthew Genesis', '2022-02-20 15:29:32'),
(15, '123490', 'Added remarks // Hey!', 'Matthew Genesis', '2022-02-20 15:34:35'),
(16, '123490', 'Added remarks // Hey!', 'Matthew Genesis', '2022-02-20 15:35:10'),
(17, '123490', 'Added remarks // Hey!', 'Matthew Genesis', '2022-02-20 15:35:21'),
(18, '123490', 'Added remarks // Hey!', 'Matthew Genesis', '2022-02-20 15:35:28'),
(19, '123490', 'Added file', 'Matthew Genesis', '2022-02-20 15:38:11'),
(20, '123490', 'Added file // Hey!', 'Matthew Genesis', '2022-02-20 15:38:11'),
(21, '123490', 'Added remarks // yow!', 'Matthew Genesis', '2022-02-20 15:38:20'),
(22, '123490', 'Added remarks // Hey!', 'Matthew Genesis', '2022-02-20 15:39:08'),
(23, '123490', 'Added file', 'Matthew Genesis', '2022-02-20 15:39:22'),
(24, '123490', 'Added remarks // Yow!', 'Matthew Genesis', '2022-02-20 15:39:22'),
(25, '123490', 'Added file', 'Matthew Genesis', '2022-02-20 15:39:56'),
(26, '123490', 'Added remarks // Ano', 'Matthew Genesis', '2022-02-20 15:39:56'),
(27, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 15:46:39'),
(28, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 15:46:39'),
(29, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 15:51:07'),
(30, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 15:51:51'),
(31, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 15:51:51'),
(32, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 16:02:56'),
(33, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 16:02:57'),
(34, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 16:09:39'),
(35, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 18:16:04'),
(36, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 18:17:31'),
(37, '123490', 'Forwarded application to Contracts dashboard', 'Matthew Genesis', '2022-02-20 18:18:26'),
(38, '123490', 'Added remarks // Hey! you!', 'Contracts Contracts', '2022-02-20 19:17:00'),
(39, '123490', 'Added remarks // asdf', 'Contracts Contracts', '2022-02-20 19:17:52'),
(40, '123490', 'Added remarks // You!', 'Contracts Contracts', '2022-02-20 19:23:32'),
(41, '123490', 'Added remarks // You!', 'Contracts Contracts', '2022-02-20 19:27:39'),
(42, '123490', 'Added remarks // You!', 'Contracts Contracts', '2022-02-20 19:28:17'),
(43, '123490', 'Added remarks // You! Hey!', 'Contracts Contracts', '2022-02-20 19:30:01'),
(44, '123490', 'Added file', 'Contracts Contracts', '2022-02-20 19:41:54'),
(45, '123490', 'Added remarks // You! Hey! Yeah!', 'Contracts Contracts', '2022-02-20 19:41:54'),
(46, '123490', 'Added file', 'Contracts Contracts', '2022-02-20 19:43:19'),
(47, '123490', 'Added remarks // yes!', 'Contracts Contracts', '2022-02-20 19:43:19'),
(48, '123490', 'Added file', 'Contracts Contracts', '2022-02-20 19:44:01'),
(49, '123490', 'Added remarks // yes!asdf', 'Contracts Contracts', '2022-02-20 19:44:01'),
(50, '123490', 'Added file', 'Contracts Contracts', '2022-02-20 19:44:54'),
(51, '123490', 'Added remarks // Yee!', 'Contracts Contracts', '2022-02-20 19:44:54'),
(52, '123490', 'Forwarded application to Accounts dashboard', 'Contracts Contracts', '2022-02-20 19:47:28'),
(53, '123490', 'Added remarks // asdf', 'accounts accounts', '2022-02-20 19:57:11'),
(54, '123490', 'Added remarks // asdfasdfa', 'accounts accounts', '2022-02-20 20:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `clients_address`
--

CREATE TABLE `clients_address` (
  `id` int(10) NOT NULL,
  `application_no` varchar(50) NOT NULL,
  `house_no` varchar(250) NOT NULL,
  `street` varchar(250) NOT NULL,
  `barangay` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `municipality` varchar(250) NOT NULL,
  `zip_code` varchar(250) NOT NULL,
  `address_remarks` varchar(250) NOT NULL,
  `map_link` text NOT NULL,
  `permanent_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_address`
--

INSERT INTO `clients_address` (`id`, `application_no`, `house_no`, `street`, `barangay`, `city`, `municipality`, `zip_code`, `address_remarks`, `map_link`, `permanent_address`) VALUES
(18, '123490', '2f', 'Bayani Road', 'Fort Bonifacio', 'Taguig', 'Metro Manila', '1630', 'asdfasd', 'sdaa', 'asdfasdfa'),
(19, '123491', 'Blk 34 Lot 2', 'Macopa St.', 'Katuparan', 'Taguig', 'Metro Manila', '', '', '', ''),
(20, '123492', 'Blk 34 Lot 2', 'Macopa St.', 'brgy. 42', 'Sampaloc Manila', 'Metro Manila', '1400', 'None', 'Maps Links', 'Same as present');

-- --------------------------------------------------------

--
-- Table structure for table `clients_application_history`
--

CREATE TABLE `clients_application_history` (
  `id` int(10) NOT NULL,
  `application_no` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `contract_remarks` text NOT NULL,
  `accounts_remarks` text NOT NULL,
  `application_history` text NOT NULL,
  `verifier` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_application_history`
--

INSERT INTO `clients_application_history` (`id`, `application_no`, `remarks`, `contract_remarks`, `accounts_remarks`, `application_history`, `verifier`, `approved_by`, `added_at`) VALUES
(1, 'CM123492', '', '', '', '', '', '', '2022-01-27 19:07:41'),
(2, '123490', 'Ano', 'Yee!', 'asdfasdfa', '', 'Contracts Contracts', 'Matthew Genesis', '2022-01-27 19:07:41'),
(3, '123491', '', '', '', '', 'Jimmy Consulta', '', '2022-01-27 19:07:41'),
(4, '123492', '', '', '', 'Updated information by Jimmy Consulta2022-02-19 03:08:10pm // ', 'Jimmy Consulta', '', '2022-01-27 19:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `clients_character_references`
--

CREATE TABLE `clients_character_references` (
  `id` int(10) NOT NULL,
  `application_no` varchar(50) NOT NULL,
  `char_ref1_name` varchar(50) NOT NULL,
  `char_ref1_no` varchar(50) NOT NULL,
  `char_ref1_relationship` varchar(50) NOT NULL,
  `char_ref2_name` varchar(50) NOT NULL,
  `char_ref2_no` varchar(50) NOT NULL,
  `char_ref2_relationship` varchar(50) NOT NULL,
  `char_ref3_name` varchar(50) NOT NULL,
  `char_ref3_no` varchar(50) NOT NULL,
  `char_ref3_relationship` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_character_references`
--

INSERT INTO `clients_character_references` (`id`, `application_no`, `char_ref1_name`, `char_ref1_no`, `char_ref1_relationship`, `char_ref2_name`, `char_ref2_no`, `char_ref2_relationship`, `char_ref3_name`, `char_ref3_no`, `char_ref3_relationship`) VALUES
(1, '123492', 'John Doe', '1', 'Cousin', 'edgardo', '12312', 'Brother-in-law', 'San Pedro', '0129381', 'Kristo'),
(2, '123490', '2f', 'Bayani Road', 'Fort Bonifacio', 'Taguig', 'Metro Manila', '1603', 'a321sdf', 'asdfasdfa', 'asdfasdfad');

-- --------------------------------------------------------

--
-- Table structure for table `clients_job_description`
--

CREATE TABLE `clients_job_description` (
  `id` int(10) NOT NULL,
  `application_no` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(250) NOT NULL,
  `agency_name` varchar(100) NOT NULL,
  `branch_site_address` varchar(250) NOT NULL,
  `line_of_business` varchar(100) NOT NULL,
  `company_no1` varchar(50) NOT NULL,
  `company_no2` varchar(50) NOT NULL,
  `date_hired` date NOT NULL,
  `position` varchar(250) NOT NULL,
  `nature_of_work` varchar(250) NOT NULL,
  `status_in_company` varchar(50) NOT NULL,
  `basic_salary` int(10) NOT NULL,
  `salary1` int(10) NOT NULL,
  `salary2` int(10) NOT NULL,
  `salary3` int(10) NOT NULL,
  `salary4` int(10) NOT NULL,
  `payroll_type` varchar(50) NOT NULL,
  `paydate1` varchar(50) NOT NULL,
  `paydate2` varchar(50) NOT NULL,
  `paydate3` varchar(50) NOT NULL,
  `paydate4` varchar(50) NOT NULL,
  `job_description_remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_job_description`
--

INSERT INTO `clients_job_description` (`id`, `application_no`, `company_name`, `company_address`, `agency_name`, `branch_site_address`, `line_of_business`, `company_no1`, `company_no2`, `date_hired`, `position`, `nature_of_work`, `status_in_company`, `basic_salary`, `salary1`, `salary2`, `salary3`, `salary4`, `payroll_type`, `paydate1`, `paydate2`, `paydate3`, `paydate4`, `job_description_remarks`) VALUES
(7, '123490', 'Cashmart Philippines', 'Bayani Road Taguig', 'Belarsen foods corp', 'Pasay', 'Lending', '8290000', '09276469661', '2019-02-26', 'Senior Verification Officer', 'Assisting customer concerns', 'Probationary', 15000, 10000, 6000, 0, 0, 'Bi-weekly', '2022-01-15', '2022-01-30', '', '', 'None'),
(8, '123491', 'Alorica', 'Southgate Mall', '', '', 'BPO', '829000', '', '2022-01-01', 'Senior Verification Officer', '', '', 18000, 0, 0, 0, 0, '', '2022-01-15', '2022-01-30', '', '', ''),
(9, '123492', 'Cashmart', '2f GPVI Bldg. Bayani Road Fort Bonifacio Taguig', 'Direct Hire', 'Taguig', 'BPO', '829000', 'None', '2021-05-20', 'Senior Verification Officer', 'Cashier', 'Regular', 15000, 12000, 10000, 0, 0, 'Bi-weekly', '15', '30', '', '', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `clients_loan_and_bank_details`
--

CREATE TABLE `clients_loan_and_bank_details` (
  `id` int(10) NOT NULL,
  `application_no` varchar(50) NOT NULL,
  `requested_amount` int(10) NOT NULL,
  `requested_term` varchar(150) NOT NULL,
  `purpose_of_loan` varchar(250) NOT NULL,
  `primary_bank` varchar(250) NOT NULL,
  `primary_bank_no` varchar(50) NOT NULL,
  `alternate_bank` varchar(250) NOT NULL,
  `alternate_bank_no` varchar(50) NOT NULL,
  `netpay` varchar(10) NOT NULL,
  `additional_expenses` varchar(10) NOT NULL,
  `approve_amount` varchar(10) NOT NULL,
  `disbursement_date` date NOT NULL,
  `approve_term` varchar(50) NOT NULL,
  `date_forwarded` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_loan_and_bank_details`
--

INSERT INTO `clients_loan_and_bank_details` (`id`, `application_no`, `requested_amount`, `requested_term`, `purpose_of_loan`, `primary_bank`, `primary_bank_no`, `alternate_bank`, `alternate_bank_no`, `netpay`, `additional_expenses`, `approve_amount`, `disbursement_date`, `approve_term`, `date_forwarded`) VALUES
(2, '123490', 20000, '1', 'Additional Fund For Purchase Of Gadget', 'BPI', '1231231312', '', '', '16,000', '300', '5000', '2022-02-06', 'Weekly-3', ''),
(3, '123491', 20000, '1', '', '', '', '', '', '', '', '', '0000-00-00', '', ''),
(4, '123492', 15000, 'Bi-weekly-1', 'Additional Fund For Daily Expenses', 'BPI', '1232132321', '', '', '22,000', '5000', '5000', '2022-02-19', 'Weekly-2', '2022/02/19');

-- --------------------------------------------------------

--
-- Table structure for table `clients_loan_history`
--

CREATE TABLE `clients_loan_history` (
  `id` int(10) NOT NULL,
  `application_no` varchar(50) NOT NULL,
  `history_name1` varchar(50) NOT NULL,
  `history_amount1` varchar(50) NOT NULL,
  `history_name2` varchar(50) NOT NULL,
  `history_amount2` varchar(50) NOT NULL,
  `history_name3` varchar(50) NOT NULL,
  `history_amount3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_loan_history`
--

INSERT INTO `clients_loan_history` (`id`, `application_no`, `history_name1`, `history_amount1`, `history_name2`, `history_amount2`, `history_name3`, `history_amount3`) VALUES
(1, '123492', 'None', '0', '2', '0', 'Cashalo', '0'),
(2, '123490', 'tala', '500', 'Cashwagon', '1000', 'Cashalo', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `clients_personal_information`
--

CREATE TABLE `clients_personal_information` (
  `id` int(10) NOT NULL,
  `application_no` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dependent` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alternate_email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `place_of_birth` varchar(250) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `primary_no` int(15) NOT NULL,
  `primary_no_line` varchar(50) NOT NULL,
  `primary_no_plan_amount` int(10) NOT NULL,
  `primary_no_remarks` text NOT NULL,
  `secondary_no` varchar(50) NOT NULL,
  `secondary_no_line` varchar(50) NOT NULL,
  `secondary_no_plan_amount` int(10) NOT NULL,
  `secondary_no_remarks` text NOT NULL,
  `sss_no` varchar(100) NOT NULL,
  `spouse_name` varchar(100) NOT NULL,
  `spouse_occupation` varchar(250) NOT NULL,
  `spouse_remarks` text NOT NULL,
  `mothers_name` varchar(250) NOT NULL,
  `mothers_occupation` varchar(250) NOT NULL,
  `mothers_address` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `for_forward` varchar(50) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_personal_information`
--

INSERT INTO `clients_personal_information` (`id`, `application_no`, `firstname`, `middlename`, `lastname`, `birthday`, `gender`, `dependent`, `email`, `alternate_email`, `facebook`, `place_of_birth`, `civil_status`, `primary_no`, `primary_no_line`, `primary_no_plan_amount`, `primary_no_remarks`, `secondary_no`, `secondary_no_line`, `secondary_no_plan_amount`, `secondary_no_remarks`, `sss_no`, `spouse_name`, `spouse_occupation`, `spouse_remarks`, `mothers_name`, `mothers_occupation`, `mothers_address`, `status`, `for_forward`, `added_at`) VALUES
(1, 'CM123492', 'static', 'static', 'static', '1992-02-29', 'Male', 1, 'jimmyconsulta@yahoo.com', 'none', 'none', 'Fabella Manila', 'single', 123, 'none', 0, 'NOne', 'nonne', 'none', 0, 'none', '123456789', 'noen', 'none', 'none', '', 'Erlinda', 'same', '', '', '2022-02-06 10:41:24'),
(4, '123490', 'Jet Li', 'test5', 'test5', '1992-02-29', 'Female', 0, 'test5@email.com', '', 'asdfa', 'asdf', 'Single', 123231231, 'Prepaid', 0, '', '1232132121', 'Postpaid', 0, '', 'asdf', 'asdfa', '', '', 'asdfadsa', '', '', 'For Disbursement', 'Forwarded', '2022-02-06 10:41:24'),
(5, '123491', 'test6', 'test6', 'test6', '0000-00-00', '', 0, 'test6@email.com', '', '', '', '', 190238, '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', 'Inprocess', '', '2022-02-06 10:41:24'),
(6, '123492', 'test7', 'test7', 'test7', '0000-00-00', 'Female', 2, 'test7@email.com', 'None', 'Facebook Link', 'Manila', 'Married', 231564, 'Postpaid', 0, '', 'None', 'Postpaid', 0, '', '246810', 'Maria', 'Occupation 1', 'None', 'Ana', 'Mother 1', 'None', 'Senior Verification', 'Forward', '2022-02-06 10:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `gender`, `email`, `department`, `position`, `password`, `access`, `status`, `added_at`) VALUES
(124, 'Cardo', 'C', 'Dalisay', 'cardodalisay', 'Male', 'cardo@email.com', 'Compliance', 'Approver', '$2y$10$vnaoVm1NaXbkYoB9NpWoVOKpdENbl8jXZuIem551fgziT/F42NZpC', 'User', '', '2021-12-13 14:48:05'),
(125, 'Jimmy', 'Baruc', 'Consulta', 'admin', 'Male', 'jimmy@email.com', 'Compliance', 'Approver', '$2y$10$ZVw85oOYSuUcltO4yn8btOPRONMfhQMis5478XN8.X5JlAZXZpZXC', 'User', '', '2021-12-13 19:56:26'),
(126, 'Matthew', 'Y', 'Genesis', 'svo', 'Male', 'matthew@email.com', 'Compliance', 'Senior Verification Officer', '$2y$10$BUeeiaGIYaSefiPCy49DBOFnOiGlPZ/ZC0O/7GTEUVu2pnW89Hiza', 'User', '', '2022-01-02 20:46:00'),
(127, 'Contracts', 'Contracts', 'Contracts', 'contracts', 'Female', 'contracts@email.com', 'Contracts', 'Verification Officer', '$2y$10$cdP8KnUUfJGMVDNyrvGWFeDdyhVm0d7efVdwLSPtbKKthiXN5GIkK', 'User', '', '2022-01-04 21:12:21'),
(128, 'accounts', 'accounts', 'accounts', 'accounts', 'Male', 'accounts@email.com', 'Accounts', 'Verification Officer', '$2y$10$2RSvdf03dtm8eFSCgacEoubGqCjesANXK3ohb61VY.9t4sk/39Bz.', 'User', '', '2022-01-14 20:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `new_application`
--

CREATE TABLE `new_application` (
  `id` int(10) NOT NULL,
  `application_no` varchar(150) NOT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `middlename` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `dependent` varchar(150) DEFAULT NULL,
  `civil_status` varchar(150) DEFAULT NULL,
  `personal_email` varchar(150) DEFAULT NULL,
  `alternate_email` varchar(150) DEFAULT NULL,
  `facebook_link` varchar(150) DEFAULT NULL,
  `place_of_birth` varchar(150) DEFAULT NULL,
  `contact_no1` varchar(10) DEFAULT NULL,
  `contact_no1_plan` varchar(150) DEFAULT NULL,
  `contact_no1_amount` int(10) DEFAULT NULL,
  `contact_no1_remarks` text NOT NULL,
  `contact_no2` varchar(10) DEFAULT NULL,
  `contact_no2_plan` varchar(150) DEFAULT NULL,
  `contact_no2_amount` int(10) DEFAULT NULL,
  `contact_no2_remarks` text NOT NULL,
  `house_no` varchar(150) DEFAULT NULL,
  `street` varchar(150) DEFAULT NULL,
  `barangay` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `municipality` varchar(150) DEFAULT NULL,
  `zip_code` varchar(20) NOT NULL,
  `address_remarks` text NOT NULL,
  `map_link` varchar(250) DEFAULT NULL,
  `permanent_address` varchar(150) DEFAULT NULL,
  `sss_no` varchar(150) DEFAULT NULL,
  `spouse` varchar(150) DEFAULT NULL,
  `spouse_work` varchar(255) NOT NULL,
  `spouse_remarks` text NOT NULL,
  `mother_name` varchar(150) DEFAULT NULL,
  `mother_remarks` varchar(150) DEFAULT NULL,
  `mother_address` varchar(255) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `company_address` varchar(150) DEFAULT NULL,
  `agency_name` varchar(255) NOT NULL,
  `branch_address` varchar(150) DEFAULT NULL,
  `line_of_business` varchar(150) DEFAULT NULL,
  `company_no1` varchar(150) DEFAULT NULL,
  `company_no2` varchar(50) NOT NULL,
  `date_hire` date DEFAULT NULL,
  `position` varchar(150) DEFAULT NULL,
  `nature_of_work` varchar(150) DEFAULT NULL,
  `status_in_work` varchar(50) NOT NULL,
  `basic_salary` int(10) DEFAULT NULL,
  `salary1` int(10) DEFAULT NULL,
  `salary2` int(10) DEFAULT NULL,
  `salary3` int(10) DEFAULT NULL,
  `salary4` int(10) DEFAULT NULL,
  `payroll_type` varchar(150) DEFAULT NULL,
  `pay_date1` varchar(50) NOT NULL,
  `pay_date2` varchar(50) NOT NULL,
  `pay_date3` varchar(50) NOT NULL,
  `pay_date4` varchar(50) NOT NULL,
  `plan_to_transfer` text NOT NULL,
  `loan_history1` varchar(150) DEFAULT NULL,
  `loan_amount1` int(10) DEFAULT NULL,
  `loan_history2` varchar(150) DEFAULT NULL,
  `loan_amount2` int(10) DEFAULT NULL,
  `loan_history3` varchar(150) DEFAULT NULL,
  `loan_amount3` int(10) DEFAULT NULL,
  `requested_amount` int(10) DEFAULT NULL,
  `requested_term` varchar(150) DEFAULT NULL,
  `purpose_of_loan` varchar(250) NOT NULL,
  `bank_name` varchar(150) DEFAULT NULL,
  `account_number` varchar(50) NOT NULL,
  `alternate_bank_name` varchar(50) NOT NULL,
  `alternate_account_number` varchar(50) NOT NULL,
  `netpay` int(10) NOT NULL,
  `unofficial_expenses` int(10) NOT NULL,
  `additional_expenses` int(10) NOT NULL,
  `total_netpay` int(10) NOT NULL,
  `approve_amount` int(10) DEFAULT NULL,
  `approve_term` varchar(150) DEFAULT NULL,
  `disbursement_date` date DEFAULT NULL,
  `character_reference1` varchar(55) NOT NULL,
  `character_reference1_no` varchar(50) NOT NULL,
  `character_reference1_relationship` varchar(100) NOT NULL,
  `character_reference2` varchar(55) NOT NULL,
  `character_reference2_no` varchar(50) NOT NULL,
  `character_reference2_relationship` varchar(100) NOT NULL,
  `character_reference3` varchar(55) NOT NULL,
  `character_reference3_no` varchar(50) NOT NULL,
  `character_reference3_relationship` varchar(100) NOT NULL,
  `call_time_morning` varchar(255) NOT NULL,
  `call_time_afternoon` varchar(255) NOT NULL,
  `verifier` varchar(100) NOT NULL,
  `verified_by` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `contracts_remarks` text NOT NULL,
  `for_forward` varchar(50) NOT NULL,
  `date_forwarded` date DEFAULT NULL,
  `application_history` text NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_application`
--

INSERT INTO `new_application` (`id`, `application_no`, `firstname`, `middlename`, `lastname`, `birthday`, `gender`, `dependent`, `civil_status`, `personal_email`, `alternate_email`, `facebook_link`, `place_of_birth`, `contact_no1`, `contact_no1_plan`, `contact_no1_amount`, `contact_no1_remarks`, `contact_no2`, `contact_no2_plan`, `contact_no2_amount`, `contact_no2_remarks`, `house_no`, `street`, `barangay`, `city`, `municipality`, `zip_code`, `address_remarks`, `map_link`, `permanent_address`, `sss_no`, `spouse`, `spouse_work`, `spouse_remarks`, `mother_name`, `mother_remarks`, `mother_address`, `company_name`, `company_address`, `agency_name`, `branch_address`, `line_of_business`, `company_no1`, `company_no2`, `date_hire`, `position`, `nature_of_work`, `status_in_work`, `basic_salary`, `salary1`, `salary2`, `salary3`, `salary4`, `payroll_type`, `pay_date1`, `pay_date2`, `pay_date3`, `pay_date4`, `plan_to_transfer`, `loan_history1`, `loan_amount1`, `loan_history2`, `loan_amount2`, `loan_history3`, `loan_amount3`, `requested_amount`, `requested_term`, `purpose_of_loan`, `bank_name`, `account_number`, `alternate_bank_name`, `alternate_account_number`, `netpay`, `unofficial_expenses`, `additional_expenses`, `total_netpay`, `approve_amount`, `approve_term`, `disbursement_date`, `character_reference1`, `character_reference1_no`, `character_reference1_relationship`, `character_reference2`, `character_reference2_no`, `character_reference2_relationship`, `character_reference3`, `character_reference3_no`, `character_reference3_relationship`, `call_time_morning`, `call_time_afternoon`, `verifier`, `verified_by`, `status`, `remarks`, `contracts_remarks`, `for_forward`, `date_forwarded`, `application_history`, `added_at`) VALUES
(1, 'CM123487', 'Agapito1', 'Hampas', 'Lupa', '1992-02-29', 'Male', '1', 'Single', 'jimmy@yahoo.com', 'jimmy2@yahoo.com\n', 'link link', 'taguig', '123456', 'Postpaid', 7000, 'Hi', '321321321', 'Prepaid', 600, 'Yow', '110', '4', 'katuparan', 'Taguig', 'Metro manila', '0', '', NULL, 'Hello', '123456', 'alyana', '', '', 'Elsa', 'Supreme Court', 'tondo', 'Cashmart', 'Taguig', 'Totoy Mola', 'Heaven', 'Drugs', '123456', '2468', '2021-12-01', 'Drug Lord', 'Dealer', 'Regular', 100000, 10000, 5000, 3000, 40000, 'Monthly', '15', '30', '0', '0', 'none', 'Tala', 3000, 'Cashalo', 2000, 'cashwagon', 1000, 50000, 'Bi-weekly-2', 'Additional Fund for Purchase of Gadget', 'BANCO DE ORO', '123456898711', 'BPI', '2222222222', 58000, 7300, 7300, 58000, 10000, 'Weekly-2', '2021-12-16', 'Ref 1', '789456123', 'Cousin', 'Ref 2', '321654987', 'Uncle', 'Ref 3', '55555555555', 'housemate', '', '', '', '', 'Inprocess', 'One Piece\r\n', '0', '', '0000-00-00', 'Old remarks: One Piece Kaido/ New remarks: One Piece edit by Jimmy Consulta 2021-12-14 02:53:52pm // Old remarks: One Piece/ New remarks: One Piece Luffy\n edit by Jimmy Consulta 2021-12-14 02:54:37pm // Old remarks: One Piece Luffy\n/ New remarks: One Piece\n edit by Jimmy Consulta 2021-12-14 03:00:07pm // ', '0000-00-00 00:00:00'),
(60, '123484', 'Reyson', 'Muxhi', 'Cabigting', '1992-02-29', 'Female', '1', 'Single', 'test4@email.com', 'reyson@email.com', 'Facebook Link', 'Manila', '1231231231', 'Postpaid', 0, '', '246810', 'Postpaid', 0, '', '1', '1', '1', '1', '1', '0', '', 'Map Link', 'Taguig', '246810', 'Mari', '', '', 'Ana', '', '', '1', '1', 'Watsons', 'Makati', '1', '1', '', '2021-12-28', '1', 'Cashier', 'Regular', 25000, 10000, 8000, 0, 0, 'Monthly', '15', '30', '', '', '', 'Cashalo', 1000, '', 0, '', 0, 1, '1', 'Additional Fund For Daily Expenses', 'BANK OF COMMERCE', '1234567489', 'DUNGGANON BANK, INC.', '77123456789', 18, 0, 300, 0, 5000, 'Weekly-4', '2022-01-03', 'John Doe', '1236456', '1', '1', '1', '1', 'San Pedro', '1', 'God Father', '1', '1', 'accounts accounts', 'Matthew Genesis', 'Fresh', '1232312New remarks: 1232312 edit by Matthew Genesis 2022-01-02 09:51:54pm // New remarks: Jimmy edit by Matthew Genesis 2022-01-02 09:53:03pm // OnepiceLuffyRemarks updated by Contracts Contracts 2022-01-13 09:53:53pm // yowRemarks updated by Contracts Contracts 2022-01-13 10:54:35pm // yow Remarks updated by Contracts Contracts 2022-01-13 10:56:52pm // ', '0', 'Forwarded', '2022-01-05', 'Uploaded files by Contracts Contracts 2022-01-13 10:56:52pm // Uploaded files by Contracts Contracts 2022-01-13 10:58:27pm // ', '2021-12-27 22:16:36'),
(61, '123485', 'Jimmy', 'Baruc LSK', 'Consulta', '1992-02-29', 'Male', '1', 'Separated', 'jimmyconsulta@yahoo.com', '1', '11', '', '0927646966', 'Postpaid', 0, '', '123456', 'Postpaid', 0, '', '110', '4th', 'Katuparan', 'Taguig', 'NCR', '0', '', '1', '1', '1', '1', 'Laundry', '', '1', '', '', 'Cashmart', '2f GPVI Bldg. Bayani Road Fort Bonifacio Taguig', '1', '1', 'Lending', '829000', '', '2019-02-26', 'Senior Verification Officer', '1', 'Regular', 18000, 2000, 0, 0, 0, 'Monthly', '15', '30', '', '', '', '1', 0, '', 0, '', 0, 20000, 'Weekly-3', 'Additional Fund For Daily Expenses', 'CARD BANK INC', '1234567894123', '', '', 0, 0, 0, 0, 10000, 'Monthly', '2021-12-30', '1', '1', '1', '1', '1', '1', '1', '1', '1234asdf', '8AM', '10PM', '', '', 'Fresh', '2New remarks: 2 edit by Jimmy Consulta 2021-12-30 05:58:37pm // ', '0', 'Forward', '0000-00-00', 'Uploaded files by Jimmy Consulta 2022-01-16 04:23:48pm // Updated information by Jimmy Consulta2022-01-16 04:24:15pm // Updated information by Jimmy Consulta2022-01-16 04:24:30pm // ', '2021-12-28 21:57:34'),
(62, '123486', 'Juan', 'Pedro', 'Juan', '0000-00-00', 'Male', '12', 'Single', 'juan@email.com', 'None', 'Juan@facebook.com', 'manila', '123456798', 'Postpaid', 700, '', 'None', 'Postpaid', 0, '', 'Blk 34 Lot 2', 'Macopa St.', 'brgy. 42', 'Sampaloc Manila', 'Metro Manila', '1400', '', 'Maps Links', 'Same as present', '231356464', 'Maria', '', '', 'Corazon', '', '', 'Alorica', 'Southgate Mall', 'Direct Hire', 'Southgate Mall', 'BPO', '98765431', 'None', '2020-12-14', 'CSR', 'Assisting customer concerns', 'Regular', 25000, 12500, 10000, 0, 0, 'Bi-weekly', '15', '30', '', '', 'Nonee', 'None', 0, '', 0, '', 0, 15000, 'Weekly-3', 'Additional Fund For Daily Expenses', 'BPI', '1234567897', '', '', 22, 0, 5000, 0, 7000, 'Bi-weekly-2', '2022-01-14', '2', '3', '3', '1', '3', '2', '1', '32', '1', '8AM', '3pm', 'Contracts Contracts', 'Matthew Genesis', 'Fresh', 'New remarks: ALoha edit by Jimmy Consulta 2022-01-14 09:46:31pm // ', '', 'Forwarded', '2022-01-14', 'Old remarks: New remarks: ALoha edit by Jimmy Consulta 2022-01-14 09:46:31pm // Updated information by Jimmy Consulta2022-01-14 10:03:13pm // Uploaded files by Contracts Contracts 2022-01-14 10:08:35pm // ', '2022-01-14 21:42:41'),
(63, '123487', 'Test', 'test', 'Test', '1992-02-29', 'Male', '1', 'Single', 'testClient@email.com', '', 'Facebook Link', 'Manila', '123456789', 'Postpaid', 200, '', '246810', 'Postpaid', 0, '', '1', '1', '1', '1', '1', '1400', '', 'Map Link', 'Same as present', '246810', 'Mari', '', '', 'Corazon', '', '', '1', '1', 'Direct Hire', 'Taguig', '1', '1', '', '2022-01-04', '1', 'Cashier', 'Regular', 1, 15000, 2000, 0, 0, 'Bi-weekly', '15', '30', '', '', '', 'None', 0, '', 0, '', 0, 1, '1', 'Additional Fund For Daily Expenses', 'BPI', '1234567891', '', '', 17, 0, 5000, 0, 4000, 'Bi-weekly-3', '2022-01-24', 'John Doe', '1236456', '3', '1', '1', '1', 'San Pedro', '11', 'God Father', '1', '1', 'Contracts Contracts', 'Matthew Genesis', 'For Disbursement', '', '', 'Forwarded', '2022-01-25', 'Uploaded files by Jimmy Consulta 2022-01-25 07:07:52am // Updated information by Jimmy Consulta2022-01-25 07:09:39am // Uploaded files by Contracts Contracts 2022-01-25 07:11:01am // ', '2022-01-24 22:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `application_id` varchar(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `application_id`, `name`, `type`, `added_at`) VALUES
(422, '123484', 'Attachment0', 'jpg', '2021-12-27 23:40:39'),
(423, '123484', 'Attachment1', 'png', '2021-12-27 23:40:39'),
(424, '123484', 'Attachment2', 'png', '2021-12-27 23:40:39'),
(425, '123484', 'Attachment3', 'jpg', '2021-12-27 23:40:39'),
(426, '123484', 'Attachment4', 'jpg', '2021-12-27 23:40:39'),
(427, '123484', 'Attachment5', 'jpg', '2021-12-27 23:40:39'),
(428, '123485', 'Attachment0', 'png', '2021-12-28 21:59:46'),
(429, '123485', 'Attachment1', 'pdf', '2021-12-28 21:59:46'),
(430, '123485', 'Attachment2', 'jpg', '2021-12-28 21:59:46'),
(431, '123485', 'Attachment3', 'png', '2021-12-28 21:59:46'),
(432, '123485', 'Attachment4', 'png', '2021-12-28 21:59:46'),
(433, '123485', 'Attachment5', 'png', '2021-12-28 21:59:46'),
(434, '123486', 'Attachment0', 'png', '2022-01-14 21:45:17'),
(435, '123486', 'Attachment1', 'png', '2022-01-14 21:45:17'),
(436, '123486', 'Attachment2', 'jpg', '2022-01-14 21:45:17'),
(437, '123486', 'Attachment3', 'jpg', '2022-01-14 21:45:17'),
(438, '123486', 'Attachment4', 'png', '2022-01-14 21:45:17'),
(439, '123486', 'Attachment5', 'png', '2022-01-14 21:45:17'),
(440, '123487', 'Attachment0', 'pdf', '2022-01-24 22:57:00'),
(441, '123487', 'Attachment1', 'jpg', '2022-01-24 22:57:00'),
(442, '123487', 'Attachment2', 'jpg', '2022-01-24 22:57:00'),
(443, '123487', 'Attachment3', 'jpg', '2022-01-24 22:57:00'),
(444, '123487', 'Attachment4', 'jpg', '2022-01-24 22:57:00'),
(445, '123487', 'Attachment5', 'jpg', '2022-01-24 22:57:00'),
(446, '123489', 'Attachment0', 'jpg', '2022-01-26 21:54:27'),
(447, '123489', 'Attachment1', 'jpg', '2022-01-26 21:54:27'),
(448, '123489', 'Attachment2', 'jpg', '2022-01-26 21:54:27'),
(449, '123489', 'Attachment3', 'jpg', '2022-01-26 21:54:27'),
(450, '123489', 'Attachment4', 'jpg', '2022-01-26 21:54:27'),
(451, '123489', 'Attachment5', 'jpg', '2022-01-26 21:54:27'),
(452, '123490', 'Attachment0', 'jpg', '2022-01-26 22:39:52'),
(453, '123490', 'Attachment1', 'jpg', '2022-01-26 22:39:52'),
(454, '123490', 'Attachment2', 'pdf', '2022-01-26 22:39:52'),
(455, '123490', 'Attachment3', 'jpg', '2022-01-26 22:39:52'),
(456, '123490', 'Attachment4', 'jpg', '2022-01-26 22:39:52'),
(457, '123490', 'Attachment5', 'jpg', '2022-01-26 22:39:52'),
(458, '123491', 'Attachment0', 'jpg', '2022-01-27 19:07:41'),
(459, '123491', 'Attachment1', 'jpg', '2022-01-27 19:07:41'),
(460, '123491', 'Attachment2', 'jpg', '2022-01-27 19:07:41'),
(461, '123491', 'Attachment3', 'jpg', '2022-01-27 19:07:41'),
(462, '123491', 'Attachment4', 'jpg', '2022-01-27 19:07:41'),
(463, '123491', 'Attachment5', 'jpg', '2022-01-27 19:07:41'),
(464, '123492', 'Attachment0', 'jpg', '2022-01-27 19:10:39'),
(465, '123492', 'Attachment1', 'jpg', '2022-01-27 19:10:39'),
(466, '123492', 'Attachment2', 'jpg', '2022-01-27 19:10:39'),
(467, '123492', 'Attachment3', 'jpg', '2022-01-27 19:10:39'),
(468, '123492', 'Attachment4', 'jpg', '2022-01-27 19:10:39'),
(469, '123492', 'Attachment5', 'jpg', '2022-01-27 19:10:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_accounts`
--
ALTER TABLE `clients_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_action_history`
--
ALTER TABLE `clients_action_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_address`
--
ALTER TABLE `clients_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_application_history`
--
ALTER TABLE `clients_application_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_character_references`
--
ALTER TABLE `clients_character_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_job_description`
--
ALTER TABLE `clients_job_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_loan_and_bank_details`
--
ALTER TABLE `clients_loan_and_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_loan_history`
--
ALTER TABLE `clients_loan_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_personal_information`
--
ALTER TABLE `clients_personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_application`
--
ALTER TABLE `new_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `clients_accounts`
--
ALTER TABLE `clients_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `clients_action_history`
--
ALTER TABLE `clients_action_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `clients_address`
--
ALTER TABLE `clients_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clients_application_history`
--
ALTER TABLE `clients_application_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients_character_references`
--
ALTER TABLE `clients_character_references`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients_job_description`
--
ALTER TABLE `clients_job_description`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients_loan_and_bank_details`
--
ALTER TABLE `clients_loan_and_bank_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients_loan_history`
--
ALTER TABLE `clients_loan_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients_personal_information`
--
ALTER TABLE `clients_personal_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `new_application`
--
ALTER TABLE `new_application`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
