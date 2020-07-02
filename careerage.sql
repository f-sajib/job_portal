-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2019 at 06:57 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `careerage`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv_bank`
--

CREATE TABLE IF NOT EXISTS `cv_bank` (
  `id` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(20) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_mobile` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_trade_license` varchar(255) NOT NULL,
  `c_company` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `level` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `c_name`, `c_email`, `c_mobile`, `c_phone`, `c_address`, `c_trade_license`, `c_company`, `logo`, `level`, `password`, `code`, `active`) VALUES
(1, 'sadsad', 'selim@gmail.com', '121212', '1212', 'szfdsf', 'sfsf', '', '00.png', '2', 'e10adc3949ba59abbe56e057f20f883e', '4WwBur6LMF3G', '1'),
(2, 'jhsadgbjhsdaf', 'sajib@gmail.com', '987467489', '98464654', 'feese   ', 'efeesetgr5tuy', 'pdsiufoidsuhf', 'pic_1.jpg', '2', 'e10adc3949ba59abbe56e057f20f883e', 'KwjoWapvDRAq', '1'),
(3, '', '', '', '', '', '', '', '00.png', '2', 'd41d8cd98f00b204e9800998ecf8427e', '1UDzwVPkuoWs', '0'),
(4, 'dddddd', 'sajibs@gmail.com', 'frgdrbh', 'rfgvbdrf', 'drgvbd', 'gvbdfb', '', '00.png', '2', 'e10adc3949ba59abbe56e057f20f883e', '8YzNHMjFyRvO', '0'),
(5, 'agp', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'hello', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'tata', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'ok', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'tuna tuni', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'helicopter', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'kere', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'teriii', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'noun', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'blue', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_benifit_info`
--

CREATE TABLE IF NOT EXISTS `job_benifit_info` (
  `id` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `salary` int(25) NOT NULL,
  `benifit` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_benifit_info`
--

INSERT INTO `job_benifit_info` (`id`, `job_id`, `emp_id`, `salary`, `benifit`) VALUES
(7, '7', '2', 25000, '["retgregh"]'),
(9, '9', '2', 32000, '["dfbhf"]'),
(10, '10', '2', 28000, '["ytujtyj"]'),
(11, '11', '2', 20000, '["reh"]');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE IF NOT EXISTS `job_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `category`) VALUES
(1, 'Agriculture, Food and Natural Resources'),
(2, 'Architecture and Construction'),
(3, 'Arts, Audio/Video Technology and Communications'),
(4, 'Business Management and Administration'),
(5, 'Education and Training'),
(6, 'Finance'),
(7, 'Government and Public Administration'),
(8, 'Health Science'),
(9, 'Hospitality and Tourism'),
(10, 'Human Services'),
(11, 'Information Technology'),
(12, 'Law, Public Safety, Corrections and Security'),
(13, 'Manufacturing'),
(14, 'Marketing, Sales and Service'),
(15, 'Science, Technology, Engineering and Mathematics'),
(16, 'Transportation, Distribution and Logistics');

-- --------------------------------------------------------

--
-- Table structure for table `job_edu_info`
--

CREATE TABLE IF NOT EXISTS `job_edu_info` (
  `id` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_edu_info`
--

INSERT INTO `job_edu_info` (`id`, `job_id`, `emp_id`, `education`, `result`, `description`) VALUES
(7, '7', '2', 'asdad', 'asdas', 'dasdasd'),
(9, '9', '2', 'rthrtf', 'h', 'gd'),
(10, '10', '2', 'asdasd', 'asdasdasd', 'asdrfgh'),
(11, '11', '2', 'sadas', 'dasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `job_general_info`
--

CREATE TABLE IF NOT EXISTS `job_general_info` (
  `id` int(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `job_cat` varchar(255) NOT NULL,
  `job_sub_cat` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `vacancy` varchar(255) NOT NULL,
  `context` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_general_info`
--

INSERT INTO `job_general_info` (`id`, `emp_id`, `job_cat`, `job_sub_cat`, `deadline`, `status`, `title`, `division`, `location`, `vacancy`, `context`, `state`) VALUES
(7, '2', '11', '134', '2019-09-09', 'Full Time', 'sadasdas', 'Dhaka', 'asdasdsa', 'dsadsa', 'dsadsad', '2'),
(9, '2', '11', '129', '2019-09-08', 'Internship', 'thtgf', 'Rajshahi', 'htrhtr', 'h', 'rthtrh', '2'),
(10, '2', '14', '160', '2019-09-20', 'Part Time', 'dasd', 'Khulna', 'asdasd', 'asdas', 'dasd', '2'),
(11, '2', '8', '86', '2019-09-01', 'Full Time', 'dsfgvasfgaesg', 'Chittagong', 'efresgsdg', 'sgfvsd', 'sfgsdf', '2');

-- --------------------------------------------------------

--
-- Table structure for table `job_requirment_info`
--

CREATE TABLE IF NOT EXISTS `job_requirment_info` (
  `id` int(11) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `responsibility` text NOT NULL,
  `skill` text NOT NULL,
  `requirment` text NOT NULL,
  `experience` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_requirment_info`
--

INSERT INTO `job_requirment_info` (`id`, `job_id`, `emp_id`, `responsibility`, `skill`, `requirment`, `experience`) VALUES
(7, '7', '2', '["ertgert","ertert"]', '["retert"]', '["ertert"]', 'dfbg'),
(9, '9', '2', '["rtghrf"]', '["dfgdf"]', '["drtghdrtg"]', 'rghghghghghghgh'),
(10, '10', '2', '["yuikyuk"]', '["yikyuk"]', '["trduj"]', 'yjy'),
(11, '11', '2', '["sadsad"]', '["rtuyhrtjh"]', '["aersgergh"]', 'gersgh');

-- --------------------------------------------------------

--
-- Table structure for table `job_sub_category`
--

CREATE TABLE IF NOT EXISTS `job_sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_sub_category`
--

INSERT INTO `job_sub_category` (`id`, `cat_id`, `sub_category`) VALUES
(1, '1', 'Agricultural Equipment Operators'),
(2, '1', 'Agricultural Inspectors'),
(3, '1', 'Animal Scientists'),
(4, '1', 'Buyers and Purchasing Agents, Farm Products'),
(5, '1', 'Environmental Engineering Technicians'),
(6, '1', 'Farm and Home Management Advisors'),
(7, '1', 'Farm Equipment Mechanics and Service Technicians'),
(8, '1', 'Food Scientists and Technologists'),
(9, '1', 'Gas Plant Operators'),
(10, '2', 'Architects'),
(11, '2', 'Civil Engineering Technicians'),
(12, '2', 'Civil Engineers'),
(13, '2', 'Construction and Building Inspectors'),
(14, '2', 'Cost Estimators'),
(15, '2', 'Electricians'),
(16, '2', 'Landscape Architects'),
(17, '2', 'Interior Designers'),
(18, '2', 'Pile-Driver Operators'),
(19, '3', 'Art, Drama, and Music Teachers, Postsecondary'),
(20, '3', 'Audio and Video Equipment Technicians'),
(21, '3', 'Broadcast News Analysts'),
(22, '3', 'Choreographers'),
(23, '3', 'Copy Writers'),
(24, '3', 'Editors'),
(25, '3', 'Graphic Designers'),
(26, '3', 'Multimedia Artists and Animators'),
(27, '3', 'Writers and Authors'),
(28, '4', 'Accountants '),
(29, '4', 'Advertising and Promotions Managers'),
(30, '4', 'Auditors'),
(31, '4', 'Budget Analysts'),
(32, '4', 'Chief Executives'),
(33, '4', 'Chief Sustainability Officers'),
(34, '4', 'Computer Operators'),
(35, '4', 'Data Entry Keyers'),
(36, '4', 'Driver/Sales Workers'),
(37, '4', 'Financial Managers'),
(38, '4', 'General and Operations Managers'),
(39, '4', 'Legal Secretaries'),
(40, '4', 'Library Assistants, Clerical'),
(41, '4', 'Management Analysts'),
(42, '4', 'Marketing Managers'),
(43, '4', 'New Accounts Clerks'),
(44, '4', 'Order Fillers, Wholesale and Retail Sales'),
(45, '4', 'Public Relations and Fundraising Managers'),
(46, '4', 'Public Relations Specialists'),
(47, '4', 'Sales Managers'),
(48, '4', 'Telephone Operators'),
(49, '4', 'Word Processors and Typists'),
(50, '5', 'Adult Basic and Secondary Education and Literacy Teachers and Instructors'),
(51, '5', 'Postsecondary Teachers and Instructors'),
(52, '5', 'Career/Technical Education Teachers'),
(53, '5', 'Clinical, Counseling, and School Psychologists'),
(54, '5', 'Coaches and Scouts'),
(55, '5', 'Curators'),
(56, '5', 'Education Administrators'),
(57, '5', 'Fitness and Wellness Coordinators'),
(58, '5', 'Language and Literature Teachers'),
(59, '5', 'Teaching Assistants'),
(60, '5', 'Librarians'),
(61, '5', 'Nursing Instructors and Teachers'),
(62, '5', 'Tutors'),
(63, '6', 'Financial Analysts'),
(64, '6', 'Insurance Adjusters, Examiners, and Investigators'),
(65, '6', 'Financial Quantitative Analysts'),
(66, '6', 'Sales Agents'),
(67, '6', 'Investment Fund Managers'),
(68, '6', 'Loan Officers'),
(69, '6', 'Financial Advisors'),
(70, '7', 'Command and Control Center Officers'),
(71, '7', 'Assessors'),
(72, '7', 'City and Regional Planning Aides'),
(73, '7', 'Compliance Officers'),
(74, '7', 'Economists'),
(75, '7', 'Detectives and Criminal Investigators'),
(76, '7', 'Eligibility Interviewers, Government Programs'),
(77, '7', 'Financial Examiners'),
(78, '7', 'Infantry'),
(79, '7', 'Special Forces'),
(80, '7', 'Statistical Assistants'),
(81, '7', 'Urban and Regional Planners'),
(82, '7', 'Tax Examiners and Collectors, and Revenue Agents'),
(83, '8', 'Acupuncturists'),
(84, '8', 'Anesthesiologist'),
(85, '8', 'Athletic Trainers'),
(86, '8', 'Biologists'),
(87, '8', 'Cardiovascular Technologists and Technicians'),
(88, '8', 'Clinical Data Managers'),
(89, '8', 'Clinical Psychologists'),
(90, '8', 'Clinical Research Coordinators'),
(91, '8', 'Counseling Psychologists'),
(92, '8', 'Cytotechnologists'),
(93, '8', 'Dental Laboratory'),
(94, '8', 'Epidemiologists'),
(95, '8', 'Health Educators'),
(96, '8', 'Hospitalists'),
(97, '8', 'Medical Assistants'),
(98, '8', 'Medical Scientists'),
(99, '8', 'Neurologists'),
(100, '8', 'Occupational Therapists'),
(101, '8', 'Ophthalmologists'),
(102, '8', 'Pathologists'),
(103, '8', 'Pharmacists'),
(104, '8', 'Physical Medicine and Rehabilitation Physicians'),
(105, '8', 'Surgeons'),
(106, '9', 'Animal Trainers'),
(107, '9', 'Bakers'),
(108, '9', 'Bartenders'),
(109, '9', 'Chefs  Cooks'),
(110, '9', 'Concierges'),
(111, '9', 'Food Service Managers'),
(112, '9', 'Gaming Managers'),
(113, '9', 'Gaming Supervisors'),
(114, '9', 'Meeting, Convention, and Event Planners'),
(115, '9', 'Recreation Workers'),
(116, '9', 'Reservation and Transportation Ticket Agents and Travel Clerks'),
(117, '9', 'Travel Agents'),
(118, '9', 'Waiters and Waitresses'),
(119, '10', 'Childcare Workers'),
(120, '10', 'Credit Counselors'),
(121, '10', 'Fitness Trainers and Aerobics Instructors'),
(122, '10', 'Healthcare Social Workers'),
(123, '10', 'Residential Advisors'),
(124, '10', 'Social and Community Service Managers'),
(125, '11', 'Business Intelligence Analysts'),
(126, '11', 'Computer and Information Research Scientists'),
(127, '11', 'Computer Network Architects'),
(128, '11', 'Computer Network Support Specialists'),
(129, '11', 'Computer Programmers'),
(130, '11', 'Computer Systems Analysts'),
(131, '11', 'Data Warehousing Specialists'),
(132, '11', 'Database Administrators'),
(133, '11', 'Network and Computer Systems Administrators'),
(134, '11', 'Software Developers'),
(135, '11', 'Software Quality Assurance Engineers and Testers'),
(136, '11', 'Telecommunications Engineering Specialists'),
(137, '11', 'Web Administrators'),
(138, '12', 'Administrative Law Judges, Adjudicators, and Hearing Officers'),
(139, '12', 'Business Continuity Planners'),
(140, '12', 'Correctional Officers and Jailers'),
(141, '12', 'Criminal Investigators and Special Agents'),
(142, '12', 'Fire Inspectors and Investigators'),
(143, '12', 'Immigration and Customs Inspectors'),
(144, '12', 'Intelligence Analysts'),
(145, '12', 'Police Officers'),
(146, '12', 'Private Detectives and Investigators'),
(147, '12', 'Security '),
(148, '13', 'who want to break into recruiting, or recruiters who want to further their career.\nAdhesive Bonding Machine Operators and Tenders'),
(149, '13', 'Boilermakers'),
(150, '13', 'Chemical Equipment Operators and Tenders'),
(151, '13', 'Computer-Controlled Machine Tool Operators'),
(152, '13', 'Electrical and Electronic Equipment Assemblers'),
(153, '13', 'Fabric and Apparel Patternmakers'),
(154, '13', 'Glass Blowers, Molders, Benders, and Finishers'),
(155, '13', 'Industrial Engineering Technicians'),
(156, '14', 'Appraisers, Real Estate\n'),
(157, '14', 'Cashiers'),
(158, '14', 'Customer Service Representatives'),
(159, '14', 'Demonstrators and Product Promoters'),
(160, '14', 'Fashion Designers'),
(161, '14', 'Marking Clerks'),
(162, '14', 'Office Clerks'),
(163, '14', 'Real Estate Sales Agents'),
(164, '14', 'Retail Salespersons'),
(165, '14', 'Sales Engineers'),
(166, '14', 'Telemarketers'),
(167, '14', 'Wholesale and Retail Buyers, Except Farm Products'),
(168, '15', 'Automotive Engineering '),
(169, '15', 'Biochemists and Biophysicists'),
(170, '15', 'Computer Hardware Engineers'),
(171, '15', 'Electrical and Electronic Engineering Technicians'),
(172, '15', 'Energy Engineers'),
(173, '15', 'Environmental Economists'),
(174, '15', 'Food Science Technicians\n'),
(175, '15', 'Geneticists'),
(176, '15', 'Health and Safety Engineers'),
(177, '15', 'Industrial Engineers'),
(178, '15', 'Manufacturing Engineers'),
(179, '15', 'Marine Engineers'),
(180, '15', 'Mechanical Engineers'),
(181, '15', 'Physicists'),
(182, '15', 'Political Scientists'),
(183, '15', 'Product Safety Engineers'),
(184, '15', 'Quality Control Systems Managers'),
(185, '15', 'Robotics Engineers'),
(186, '15', 'Statisticians'),
(187, '16', 'Aerospace Engineering and Operations Technicians'),
(188, '16', 'Aircraft Mechanics and Service Technicians'),
(189, '16', 'Airfield Operations Specialists'),
(190, '16', 'Ambulance Drivers and Attendants, Except Emergency Medical Technicians'),
(191, '16', 'Automotive Master Mechanics'),
(192, '16', 'Automotive Service Technicians and Mechanics'),
(193, '16', 'Bus and Truck Mechanics and Diesel Engine Specialists'),
(194, '16', 'Commercial Pilots'),
(195, '16', 'Electrical and Electronics Installers and Repairers, Transportation Equipment'),
(196, '16', 'Logistics Analysts'),
(197, '16', 'Motorboat Operators'),
(198, '16', 'Ship Engineers'),
(199, '16', 'Storage and Distribution Managers'),
(200, '16', 'Supply Chain Managers'),
(201, '16', 'Transportation Managers');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reading` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `emp_id`, `message`, `reading`, `date`) VALUES
(16, '22', '2', 'A new Notification from company', '0', 'August 31, 2019, 4:25 pm'),
(17, '1', '2', 'A new Notification from company', '1', 'September 2, 2019, 12:33 pm'),
(18, '2', '2', 'A new Notification from company', '0', 'September 2, 2019, 12:36 pm'),
(19, '21', '2', 'A new Notification from company', '0', 'September 7, 2019, 12:28 pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(25) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(25) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(300) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `pre_address` varchar(255) NOT NULL,
  `per_address` varchar(255) NOT NULL,
  `objective` text NOT NULL,
  `skill` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cv` varchar(255) CHARACTER SET utf8 NOT NULL,
  `level` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `code` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `f_name`, `l_name`, `email`, `mobile`, `father`, `mother`, `date_of_birth`, `gender`, `pre_address`, `per_address`, `objective`, `skill`, `interest`, `photo`, `cv`, `level`, `password`, `code`, `active`) VALUES
(1, 'S. M. Nasir ', 'Hossain', 'nasir@fnabd.biz', 1521259327, ' Selim Mia  ', ' Mrs. Selim mia  ', '2019-07-26', 'Male', '  223, japani bazar, Kudduspur  ', '  Vill: Japanpur, Dist: Selim para  ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam faucibus placerat ipsum a suscipit. Praesent tempus mi vel pellentesque commodo. Ut tortor elit, pharetra sed auctor at, tristique sit amet dui. In sem nunc, consectetur vitae dui vel, vulputate mattis ligula. Pellentesque scelerisque interdum condimentum. Nam eget aliquet purus. Praesent tempor elit sit amet molestie elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras diam leo, consectetur ac nibh sed, rhoncus ullamcorper odio. Maecenas libero metus, efficitur eu pretium sed, pulvinar quis sem.', 'php,laravel', '', '16508749_1246220032122598_4432236860127947442_n.jpg', '', '1', 'e10adc3949ba59abbe56e057f20f883e', 'g8YeWbjfTxoK', '1'),
(2, 'ergreg', 'rgvrdsgv', 'hira@gmail.com', 0, '', '', '', '', 'ewfew', 'fewfew', 'erfgvsdvg uuuuhsdv oefvhds iusgfvbuisdovjhed uidvhbbbbbbbbbbefg ewufhoev fvhasuiogfv', 'view.js,node.js', '', '00.jpg', '', '1', '7a491152d7854d5f3c7b0bc5bbc5dcef', 'cSt5TRQ1d7GO', '0'),
(21, 'afcas', 'fvsadvds', 'hira2@gmail.com', 0, '', '', '', '', 'sdbgvdfsb', 'sadbvasdf', 'erfgvsdvg uuuuhsdv oefvhds iusgfvbuisdovjhed uidvhbbbbbbbbbbefg ewufhoev fvhasuiogfv', 'php', '', '00.jpg', '', '1', 'e10adc3949ba59abbe56e057f20f883e', 'oaVGhRlsPSXr', '0'),
(22, 'zdfbn fgn', 'dfb', 'hira3@gmail.com', 0, '', '', '', '', 'ads rfbd n', 'adb df bn', 'erfgvsdvg uuuuhsdv oefvhds iusgfvbuisdovjhed uidvhbbbbbbbbbbefg ewufhoev fvhasuiogfv', '', '', '00.jpg', '', '1', 'e10adc3949ba59abbe56e057f20f883e', 's2JdO71PWZy3', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_edu`
--

CREATE TABLE IF NOT EXISTS `user_edu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `board` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_edu`
--

INSERT INTO `user_edu` (`id`, `user_id`, `degree`, `year`, `board`, `institute`, `result`) VALUES
(1, 1, 'Bsc Computer Science', '2018', 'Dhaka', 'American International University Of Bangladesh (AIUB)', '3.32'),
(2, 1, 'HSC', '2013', 'Dhaka', 'Donia College', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `user_emphistory`
--

CREATE TABLE IF NOT EXISTS `user_emphistory` (
  `id` int(20) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `responsibilites` varchar(255) NOT NULL,
  `d_from` varchar(255) NOT NULL,
  `d_to` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_emphistory`
--

INSERT INTO `user_emphistory` (`id`, `user_id`, `company`, `designation`, `department`, `responsibilites`, `d_from`, `d_to`) VALUES
(1, '1', 'Software Company', 'Soft. Developer', 'Development', 'SO much to do', '2019-01-15', '2019-07-03'),
(2, '1', 'Abribiation', 'Mobile app Developer', 'Development', 'Doing hard work every day', '2019-08-07', '2019-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `user_training`
--

CREATE TABLE IF NOT EXISTS `user_training` (
  `id` int(20) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `topics` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_training`
--

INSERT INTO `user_training` (`id`, `user_id`, `title`, `institution`, `location`, `topics`, `duration`, `year`) VALUES
(1, '1', 'X-ray Vision', 'Xaviars School', 'USA', 'whatever they teach', 'Only 7 days', '2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv_bank`
--
ALTER TABLE `cv_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_benifit_info`
--
ALTER TABLE `job_benifit_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_edu_info`
--
ALTER TABLE `job_edu_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_general_info`
--
ALTER TABLE `job_general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_requirment_info`
--
ALTER TABLE `job_requirment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_sub_category`
--
ALTER TABLE `job_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_edu`
--
ALTER TABLE `user_edu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_emphistory`
--
ALTER TABLE `user_emphistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_training`
--
ALTER TABLE `user_training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv_bank`
--
ALTER TABLE `cv_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `job_benifit_info`
--
ALTER TABLE `job_benifit_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `job_edu_info`
--
ALTER TABLE `job_edu_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job_general_info`
--
ALTER TABLE `job_general_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job_requirment_info`
--
ALTER TABLE `job_requirment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job_sub_category`
--
ALTER TABLE `job_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_edu`
--
ALTER TABLE `user_edu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_emphistory`
--
ALTER TABLE `user_emphistory`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_training`
--
ALTER TABLE `user_training`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
