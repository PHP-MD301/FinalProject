-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 17, 2013 at 07:33 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `tutorials`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `attachments`
-- 

CREATE TABLE `attachments` (
  `att_id` int(5) NOT NULL auto_increment,
  `att_title` varchar(20) NOT NULL,
  `att_path` varchar(20) NOT NULL,
  PRIMARY KEY  (`att_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `attachments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `categories`
-- 

CREATE TABLE `categories` (
  `cat_id` int(2) NOT NULL auto_increment,
  `cat_title` varchar(50) NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `categories`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `comments`
-- 

CREATE TABLE `comments` (
  `com_id` int(9) NOT NULL auto_increment,
  `ccom_contents` text NOT NULL,
  `com_date` int(11) NOT NULL default '0',
  `com_user_id` int(7) NOT NULL,
  `com_lesson_id` int(7) NOT NULL,
  PRIMARY KEY  (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `comments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `courses`
-- 

CREATE TABLE `courses` (
  `course_id` int(3) NOT NULL auto_increment,
  `course_title` varchar(150) NOT NULL,
  `course_description` varchar(255) default NULL,
  `course_keywords` varchar(100) default NULL,
  `course_cat_id` int(2) NOT NULL,
  PRIMARY KEY  (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `courses`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `lessons`
-- 

CREATE TABLE `lessons` (
  `lesson_id` int(7) NOT NULL auto_increment,
  `lesson_title` varchar(150) NOT NULL,
  `lesson_contents` text,
  `lesson_date` int(11) NOT NULL default '0',
  `lesson_keywords` varchar(100) default NULL,
  `lesson_status` enum('y','n') NOT NULL default 'n',
  `lesson_user_id` int(7) NOT NULL default '0',
  `lesson_course_id` int(3) NOT NULL,
  PRIMARY KEY  (`lesson_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `lessons`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `lessons_attachments`
-- 

CREATE TABLE `lessons_attachments` (
  `lesson_id` int(7) NOT NULL,
  `att_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `lessons_attachments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL auto_increment,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_status` enum('y','n') NOT NULL default 'y',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users`
-- 

