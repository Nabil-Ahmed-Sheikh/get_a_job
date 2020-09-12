-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 11:33 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `get_a_job`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`, `email`, `phoneNumber`) VALUES
(1, 'nokia@42', 'Nabil Ahmed Sheikh', 'nabil@nsu.com', '01752850883'),
(2, 'jalal@123', 'Shah Jalal', 'shah@jnu.edu', '01611944565');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `qid` int(11) DEFAULT NULL,
  `scId` int(11) DEFAULT NULL,
  `ans` text DEFAULT NULL,
  `corrAns` varchar(1) DEFAULT NULL,
  `submitDate` date DEFAULT NULL,
  `score` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `qid`, `scId`, `ans`, `corrAns`, `submitDate`, `score`) VALUES
(24, 1, 1, 'a', 'a', '2020-09-05', 1),
(25, 2, 1, '', 'a', '2020-09-05', 0),
(26, 1, 2, 'a', 'a', '2020-09-05', 1),
(27, 2, 2, 'a', 'a', '2020-09-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applytable`
--

CREATE TABLE `applytable` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `applyDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applytable`
--

INSERT INTO `applytable` (`id`, `uid`, `aid`, `applyDate`) VALUES
(2, 3, 2, '2020-07-02'),
(4, 2, 2, '2020-07-04'),
(4, 2, 3, '2020-07-08'),
(4, 2, 4, '2020-09-05'),
(8, 3, 2, '2020-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `circular`
--

CREATE TABLE `circular` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `bannerText` varchar(255) DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `experienceRequired` float DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `postDate` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `salaryMax` float DEFAULT NULL,
  `salaryMin` float DEFAULT NULL,
  `jobType` varchar(255) DEFAULT NULL,
  `jobLevel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `circular`
--

INSERT INTO `circular` (`id`, `uid`, `position`, `bannerText`, `vacancy`, `companyName`, `photo`, `description`, `experienceRequired`, `location`, `postDate`, `deadline`, `salaryMax`, `salaryMin`, `jobType`, `jobLevel`) VALUES
(2, 3, 'Software Engineer', 'We need a SWE', 2, 'Apple Inc.', '5f587761661968.94686070.jpg', '<p><strong>Responsibilities:</strong></p>\r\n\r\n<ul>\r\n	<li>Code</li>\r\n	<li>Design Software Products</li>\r\n</ul>\r\n\r\n<p><strong>Requirements:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Bachelor in Computer Science</strong></li>\r\n</ul>\r\n', 0.5, 'California', '2020-09-09', '2020-06-30', 1500000, 300000, 'Apple Inc.', 'Entry Level'),
(4, 2, 'Assistant Manager', 'Our Bank needs a new Ast. Manager', 1, 'Bangladesh Bank', '5f54d7a8dd14a0.00626544.png', '<p><strong>Job Responsibilities</strong></p>\r\n\r\n<ul>\r\n	<li>Preparing Cash Voucher, Bank Voucher, Journal Voucher.</li>\r\n	<li>Maintaining Cash Book, Bank Book, Party Ledger.</li>\r\n	<li>Preparing Bank Re-Consultation Statement.</li>\r\n	<li>Debtor &amp; Creditor Re-Consultation Statement. Preparing Monthly Trial Balance.</li>\r\n	<li>Profit &amp; Loss Account Statement.</li>\r\n</ul>\r\n\r\n<p><strong>Employment Status</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Full-time</p>\r\n\r\n<p><strong>Educational Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>B.Com/ M.com/BBA/ MBA/ Masters in accounting</li>\r\n</ul>\r\n\r\n<p><strong>Experience Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>Na</li>\r\n	<li>The applicants should have experience in the following area(s):<br />\r\n	Accounts</li>\r\n	<li>Freshers are also encouraged to apply.</li>\r\n</ul>\r\n\r\n<p><strong>Additional Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>Age 20 to 50 years</li>\r\n	<li>Both males and females are allowed to apply</li>\r\n	<li>EXPERIENCE WILL CONCEDER FOR EDUCATION</li>\r\n</ul>\r\n\r\n<p><strong>Job Location</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dhaka, Cumilla (Cumilla Sadar Dakshin)</p>\r\n\r\n<p><strong>Compensation &amp; Other Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Please mansion your expected salary</li>\r\n	<li>Company offers good compensation package.</li>\r\n</ul>\r\n', 3, 'Dhaka', '2020-09-06', '2020-07-11', 40000, 30000, 'Bangladesh Bank', 'Intermediate Level'),
(8, 3, 'Data Analyst', 'Data Analyst Needed', 2, 'Apple Inc.', '5f5877f3dfa592.68843123.jpg', ' ', 1, 'California', '2020-09-09', '2020-08-12', 1500000, 300000, 'Apple Inc.', 'Intermediate Level'),
(9, 3, 'Software Engineer', 'We need a PHP Software Engineer', 1, 'Apple Inc.', '5f588958e649f7.65409271.jpg', '<p><strong>Job Responsibilities</strong></p>\r\n\r\n<ul>\r\n	<li>Develop, record and maintain cutting edge web-based PHP applications on portal plus premium service platforms</li>\r\n	<li>Build innovative, state-of-the-art applications and collaborate with the User Experience (UX) tea</li>\r\n	<li>Developing Custom Plugins &amp; Themes for WordPress &amp; OsCommerce.</li>\r\n	<li>Write &quot;clean&quot;, well-designed code</li>\r\n	<li>Troubleshoot, test, and maintain the core product software and databases to ensure strong optimization and functionality.</li>\r\n	<li>Contribute in all phases of the development lifecycle</li>\r\n	<li>Develop and deploy new features to facilitate related procedures and tools if necessary</li>\r\n	<li>Customize existing or open source applications.</li>\r\n	<li>Coordinate with co-developers and keeps project manager well informed of the status of development effort and serves as liaison between development staff and project manager</li>\r\n	<li>Experience with Web Services (REST, SOAP, etc.) is needed to be successful in this position</li>\r\n</ul>\r\n\r\n<p><strong>Employment Status</strong></p>\r\n\r\n<ul>\r\n	<li>Full-time</li>\r\n</ul>\r\n\r\n<p><strong>Workplace</strong></p>\r\n\r\n<ul>\r\n	<li>Work at office</li>\r\n</ul>\r\n\r\n<p><strong>Educational Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>Bachelor of Science (BSc) in Computer Science &amp; Engineering</li>\r\n</ul>\r\n\r\n<p><strong>Experience Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>At most 3 year(s)</li>\r\n	<li>The applicants should have experience in the following area(s):<br />\r\n	CakePHP, CSS, HTML, JavaScript, jQuery, MySQL</li>\r\n	<li>Freshers are also encouraged to apply.</li>\r\n</ul>\r\n\r\n<p><strong>Additional Requirements</strong></p>\r\n\r\n<ul>\r\n	<li>Age 22 to 30 years</li>\r\n	<li>Both males and females are allowed to apply</li>\r\n	<li>Good communication skills.</li>\r\n	<li>Back-end development experience with MySQL and PHP.</li>\r\n	<li>Should have good command over Laravel.</li>\r\n	<li>Good knowledge on how to implement logic.</li>\r\n	<li>Must be proficient in OOPS Concepts &amp; MySQL</li>\r\n	<li>Good understanding of front-end technologies, including HTML5, CSS3, JavaScript, jQuery.</li>\r\n	<li>Ability to write W3C standards compliant, cross browser compatible (IE7+, Firefox, Safari, Chrome) front-end markup in XHTML/CSS/AJAX (Jquery)</li>\r\n	<li>Experience programming Web APIs (Web services)</li>\r\n	<li>Knowledge of Push Notification server to Applications</li>\r\n	<li>Knowledge of iOS app development is a big plus</li>\r\n</ul>\r\n\r\n<p><strong>Compensation &amp; Other Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>Weekly 2 (TWO) holidays: Friday &amp; Saturday</li>\r\n	<li>Lunch &amp; snacks provided by office</li>\r\n	<li>Yearly office tour</li>\r\n	<li>Festival bonus</li>\r\n	<li>World class working environment</li>\r\n</ul>\r\n', 0.5, 'Dhaka', '2020-09-09', '2020-09-08', 120000, 30000, 'Full-time', 'Intermediate Level');

-- --------------------------------------------------------

--
-- Table structure for table `company_admin`
--

CREATE TABLE `company_admin` (
  `id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `industryType` int(11) DEFAULT NULL,
  `businessDescription` text DEFAULT NULL,
  `websiteURL` varchar(255) DEFAULT NULL,
  `contactPersonName` varchar(255) DEFAULT NULL,
  `contactPersonDesignation` varchar(255) DEFAULT NULL,
  `contactPersonEmail` varchar(255) DEFAULT NULL,
  `contactPersonNumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_admin`
--

INSERT INTO `company_admin` (`id`, `password`, `companyName`, `industryType`, `businessDescription`, `websiteURL`, `contactPersonName`, `contactPersonDesignation`, `contactPersonEmail`, `contactPersonNumber`) VALUES
(1, 'nokia@42', 'Facebook', 2, 'We connect people across the globe', 'facebook.com', 'Mark Zuckerberg', 'CEO', 'mark@facebbok.com', '01711900101'),
(2, 'abul@123', 'Bangladesh Bank', 1, 'We work for the Govt.', 'bangladeshbank.com', 'Abul Mals', 'Minister', 'abul@gmail.com', '01711111512'),
(3, 'tim@12', 'Apple ', 2, 'Make believe.', 'apple.com', 'Tim Cooker', 'CEO', 'tim@apple.com', '0151111111'),
(4, 'mufa@123', 'SoftRithm IT', 2, 'We build dreams', 'maple.com', 'Mufachir', 'CEO', 'mufachir@gmail.com', '01711111512'),
(5, 'soft123', 'SoftRithm IT', 1, 'We build dreams', 'apple.com', 'Mufachir', 'CEO', 'mufachir@sr.com', '0151111115');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `degreeLevel` varchar(255) DEFAULT NULL,
  `degreeTitle` varchar(255) DEFAULT NULL,
  `cgpa` float DEFAULT NULL,
  `scale` float DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `passYear` date DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `uid`, `degreeLevel`, `degreeTitle`, `cgpa`, `scale`, `division`, `passYear`, `institution`) VALUES
(1, 2, NULL, 'Bs in CSE', 3.8, 4, 'First Divison', '2020-06-01', 'North South Univeristy'),
(3, 3, NULL, 'Bs in CSE', 2.88, 4, 'Second Division', '2019-12-30', 'North South Univeristy'),
(4, 5, NULL, 'Bs in CSE', 3.33, 4, 'First Divison', '2020-08-08', 'North South Univeristy'),
(5, 5, NULL, 'HSC', 3.8, 4, 'First Divison', '2020-08-07', 'Mirpur Science College'),
(6, 2, NULL, 'HSC', 5, 5, 'First Divison', '2020-08-01', 'Mirpur Science College');

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `responsibility` text DEFAULT NULL,
  `workedFrom` date DEFAULT NULL,
  `workedTill` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`id`, `uid`, `companyName`, `location`, `department`, `designation`, `responsibility`, `workedFrom`, `workedTill`) VALUES
(1, 2, 'Pathao', 'Dhaka', 'Logistics', 'Intern', '<p><strong>Responibilities:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Make documents</strong></li>\r\n	<li><strong>Write Code</strong></li>\r\n</ul>\r\n', '2019-10-01', '2019-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `uid`, `name`, `description`) VALUES
(1, 2, 'Guard Exam', 'No description available '),
(2, 3, 'Software Engineering Exam 2020Sep', 'Exam for php swe in dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `lastDate` date DEFAULT NULL,
  `stat` varchar(255) DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `uid`, `sid`, `eid`, `aid`, `cid`, `lastDate`, `stat`, `startTime`, `endTime`) VALUES
(1, 2, 1, 1, 2, 4, '2020-09-05', 'submitted', '00:00:00', '23:59:00'),
(2, 2, 1, 1, 4, 4, '2020-09-06', 'shortlisted', '00:05:00', '18:05:00'),
(3, 3, 3, 2, 2, 2, '2020-09-09', 'created', '14:22:00', '19:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_set`
--

CREATE TABLE `exam_set` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_set`
--

INSERT INTO `exam_set` (`id`, `uid`, `eid`, `name`) VALUES
(1, 2, 1, 'A'),
(2, 2, 1, 'B'),
(3, 3, 2, 'Dhaka-1');

-- --------------------------------------------------------

--
-- Table structure for table `industry_type`
--

CREATE TABLE `industry_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry_type`
--

INSERT INTO `industry_type` (`id`, `name`, `description`) VALUES
(1, 'Bank & Finance', 'Organizations which steals money'),
(2, 'IT', 'Organizations which works for information and Technology'),
(3, 'Marketing', 'Market Products'),
(4, 'Police', 'Woop! Woop! This is the sound of police!');

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE `personalinfo` (
  `id` int(11) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `motherName` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `passportNumber` varchar(255) DEFAULT NULL,
  `passportissueDate` date DEFAULT NULL,
  `phoneNumber1` varchar(255) DEFAULT NULL,
  `phoneNumber2` varchar(255) DEFAULT NULL,
  `maritalStatus` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alternativeEmail` varchar(255) DEFAULT NULL,
  `currentAddress` varchar(255) DEFAULT NULL,
  `permanentAddress` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`id`, `firstName`, `lastName`, `nationality`, `fatherName`, `motherName`, `dateOfBirth`, `nid`, `passportNumber`, `passportissueDate`, `phoneNumber1`, `phoneNumber2`, `maritalStatus`, `email`, `alternativeEmail`, `currentAddress`, `permanentAddress`, `image`) VALUES
(2, 'Jumar', 'Alam', 'N/A', 'A B M Badol Alam', 'Taslima Begum', '1997-02-22', 'N/A', 'N/A', '0000-00-00', '01555944446', 'N/A', 'Unmarried', 'nabil.ahmednsu@gmail.com', 'jumar@lover.com', 'West Jatra Bari', 'West Jatra Bari', '5ef8f3adc16d77.99845594.jpg'),
(3, 'Sadia', 'Nishat', 'N/A', 'M D  Shahab Uddin', 'Nazma Akter', '1992-10-21', 'N/A', 'N/A', '0000-00-00', '01666944446', 'N/A', 'Unmarried', 'sadia@nsu.com', 'N/A', 'Rajani Choudhury Road, Gandaria', 'Rarikhal', '5eff7e6e4075a2.95856397.jpg'),
(5, 'Nabil', 'Ahmed', 'N/A', 'M D  Shahab Uddin', 'Nazma Akter', '2020-08-14', 'N/A', 'BC101', '0000-00-00', '01555944444', 'N/A', 'Unmarried', 'nabil@n.com', 'N/A', 'West Jatra Bari', 'Rarikhal', '5f2e9428ef7c88.82817336.jpg'),
(7, 'Sadia', 'Ahmed', 'N/A', 'M D  Shahab Uddin', 'Nazma Akter', '2020-08-12', 'N/A', 'BC101', '0000-00-00', '01555944446', 'N/A', 'Unmarried', 'samiahmed196@gmail.com', 'N/A', 'Rajani Choudhury Road, Gandaria', 'West Jatra Bari', '5f2ef61dda6097.17627874.jpg'),
(9, 'Sami', 'Ahmed', 'N/A', 'M D  Shahab Uddin', 'Nazma Akter', '1999-06-19', 'N/A', 'N/A', '0000-00-00', '01555944445', 'N/A', 'Unmarried', 'samiahmed196@gmail.com', 'N/A', 'Rajani Choudhury Road, Gandaria', 'Rarikhal', '5f53c474f11235.44742279.jpg'),
(4, 'Nabil', 'Ahmed', 'N/A', 'M D  Shahab Uddin', 'Nazma Akter', '1995-02-11', 'N/A', 'N/A', '0000-00-00', '01752850883', 'N/A', 'Unmarried', 'nabil.ahmed@northsouth.edu', 'N/A', 'Rajani Choudhury Road, Gandaria', 'Rarikhal', '5f53c890403ee1.05414306.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` varchar(1) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `sid`, `question`, `answer`, `a`, `b`, `c`, `d`) VALUES
(1, 1, 'Capital of Bangladesh?', 'a', 'Dhaka', 'Oslo', 'Nairobi', ' '),
(2, 1, 'Name of the largest country?', 'a', 'Russia', 'Canada', 'Australia', 'USA'),
(7, 3, '<p>Top Frameworks/Environment now?&nbsp;</p><ul><li>i) Node - Express</li><li>ii) Laravel</li><li>iii) Django</li><li>iv) Grails</li></ul>', 'a', 'i - ii', 'ii - iii', 'iii', 'All above');

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`id`, `username`, `password`, `email`, `phoneNumber`) VALUES
(1, 'tanjeeb_alam', 'tanjeeb@123', 'tanjeeb@nsu.com', '01911144545'),
(2, 'A B M Jumar Alam', 'jumar@123', 'jumar@nsu.com', '01511111223'),
(3, 'Sadia Nishat', 'sadia@12', 'sadia@nsu.com', '01687132660'),
(4, 'Nabil Ahmed', 'nabil@12', 'nabil.ahmednsu@gmail.com', '01752850883'),
(5, 'Nabil Ahmed', '123', 'nabil@n.com', '01511111223'),
(6, 'Shah Jalal', 'jalal@123', 'shah@jnu.edu', '01611944565'),
(7, 'Bat Man', '123123', 'bat@man.dc', 'bat-man-123'),
(8, 'Jumar Alams', '123123', 'a@b.com', '12312312312'),
(9, 'Sami Ahmed', 'nokia@12', 'samiahmed196@gmail.com', '01711944595'),
(10, 'Zehad Hassan', '123', 'zehad.hassan@northsouth.edu', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `skillName` varchar(50) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `uid`, `skillName`, `percentage`) VALUES
(1, 2, 'Python', 80),
(2, 3, 'Python', 80),
(3, 2, 'Java', 70),
(4, 7, 'Python', 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scId` (`scId`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `applytable`
--
ALTER TABLE `applytable`
  ADD PRIMARY KEY (`id`,`uid`,`aid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `circular`
--
ALTER TABLE `circular`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `company_admin`
--
ALTER TABLE `company_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industryType` (`industryType`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_schedule_ibfk_1` (`uid`),
  ADD KEY `exam_schedule_ibfk_2` (`aid`),
  ADD KEY `exam_schedule_ibfk_3` (`sid`),
  ADD KEY `exam_schedule_ibfk_4` (`eid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `exam_set`
--
ALTER TABLE `exam_set`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_set_ibfk_1` (`eid`),
  ADD KEY `exam_set_ibfk_2` (`uid`);

--
-- Indexes for table `industry_type`
--
ALTER TABLE `industry_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinfo`
--
ALTER TABLE `personalinfo`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_ibfk_1` (`sid`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `circular`
--
ALTER TABLE `circular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_admin`
--
ALTER TABLE `company_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam_set`
--
ALTER TABLE `exam_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `industry_type`
--
ALTER TABLE `industry_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seeker`
--
ALTER TABLE `seeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`scId`) REFERENCES `exam_schedule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `question` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `applytable`
--
ALTER TABLE `applytable`
  ADD CONSTRAINT `applytable_ibfk_1` FOREIGN KEY (`id`) REFERENCES `circular` (`id`),
  ADD CONSTRAINT `applytable_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `company_admin` (`id`),
  ADD CONSTRAINT `applytable_ibfk_3` FOREIGN KEY (`aid`) REFERENCES `seeker` (`id`);

--
-- Constraints for table `circular`
--
ALTER TABLE `circular`
  ADD CONSTRAINT `circular_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `company_admin` (`id`);

--
-- Constraints for table `company_admin`
--
ALTER TABLE `company_admin`
  ADD CONSTRAINT `company_admin_ibfk_1` FOREIGN KEY (`industryType`) REFERENCES `industry_type` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `personalinfo` (`id`);

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `employment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `personalinfo` (`id`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `company_admin` (`id`);

--
-- Constraints for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD CONSTRAINT `exam_schedule_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `company_admin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_schedule_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `seeker` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_schedule_ibfk_3` FOREIGN KEY (`sid`) REFERENCES `exam_set` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_schedule_ibfk_4` FOREIGN KEY (`eid`) REFERENCES `exam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_schedule_ibfk_5` FOREIGN KEY (`cid`) REFERENCES `circular` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_set`
--
ALTER TABLE `exam_set`
  ADD CONSTRAINT `exam_set_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_set_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `company_admin` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `personalinfo`
--
ALTER TABLE `personalinfo`
  ADD CONSTRAINT `personalinfo_ibfk_1` FOREIGN KEY (`id`) REFERENCES `seeker` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `exam_set` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `personalinfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
