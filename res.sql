# phpMyAdmin SQL Dump
# version 2.5.7-pl1
# http://www.phpmyadmin.net
# Database : `rating`
# 
# --------------------------------------------------------
#
# Table structure for table `books`
#
CREATE TABLE IF NOT EXISTS `res` (
  `res_ID` int(5) NOT NULL auto_increment,
  `res_name` varchar(255) NOT NULL default '',
  `category` varchar(50) NOT NULL default 'C',
  `description` text NOT NULL,
  PRIMARY KEY  (`res_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 ;

INSERT INTO `res` VALUES (1, 'Test', 'C', 'Test resource');
INSERT INTO `res` VALUES (2, 'MyCodeSchool', 'C', 'Video Lecture based tutorials.');