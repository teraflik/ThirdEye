# Database : `rating`
# 
# --------------------------------------------------------
#
# Table structure for table `ratings`
#
CREATE TABLE `ratings` (
  `rate_id` int(5) NOT NULL auto_increment,
  `res_id` char(5) NOT NULL default '',
  `rating_val` tinyint(4) NOT NULL default '0',
  `rating_date` date NOT NULL default '00-00-0000',
  PRIMARY KEY  (`rate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 ;
#
# Dumping data for table `ratings`
#
INSERT INTO `ratings` VALUES (1, '1', 1, '00-00-0000');
INSERT INTO `ratings` VALUES (2, '1', 4, '00-00-0000');