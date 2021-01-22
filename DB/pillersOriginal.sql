-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 11:35 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pillers`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertismentpayment`
--

CREATE TABLE `advertismentpayment` (
  `user_id` int(11) NOT NULL,
  `time_paid` varchar(256) NOT NULL,
  `expired_date` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `ticket_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertismentpayment`
--



-- --------------------------------------------------------

--
-- Table structure for table `awardapply`
--

CREATE TABLE `awardapply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `apply_date` varchar(256) NOT NULL,
  `award` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awardapply`
--


-- --------------------------------------------------------

--
-- Table structure for table `awardvote`
--

CREATE TABLE `awardvote` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `voter_email` varchar(256) NOT NULL,
  `voted_id` int(11) NOT NULL,
  `voted_email` varchar(256) NOT NULL,
  `vote_category` varchar(256) NOT NULL,
  `vote_date` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awardvote`
--



-- --------------------------------------------------------

--
-- Table structure for table `bandetails`
--

CREATE TABLE `bandetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ban_details` varchar(256) NOT NULL,
  `ban_date` varchar(256) NOT NULL,
  `ban_active` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chatentertainment`
--

CREATE TABLE `chatentertainment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `message` longtext NOT NULL,
  `time_posted` varchar(256) NOT NULL,
  `profile_pic` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatentertainment`
--



-- --------------------------------------------------------

--
-- Table structure for table `compititionpayment`
--

CREATE TABLE `compititionpayment` (
  `user_id` int(11) NOT NULL,
  `time_paid` varchar(256) NOT NULL,
  `expired_date` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `ticket_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compititionpayment`
--



-- --------------------------------------------------------

--
-- Table structure for table `connect_friend`
--

CREATE TABLE `connect_friend` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connect_friend`
--


-- --------------------------------------------------------

--
-- Table structure for table `customercare`
--

CREATE TABLE `customercare` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `issue` varchar(256) NOT NULL,
  `message` varchar(256) NOT NULL,
  `time_post` varchar(256) NOT NULL,
  `next_post` varchar(256) NOT NULL,
  `treated` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customercare`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailyapproveconnection`
--

CREATE TABLE `dailyapproveconnection` (
  `id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  `counter` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyapproveconnection`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailyawardapply`
--

CREATE TABLE `dailyawardapply` (
  `id` int(11) NOT NULL,
  `datetime` int(15) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyawardapply`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailyawardvote`
--

CREATE TABLE `dailyawardvote` (
  `id` int(11) NOT NULL,
  `datetime` int(15) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyawardvote`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailydisliketable`
--

CREATE TABLE `dailydisliketable` (
  `id` int(11) NOT NULL,
  `datetime` int(15) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailydisliketable`
--

-----------------------------------

--
-- Table structure for table `dailyliketable`
--

CREATE TABLE `dailyliketable` (
  `id` int(11) NOT NULL,
  `datetime` int(15) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyliketable`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailymessagesent`
--

CREATE TABLE `dailymessagesent` (
  `id` int(11) NOT NULL,
  `datetime` int(15) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailymessagesent`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailypageview`
--

CREATE TABLE `dailypageview` (
  `id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailypageview`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailypostvote`
--

CREATE TABLE `dailypostvote` (
  `id` int(11) NOT NULL,
  `datetime` int(15) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailypostvote`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailypvctransac`
--

CREATE TABLE `dailypvctransac` (
  `id` int(11) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailypvctransac`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailyrecord`
--

CREATE TABLE `dailyrecord` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyrecord`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailyregetconnection`
--

CREATE TABLE `dailyregetconnection` (
  `id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  `counter` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyregetconnection`
--



-- --------------------------------------------------------

--
-- Table structure for table `dailyregistration`
--

CREATE TABLE `dailyregistration` (
  `id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyregistration`
--


-- --------------------------------------------------------

--
-- Table structure for table `datalogin`
--

CREATE TABLE `datalogin` (
  `id` int(11) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datalogin`
--


-- --------------------------------------------------------

--
-- Table structure for table `kyctable`
--

CREATE TABLE `kyctable` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `state_of_origin` varchar(255) NOT NULL,
  `local_government` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `date_of_birth` varchar(256) NOT NULL,
  `marital_status` varchar(256) NOT NULL,
  `bank_name` varchar(256) NOT NULL,
  `bank_account_number` int(10) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `alternative_phone_number` int(11) NOT NULL,
  `residence_address` varchar(1000) NOT NULL,
  `office_address` varchar(1000) NOT NULL,
  `cash_phrase` varchar(256) NOT NULL,
  `facepicture` varchar(256) NOT NULL,
  `idcard` varchar(256) NOT NULL,
  `bothpicture` varchar(256) NOT NULL,
  `recentbill` varchar(256) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kyctable`
--


-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE `like_table` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `lockaccounttable`
--

CREATE TABLE `lockaccounttable` (
  `id` int(11) NOT NULL,
  `lockcode` varchar(1000) NOT NULL,
  `unlockcode` varchar(1000) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lockaccounttable`
--


-- --------------------------------------------------------

--
-- Table structure for table `membershippayment`
--

CREATE TABLE `membershippayment` (
  `user_id` int(11) NOT NULL,
  `time_paid` varchar(256) NOT NULL,
  `expired_date` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `ticket_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membershippayment`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `sender_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `reciever_name` varchar(256) NOT NULL,
  `msg_subject` varchar(256) NOT NULL,
  `msg_message` longtext NOT NULL,
  `msg_mark_read` tinyint(1) NOT NULL DEFAULT 0,
  `sender_delete` tinyint(1) NOT NULL DEFAULT 0,
  `reciever_delete` tinyint(1) NOT NULL DEFAULT 0,
  `msg_time` varchar(256) NOT NULL,
  `msg_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `otherspayment`
--

CREATE TABLE `otherspayment` (
  `user_id` int(11) NOT NULL,
  `time_paid` varchar(256) NOT NULL,
  `expired_date` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `ticket_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otherspayment`
--


-- --------------------------------------------------------

--
-- Table structure for table `passwordreset`
--

CREATE TABLE `passwordreset` (
  `id` int(11) NOT NULL,
  `resetemail` text NOT NULL,
  `resetselector` text NOT NULL,
  `resettoken` longtext NOT NULL,
  `resetexpire` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passwordreset`
--


-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `msg_subject` varchar(255) NOT NULL,
  `msg_details` longtext NOT NULL,
  `time_paid` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `ticket_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `paymentticket`
--

CREATE TABLE `paymentticket` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `time_generated` varchar(256) NOT NULL,
  `time_expired` varchar(256) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentticket`
--

---------------------------------------------

--
-- Table structure for table `postworks`
--

CREATE TABLE `postworks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `article` longtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `postfile` varchar(256) NOT NULL,
  `post_view` int(15) NOT NULL,
  `last_viewer_id` int(11) NOT NULL,
  `sales_categories` int(3) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postworks`
--

 --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `iid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `about_me` longtext NOT NULL,
  `main_talent` varchar(255) NOT NULL,
  `second_talent` varchar(255) NOT NULL,
  `award1` longtext NOT NULL,
  `award1_date` varchar(256) NOT NULL,
  `award2` longtext NOT NULL,
  `award2_date` varchar(256) NOT NULL,
  `award3` longtext NOT NULL,
  `award3_date` varchar(256) NOT NULL,
  `website` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `profile_pic` varchar(256) NOT NULL,
  `like_no` int(11) NOT NULL DEFAULT 0,
  `liked_no` int(11) NOT NULL DEFAULT 0,
  `privacy` int(11) NOT NULL DEFAULT 0,
  `last_msg_time` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

 --------------------------------------------------------

--
-- Table structure for table `pvccardpayment`
--

CREATE TABLE `pvccardpayment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_paid` varchar(256) NOT NULL,
  `expired_date` varchar(256) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `ticket_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pvccardpayment`
--


-- --------------------------------------------------------

--
-- Table structure for table `pvccoinpayment`
--

CREATE TABLE `pvccoinpayment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_paid` varchar(256) NOT NULL,
  `expired_date` varchar(256) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `ticket_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pvccoinpayment`
--


-- --------------------------------------------------------

--
-- Table structure for table `pvcpin`
--

CREATE TABLE `pvcpin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `auth` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pvcpin`
--

- --------------------------------------------------------

--
-- Table structure for table `pvc_cards`
--

CREATE TABLE `pvc_cards` (
  `id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL DEFAULT 0,
  `issue_date` int(7) NOT NULL DEFAULT 0,
  `mature_date` int(7) NOT NULL DEFAULT 0,
  `redeemed_date` int(7) NOT NULL DEFAULT 0,
  `transferable` int(1) NOT NULL DEFAULT 0,
  `dealer_id` int(11) NOT NULL DEFAULT 0,
  `value_bought` int(11) NOT NULL DEFAULT 0,
  `value_matured` int(11) NOT NULL DEFAULT 0,
  `ownner_email` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `redeemed` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `redeem_user_table`
--

CREATE TABLE `redeem_user_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `last_amount_redeem` int(11) NOT NULL DEFAULT 0,
  `total_amount_redeem` int(11) NOT NULL DEFAULT 0,
  `redeem_total_time` int(11) NOT NULL,
  `redeem_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `redeem_user_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time_joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `report` int(1) NOT NULL DEFAULT 0,
  `ban` int(1) NOT NULL DEFAULT 0,
  `login_error` int(1) NOT NULL DEFAULT 0,
  `next_login` int(11) NOT NULL DEFAULT 0,
  `logintime` int(11) NOT NULL DEFAULT 0,
  `lockaccount` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

-------------------------------------------------------

--
-- Table structure for table `reportchat`
--

CREATE TABLE `reportchat` (
  `id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `accused_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `next_time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportchat`
--


-- --------------------------------------------------------

--
-- Table structure for table `reportmembers`
--

CREATE TABLE `reportmembers` (
  `id` int(11) NOT NULL,
  `time_post` varchar(256) NOT NULL,
  `accused` varchar(256) NOT NULL,
  `message` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `next_post` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportmembers`
--


-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` int(11) NOT NULL,
  `msg_time_interval` int(5) NOT NULL,
  `post_max_vote` int(2) NOT NULL,
  `site_maintainace_mode` int(1) NOT NULL,
  `testimony_max` int(1) NOT NULL,
  `ban_max` int(1) NOT NULL,
  `lock_comment` int(1) NOT NULL,
  `lock_vote` int(1) NOT NULL,
  `lock_posting_article` int(1) NOT NULL,
  `lock_apply` int(1) NOT NULL,
  `lock_msg` int(1) NOT NULL,
  `lock_search` int(1) NOT NULL,
  `lock_profile` int(1) NOT NULL,
  `lock_profile_connection` int(1) NOT NULL,
  `lock_profile_like` int(1) NOT NULL,
  `lock_cusomer_care` int(1) NOT NULL,
  `admin_email` varchar(256) NOT NULL,
  `admin_user_name` varchar(256) NOT NULL,
  `login_error_time` int(11) NOT NULL DEFAULT 0,
  `reg_pvc` int(4) NOT NULL DEFAULT 0,
  `pvc_redeem_rate` int(11) NOT NULL,
  `login_expire_time` int(11) NOT NULL DEFAULT 0,
  `max_pvc_send` int(11) NOT NULL DEFAULT 0,
  `award_voting_amount` int(11) NOT NULL DEFAULT 1000,
  `award_applied_amount` int(11) NOT NULL DEFAULT 5000,
  `password_toke_valid_hours` int(11) NOT NULL DEFAULT 0,
  `pvc_per_vote` int(11) NOT NULL DEFAULT 0,
  `post_cost_pvc` int(11) NOT NULL DEFAULT 0,
  `paymet_ticket_validity_days` int(3) NOT NULL DEFAULT 0,
  `bank_name` varchar(256) NOT NULL,
  `bank_account_no` varchar(256) NOT NULL,
  `account_name` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitesettings`
--


-- --------------------------------------------------------

--
-- Table structure for table `supportpayment`
--

CREATE TABLE `supportpayment` (
  `user_id` int(11) NOT NULL,
  `time_paid` varchar(256) NOT NULL,
  `expired_date` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `ticket_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimanycount`
--

CREATE TABLE `testimanycount` (
  `user_id` int(11) NOT NULL,
  `total_num` int(2) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimanycount`
--


-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `user_name` varchar(255) NOT NULL,
  `testimony` longtext NOT NULL,
  `time_post` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimony`
--


-- --------------------------------------------------------

--
-- Table structure for table `textpasswordreset`
--

CREATE TABLE `textpasswordreset` (
  `id` int(11) NOT NULL,
  `msg_link` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `textpasswordreset`
--


-- --------------------------------------------------------

--
-- Table structure for table `total_dislike`
--

CREATE TABLE `total_dislike` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `total_dislike` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_dislike`
--


-- --------------------------------------------------------

--
-- Table structure for table `total_like`
--

CREATE TABLE `total_like` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `total_like` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_like`
--

- --------------------------------------------------------

--
-- Table structure for table `total_vote`
--

CREATE TABLE `total_vote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `total_vote` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_vote`
--

- --------------------------------------------------------

--
-- Table structure for table `userposttable`
--

CREATE TABLE `userposttable` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_post` int(11) NOT NULL DEFAULT 0,
  `vote_post` int(11) NOT NULL DEFAULT 0,
  `dislike_post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userposttable`
--

- --------------------------------------------------------

--
-- Table structure for table `view_coin_history`
--

CREATE TABLE `view_coin_history` (
  `id` int(11) NOT NULL,
  `trans_date` varchar(256) NOT NULL,
  `transtype` varchar(256) NOT NULL,
  `point_email` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL,
  `trans_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_coin_history`
--

- --------------------------------------------------------

--
-- Table structure for table `vote_coin_table`
--

CREATE TABLE `vote_coin_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `total_sent` int(11) NOT NULL,
  `total_received` int(11) NOT NULL,
  `total_bal` int(11) NOT NULL,
  `total_used` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote_coin_table`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertismentpayment`
--
ALTER TABLE `advertismentpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awardapply`
--
ALTER TABLE `awardapply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awardvote`
--
ALTER TABLE `awardvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bandetails`
--
ALTER TABLE `bandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatentertainment`
--
ALTER TABLE `chatentertainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compititionpayment`
--
ALTER TABLE `compititionpayment`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `connect_friend`
--
ALTER TABLE `connect_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customercare`
--
ALTER TABLE `customercare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyapproveconnection`
--
ALTER TABLE `dailyapproveconnection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyawardapply`
--
ALTER TABLE `dailyawardapply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyawardvote`
--
ALTER TABLE `dailyawardvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailydisliketable`
--
ALTER TABLE `dailydisliketable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyliketable`
--
ALTER TABLE `dailyliketable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailymessagesent`
--
ALTER TABLE `dailymessagesent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailypageview`
--
ALTER TABLE `dailypageview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailypostvote`
--
ALTER TABLE `dailypostvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailypvctransac`
--
ALTER TABLE `dailypvctransac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyrecord`
--
ALTER TABLE `dailyrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyregetconnection`
--
ALTER TABLE `dailyregetconnection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyregistration`
--
ALTER TABLE `dailyregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datalogin`
--
ALTER TABLE `datalogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyctable`
--
ALTER TABLE `kyctable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lockaccounttable`
--
ALTER TABLE `lockaccounttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membershippayment`
--
ALTER TABLE `membershippayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `otherspayment`
--
ALTER TABLE `otherspayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentticket`
--
ALTER TABLE `paymentticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postworks`
--
ALTER TABLE `postworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `pvccardpayment`
--
ALTER TABLE `pvccardpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvccoinpayment`
--
ALTER TABLE `pvccoinpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvcpin`
--
ALTER TABLE `pvcpin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvc_cards`
--
ALTER TABLE `pvc_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeem_user_table`
--
ALTER TABLE `redeem_user_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportchat`
--
ALTER TABLE `reportchat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportmembers`
--
ALTER TABLE `reportmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supportpayment`
--
ALTER TABLE `supportpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimanycount`
--
ALTER TABLE `testimanycount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textpasswordreset`
--
ALTER TABLE `textpasswordreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_dislike`
--
ALTER TABLE `total_dislike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_like`
--
ALTER TABLE `total_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_vote`
--
ALTER TABLE `total_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userposttable`
--
ALTER TABLE `userposttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_coin_history`
--
ALTER TABLE `view_coin_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_coin_table`
--
ALTER TABLE `vote_coin_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertismentpayment`
--
ALTER TABLE `advertismentpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `awardapply`
--
ALTER TABLE `awardapply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `awardvote`
--
ALTER TABLE `awardvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bandetails`
--
ALTER TABLE `bandetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatentertainment`
--
ALTER TABLE `chatentertainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=765;

--
-- AUTO_INCREMENT for table `compititionpayment`
--
ALTER TABLE `compititionpayment`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `connect_friend`
--
ALTER TABLE `connect_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `customercare`
--
ALTER TABLE `customercare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `dailyapproveconnection`
--
ALTER TABLE `dailyapproveconnection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dailyawardapply`
--
ALTER TABLE `dailyawardapply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dailyawardvote`
--
ALTER TABLE `dailyawardvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dailydisliketable`
--
ALTER TABLE `dailydisliketable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dailyliketable`
--
ALTER TABLE `dailyliketable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dailymessagesent`
--
ALTER TABLE `dailymessagesent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dailypageview`
--
ALTER TABLE `dailypageview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `dailypostvote`
--
ALTER TABLE `dailypostvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dailypvctransac`
--
ALTER TABLE `dailypvctransac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dailyrecord`
--
ALTER TABLE `dailyrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dailyregetconnection`
--
ALTER TABLE `dailyregetconnection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dailyregistration`
--
ALTER TABLE `dailyregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `datalogin`
--
ALTER TABLE `datalogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kyctable`
--
ALTER TABLE `kyctable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `lockaccounttable`
--
ALTER TABLE `lockaccounttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `membershippayment`
--
ALTER TABLE `membershippayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990;

--
-- AUTO_INCREMENT for table `otherspayment`
--
ALTER TABLE `otherspayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `paymentticket`
--
ALTER TABLE `paymentticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `postworks`
--
ALTER TABLE `postworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pvccardpayment`
--
ALTER TABLE `pvccardpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pvccoinpayment`
--
ALTER TABLE `pvccoinpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pvcpin`
--
ALTER TABLE `pvcpin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pvc_cards`
--
ALTER TABLE `pvc_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeem_user_table`
--
ALTER TABLE `redeem_user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `reportchat`
--
ALTER TABLE `reportchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reportmembers`
--
ALTER TABLE `reportmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supportpayment`
--
ALTER TABLE `supportpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `testimanycount`
--
ALTER TABLE `testimanycount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `textpasswordreset`
--
ALTER TABLE `textpasswordreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `total_dislike`
--
ALTER TABLE `total_dislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `total_like`
--
ALTER TABLE `total_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `total_vote`
--
ALTER TABLE `total_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `userposttable`
--
ALTER TABLE `userposttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `view_coin_history`
--
ALTER TABLE `view_coin_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `vote_coin_table`
--
ALTER TABLE `vote_coin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
