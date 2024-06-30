-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 01:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puvfms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `activity_number` tinyint(4) NOT NULL,
  `activity_action` varchar(255) NOT NULL,
  `activity_target` varchar(255) NOT NULL,
  `activity_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activity_action_detail` varchar(255) NOT NULL,
  `user_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `application_number` varchar(29) NOT NULL,
  `application_applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `application_status_id` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`application_number`, `application_applied_at`, `application_status_id`) VALUES
('20240629026207737039949755231', '2024-06-29 15:25:31', '3'),
('20240629661013802870246147500', '2024-06-29 13:42:57', '3'),
('20240629708774557107820601407', '2024-06-29 18:08:15', '3'),
('20240629974861873049600459493', '2024-06-29 13:42:57', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_status`
--

CREATE TABLE `tbl_application_status` (
  `application_status_id` tinyint(4) DEFAULT NULL,
  `application_status_name` varchar(255) NOT NULL,
  `application_status_description` varchar(255) NOT NULL,
  `application_status_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_application_status`
--

INSERT INTO `tbl_application_status` (`application_status_id`, `application_status_name`, `application_status_description`, `application_status_created_at`) VALUES
(1, 'COMPLETED', 'This means that the application is already finished all of the transaction. asdasdasda', '2024-06-28 08:55:12'),
(2, 'INCOMPLETE', 'This means that the application is already for hearing asdfasdfss', '2024-06-26 09:51:03'),
(3, 'UNVERIFIED', 'Application is not yet verified.', '2024-06-29 13:44:27'),
(4, 'ON-HOLD', 'Test', '2024-06-26 10:02:12'),
(5, '123', '123', '2024-06-16 14:49:31'),
(6, '123', '123', '2024-06-20 15:53:34'),
(7, '123', '123', '2024-06-20 15:54:00'),
(8, '123', '123', '2024-06-20 15:55:12'),
(9, '123', '123', '2024-06-20 15:55:41'),
(10, '123', '123', '2024-06-20 15:56:05'),
(11, '123', '123', '2024-06-20 16:11:05'),
(12, '123', '123', '2024-06-20 16:11:45'),
(13, 'qweasd', 'asd', '2024-06-26 10:31:44'),
(14, 'asd', 'asd', '2024-06-27 17:13:11'),
(15, '123', '123', '2024-06-28 12:26:42'),
(16, 'ASDASDASD', 'asdasdasd', '2024-06-28 12:54:33'),
(16, 'ASDASDASDSDASD', 'asdasdasdasda', '2024-06-28 12:54:40'),
(17, 'ASDASDAS', 'dasdasdad', '2024-06-28 12:56:02'),
(18, '123123', 'asdasdasasd', '2024-06-28 12:56:53'),
(19, '123123123123', '123123123123', '2024-06-28 12:57:29'),
(20, '123123ASD', '123', '2024-06-28 12:58:23'),
(21, 'COMPLETEDASDFASDF', '123123123', '2024-06-28 12:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denomination`
--

CREATE TABLE `tbl_denomination` (
  `denomination_id` tinyint(4) NOT NULL,
  `denomination_code_name` varchar(255) NOT NULL,
  `denomination_name` varchar(255) NOT NULL,
  `denomination_description` text NOT NULL,
  `denomination_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_denomination`
--

INSERT INTO `tbl_denomination` (`denomination_id`, `denomination_code_name`, `denomination_name`, `denomination_description`, `denomination_created_at`) VALUES
(1, 'FILCAB', 'LA UNION TRANSPORT MULTI PURPOSE COOPERATIVE', 'kimi', '2024-06-24 11:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` tinyint(4) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`, `department_created_at`) VALUES
(1, 'Information and Communication Technology Department', '2024-06-16 09:55:26'),
(2, 'Judicial Department', '2024-06-16 09:55:26'),
(3, 'Technical Department', '2024-06-27 16:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_type`
--

CREATE TABLE `tbl_document_type` (
  `document_type_id` tinyint(4) NOT NULL,
  `document_type_name` varchar(255) NOT NULL,
  `document_type_description` text NOT NULL,
  `document_type_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_document_type`
--

INSERT INTO `tbl_document_type` (`document_type_id`, `document_type_name`, `document_type_description`, `document_type_created_at`) VALUES
(1, 'Birth Certificateasd', 'asd', '2024-06-27 17:14:53'),
(2, 'LTO OR/CR of authorized unit/s with year model', '123', '2024-06-20 15:41:29'),
(3, 'asd', 'asd', '2024-06-20 15:50:11'),
(4, 'LTO Test', 'qwasdas', '2024-06-20 15:50:24'),
(5, '123', '123', '2024-06-20 16:13:38'),
(6, '123', '123', '2024-06-23 11:17:29'),
(7, '123', '123', '2024-06-23 11:17:37'),
(8, 'Form 102', 'kimi', '2024-06-24 11:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_upload`
--

CREATE TABLE `tbl_document_upload` (
  `id` int(11) NOT NULL,
  `applicant_number` varchar(50) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_document_upload`
--

INSERT INTO `tbl_document_upload` (`id`, `applicant_number`, `file_path`, `created_at`) VALUES
(1, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_application_form_0.pdf', '2024-06-29 13:15:47'),
(2, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_notarized_form_0.pdf', '2024-06-29 13:15:47'),
(3, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_attestation_paper_0.pdf', '2024-06-29 13:15:47'),
(4, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_lto_or_cr_0.pdf', '2024-06-29 13:15:47'),
(5, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_certificate_of_conformity_0.pdf', '2024-06-29 13:15:47'),
(6, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_certificate_of_business_name_0.pdf', '2024-06-29 13:15:47'),
(7, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_articles_of_cooperation_and_by_laws_0.pdf', '2024-06-29 13:15:47'),
(8, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_certificate_of_registration2_0.pdf', '2024-06-29 13:15:47'),
(9, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_certificate_of_good_standing_0.pdf', '2024-06-29 13:15:47'),
(10, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_contract_of_lease_authority_0.pdf', '2024-06-29 13:15:47'),
(11, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_income_tax_return_of_registration_bir_0.pdf', '2024-06-29 13:15:47'),
(12, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_proof_of_bank_deposit2_0.pdf', '2024-06-29 13:15:47'),
(13, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_audited_financial_statement_0.pdf', '2024-06-29 13:15:47'),
(14, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_ltfrb_inspection_report_0.pdf', '2024-06-29 13:15:47'),
(15, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_fleet_management_system_0.pdf', '2024-06-29 13:15:47'),
(16, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_undertaking_to_with_afcs_0.pdf', '2024-06-29 13:15:47'),
(17, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_MC_2020-076_0.pdf', '2024-06-29 13:15:47'),
(18, '20240629661013802870246147500', 'uploads/20240629661013802870246147500/20240629661013802870246147500_proof_certificate_of_existence_of_endpoint_terminals_0.pdf', '2024-06-29 13:15:47'),
(19, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_application_form_0.pdf', '2024-06-29 13:16:42'),
(20, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_notarized_form_0.pdf', '2024-06-29 13:16:42'),
(21, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_attestation_paper_0.pdf', '2024-06-29 13:16:42'),
(22, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_lto_or_cr_0.pdf', '2024-06-29 13:16:42'),
(23, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_certificate_of_conformity_0.pdf', '2024-06-29 13:16:42'),
(24, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_certificate_of_business_name_0.pdf', '2024-06-29 13:16:42'),
(25, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_articles_of_cooperation_and_by_laws_0.pdf', '2024-06-29 13:16:42'),
(26, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_certificate_of_registration2_0.pdf', '2024-06-29 13:16:42'),
(27, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_certificate_of_good_standing_0.pdf', '2024-06-29 13:16:42'),
(28, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_contract_of_lease_authority_0.pdf', '2024-06-29 13:16:42'),
(29, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_income_tax_return_of_registration_bir_0.pdf', '2024-06-29 13:16:42'),
(30, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_proof_of_bank_deposit2_0.pdf', '2024-06-29 13:16:42'),
(31, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_audited_financial_statement_0.pdf', '2024-06-29 13:16:42'),
(32, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_ltfrb_inspection_report_0.pdf', '2024-06-29 13:16:42'),
(33, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_fleet_management_system_0.pdf', '2024-06-29 13:16:42'),
(34, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_undertaking_to_with_afcs_0.pdf', '2024-06-29 13:16:42'),
(35, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_MC_2020-076_0.pdf', '2024-06-29 13:16:42'),
(36, '20240629974861873049600459493', 'uploads/20240629974861873049600459493/20240629974861873049600459493_proof_certificate_of_existence_of_endpoint_terminals_0.pdf', '2024-06-29 13:16:42'),
(37, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_application_form_0.pdf', '2024-06-29 15:23:28'),
(38, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_notarized_form_0.pdf', '2024-06-29 15:23:28'),
(39, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_lto_or_cr_0.pdf', '2024-06-29 15:23:28'),
(40, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_proof_of_filipino_citizenship_0.pdf', '2024-06-29 15:23:28'),
(41, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_contract_of_lease_authority_0.pdf', '2024-06-29 15:23:28'),
(42, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_income_tax_return_of_registration_bir_0.pdf', '2024-06-29 15:23:28'),
(43, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_proof_of_bank_deposit1_0.pdf', '2024-06-29 15:23:28'),
(44, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_audited_financial_statement_0.pdf', '2024-06-29 15:23:28'),
(45, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_ltfrb_inspection_report_0.pdf', '2024-06-29 15:23:28'),
(46, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_fleet_management_system_0.pdf', '2024-06-29 15:23:28'),
(47, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_undertaking_to_with_afcs_0.pdf', '2024-06-29 15:23:28'),
(48, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_ots_0.pdf', '2024-06-29 15:23:28'),
(49, '20240629761708401640603278707', 'uploads/20240629761708401640603278707/20240629761708401640603278707_tct_or_tax_declaration_0.pdf', '2024-06-29 15:23:28'),
(50, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_application_form_0.pdf', '2024-06-29 15:24:26'),
(51, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_notarized_form_0.pdf', '2024-06-29 15:24:26'),
(52, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_lto_or_cr_0.pdf', '2024-06-29 15:24:26'),
(53, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_certificate_of_year_model_jao_2024_02_TH_0.pdf', '2024-06-29 15:24:26'),
(54, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_certificate_of_business_name_0.pdf', '2024-06-29 15:24:26'),
(55, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_proof_of_filipino_citizenship_0.pdf', '2024-06-29 15:24:26'),
(56, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_tct_or_tax_declaration_0.pdf', '2024-06-29 15:24:26'),
(57, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_income_tax_return_of_registration_bir_0.pdf', '2024-06-29 15:24:26'),
(58, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_proof_of_bank_deposit2_0.pdf', '2024-06-29 15:24:26'),
(59, '20240629594988182685813046464', 'uploads/20240629594988182685813046464/20240629594988182685813046464_ots_0.pdf', '2024-06-29 15:24:26'),
(60, '20240629026207737039949755231', 'uploads/20240629026207737039949755231/20240629026207737039949755231_application_form_0.pdf', '2024-06-29 15:25:31'),
(61, '20240629026207737039949755231', 'uploads/20240629026207737039949755231/20240629026207737039949755231_notarized_form_0.pdf', '2024-06-29 15:25:31'),
(62, '20240629026207737039949755231', 'uploads/20240629026207737039949755231/20240629026207737039949755231_lto_or_cr_0.pdf', '2024-06-29 15:25:31'),
(63, '20240629026207737039949755231', 'uploads/20240629026207737039949755231/20240629026207737039949755231_articles_of_partnership_incorporations_and_by_laws_0.pdf', '2024-06-29 15:25:31'),
(64, '20240629026207737039949755231', 'uploads/20240629026207737039949755231/20240629026207737039949755231_certificate_of_registration1_0.pdf', '2024-06-29 15:25:31'),
(65, '20240629026207737039949755231', 'uploads/20240629026207737039949755231/20240629026207737039949755231_tct_or_tax_declaration_0.pdf', '2024-06-29 15:25:31'),
(66, '20240629026207737039949755231', 'uploads/20240629026207737039949755231/20240629026207737039949755231_proof_of_bank_deposit2_0.pdf', '2024-06-29 15:25:31'),
(67, '20240629026207737039949755231', 'uploads/20240629026207737039949755231/20240629026207737039949755231_proof_of_public_need_0.pdf', '2024-06-29 15:25:31'),
(68, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_application_form_0.pdf', '2024-06-29 18:08:15'),
(69, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_notarized_form_0.pdf', '2024-06-29 18:08:15'),
(70, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_attestation_paper_0.pdf', '2024-06-29 18:08:15'),
(71, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_lto_or_cr_0.pdf', '2024-06-29 18:08:15'),
(72, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_certificate_of_conformity_0.pdf', '2024-06-29 18:08:15'),
(73, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_certificate_of_business_name_0.pdf', '2024-06-29 18:08:15'),
(74, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_articles_of_cooperation_and_by_laws_0.pdf', '2024-06-29 18:08:15'),
(75, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_certificate_of_registration2_0.pdf', '2024-06-29 18:08:15'),
(76, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_certificate_of_good_standing_0.pdf', '2024-06-29 18:08:15'),
(77, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_tct_or_tax_declaration_0.pdf', '2024-06-29 18:08:15'),
(78, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_income_tax_return_of_registration_bir_0.pdf', '2024-06-29 18:08:15'),
(79, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_proof_of_bank_deposit2_0.pdf', '2024-06-29 18:08:15'),
(80, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_audited_financial_statement_0.pdf', '2024-06-29 18:08:15'),
(81, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_ltfrb_inspection_report_0.pdf', '2024-06-29 18:08:15'),
(82, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_fleet_management_system_0.pdf', '2024-06-29 18:08:15'),
(83, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_afcs_0.pdf', '2024-06-29 18:08:15'),
(84, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_MC_2020-076_0.pdf', '2024-06-29 18:08:15'),
(85, '20240629708774557107820601407', 'uploads/20240629708774557107820601407/20240629708774557107820601407_ots_0.pdf', '2024-06-29 18:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hearing_status`
--

CREATE TABLE `tbl_hearing_status` (
  `hearing_status_id` tinyint(4) NOT NULL,
  `hearing_status_name` varchar(255) NOT NULL,
  `hearing_status_description` varchar(255) NOT NULL,
  `hearing_status_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hearing_status`
--

INSERT INTO `tbl_hearing_status` (`hearing_status_id`, `hearing_status_name`, `hearing_status_description`, `hearing_status_created_at`) VALUES
(1, 'CANCELLED', '123asdasd', '2024-06-27 17:13:36'),
(2, '123', '123', '2024-06-20 16:13:44'),
(3, '123', '123', '2024-06-20 16:22:04'),
(4, '123', '123', '2024-06-26 10:29:31'),
(5, 'asd', 'aasd', '2024-06-27 17:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ownership_type`
--

CREATE TABLE `tbl_ownership_type` (
  `ownership_type_id` tinyint(4) NOT NULL,
  `ownership_type_name` varchar(255) NOT NULL,
  `ownership_type_description` text NOT NULL,
  `ownership_type_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ownership_type`
--

INSERT INTO `tbl_ownership_type` (`ownership_type_id`, `ownership_type_name`, `ownership_type_description`, `ownership_type_created_at`) VALUES
(1, 'New CPCasd', 'asdasd', '2024-06-27 17:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_puv`
--

CREATE TABLE `tbl_puv` (
  `puv_make` varchar(255) NOT NULL,
  `puv_motor_number` varchar(30) NOT NULL,
  `puv_chassis_number` varchar(30) NOT NULL,
  `puv_plate_number` varchar(30) NOT NULL,
  `pub_year_model` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirement`
--

CREATE TABLE `tbl_requirement` (
  `service_id` tinyint(4) NOT NULL,
  `document_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` tinyint(4) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_description` text NOT NULL,
  `role_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` tinyint(4) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_description` text NOT NULL,
  `service_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaction_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_name`, `service_description`, `service_created_at`, `transaction_id`) VALUES
(1, 'New CPCC', 'asdasd', '2024-06-27 16:50:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_type`
--

CREATE TABLE `tbl_transaction_type` (
  `transaction_type_id` tinyint(4) NOT NULL,
  `transaction_type_name` varchar(255) NOT NULL,
  `transaction_type_description` text NOT NULL,
  `transaction_type_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` char(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` char(1) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `password`, `user_status`, `user_created_at`, `user_level`) VALUES
('202400001', 'admin@gmail.com', 'admin123', '1', '2024-06-13 09:39:44', '1'),
('202400002', '123@gmail.com', '$2y$10$R/cKZFtB.XlkX7ViQPqcmuqbwlavUkj3D9tmdayEAzvVPdMj4zAuu', '1', '2024-06-16 13:27:46', '1'),
('202400003', '1234@gmail.com', '$2y$10$f1y6.3t7SmuT7/bjc2hcYezDCZETmntVs2a4JS7vZEzOY0eTJYaw2', '1', '2024-06-16 13:30:27', '1'),
('202400004', '1234@gmail.com', '$2y$10$eoi1Hk0NlMmbGrLrFZpvQ.TOhtbXxjXWxTOQAerbKGQy.heu8pI0W', '1', '2024-06-16 13:31:13', '1'),
('202400005', '123a@gmail.com', '$2y$10$d0lb9PmSRKsNck77JA0CGuiJx0D2BGk7xrXwjBH9I57QgRAsnvSjO', '1', '2024-06-16 13:33:11', '1'),
('202400006', '1a23@gmail.com', '$2y$10$fw4ioSt1xD2KNvLPiD3pDezok8RSqrmICSNm9SVZCoRpUGtyJuyr6', '1', '2024-06-16 13:35:42', '2'),
('202400007', '123asd@gmail.com', '$2y$10$xSQ/Yf/mkHW.cIprf702ruoMn.oys6/ih8NjwJiSlcrl9cpkYL8xO', '1', '2024-06-16 13:37:06', '1'),
('202400008', '123asdasdas@gmail.com', '$2y$10$RMKbbj3bgwhoBAvivlljc.mYndqNPb/60UXja8jfVVSzG9JQ7fciu', '1', '2024-06-16 13:38:33', '2'),
('202400009', 'as12d@gmail.com', '$2y$10$6zk06O4zkEmO4J641zzIZOI6nNcBllU7S7GHMfkAf6HPCV4V4T9d6', '1', '2024-06-16 13:39:27', '1'),
('202400010', 'darylle@gmail.com', '$2y$10$YmgMu7v2SMNeEavIUc4fau8igDHYXlznUbbCNIcw97abvLEOpSXZq', '1', '2024-06-17 11:30:32', '1'),
('202400011', '12asd3@gmail.com', '$2y$10$Uh9mXHRlZBCnhK/zptuMhetTLfpCZ9YP3khJxSQoLQSEWGm8W8uIK', '1', '2024-06-17 11:32:28', '2'),
('202400012', '123123@gmail.com', '$2y$10$zu0XvigJ8tOsJ2oUSgbUBunP3aYCT8/s2mxm0rSqfLg1Pml9xVLTq', '1', '2024-06-17 11:50:45', '1'),
('202400013', 'vonhrenuel12321@gmail.com', '$2y$10$jx9HM5iQILendrrIM1abc.Y0ASD3xDkbIbMvMOUaTEQ8/z7tLzb26', '1', '2024-06-27 11:32:43', '1'),
('202400014', 'TyrroneGil01@gmail.com', '$2y$10$C40Y42M7TjOzCHxL7Jp7POMrxAXKJjg8cZC8wUIy8rjLqSzXKmjE2', '1', '2024-06-27 13:13:38', '1'),
('202400015', 'asdasd@gmail.com', '$2y$10$gr8vGQ2K7scEGOaoePUzku2aH5Fg941/tYTXlxwmn.VHqnFt7PjzS', '1', '2024-06-27 16:39:44', '1'),
('202400016', 'asdaaaaa@gmail.com', '$2y$10$uZ0QMGqVSrxHHbUDWCmQkuAqRIwp2suji7ywSS932NLYGJvYGq.Jm', '1', '2024-06-27 13:40:38', '1'),
('202400017', 'asdasdasd@gmail.com', '$2y$10$vS5wLXFxZBu2b9BceUm4p.fE8/MzKWoSAg1oZhaO8dW/nyYfJGPXu', '1', '2024-06-27 13:42:25', '1'),
('202400018', 'asdasasddasda@gmail.com', '$2y$10$fAFMXOLCwGl09v0QLB50G.jQ2r5ojrMb1CMOkuHFxx9Aj3t/vXt9i', '1', '2024-06-27 15:25:55', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE `tbl_user_info` (
  `user_id` char(9) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_middle_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_suffix` varchar(255) NOT NULL,
  `user_birthyear` year(4) NOT NULL,
  `user_birthmonth` varchar(2) NOT NULL,
  `user_birthday` varchar(2) NOT NULL,
  `user_region` varchar(255) NOT NULL,
  `user_province` varchar(255) NOT NULL,
  `user_city_municipality` varchar(255) NOT NULL,
  `user_barangay` varchar(255) NOT NULL,
  `user_street` varchar(255) NOT NULL,
  `user_phone_number` char(12) NOT NULL,
  `user_sex` char(1) NOT NULL,
  `department_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`user_id`, `user_first_name`, `user_middle_name`, `user_last_name`, `user_suffix`, `user_birthyear`, `user_birthmonth`, `user_birthday`, `user_region`, `user_province`, `user_city_municipality`, `user_barangay`, `user_street`, `user_phone_number`, `user_sex`, `department_id`) VALUES
('202400001', 'VONH RENUEL', 'LEGASPI', 'PEÑALES', '', 2002, '09', '14', '', '', '', '', '', '63966605257', 'M', 1),
('202400002', 'asd', '', 'asd', 'none', 0000, '11', '11', 'Region I (Ilocos Region)', 'Ilocos Norte', 'Pasuquin', 'Poblacion 2', '', '+63 123 123', 'M', 1),
('202400003', 'asdasd', '', 'asdasd', 'none', 0000, '11', '11', 'Region I (Ilocos Region)', 'Ilocos Norte', 'Piddig', 'Maruaya', '123', '+63 123 123', 'M', 1),
('202400004', 'asdasd', '', 'asdasd', 'none', 2006, '06', '07', 'Region I (Ilocos Region)', 'Ilocos Norte', 'Piddig', 'Maruaya', '123', '+63 123 123', 'M', 1),
('202400005', 'asd', 'asd', 'asd', 'Sr.', 2006, '06', '06', 'Region II (Cagayan Valley)', 'Batanes', 'Basco (Capital)', 'Chanarian', '', '+63 123 131', 'M', 1),
('202400006', 'asd', '', 'asd', 'Jr.', 2006, '06', '10', 'Region III (Central Luzon)', 'Bataan', 'City Of Balanga (Capital)', 'San Jose', '', '+63 123 123', 'M', 1),
('202400007', 'asd', '', 'asd', 'Jr.', 2006, '06', '08', 'Region II (Cagayan Valley)', 'Batanes', 'Basco (Capital)', 'Ihubok I (Kaychanarianan)', '', '+63 123 123', 'M', 2),
('202400008', 'asd', '', 'asd', 'none', 2006, '06', '09', 'Region II (Cagayan Valley)', 'Batanes', 'Itbayat', 'Raele', '', '+63 123 131', 'F', 2),
('202400009', 'asd', '', 'asd', 'Jr.', 2006, '06', '09', 'Region II (Cagayan Valley)', 'Batanes', 'Basco (Capital)', 'Chanarian', '', '+63 123 213', 'M', 2),
('202400010', 'Darylle', 'Mae', 'Sabado', 'none', 2006, '06', '01', 'Region III (Central Luzon)', 'Aurora', 'Casiguran', 'Dibacong', '', '+63 912 312', 'F', 1),
('202400011', 'asd', '', 'asd', 'none', 2006, '06', '03', 'Region II (Cagayan Valley)', 'Batanes', 'Basco (Capital)', 'Chanarian', '', '+63 123 123', 'M', 1),
('202400012', 'asd', 'asd', 'asd', 'Jr.', 2006, '06', '02', 'Region III (Central Luzon)', 'Aurora', 'Baler (Capital)', 'Sabang', '', '+63 123 123', 'M', 1),
('202400013', 'Vonh Renuel', '', 'Penales', '', 2006, '06', '01', 'Cordillera Administrative Region (CAR)', 'Apayao', 'Calanasan (Bayag)', 'Santa Filomena', 'Brgy. 4', '639999923423', 'M', 1),
('202400014', 'Tyronne', 'Gil', 'Azusano', 'Jr.', 2006, '06', '03', 'Autonomous Region in Muslim Mindanao (ARMM)', 'Basilan', 'Sumisip', 'Libug', '', '639234344444', 'M', 1),
('202400015', 'ASDASDA', '', 'ASD', 'Jr.', 2006, '06', '18', '16', '1602', '160201', '160201017', '', '631231231231', 'F', 1),
('202400016', 'ASD', '', 'ASD', 'Sr.', 2006, '06', '07', '01', '0129', '012912', '012912019', '', '631232323232', 'M', 1),
('202400017', 'ASD', '', 'ASD', 'III', 2006, '06', '04', '14', '1401', '140117', '140117001', '', '631231231231', 'M', 2),
('202400018', 'ASDASD', '', 'ASDASDA', '', 2005, '08', '26', '13', '1339', '133910', '133910018', 'asdasd', '631231231231', 'M', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `user_level` tinyint(4) NOT NULL,
  `user_level_name` varchar(255) NOT NULL,
  `user_level_description` text NOT NULL,
  `user_level_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`user_level`, `user_level_name`, `user_level_description`, `user_level_created_at`) VALUES
(1, 'ADMIN', '', '2024-06-14 11:27:50'),
(2, 'JUDICIAL', '', '2024-06-14 11:28:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  ADD PRIMARY KEY (`activity_number`);

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`application_number`);

--
-- Indexes for table `tbl_denomination`
--
ALTER TABLE `tbl_denomination`
  ADD PRIMARY KEY (`denomination_id`);

--
-- Indexes for table `tbl_document_type`
--
ALTER TABLE `tbl_document_type`
  ADD PRIMARY KEY (`document_type_id`);

--
-- Indexes for table `tbl_document_upload`
--
ALTER TABLE `tbl_document_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hearing_status`
--
ALTER TABLE `tbl_hearing_status`
  ADD PRIMARY KEY (`hearing_status_id`);

--
-- Indexes for table `tbl_ownership_type`
--
ALTER TABLE `tbl_ownership_type`
  ADD PRIMARY KEY (`ownership_type_id`);

--
-- Indexes for table `tbl_puv`
--
ALTER TABLE `tbl_puv`
  ADD PRIMARY KEY (`puv_plate_number`);

--
-- Indexes for table `tbl_requirement`
--
ALTER TABLE `tbl_requirement`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_transaction_type`
--
ALTER TABLE `tbl_transaction_type`
  ADD PRIMARY KEY (`transaction_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  MODIFY `activity_number` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_denomination`
--
ALTER TABLE `tbl_denomination`
  MODIFY `denomination_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_document_type`
--
ALTER TABLE `tbl_document_type`
  MODIFY `document_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_document_upload`
--
ALTER TABLE `tbl_document_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_hearing_status`
--
ALTER TABLE `tbl_hearing_status`
  MODIFY `hearing_status_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ownership_type`
--
ALTER TABLE `tbl_ownership_type`
  MODIFY `ownership_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_requirement`
--
ALTER TABLE `tbl_requirement`
  MODIFY `service_id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaction_type`
--
ALTER TABLE `tbl_transaction_type`
  MODIFY `transaction_type_id` tinyint(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
